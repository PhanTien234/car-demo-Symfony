<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuppliersController extends Controller
{
    /**
     * @Route("/suppliers", name="suppliers")
     */
    public function index(): Response
    {
        return $this->render('suppliers/index.html.twig', [
            'controller_name' => 'SuppliersController',
        ]);
    }
}
