<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlattformRepository")
 */
class Plattform
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
     * @ORM\Column(type="string", length=255)
     */
    private $firma;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Game", mappedBy="plattform")
     */
    private $title;

    public function __construct()
    {
        $this->title = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    public function getFirma(): ?string
    {
        return $this->firma;
    }

    public function setFirma(string $firma): self
    {
        $this->firma = $firma;

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getTitle(): Collection
    {
        return $this->title;
    }

    public function addTitle(Game $title): self
    {
        if (!$this->title->contains($title)) {
            $this->title[] = $title;
            $title->addPlattform($this);
        }

        return $this;
    }

    public function removeTitle(Game $title): self
    {
        if ($this->title->contains($title)) {
            $this->title->removeElement($title);
            $title->removePlattform($this);
        }

        return $this;
    }
}
