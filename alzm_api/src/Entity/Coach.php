<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Coach
 *
 * @ORM\Table(name="coach")
 * @ORM\Entity(repositoryClass="App\Repository\CoachRepository")
 */
class Coach
{   
    
    /**
     * @var \AppUser
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     * @Groups({"coach","course","planning","availability","appointment"})
     * @SerializedName("coachInformation")
     */
    private $idUser;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isconfirmed", type="boolean", nullable=true)
     * @Groups({"coach","course", "planning","availability" })
     */
    private $isconfirmed;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hourly_rate", type="decimal", precision=8, scale=2, nullable=true)
     * @Groups({"coach","course","planning","availability"})
     */
    private $hourlyRate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Course", inversedBy="idUser")
     * @ORM\JoinTable(name="assign",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_course", referencedColumnName="id_course")
     *   }
     * )
     * @Groups({"coach"})
     * @SerializedName("course")
     */
    private $idCourse = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCourse = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function isIsconfirmed(): ?bool
    {
        return $this->isconfirmed;
    }

    public function setIsconfirmed(?bool $isconfirmed): static
    {
        $this->isconfirmed = $isconfirmed;

        return $this;
    }

    public function getHourlyRate(): ?string
    {
        return $this->hourlyRate;
    }

    public function setHourlyRate(?string $hourlyRate): static
    {
        $this->hourlyRate = $hourlyRate;

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
     * @return Collection<int, Course>
     */
    public function getIdCourse(): Collection
    {
        return $this->idCourse;
    }

    public function addIdCourse(Course $idCourse): static
    {
        if (!$this->idCourse->contains($idCourse)) {
            $this->idCourse->add($idCourse);
        }

        return $this;
    }

    public function removeIdCourse(Course $idCourse): static
    {
        $this->idCourse->removeElement($idCourse);

        return $this;
    }

}
