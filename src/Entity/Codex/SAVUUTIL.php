<?php

namespace App\Entity\Codex;

use App\Repository\Codex\SAVUUTILRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SAVUUTILRepository::class)
 */
class SAVUUTIL
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomVU;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private $dbo_Autorisation_libAbr;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private $dbo_ClasseATC_libAbr;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $dbo_ClasseATC_libCourt;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private $dbo_StatutSpeci_libAbr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomSubstance;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $DP;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $codeVU;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $codeCIS;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $codeDossier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomContactLibra;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $adresseContact;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $adresseCompl;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $codePost;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nomVille;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $telContact;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $faxContact;

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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private $codeContact;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codeActeur;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDboAutorisationLibAbr(): ?string
    {
        return $this->dbo_Autorisation_libAbr;
    }

    public function setDboAutorisationLibAbr(?string $dbo_Autorisation_libAbr): self
    {
        $this->dbo_Autorisation_libAbr = $dbo_Autorisation_libAbr;

        return $this;
    }

    public function getDboClasseATCLibAbr(): ?string
    {
        return $this->dbo_ClasseATC_libAbr;
    }

    public function setDboClasseATCLibAbr(?string $dbo_ClasseATC_libAbr): self
    {
        $this->dbo_ClasseATC_libAbr = $dbo_ClasseATC_libAbr;

        return $this;
    }

    public function getDboClasseATCLibCourt(): ?string
    {
        return $this->dbo_ClasseATC_libCourt;
    }

    public function setDboClasseATCLibCourt(?string $dbo_ClasseATC_libCourt): self
    {
        $this->dbo_ClasseATC_libCourt = $dbo_ClasseATC_libCourt;

        return $this;
    }

    public function getDboStatutSpeciLibAbr(): ?string
    {
        return $this->dbo_StatutSpeci_libAbr;
    }

    public function setDboStatutSpeciLibAbr(?string $dbo_StatutSpeci_libAbr): self
    {
        $this->dbo_StatutSpeci_libAbr = $dbo_StatutSpeci_libAbr;

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

    public function getDP(): ?string
    {
        return $this->DP;
    }

    public function setDP(?string $DP): self
    {
        $this->DP = $DP;

        return $this;
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

    public function getNomContactLibra(): ?string
    {
        return $this->nomContactLibra;
    }

    public function setNomContactLibra(?string $nomContactLibra): self
    {
        $this->nomContactLibra = $nomContactLibra;

        return $this;
    }

    public function getAdresseContact(): ?string
    {
        return $this->adresseContact;
    }

    public function setAdresseContact(?string $adresseContact): self
    {
        $this->adresseContact = $adresseContact;

        return $this;
    }

    public function getAdresseCompl(): ?string
    {
        return $this->adresseCompl;
    }

    public function setAdresseCompl(?string $adresseCompl): self
    {
        $this->adresseCompl = $adresseCompl;

        return $this;
    }

    public function getCodePost(): ?string
    {
        return $this->codePost;
    }

    public function setCodePost(?string $codePost): self
    {
        $this->codePost = $codePost;

        return $this;
    }

    public function getNomVille(): ?string
    {
        return $this->nomVille;
    }

    public function setNomVille(?string $nomVille): self
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function getTelContact(): ?string
    {
        return $this->telContact;
    }

    public function setTelContact(?string $telContact): self
    {
        $this->telContact = $telContact;

        return $this;
    }

    public function getFaxContact(): ?string
    {
        return $this->faxContact;
    }

    public function setFaxContact(?string $faxContact): self
    {
        $this->faxContact = $faxContact;

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

    public function getCodeContact(): ?string
    {
        return $this->codeContact;
    }

    public function setCodeContact(?string $codeContact): self
    {
        $this->codeContact = $codeContact;

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
}
