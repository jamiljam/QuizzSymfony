<?php

namespace App\Service;

use App\Entity\Questionnaires;
use Doctrine\ORM\EntityManagerInterface;

class QuestionnaireService  
{

    public function getResult(array $choixs, Questionnaires $questionnaires)
    {
  $points=0;
        $questions = $questionnaires->getQuestions();
        foreach($choixs as $key => $choix)
        {
            foreach($questions as $question)
            {
                if($question->getId() === $key)
                {
                    foreach($question->getReponses() as $reponse)
                    {
                        if($choix===$reponse->getName())
                        {
                            $points=$points+$reponse->getChoix();
                        }
                    }

            }
        }
        
    }
    $points=$points*4;
        return $points;
    }
}