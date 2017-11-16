<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promo
 *
 * @ORM\Table(name="promo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromoRepository")
 */
class Promo
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
     * @ORM\Column(name="promo_label", type="string", length=255)
     */
    private $promoLabel;


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
     * Set promoLabel
     *
     * @param string $promoLabel
     *
     * @return Promo
     */
    public function setPromoLabel($promoLabel)
    {
        $this->promoLabel = $promoLabel;

        return $this;
    }

    /**
     * Get promoLabel
     *
     * @return string
     */
    public function getPromoLabel()
    {
        return $this->promoLabel;
    }
}

