<?php

class Halox_AgeVerification_Model_Mysql4_Ageverificationdetails extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the ageverification_id refers to the key field in your database table.
        $this->_init('ageverification/ageverificationdetails', 'customer_ageverification_details_id');
    }
}