<?php

namespace MD\Bundle\MainBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

use MD\Entity\Article;

/**
 * ArticleController
 *
 * @Route("/")
 */
class ArticleController extends Controller
{
    /**
     * List the articles in the system
     *
     * @return array
     *
     * @Route("/", name="admin.article.list")
     * @Method("GET")
     * @Template
     */
    public function listAction()
    {
        $em       = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('Entity:Article')->findAll();

        return [
            'articles' => $articles
        ];
    }

    /**
     * Create a new article
     *
     * @param Request $request
     *
     * @return array|RedirectResponse
     *
     * @Route("/create", name="admin.article.create")
     * @Method({"GET", "POST"})
     * @Template
     */
    public function createAction(Request $request)
    {
        $article = new Article();
        $form    = $this->createForm('article', $article);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirect($this->generateUrl('admin.article.list'));
        }

        return [
            'form' => $form->createView()
        ];
    }
}
