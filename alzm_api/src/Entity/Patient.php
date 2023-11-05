<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 *
 */
class Patient
{    


    /**
     * @var \AppUser
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * }
     * )
     * @Groups({"patients", "transaction", "appointment"})
     * @SerializedName("patientInformation")
     */
    private $idUser;


    /**
     * @var string|null
     *
     * @ORM\Column(name="sold", type="decimal", precision=15, scale=2, nullable=true)
     * @Groups({"patients"})
     */
    private $sold;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plan", inversedBy="idUser")
     * @ORM\JoinTable(name="subscribe",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_plan", referencedColumnName="id_plan")
     *   }
     * )
     * @Groups({"patients"})
     * @SerializedName("planSubscribe")
     * 
     */
    private $idPlan = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPlan = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getSold(): ?string
    {
        return $this->sold;
    }

    public function setSold(?string $sold): static
    {
        $this->sold = $sold;

        return $this;
    }

    public function getIdUser(): ?AppUser
    {
        return $this->idUser;
    }

    public function setIdUser(?AppUser $idUser): static
    {
        $this->idUser = $idUser;

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
        }

        return $this;
    }

    public function removeIdPlan(Plan $idPlan): static
    {
        $this->idPlan->removeElement($idPlan);

        return $this;
    }
}
