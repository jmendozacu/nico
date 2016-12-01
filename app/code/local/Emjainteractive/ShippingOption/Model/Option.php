<?php
/**
 * EmJa Interactive, LLC.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.emjainteractive.com/LICENSE.txt
 *
 * @category   EmJaInteractive
 * @package    EmJaInteractive_ShippingOption
 * @copyright  Copyright (c) 2010 EmJa Interactive, LLC. (http://www.emjainteractive.com)
 * @license    http://www.emjainteractive.com/LICENSE.txt
 */

class Emjainteractive_ShippingOption_Model_Option extends Mage_Core_Model_Abstract 
{
	const OPTION_TYPE_SELECT   = 'select';
	const OPTION_TYPE_TEXT     = 'text';
	const OPTION_TYPE_TEXTAREA = 'textarea';
	const OPTION_TYPE_CHECKBOX = 'checkbox';
	const OPTION_TYPE_RADIO    = 'radio';
	
	const NOT_REQUIRED         = 0;
	const IS_REQUIRED          = 1;
	
    protected function _construct()
    {
        $this->_init('emjainteractive_shippingoption/option');
    }
    
    public function serializeArray($array)
    {
    	if( !is_array($array) ) {
    		return false;
    	}
    	
    	foreach ($array as $key => $item) {
    		$array[$key] = trim($item);
    	}
    	
    	return join(',', $array);
    }
    
    public function unserializeArray()
    {
    	return explode(',', $this->getOptions());
    }
}