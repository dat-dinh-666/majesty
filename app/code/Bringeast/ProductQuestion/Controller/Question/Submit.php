<?php

namespace Bringeast\ProductQuestion\Controller\Question;

use Bringeast\ProductQuestion\Model\ProductQuestionFactory;
use Bringeast\ProductQuestion\Model\ResourceModel\ProductQuestion;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Message\Manager;

class Submit extends Action implements HttpPostActionInterface
{
    /**
     * @var Validator
     */
    private $formKeyValidator;
    /**
     * @var ProductQuestionFactory
     */
    private $productQuestionFactory;
    /**
     * @var ProductQuestion
     */
    private $productQuestionResource;

    public function __construct(Context $context, Validator $formKeyValidator, ProductQuestionFactory $productQuestionFactory, ProductQuestion $productQuestionResource, Manager $messageManager)
    {
        parent::__construct($context);
        $this->formKeyValidator = $formKeyValidator;
        $this->productQuestionFactory = $productQuestionFactory;
        $this->productQuestionResource = $productQuestionResource;
        $this->messageManager = $messageManager;
    }

    public function execute()
    {
        $request = $this->getRequest();
        if(!$this->formKeyValidator->validate($request)) {
            /** @var Redirect $result */
            $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $result->setPath('/');
            return $result;
        }
        $params = $request->getParams();
        try {
            $record = $this->productQuestionFactory->create();
            $record->setName($params['name']);
            $record->setEmail($params['email']);
            $record->setZipCode($params['zip_code']);
            $record->setPhone($params['phone']);
            $record->setComments($params['comments']);
            $record->setProductId($params['product_id']);
            $this->productQuestionResource->save($record);
        } catch (\Exception $e) {
        }
        $this->messageManager->addSuccessMessage(__('Your comment has been saved'));
        /** @var Redirect $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $result->setPath('/');
        return $result;
    }
}

