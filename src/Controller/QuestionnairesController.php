<?php

namespace App\Controller;

use App\Entity\Player;
use App\Entity\Questions;
use App\Entity\Questionnaires;
use App\Form\QuestionnairesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/questionnaires')]
class QuestionnairesController extends AbstractController
{
    #[Route('/', name: 'questionnaires')]
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $player=$em->getRepository(Player::class)->findOneBy([
            'id' => $request->get('id')
        ]);
        $questionnaires=$em->getRepository(Questionnaires::class)->findAll();

        return $this->render('questionnaires/index.html.twig', [
            'questionnaires'=>$questionnaires,
            'player'=>$player
        ]);
    }
    // #[Route('/new' ,name: 'newQuestionnaires')]
    // public function new(Request $request): Response
    // {
    //     $em = $this->getDoctrine()->getManager();
    //     $questionnaire = new Questionnaires();


    //     $form = $this->createForm(QuestionnairesType::class, $questionnaire);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $em->persist($questionnaire);
    //         $em->flush();
    //         return $this->redirectToRoute('newQuestions');
    //     }
    //     return $this->render('questionnaires/new.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }


}
