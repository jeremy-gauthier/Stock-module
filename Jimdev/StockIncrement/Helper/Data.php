<?php
namespace Jimdev\StockIncrement\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $stockRegistry;
    protected $csv;
    
    public function __construct(
        \Magento\Framework\File\Csv $csv,
        \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry
    )
    {
        $this->csv = $csv;
        $this->stockRegistry = $stockRegistry;
    }

    public function testCSV($file){

        if (!isset($file['tmp_name'])) 
            throw new \Magento\Framework\Exception\LocalizedException(__('Invalid file upload attempt.'));

        $csvData = $this->csv->getData($file['tmp_name']);

        foreach ($csvData as $row => $data) {
                
        if ($row > 0){   
                $entry = $data[0];
                $info = explode(';', $entry);
                $sku = $info[0];
                $item = $this->stockRegistry->getStockItemBySku($sku);
                }
            }
        }

    public function processCSV($file){ 
        
        if (!isset($file['tmp_name'])) 
            throw new \Magento\Framework\Exception\LocalizedException(__('Invalid file upload attempt.'));

        $csvData = $this->csv->getData($file['tmp_name']);

        foreach ($csvData as $row => $data) {
                
            if ($row > 0){    
                $entry = $data[0];
                $info = explode(';', $entry);
                $sku = $info[0];
                $qty = trim($info[1]);
                    
                $item = $this->stockRegistry->getStockItemBySku($sku);
                $stockItem=$item->getQty();
                $newStock = $stockItem + $qty;
    
                // Update new stock
                $stockItem=$item->setQty($newStock);
                $stockItem = $item->setIsInStock( $newStock > 0 ? 1 : 0);
                $this->stockRegistry->updateStockItemBySku($sku, $stockItem);   
                }
            }              
        }
    }
?>
    




    