<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BasebackController extends AbstractController
{
    /**
     * @Route("/baseback", name="baseback")
     */
    public function index(): Response
    {
        return $this->render('baseback/base.html.twig', [
            'controller_name' => 'BasebackController',
        ]);
    }
}
