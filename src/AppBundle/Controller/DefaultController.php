<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle::index.html.twig');
    }

    /**
     * @Route("/contact", name="contactpage")
     */
    public function contactAction(Request $request)
    {
        return $this->render('AppBundle::contact.html.twig');
    }

    /**
     * @Route("/about", name="aboutpage")
     */
    public function aboutAction(Request $request)
    {
        return $this->render('AppBundle::about.html.twig');
    }
}
