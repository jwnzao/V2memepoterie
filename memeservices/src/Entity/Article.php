<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $createArt;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, inversedBy="articles")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     */
    private $owner;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreateArt(): ?\DateTimeImmutable
    {
        return $this->createArt;
    }

    public function setCreateArt(?\DateTimeImmutable $createArt): self
   {
       $this->createArt = $createArt;
       return $this;
   }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

   public function getOwner(): ?User
   {
       return $this->owner;
   }

   public function setOwner(?User $owner): self
   {
       $this->owner = $owner;

       return $this;
   }  

  /*  public function getCreateAt(): ?\DateTimeImmutable
   {
       return $this->createAt;
   }
   public function setCreateAt(?\DateTimeImmutable $createdAt): self
   {
       $this->createdAt = $createdAt;
       return $this;
   } */
}
