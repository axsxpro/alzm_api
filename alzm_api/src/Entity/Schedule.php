<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Schedule
 *
 * @ORM\Table(name="schedule")
 * @ORM\Entity(repositoryClass="App\Repository\ScheduleRepository")
 */
class Schedule
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_schedule", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="schedule_id_schedule_seq", allocationSize=1, initialValue=1)
     * @Groups({"appointment"})
     */
    private $idSchedule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="week_number", type="date", nullable=false)
     * @Assert\NotBlank(message="Field weekNumber cannot be blank")
     * @Groups({"appointment"})
     */
    private $weekNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="year_date", type="integer", nullable=false)
     * @Assert\NotBlank(message="Field yearDate cannot be blank")
     * @Groups({"appointment"})
     */
    private $yearDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hour_start_date", type="time", nullable=false)
     * @Assert\NotBlank(message="Field hourStarDate cannot be blank")
     * @Groups({"appointment"})
     */
    private $hourStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hour_end_date", type="time", nullable=false)
     * @Assert\NotBlank(message="Field hourEndDate cannot be blank")
     * @Groups({"appointment"})
     */
    private $hourEndDate;

    public function getIdSchedule(): ?int
    {
        return $this->idSchedule;
    }

    public function getWeekNumber(): ?\DateTimeInterface
    {
        return $this->weekNumber;
    }

    public function setWeekNumber(\DateTimeInterface $weekNumber): static
    {
        $this->weekNumber = $weekNumber;

        return $this;
    }

    public function getYearDate(): ?int
    {
        return $this->yearDate;
    }

    public function setYearDate(int $yearDate): static
    {
        $this->yearDate = $yearDate;

        return $this;
    }

    public function getHourStartDate(): ?\DateTimeInterface
    {
        return $this->hourStartDate;
    }

    public function setHourStartDate(\DateTimeInterface $hourStartDate): static
    {
        $this->hourStartDate = $hourStartDate;

        return $this;
    }

    public function getHourEndDate(): ?\DateTimeInterface
    {
        return $this->hourEndDate;
    }

    public function setHourEndDate(\DateTimeInterface $hourEndDate): static
    {
        $this->hourEndDate = $hourEndDate;

        return $this;
    }


}
