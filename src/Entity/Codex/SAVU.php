<?php

namespace App\Entity\Codex;

use App\Repository\Codex\SAVURepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SAVURepository::class)]
class SAVU
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 8, nullable: true)]
    private $codeVU;

    #[ORM\Column(type: 'string', length: 8, nullable: true)]
    private $codeCIS;

    #[ORM\Column(type: 'string', length: 12, nullable: true)]
    private $codeDossier;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nomVU;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $numElement;

    #[ORM\Column(type: 'string', length: 9, nullable: true)]
    private $codeSubstance;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $numComposant;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $codeUniteDosage;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $codeNature;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $dosageLibraTypo;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $dosageLibra;

    #[ORM\Column(type: 'string', length: 80, nullable: true)]
    private $libCourt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nomSubstance;

    #[ORM\Column(type: 'string', length: 9, nullable: true)]
    private $codeProduit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeVU(): ?string
    {
        return $this->codeVU;
    }

    public function setCodeVU(?string $codeVU): self
    {
        $this->codeVU = $codeVU;

        return $this;
    }

    public function getCodeCIS(): ?string
    {
        return $this->codeCIS;
    }

    public function setCodeCIS(?string $codeCIS): self
    {
        $this->codeCIS = $codeCIS;

        return $this;
    }

    public function getCodeDossier(): ?string
    {
        return $this->codeDossier;
    }

    public function setCodeDossier(?string $codeDossier): self
    {
        $this->codeDossier = $codeDossier;

        return $this;
    }

    public function getNomVU(): ?string
    {
        return $this->nomVU;
    }

    public function setNomVU(?string $nomVU): self
    {
        $this->nomVU = $nomVU;

        return $this;
    }

    public function getNumElement(): ?int
    {
        return $this->numElement;
    }

    public function setNumElement(?int $numElement): self
    {
        $this->numElement = $numElement;

        return $this;
    }

    public function getCodeSubstance(): ?string
    {
        return $this->codeSubstance;
    }

    public function setCodeSubstance(?string $codeSubstance): self
    {
        $this->codeSubstance = $codeSubstance;

        return $this;
    }

    public function getNumComposant(): ?int
    {
        return $this->numComposant;
    }

    public function setNumComposant(?int $numComposant): self
    {
        $this->numComposant = $numComposant;

        return $this;
    }

    public function getCodeUniteDosage(): ?int
    {
        return $this->codeUniteDosage;
    }

    public function setCodeUniteDosage(?int $codeUniteDosage): self
    {
        $this->codeUniteDosage = $codeUniteDosage;

        return $this;
    }

    public function getCodeNature(): ?int
    {
        return $this->codeNature;
    }

    public function setCodeNature(?int $codeNature): self
    {
        $this->codeNature = $codeNature;

        return $this;
    }

    public function getDosageLibraTypo(): ?string
    {
        return $this->dosageLibraTypo;
    }

    public function setDosageLibraTypo(?string $dosageLibraTypo): self
    {
        $this->dosageLibraTypo = $dosageLibraTypo;

        return $this;
    }

    public function getDosageLibra(): ?string
    {
        return $this->dosageLibra;
    }

    public function setDosageLibra(?string $dosageLibra): self
    {
        $this->dosageLibra = $dosageLibra;

        return $this;
    }

    public function getLibCourt(): ?string
    {
        return $this->libCourt;
    }

    public function setLibCourt(?string $libCourt): self
    {
        $this->libCourt = $libCourt;

        return $this;
    }

    public function getNomSubstance(): ?string
    {
        return $this->nomSubstance;
    }

    public function setNomSubstance(?string $nomSubstance): self
    {
        $this->nomSubstance = $nomSubstance;

        return $this;
    }

    public function getCodeProduit(): ?string
    {
        return $this->codeProduit;
    }

    public function setCodeProduit(?string $codeProduit): self
    {
        $this->codeProduit = $codeProduit;

        return $this;
    }
}
