<?php
declare(strict_types=1);
namespace Alokka\Shopfinder\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Alokka\Shopfinder\Model\ShopFactory;


class Shop implements ResolverInterface
{

    protected $shopFactory;

    public function __construct(
        ShopFactory $shopFactory
    ) {
        $this->shopFactory  = $shopFactory;
    }

    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {

        try {
            if (!isset($args['identifier'])) {
                throw new GraphQlInputException(__('identifier is required.'));
            }
            $identifier = $args['identifier'];
            $collection = $this->shopFactory->create()->getCollection()
                         ->addFieldToFilter("identifier", ["eq"=>$identifier]);
            $shop = $collection->getData();
            return $shop;

        } catch (NoSuchEntityException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        } catch (LocalizedException $exception) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()));
        }
    }

}