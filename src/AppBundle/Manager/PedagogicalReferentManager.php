<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 16/11/2017
 * Time: 21:58
 */

namespace AppBundle\Manager;
use AppBundle\Entity\PedagogicalReferent;
use AppBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;
use AppBundle\Services\NotificationsService;

class PedagogicalReferentManager extends BaseManager
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
        return $this->em->getRepository('AppBundle:PedagogicalReferent');
    }

    /**
     * @param PedagogicalReferent $pedagogicalReferent
     * @return mixed
     */
    public function addNew(PedagogicalReferent $pedagogicalReferent)
    {
        if ($pedagogicalReferent) {
            $this->saveNew($pedagogicalReferent);
            return $this->notificationsService->success("Ajout effectué avec succès");
        }

        return $this->notificationsService->warning("Ajout echoué");
    }

    /**
     * @param PedagogicalReferent $pedagogicalReferent
     * @return mixed
     */
    public function edit(PedagogicalReferent $pedagogicalReferent) {

        if ($pedagogicalReferent) {
            $this->update($pedagogicalReferent);
            return $this->notificationsService->success("Modification effectué avec succès");
        }

        return $this->notificationsService->warning("Modification echoué");
    }

    /**
     * @param PedagogicalReferent $pedagogicalReferent
     * @return mixed
     */
    public function removeCompanyType(PedagogicalReferent $pedagogicalReferent)
    {
        if ($pedagogicalReferent) {
            $this->deleteOne($pedagogicalReferent);
            return $this->notificationsService->success("Suppresion effectué avec succès");
        }

        return $this->notificationsService->warning("Suppresion echoué");
    }
}