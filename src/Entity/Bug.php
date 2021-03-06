<?php

namespace App\Entity;

use App\Repository\BugRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass=BugRepository::class)
 */
class Bug
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    
   /** 
    * @ORM\Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
   */
    private $date;
    
    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="bugs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;
    
    /**
     * @ORM\ManyToOne(targetEntity=Priority::class, inversedBy="bugs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $priority;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bugs")
     */
    private $user;
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        
        return $this;
    }
    
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }
    
    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;
        
        return $this;
    }
    
    public function getStatus(): ?Status
    {
        return $this->status;
    }
    
    public function setStatus(?Status $status): self
    {
        $this->status = $status;
        
        return $this;
    }
    
    public function getPriority(): ?Priority
    {
        return $this->priority;
    }
    
    public function setPriority(?Priority $priority): self
    {
        $this->priority = $priority;
        
        return $this;
    }
    /**
     * @ORM\PrePersist
     */
    public function onPrePersistSetRegistrationDate()
    {
        $this->date = new \DateTime();
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
