<?php

namespace App\Controller;

use App\Entity\SweatShirts;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{

    public function __construct(private readonly EntityManagerInterface $em){}



    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $products = $this->em->getRepository(SweatShirts::class)->findAll();
        return $this->render('home/index.html.twig', [
            'products' => $products
        ]);
    }
}
