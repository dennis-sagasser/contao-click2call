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
 * Class ModuleClick2Call 
 *
 * @copyright  Dennis Sagasser 2013 
 * @author     Dennis Sagasser <sagasser@gispack.com> 
 * @package    Controller
 */
class ModuleClick2Call extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_click2call_form';


	/**
	 * Redirect to the selected page
	 * @return string
	 */
	public function generate()
	{
		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->loadLanguageFile('tl_click2call');
		
		$this->Template->teaser = $this->teaser;
		
		// Add image
		if ($this->addLogo && strlen($this->singleSRC) && is_file(TL_ROOT . '/' . $this->singleSRC))
		{
			$arrItem = array(
				'singleSRC'		=> $this->singleSRC,
				'alt'		    => $this->logoAlt,
				'title'		    => $this->logoTitle,
				'imagemargin'   => $this->logoMargin,
				'floating'		=> $this->logoFloating,
				'caption'		=> $this->logoCaption,
				'imageUrl'		=> $this->logoUrl,
				'size'			=> $this->logoSize,
				'fullsize'		=> $this->fullsize
			);
			
			$this->addImageToTemplate($this->Template, $arrItem);
		}
		// Initialize form fields
		$objWidgetName = new FormTextField();
		$objWidgetName->id = 'name';
		$objWidgetName->label = $GLOBALS['TL_LANG']['MSC']['strFormName'];
		$objWidgetName->name = 'name';
		$objWidgetName->mandatory = true;
		$objWidgetName->rgxp = 'alpha';
		$objWidgetName->value = $this->Input->post('name');
		
		$this->Template->objWidgetName = $objWidgetName;
		
		$objWidgetNumber = new FormTextField();
		$objWidgetNumber->id = 'number';
		$objWidgetNumber->label = $GLOBALS['TL_LANG']['MSC']['strFormNumber'];
		$objWidgetNumber->name = 'number';
		$objWidgetNumber->mandatory = true;
		$objWidgetNumber->rgxp = 'germanNumbers';
		$objWidgetNumber->value = $this->Input->post('number');
		
		$this->Template->objWidgetNumber = $objWidgetNumber;
		
		$objWidgetCaptcha = new FormCaptcha();
		
		$this->Template->objWidgetCaptcha = $objWidgetCaptcha;
		
		$objWidgetSubmit = new FormSubmit();
		$objWidgetSubmit->id = 'submit';
		$objWidgetSubmit->slabel = $GLOBALS['TL_LANG']['MSC']['strFormSubmit'];
		
		$this->Template->objWidgetSubmit = $objWidgetSubmit;
		
		// Get Click2Call configuration 
		$arrModuleParams = $this->Database->prepare("	SELECT * FROM tl_click2call WHERE id=?") ->limit(1) ->execute($this->foreignKey); 
									   
		$strHost 	= $arrModuleParams->host; 
		$strUser 	= $arrModuleParams->user; 
		$strPassword 	= $arrModuleParams->password; 
		$strChannel 	= $arrModuleParams->channel; 
		$intPort 	= $arrModuleParams->port;
		$strContext 	= $arrModuleParams->context; 
		$intWaitTime 	= $arrModuleParams->wait_time;  
                $intPriority 	= $arrModuleParams->priority;
		
		$strWeekDay = date("D", time());
		$strStart = strtolower($strWeekDay)."_start";
		$strEnd = strtolower($strWeekDay)."_stop";
		
		if ($this->Input->post('FORM_SUBMIT') == 'form_click2call_submit') 
		{
			$boolOfficeIsOpen = false;

			if ($arrModuleParams->show_office_hours == '1')
			{				
				$intStartTime = $arrModuleParams->{$strStart};
				$intEndTime = $arrModuleParams->{$strEnd};
				
				($intStartTime == NULL) ? $intStartTime = '0' : $intStartTime;
				($intEndTime == NULL || $intEndTime == 0) ? $intEndTime = '86340' : $intEndTime;

				$intNow = strtotime("now") + 3600;				
				$intStartOfTheDay = strtotime("today");
				$intDifference = $intNow - $intStartOfTheDay;
				
				if (($intDifference  > $intStartTime)  && ($intDifference < $intEndTime))
				{
					$boolOfficeIsOpen = true;
				}				
			}
			else
			{
				$boolOfficeIsOpen = true;
			}

			if ($boolOfficeIsOpen)
			{
				$objWidgetName->validate(); 
				$objWidgetNumber->validate();
				$objWidgetCaptcha->validate();
				
				if (!$objWidgetName->hasErrors() && !$objWidgetNumber->hasErrors() && !$objWidgetCaptcha->hasErrors())
				{
					// if no error occurs and office is open then initialize callback
					$callerName  = $this->Input->post('name');
	                $callNumber = $this->Input->post('number');
					
	                $callerId = "Web-".$callerName . " <".$callNumber.">";
					
					$objSocket = fsockopen($strHost, $intPort, $errnum, $errdesc);
					if ($objSocket) 
					{
		                fputs($objSocket, "Action: login\r\n");
		                fputs($objSocket, "Events: off\r\n");
		                fputs($objSocket, "Username: ".$strUser."\r\n");
		                fputs($objSocket, "Secret: ".$strPassword."\r\n\r\n");
		                fputs($objSocket, "Action: originate\r\n");
		                fputs($objSocket, "Channel: ".$strChannel."\r\n");
		                fputs($objSocket, "WaitTime: ".$intWaitTime."\r\n");
		                fputs($objSocket, "CallerId: ".$callerId."\r\n");
		                fputs($objSocket, "Exten: ".$callNumber."\r\n");
		                fputs($objSocket, "Context: ".$strContext."\r\n");
		                fputs($objSocket, "Priority: ".$intPriority."\r\n\r\n");
		                fputs($objSocket, "Action: Logoff\r\n\r\n");
		                sleep(3);
		                fclose($objSocket);
						
						$this->Template->infoClass = 'infoBox';
						$this->Template->infoMessage = $GLOBALS['TL_LANG']['MSC']['strFormSuccess'];
						$this->log('Connection established between "'.$strHost.'" and "'.$callerName . " <".$callNumber.">".'".', 'ModuleClick2Call fsockopen()', TL_GENERAL);	
					}
					else 
					{
						$this->Template->infoClass = 'errorBox';
						$this->Template->infoMessage = sprintf($GLOBALS['TL_LANG']['MSC']['strFormConnection'], $errdesc, $errnum ? '(#'.$errnum.')' : '');	
						$this->log(($errdesc && $errnum) ? $errdesc.' by '.$strHost.' (#'.$errnum.')' : 'Connection failed', 'ModuleClick2Call fsockopen()', TL_ERROR);			
					}
	               
				}	
			}
			else
			{
				$this->Template->infoClass = 'errorBox';
				$this->Template->infoMessage = $GLOBALS['TL_LANG']['MSC']['strFormOffice'];							 
			}
		}
	}
}

?>
