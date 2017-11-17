<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\Session\Session;

class NotificationsService
{
    /**
     * @var Session
     */
    private $session;

    /**
     * NotificationsService constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Success notification
     */
    public function success($msg)
    {
        return $this->session->getFlashBag()->add('success', $msg);
    }


    /**
     * Warning notification
     */
    public function warning($msg)
    {
        return $this->session->getFlashBag()->add('warning', $msg);
    }

}

