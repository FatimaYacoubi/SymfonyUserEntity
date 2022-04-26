<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BasefrontController extends AbstractController
{
    /**
     * @Route("/basefront", name="basefront")
     */
    public function index(): Response
    {
        return $this->render('basefront/base.html.twig', [
            'controller_name' => 'BasefrontController',
        ]);
    }
        /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('basefront/home.html.twig', [
            'controller_name' => 'BasefrontController',
        ]);
    }
        /**
     * @Route("/account", name="account")
     */
    public function account(): Response
    {
        return $this->render('basefront/account.html.twig', [
            'controller_name' => 'BasefrontController',
        ]);
    }
          /**
     * @Route("/services", name="services")
     */
    public function services(): Response
    {
        return $this->render('basefront/services.html.twig', [
            'controller_name' => 'BasefrontController',
        ]);
    }
          /**
     * @Route("/trips", name="trips")
     */
    public function trips(): Response
    {
        return $this->render('basefront/trips.html.twig', [
            'controller_name' => 'BasefrontController',
        ]);
    }

          /**
     * @Route("/reservation", name="reservation")
     */
    public function reservation(): Response
    {
        return $this->render('basefront/reservation.html.twig', [
            'controller_name' => 'BasefrontController',
        ]);
    }

          /**
     * @Route("/equipement", name="equipement")
     */
    public function equipement(): Response
    {
        return $this->render('basefront/equipement.html.twig', [
            'controller_name' => 'BasefrontController',
        ]);
    }

          /**
     * @Route("/tblog", name="blog")
     */
    public function blog(): Response
    {
        return $this->render('basefront/blog.html.twig', [
            'controller_name' => 'BasefrontController',
        ]);
    }
}
