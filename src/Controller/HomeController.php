<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\ProduitRepository;
use App\Repository\SousCategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function home(CategoriesRepository $catRepo): Response
    {
        return $this->render('base.html.twig', ['categories' => $catRepo->findAll()]);

        return $this->render('home/index.html.twig');
    }  

    /**
     * @Route("/home2/{id}", name="home2")
     */
    public function home2($id, SousCategoriesRepository $sousCatRepo): Response
    {
        return $this->render('base.html.twig', ['souscategories' => $sousCatRepo->find($id)]);

        return $this->render('home/index.html.twig', [
        ]);
    } 

}
