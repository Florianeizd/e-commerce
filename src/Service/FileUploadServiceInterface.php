<?php

namespace App\Service;

<<<<<<< HEAD
use App\Entity\Attachment;

interface FileUploadServiceInterface
{
    /**
     * @param Attachment $attachment
     * @return Attachment
     */
    public function upload(Attachment $attachment): Attachment;
}
=======
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FileUploadServiceInterface
{
    public function upload(UploadedFile $file): string;
}
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
