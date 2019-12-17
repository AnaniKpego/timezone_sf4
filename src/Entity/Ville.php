<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville_fr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville_en;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fuseauhoraire", inversedBy="villes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fuseaux;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getVilleEn(): ?string
    {
        return $this->ville_en;
    }

    public function setVilleEn(?string $ville_en): self
    {
        $this->ville_en = $ville_en;

        return $this;
    }

    public function getFuseaux(): ?Fuseauhoraire
    {
        return $this->fuseaux;
    }

    public function setFuseaux(?Fuseauhoraire $fuseaux): self
    {
        $this->fuseaux = $fuseaux;

        return $this;
    }
}
