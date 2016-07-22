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
 * Controller trait
 * @package Mbiz_Ajax
 *
 * @method Mage_Core_Controller_Response_Http getResponse()
 */
trait Mbiz_Ajax_Trait_Controller
{

    /**
     * Add a data in the response
     * @param string|array $data Data's key or array of data
     * @param mixed $value
     * @return $this
     */
    public function addResponseParameter($data, $value = null)
    {
        Mage::helper('mbiz_ajax')->addResponseParameter($data, $value);
        return $this;
    }

    /**
     * Process the ajax response
     * @var bool $sendResponse
     * @return $this
     */
    public function processAjaxResponse($sendResponse = true)
    {
        $json = json_encode(Mage::getSingleton('mbiz_ajax/response')->getData());
        $this->getResponse()
            ->setHeader('Content-Type', 'application/json')
            ->setBody($json)
        ;

        if ($sendResponse) {
            $this->getResponse()->sendResponse();
            $this->getResponse()->sendHeadersAndExit();
            exit;
        }

        return $this;
    }

}
