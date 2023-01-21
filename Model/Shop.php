<?php
namespace Alokka\Shopfinder\Model;

use Alokka\Shopfinder\Api\Data\ShopInterface;

class Shop extends \Magento\Framework\Model\AbstractModel implements ShopInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'shopfinder';

    /**
     * @var string
     */
    protected $_cacheTag = 'shopfinder';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'shopfinder';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Alokka\Shopfinder\Model\ResourceModel\Shop');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get ShopName.
     *
     * @return varchar
     */
    public function getShopName()
    {
        return $this->getData(self::SHOP_Name);
    }

    /**
     * Set ShopName.
     */
    public function setShopName($shopName)
    {
        return $this->setData(self::SHOP_Name, $shopName);
    }

    /**
     * Get Identifier.
     *
     * @return varchar
     */
    public function getIdentifier()
    {
        return $this->getData(self::IDENTIFIER);
    }

    /**
     * Set Identifier.
     */
    public function setIdentifier($identifier)
    {
        return $this->setData(self::IDENTIFIER, $identifier);
    }

    /**
     * Get Country.
     *
     * @return varchar
     */
    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * Set Country.
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    /**
     * Get Image.
     *
     * @return varchar
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * Set Image.
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
