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
$GLOBALS['TL_LANG']['tl_click2call']['provider']          = array('Provider', 'Please enter a provider.'); 
$GLOBALS['TL_LANG']['tl_click2call']['host']              = array('Registrar', 'Please enter your provider\'s host or ip address. If your are hosting this page on your asterisk PBX then fill in "127.0.0.1" as host IP. Otherwise change the following line in "manager.conf" below admin user section:<br />"permit=127.0.0.1/255.255.255.0" to <br />"permit=127.0.0.1/255.255.255.0,xxx.xxx.xxx.xxx;(xxx.xxx.xxx.xxx is the ip address of the server this page is running on.)"');
$GLOBALS['TL_LANG']['tl_click2call']['user']              = array('Username', 'Please enter a username.'); 
$GLOBALS['TL_LANG']['tl_click2call']['password']          = array('Password', 'Please enter a password.');
$GLOBALS['TL_LANG']['tl_click2call']['channel']           = array('Channel', 'Please enter the channel (extension) you want to receive the call requests with e.g. SIP/XXX, IAX2/XXXX, ZAP/XXXX, local/1NXXNXXXXXX@from-internal etc.');
$GLOBALS['TL_LANG']['tl_click2call']['context']           = array('Context', 'Please enter the context to make the outgoing call from. By default Asterisk uses "from-internal".');
$GLOBALS['TL_LANG']['tl_click2call']['port']              = array('Port', 'Please enter the connection port.');
$GLOBALS['TL_LANG']['tl_click2call']['wait_time']         = array('Waiting time', 'Please enter the amount of time you want to try calling the specified channel before hanging up.'); 
$GLOBALS['TL_LANG']['tl_click2call']['priority']          = array('Priority', 'Please enter the priority you wish to place on making this call.'); 
$GLOBALS['TL_LANG']['tl_click2call']['max_retry']         = array('Retries', 'Please enter  the maximum amount of retries.'); 
$GLOBALS['TL_LANG']['tl_click2call']['show_office_hours'] = array('Restrict availability', 'You can specifiy times to activate the callback service.');
$GLOBALS['TL_LANG']['tl_click2call']['mon_start']         = array('on Mondays from', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['mon_stop']          = array('on Mondays to', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['tue_start']         = array('on Tuesdays from', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['tue_stop']          = array('on Tuesdays to', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['wed_start']         = array('on Wednesdays from', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['wed_stop']          = array('on Wednesdays to', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['thu_start']         = array('on Thursdays from', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['thu_stop']          = array('on Thursdays to', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['fri_start']         = array('on Fridays from', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['fri_stop']          = array('on Fridays to', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['sat_start']         = array('on Saturdays from', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['sat_stop']          = array('on Saturdays to', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['sun_start']         = array('on Sundays from', ''); 
$GLOBALS['TL_LANG']['tl_click2call']['sun_stop']          = array('on Sundays to', ''); 

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_click2call']['account_data']     = 'Account data';
$GLOBALS['TL_LANG']['tl_click2call']['advanced_options'] = 'Advanced options';
$GLOBALS['TL_LANG']['tl_click2call']['office_hours']     = 'Office hours';

/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_click2call'][''] = '';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_click2call']['new']    = array('Add a new Provider', 'Add a new Provider');
$GLOBALS['TL_LANG']['tl_click2call']['edit']   = array('Edit', 'Edit Provider');
$GLOBALS['TL_LANG']['tl_click2call']['copy']   = array('Copy', 'Copy Provider');
$GLOBALS['TL_LANG']['tl_click2call']['delete'] = array('Delete', 'Delete Provider');
$GLOBALS['TL_LANG']['tl_click2call']['show']   = array('Show', 'Show Provider');

?>