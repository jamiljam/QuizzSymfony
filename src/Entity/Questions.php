<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionsRepository::class)
 */
class Questions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Questionnaires::class, inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $questionnaire;

    /**
     * @ORM\OneToMany(targetEntity=Reponses::class, mappedBy="question", cascade={"persist"})
     */
    private $reponses;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQuestionnaire(): ?Questionnaires
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire(?Questionnaires $questionnaire): self
    {
        $this->questionnaire = $questionnaire;

        return $this;
    }

    /**
     * @return Collection|Reponses[]
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    // public function addReponse(Reponses $reponse): self
    // {
    //     if (!$this->reponses->contains($reponse)) {
    //         $this->reponses[] = $reponse;
    //         $reponse->setQuestion($this);
    //     }

    //     return $this;
    // }

    // public function removeReponse(Reponses $reponse): self
    // {
    //     if ($this->reponses->removeElement($reponse)) {
    //         // set the owning side to null (unless already changed)
    //         if ($reponse->getQuestion() === $this) {
    //             $reponse->setQuestion(null);
    //         }
    //     }

    //     return $this;
    // }
    public function addReponse(Reponses $reponse): void
    {
        $this->reponses->add($reponse);

         // for a many-to-one association:
    $reponse->setQuestion($this);

    $this->reponses->add($reponse);
    }

    public function removeReponse(Reponses $reponse): void
    {
        $this->reponses->removeElement($reponse);
    }
}
