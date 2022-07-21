<?php

namespace App\Entity\Main;

use App\Repository\Main\RecPSRTableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecPSRTableRepository::class)
 */
class RecPSRTable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     */
    private $substance;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $produit;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $code_atc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $niveau_risque;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $problematique;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $resultat_surv;

    /**
     * @ORM\ManyToOne(targetEntity=OrigineRef::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $origine;

    /**
     * @ORM\ManyToOne(targetEntity=DMMRef::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $dmm;

    /**
     * @ORM\ManyToMany(targetEntity=PropOutSurvRef::class, inversedBy="recPSRTables")
     */
    private $propSurv;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priorisation;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $mesMaitRisk;

    /**
     * @ORM\ManyToOne(targetEntity=MesImpact::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $mesImpact;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $mesImpactComment;

    /**
     * @ORM\Column(type="string", length=2048, nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $listSurv;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible;

    public function __construct()
    {
        $this->propSurv = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubstance(): ?string
    {
        return $this->substance;
    }

    public function setSubstance(string $substance): self
    {
        $this->substance = $substance;

        return $this;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(string $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getCodeAtc(): ?string
    {
        return $this->code_atc;
    }

    public function setCodeAtc(string $code_atc): self
    {
        $this->code_atc = $code_atc;

        return $this;
    }

    public function getNiveauRisque(): ?int
    {
        return $this->niveau_risque;
    }

    public function setNiveauRisque(?int $niveau_risque): self
    {
        $this->niveau_risque = $niveau_risque;

        return $this;
    }

    public function getProblematique(): ?string
    {
        return $this->problematique;
    }

    public function setProblematique(?string $problematique): self
    {
        $this->problematique = $problematique;

        return $this;
    }

    public function getResultatSurv(): ?string
    {
        return $this->resultat_surv;
    }

    public function setResultatSurv(?string $resultat_surv): self
    {
        $this->resultat_surv = $resultat_surv;

        return $this;
    }

    public function getOrigine(): ?OrigineRef
    {
        return $this->origine;
    }

    public function setOrigine(?OrigineRef $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    public function getDmm(): ?DMMRef
    {
        return $this->dmm;
    }

    public function setDmm(?DMMRef $dmm): self
    {
        $this->dmm = $dmm;

        return $this;
    }

    /**
     * @return Collection<int, PropOutSurvRef>
     */
    public function getPropSurv(): Collection
    {
        return $this->propSurv;
    }

    public function addPropSurv(PropOutSurvRef $propSurv): self
    {
        if (!$this->propSurv->contains($propSurv)) {
            $this->propSurv[] = $propSurv;
        }

        return $this;
    }

    public function removePropSurv(PropOutSurvRef $propSurv): self
    {
        $this->propSurv->removeElement($propSurv);

        return $this;
    }

    public function getPriorisation(): ?int
    {
        return $this->priorisation;
    }

    public function setPriorisation(?int $priorisation): self
    {
        $this->priorisation = $priorisation;

        return $this;
    }

    public function getMesMaitRisk(): ?string
    {
        return $this->mesMaitRisk;
    }

    public function setMesMaitRisk(?string $mesMaitRisk): self
    {
        $this->mesMaitRisk = $mesMaitRisk;

        return $this;
    }

    public function getMesImpact(): ?MesImpact
    {
        return $this->mesImpact;
    }

    public function setMesImpact(?MesImpact $mesImpact): self
    {
        $this->mesImpact = $mesImpact;

        return $this;
    }

    public function getMesImpactComment(): ?string
    {
        return $this->mesImpactComment;
    }

    public function setMesImpactComment(?string $mesImpactComment): self
    {
        $this->mesImpactComment = $mesImpactComment;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getListSurv(): ?string
    {
        return $this->listSurv;
    }

    public function setListSurv(?string $listSurv): self
    {
        $this->listSurv = $listSurv;

        return $this;
    }

    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }
}
