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
 * Extends user object
 * This is important for the 2. Step in the Checkout Process 
 * to Display the DeliveryDate which is stored in the Session
 *
 * Template: out\blocks\page\checkout\basket.tpl
 * 
 */
class deliverydate_basket extends deliverydate_basket_parent {
 
  /**
   * Extends user object
   * 
   * @return true
   * 
   * this is used in the Template: out/blocks/page/checkout/basket.tpl
   */
 public function destroyDeliveryDate()
	{
		oxSession::deleteVariable('sDeliveryDate'); 
		return ""; 
    }

}
