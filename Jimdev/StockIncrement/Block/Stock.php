<?php

namespace Jimdev\StockIncrement\Block;

class Stock extends \Magento\Framework\View\Element\Template
{
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
       }

    /**
     * Get form action URL for POST stock request
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('stockincrement/stockincrement/post');
    }
}