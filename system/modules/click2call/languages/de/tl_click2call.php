<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**                                                                                                                                                                                                                                   
 * Contao Open Source CMS                                                                                                                                                                                                             
 * Copyright (C) 2005-2014 Leo Feyer                                                                                                                                                                                                  
 *                                                                                                                                                                                                                                    
 * Formerly known as TYPOlight Open Source CMS.                                                                                                                                                                                       
 *                                                                                                                                                                                                                                    
 * This program is free software: you can redistribute it and/or                                                                                                                                                                      
 * modify it under the terms of the GNU Lesser General Public                                                                                                                                                                         
 * License as published by the Free Software Foundation, either                                                                                                                                                                       
 * version 3 of the License, or (at your option) any later version.                                                                                                                                                                   
 *                                                                                                                                                                                                                                    
 * This program is distributed in the hope that it will be useful,                                                                                                                                                                    
 * but WITHOUT ANY WARRANTY; without even the implied warranty of                                                                                                                                                                     
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU                                                                                                                                                                   
 * Lesser General Public License for more details.                                                                                                                                                                                    
 *                                                                                                                                                                                                                                    
 * You should have received a copy of the GNU Lesser General Public                                                                                                                                                                   
 * License along with this program. If not, please visit the Free                                                                                                                                                                     
 * Software Foundation website at <http://www.gnu.org/licenses/>.                                                                                                                                                                     
 *                                                                                                                                                                                                                                    
 * PHP version 5     
 *
 * @category  Contao  
 * @package   CallbackSevice                                                                                                                                                                                                                                                                                                                                                                                                               
 * @author    Dennis Sagasser <sagasser@gispack.com>
 * @copyright 2013-2014 Dennis Sagasser                                                                                                                                                                                                      
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 * @link      https://contao.org                                                                                                                                                                                                                                                                                                                                                                                                                                  
 */

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_click2call']['provider']          = array('Provider', 'Bitte geben Sie den Namen des Providers ein.'); 
$GLOBALS['TL_LANG']['tl_click2call']['host']              = array('Registrar', 'Geben Sie den Host-Namen oder die IP-Adresse ihres Providers an. Wenn Sie Contao auf ihrer eigenen Asterisk-Telefonanlage betreiben, können Sie "127.0.0.1" als Host eintragen. Anderernfalls müssen Sie in der admin-Sektion der Datei "manager.conf" die Zeile:<br />"permit=127.0.0.1/255.255.255.0" abändern zu:<br />"permit=127.0.0.1/255.255.255.0,xxx.xxx.xxx.xxx ;(xxx.xxx.xxx.xxx ist dabei die IP-Adresse des Servers auf dem Contao läuft.)"');
$GLOBALS['TL_LANG']['tl_click2call']['user']              = array('Benutzername', 'Bitte geben Sie den Benutzernamen an, mit dem Sie sich beim Provider anmelden möchten.'); 
$GLOBALS['TL_LANG']['tl_click2call']['password']          = array('Passwort', 'Bitte geben Sie ein Passwort für den Benutzer ein.');
$GLOBALS['TL_LANG']['tl_click2call']['channel']           = array('Kanal / Nebenstelle', 'Bitte geben Sie den Kanal / die Nebenstelle an, auf dem / der Sie die Rückrufanfrage entgegennehmen möchten z.B. SIP/XXX, IAX2/XXXX, ZAP/XXXX, local/1NXXNXXXXXX@from-internal usw.');
$GLOBALS['TL_LANG']['tl_click2call']['context']           = array('Kontext', 'Bitte geben Sie den Kontext an, mit dem die Telefonanlage rauswählt. Standardmäßig verwendet Asterisk "from-internal".');
$GLOBALS['TL_LANG']['tl_click2call']['port']              = array('Port', 'Bitte geben Sie den Port für den Verbindungsaufbau an.'); 
$GLOBALS['TL_LANG']['tl_click2call']['wait_time']         = array('Wartezeit', 'Bitte geben Sie in Sekunden an, wie lange versucht wird, die Rückrufanfrage durchzustellen.'); 
$GLOBALS['TL_LANG']['tl_click2call']['priority']          = array('Priorität', 'Bitte geben Sie die Priorität des Anrufs an.'); 
$GLOBALS['TL_LANG']['tl_click2call']['max_retry']         = array('Versuche', 'Bitte geben Sie die maximale Anzahl an Versuchen an, die Rückrufanfrage zu vermitteln.'); 
$GLOBALS['TL_LANG']['tl_click2call']['show_office_hours'] = array('Verfügbarkeit beschränken', 'Hier können Sie die Zeiten konfigurieren, an denen der Rückrufservice aktiv ist.');
$GLOBALS['TL_LANG']['tl_click2call']['mon_start']         = array('montags von', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['mon_stop']          = array('montags bis', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['tue_start']         = array('dienstags von', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['tue_stop']          = array('dienstags bis', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['wed_start']         = array('mittwochs von', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['wed_stop']          = array('mittwochs bis', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['thu_start']         = array('donnerstags von', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['thu_stop']          = array('donnerstags bis', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['fri_start']         = array('freitags von', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['fri_stop']          = array('freitags bis', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['sat_start']         = array('samstags von', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['sat_stop']          = array('samstags bis', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['sun_start']         = array('sonntags von', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['sun_stop']          = array('sonntags bis', ''); 

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_click2call']['account_data']     = 'Zugangsdaten';
$GLOBALS['TL_LANG']['tl_click2call']['advanced_options'] = 'Erweiterte Einstellungen';
$GLOBALS['TL_LANG']['tl_click2call']['office_hours']     = 'Bürozeiten';

/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_click2call'][''] = '';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_click2call']['new']    = array('Neuen Provider anlegen', 'Einen neuen Provider anlegen');
$GLOBALS['TL_LANG']['tl_click2call']['edit']   = array('Bearbeiten', 'Provider bearbeiten');
$GLOBALS['TL_LANG']['tl_click2call']['copy']   = array('Kopieren', 'Provider kopieren');
$GLOBALS['TL_LANG']['tl_click2call']['delete'] = array('Entfernen', 'Provider entfernen');
$GLOBALS['TL_LANG']['tl_click2call']['show']   = array('Anzeigen', 'Provider anzeigen');

?>