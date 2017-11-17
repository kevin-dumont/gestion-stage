<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanyType
 *
 * @ORM\Table(name="company_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanyTypeRepository")
 */
class CompanyType
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
     * @ORM\Column(name="type_label", type="string", length=255)
     */
    private $typeLabel;

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
     * Set typeLabel
     *
     * @param string $typeLabel
     *
     * @return CompanyType
     */
    public function setTypeLabel($typeLabel)
    {
        $this->typeLabel = $typeLabel;

        return $this;
    }

    /**
     * Get typeLabel
     *
     * @return string
     */
    public function getTypeLabel()
    {
        return $this->typeLabel;
    }
}

