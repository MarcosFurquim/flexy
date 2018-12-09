<?php
namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ApiProductController extends ApiController
{
    /**
    * @Route("/api/products", methods="GET")
    */
    public function index(ProductRepository $productRepository) {
        $products = $productRepository->getAll();

        return $this->respond($products);
    }

    /**
    * @Route("/api/products", methods="POST")
    */
    public function create(Request $request, ProductRepository $productRepository, EntityManagerInterface $em) {
        if ($request->isXMLHttpRequest()) {         
            //return new JsonResponse(array('data' => 'this is a json response'));
            //var_dump($request->getContent());
            $data = json_decode($request->getContent(), true);
            var_dump($data);
        }



        // persist the new product
        $product = new Product;
        $product->setTitle($data['title']);
        $product->setDescription($data['description']);
        $product->setImage($data['image']);
        $product->setStock($data['stock']);
        $product->setTag($data['tag']);
        $em->persist($product);
        $em->flush();

        return $this->respondCreated($productRepository->transform($product));
    }

    /**
    * @Route("/api/products/edit/{id}", methods="POST")
    */
    public function update($id,Request $request, ProductRepository $productRepository, EntityManagerInterface $em) {
        $product = $productRepository->get($id);
        $newTitle = $request->get('title');
        $product->setTitle($newTitle);
        $em->persist($product);
        $em->flush();

        return $this->respondOk($productRepository->transform($product));

    }

    /**
    * @Route("/api/products/delete/{id}", methods="POST")
    */
    public function delete($id,Request $request, ProductRepository $productRepository, EntityManagerInterface $em) {
        $product = $productRepository->get($id);
        $em->remove($product);
        $em->flush();
        return $this->respondOk('Deleted prodict successful!');
    }

    

}