Delivery Date
============
Dieses Modul zeigt ein paar OXID Features und kann als Beispiel / Vorlage verwendet werden.  
Du kannst dieses Modul frei kopieren und modifizieren. 


Was ich alles in diesem Modul mache: 

1.    Daten per Formular abfragen und bei der HTTP-User-Session hinterlegen. 
2.    Diese Daten aus der Session herausholen und anzeigen
3.    Diese Daten werden in der Datenbank Tabelle oxorder im neuen Feld oxdeldate gespeichert
4.    Die Datenbank wird erweitert
5.    Die Controllers des Checkout Processes: Schritt 3 (Payment) und Schritt 4 (Order) werden erweitert 
6.    Das Model der order (oxorder) wird erweitert


Anforderungen und Beschreibung: 
============
1.    Hinterlegen eines Wunsch-Lieferdatums bei der Bestellung. 
2.    Das Wunschlieferdatum ist entweder heute, wenn die Bestellung vor DEADLINE (z.B. 12 Uhr mittags) erfolgt, oder morgen, wenn heute nicht Freitag ist. (Auslieferung nur Mo-Fr.)
3.    Die Deadline soll über die Oxid-AdminGui einstellbar sein. 

Dies ist z.B. sinnvoll bei Lebensmittel-Händlern, welche die Ware immer vorrätig habe und zu einem bestimmten Termin ausliefern sollen. 

Umsetzung: 
============
* Der Kunde gibt beim Schritt 3 des Bestellprozesses das gewuenschte Lieferdatum an. Restriktionen,  wie in Anforderung 2 gefordert, sind umgesetzt.  
* Bei Schritt 4 wird dem Kunden das Lieferdatum in der Übersicht noch einmal angezeigt. 
* In Schritt 5 (Thank You) wird das Lieferdatum bestätigt. 
* In der Bestätigungsemail wird das Lieferdatum ebenfalls gezeigt. 


TODO: 
============
Es gibt noch folgende Dinge, welche noch umgesetzt werden müssen. 
Vielleicht möchte ja jemand aus der Community dies beisteuern. 

1.    In der OXID Admin Gui muss das Lieferdatum innerhalb der Bestellung angezeigt werden. Wo es am Besten hinpasst oder ob man eine eigene Seite macht, weiß ich noch nicht. 
2.    Die Bestell-Historie muss natürlich auch angepasst werden. 
3.    Wenn kein Bestelldatum ausgewählt werden kann, (Freitags nach der Deadline 12.Uhr), dann muss der Bestellprozess abgebrochen werden. 
 
 
NOTICE OF LICENSE
============
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

 
Installation
============
1.    Copy "copy_this" to OXID Directory

2.    Execute the install.sql in the OXID ADMIN GUI (Service=>Tools)

3.    Activate the module in the OXID Admin GUI (Erweiterungen=>Module=>DeliveryDate => activate!)

4.    Delete the TMP Directory

