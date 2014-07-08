<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
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
 * @copyright  Dennis Sagasser 2013 
 * @author     Dennis Sagasser <sagasser@gispack.com> 
 * @package    CallbackService 
 * @license    GNU/LGPL 
 * @filesource
 */


/**
 * Table tl_click2call 
 */
$GLOBALS['TL_DCA']['tl_click2call'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'             	=> 'Table',
		'enableVersioning'				=> true
	),
    // List 
    'list' => array 
    ( 
        'sorting' => array 
        ( 
            'mode'						=> 1, 
            'fields'                    => array('provider','host','user'), 
            'flag'                      => 1, 
            'panelLayout'               => 'sort,filter;search,limit'
        ), 
        'label' => array 
        ( 
            'fields'                    => array('user','host',''), 
            'format'                    => '%s [%s]' 
        ), 
        'global_operations' => array 
        ( 
            'all' => array 
            ( 
                'label'                 => &$GLOBALS['TL_LANG']['MSC']['all'], 
                'href'                  => 'act=select', 
                'class'                 => 'header_edit_all', 
                'attributes'            => 'onclick="Backend.getScrollOffset();"' 
            ) 
        ), 
        'operations' => array 
        ( 
            'edit' => array 
            ( 
                'label'                 => &$GLOBALS['TL_LANG']['tl_click2call']['edit'], 
                'href'                  => 'act=edit', 
                'icon'                  => 'edit.gif' 
            ), 
            'copy' => array 
            ( 
                'label'                 => &$GLOBALS['TL_LANG']['tl_click2call']['copy'], 
                'href'                  => 'act=copy', 
                'icon'                  => 'copy.gif' 
            ), 
            'delete' => array 
            ( 
                'label'                 => &$GLOBALS['TL_LANG']['tl_click2call']['delete'], 
                'href'                  => 'act=delete', 
                'icon'                  => 'delete.gif', 
                'attributes'            => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"' 
            ), 
            'show' => array 
            ( 
                'label'                 => &$GLOBALS['TL_LANG']['tl_click2call']['show'], 
                'href'                  => 'act=show', 
                'icon'                  => 'show.gif' 
            ) 
        ) 
    ), 
	// Palettes
	'palettes' => array
	(
		'__selector__'					=> array('show_office_hours'),
		'default'                   	=> '{account_data},provider,host,user,password,channel,context;{advanced_options:hide},port,wait_time,priority,max_retry;{office_hours},show_office_hours',
	),

	// Subpalettes
	'subpalettes' => array
	(
		'show_office_hours'				=> 'mon_start,mon_stop,tue_start,tue_stop,wed_start,wed_stop,thu_start,thu_stop,fri_start,fri_stop,sat_start,sat_stop,sun_start,sun_stop'
	),

	// Fields
	'fields' => array
	(
		'provider' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['provider'],
			'inputType'             	=> 'text',
			'search'					=> true,
			'sorting'					=> true,
			'filter'					=> true,
			'eval'                  	=> array('mandatory'=>true, 'rgxp'=>extnd, 'maxlength'=>64)
		),
		'host' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['host'],
			'inputType'             	=> 'text',
			'search'					=> true,
			'sorting'					=> true,
			'filter'					=> true,
			'eval'                 	 	=> array('mandatory'=>true, 'rgxp'=>extnd, 'maxlength'=>128)
		),
		'user' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['user'],
			'inputType'             	=> 'text',
			'search'					=> true,
			'sorting'					=> true,
			'filter'					=> true,
			'eval'                  	=> array('mandatory'=>true, 'rgxp'=>alnum, 'maxlength'=>64, 'tl_class'=>'w50')
		),
		'password' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['password'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>true, 'maxlength'=>32, 'tl_class'=>'clr')
		),
		'channel' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['channel'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50')
		),
		'context' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['context'],
			'inputType'            	 	=> 'text',
			'eval'                  	=> array('mandatory'=>true, 'rgxp'=>extnd, 'maxlength'=>32, 'tl_class'=>'w50')
		),
		'port' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['port'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>digit, 'maxlength'=>5, 'tl_class'=>'w50')
		),
		'wait_time' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['wait_time'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>digit, 'maxlength'=>2, 'tl_class'=>'w50')
		),
		'priority' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['priority'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>digit, 'maxlength'=>2, 'tl_class'=>'w50')
		),
		'max_retry' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['max_retry'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>digit, 'maxlength'=>2, 'tl_class'=>'w50')
		),		
		'show_office_hours' => array
		(
			'label'                   	=> &$GLOBALS['TL_LANG']['tl_click2call']['show_office_hours'],
			'exclude'                 	=> false,
			'inputType'               	=> 'checkbox',
			'eval'              		=> array('mandatory'=>false, 'isBoolean' => true, 'submitOnChange'=>true)
		),
		'mon_start' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['mon_start'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'mon_stop' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['mon_stop'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'tue_start' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['tue_start'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'tue_stop' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['tue_stop'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'wed_start' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['wed_start'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'wed_stop' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['wed_stop'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'thu_start' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['thu_start'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'thu_stop' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['thu_stop'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'fri_start' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['fri_start'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'fri_stop' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['fri_stop'],
			'inputType'            	 	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'sat_start' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['sat_start'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'sat_stop' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['sat_stop'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'sun_start' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['sun_start'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'sun_stop' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_click2call']['sun_stop'],
			'inputType'             	=> 'text',
			'eval'                  	=> array('mandatory'=>false, 'rgxp'=>time, 'maxlength'=>255, 'tl_class'=>'w50')
		)
	)
);

?>