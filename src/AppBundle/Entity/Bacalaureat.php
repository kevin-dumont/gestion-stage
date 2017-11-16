<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bacalaureat
 *
 * @ORM\Table(name="bacalaureat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BacalaureatRepository")
 */
class Bacalaureat
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
     * @ORM\Column(name="bac_label", type="string", length=255)
     */
    private $bacLabel;


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
     * Set bacLabel
     *
     * @param string $bacLabel
     *
     * @return Bacalaureat
     */
    public function setBacLabel($bacLabel)
    {
        $this->bacLabel = $bacLabel;

        return $this;
    }

    /**
     * Get bacLabel
     *
     * @return string
     */
    public function getBacLabel()
    {
        return $this->bacLabel;
    }
}

