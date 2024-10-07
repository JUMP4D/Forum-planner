<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Timeslot>
     */
    #[ORM\ManyToMany(targetEntity: Timeslot::class, inversedBy: 'teams')]
    private Collection $timeslot;

    /**
     * @var Collection<int, Timeslot>
     */
    #[ORM\ManyToMany(targetEntity: Timeslot::class, mappedBy: 'teams')]
    private Collection $timeslots;

    public function __construct()
    {
        $this->timeslot = new ArrayCollection();
        $this->timeslots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Timeslot>
     */
    public function getTimeslot(): Collection
    {
        return $this->timeslot;
    }

    public function addTimeslot(Timeslot $timeslot): static
    {
        if (!$this->timeslot->contains($timeslot)) {
            $this->timeslot->add($timeslot);
        }

        return $this;
    }

    public function removeTimeslot(Timeslot $timeslot): static
    {
        $this->timeslot->removeElement($timeslot);

        return $this;
    }

    /**
     * @return Collection<int, Timeslot>
     */
    public function getTimeslots(): Collection
    {
        return $this->timeslots;
    }

}
