<?php

namespace AppBundle\Manager;
use AppBundle\Entity\Bacalaureat;
use AppBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;
use AppBundle\Services\NotificationsService;

class BacalaureatManager extends BaseManager
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
        return $this->em->getRepository('AppBundle:Bacalaureat');
    }

    /**
     * @param Bacalaureat $bacalaureat
     * @return mixed
     */
    public function add(Bacalaureat $bacalaureat)
    {
        if ($bacalaureat) {
            $this->saveNew($bacalaureat);
            return $this->notificationsService->success("Ajout effectué avec succès");
        }

        return $this->notificationsService->warning("Ajout echoué");
    }

    /**
     * @param Bacalaureat $bacalaureat
     * @return mixed
     */
    public function edit(Bacalaureat $bacalaureat)
    {
        if ($bacalaureat) {
            $this->update($bacalaureat);
            return $this->notificationsService->success("Modification effectué avec succès");
        }

        return $this->notificationsService->warning("Modification echoué");
    }

    /**
     * @param Bacalaureat $bacalaureat
     * @return mixed
     */
    public function remove(Bacalaureat $bacalaureat)
    {
        if ($bacalaureat) {
            $this->deleteOne($bacalaureat);
            return $this->notificationsService->success("Suppresion effectué avec succès");
        }

        return $this->notificationsService->warning("Suppresion echoué");
    }

}