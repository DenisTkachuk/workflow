<?php

namespace MD\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use MD\Entity\Article;

/**
 * ArticleController
 */
class ArticleController extends Controller
{
    /**
     * List the articles in the system
     *
     * @return array
     *
     * @Route("/", name="article.list")
     * @Method("GET")
     * @Template
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('Entity:Article')->findAll();

        return [
            'articles' => $articles
        ];
    }

    /**
     * View a single article
     *
     * @param Article $article
     *
     * @return array
     *
     * @Route("/{id}", name="article.view")
     * @Method("GET")
     * @Template
     */
    public function viewAction(Article $article)
    {
        return [
            'article' => $article
        ];
    }
}
