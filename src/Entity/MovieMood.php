<?php

namespace App\Entity;

use App\Repository\MovieMoodRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;

#[ORM\Entity(repositoryClass: MovieMoodRepository::class)]
class MovieMood
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\ManyToMany(targetEntity: Movie::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Collection $movie;


    #[ORM\ManyToMany(targetEntity: Mood::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Collection $mood;

    public function getId(): ?int
    {
        return $this->id;
    }
}
