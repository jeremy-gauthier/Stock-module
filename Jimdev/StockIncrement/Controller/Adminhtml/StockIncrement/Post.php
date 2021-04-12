<?php
namespace Jimdev\StockIncrement\Controller\Adminhtml\StockIncrement;

use Magento\Backend\App\Action;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\Framework\Message\ManagerInterface;


/**
 * Class Post
 */
class Post extends \Magento\Backend\App\Action
{

    /**
     * @param Action\Context $context
     */
    protected $_fileUploaderFactory;
    protected $helper;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\App\RequestInterface $requestInterface,
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        StoreManagerInterface $storeManager,
        \Magento\Framework\Filesystem $filesystem, 
        \Jimdev\StockIncrement\Helper\Data $helper
    )
    {
        $this->_requestInterface = $requestInterface;
        $this->helper = $helper;
        $this->_fileUploaderFactory = $fileUploaderFactory;
        $this->_storeManager = $storeManager;
        $this->_filesystem = $filesystem;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $file = $this->getRequest()->getFiles("document");
        
            // test to know if csv is ok (product don't exist, bad format etc...)
            try {
                $data = $this->helper->testCSV($file);
            } catch(\Exception $e) {
                $this->messageManager->addErrorMessage(__('Error, at least one of your products does not exist, correct your csv and try again'));
            }

            if(isset($e)){
                return $this->_redirect('stockincrement/stockincrement/index/');
            }

            // else, csv process
            else{
                try {
                    $data = $this->helper->processCSV($file);
                    $this->messageManager->addSuccess(__('Your stocks have been updated'));
                } catch(\Exception $e) {
                    $this->messageManager->addErrorMessage(__('Error, Please check your CSV'));
                }
    
            return $this->_redirect('stockincrement/stockincrement/index/');
            }
    }

}