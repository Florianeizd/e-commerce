<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
use JetBrains\PhpStorm\Pure;
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Length(min=3, max=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=3, max=255)
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     * @Assert\Range(min=1, max=9999)
     */
    private $prix;

    /**
<<<<<<< HEAD
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Attachment::class, cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinTable(name="article_attachment",
     *      joinColumns={@ORM\JoinColumn(name="article_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="attachment_id", referencedColumnName="id")}
     * )
     */
    private $attachments;
=======
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="article", orphanRemoval=true)
     */
    private $avis;

    /**
<<<<<<< HEAD
     * @ORM\OneToMany(targetEntity=OrderDetail::class, mappedBy="article")
     */
    private $orderDetails;

    #[Pure]
    public function __construct()
    {
        $this->attachments = new ArrayCollection();
        $this->orderDetails = new ArrayCollection();
    }

    /**
     * @return int|null
     */
=======
     * @ORM\OneToMany(targetEntity=Attachment::class, mappedBy="article")
     */
    private $attachments;
    


    public function __construct()
    {
        $this->avis = new ArrayCollection();
        $this->attachments = new ArrayCollection();
    }

>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
    /**
     * @return string|null
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function getNom(): ?string
    {
        return $this->nom;
    }

<<<<<<< HEAD
    /**
     * @param string $nom
     * @return $this
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return string|null
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function getDescription(): ?string
    {
        return $this->description;
    }

<<<<<<< HEAD
    /**
     * @param string $description
     * @return $this
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return string|null
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function getPrix(): ?string
    {
        return $this->prix;
    }

<<<<<<< HEAD
    /**
     * @param string $prix
     * @return $this
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     * @return $this
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Attachment[]
     */
    public function getAttachments(): Collection
    {
        return $this->attachments;
    }

    /**
     * @param Attachment $attachment
     * @return $this
     */
    public function addAttachment(Attachment $attachment): self
    {
        if (!$this->attachments->contains($attachment)) {
            $this->attachments[] = $attachment;
        }

        return $this;
    }

    /**
     * @param Attachment $attachment
     * @return $this
     */
    public function removeAttachment(Attachment $attachment): self
    {
        if ($this->attachments->contains($attachment)) {
            $this->attachments->removeElement($attachment);
        }
=======
    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
            $avi->setArticle($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getArticle() === $this) {
                $avi->setArticle(null);
            }
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return Collection|OrderDetail[]
     */
    public function getOrderDetails(): Collection
    {
        return $this->orderDetails;
    }

    public function addOrderDetail(OrderDetail $orderDetail): self
    {
        if (!$this->orderDetails->contains($orderDetail)) {
            $this->orderDetails[] = $orderDetail;
            $orderDetail->setArticle($this);
=======
     * @return Collection|Attachment[]
     */
    public function getAttachments(): Collection
    {
        return $this->attachments;
    }

    public function addAttachment(Attachment $attachment): self
    {
        if (!$this->attachments->contains($attachment)) {
            $this->attachments[] = $attachment;
            $attachment->setArticle($this);
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeOrderDetail(OrderDetail $orderDetail): self
    {
        if ($this->orderDetails->removeElement($orderDetail)) {
            // set the owning side to null (unless already changed)
            if ($orderDetail->getArticle() === $this) {
                $orderDetail->setArticle(null);
=======
    public function removeAttachment(Attachment $attachment): self
    {
        if ($this->attachments->removeElement($attachment)) {
            // set the owning side to null (unless already changed)
            if ($attachment->getArticle() === $this) {
                $attachment->setArticle(null);
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
            }
        }

        return $this;
    }
<<<<<<< HEAD

=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
}
