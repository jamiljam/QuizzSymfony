<?php

namespace App\Entity;

use App\Repository\QuestionnairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionnairesRepository::class)
 */
class Questionnaires
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
     * @ORM\OneToMany(targetEntity=Questions::class, mappedBy="questionnaire")
     */
    protected $questions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $img;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
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

    // /**
    //  * @return Collection|Questions[]
    //  */
    // public function getQuestions(): Collection
    // {
    //     return $this->questions;
    // }

    // public function addQuestion(Questions $question): self
    // {
    //     if (!$this->questions->contains($question)) {
    //         $this->questions[] = $question;
    //         $question->setQuestionnaire($this);
    //     }

    //     return $this;
    // }

    // public function removeQuestion(Questions $question): self
    // {
    //     if ($this->questions->removeElement($question)) {
    //         // set the owning side to null (unless already changed)
    //         if ($question->getQuestionnaire() === $this) {
    //             $question->setQuestionnaire(null);
    //         }
    //     }

    //     return $this;
    // }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function addQuestion(Questions $question): void
    {
        $this->questions->add($question);

         // for a many-to-one association:
    $question->setQuestionnaire($this);

    $this->questions->add($question);
    }

    public function removeQuestion(Questions $question): void
    {
        $this->questions->removeElement($question);
    }
}
