<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert; 
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
#[ApiResource(
    itemOperations:['get','put','patch'],
    normalizationContext: ['groups' => ['answer:read']],
    denormalizationContext: ['groups' => ['answer:write']],
)]
#[ApiFilter(SearchFilter::class, properties: ['answer' => 'partial','question.question' => 'partial','client' => 'partial'])]


class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["answer:read"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["answer:read","answer:write"])]
    #[Assert\NotBlank]
    private $answer;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(["answer:read","answer:write"])]
    #[Assert\NotBlank]
    private $createdAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(["answer:read","answer:write"])]
    private $updatedAt;

    #[ORM\OneToOne(mappedBy: 'answer', targetEntity: Question::class, cascade: ['persist', 'remove'])]
    #[Groups(["answer:read"])]
    private $question;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(Question $question): self
    {
        // set the owning side of the relation if necessary
        if ($question->getAnswer() !== $this) {
            $question->setAnswer($this);
        }

        $this->question = $question;

        return $this;
    }
}
