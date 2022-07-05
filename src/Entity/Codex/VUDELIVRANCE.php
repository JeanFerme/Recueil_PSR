<?php

namespace App\Entity\Codex;

use App\Repository\Codex\VUDELIVRANCERepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VUDELIVRANCERepository::class)
 */
class VUDELIVRANCE
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
    private $codeDelivrance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libLong;

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

    public function getCodeDelivrance(): ?int
    {
        return $this->codeDelivrance;
    }

    public function setCodeDelivrance(?int $codeDelivrance): self
    {
        $this->codeDelivrance = $codeDelivrance;

        return $this;
    }

    public function getLibLong(): ?string
    {
        return $this->libLong;
    }

    public function setLibLong(?string $libLong): self
    {
        $this->libLong = $libLong;

        return $this;
    }
}
