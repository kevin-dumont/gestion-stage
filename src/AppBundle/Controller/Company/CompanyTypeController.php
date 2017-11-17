<?php

namespace AppBundle\Controller\Company;

use AppBundle\Entity\CompanyType;
use AppBundle\Form\CompanyTypeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CompanyTypeController extends Controller
{
    /**
     * @Route("/", name="company_type_home")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homeCompanyTypeAction(Request $request)
    {
        $query = $this->get('app_company_type_manager')->getRepository()->findAll();

        return $this->render('company_type/company_type_home.html.twig',[
            'elements' => $query,
        ]);
    }

    /**
     * @Route("/add", name="company_type_add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addCompanyTypeAction(Request $request)
    {
        $companyType = new CompanyType();
        $form = $this->createForm(CompanyTypeType::class, $companyType);

        if ($form->handleRequest($request)->isValid()) {
            $this->get('app_company_type_manager')->addNew($companyType);
            return $this->redirect($this->generateUrl('company_type_home'));
        }

        return $this->render('company_type/company_type_add-edit.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}", name="company_type_edit")
     * @param Request $request
     * @param CompanyType $companyType
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editCompanyTypeAction(Request $request, CompanyType $companyType)
    {
        if (!$companyType->getId()) {
            return $this->redirect($this->generateUrl('company_type_home'));
        }

        $form = $this->createForm(CompanyTypeType::class, $companyType);

        if ($form->handleRequest($request)->isValid()) {
            $this->get('app_company_type_manager')->edit($companyType);
            $this->redirect($request->headers->get('referer'));
        }

        return $this->render('company_type/company_type_add-edit.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/remove/{id}", name="company_type_remove")
     * @param CompanyType $companyType
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeCompanyTypeAction(CompanyType $companyType)
    {
        if  (!$companyType->getId()) {
            return $this->redirect($this->generateUrl('company_type_home'));
        }

        $this->get('app_company_type_manager')->removeCompanyType($companyType);
        return $this->redirect($this->generateUrl('company_type_home'));
    }

}