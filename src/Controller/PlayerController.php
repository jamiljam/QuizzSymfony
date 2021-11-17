<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/')]
class PlayerController extends AbstractController
{
    #[Route('/', name: 'player_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $player = new Player();
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($player);
            $entityManager->flush();

            return $this->redirectToRoute('questionnaires', [
                'id' => $player->getId()
            ]);
        }

        return $this->render('player/index.html.twig',[
            'player' => $player,
            'form' => $form->createView(),
        ]);
    }

}