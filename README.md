# Stock-module

Magento 2.3.*

Update your stock with CSV file


## How to setup this module : ##

Copy folder in app/code

Run commands :

- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:Deploy -f
- php bin/magento cache:flush

Now you can find your new extention in system -> stock -> stock increment

You can update your stock with CSV file. If you try to update stock with an unknown SKU, you will have an error message and your stock will not update
