<?php

namespace AppBundle\Controller\Schooling;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BaccalaureatController extends Controller
{

    /**
     * @Route("/", name="schooling_baccalaureat")
     */
    public function indexAction()
    {
        return $this->render('schooling/baccalaureat/index.html.twig');
    }

    /**
     * @Route("/new/", name="schooling_baccalaureat_new")
     */
    public function newClassRoomAction()
    {
        return $this->render('schooling/baccalaureat/edit.html.twig');
    }

    /**
     * @Route("/edit/{id}/", name="schooling_baccalaureat_edit")
     */
    public function editClassRoomAction()
    {
        return $this->render('schooling/baccalaureat/edit.html.twig');
    }
}