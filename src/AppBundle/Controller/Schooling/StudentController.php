<?php

namespace AppBundle\Controller\Schooling;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends Controller
{

    /**
     * @Route("/", name="schooling_student")
     */
    public function indexAction()
    {
        return $this->render('schooling/student/index.html.twig');
    }

    /**
     * @Route("/new/", name="schooling_student_new")
     */
    public function newStudentAction()
    {
        return $this->render('schooling/student/edit.html.twig');
    }

    /**
     * @Route("/edit/{id}/", name="schooling_student_edit")
     */
    public function editStudentAction()
    {
        return $this->render('schooling/student/edit.html.twig');
    }

    /**
     * @Route("/classroom/new/", name="schooling_student_classroom_new")
     */
    public function newSchoolStudentAction()
    {
        return $this->render('schooling/student/promo/edit.html.twig');
    }

    /**
     * @Route("/classroom/edit/{id}/", name="schooling_student_classroom_edit")
     */
    public function editSchoolStudentAction()
    {
        return $this->render('schooling/student/promo/edit.html.twig');
    }
}