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

    public function __construct()
    {
        $this->gamesTitle = new ArrayCollection();
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
    public function getGamesTitle(): Collection
    {
        return $this->gamesTitle;
    }

    public function addGamesTitle(Game $gamesTitle): self
    {
        if (!$this->gamesTitle->contains($gamesTitle)) {
            $this->gamesTitle[] = $gamesTitle;
            $gamesTitle->addEntwickler($this);
        }

        return $this;
    }

    public function removeGamesTitle(Game $gamesTitle): self
    {
        if ($this->gamesTitle->contains($gamesTitle)) {
            $this->gamesTitle->removeElement($gamesTitle);
            $gamesTitle->removeEntwickler($this);
        }

        return $this;
    }

}
