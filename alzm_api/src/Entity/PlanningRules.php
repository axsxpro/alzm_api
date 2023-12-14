<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PlanningRules
 *
 * @ORM\Table(name="planning_rules", indexes={@ORM\Index(name="IDX_183623A36B3CA4B", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="App\Repository\PlanningRulesRepository")
 */
class PlanningRules
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_planning_rules", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="planning_rules_id_planning_rules_seq", allocationSize=1, initialValue=1)
     * @Groups({"planning"})
     */
    private $idPlanningRules;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="minimal_time_slot", type="time", nullable=true)
     * @Assert\NotBlank(message="Field minimalTimeSlot cannot be blank")
     * @Groups({"planning"})
     */
    private $minimalTimeSlot;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="maximal_time_slot", type="time", nullable=true)
     * @Assert\NotBlank(message="Field maximalTimeSlot cannot be blank")
     * @Groups({"planning"})
     */
    private $maximalTimeSlot;

    /**
     * @var string|null
     *
     * @ORM\Column(name="work_days", type="string", length=7, nullable=true)
     * @Assert\NotBlank(message="Field workDays cannot be blank")
     * @Groups({"planning"})
     */
    private $workDays;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="work_hours_start", type="time", nullable=true)
     * @Assert\NotBlank(message="Field workHoursStart cannot be blank")
     * @Groups({"planning"})
     */
    private $workHoursStart;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="work_hours_end", type="time", nullable=true)
     * @Assert\NotBlank(message="Field workHoursEnd cannot be blank")
     * @Groups({"planning"})
     */
    private $workHoursEnd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="time_between_appointments", type="string", nullable=true)
     * @Assert\NotBlank(message="Field timeBetweenAppointments cannot be blank")
     * @Groups({"planning"})
     */
    private $timeBetweenAppointments;

    /**
     * @var \Coach
     *
     * @ORM\ManyToOne(targetEntity="Coach")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     * @Groups({"planning"})
     * @SerializedName("coach")
     * 
     */
    private $idUser;

    public function getIdPlanningRules(): ?int
    {
        return $this->idPlanningRules;
    }

    public function getMinimalTimeSlot(): ?\DateTimeInterface
    {
        return $this->minimalTimeSlot;
    }

    public function setMinimalTimeSlot(?\DateTimeInterface $minimalTimeSlot): static
    {
        $this->minimalTimeSlot = $minimalTimeSlot;

        return $this;
    }

    public function getMaximalTimeSlot(): ?\DateTimeInterface
    {
        return $this->maximalTimeSlot;
    }

    public function setMaximalTimeSlot(?\DateTimeInterface $maximalTimeSlot): static
    {
        $this->maximalTimeSlot = $maximalTimeSlot;

        return $this;
    }

    public function getWorkDays(): ?string
    {
        return $this->workDays;
    }

    public function setWorkDays(?string $workDays): static
    {
        $this->workDays = $workDays;

        return $this;
    }

    public function getWorkHoursStart(): ?\DateTimeInterface
    {
        return $this->workHoursStart;
    }

    public function setWorkHoursStart(?\DateTimeInterface $workHoursStart): static
    {
        $this->workHoursStart = $workHoursStart;

        return $this;
    }

    public function getWorkHoursEnd(): ?\DateTimeInterface
    {
        return $this->workHoursEnd;
    }

    public function setWorkHoursEnd(?\DateTimeInterface $workHoursEnd): static
    {
        $this->workHoursEnd = $workHoursEnd;

        return $this;
    }

    public function getTimeBetweenAppointments(): ?string
    {
        return $this->timeBetweenAppointments;
    }

    public function setTimeBetweenAppointments(?string $timeBetweenAppointments): static
    {
        $this->timeBetweenAppointments = $timeBetweenAppointments;

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
