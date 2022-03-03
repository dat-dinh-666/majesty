<?php

namespace Bringeast\ProductQuestion\Ui\Component\Listing\Column;

use Magento\Catalog\Model\ResourceModel\Product;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

class ProductName extends \Magento\Ui\Component\Listing\Columns\Column
{

    const URL_PATH_VIEW = 'myor_goldorder/goldorder/view';
    protected $urlBuilder;
    /**
     * @var Product
     */
    private $productResource;
    /**
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param Product $productResource
     * @param ProductFactory $productFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        Product $productResource,
        ProductFactory $productFactory,
        array $components = [],
        array $data = []
    )
    {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->productResource = $productResource;
        $this->productFactory = $productFactory;
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as $key => $value) {
                $product = $this->productFactory->create();
                $this->productResource->load($product, $value['product_id']);
                if(!$product->getId()) {
                    continue;
                }
                $dataSource['data']['items'][$key]['product_name'] = $product->getName();
            }
        }
        return $dataSource;
    }
}
