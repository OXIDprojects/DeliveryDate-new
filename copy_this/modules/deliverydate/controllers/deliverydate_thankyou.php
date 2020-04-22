<?php
/**
 * Delivery Date Module
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
 * @copyright   Copyright (c) 2013 Peter Wiedeking
 * @author      Peter Wiedeking
 * @license     http://opensource.org/licenses/GPL-3.0  GNU General Public License, version 3 (GPL-3.0)
 */


/**
 * Extends thankyou object
 * This is important for the 5. Step in the Checkout Process 
 * to Display the DeliveryDate which is stored in the Session
 *
 * Template: out\blocks\page\checkout\thankyou.tpl
 * 
 */
class deliverydate_thankyou extends deliverydate_thankyou_parent {
 
  /**
   * Extends thankyou object
   * 
   * @return date
   * 
   * this is used in the Template: out/blocks/page/checkout/thankyou.tpl
   */
 public function getDeliveryDate()
	{
 		$deliveryDate = oxSession::getVariable( 'sDeliveryDate') ; 
		return $deliveryDate; 
    }

  /**
   * Extends thankyou object
   * 
   * @return Wochentag
   * 
   * this is used in the Template: out/blocks/page/checkout/thankyou.tpl
   */
 public function getDeliveryWeekDay()
	{
	$wochentag = "";
	$trans = array(
	    'Mon'   => 'Montag',
	    'Tue'   => 'Dienstag',
	    'Wed'   => 'Mittwoch',
	    'Thu'   => 'Donnerstag',
	    'Fri'   => 'Freitag',
	    'Sat'   => 'Samstag',
	    'Sun'   => 'Sonntag',);
 		$deliveryDate = oxSession::getVariable( 'sDeliveryDate') ; 
	$wochentag = date("D", strtotime($deliveryDate));
	$wochentag = strtr($wochentag, $trans);
	return $wochentag; 
    }

}
