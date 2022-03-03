<?php
namespace Bringeast\ProductQuestion\Model\ResourceModel;

class ProductQuestion extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('bringeast_product_question', 'id');
    }

}
