<?php
namespace App\Controller;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ApiTagController extends ApiController
{

    /**
    * @Route("/api/tags/create", methods="POST")
    */
    public function create(Request $request, EntityManagerInterface $em) {
        if ($request->isXMLHttpRequest()) {         
            $data = json_decode($request->getContent(), true);
        }
        // persist the new tag
        $tag = new Tag;
        $em->persist($tag);
        $em->flush();

        return $this->respondCreated('Tag Created!');
    }

    

}