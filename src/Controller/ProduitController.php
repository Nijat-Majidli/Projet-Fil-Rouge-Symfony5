<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Repository\SousCategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit/{id}", name="produit")
     */
    public function index($id, ProduitRepository $pro, SousCategoriesRepository $SousCateg): Response
    {
        return $this->render('produit/index.html.twig', [
            'Produits' => $pro->findBy(['sous_cat'=>$id]),
            'SousCategorie' => $SousCateg->find($id)
        ]);
    }


    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail($id, ProduitRepository $pro): Response
    {
        return $this->render('produit/detail.html.twig', [
            'Detail' => $pro->find($id),
        ]);
    }
}


