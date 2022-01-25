<?php

namespace App\DataFixtures;

<<<<<<< HEAD
use App\Entity\Attachment;
use App\Repository\CategoryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use Exception;
use Faker;
use App\Entity\Avis;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleFixtures extends Fixture
{
    private const IMAGE_GENERATOR = 'https://picsum.photos/600/600';

    private CategoryRepository $categoryRepository;
    private ParameterBagInterface $parameterBag;

    public function __construct(CategoryRepository $categoryRepository, ParameterBagInterface $parameterBag)
    {
        $this->categoryRepository = $categoryRepository;
        $this->parameterBag = $parameterBag;
    }

    /**
     * @throws Exception
     */
    #[NoReturn]
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $categories = $this->categoryRepository->findAll();

        $pathImage = __DIR__ . '/../../public/' . $this->parameterBag->get('path.images.article');

        // Purging
        $finder = new Finder();
        $finder->files()->in($pathImage);
        foreach ($finder as $file) {
            unlink($file->getRealPath());
        }

        for ($j = 1; $j <= 100; $j++) {
            $article = new Article();

            $article->setnom($faker->word());
            $article->setdescription($faker->sentence(24));
            $article->setprix($faker->numberBetween(1,1000));
            $article->setCategory($faker->randomElement($categories));

            // Attachments for product
            for ($p = 1; $p <= 5; $p++) {
                $filename = 'attachment-'.$j.'-picture-'.$p.'.jpeg';
                $content = file_get_contents(self::IMAGE_GENERATOR);
                file_put_contents(__DIR__ . '/TemporaryImage/' . $filename, $content);

                $uploadedFile = new UploadedFile(__DIR__ . '/TemporaryImage/' . $filename, $filename, 'image/jpeg', null, true);

                $attachment = new Attachment();
                $attachment->setFile($uploadedFile);
                $attachment->setName($filename);
                $attachment->setSize($uploadedFile->getSize());
                $attachment->setTypeMime($uploadedFile->getMimeType());

                $article->addAttachment($attachment);

                copy(__DIR__ . '/TemporaryImage/' . $filename, $pathImage.$filename);
                unlink(__DIR__ . '/TemporaryImage/' . $filename);
            }

            $manager->persist($article);
            $this->addReference('article_'.$j, $article);

            // On donne des commentaires à l'article
            for ($k = 1; $k <= 5; $k++){
                $avis = new Avis();

                $startDate = $faker->dateTimeBetween('+0 days', '+1 months');
                $startDateClone = clone $startDate;

                $avis->setAuteur($faker->name());
                $avis->setContenue($faker->sentence());
                $avis->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeBetween($startDate, $startDateClone->modify('+5 hours'))) );

                /** @var Article $article */
                $article = $this->getReference('article_'.$j);
                $avis->setArticle($article);

                $manager->persist($avis);
            }
        }
=======
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use Faker;
use App\Entity\Avis;
use App\Entity\Categorie;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        //Créer 3 catégories fakées
       
            //Créer entre 4 et 6 articles

            for ($j=1; $j<= mt_rand(4,6); $j++){
                $article = new Article();

                $article->setnom($faker->sentence())
                        ->setdescription($faker->sentence())
                        ->setprix($faker->numberBetween($min = 1, $max = 100))
                        ->setCategorie($manager->getRepository(Categorie::class)->find(mt_rand(1,3)));
                        
                $manager->persist($article);

                // On donne des commentaires à l'article
                for($k=1;$k<= mt_rand(4,10);$k++){
                    $avis = new Avis();

                    $startDate=$faker->dateTimeBetween('+0 days', '+1 months');
                    $startDateClone=clone $startDate; 
                    // $dateTime=new \DateTime($startDate, $startDateClone->modify('+5 hours'));
            

                    $avis->setAuteur($faker->name)
                         ->setContenue($faker->sentence())
                         ->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeBetween($startDate, $startDateClone->modify('+5 hours'))) )
                         ->setArticle($article);

                    $manager->persist($avis);
                }

            }
        

>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034

        $manager->flush();
    }
}
