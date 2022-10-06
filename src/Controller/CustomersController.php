<?php

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomersController extends Controller
{
    /**
     * @Route("/customers", name="customers")
     */
    public function index(): Response
    {
        return $this->render('customers/index.html.twig', [
            'controller_name' => 'CustomersController',
        ]);
    }
    
    /**
     * @Route("/customers/all/ascending", name="get_customers_ascending")
     */
    public function getCustomersAscending()
    {
        // Call doctrine
        $doctrine = $this->getDoctrine();
        
        // Call Customers Repo
        $customerRepo = $doctrine->getRepository(Customer::class);
        
        // Get all customers
        $customers = $customerRepo->findCustomers('ASC');
        
        return $this->render('customers/all.html.twig', [
            'customers' => $customers
        ]);
    }
    
    /**
     * @Route("/customers/all/descending", name="get_customers_descending")
     */
    public function getCustomersDescending()
    {
        // Call doctrine
        $doctrine = $this->getDoctrine();
        
        // Call Customers Repo
        $customerRepo = $doctrine->getRepository(Customer::class);
        
        // Get all customers
        $customers = $customerRepo->findCustomers('DESC');
        
        return $this->render('customers/all.html.twig', [
            'customers' => $customers
        ]);
    }
}
