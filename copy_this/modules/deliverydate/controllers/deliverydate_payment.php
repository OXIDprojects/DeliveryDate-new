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
 * Extends payment object
 *
 * This is important for the 3. Step in the Checkout Process 
 * to Display and set the DeliveryDate
 *
 * Template: out\blocks\page\checkout\payment.tpl
 * 
 */
class deliverydate_payment extends deliverydate_payment_parent
{
    /**
	*  Checks the DEADLINE Setting of the Modul
	*  Returns TRUE if NOW is bevor Deadline
	*
	*  @returns boolean
	*/
	public function isBeforeDeadline()
	{
	   $myconfig = oxRegistry::get("oxConfig");
	   $deadline = $myconfig->getConfigParam("DeadLine");
	   if ($deadline > 0) {
		return (boolean) (DATE('G') < $deadline );  
	   }
	   return (true);
	}
	
	/** 
	*  Checks if tomorrow is a working day. 
	*  TChecks if tomorrow is a banking Holidays / Feiertage
	*
	*  @returns boolean
	*/
	public function isTomorrowWorkDay()
	{
	   $myconfig = oxRegistry::get("oxConfig");
	   $werktag = $myconfig->getConfigParam("Werktag");
	   if ($werktag == "J") {
		return (boolean) (date('w') != 0); 
	   } else { 
		return (boolean) (date('w') != 0 && date('w') != 6 );
	   }
	}
	/** 
	*  Checks if date is a working day. 
	*
	*  @returns boolean
	*/
	public function isDateWorkDay($datum)
	{
	   $myconfig = oxRegistry::get("oxConfig");
	   $werktag = $myconfig->getConfigParam("Werktag");
	   if ($werktag == "J") {
		return (boolean) (date('w', strtotime($datum)) != 0);
	   } else {	     
		return (boolean) (date('w', strtotime($datum)) != 0 && date('w', strtotime($datum)) != 6 );
	   }
	}

	/** Funktion zur Ermittlung der Feiertage
	*
	*
	* @returns boolean
	*/

	public function feiertag($sdatum, $land, $region) {
	/*
	# land kann sein:
	    ö - Österreich
	    d - Deutschland
	# region kann sein:
	    <leer> keine der unten Spezifizierten
	    bawü - Baden-Würthenberg
	    bay - Bayern
	    bran - Brandenburg
	    mepo - Mecklenburg-Vorpommern
	    nrw - Nordrhein-Westfahlen
	    rhpf - Rheinland-Pfalz
	    saan - Sachsen-Anhalt
	    saar - Saarland
	    sax - Sachsen
	    thr - Thüringen
	    */
	    if (!function_exists('easter_date')) {
	        return false;
	    }//end if

	    $datum = strtotime($sdatum);

	    if (empty($datum)) {
	        $werktag = time();
	    } elseif (is_numeric($datum)) {
	        $werktag = $datum;
	    } else {
	        $werktag = sqlzeit2timestamp($datum);
	    }//end if
	        $os = easter_date(date('Y', $werktag));
	        $tag = date('d',$os);
	        $monat = date('m',$os);
	        $jahr = date('Y',$os);
	        #Statische Feiertage
	    $arr = array(
	    #Statische Feiertage
	        mktime(0,0,0, 1, 1, $jahr) => array('Neujahr' => array('ö','d')),
	        mktime(0,0,0, 1, 6, $jahr) => array('Heilige 3 Könige' => array('ö'),
	                                            'Erscheinungsfest' => array('d-bawü', 'd-saan', 'd-bay')),
	        mktime(0,0,0, 5, 1, $jahr) => array('Staatsfeiertag' => array('ö'),
	                                            'Tag der Arbeit' => array('d')),
	        mktime(0,0,0, 8,15, $jahr) => array('Maria Himmelfahrt' => array('ö', 'd-saar', 'd-bay')),
	        mktime(0,0,0,10, 3, $jahr) => array('Tag der dt. Einheit' => array('d')),
	        mktime(0,0,0,10,26, $jahr) => array('Nationalfeiertag' => array('ö')),
	        mktime(0,0,0,10,31, $jahr) => array('Reformationstag' => array('d-bran', 'd-mepo', 'd-sax', 'd-saan', 'd-thür')),
	        mktime(0,0,0,11, 1, $jahr) => array('Allerheiligen' => array('ö', 'd-bawü', 'd-nrw', 'd-rhpf', 'd-saar', 'd-bay')),
	        mktime(0,0,0,11,20, $jahr) => array('Buß und Bettag' => array('d-sax')),
	        mktime(0,0,0,12, 8, $jahr) => array('Maria Empfängnis' => array('ö')),
	        mktime(0,0,0,12,25, $jahr) => array('Christtag' => array('ö'),
	                                            '1. Weihnachtstag' => array('d')),
	        mktime(0,0,0,12,26, $jahr) => array('Stephanitag' => array('ö'),
	                                            '2. Weihnachtstag'  => array('d')),
	    #Feiertage basierend auf Ostersonntag
	        mktime(0,0,0,$monat,$tag-46,$jahr) => array('Aschermittwoch'=> array('ö')),
	        mktime(0,0,0,$monat,$tag- 2,$jahr) => array('Karfreitag' => array('ö', 'd')),
	        mktime(0,0,0,$monat,$tag,   $jahr) => array('Ostersonntag' => array('ö', 'd')),
	        mktime(0,0,0,$monat,$tag+ 1,$jahr) => array('Ostermontag' => array('ö', 'd')),
	        mktime(0,0,0,$monat,$tag+39,$jahr) => array('Christi Himmelfahrt' => array('ö', 'd')),
	        mktime(0,0,0,$monat,$tag+49,$jahr) => array('Pfingstsonntag' => array('ö', 'd')),
	        mktime(0,0,0,$monat,$tag+50,$jahr) => array('Pfingstmontag'=> array('ö', 'd')),
	        mktime(0,0,0,$monat,$tag+60,$jahr) => array('Fronleichnam' => array('ö, d-bawü, d-bay, d-nrw, d-rhpf, d-saar, d-sax, d-thür'))
	    );
	    if ($feiertag = @$arr[$werktag]) {
	        foreach ($feiertag as $fname=>$wo) {
	            if (in_array($land, $wo) || in_array($land.'-'.$region,    $wo)) {
	                return (true); // return $fname;
	            }
	        }
	    return (false);
	    }
	}//end function  

	/** 
	*  returns tomorrows date
	*
	*  @returns date
	*/
	public function getTomorrow()
	{
	   return (date("Y-m-d", strtotime("tomorrow")));
	}
  	/** 
	*  returns date today
	*
	*  @returns date
	*/
	public function getToday()
	{
	   return (date("Y-m-d"));
	}
  	/** 
	*  returns date after tomorrow
	*
	*  @returns date
	*/
	public function getDayafter()
	{
	   return (date("Y-m-d", strtotime("+ 2 day")));
	}

	/** 
	*  The FORM on out\blocks\page\checkout\payment.tpl calls this function and sets a new Delivery Date
	*
	*  Delivery Date will be stored in user session
	*/
	public function setDeliveryDate()
	{
   		oxSession::setVariable( 'sDeliveryDate', $this->getConfig()->getRequestParameter( 'sDeliveryDate' ) ); 
	} 

	/** 
	*  the delivery date from the session will be retrieved and returned to out\blocks\page\checkout\payment.tpl
	*  
	*  if delivery Date is not yet in session, it will be stored in session
	*  DEFAULT Delivery DATE is today. If NOW is after DEADLINE, DEFAULT is TOMORROW.
	*
	*  @returns date
	*/
	public function getDeliveryDate()
	{
		$tag = "";
        	$deliveryDate = oxSession::getVariable( 'sDeliveryDate') ;
		if( $deliveryDate === null ) {
		    if ( $this->isBeforeDeadline() ) {
				$deliveryDate = $this->getTomorrow();
			} else {
				$deliveryDate = $this->getDayafter();
			}
		    $tag = $deliveryDate;
		    while ( !$this->isDateWorkDay($tag) || $this->feiertag($tag, 'ö','')) {
			$deliveryDate = strtotime("+1 day", strtotime($tag));
			$tag = strtotime("Y-m-d", strtotime($tag));
		    } 
			oxSession::setVariable( 'sDeliveryDate',$deliveryDate); 
	        }
		return $deliveryDate; 
	    }

	/** 
	*  the delivery date from the session will be retrieved and returned to out\blocks\page\checkout\payment.tpl
	*  
	*  if delivery Date is not yet in session, it will be stored in session
	*  DEFAULT Delivery DATE is today. If NOW is after DEADLINE, DEFAULT is TOMORROW.
	*
	*  @returns date array
	*/
	public function getDeliveryDateArray()
	{
            $dataA = array();
	    $y = 0;
	    $tag = "";
	   $myconfig = oxRegistry::get("oxConfig");
	   $tage = $myconfig->getConfigParam("Tage");
	    if ( !$this->isBeforeDeadline()) {
		$y++;
	    }		
		for($i=1; $i < $tage; $i++) {   // 11
   		     $y++;
		     $tag = date("Y-m-d", strtotime("+ ".$y." day"));
		     if ( $this->isDateWorkDay($tag) & !$this->feiertag($tag, 'ö','')){
			   $dataA[] = date("Y-m-d", strtotime($tag));
		     }		
		}

	    return $dataA; 
	}

	
} 
