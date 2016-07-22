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
 * Observer Model
 * @package Mbiz_Ajax
 */
class Mbiz_Ajax_Model_Observer extends Mage_Core_Model_Abstract
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * short_description_here
     * @return
     */
    public function addAjaxHandles(Varien_Event_Observer $observer)
    {
        // If we are in ajax:
        // Get all the handles, and add one with the AJAX_ prefix
        if (Mage::app()->getRequest()->isAjax()) {
            /* @var $update Mage_Core_Model_Layout_Update */
            $update = $observer->getLayout()->getUpdate();
            $handles = $update->getHandles();
            foreach ($handles as $handle) {
                $update->addHandle('AJAX_' . $handle);
            }
        }
    }

// Monsieur Biz Tag NEW_METHOD

}
