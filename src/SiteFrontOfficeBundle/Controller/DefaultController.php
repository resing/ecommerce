<?php

namespace SiteFrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SiteFrontOfficeBundle:Default:index.html.twig', array('name' => $name));
    }
}
