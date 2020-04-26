<?php
/**
 * This OXID module will ask for the Delivery Date during Checkout Process.
 * The Delivery Date will be stored in the Session and later stored in the DB:oxorder
 * The Delivery Date will be shown in the Order - Confirmation Email and on the Thank-You Page 
 *
 * The Delivery Date, which can be selected, is bound to some rules. 
 *
 * DEADLINE is a setting within the Modul.
 * Saturday as working day is selectable.
 * Count of dates for selection.
 * Land for Bankhollidays is selctable. 
 *
 * TODO: 
 * 1.) There needs to be a ADMIN Page, which displayes the Delivery Date within the Order
 * 2.) The Order History needs to be modified. 
 * 
 * NOTICE OF LICENSE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 of the License
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses/
 *
 * @copyright   Copyright (c) 2013 Peter Wiedeking, 2020 Walter Göth
 * @author      Walter Göth based on modul from Peter Wiedeking
 * @license     http://opensource.org/licenses/GPL-3.0  GNU General Public License, version 3 (GPL-3.0)
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.2';

$aModule = array(
    'id'          => 'deliverydate',
    'title'       => 'Delivery Date Erweiterung',
    'description' => array(
        'de'      => 'Dieses Modul ermöglicht dem Kunden bei der Bestellung ein Auslieferungsdatum anzugeben. <br> Dieses Datum wird in der Datenbank oxorder gespeichert.
		<br> Das Modul benötigt ein Option und zwar die Deadline für den Tag, Samstag Werktag und Anzahl Tage für Lieferdatum Vorschläge ',
        'en'      => 'Saves the delivery date in the order',
    ),
	'lang'        => 'de',
	'thumbnail'	  => 'delivery_date.jpg',
    'email'       => 'walter.goeth@gmx.at',
	'version'     => '1.0',
    'author'      => 'Walter Göth auf Basis von Peter Wiedeking',
    'extend'      => array(
		'Basket'         => 'deliverydate/controllers/deliverydate_basket',
                'Payment'        => 'deliverydate/controllers/deliverydate_payment',
		'Order'          => 'deliverydate/controllers/deliverydate_order',
		'Thankyou'       => 'deliverydate/controllers/deliverydate_thankyou',
		'oxorder'        => 'deliverydate/models/deliverydate_oxorder',
    ),
	'blocks'      => array(
        array('template' => 'page/checkout/basket.tpl',      'block' => 'checkout_basket_next_step_top',         'file' => 'out/blocks/page/checkout/basket'),
        array('template' => 'page/checkout/payment.tpl',     'block' => 'change_shipping',                       'file' => 'out/blocks/page/checkout/payment'),
        array('template' => 'page/checkout/order.tpl',       'block' => 'shippingAndPayment',                    'file' => 'out/blocks/page/checkout/order'), 
        array('template' => 'page/checkout/thankyou.tpl',    'block' => 'checkout_thankyou_info',                'file' => 'out/blocks/page/checkout/thankyou'), 
        array('template' => 'email/html/order_cust.tpl',     'block' => 'email_html_order_cust_deliveryinfo',    'file' => 'out/blocks/email/html/order_cust'),
		array('template' => 'email/plain/order_cust.tpl',    'block' => 'email_plain_order_cust_deliveryinfo',   'file' => 'out/blocks/email/plain/order_cust'),
		array('template' => 'email/html/order_owner.tpl',    'block' => 'email_html_order_owner_deliveryinfo',   'file' => 'out/blocks/email/html/order_cust'),
        array('template' => 'email/plain/order_owner.tpl',   'block' => 'email_plain_order_owner_deliveryinfo',  'file' => 'out/blocks/email/plain/order_cust')
     ),
	'settings' => array(
        array('group' => 'main', 'name' => 'DeadLine', 'type' => 'str', 'value' => '12'),
	array('group' => 'main', 'name' => 'Werktag', 'type' => 'str', 'value' => 'N'),
	array('group' => 'main', 'name' => 'Tage', 'type' => 'str', 'value' => '11'),
	array('group' => 'main', 'name' => 'Land', 'type' => 'str', 'value' => 'ö'),
    )
);
