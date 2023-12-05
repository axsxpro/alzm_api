<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Resources
 *
 * @ORM\Table(name="resources")
 * @ORM\Entity(repositoryClass="App\Repository\ResourcesRepository")
 */
class Resources
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_resources", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="resources_id_resources_seq", allocationSize=1, initialValue=1)
     *  @Groups({"plans", "resources"})
     */
    private $idResources;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Text", inversedBy="idResources")
     * @ORM\JoinTable(name="compose",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_resources", referencedColumnName="id_resources")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_text", referencedColumnName="id_text")
     *   }
     * )
     * @Groups({"plans","resources" })
     * @SerializedName("text")
     */
    private $idText = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Files", inversedBy="idResources")
     * @ORM\JoinTable(name="content",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_resources", referencedColumnName="id_resources")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_files", referencedColumnName="id_files")
     *   }
     * )
     * @Groups({"plans", "resources"})
     * @SerializedName("files")
     */
    private $idFiles = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plan", mappedBy="idResources")
     */
    private $idPlan = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idText = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idFiles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idPlan = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdResources(): ?int
    {
        return $this->idResources;
    }

    /**
     * @return Collection<int, Text>
     */
    public function getIdText(): Collection
    {
        return $this->idText;
    }

    public function addIdText(Text $idText): static
    {
        if (!$this->idText->contains($idText)) {
            $this->idText->add($idText);
        }

        return $this;
    }

    public function removeIdText(Text $idText): static
    {
        $this->idText->removeElement($idText);

        return $this;
    }

    /**
     * @return Collection<int, Files>
     */
    public function getIdFiles(): Collection
    {
        return $this->idFiles;
    }

    public function addIdFile(Files $idFile): static
    {
        if (!$this->idFiles->contains($idFile)) {
            $this->idFiles->add($idFile);
        }

        return $this;
    }

    public function removeIdFile(Files $idFile): static
    {
        $this->idFiles->removeElement($idFile);

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
            $idPlan->addIdResource($this);
        }

        return $this;
    }

    public function removeIdPlan(Plan $idPlan): static
    {
        if ($this->idPlan->removeElement($idPlan)) {
            $idPlan->removeIdResource($this);
        }

        return $this;
    }

}
