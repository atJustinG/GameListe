<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntwicklerRepository")
 */
class Entwickler
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Game", mappedBy="entwickler")
     */
    private $gamesTitle;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Game", inversedBy="entwicklers")
     */
    private $game;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Game", inversedBy="entwicklers")
     */
    private $Game;

    public function __construct()
    {
        $this->gamesTitle = new ArrayCollection();
        $this->game = new ArrayCollection();
        $this->Game = new ArrayCollection();
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

    /**
     * @return Collection|Game[]
     */
    public function getGame(): Collection
    {
        return $this->game;
    }

    public function addGame(Game $game): self
    {
        if (!$this->game->contains($game)) {
            $this->game[] = $game;
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->game->contains($game)) {
            $this->game->removeElement($game);
        }

        return $this;
    }

}
