<?php

namespace AppBundle\Controller\Schooling;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ClassRoomController extends Controller
{

    /**
     * @Route("/", name="schooling_classroom")
     */
    public function indexAction()
    {
        return $this->render('schooling/classroom/index.html.twig');
    }

    /**
     * @Route("/new/", name="schooling_classroom_new")
     */
    public function newClassRoomAction()
    {
        return $this->render('schooling/classroom/edit.html.twig');
    }

    /**
     * @Route("/edit/{id}/", name="schooling_classroom_edit")
     */
    public function editClassRoomAction()
    {
        return $this->render('schooling/classroom/edit.html.twig');
    }

    /**
     * @Route("/promo/new/", name="schooling_classroom_promo_new")
     */
    public function newPromoAction()
    {
        return $this->render('schooling/classroom/promo/edit.html.twig');
    }

    /**
     * @Route("/promo/edit/{id}/", name="schooling_classroom_promo_edit")
     */
    public function editPromoAction()
    {
        return $this->render('schooling/classroom/promo/edit.html.twig');
    }
}