<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Appointment
 *
 * @ORM\Table(name="appointment", indexes={@ORM\Index(name="IDX_FE38F844D1DC2CFC", columns={"id_coach"}), @ORM\Index(name="IDX_FE38F844C4477E9B", columns={"id_patient"}), @ORM\Index(name="IDX_FE38F844AE3FD6E", columns={"id_schedule"})})
 * @ORM\Entity(repositoryClass="App\Repository\AppointmentRepository")
 */
class Appointment
{
    /**
     * @var \Coach
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Coach")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_coach", referencedColumnName="id_user")
     * })
     * @Groups({"appointment"})
     * @SerializedName("coach")
     */
    private $idCoach;

    /**
     * @var \Patient
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_patient", referencedColumnName="id_user")
     * })
     * @Groups({"appointment"})
     * @SerializedName("patient")
     */
    private $idPatient;

    /**
     * @var \Schedule
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Schedule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_schedule", referencedColumnName="id_schedule")
     * })
     * @Groups({"appointment"})
     * @SerializedName("schedule")
     */
    private $idSchedule;

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
