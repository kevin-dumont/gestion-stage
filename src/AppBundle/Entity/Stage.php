<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Stage
 *
 * @ORM\Table(name="stage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StageRepository")
 */
class Stage
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
     * One Stage has One Company.
     * @ORM\OneToOne(targetEntity="Company")
     */
    private $company;

    /**
     * One Stage has One PedagogicalReferent.
     * @ORM\OneToOne(targetEntity="PedagogicalReferent")
     */
    private $pedagogicalReferent;

    /**
     * One Stage has One ProfessionalReferent.
     * @ORM\OneToOne(targetEntity="ProfessionalReferent")
     */
    private $professionalReferent;

    /**
     * @ORM\ManyToMany(targetEntity="Technologie", cascade={"persist"})
     */
    private $technologies;

    /**
     * @ORM\ManyToOne(targetEntity="Visite")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $visite;

    /**
     * @ORM\ManyToOne(targetEntity="Student", cascade={"persist"})
     */
    private $student;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime")
     */
    private $endDate;

    /**
     * Stage constructor.
     */
    public function __construct()
    {
        $this->visite = new ArrayCollection();
        $this->student = new ArrayCollection();
        $this->technologies = new ArrayCollection();
    }

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
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return PedagogicalReferent
     */
    public function getPedagogicalReferent()
    {
        return $this->pedagogicalReferent;
    }

    /**
     * @param PedagogicalReferent $pedagogicalReferent
     */
    public function setPedagogicalReferent(PedagogicalReferent $pedagogicalReferent)
    {
        $this->pedagogicalReferent = $pedagogicalReferent;
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
     * @return ArrayCollection
     */
    public function getTechnologies()
    {
        return $this->technologies;
    }

    /**
     * @param Technologie $technologies
     * @return $this
     */
    public function setTechnologies(Technologie $technologies)
    {
        $this->technologies[] = $technologies;
        return $this;
    }

    /**
     * @return Visite
     */
    public function getVisite()
    {
        return $this->visite;
    }

    /**
     * @param Visite $visite
     */
    public function setVisite(Visite $visite)
    {
        $this->visite = $visite;
    }

    /**
     * @return Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param Student $student
     * @return $this
     */
    public function setStudent(Student $student)
    {
        $this->student[] = $student;
        return $this;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Stage
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Stage
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}

