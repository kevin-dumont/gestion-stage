<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 16/11/2017
 * Time: 23:03
 */

namespace AppBundle\Controller\Company;

use AppBundle\Entity\Company;
use AppBundle\Form\CompanyType as CompanyFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CompanyController extends Controller
{
    /**
     * @Route("/", name="company_home")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homeCompanyAction(Request $request)
    {
        $query = $this->get('app_company_manager')->getRepository()->findAll();
        return $this->render('company/home_company.html.twig',[
            'elements' => $query,
        ]);
    }

    /**
     * @Route("/add", name="company_add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addCompanyAction(Request $request)
    {
        $company = new Company();
        $form = $this->createForm(CompanyFormType::class, $company);

        if ($form->handleRequest($request)->isValid()) {
            $this->get('app_company_manager')->addNew($company);
            return $this->redirect($this->generateUrl('company_home'));
        }

        return $this->render('company/company_add-edit.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param Company $company
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editCompany(Request $request, Company $company)
    {
        if (!$company->getId()) {
            return $this->redirect($this->generateUrl('company_home'));
        }

        $form = $this->createForm(CompanyFormType::class, $company);

        if ($form->handleRequest($request)->isValid()) {
            $this->get('app_company_manager')->edit($company);
            $this->redirect($request->headers->get('referer'));
        }

        return $this->render('company/company_add-edit.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     *
     * @param Company $company
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeCompany(Company $company)
    {
        if (!$company->getId()) {
            return $this->redirect($this->generateUrl('company_type_home'));
        }

        $this->get('app_company_manager')->removeCompanyType($company);
        return $this->redirect($this->generateUrl('company_home'));
    }


}