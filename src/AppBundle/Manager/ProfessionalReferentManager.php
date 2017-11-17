<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 16/11/2017
 * Time: 21:59
 */

namespace AppBundle\Manager;
use AppBundle\Entity\ProfessionalReferent;
use AppBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;
use AppBundle\Services\NotificationsService;

class ProfessionalReferentManager extends BaseManager
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
        return $this->em->getRepository('AppBundle:ProfessionalReferent');
    }

    /**
     * @param ProfessionalReferent $professionalReferent
     * @return mixed
     */
    public function addNew(ProfessionalReferent $professionalReferent)
    {
        if ($professionalReferent) {
            $this->saveNew($professionalReferent);
            return $this->notificationsService->success("Ajout effectué avec succès");
        }

        return $this->notificationsService->warning("Ajout echoué");
    }

    /**
     * @param ProfessionalReferent $professionalReferent
     * @return mixed
     */
    public function edit(ProfessionalReferent $professionalReferent) {

        if ($professionalReferent) {
            $this->update($professionalReferent);
            return $this->notificationsService->success("Modification effectué avec succès");
        }

        return $this->notificationsService->warning("Modification echoué");
    }

    /**
     * @param ProfessionalReferent $professionalReferent
     * @return mixed
     */
    public function removeCompanyType(ProfessionalReferent $professionalReferent)
    {
        if ($professionalReferent) {
            $this->deleteOne($professionalReferent);
            return $this->notificationsService->success("Suppresion effectué avec succès");
        }

        return $this->notificationsService->warning("Suppresion echoué");
    }
}