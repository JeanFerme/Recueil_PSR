<?php

namespace App\Entity;

use App\Repository\PropOutSurvRefRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropOutSurvRefRepository::class)]
class PropOutSurvRef
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $proposition;

    #[ORM\ManyToMany(targetEntity: RecPSRTable::class, mappedBy: 'propOutSurv_id')]
    private $recPSRTables;

    public function __construct()
    {
        $this->recPSRTables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProposition(): ?string
    {
        return $this->proposition;
    }

    public function setProposition(string $proposition): self
    {
        $this->proposition = $proposition;

        return $this;
    }

    /**
     * @return Collection<int, RecPSRTable>
     */
    public function getRecPSRTables(): Collection
    {
        return $this->recPSRTables;
    }

    public function addRecPSRTable(RecPSRTable $recPSRTable): self
    {
        if (!$this->recPSRTables->contains($recPSRTable)) {
            $this->recPSRTables[] = $recPSRTable;
            $recPSRTable->addPropOutSurvId($this);
        }

        return $this;
    }

    public function removeRecPSRTable(RecPSRTable $recPSRTable): self
    {
        if ($this->recPSRTables->removeElement($recPSRTable)) {
            $recPSRTable->removePropOutSurvId($this);
        }

        return $this;
    }
}
