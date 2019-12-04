<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
//use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        $toto='ma variable';
        return $this->render('main/index.html.twig', [
            'toto' => $toto,
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function createProduct(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Produit();
        $product->setLibelle('Keyboard');
        $product->setPrix(199);
        
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        //replace $entityManager
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
   
    
}
