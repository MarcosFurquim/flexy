<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class ProductController extends ApiController
{
    /**
    * @Route("/products")
    */
    public function moviesAction()
    {
        return $this->respond([
            [
                'title' => 'The Princess Bride',
                'count' => 0
            ]
        ]);
    }
}