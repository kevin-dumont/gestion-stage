<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Traits\AddressTrait;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanyRepository")
 */
class Company
{
    use AddressTrait;

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * One Stage has One ProfessionalReferent.
     * @ORM\ManyToOne(targetEntity="ProfessionalReferent")
     */
    private $professionalReferent;

    /**
     * One Stage has One CompanyType.
     * @ORM\OneToOne(targetEntity="CompanyType")
     */
    private $companyType;

    /**
     * @var float
     *
     * @ORM\Column(name="turnover", type="float")
     */
    private $turnover;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;


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
     * Set name
     *
     * @param string $name
     *
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return ProfessionalReferent
     */
    public function getProfessionalReferent()
    {
        return $this->professionalReferent;
    }

    /**
     * @param ProfessionalReferent $professionalReferent
     */
    public function setProfessionalReferent(ProfessionalReferent $professionalReferent)
    {
        $this->professionalReferent = $professionalReferent;
    }

    /**
     * @return CompanyType
     */
    public function getCompanyType()
    {
        return $this->companyType;
    }

    /**
     * @param CompanyType $companyType )
     */
    public function setCompanyType(CompanyType $companyType)
    {
        $this->companyType = $companyType;
    }

    /**
     * Set turnover
     *
     * @param float $turnover
     *
     * @return Company
     */
    public function setTurnover($turnover)
    {
        $this->turnover = $turnover;

        return $this;
    }

    /**
     * Get turnover
     *
     * @return float
     */
    public function getTurnover()
    {
        return $this->turnover;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Company
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
}

