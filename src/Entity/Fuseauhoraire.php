<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FuseauhoraireRepository")
 */
class Fuseauhoraire
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
    private $fuseau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $utc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville_en;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville_fr;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ville", mappedBy="fuseaux")
     */
    private $villes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pays", inversedBy="fuseauxhoraire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pays;

    public function __construct()
    {
        $this->villes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFuseau(): ?string
    {
        return $this->fuseau;
    }

    public function setFuseau(string $fuseau): self
    {
        $this->fuseau = $fuseau;

        return $this;
    }

    public function getUtc(): ?string
    {
        return $this->utc;
    }

    public function setUtc(string $utc): self
    {
        $this->utc = $utc;

        return $this;
    }

    public function getVilleEn(): ?string
    {
        return $this->ville_en;
    }

    public function setVilleEn(?string $ville_en): self
    {
        $this->ville_en = $ville_en;

        return $this;
    }

    public function getVilleFr(): ?string
    {
        return $this->ville_fr;
    }

    public function setVilleFr(?string $ville_fr): self
    {
        $this->ville_fr = $ville_fr;

        return $this;
    }

    /**
     * @return Collection|Ville[]
     */
    public function getVilles(): Collection
    {
        return $this->villes;
    }

    public function addVille(Ville $ville): self
    {
        if (!$this->villes->contains($ville)) {
            $this->villes[] = $ville;
            $ville->setFuseaux($this);
        }

        return $this;
    }

    public function removeVille(Ville $ville): self
    {
        if ($this->villes->contains($ville)) {
            $this->villes->removeElement($ville);
            // set the owning side to null (unless already changed)
            if ($ville->getFuseaux() === $this) {
                $ville->setFuseaux(null);
            }
        }

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getFuseauHoraire(){
        date_default_timezone_set($this->fuseau);
        $time = date("D, j F Y, H:i A");

        return $time;
    }

    public function __toString()
    {
        return $this->pays;
    }
}
