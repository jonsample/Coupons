<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coupon
 *
 * @ORM\Table(name="coupon")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CouponRepository")
 */
class Coupon
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="api_id", type="integer")
     */
    private $api_id;

    /**
     * @var float
     *
     * @ORM\Column(name="unit_price", type="float", precision=2)
     */
    private $unit_price;

    /**
     * @var int
     *
     * @ORM\Column(name="min_unit", type="integer")
     */
    private $min_unit;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string")
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer")
     */
    private $product_id;

    /**
     * @var bool
     *
     * @ORM\Column(name="club_card_required", type="boolean")
     */
    private $club_card_required;


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
     * Set title
     *
     * @param string $title
     *
     * @return Coupon
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set apiId
     *
     * @param integer $apiId
     *
     * @return Coupon
     */
    public function setApiId($apiId)
    {
        $this->api_id = $apiId;

        return $this;
    }

    /**
     * Get apiId
     *
     * @return int
     */
    public function getApiId()
    {
        return $this->api_id;
    }

    /**
     * Set unitPrice
     *
     * @param float $unitPrice
     *
     * @return Coupon
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unit_price = $unitPrice;

        return $this;
    }

    /**
     * Get unitPrice
     *
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * Set minUnit
     *
     * @param integer $minUnit
     *
     * @return Coupon
     */
    public function setMinUnit($minUnit)
    {
        $this->min_unit = $minUnit;

        return $this;
    }

    /**
     * Get minUnit
     *
     * @return int
     */
    public function getMinUnit()
    {
        return $this->min_unit;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Coupon
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return Coupon
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set clubCardRequired
     *
     * @param boolean $clubCardRequired
     *
     * @return Coupon
     */
    public function setClubCardRequired($clubCardRequired)
    {
        $this->club_card_required = $clubCardRequired;

        return $this;
    }

    /**
     * Get clubCardRequired
     *
     * @return bool
     */
    public function getClubCardRequired()
    {
        return $this->club_card_required;
    }
}

