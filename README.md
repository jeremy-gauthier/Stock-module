# Stock-module
Magento 2 Module

Update your stock with CSV file

<img width="155" alt="Capture d’écran 2021-04-12 à 18 42 11" src="https://user-images.githubusercontent.com/52053028/114430515-cd933400-9bbe-11eb-804c-2d8b25ae9075.png">



## How to setup this module : ##

copy the module to the file app/code

Run commands :

- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:Deploy -f
- php bin/magento cache:flush

Now you can find your new extention in system -> stock -> stock increment

You can update your stock with CSV file. If you try to update stock with an unknown SKU, you will have an error message and your stock will not update
