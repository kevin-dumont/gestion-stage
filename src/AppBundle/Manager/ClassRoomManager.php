<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 16/11/2017
 * Time: 21:56
 */

namespace AppBundle\Manager;
use AppBundle\Entity\ClassRoom;
use AppBundle\Manager\BaseManager;
use Doctrine\ORM\EntityManager;
use AppBundle\Services\NotificationsService;

class ClassRoomManager extends BaseManager
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
        return $this->em->getRepository('AppBundle:ClassRoom');
    }

    /**
     * @param ClassRoom $classRoom
     * @return mixed
     */
    public function add(ClassRoom $classRoom)
    {
        if ($classRoom) {
            $this->saveNew($classRoom);
            return $this->notificationsService->success("Ajout effectué avec succès");
        }

        return $this->notificationsService->warning("Ajout echoué");
    }

    /**
     * @param ClassRoom $classRoom
     * @return mixed
     */
    public function edit(ClassRoom $classRoom)
    {
        if ($classRoom) {
            $this->update($classRoom);
            return $this->notificationsService->success("Modification effectué avec succès");
        }

        return $this->notificationsService->warning("Modification echoué");
    }

    /**
     * @param ClassRoom $classRoom
     * @return mixed
     */
    public function remove(ClassRoom $classRoom)
    {
        if ($classRoom) {
            $this->deleteOne($classRoom);
            return $this->notificationsService->success("Suppresion effectué avec succès");
        }

        return $this->notificationsService->warning("Suppresion echoué");
    }


}