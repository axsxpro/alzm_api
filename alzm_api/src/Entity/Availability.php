<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * Availability
 *
 * @ORM\Table(name="availability", indexes={@ORM\Index(name="IDX_3FB7A2BF6B3CA4B", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="App\Repository\AvailabilityRepository")
 */
class Availability
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_availability", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="availability_id_availability_seq", allocationSize=1, initialValue=1)
     * @Groups({"availability"})
     */
    private $idAvailability;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_availability", type="date", nullable=false)
     * @Groups({"availability"})
     */
    private $dateAvailability;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="hour_start_slot", type="time", nullable=true)
     * @Groups({"availability"})
     */
    private $hourStartSlot;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="hour_end_slot", type="time", nullable=true)
     * @Groups({"availability"})
     */
    private $hourEndSlot;

    /**
     * @var \Coach
     *
     * @ORM\ManyToOne(targetEntity="Coach")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     * @Groups({"availability"})
     * @SerializedName("coach")
     */
    private $idUser;

    public function getIdAvailability(): ?int
    {
        return $this->idAvailability;
    }

    public function getDateAvailability(): ?\DateTimeInterface
    {
        return $this->dateAvailability;
    }

    public function setDateAvailability(\DateTimeInterface $dateAvailability): static
    {
        $this->dateAvailability = $dateAvailability;

        return $this;
    }

    public function getHourStartSlot(): ?\DateTimeInterface
    {
        return $this->hourStartSlot;
    }

    public function setHourStartSlot(?\DateTimeInterface $hourStartSlot): static
    {
        $this->hourStartSlot = $hourStartSlot;

        return $this;
    }

    public function getHourEndSlot(): ?\DateTimeInterface
    {
        return $this->hourEndSlot;
    }

    public function setHourEndSlot(?\DateTimeInterface $hourEndSlot): static
    {
        $this->hourEndSlot = $hourEndSlot;

        return $this;
    }

    public function getIdUser(): ?Coach
    {
        return $this->idUser;
    }

    public function setIdUser(?Coach $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }


}
