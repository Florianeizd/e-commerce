<?php

namespace App\Entity;

use App\Repository\AttachmentRepository;
use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\File\UploadedFile;
=======
use Symfony\Component\HttpFoundation\File\File;
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034

/**
 * @ORM\Entity(repositoryClass=AttachmentRepository::class)
 */
class Attachment
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
<<<<<<< HEAD
    private $typeMime;

    /**
     * @var UploadedFile
     */
    private $file;

=======
    private $typeMine;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="attachments")
     */
    private $article;

    /**
     * @var File
     */
    private $file;


>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function __construct()
    {
        $this->createdAt= new \DateTimeImmutable();
    }

<<<<<<< HEAD
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
    public function getName(): ?string
    {
        return $this->name;
    }

<<<<<<< HEAD
    /**
     * @param string $name
     * @return $this
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return int|null
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function getSize(): ?int
    {
        return $this->size;
    }

<<<<<<< HEAD
    /**
     * @param int $size
     * @return $this
     */
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    public function setSize(int $size): self
    {
        $this->size = $size;

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
     * @return string|null
     */
    public function getTypeMime(): ?string
    {
        return $this->typeMime;
    }

    /**
     * @param string $typeMime
     * @return $this
     */
    public function setTypeMime(string $typeMime): self
    {
        $this->typeMime = $typeMime;
=======
    public function getTypeMine(): ?string
    {
        return $this->typeMine;
    }

    public function setTypeMine(string $typeMine): self
    {
        $this->typeMine = $typeMine;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile
=======
    public function getFile(): ?File
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    {
        return $this->file;
    }

<<<<<<< HEAD
    /**
     * @param UploadedFile $file
     * @return $this
     */
    public function setFile(UploadedFile $file): self
=======
    public function setFile(File $file): self
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    {
        $this->file = $file;

        return $this;
    }
}
