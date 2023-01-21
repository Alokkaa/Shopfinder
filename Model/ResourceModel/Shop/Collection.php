<?php
namespace Alokka\Shopfinder\Model\ResourceModel\Shop;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            'Alokka\Shopfinder\Model\Shop',
            'Alokka\Shopfinder\Model\ResourceModel\Shop'
        );
    }
}
