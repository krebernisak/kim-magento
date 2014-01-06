<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsFlatshop_ActivationController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
     $this->loadLayout(array('default'));

         $this->_addLeft($this->getLayout()
                ->createBlock('core/text')
                ->setText('
                    <h5>Predefined pages:</h5>
                    <ul>
                        <li>home</li>
                    </ul><br />
                    <h5>Predefined static blocks:</h5>
                    <ul>
                        <li>flatshop_cart_banner</li>
						<li>flatshop_custom_footer</li>
						<li>flatshop_footer_banner</li>
						<li>flatshop_header_blocks</li>
						<li>flatshop_slider_slide_1</li>
						<li>flatshop_slider_slide_2</li>
						<li>flatshop_slider_slide_3</li>
						<li>flatshop_social_links</li>
                    </ul><br />
                    <strong style="color:red;">To get more info regarding these blocks please read documentation that comes with this theme.</strong>'));
		$this->_addContent($this->getLayout()->createBlock('themeoptionsflatshop/adminhtml_activation_edit'));
        $block = $this->getLayout()->createBlock('core/text')->setText('<strong style="color:red;">Activation feature is provided only for testing. Please do not use it on real stores! Make backup of your database every time when you use activation. </strong><br /><strong>Note:</strong> Please make sure you have at least 8 products marked as new to display homepage widgets correctly.');
        $this->getLayout()->getBlock('content')->append($block);
		$this->renderLayout();
    }
        
    public function saveAction() {
        if ($data = $this->getRequest()->getPost()) {
        	
        $stores = $this->getRequest()->getParam('stores', array(0));
        $setup_pages = $this->getRequest()->getParam('setup_pages', 0);
        $setup_blocks = $this->getRequest()->getParam('setup_blocks', 0);

        try {

            foreach ($stores as $store) {
                $scope = ($store ? 'stores' : 'default');

                Mage::getConfig()->saveConfig('design/package/name', 'flatshop', $scope, $store);
                Mage::getConfig()->saveConfig('design/header/logo_src', 'images/logo.png', $scope, $store);
                Mage::getConfig()->saveConfig('design/footer/copyright', 'Meigee &copy; 2013 <a href="http://meigeeteam.com" >Premium Magento Themes</a>', $scope, $store);
				/*Mage::getConfig()->saveConfig('meigee_flatshop_headerslider/coin/slides', 'flatshop', $scope, $store);*/
            }

            if ($setup_pages) {
                Mage::getModel('ThemeOptionsFlatshop/activation')->setupPages();
            }

            if ($setup_blocks) {
                Mage::getModel('ThemeOptionsFlatshop/activation')->setupBlocks();
            }

            Mage::getSingleton('adminhtml/session')->addSuccess(
                Mage::helper('ThemeOptionsFlatshop')->__('Flatshop theme has been activated.<br/>
                    Please clear all the cache and then logout and login again to see the theme options block
                '));
        }
        catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('ThemeOptionsFlatshop')->__('An error occurred while activating theme. '.$e->getMessage()));
        }

        $this->getResponse()->setRedirect($this->getUrl("*/*/"));
        }
    }
}