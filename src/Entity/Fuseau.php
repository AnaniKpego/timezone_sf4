<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\IsFalse;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FuseauRepository")
 */
class Fuseau
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
    private $nom_fuseau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $utc;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ville", mappedBy="fuseau")
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fuseau_pays;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pays_fr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villes_fr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villes_en;

    public function __construct()
    {
        $this->ville = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getNomFuseau(): ?string
    {
        return $this->nom_fuseau;
    }

    public function setNomFuseau(string $nom_fuseau): self
    {
        $this->nom_fuseau = $nom_fuseau;

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

    /**
     * @return Collection|Ville[]
     */
    public function getVille(): Collection
    {
        return $this->ville;
    }

    public function addVille(Ville $ville): self
    {
        if (!$this->ville->contains($ville)) {
            $this->ville[] = $ville;
            $ville->setFuseau($this);
        }

        return $this;
    }

    public function removeVille(Ville $ville): self
    {
        if ($this->ville->contains($ville)) {
            $this->ville->removeElement($ville);
            // set the owning side to null (unless already changed)
            if ($ville->getFuseau() === $this) {
                $ville->setFuseau(null);
            }
        }

        return $this;
    }

    public function getFuseauPays(): ?string
    {
        return $this->fuseau_pays;
    }

    public function setFuseauPays(?string $fuseau_pays): self
    {
        $this->fuseau_pays = $fuseau_pays;

        return $this;
    }

    public function getPaysFr(): ?string
    {
        return $this->pays_fr;
    }

    public function setPaysFr(?string $pays_fr): self
    {
        $this->pays_fr = $pays_fr;

        return $this;
    }

    public function __toString()
    {
      return $this->nom_fuseau;   // TODO: Implement __toString() method.
    }


    public function getFuseauHoraire(){
        date_default_timezone_set($this->nom_fuseau);
        $time = date("D, j F Y, H:i A");

        return $time;
    }

    public function getVillesFr(): ?string
    {
        return $this->villes_fr;
    }

    public function setVillesFr(?string $villes_fr): self
    {
        $this->villes_fr = $villes_fr;

        return $this;
    }

    public function getVillesEn(): ?string
    {
        return $this->villes_en;
    }

    public function setVillesEn(?string $villes_en): self
    {
        $this->villes_en = $villes_en;

        return $this;
    }
}
