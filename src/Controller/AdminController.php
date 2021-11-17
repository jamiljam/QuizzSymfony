<?php

namespace App\Controller;

use App\Entity\Questions;
use App\Form\QuestionsType;
use App\Entity\Questionnaires;
use App\Form\QuestionnairesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/questionnaire' ,name: 'newQuestionnaires')]
    public function questionnaireAdmin(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $questionnaire = new Questionnaires();


        $form = $this->createForm(QuestionnairesType::class, $questionnaire);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($questionnaire);
            $em->flush();
            return $this->redirectToRoute('newQuestions');
        }
        return $this->render('questionnaires/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/question', name:'newQuestions')]
    public function questionAdmin(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $question = new Questions();

        $form = $this->createForm(QuestionsType::class, $question);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($question);
            $em->flush();
            echo '<script type="text/javascript">alert("Vous avez ajouté une réponse au questionnaire!");</script>';
            return $this->redirectToRoute('newQuestions');

        }
        return $this->render('questions/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
