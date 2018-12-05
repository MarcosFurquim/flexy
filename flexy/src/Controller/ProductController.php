<?php
namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ProductController extends ApiController
{
    // /**
    // * @Route("/products")
    // */
    // public function productsAction()
    // {
    //     return $this->respond([
    //         [
    //             'title' => 'The Princess Bride',
    //             'count' => 0
    //         ]
    //     ]);
    // }

    /**
    * @Route("/api/products", methods="GET")
    */
    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->getAll();

        return $this->respond($products);
    }

    /**
    * @Route("/api/products", methods="POST")
    */
    public function create(Request $request, ProductRepository $productRepository, EntityManagerInterface $em)
    {
        $request = $this->transformJsonBody($request);

        if (! $request) {
            return $this->respondValidationError('Please provide a valid request!');
        }

        // validate the title
        if (! $request->get('title')) {
            return $this->respondValidationError('Please provide a title!');
        }

        // persist the new product
        $product = new Product;
        $product->setTitle($request->get('title'));
        $em->persist($product);
        $em->flush();

        return $this->respondCreated($productRepository->transform($product));
    }

    /**
    * @Route("/api/products/{id}/count", methods="POST")
    */
    public function increaseCount($id, EntityManagerInterface $em, ProductRepository $productRepository)
    {
        $product = $productRepository->find($id);

        if (! $product) {
            return $this->respondNotFound();
        }

        $product->setCount($product->getCount() + 1);
        $em->persist($product);
        $em->flush();

        return $this->respond([
            'count' => $product->getCount()
        ]);
    }

}