<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 16/11/2017
 * Time: 22:03
 */

namespace AppBundle\Manager;
use AppBundle\Entity\Visite;
use AppBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;
use AppBundle\Services\NotificationsService;

class VisiteManager extends BaseManager
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
        return $this->em->getRepository('AppBundle:Visite');
    }

    /**
     * @param Visite $visite
     * @return mixed
     */
    public function addNew(Visite $visite)
    {
        if ($visite) {
            $this->saveNew($visite);
            return $this->notificationsService->success("Ajout effectué avec succès");
        }

        return $this->notificationsService->warning("Ajout echoué");
    }

    /**
     * @param Visite $visite
     * @return mixed
     */
    public function edit(Visite $visite) {

        if ($visite) {
            $this->update($visite);
            return $this->notificationsService->success("Modification effectué avec succès");
        }

        return $this->notificationsService->warning("Modification echoué");
    }

    /**
     * @param Visite $visite
     * @return mixed
     */
    public function removeCompanyType(Visite $visite)
    {
        if ($visite) {
            $this->deleteOne($visite);
            return $this->notificationsService->success("Suppresion effectué avec succès");
        }

        return $this->notificationsService->warning("Suppresion echoué");
    }
}