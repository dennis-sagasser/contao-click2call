<?php

class HookGermanNumbers extends Backend
{
     /**
     * German phone number validation with Hook 'addCustomRegexp'
     */
    public function addCustomRegexp($strRegexp, $varValue, Widget $objWidget)
    {
        if ($strRegexp == 'germanNumbers')
        {
			$expression = '0[1-9]{1}[0-9]{4,}';    
			$regEx = '^'.$expression.'$';  
            if (!preg_match("/$regEx/", $varValue))
            {
                $objWidget->addError($objWidget->label . $GLOBALS['TL_LANG']['MSC']['strFormPhone']);
            }
			

            return true;
        }

        return false;
    }
}  

?>
