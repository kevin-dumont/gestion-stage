<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Stage;
use AppBundle\Form\StageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class StageController extends Controller
{
    /**
     * @Route("/", name="home_stage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function stageHomeAction(Request $request)
    {
        return $this->render('stage/home_stage.html.twig');
    }

    /**
     * @Route("/add", name="add_stage")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addStage(Request $request)
    {
        /**$stage = new Stage();
        $form = $this->createForm(StageType::class, $stage);

        return $this->render('stage/add-edit_stage.html.twig', [
            'form' => $form->createView(),
        ]);*/
    }

    /**
     * @Route("/edit/{id}", name="edit_stage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editStage()
    {
        return $this->render('stage/add-edit_stage.html.twig');
    }

    /**
     * @Route("/remove/{id}", name="remove_stage")
     */
    public function removeStage()
    {

    }

}