# DeliveryDate-new
This is an example module and can be used a template. It will save the deliverydate during the checkout Process in the database based on wiedeking DeliveryDate
Delivery Date

Dieses Modul zeigt ein paar OXID Features und kann als Beispiel / Vorlage verwendet werden.
Du kannst dieses Modul frei kopieren und modifizieren.
Getestet mit Oxid 4.10.8

Was ich alles in diesem Modul mache:

    Daten per Formular abfragen und bei der HTTP-User-Session hinterlegen.
    Diese Daten aus der Session herausholen und anzeigen
    Diese Daten werden in der Datenbank Tabelle oxorder im neuen Feld BWdeldate gespeichert
    Die Datenbank wird erweitert
    Die Controllers des Checkout Processes: Schritt 3 (Payment) und Schritt 4 (Order) und Schritt 5 werden erweitert
    Das Model der order (oxorder) wird erweitert

Anforderungen und Beschreibung:

    Hinterlegen eines Wunsch-Lieferdatums bei der Bestellung laut Listauswahl und Regeln.
    Das Wunschlieferdatum ist entweder heute, wenn die Bestellung vor DEADLINE (z.B. 12 Uhr mittags) erfolgt, oder morgen, wenn Datum ein Werktag ist
    Die Deadline soll über die Oxid-AdminGui einstellbar sein. Wenn Deadline 0 -> immer erst am nächsten Tag beginnend
    Einstellungen Backend:
    - Deadline in vollen Stunden (Standard 12) 0 - immer erst ab nächsten Tag
    - Samstag Werktag J/N (Standard N)
    - Anzahl der Durchläufe für Werktage in der Zukunft (Standard 11)

Dies ist z.B. sinnvoll bei Lebensmittel-Händlern, welche die Ware immer vorrätig habe und zu einem bestimmten Termin ausliefern sollen.
Umsetzung:

    Der Kunde gibt beim Schritt 3 des Bestellprozesses das gewuenschte Lieferdatum an. Restriktionen, wie in Anforderung 2 gefordert, sind umgesetzt.
    Bei Schritt 4 wird dem Kunden das Lieferdatum in der Übersicht noch einmal angezeigt.
    In Schritt 5 (Thank You) wird das Lieferdatum bestätigt.
    In der Bestätigungsemail wird das Lieferdatum ebenfalls gezeigt.

TODO:

Es gibt noch folgende Dinge, welche noch umgesetzt werden müssen. Vielleicht möchte ja jemand aus der Community dies beisteuern.

    In der OXID Admin Gui muss das Lieferdatum innerhalb der Bestellung angezeigt werden. Wo es am Besten hinpasst oder ob man eine eigene Seite macht, weiß ich noch nicht.
    Die Bestell-Historie muss natürlich auch angepasst werden.

NOTICE OF LICENSE

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; version 3 of the License
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program. If not, see http://www.gnu.org/licenses/
    @copyright Copyright (c) 2013 Peter Wiedeking
    @author Peter Wiedeking
    @license http://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3 (GPL-3.0)

Installation

    Copy "copy_this" to OXID Directory

    Execute the install.sql in the OXID ADMIN GUI (Service=>Tools) and create Views Again

    Activate the module in the OXID Admin GUI (Erweiterungen=>Module=>DeliveryDate => activate!)

    Delete the TMP Directory
