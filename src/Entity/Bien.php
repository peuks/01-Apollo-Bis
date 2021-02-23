<?php

namespace App\Entity;

use App\Repository\BienRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BienRepository::class)
 */
class Bien
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $superficie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $piece;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chambre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $etage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $loyer;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $charge;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDisponibilite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $locationLigne;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $caution;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $monopropriete;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $eauIndiv;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fibre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tnt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cable;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chauffageInd;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numeroLot;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $irl;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $provisionCharge;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $afficherTelephone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $loyerReference;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuperficie(): ?int
    {
        return $this->superficie;
    }

    public function setSuperficie(?int $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getPiece(): ?int
    {
        return $this->piece;
    }

    public function setPiece(?int $piece): self
    {
        $this->piece = $piece;

        return $this;
    }

    public function getChambre(): ?int
    {
        return $this->chambre;
    }

    public function setChambre(?int $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(?int $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getLoyer(): ?int
    {
        return $this->loyer;
    }

    public function setLoyer(?int $loyer): self
    {
        $this->loyer = $loyer;

        return $this;
    }

    public function getCharge(): ?int
    {
        return $this->charge;
    }

    public function setCharge(?int $charge): self
    {
        $this->charge = $charge;

        return $this;
    }

    public function getDateDisponibilite(): ?\DateTimeInterface
    {
        return $this->dateDisponibilite;
    }

    public function setDateDisponibilite(?\DateTimeInterface $dateDisponibilite): self
    {
        $this->dateDisponibilite = $dateDisponibilite;

        return $this;
    }

    public function getLocationLigne(): ?bool
    {
        return $this->locationLigne;
    }

    public function setLocationLigne(?bool $locationLigne): self
    {
        $this->locationLigne = $locationLigne;

        return $this;
    }

    public function getCaution(): ?int
    {
        return $this->caution;
    }

    public function setCaution(?int $caution): self
    {
        $this->caution = $caution;

        return $this;
    }

    public function getMonopropriete(): ?bool
    {
        return $this->monopropriete;
    }

    public function setMonopropriete(?bool $monopropriete): self
    {
        $this->monopropriete = $monopropriete;

        return $this;
    }

    public function getEauIndiv(): ?bool
    {
        return $this->eauIndiv;
    }

    public function setEauIndiv(?bool $eauIndiv): self
    {
        $this->eauIndiv = $eauIndiv;

        return $this;
    }

    public function getFibre(): ?bool
    {
        return $this->fibre;
    }

    public function setFibre(?bool $fibre): self
    {
        $this->fibre = $fibre;

        return $this;
    }

    public function getTnt(): ?bool
    {
        return $this->tnt;
    }

    public function setTnt(?bool $tnt): self
    {
        $this->tnt = $tnt;

        return $this;
    }

    public function getCable(): ?bool
    {
        return $this->cable;
    }

    public function setCable(?bool $cable): self
    {
        $this->cable = $cable;

        return $this;
    }

    public function getChauffageInd(): ?bool
    {
        return $this->chauffageInd;
    }

    public function setChauffageInd(?bool $chauffageInd): self
    {
        $this->chauffageInd = $chauffageInd;

        return $this;
    }

    public function getNumeroLot(): ?int
    {
        return $this->numeroLot;
    }

    public function setNumeroLot(?int $numeroLot): self
    {
        $this->numeroLot = $numeroLot;

        return $this;
    }

    public function getIrl(): ?int
    {
        return $this->irl;
    }

    public function setIrl(?int $irl): self
    {
        $this->irl = $irl;

        return $this;
    }

    public function getProvisionCharge(): ?int
    {
        return $this->provisionCharge;
    }

    public function setProvisionCharge(?int $provisionCharge): self
    {
        $this->provisionCharge = $provisionCharge;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAfficherTelephone(): ?bool
    {
        return $this->afficherTelephone;
    }

    public function setAfficherTelephone(?bool $afficherTelephone): self
    {
        $this->afficherTelephone = $afficherTelephone;

        return $this;
    }

    public function getLoyerReference(): ?bool
    {
        return $this->loyerReference;
    }

    public function setLoyerReference(bool $loyerReference): self
    {
        $this->loyerReference = $loyerReference;

        return $this;
    }
}
