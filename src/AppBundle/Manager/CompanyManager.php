<?php

namespace AppBundle\Manager;
use AppBundle\Entity\Company;
use AppBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;
use AppBundle\Services\NotificationsService;

class CompanyManager extends BaseManager
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
     * @param EntityManager $em
     * @param NotificationsService $notificationsService
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
        return $this->em->getRepository('AppBundle:Company');
    }

    /**
     * @param Company $company
     * @return mixed
     */
    public function addNew(Company $company)
    {
        if ($company) {
            $this->saveNew($company);
            return $this->notificationsService->success("Ajout effectué avec succès");
        }

        return $this->notificationsService->warning("Ajout echoué");
    }

    /**
     * @param Company $company
     * @return mixed
     */
    public function edit(Company $company) {

        if ($company) {
            $this->update($company);
            return $this->notificationsService->success("Modification effectué avec succès");
        }

        return $this->notificationsService->warning("Modification echoué");
    }

    /**
     * @param Company $company
     * @return mixed
     */
    public function removeCompanyType(Company $company)
    {
        if ($company) {
            $this->deleteOne($company);
            return $this->notificationsService->success("Suppresion effectué avec succès");
        }

        return $this->notificationsService->warning("Suppresion echoué");
    }
}