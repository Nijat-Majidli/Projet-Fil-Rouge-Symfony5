<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(SessionInterface $session): Response
    {
        $panier = $session->get("panier", []);

        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
        ]);
    }

    /**
     * @Route("/addPanier/{id}", name="addPanier", methods={"POST"})
     */
    public function addPanier(SessionInterface $session, Produit $id, Request $request): Response
    {
        $panier = $session->get("panier", []);
        
        $panier[] = [
            "id" => $id->getId(),
            "photo" => $id->getProPhoto(),
            "libelle" => $id->getProLibelle(),
            "prix" => $id->getPrixVente(),
            "quantite" => $request->get("quantity")
        ];

        $session->set("panier", $panier);

        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
        ]);
    }

    /**
     * @Route("/deletePanier/{id}", name="deletePanier")
     */
    public function deletePanier(SessionInterface $session, $id): Response
    {
        $panier = $session->get("panier", []);

        foreach($panier as $key => $value)
        {
            foreach($value as $key2 => $value2)
            {
                if($value2==$id)
                {
                    unset($panier[$key]);
                }
            }   
        }
        
        $session->set("panier", $panier);

        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
        ]);
    }







}