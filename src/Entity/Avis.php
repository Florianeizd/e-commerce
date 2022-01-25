<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
use App\Entity\Article;
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034

/**
 * @ORM\Entity(repositoryClass=AvisRepository::class)
 */
class Avis
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
    private $auteur;

    /**
     * @ORM\Column(type="text")
     */
    private $contenue;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="avis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

<<<<<<< HEAD
    /**
     * @ORM\Column(type="boolean")
     */
    private $isEnable;

    public function __construct()
    {
        $this->isEnable = false;
        $this->createdAt = new \DateTimeImmutable('now');
    }

    /**
     * @return int|null
     */
=======
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
    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

<<<<<<< HEAD
    /**
     * @param string $auteur
     * @return $this
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return string|null
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function getContenue(): ?string
    {
        return $this->contenue;
    }

<<<<<<< HEAD
    /**
     * @param string $contenue
     * @return $this
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function setContenue(string $contenue): self
    {
        $this->contenue = $contenue;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return \DateTimeImmutable|null
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

<<<<<<< HEAD
    /**
     * @param \DateTimeImmutable $createdAt
     * @return $this
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return Article|null
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function getArticle(): ?Article
    {
        return $this->article;
    }

<<<<<<< HEAD
    /**
     * @param Article|null $article
     * @return $this
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
<<<<<<< HEAD

     /**
     * @return bool
     */
    public function isEnable(): bool
    {
        return $this->isEnable;
    }

    /**
     * @param bool $isEnable
     * @return $this
     */
    public function setIsEnable(bool $isEnable): self
    {
        $this->isEnable = $isEnable;

        return $this;
    }

=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
}
