<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SousCategoriesRepository;
use App\Repository\CategoriesRepository;

class SousCategoriesController extends AbstractController
{
    /**
     * @Route("/sous/categories/{id}", name="sous_categories")
     */
    public function index($id, SousCategoriesRepository $sousCatRepo, CategoriesRepository $catRepo): Response
    {
        return $this->render('sous_categories/index.html.twig', [
            'SousCategories' => $sousCatRepo->findBy(['cat'=>$id]),
            'Categorie' => $catRepo->find($id)
        ]);
    }
}


