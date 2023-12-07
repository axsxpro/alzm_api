<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Appointment
 *
 * @ORM\Table(name="appointment", indexes={@ORM\Index(name="IDX_FE38F844D1DC2CFC", columns={"id_coach"}), @ORM\Index(name="IDX_FE38F844C4477E9B", columns={"id_patient"}), @ORM\Index(name="IDX_FE38F844AE3FD6E", columns={"id_schedule"})})
 * @ORM\Entity(repositoryClass="App\Repository\AppointmentRepository")
 */
class Appointment
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\Column(name="id_appointment", type="integer", nullable=false)
     * @Groups({"appointment"})
     */
    private $idAppointment;

    /**
     * @var \Coach
     *
     * @ORM\ManyToOne(targetEntity="Coach")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_coach", referencedColumnName="id_user")
     * })
     * @Groups({"appointment"})
     * @SerializedName("coach")
     * @Assert\NotBlank(message="Field idCoach cannot be blank")
     */
    private $idCoach;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_patient", referencedColumnName="id_user")
     * })
     * @Groups({"appointment"})
     * @SerializedName("patient")
     * @Assert\NotBlank(message="Field idPatient cannot be blank")
     */
    private $idPatient;

    /**
     * @var \Schedule
     *
     * @ORM\ManyToOne(targetEntity="Schedule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_schedule", referencedColumnName="id_schedule")
     * })
     * @Groups({"appointment"})
     * @SerializedName("schedule")
     * @Assert\NotBlank(message="Field idSchedule cannot be blank")
     */
    private $idSchedule;


    public function getIdAppointment(): ?int
    {
        return $this->idAppointment;
    }


    public function getIdCoach(): ?Coach
    {
        return $this->idCoach;
    }

    public function setIdCoach(?Coach $idCoach): static
    {
        $this->idCoach = $idCoach;

        return $this;
    }

    public function getIdPatient(): ?Patient
    {
        return $this->idPatient;
    }

    public function setIdPatient(?Patient $idPatient): static
    {
        $this->idPatient = $idPatient;

        return $this;
    }

    public function getIdSchedule(): ?Schedule
    {
        return $this->idSchedule;
    }

    public function setIdSchedule(?Schedule $idSchedule): static
    {
        $this->idSchedule = $idSchedule;

        return $this;
    }
}
