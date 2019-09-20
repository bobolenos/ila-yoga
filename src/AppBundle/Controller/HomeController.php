<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

// src/AppBundle/Controller/LuckyController.php

// ...
class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     * @Template
     */
    public function homeAction()
    {
        return [];
    }
}
