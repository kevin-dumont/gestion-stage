<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Technologie
 *
 * @ORM\Table(name="technologie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TechnologieRepository")
 */
class Technologie
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
     * @ORM\Column(name="technologie_label", type="string", length=255)
     */
    private $technologieLabel;


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
     * Set technologieLabel
     *
     * @param string $technologieLabel
     *
     * @return Technologie
     */
    public function setTechnologieLabel($technologieLabel)
    {
        $this->technologieLabel = $technologieLabel;

        return $this;
    }

    /**
     * Get technologieLabel
     *
     * @return string
     */
    public function getTechnologieLabel()
    {
        return $this->technologieLabel;
    }
}

