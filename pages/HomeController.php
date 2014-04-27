<?php

use Blog\Controller;

Class HomeController extends Controller
{

    /**
     * Affiche la home page
     */
    public function getIndex($idTag = null)
    {
        $this->data['user'] = $this->isLogged();

        $article = new Article($this->app);
        $this->data['articles'] = $article->getAllArticles($idTag);

        return $this->app['twig']->render('home.twig', $this->data);
    }

    public function getArticle($idArticle)
    {
        $article = new Article($this->app);
        $this->data['article'] = $article->getArticle($idArticle);

        $tag = new Tag($this->app);
        $tags = $tag->getTagsByArticle($idArticle);

        return $this->app['twig']->render('article.twig', $this->data);
    }

    public function postComment($idArticle)
    {
        if($this->data['user'] == $this->isLogged()){

        }

        $this->getArticle($idArticle);
    }

}
