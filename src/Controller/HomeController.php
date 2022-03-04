<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

    private $articleRepository;
    
    public function __construct(ArticleRepository $articleRepository){
        $this->articleRepository = $articleRepository;
    }
    
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $articles = $this->articleRepository->findAll();
        
        return $this->render('home/index.html.twig', [
            'articles' => $articles,
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/article/{id}', name:'show_article')]
    public function getOne(Article $article){

        return $this->render('home/article.html.twig', ['article'=>$article]);
    }
}