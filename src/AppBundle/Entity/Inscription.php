<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InscriptionRepository")
 */
class Inscription
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Promo", cascade={"persist"})
     */
    private $promo;

    /**
     * @ORM\ManyToOne(targetEntity="Student", cascade={"persist"})
     */
    private $student;


    /**
     * @ORM\ManyToOne(targetEntity="ClassRoom", cascade={"persist"})
     */
    private $classRoom;


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
     * @return mixed
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * @param Promo $promo
     */
    public function setPromo(Promo $promo)
    {
        $this->promo = $promo;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param Student $student
     */
    public function setStudent(Student $student)
    {
        $this->student = $student;
    }

    /**
     * @return mixed
     */
    public function getClassRoom()
    {
        return $this->classRoom;
    }

    /**
     * @param mixed $classRoom
     */
    public function setClassRoom($classRoom)
    {
        $this->classRoom = $classRoom;
    }


}

