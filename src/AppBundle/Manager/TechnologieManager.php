<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 16/11/2017
 * Time: 22:04
 */

namespace AppBundle\Manager;
use AppBundle\Entity\Technologie;
use AppBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;
use AppBundle\Services\NotificationsService;

class TechnologieManager extends BaseManager
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
        return $this->em->getRepository('AppBundle:Technologie');
    }

    /**
     * @param Technologie $technologie
     * @return mixed
     */
    public function addNew(Technologie $technologie)
    {
        if ($technologie) {
            $this->saveNew($technologie);
            return $this->notificationsService->success("Ajout effectué avec succès");
        }

        return $this->notificationsService->warning("Ajout echoué");
    }

    /**
     * @param Technologie $technologie
     * @return mixed
     */
    public function edit(Technologie $technologie) {

        if ($technologie) {
            $this->update($technologie);
            return $this->notificationsService->success("Modification effectué avec succès");
        }

        return $this->notificationsService->warning("Modification echoué");
    }

    /**
     * @param Technologie $technologie
     * @return mixed
     */
    public function removeCompanyType(Technologie $technologie)
    {
        if ($technologie) {
            $this->deleteOne($technologie);
            return $this->notificationsService->success("Suppresion effectué avec succès");
        }

        return $this->notificationsService->warning("Suppresion echoué");
    }

}