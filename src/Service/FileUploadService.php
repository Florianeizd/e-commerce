<?php

namespace App\Service;

<<<<<<< HEAD
use App\Entity\Attachment;
use Doctrine\ORM\EntityManagerInterface;
=======
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploadService implements FileUploadServiceInterface
{
<<<<<<< HEAD
    private string $pathImageArticle;
    private SluggerInterface $slugger;
    private EntityManagerInterface $entityManager;

    public function __construct($pathImageArticle, SluggerInterface $slugger, EntityManagerInterface $entityManager)
    {
        $this->pathImageArticle = $pathImageArticle;
        $this->slugger = $slugger;
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritDoc
     */
    public function upload(Attachment $attachment): Attachment
    {
        /** @var UploadedFile $file */
        $file = $attachment->getFile();

        if (!$file) {
            throw new \RuntimeException('Error image file.');
        }

        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $filename = $safeFilename.'-'.uniqid('', true).'.'.$file->guessExtension();

        try {
            $file->move($this->getPathImageArticle(), $filename);

            $attachment->setName($filename);
            $attachment->setSize($this->getSize($filename));
            $attachment->setTypeMime($file->getClientMimeType());

            $this->entityManager->persist($attachment);
            $this->entityManager->flush();
        } catch (FileException $e) {
            throw new \RuntimeException('Error upload file :: ' . $e->getMessage() . $e->getTraceAsString());
        }

        return $attachment;
    }

    /**
     * @return string
     */
=======
    private $pathImageArticle;
    private $slugger;

    public function __construct($pathImageArticle, SluggerInterface $slugger)
    {
        $this->pathImageArticle = $pathImageArticle;
        $this->slugger = $slugger;
    }

    public function upload(UploadedFile $file): string
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $filename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getPathImageArticle(), $filename);
        } catch (FileException $e) {
            throw new \Exception('Error upload file' . $e->getTraceAsString());
        }

        return $filename;
    }

>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
    private function getPathImageArticle(): string
    {
        return $this->pathImageArticle;
    }
<<<<<<< HEAD

    /**
     * @param string $filename
     * @return int
     */
    private function getSize(string $filename): int
    {
        return filesize($this->pathImageArticle .'/'. $filename);
    }
}
=======
}
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
