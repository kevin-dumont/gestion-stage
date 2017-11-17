<?php

namespace AppBundle\Controller\Schooling;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PromoController extends Controller
{

    /**
     * @Route("/", name="schooling_promo")
     */
    public function indexAction()
    {
        return $this->render('schooling/promo/index.html.twig');
    }

    /**
     * @Route("/new/", name="schooling_promo_new")
     */
    public function newAction()
    {
        return $this->render('schooling/promo/edit.html.twig');
    }

    /**
     * @Route("/edit/{id}/", name="schooling_promo_edit")
     */
    public function editAction()
    {
        return $this->render('schooling/promo/edit.html.twig');
    }
}