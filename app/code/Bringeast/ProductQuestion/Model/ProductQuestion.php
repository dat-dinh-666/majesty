<?php
namespace Bringeast\ProductQuestion\Model;
class ProductQuestion extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'bringeast_product_question';

    protected $_cacheTag = 'bringeast_product_question';

    protected $_eventPrefix = 'bringeast_product_question';

    protected function _construct()
    {
        $this->_init('Bringeast\ProductQuestion\Model\ResourceModel\ProductQuestion');
    }

    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
