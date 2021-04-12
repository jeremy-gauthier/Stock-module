<?php
namespace Jimdev\StockIncrement\Controller\Adminhtml\StockIncrement;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 */
class Index extends Action
{
    const MENU_ID = 'Jimdev_StockIncrement::stock_stockincrement';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    protected $helper;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        \Jimdev\StockIncrement\Helper\Data $helper,
        Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) { 
        parent::__construct($context);
        $this->helper = $helper;
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Load the page defined in view/adminhtml/layout/stockincrement_stockincrement_index.xml
     *
     * @return Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(static::MENU_ID);
        $resultPage->getConfig()->getTitle()->prepend(__('Import Stock'));
        
        return $resultPage;
    }
}