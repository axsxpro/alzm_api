<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Advantage
 *
 * @ORM\Table(name="advantage")
 * @ORM\Entity(repositoryClass="App\Repository\AdvantageRepository")
 * 
 */
class Advantage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_advantage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="advantage_id_advantage_seq", allocationSize=1, initialValue=1)
     * @Groups({"plans", "advantages"})
     */
    private $idAdvantage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Groups({"plans", "advantages"})
     * 
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plan", mappedBy="idAdvantage")
     */
    private $idPlan = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPlan = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdAdvantage(): ?int
    {
        return $this->idAdvantage;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Plan>
     */
    public function getIdPlan(): Collection
    {
        return $this->idPlan;
    }

    public function addIdPlan(Plan $idPlan): static
    {
        if (!$this->idPlan->contains($idPlan)) {
            $this->idPlan->add($idPlan);
            $idPlan->addIdAdvantage($this);
        }

        return $this;
    }

    public function removeIdPlan(Plan $idPlan): static
    {
        if ($this->idPlan->removeElement($idPlan)) {
            $idPlan->removeIdAdvantage($this);
        }

        return $this;
    }

}
