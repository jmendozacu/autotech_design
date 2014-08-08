<?php
/**
* Ext4mage Orders2csv Module
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to Henrik Kier <info@ext4mage.com> so we can send you a copy immediately.
*
* @category   Ext4mage
* @package    Ext4mage_Orders2csv
* @copyright  Copyright (c) 2012 Ext4mage (http://ext4mage.com)
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
* @author     Henrik Kier <info@ext4mage.com>
* */
class Ext4mage_Orders2csv_Helper_Data extends Mage_Core_Helper_Abstract
{
	
	public function getValueOptions() {
		$valueOptions = array(
			'order_data_entity_id' => Mage::helper('orders2csv')->__('order entity id'),
			'order_data_state' => Mage::helper('orders2csv')->__('order state'),
			'order_data_status' => Mage::helper('orders2csv')->__('order status'),
			'order_data_coupon_code' => Mage::helper('orders2csv')->__('order coupon code'),
			'order_data_shipping_description' => Mage::helper('orders2csv')->__('order shipping description'),
			'order_data_is_virtual' => Mage::helper('orders2csv')->__('order is virtual'),
			'order_data_store_id' => Mage::helper('orders2csv')->__('order store id'),
			'order_data_customer_id' => Mage::helper('orders2csv')->__('order customer id'),
			'order_data_discount_amount' => Mage::helper('orders2csv')->__('order discount amount'),
			'order_data_discount_canceled' => Mage::helper('orders2csv')->__('order discount canceled'),
			'order_data_discount_invoiced' => Mage::helper('orders2csv')->__('order discount invoiced'),
			'order_data_discount_refunded' => Mage::helper('orders2csv')->__('order discount refunded'),
			'order_data_grand_total' => Mage::helper('orders2csv')->__('order grand total'),
			'order_data_shipping_amount' => Mage::helper('orders2csv')->__('order shipping amount'),
			'order_data_shipping_canceled' => Mage::helper('orders2csv')->__('order shipping canceled'),
			'order_data_shipping_invoiced' => Mage::helper('orders2csv')->__('order shipping invoiced'),
			'order_data_shipping_refunded' => Mage::helper('orders2csv')->__('order shipping refunded'),
			'order_data_shipping_tax_amount' => Mage::helper('orders2csv')->__('order shipping tax amount'),
			'order_data_shipping_tax_refunded' => Mage::helper('orders2csv')->__('order shipping tax refunded'),
			'order_data_subtotal' => Mage::helper('orders2csv')->__('order subtotal'),
			'order_data_subtotal_canceled' => Mage::helper('orders2csv')->__('order subtotal canceled'),
			'order_data_subtotal_invoiced' => Mage::helper('orders2csv')->__('order subtotal invoiced'),
			'order_data_subtotal_refunded' => Mage::helper('orders2csv')->__('order subtotal refunded'),
			'order_data_tax_amount' => Mage::helper('orders2csv')->__('order tax amount'),
			'order_data_tax_canceled' => Mage::helper('orders2csv')->__('order tax canceled'),
			'order_data_tax_invoiced' => Mage::helper('orders2csv')->__('order tax invoiced'),
			'order_data_tax_refunded' => Mage::helper('orders2csv')->__('order tax refunded'),
			'order_data_total_canceled' => Mage::helper('orders2csv')->__('order total canceled'),
			'order_data_total_invoiced' => Mage::helper('orders2csv')->__('order total invoiced'),
			'order_data_total_offline_refunded' => Mage::helper('orders2csv')->__('order total offline refunded'),
			'order_data_total_online_refunded' => Mage::helper('orders2csv')->__('order total online refunded'),
			'order_data_total_paid' => Mage::helper('orders2csv')->__('order total paid'),
			'order_data_total_qty_ordered' => Mage::helper('orders2csv')->__('order total qty ordered'),
			'order_data_total_refunded' => Mage::helper('orders2csv')->__('order total refunded'),
			'order_data_customer_is_guest' => Mage::helper('orders2csv')->__('order customer is guest'),
			'order_data_shipping_discount_amount' => Mage::helper('orders2csv')->__('order shipping discount amount'),
			'order_data_subtotal_incl_tax' => Mage::helper('orders2csv')->__('order subtotal incl tax'),
			'order_data_total_due' => Mage::helper('orders2csv')->__('order total due'),
			'order_data_weight' => Mage::helper('orders2csv')->__('order weight'),
			'order_data_increment_id' => Mage::helper('orders2csv')->__('order increment id'),
			'order_data_base_currency_code' => Mage::helper('orders2csv')->__('order base currency code'),
			'order_data_customer_email' => Mage::helper('orders2csv')->__('order customer email'),
			'order_data_customer_firstname' => Mage::helper('orders2csv')->__('order customer firstname'),
			'order_data_customer_lastname' => Mage::helper('orders2csv')->__('order customer lastname'),
			'order_data_customer_middlename' => Mage::helper('orders2csv')->__('order customer middlename'),
			'order_data_customer_prefix' => Mage::helper('orders2csv')->__('order customer prefix'),
			'order_data_customer_suffix' => Mage::helper('orders2csv')->__('order customer suffix'),
			'order_data_customer_taxvat' => Mage::helper('orders2csv')->__('order customer taxvat'),
			'order_data_discount_description' => Mage::helper('orders2csv')->__('order discount description'),
			'order_data_ext_customer_id' => Mage::helper('orders2csv')->__('order ext customer id'),
			'order_data_ext_order_id' => Mage::helper('orders2csv')->__('order ext order id'),
			'order_data_order_currency_code' => Mage::helper('orders2csv')->__('order order currency code'),
			'order_data_shipping_method' => Mage::helper('orders2csv')->__('order shipping method'),
			'order_data_created_at' => Mage::helper('orders2csv')->__('order created at'),
			'order_data_total_item_count' => Mage::helper('orders2csv')->__('order total item count'),
			'order_data_shipping_incl_tax' => Mage::helper('orders2csv')->__('order shipping incl tax'),
			'order_shipping_description' => Mage::helper('orders2csv')->__('order shipping description'),
			'order_payment_block' => Mage::helper('orders2csv')->__('order payment block'),
			'order_store_url' => Mage::helper('orders2csv')->__('order store url'),
			'order_store_base_url' => Mage::helper('orders2csv')->__('order store base url'),
			'order_num_invoices' => Mage::helper('orders2csv')->__('order num invoices'),
			'order_num_shipments' => Mage::helper('orders2csv')->__('order num shipments'),
			'order_num_creditmemos' => Mage::helper('orders2csv')->__('order num creditmemos'),
			'order_billing_data_fax' => Mage::helper('orders2csv')->__('order billing fax'),
			'order_billing_data_region' => Mage::helper('orders2csv')->__('order billing region'),
			'order_billing_data_postcode' => Mage::helper('orders2csv')->__('order billing postcode'),
			'order_billing_data_lastname' => Mage::helper('orders2csv')->__('order billing lastname'),
			'order_billing_data_street' => Mage::helper('orders2csv')->__('order billing street'),
			'order_billing_data_city' => Mage::helper('orders2csv')->__('order billing city'),
			'order_billing_data_email' => Mage::helper('orders2csv')->__('order billing email'),
			'order_billing_data_telephone' => Mage::helper('orders2csv')->__('order billing telephone'),
			'order_billing_data_country_id' => Mage::helper('orders2csv')->__('order billing country id'),
			'order_billing_data_firstname' => Mage::helper('orders2csv')->__('order billing firstname'),
			'order_billing_data_address_type' => Mage::helper('orders2csv')->__('order billing address type'),
			'order_billing_data_prefix' => Mage::helper('orders2csv')->__('order billing prefix'),
			'order_billing_data_middlename' => Mage::helper('orders2csv')->__('order billing middlename'),
			'order_billing_data_suffix' => Mage::helper('orders2csv')->__('order billing suffix'),
			'order_billing_data_company' => Mage::helper('orders2csv')->__('order billing company'),
			'order_billing_country_name' => Mage::helper('orders2csv')->__('order billing country name'),
			'order_shipping_data_fax' => Mage::helper('orders2csv')->__('order shipping fax'),
			'order_shipping_data_region' => Mage::helper('orders2csv')->__('order shipping region'),
			'order_shipping_data_postcode' => Mage::helper('orders2csv')->__('order shipping postcode'),
			'order_shipping_data_lastname' => Mage::helper('orders2csv')->__('order shipping lastname'),
			'order_shipping_data_street' => Mage::helper('orders2csv')->__('order shipping street'),
			'order_shipping_data_city' => Mage::helper('orders2csv')->__('order shipping city'),
			'order_shipping_data_email' => Mage::helper('orders2csv')->__('order shipping email'),
			'order_shipping_data_telephone' => Mage::helper('orders2csv')->__('order shipping telephone'),
			'order_shipping_data_country_id' => Mage::helper('orders2csv')->__('order shipping country id'),
			'order_shipping_data_firstname' => Mage::helper('orders2csv')->__('order shipping firstname'),
			'order_shipping_data_address_type' => Mage::helper('orders2csv')->__('order shipping address type'),
			'order_shipping_data_prefix' => Mage::helper('orders2csv')->__('order shipping prefix'),
			'order_shipping_data_middlename' => Mage::helper('orders2csv')->__('order shipping middlename'),
			'order_shipping_data_suffix' => Mage::helper('orders2csv')->__('order shipping suffix'),
			'order_shipping_data_company' => Mage::helper('orders2csv')->__('order shipping company'),
			'order_shipping_country_name' => Mage::helper('orders2csv')->__('order shipping country name'),
			'item_data_parent_item_id' => Mage::helper('orders2csv')->__('item parent item id'),
			'item_data_created_at' => Mage::helper('orders2csv')->__('item created at'),
			'item_data_product_id' => Mage::helper('orders2csv')->__('item product id'),
			'item_data_product_type' => Mage::helper('orders2csv')->__('item product type'),
			'item_data_weight' => Mage::helper('orders2csv')->__('item weight'),
			'item_data_is_virtual' => Mage::helper('orders2csv')->__('item is virtual'),
			'item_data_sku' => Mage::helper('orders2csv')->__('item sku'),
			'item_data_name' => Mage::helper('orders2csv')->__('item name'),
			'item_data_description' => Mage::helper('orders2csv')->__('item description'),
			'item_data_qty_backordered' => Mage::helper('orders2csv')->__('item qty backordered'),
			'item_data_qty_canceled' => Mage::helper('orders2csv')->__('item qty canceled'),
			'item_data_qty_invoiced' => Mage::helper('orders2csv')->__('item qty invoiced'),
			'item_data_qty_ordered' => Mage::helper('orders2csv')->__('item qty ordered'),
			'item_data_qty_refunded' => Mage::helper('orders2csv')->__('item qty refunded'),
			'item_data_qty_shipped' => Mage::helper('orders2csv')->__('item qty shipped'),
			'item_data_price' => Mage::helper('orders2csv')->__('item price'),
			'item_data_original_price' => Mage::helper('orders2csv')->__('item original price'),
			'item_data_tax_percent' => Mage::helper('orders2csv')->__('item tax percent'),
			'item_data_tax_amount' => Mage::helper('orders2csv')->__('item tax amount'),
			'item_data_tax_invoiced' => Mage::helper('orders2csv')->__('item tax invoiced'),
			'item_data_discount_percent' => Mage::helper('orders2csv')->__('item discount percent'),
			'item_data_discount_amount' => Mage::helper('orders2csv')->__('item discount amount'),
			'item_data_discount_invoiced' => Mage::helper('orders2csv')->__('item discount invoiced'),
			'item_data_amount_refunded' => Mage::helper('orders2csv')->__('item amount refunded'),
			'item_data_row_total' => Mage::helper('orders2csv')->__('item row total'),
			'item_data_row_invoiced' => Mage::helper('orders2csv')->__('item row invoiced'),
			'item_data_row_weight' => Mage::helper('orders2csv')->__('item row weight'),
			'item_data_tax_before_discount' => Mage::helper('orders2csv')->__('item tax before discount'),
			'item_data_price_incl_tax' => Mage::helper('orders2csv')->__('item price incl tax'),
			'item_data_row_total_incl_tax' => Mage::helper('orders2csv')->__('item row total incl tax'),
			'item_status' => Mage::helper('orders2csv')->__('item status'),
			'item_option_data_label' => Mage::helper('orders2csv')->__('item option label'),
			'item_option_data_value' => Mage::helper('orders2csv')->__('item option value'),
            // sitemaster test value
            'test1' => "test1",
            'test2' => "test2",
            'test3' => "test3",
            'test4' => "test3"

		);
		return $valueOptions;
	}
	
	public function getCurrencyKeys() {
	  $valueOptions = array(
		'order_data_discount_amount',
		'order_data_discount_canceled',
		'order_data_discount_invoiced',
		'order_data_discount_refunded',
		'order_data_grand_total',
		'order_data_shipping_amount',
		'order_data_shipping_canceled',
		'order_data_shipping_invoiced',
		'order_data_shipping_refunded',
		'order_data_shipping_tax_amount',
		'order_data_shipping_tax_refunded',
		'order_data_subtotal',
		'order_data_subtotal_canceled',
		'order_data_subtotal_invoiced',
		'order_data_subtotal_refunded',
		'order_data_tax_amount',
		'order_data_tax_canceled',
		'order_data_tax_invoiced',
		'order_data_tax_refunded',
		'order_data_total_canceled',
		'order_data_total_invoiced',
		'order_data_total_offline_refunded',
		'order_data_total_online_refunded',
		'order_data_total_paid',
		'order_data_total_refunded',
		'order_data_shipping_discount_amount',
		'order_data_subtotal_incl_tax',
		'order_data_total_due',
		'order_data_shipping_incl_tax',
		'item_data_price',
		'item_data_original_price',
		'item_data_tax_amount',
		'item_data_tax_invoiced',
		'item_data_discount_amount',
		'item_data_discount_invoiced',
		'item_data_amount_refunded',
		'item_data_row_total',
		'item_data_row_invoiced',
		'item_data_tax_before_discount',
		'item_data_price_incl_tax',
	    'item_data_row_total_incl_tax'
	  );
	  return $valueOptions;
	}
}