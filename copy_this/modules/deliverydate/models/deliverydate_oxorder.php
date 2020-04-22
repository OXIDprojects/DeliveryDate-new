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
 * Extends order object
 * This is important for the 4. Step in the Checkout Process 
 * to store the DeliveryDate from the Session in the Database.
 *
 * Template: none
 * 
 */
class deliveryDate_oxorder extends deliveryDate_oxorder_parent {

  /**
   * Extends order finalization.
   *
   * It is important that I call the parent::finalizeOrder method at last. 
   * Because the Order Confirmation Email (part of parent::finalizeOrder) retrieves the delivery Date from the Database.  
   * Therefore the DeliveryDate needs to be stored in the database before that. 
   * 
   * @return integer
   */
  public function finalizeOrder( oxBasket $oBasket, $oUser, $blRecalculatingOrder = false ) {

	$oSession = $this->getSession();
	$deliveryDate = $oSession->getVariable('sDeliveryDate');
	$this->oxorder__BWdeldate = new oxField($deliveryDate); 

	$res = parent::finalizeOrder($oBasket, $oUser, $blRecalculatingOrder = false);
     
	$this->setdatum($oBasket, $oUser, $blRecalculatingOrder = false);
	
	return $res;
  }

  public function setdatum(oxBasket $oBasket, $oUser, $blRecalculatingOrder = false){

		$oSession = $this->getSession();
		$deliveryDate = $oSession->getVariable('sDeliveryDate'); 
                $orderid = $oBasket->getOrderId();
                
		$strSQL = "Update oxorder set BWdeldate='$deliveryDate' where oxid='$orderid'";
            	oxDb::getDb()->Execute($strSQL);

  }
}
