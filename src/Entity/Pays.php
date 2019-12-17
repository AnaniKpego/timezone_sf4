<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaysRepository")
 */
class Pays
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
    private $nom_fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_en;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Continent", inversedBy="pays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $continents;
    

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fuseauhoraire", mappedBy="pays")
     */
    private $fuseauxhoraires;

    public function __construct()
    {
       
        $this->fuseauxhoraires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFr(): ?string
    {
        return $this->nom_fr;
    }

    public function setNomFr(string $nom_fr): self
    {
        $this->nom_fr = $nom_fr;

        return $this;
    }

    public function getNomEn(): ?string
    {
        return $this->nom_en;
    }

    public function setNomEn(string $nom_en): self
    {
        $this->nom_en = $nom_en;

        return $this;
    }


    public function getContinents(): ?Continent
    {
        return $this->continents;
    }

    public function setContinents(?Continent $continents): self
    {
        $this->continents = $continents;

        return $this;
    }


    /**
     * @return Collection|Fuseauhoraire[]
     */
    public function getfuseauxhoraires(): Collection
    {
        return $this->fuseauxhoraires;
    }

    public function addfuseauxhoraires(Fuseauhoraire $fuseauxhoraires): self
    {
        if (!$this->fuseauxhoraires->contains($fuseauxhoraires)) {
            $this->fuseauxhoraires[] = $fuseauxhoraires;
            $fuseauxhoraires->setPays($this);
        }

        return $this;
    }

    public function removefuseauxhoraires(Fuseauhoraire $fuseauxhoraires): self
    {
        if ($this->fuseauxhoraires->contains($fuseauxhoraires)) {
            $this->fuseauxhoraires->removeElement($fuseauxhoraires);
            // set the owning side to null (unless already changed)
            if ($fuseauxhoraires->getPays() === $this) {
                $fuseauxhoraires->setPays(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->fuseauxhoraires;
    }
}
