<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @route("/", name="acceuil")
     */
    public function AfficherHome(): Response
    {
        $reponse = $this->render('home/home.html.twig', [
            'titre' => 'Acceuil'
        ]);
        return $reponse;
    }
}
