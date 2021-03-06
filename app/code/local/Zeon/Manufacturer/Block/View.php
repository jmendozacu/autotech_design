<?php
/**
 * Zeon Solutions, Inc.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Zeon Solutions License
 * that is bundled with this package in the file LICENSE_ZE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.zeonsolutions.com/license/
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zeonsolutions.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * versions in the future. If you wish to customize this extension for your
 * needs please refer to http://www.zeonsolutions.com for more information.
 *
 * @category    Zeon
 * @package     Zeon_Manufacturer
 * @copyright   Copyright (c) 2012 Zeon Solutions, Inc. All Rights Reserved.(http://www.zeonsolutions.com)
 * @license     http://www.zeonsolutions.com/license/
 */

class Zeon_Manufacturer_Block_View extends Mage_Catalog_Block_Product_Abstract
{
    protected $_manufacturer;

    protected $_defaultToolbarBlock = 'catalog/product_list_toolbar';
    
    protected $_manufacturerCollection;

    /**
     * Retrieve Manufacturer instance
     *
     * @return Zeon_Manufacturer_Model_Manufacturer
     */
    public function getManufacturer()
    {
        $manufacturerId = $this->getRequest()->getParam('manufacturer_id', false);
        if (is_null($this->_manufacturer)) {
            if ($manufacturerId) {
                $this->_manufacturer = Mage::getModel('zeon_manufacturer/manufacturer')
                    ->setStoreId(Mage::app()->getStore()->getId())
                    ->load($manufacturerId);
            } else {
                $this->_manufacturer = Mage::getSingleton('zeon_manufacturer/manufacturer');
            }
        }
        return $this->_manufacturer; 
    }
    
     /**
     * Retrieve Manufacturer collection
     *
     * @return Zeon_Manufacturer_Model_Resource_Manufacturer_Collection
     */
    protected function _getManufacturerCollection() 
    {
        $manufacturerCode = Mage::helper('zeon_manufacturer')->getManufacturersAttributeCode();
        if (is_null($this->_manufacturerCollection)) {
            $manufacturerId = $this->getManufacturer()->getManufacturer();
        
            $this->_manufacturerCollection = Mage::getResourceModel('catalog/product_collection');
            $this->_manufacturerCollection->setVisibility(Mage::getSingleton('catalog/product_visibility')->getVisibleInCatalogIds());
            
            $this->_manufacturerCollection = $this->_addProductAttributesAndPrices($this->_manufacturerCollection)
            ->addStoreFilter()
            ->addAttributeToFilter($manufacturerCode, $manufacturerId);
        
        }
        
        return $this->_manufacturerCollection;
    }
    
    /**
     * Retrieve loaded Manufacturer collection
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    public function getManufacturerCollection()
    {
        return $this->_getManufacturerCollection();
    }

    /**
     * Prepare global layout
     *
     * @return Zeon_Manufacturer_Block_View
     */
    protected function _prepareLayout()
    {
        $manufacturer = $this->getManufacturer();
        $helper = Mage::helper('zeon_manufacturer');
        // show breadcrumbs
        if ($breadcrumbs = $this->getLayout()->getBlock('breadcrumbs')) {
                $breadcrumbs->addCrumb('home', array('label'=>$helper->__('Home'), 'title'=>$helper->__('Go to Home Page'), 'link'=>Mage::getBaseUrl()));
                $breadcrumbs->addCrumb('manufacturers_list', array('label'=>$helper->__('Manufacturers'), 'title'=>$helper->__('Manufacturers'), 'link'=>Mage::getUrl('manufacturers')));
                $breadcrumbs->addCrumb('manufacturers_view', array('label'=>Mage::getModel('zeon_manufacturer/manufacturer')->getManufacturerName($manufacturer->getManufacturer(), Mage::app()->getStore()->getId()), 'title'=>$manufacturer->getIdentifier()));
        }

        $head = $this->getLayout()->getBlock('head');
        if ($head) {
            $head->setTitle($helper->getDefaultTitle());
            $head->setKeywords($helper->getDefaultMetaKeywords());
            $head->setDescription($helper->getDefaultMetaDescription());
        }

        return parent::_prepareLayout();
    }
    

    public function getMode()
    {
        return $this->getChild('toolbar')->getCurrentMode();
    }

    /**
     * Retrieve Products collection
     *
     *
     */
    protected function _beforeToHtml()
    {  
        $toolbar = $this->getToolbarBlock();

        // called prepare sortable parameters
        $collection = $this->_getManufacturerCollection();
    
        // use sortable parameters
        if ($orders = $this->getAvailableOrders()) {
            $toolbar->setAvailableOrders($orders);
        }
        if ($sort = $this->getSortBy()) {
            $toolbar->setDefaultOrder($sort);
        }
        if ($dir = $this->getDefaultDirection()) {
            $toolbar->setDefaultDirection($dir);
        }
        if ($modes = $this->getModes()) {
            $toolbar->setModes($modes);
        } 

        // set collection to toolbar and apply sort
        $toolbar->setCollection($collection);

        $this->setChild('toolbar', $toolbar);
        Mage::dispatchEvent('catalog_block_product_list_collection', array(
            'collection' => $this->_getManufacturerCollection()
        ));

        $this->setProductCollection($collection);

        return parent::_beforeToHtml();
    }

    public function getToolbarBlock()
    {   
        if ($blockName = $this->getToolbarBlockName()) {
            if ($block = $this->getLayout()->getBlock($blockName)) {
                return $block;
            }
        }
        $block = $this->getLayout()->createBlock($this->_defaultToolbarBlock, microtime());
        return $block;
    }

    public function getToolbarHtml()
    {
        return $this->getChildHtml('toolbar');
    }

    public function setCollection($collection)
    {
        $this->_manufacturerCollection = $collection;
        return $this;
    }

}