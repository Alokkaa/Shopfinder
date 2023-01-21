<?php
namespace Alokka\Shopfinder\Api\Data;

interface ShopInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const SHOP_Name = 'shop_name';
    const IDENTIFIER = 'identifier';
    const COUNTRY = 'country';
    const IMAGE = 'image';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';

   /**
    * Get EntityId.
    *
    * @return int
    */
    public function getEntityId();

   /**
    * Set EntityId.
    */
    public function setEntityId($entityId);

   /**
    * Get Title.
    *
    * @return varchar
    */
    public function getShopName();

   /**
    * Set ShopName.
    */
    public function setShopName($shopName);

   /**
    * Get Identifier.
    *
    * @return varchar
    */
    public function getIdentifier();

   /**
    * Set Identifier.
    */
    public function setIdentifier($identifier);

   /**
    * Get Publish Date.
    *
    * @return varchar
    */
    public function getCountry();

   /**
    * Set Country.
    */
    public function setCountry($country);

   /**
    * Get Image.
    *
    * @return varchar
    */
    public function getImage();

   /**
    * Set Image.
    */
    public function setImage($image);

   /**
    * Get UpdateTime.
    *
    * @return varchar
    */
    public function getUpdateTime();

   /**
    * Set UpdateTime.
    */
    public function setUpdateTime($updateTime);

   /**
    * Get CreatedAt.
    *
    * @return varchar
    */
    public function getCreatedAt();

   /**
    * Set CreatedAt.
    */
    public function setCreatedAt($createdAt);
}
