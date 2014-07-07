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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'addLogo';
$GLOBALS['TL_DCA']['tl_module']['palettes']['click2call_form'] = '{title_legend},name,headline,type;{foreignKey_legend},foreignKey;{teaser_legend},teaser,addLogo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['addLogo'] = 'singleSRC,logoAlt,logoTitle,logoSize,logoMargin,logoUrl,fullsize,logoCaption,logoFloating';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['foreignKey'] = array
(
	'label'                   	=> &$GLOBALS['TL_LANG']['tl_module']['foreignKey'],
	'exclude'                 	=> true,
	'search'                  	=> true,
	'inputType'               	=> 'select',
	'foreignKey'				=> 'tl_click2call.CONCAT(provider, \' [\', user, \'] (\', id, \')\')',
	'eval'                    	=> array('mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'clr'),
);
$GLOBALS['TL_DCA']['tl_module']['fields']['teaser'] = array
(
	'label'                   	=> &$GLOBALS['TL_LANG']['tl_module']['teaser'],
	'exclude'                 	=> true,
	'search'                  	=> true,
	'inputType'               	=> 'textarea',
	'eval'                    	=> array('mandatory'=>false, 'tl_class'=>'clr','style'=>'height:100px'),
);

$GLOBALS['TL_DCA']['tl_module']['fields']['addLogo'] = array
(
	'label'                   	=> &$GLOBALS['TL_LANG']['tl_content']['addImage'],
	'exclude'                 	=> true,
	'inputType'               	=> 'checkbox',
	'eval'                    	=> array('submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['logoAlt'] = array
(
	'label'                   	=> &$GLOBALS['TL_LANG']['tl_content']['alt'],
	'exclude'                 	=> true,
	'search'                  	=> true,
	'inputType'               	=> 'text',
	'eval'                    	=> array('maxlength'=>255, 'tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['logoTitle'] = array
(

	'label'            			=> &$GLOBALS['TL_LANG']['tl_content']['title'],
	'exclude'           		=> true,
	'search'            		=> true,
	'inputType'         		=> 'text',
	'eval'              		=> array('maxlength'=>255, 'tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['logoSize'] = array
(
	'label'                   	=> &$GLOBALS['TL_LANG']['tl_content']['size'],
	'exclude'                 	=> true,
	'inputType'               	=> 'imageSize',
	'options'                 	=> $GLOBALS['TL_CROP'],
	'reference'               	=> &$GLOBALS['TL_LANG']['MSC'],
	'eval'      				=> array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50') 
);

$GLOBALS['TL_DCA']['tl_module']['fields']['logoMargin'] = array
(
	'label'                   	=> &$GLOBALS['TL_LANG']['tl_content']['margin'],
	'exclude'                 	=> true,
	'inputType'               	=> 'trbl',
	'options'                 	=> array('px', '%', 'em', 'pt', 'pc', 'in', 'cm', 'mm'),
	'eval'                    	=> array('includeBlankOption'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['logoUrl'] = array
(		

			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['imageUrl'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
			'wizard' => array
			(
				array('click2call_module', 'pagePicker')
			)

);
$GLOBALS['TL_DCA']['tl_module']['fields']['logoCaption'] = array
(
	'label'                   	=> &$GLOBALS['TL_LANG']['tl_content']['caption'],
	'exclude'                 	=> true,
	'search'                  	=> true,
	'inputType'               	=> 'text',
	'eval'                    	=> array('maxlength'=>255, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['logoFloating'] = array
(
	'label'                   	=> &$GLOBALS['TL_LANG']['tl_content']['floating'],
	'exclude'                 	=> true,
	'inputType'               	=> 'radioTable',
	'options'                 	=> array('above', 'left', 'right', 'below'),
	'eval'                    	=> array('cols'=>4),
	'reference'               	=> &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    	=> array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fullsize']['eval']['tl_class'] .= ' m12';

class click2call_module extends tl_module
{
	/**
	 * Return the link picker wizard
	 * @param object
	 * @return string
	 */
	public function pagePicker(DataContainer $dc)
	{
		$strField = 'ctrl_' . $dc->field . (($this->Input->get('act') == 'editAll') ? '_' . $dc->id : '');
		return ' ' . $this->generateImage('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top; cursor:pointer;" onclick="Backend.pickPage(\'' . $strField . '\')"');
	}
}

?>