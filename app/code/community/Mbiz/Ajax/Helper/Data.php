<?php
/**
 * This file is part of Mbiz_Ajax for Magento.
 *
 * @license proprietary
 * @author Jacques Bodin-Hullin <j.bodinhullin@monsieurbiz.com> <@jacquesbh>
 * @category Mbiz
 * @package Mbiz_Ajax
 * @copyright Copyright (c) 2016 Monsieur Biz (https://monsieurbiz.com/)
 */

/**
 * Data Helper
 * @package Mbiz_Ajax
 */
class Mbiz_Ajax_Helper_Data extends Mage_Core_Helper_Abstract
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Add a data in the response
     * @param string|array $data Data's key or array of data
     * @param mixed $value
     * @return $this
     */
    public function addResponseParameter($data, $value = null)
    {
        if (!is_array($data)) {
            $data = [$data => $value];
        }
        Mage::getSingleton('mbiz_ajax/response')->addData($data);
        return $this;
    }

// Monsieur Biz Tag NEW_METHOD

}
