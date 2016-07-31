<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Store
 *
 * @ORM\Table(name="stores")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StoreRepository")
 */
class Store
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
     * @var string
     *
     * @ORM\Column(name="address_name", type="string", length=255, nullable=true)
     */
    private $address_name;

    /**
     * @var string
     *
     * @ORM\Column(name="address_1", type="string", length=255)
     */
    private $address_1;

    /**
     * @var string
     *
     * @ORM\Column(name="address_2", type="string", length=255, nullable=true)
     */
    private $address_2;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var int
     *
     * @ORM\Column(name="postal", type="string", length=10)
     */
    private $postal;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="string", length=13, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="api_id", type="string", length=255)
     */
    private $api_id;

    /**
     * @var string
     *
     * @ORM\Column(name="circular_link", type="string", length=255)
     */
    private $circurlar_link;

    /**
     * @var integer
     *
     * @ORM\Column(name="source_id", type="integer")
     */
    private $source_id;


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
     * @return Store
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
     * Set addressName
     *
     * @param string $addressName
     *
     * @return Store
     */
    public function setAddressName($addressName)
    {
        $this->address_name = $addressName;

        return $this;
    }

    /**
     * Get addressName
     *
     * @return string
     */
    public function getAddressName()
    {
        return $this->address_name;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return Store
     */
    public function setAddress1($address1)
    {
        $this->address_1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address_1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return Store
     */
    public function setAddress2($address2)
    {
        $this->address_2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address_2;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Store
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Store
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set postal
     *
     * @param string $postal
     *
     * @return Store
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;

        return $this;
    }

    /**
     * Get postal
     *
     * @return string
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Store
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

    /**
     * Set apiId
     *
     * @param string $apiId
     *
     * @return Store
     */
    public function setApiId($apiId)
    {
        $this->api_id = $apiId;

        return $this;
    }

    /**
     * Get apiId
     *
     * @return string
     */
    public function getApiId()
    {
        return $this->api_id;
    }

    /**
     * Set circularLink
     *
     * @param string $circularLink
     *
     * @return Store
     */
    public function setCircularLink($circularLink)
    {
        $this->circurlar_link = $circularLink;

        return $this;
    }

    /**
     * Get circularLink
     *
     * @return string
     */
    public function getCircularLink()
    {
        return $this->circurlar_link;
    }

    /**
     * Set soureId
     *
     * @param string $soureId
     *
     * @return Store
     */
    public function setSourceId($soureId)
    {
        $this->source_id = $soureId;

        return $this;
    }

    /**
     * Get soureId
     *
     * @return int
     */
    public function getSourceId()
    {
        return $this->source_id;
    }
}

