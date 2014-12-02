<?php
class Ampersand_Mustache_Block_Abstract extends Mage_Core_Block_Template
{

    /**
     * @author Yousef Cisco <yc@amp.co>
     */
    public function getCurrencySymbol()
    {
        $store = Mage::app()->getStore();

        $currencyCode = $store->getCurrentCurrencyCode();

        $currencySymbol = Mage::app()->getLocale()->currency($currencyCode)->getSymbol();

        return $currencySymbol;
    }

}