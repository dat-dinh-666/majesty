<?php
namespace Bringeast\ProductQuestion\Model\ResourceModel\ProductQuestion;

use Bringeast\ProductQuestion\Model\ProductQuestion;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'bringeast_product_question';
    protected $_eventObject = 'product_question_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ProductQuestion::class, \Bringeast\ProductQuestion\Model\ResourceModel\ProductQuestion::class);
    }
}
