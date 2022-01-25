<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< HEAD
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class AccueilController extends AbstractController
{
    private const PAGE_RANGE = 12;
    /**
     * @param ArticleRepository $articleRepository
     * @return Response
     */
    #[Route('/accueil', name: 'accueil')]
    public function index(ArticleRepository $articleRepository, PaginatorInterface $paginator, Request $request): Response
    {

        $pagination = $paginator->paginate(
            $articleRepository->getArticleQuery(), 
            $request->query->getInt('page', 1), /*page number*/
            self::PAGE_RANGE /*limit per page*/
        );

        return $this->render('accueil/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @return Response
     */
    #[Route('/', name: 'home')]
    public function home() {
        return $this->render('accueil/home.html.twig');
    }
=======
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Article;
use App\Entity\Attachment;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Service\AlertServiceInterface;
use App\Service\FileUploadServiceInterface;
use Doctrine\ORM\EntityManagerInterface;


class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'accueil')]
    public function index(ArticleRepository $articleRepository): Response
    {

        $articles = $articleRepository->findAll();

        return $this->render('accueil/index.html.twig', [
    
            'articles' => $articles
        ]);
    }

    #[Route('/', name: 'home')] 
    public function home() {
        return $this->render('accueil/home.html.twig');
    }


    #[Route('/accueil/new', name: 'accueil_create')]
    #[Route('/accueil/{id}/edit', name: 'accueil_edit')]

    public function form(Article $article = null, Request $request, EntityManagerInterface $manager, FileUploadServiceInterface $fileUploadService)
    { //paramconverter:convertit un paramètre en une entité
        
        if (!$article) {
            $article = new Article();
        }

        $form = $this->createForm(ArticleType::class, $article); 

        $form->handleRequest($request); //analyse de la requête

        if($form->isSubmitted() && $form->isValid()){ //si c'est submis et valide
            
            $attachments = $form->get('attachments')->getData();

            foreach ($attachments as $attachment) {
                /** @var UploadedFile $imageFile */
                $imageUploadedFile = $attachment->getFile();

                $filename = $fileUploadService->upload($imageUploadedFile);

                $attachmentObject = new Attachment();
                $attachmentObject->setName($filename);
                $attachmentObject->setSize(0);
                $attachmentObject->setTypeMine($imageUploadedFile->getMimeType());

                $attachmentObject->setArticle($article);

                $manager->persist($attachmentObject); 
            }

            $manager->persist($article); //enregistrer dans la bdd
            $manager->flush();

            

            return $this->redirectToRoute('article_show', ['id'=> $article->getId()]); //redirection de la page d'article 
        }

        return $this->render('accueil/create.html.twig', [
            'formArticle' => $form->createView(), //form
            'editMode' =>$article->getId() !== null //si il est diff de null = true donc on sera en editMode
        ]);
        
    }


    #[Route('/accueil/article/{id}', name: 'article_show')]
    public function show(Article $article){

        return $this->render('accueil/show.html.twig', [
            'article' => $article ]);
    }

>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
}
