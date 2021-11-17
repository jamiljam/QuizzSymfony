<?php

namespace App\Controller;

use App\Entity\Player;
use App\Entity\Reponses;
use App\Entity\Questionnaires;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ValidateController extends AbstractController
{
    #[Route('/validate/{result}/{namequestionnaire}/{id}', name: 'validate')]
    public function index(Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();
        $reponses=$em->getRepository(Reponses::class)->findAll();
    
        $questionnaire=$em->getRepository(Questionnaires::class)->findOneBy([
            'name' => $request->get('namequestionnaire')
        ]);
        $player=$em->getRepository(Player::class)->findOneBy([
            'id' => $request->get('id')
        ]);

         $points=$request->get('result');
   

        return $this->render('validate/index.html.twig',[
            'points'=>$points,
            'reponses'=>$reponses,
            'questionnaire'=>$questionnaire,
            'player'=>$player
        ]);
    }
}
