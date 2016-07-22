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

require_once Mage::getModuleDir('controllers', 'Mage_Catalog') . DS . 'CategoryController.php';

/**
 * Catalog_Category Controller
 * @package Mbiz_Ajax
 */
class Mbiz_Ajax_Catalog_CategoryController extends Mage_Catalog_CategoryController
{

    use Mbiz_Ajax_Trait_Controller;

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Category view
     * <p>If the call is made in ajax we return the page as a JSON.</p>
     */
    public function viewAction()
    {
        // Call the parent to generate the content
        parent::viewAction();

        if ($this->getRequest()->isAjax()) {
            $body = $this->getResponse()->getBody();
            $this->addResponseParameter('body', $body);

            // Manage page
            /* @var $pager Mage_Page_Block_Html_Pager */
            if ($pager = $this->getLayout()->getBlock('product_list_toolbar_pager')) {
                $this->addResponseParameter([
                    'current_page' => $pager->getCurrentPage(),
                    'next_page_url' => $pager->getNextPageUrl(),
                    'next_page' => $pager->getCurrentPage() + 1,
                    'is_last_page' => $pager->getLastPageNum() <= $pager->getCurrentPage()
                ]);
            }

            $this->processAjaxResponse(true);
        }

        return $this;
    }

// Monsieur Biz Tag NEW_METHOD

}
