<?php

namespace App\Entity\Codex;

use App\Repository\Codex\VUACTEURSACTEURRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VUACTEURSACTEURRepository::class)
 */
class VUACTEURSACTEUR
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $codeVU;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codeRoleAct;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicValide;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codeActeur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codeTigre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomActeurLong;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $adresseComplExpl;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $codePostExpl;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nomVilleExpl;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $complement;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $fax;

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

    public function getCodeRoleAct(): ?int
    {
        return $this->codeRoleAct;
    }

    public function setCodeRoleAct(?int $codeRoleAct): self
    {
        $this->codeRoleAct = $codeRoleAct;

        return $this;
    }

    public function isIndicValide(): ?bool
    {
        return $this->indicValide;
    }

    public function setIndicValide(?bool $indicValide): self
    {
        $this->indicValide = $indicValide;

        return $this;
    }

    public function getCodeActeur(): ?int
    {
        return $this->codeActeur;
    }

    public function setCodeActeur(?int $codeActeur): self
    {
        $this->codeActeur = $codeActeur;

        return $this;
    }

    public function getCodeTigre(): ?int
    {
        return $this->codeTigre;
    }

    public function setCodeTigre(?int $codeTigre): self
    {
        $this->codeTigre = $codeTigre;

        return $this;
    }

    public function getNomActeurLong(): ?string
    {
        return $this->nomActeurLong;
    }

    public function setNomActeurLong(?string $nomActeurLong): self
    {
        $this->nomActeurLong = $nomActeurLong;

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

    public function getAdresseComplExpl(): ?string
    {
        return $this->adresseComplExpl;
    }

    public function setAdresseComplExpl(?string $adresseComplExpl): self
    {
        $this->adresseComplExpl = $adresseComplExpl;

        return $this;
    }

    public function getCodePostExpl(): ?string
    {
        return $this->codePostExpl;
    }

    public function setCodePostExpl(?string $codePostExpl): self
    {
        $this->codePostExpl = $codePostExpl;

        return $this;
    }

    public function getNomVilleExpl(): ?string
    {
        return $this->nomVilleExpl;
    }

    public function setNomVilleExpl(?string $nomVilleExpl): self
    {
        $this->nomVilleExpl = $nomVilleExpl;

        return $this;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(?string $complement): self
    {
        $this->complement = $complement;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }
}
