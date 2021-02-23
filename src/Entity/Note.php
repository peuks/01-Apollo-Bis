<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $grade;

    /**
     * @ORM\OneToMany(targetEntity=NormeEnvironnementale::class, mappedBy="note")
     */
    private $norme;

    public function __construct()
    {
        $this->norme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(?string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return Collection|NormeEnvironnementale[]
     */
    public function getNorme(): Collection
    {
        return $this->norme;
    }

    public function addNorme(NormeEnvironnementale $norme): self
    {
        if (!$this->norme->contains($norme)) {
            $this->norme[] = $norme;
            $norme->setNote($this);
        }

        return $this;
    }

    public function removeNorme(NormeEnvironnementale $norme): self
    {
        if ($this->norme->removeElement($norme)) {
            // set the owning side to null (unless already changed)
            if ($norme->getNote() === $this) {
                $norme->setNote(null);
            }
        }

        return $this;
    }
}
