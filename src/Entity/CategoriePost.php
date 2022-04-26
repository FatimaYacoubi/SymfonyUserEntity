<?php

namespace App\Entity;

use App\Repository\CategoriePostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriePostRepository::class)
 */
class CategoriePost
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
    private $nom_categorie_post;

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="categoriePost")
     */
    private $Post;

    public function __construct()
    {
        $this->Post = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategoriePost(): ?string
    {
        return $this->nom_categorie_post;
    }

    public function setNomCategoriePost(string $nom_categorie_post): self
    {
        $this->nom_categorie_post = $nom_categorie_post;

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getPost(): Collection
    {
        return $this->Post;
    }

    public function addPost(Post $post): self
    {
        if (!$this->Post->contains($post)) {
            $this->Post[] = $post;
            $post->setCategoriePost($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->Post->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getCategoriePost() === $this) {
                $post->setCategoriePost(null);
            }
        }

        return $this;
    }
}
