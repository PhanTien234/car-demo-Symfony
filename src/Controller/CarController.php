<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends Controller
{
    /**
     * @Route("/car",name="car_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $cars = $em->getRepository(Car::class)->findAll();
        
        return $this->render('car/index.html.twig', array(
            'cars' => $cars,
        ));
    }
    
    /**
     * Finds and displays a car entity.
     *
     * @Route("/car/{id}", name="car_show")
     */
    public function showAction(Car $car)
    {
        return $this->render('car/show.html.twig', array(
            'car' => $car,
        ));
    }
    
    /**
     * @Route("/cars/{make}", name="find_cars_by_make")
     */
    public function findCarsByMake($make)
    {
        // Call Doctrine
        $doctrine = $this->getDoctrine();
        
        // Call CarRepository
        $carRepos = $doctrine->getRepository(Car::class);
        $cars = $carRepos->findByMake($make);
        
        return $this->render('car/index.html.twig', array(
            'cars' => $cars,
        ));
    }
}
