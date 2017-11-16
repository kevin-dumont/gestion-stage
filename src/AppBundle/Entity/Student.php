<?php

namespace AppBundle\Entity;

use AppBundle\Traits\UserTrait;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Traits\AddressTrait;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentRepository")
 */
class Student
{
    use AddressTrait;
    use UserTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bac_getting", type="datetime")
     */
    private $bacGetting;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Student
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Student
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set bacGetting
     *
     * @param \DateTime $bacGetting
     *
     * @return Student
     */
    public function setBacGetting($bacGetting)
    {
        $this->bacGetting = $bacGetting;

        return $this;
    }

    /**
     * Get bacGetting
     *
     * @return \DateTime
     */
    public function getBacGetting()
    {
        return $this->bacGetting;
    }
}

