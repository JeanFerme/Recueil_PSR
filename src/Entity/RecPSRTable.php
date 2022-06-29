<?php

namespace App\Entity;

use App\Repository\RecPSRTableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecPSRTableRepository::class)]
class RecPSRTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 400)]
    private $substance;

    #[ORM\Column(type: 'string', length: 300)]
    private $produit;

    #[ORM\Column(type: 'string', length: 10)]
    private $code_atc;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $niveau_de_risque;

    #[ORM\Column(type: 'string', length: 1024)]
    private $problematique;

    #[ORM\Column(type: 'boolean')]
    private $mesure_impact;

    #[ORM\Column(type: 'string', length: 1024, nullable: true)]
    private $resultat_surv;

    #[ORM\ManyToOne(targetEntity: OrigineRef::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $origine_id;

    #[ORM\ManyToOne(targetEntity: DMMRef::class)]
    private $dmm_id;

    #[ORM\ManyToMany(targetEntity: PropOutSurvRef::class, inversedBy: 'recPSRTables')]
    private $propOutSurv;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $priorisation;

    #[ORM\Column(type: 'string', length: 1024, nullable: true)]
    private $mesMaitRisk;

    #[ORM\ManyToOne(targetEntity: MesImpact::class)]
    private $mesImpact;

    #[ORM\Column(type: 'string', length: 1024, nullable: true)]
    private $mesImpactComment;

    #[ORM\Column(type: 'string', length: 2048, nullable: true)]
    private $commentaire;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $listSurv;

    #[ORM\Column(type: 'boolean')]
    private $visible;

    public function __construct()
    {
        $this->propOutSurv = new ArrayCollection();
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

    public function getNiveauDeRisque(): ?int
    {
        return $this->niveau_de_risque;
    }

    public function setNiveauDeRisque(?int $niveau_de_risque): self
    {
        $this->niveau_de_risque = $niveau_de_risque;

        return $this;
    }

    public function getProblematique(): ?string
    {
        return $this->problematique;
    }

    public function setProblematique(string $problematique): self
    {
        $this->problematique = $problematique;

        return $this;
    }

    public function isMesureImpact(): ?bool
    {
        return $this->mesure_impact;
    }

    public function setMesureImpact(bool $mesure_impact): self
    {
        $this->mesure_impact = $mesure_impact;

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

    public function getOrigineId(): ?OrigineRef
    {
        return $this->origine_id;
    }

    public function setOrigineId(OrigineRef $origine_id): self
    {
        $this->origine_id = $origine_id;

        return $this;
    }

    public function getDmmId(): ?DMMRef
    {
        return $this->dmm_id;
    }

    public function setDmmId(?DMMRef $dmm_id): self
    {
        $this->dmm_id = $dmm_id;

        return $this;
    }

    /**
     * @return Collection<int, PropOutSurvRef>
     */
    public function getPropOutSurvId(): Collection
    {
        return $this->propOutSurv;
    }

    public function addPropOutSurvId(PropOutSurvRef $propOutSurvId): self
    {
        if (!$this->propOutSurv->contains($propOutSurvId)) {
            $this->propOutSurv[] = $propOutSurvId;
        }

        return $this;
    }

    public function removePropOutSurvId(PropOutSurvRef $propOutSurvId): self
    {
        $this->propOutSurv->removeElement($propOutSurvId);

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
