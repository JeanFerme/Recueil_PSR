<?php

namespace App\Entity\Main;

use App\Repository\Main\ListSurvRefRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListSurvRefRepository::class)
 */
class ListSurvRef
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\OneToMany(targetEntity=RecPSRTable::class, mappedBy="listSurv")
     */
    private $recPSRTables;

    public function __construct()
    {
        $this->recPSRTables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

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
            $recPSRTable->setListSurv($this);
        }

        return $this;
    }

    public function removeRecPSRTable(RecPSRTable $recPSRTable): self
    {
        if ($this->recPSRTables->removeElement($recPSRTable)) {
            // set the owning side to null (unless already changed)
            if ($recPSRTable->getListSurv() === $this) {
                $recPSRTable->setListSurv(null);
            }
        }

        return $this;
    }
}
