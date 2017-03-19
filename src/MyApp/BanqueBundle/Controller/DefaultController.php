<?php

namespace MyApp\BanqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MyAppBanqueBundle:Default:index.html.twig');
    }
}
