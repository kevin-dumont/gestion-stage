<?php

namespace AppBundle\Manager;

use AppBundle\Entity\CompanyType;
use AppBundle\Manager\BaseManager;
use AppBundle\Services\NotificationsService;
use Doctrine\ORM\EntityManager;



class CompanyTypeManager extends BaseManager
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var NotificationsService
     */
    protected $notificationsService;

    /**
     * CompanyTypeManager constructor.
     * @param \AppBundle\Manager\EntityManager $em
     * @param \AppBundle\Manager\NotificationsService $notificationsService
     */
    public function __construct(EntityManager $em, NotificationsService $notificationsService)
    {
        $this->em = $em;
        $this->notificationsService = $notificationsService;
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository('AppBundle:CompanyType');
    }

    /**
     * Add new Company type
     * @param CompanyType $companyType
     * @return mixed
     */
    public function addNew(CompanyType $companyType)
    {
        if ($companyType) {
            $this->saveNew($companyType);
            return $this->notificationsService->success("Ajout effectué avec succès");
        }

        return $this->notificationsService->warning("Ajout echoué");
    }

    /**
     * Edit Company type
     * @param CompanyType $companyType
     * @return mixed
     */
    public function edit(CompanyType $companyType) {

        if ($companyType) {
            $this->update($companyType);
            return $this->notificationsService->success("Modification effectué avec succès");
        }

        return $this->notificationsService->warning("Modification echoué");
    }

    /**
     * Remove Company type
     * @param CompanyType $companyType
     * @return mixed
     */
    public function removeCompanyType(CompanyType $companyType)
    {
        if ($companyType) {
            $this->deleteOne($companyType);
            return $this->notificationsService->success("Suppresion effectué avec succès");
        }

        return $this->notificationsService->warning("Suppresion echoué");
    }



}