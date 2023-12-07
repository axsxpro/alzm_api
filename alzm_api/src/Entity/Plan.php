<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Plan
 *
 * @ORM\Table(name="plan")
 * @ORM\Entity(repositoryClass="App\Repository\PlanRepository")
 */
class Plan
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_plan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="plan_id_plan_seq", allocationSize=1, initialValue=1)
     * @Groups({"plans","patients"})
     */
    private $idPlan;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     * @Assert\NotBlank(message="Field name cannot be blank")
     * @Groups({"plans", "patients"})
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Assert\NotBlank(message="Field description cannot be blank")
     * @Groups({"plans", "patients"})
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cost", type="decimal", precision=15, scale=2, nullable=true)
     * @Assert\NotBlank(message="Field cost cannot be blank")
     * @Groups({"plans","patients"})
     */
    private $cost;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Advantage", inversedBy="idPlan")
     * @ORM\JoinTable(name="plan_describe",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_plan", referencedColumnName="id_plan")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_advantage", referencedColumnName="id_advantage")
     *   }
     * )
     * @Groups({"plans"})
     * @SerializedName("advantages")
     */
    private $idAdvantage = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Resources", inversedBy="idPlan")
     * @ORM\JoinTable(name="allocated",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_plan", referencedColumnName="id_plan")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_resources", referencedColumnName="id_resources")
     *   }
     * )
     * @Groups({"plans"})
     * @SerializedName("resources")
     */
    private $idResources = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Patient", mappedBy="idPlan")
     * 
     */
    private $idUser = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idAdvantage = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idResources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idUser = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdPlan(): ?int
    {
        return $this->idPlan;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
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

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(?string $cost): static
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @return Collection<int, Advantage>
     */
    public function getIdAdvantage(): Collection
    {
        return $this->idAdvantage;
    }

    public function addIdAdvantage(Advantage $idAdvantage): static
    {
        if (!$this->idAdvantage->contains($idAdvantage)) {
            $this->idAdvantage->add($idAdvantage);
        }

        return $this;
    }

    public function removeIdAdvantage(Advantage $idAdvantage): static
    {
        $this->idAdvantage->removeElement($idAdvantage);

        return $this;
    }

    /**
     * @return Collection<int, Resources>
     */
    public function getIdResources(): Collection
    {
        return $this->idResources;
    }

    public function addIdResource(Resources $idResource): static
    {
        if (!$this->idResources->contains($idResource)) {
            $this->idResources->add($idResource);
        }

        return $this;
    }

    public function removeIdResource(Resources $idResource): static
    {
        $this->idResources->removeElement($idResource);

        return $this;
    }

    /**
     * @return Collection<int, Patient>
     */
    public function getIdUser(): Collection
    {
        return $this->idUser;
    }

    public function addIdUser(Patient $idUser): static
    {
        if (!$this->idUser->contains($idUser)) {
            $this->idUser->add($idUser);
            $idUser->addIdPlan($this);
        }

        return $this;
    }

    public function removeIdUser(Patient $idUser): static
    {
        if ($this->idUser->removeElement($idUser)) {
            $idUser->removeIdPlan($this);
        }

        return $this;
    }

}
