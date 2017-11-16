<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Traits\UserTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="pedagogical_referent")
 */
class PedagogicalReferent extends BaseUser
{
    use UserTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }

}