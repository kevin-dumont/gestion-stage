<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClassRoom
 *
 * @ORM\Table(name="class_room")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClassRoomRepository")
 */
class ClassRoom
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
     * @var string
     *
     * @ORM\Column(name="class_room_label", type="string", length=255)
     */
    private $classRoomLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255)
     */
    private $designation;


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
     * Set classRoomLabel
     *
     * @param string $classRoomLabel
     *
     * @return ClassRoom
     */
    public function setClassRoomLabel($classRoomLabel)
    {
        $this->classRoomLabel = $classRoomLabel;

        return $this;
    }

    /**
     * Get classRoomLabel
     *
     * @return string
     */
    public function getClassRoomLabel()
    {
        return $this->classRoomLabel;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return ClassRoom
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }
}

