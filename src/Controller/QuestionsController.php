<?php

namespace App\Controller;

use App\Entity\Player;
use App\Entity\Questions;
use App\Form\QuestionsType;
use App\Entity\Questionnaires;
use App\Service\QuestionnaireService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/questionnaire')]
class QuestionsController extends AbstractController
{
    #[Route('/', name: 'questionnaire')]
    public function index(Request $request, QuestionnaireService $qstService): Response
    {
        $em = $this->getDoctrine()->getManager();
        $player=$em->getRepository(Player::class)->findOneBy([
            'id' => $request->get('id')
        ]);
        $questionnaire=$em->getRepository(Questionnaires::class)->findOneBy([
            'name' => $request->get('namequestionnaire')
        ]);
        $id=$request->get('id');
        if($request->isMethod('POST')){
            $choixs=$request->request->all();
            $namequestionnaire=$request->get('namequestionnaire');
            $result = $qstService->getResult($choixs, $questionnaire);
            

            return $this->redirectToRoute('validate',[
                'result'=>$result,
                'id'=>$id,
                'namequestionnaire'=>$namequestionnaire
            ]);
            // $this->render
            // $this->redirectToRoute
            // $this->getUser
            // $this->getDoctrine
        }

        return $this->render('questions/index.html.twig', [
            'player'=>$player,
            'questionnaire'=>$questionnaire
        ]);
    }

    // #[Route('/new', name:'newQuestions')]
    // public function new(Request $request): Response
    // {
    //     $em = $this->getDoctrine()->getManager();
    //     $question = new Questions();

    //     $form = $this->createForm(QuestionsType::class, $question);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $em->persist($question);
    //         $em->flush();
    //         echo '<script type="text/javascript">alert("Vous avez ajouté une réponse au questionnaire!");</script>';
    //         return $this->redirectToRoute('newQuestions');

    //     }
    //     return $this->render('questions/new.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }
}
