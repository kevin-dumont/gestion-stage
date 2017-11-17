<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 16/11/2017
 * Time: 22:06
 */

namespace AppBundle\Manager;
use AppBundle\Entity\Promo;
use AppBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;
use AppBundle\Services\NotificationsService;

class PromoManager extends BaseManager
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
        return $this->em->getRepository('AppBundle:Promo');
    }

    /**
     * @param Promo $promo
     * @return mixed
     */
    public function addNew(Promo $promo)
    {
        if ($promo) {
            $this->saveNew($promo);
            return $this->notificationsService->success("Ajout effectué avec succès");
        }

        return $this->notificationsService->warning("Ajout echoué");
    }

    /**
     * @param Promo $promo
     * @return mixed
     */
    public function edit(Promo $promo) {

        if ($promo) {
            $this->update($promo);
            return $this->notificationsService->success("Modification effectué avec succès");
        }

        return $this->notificationsService->warning("Modification echoué");
    }

    /**
     * @param Promo $promo
     * @return mixed
     */
    public function removeCompanyType(Promo $promo)
    {
        if ($promo) {
            $this->deleteOne($promo);
            return $this->notificationsService->success("Suppresion effectué avec succès");
        }

        return $this->notificationsService->warning("Suppresion echoué");
    }
}