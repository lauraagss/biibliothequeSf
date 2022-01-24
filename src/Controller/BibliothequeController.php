<?php

namespace App\Controller;

use App\Entity\Bibliotheque;
use App\Entity\Livres;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BibliothequeController extends AbstractController
{
    #[Route('/bibliotheques', name: 'bibliotheques')]
    public function index(EntityManagerInterface $manager): Response
    {
        $biblio = $manager
            ->getRepository(Bibliotheque::class)
            ->findAll();


       return $this->render('bibliotheque.html.twig' ,[
       'biblio' => $biblio,
        ]);
    }

    #[Route('/bibliotheques/{id}', name: 'bibliotheque')]
    public function bibliotheque(Bibliotheque $bibliotheque): Response
    {
        $livres = $bibliotheque->getLivres();

        return $this->render('interieurBibliotheque.html.twig' ,[
            'livres' => $livres,
        ]);
    }

}
