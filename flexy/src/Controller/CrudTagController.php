<?php
namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TagRepository;

class CrudTagController extends AbstractController
{
    /**
    * @Route("/tags")
    */
    public function indexTag(TagRepository $tagRepositorry) {
        $tags = $tagsRepository-getAll();
        return $this->render('tag.crud.template.html.twig', [
            "tags" => $tags
        ]);
    }
    
    
}