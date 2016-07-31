<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductBrand
 *
 * @ORM\Table(name="product_brand")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductBrandRepository")
 */
class ProductBrand
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
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer")
     */
    private $product_id;

    /**
     * @var int
     *
     * @ORM\Column(name="brand_id", type="integer")
     */
    private $brand_id;


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
     * Set productId
     *
     * @param integer $productId
     *
     * @return ProductBrand
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
     * Set brandId
     *
     * @param integer $brandId
     *
     * @return ProductBrand
     */
    public function setBrandId($brandId)
    {
        $this->brand_id = $brandId;

        return $this;
    }

    /**
     * Get brandId
     *
     * @return int
     */
    public function getBrandId()
    {
        return $this->brand_id;
    }
}

