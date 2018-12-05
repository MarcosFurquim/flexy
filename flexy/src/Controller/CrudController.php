<?php
namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CrudController extends AbstractController
{
    /**
    * @Route("/");
    * @Route("/products")
    */
    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->getAll();
        return $this->render('crud.template.html.twig', [
            "products" => $products
        ]);
    }
    /**
    * @Route("/products/edit/{id}")
    */
    public function edit($id,ProductRepository $productRepository)
    {
        $product = $productRepository->get($id);
        return $this->render('edit-product.template.html.twig', [
            "product" => $product
        ]);
    }
}