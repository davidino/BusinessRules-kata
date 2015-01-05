<?php

namespace Davidino\DomainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DavidinoDomainBundle:Default:index.html.twig', array('name' => $name));
    }
}
