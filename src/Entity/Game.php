<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
 */
class Game
{
    private $gameTitleText;
    private $gameGenreText;
    private $gameDateText;
    private $gamReviewText;
    private $btnAdd;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $release_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $review;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ManyToMany;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $publisher;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Plattform", inversedBy="title")
     */
    private $plattform;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Entwickler", inversedBy="gamesTitle")
     */
    private $entwickler;

    public function __construct()
    {
        $this->plattform = new ArrayCollection();
        $this->entwickler = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getReleaseDate(): ?int
    {
        return $this->release_date;
    }

    public function setReleaseDate(?int $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(?string $review): self
    {
        $this->review = $review;

        return $this;
    }

    public function getManyToMany(): ?string
    {
        return $this->ManyToMany;
    }

    public function setManyToMany(string $ManyToMany): self
    {
        $this->ManyToMany = $ManyToMany;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(?string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public  function getGameTitleText(){
        $this->gameTitleText;
    }

    public function setGameTitleText($gameTitleText){
        $this->gameTitleText = $gameTitleText;
    }

    public function getBtnAdd(){
        $this->btnAdd;
    }

    public function setBtnAdd($btnAdd){
        $this->btnAdd=$btnAdd;
    }

    /**
     * @return Collection|Plattform[]
     */
    public function getPlattform(): Collection
    {
        return $this->plattform;
    }

    public function addPlattform(Plattform $plattform): self
    {
        if (!$this->plattform->contains($plattform)) {
            $this->plattform[] = $plattform;
        }

        return $this;
    }

    public function removePlattform(Plattform $plattform): self
    {
        if ($this->plattform->contains($plattform)) {
            $this->plattform->removeElement($plattform);
        }

        return $this;
    }

    /**
     * @return Collection|Entwickler[]
     */
    public function getEntwickler(): Collection
    {
        return $this->entwickler;
    }

    public function addEntwickler(Entwickler $entwickler): self
    {
        if (!$this->entwickler->contains($entwickler)) {
            $this->entwickler[] = $entwickler;
        }

        return $this;
    }

    public function removeEntwickler(Entwickler $entwickler): self
    {
        if ($this->entwickler->contains($entwickler)) {
            $this->entwickler->removeElement($entwickler);
        }

        return $this;
    }
}
