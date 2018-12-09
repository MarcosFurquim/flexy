<?php
namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CrudController extends AbstractController
{
    /**
    * @Route("/");
    * @Route("/products")
    */
    public function indexProduct(ProductRepository $productRepository)
    {
        $products = $productRepository->getAll();
        return $this->render('product.template.html.twig', [
            "products" => $products
        ]);
    }
    /**
    * @Route("/tags")
    */
    public function indexTag(ProductRepository $productRepository)
    {
        $products = $productRepository->getAll();
        return $this->render('tag.crud.template.html.twig', [
            "products" => $products
        ]);
    }
    /**
    * @Route("/products/new")
    */
    public function newView() {  
        return $this->render('new-product.template.html.twig');
    }
    /**
    * @Route("/products/createNew")
    */
    public function newProduct(Request $request, EntityManagerInterface $em) {
        if($request) {
            // persist the new product
            $product = new Product;
            $product->setTitle($request->get('title'));
            $product->setDescription($request->get('description'));
            $product->setImage($request->get('image'));
            $product->setStock($request->get('stock'));
            $product->setTag($request->get('tag'));
            $em->persist($product);
            $em->flush();
            $response = new RedirectResponse
            (
                'Content',
                Response::HTTP_CREATED,
                array('content-type' => 'text/html')
            );
            $response->setContent('Hello World');
            $response->setTargetUrl('/products');

            // the headers public attribute is a ResponseHeaderBag
            return $response;
        } else {
            return $this->render('new-product.template.html.twig');
        }
    }
    /**
    * @Route("/products/edit/{id}")
    */
    public function editView($id,ProductRepository $productRepository) {
        $product = $productRepository->get($id);
        return $this->render('edit-product.template.html.twig', [
            "product" => $product
        ]);
    }/**
    * @Route("/products/editProduct")
    */
    public function editProduct(Request $request, EntityManagerInterface $em) {
        $product.setTitle($request->get('title'));
        $product.setDescription($request->get('description'));
        $product.setStock($request->get('stock'));
        $$product.setImage('image');
    }
}