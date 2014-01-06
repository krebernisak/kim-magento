<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsFlatshop_Helper_Retina extends Mage_Core_Helper_Abstract
{
 
	public function getRetinaData ($data, $_item=0, $_itemparameter=0) {

    	$helpImg = MAGE::helper('ThemeOptionsFlatshop/images');

 		if (Mage::getStoreConfig('meigee_flatshop_general/appearance/retina')) {
			switch ($data) {
				case 'list':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'small_image', 600, null) . '"';
				break;
				case 'grid_large':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'small_image', 800, null) . '"';
				break;
				case 'grid':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'small_image', 1100, null) . '"';
				break;
				case 'grid_small':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'small_image', 800, null) . '"';
				break;
				case 'related':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'thumbnail', 480, null) . '"';
				break;
				case 'upsell':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'thumbnail', 840, null) . '"';
				break;
				case 'crosssell':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'thumbnail', 380, null) . '"';
				break;
				case 'crosssell_big':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'thumbnail', 780, null) . '"';
				break;
				case 'cart_item_default':
					$html = 'data-srcX2="' . $_item->getProductThumbnail()->resize(560, null) . '"';
				break;
				case 'currency_header':
					$html = 'data-srcX2="' . Mage::getDesign()->getSkinUrl('images/@x2/'.$_item.'@x2.png') . '"';
				break;
				case 'widget_grid':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'small_image', 580, null) . '"';
				break;
				case 'widget_list':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'small_image', 580, null) . '"';
				break;
				case 'widget_slider':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'small_image', 550, null) . '"';
				break;
				case 'logo':
					$html = 'data-srcX2="' . Mage::getDesign()->getSkinUrl('images/@x2/logo@x2.png') . '"';
				break;
				case 'logo_custom':
    				$customlogo = MAGE::helper('ThemeOptionsFlatshop')->getThemeOptionsFlatshop('customlogo');
					$mediaurl = MAGE::helper('ThemeOptionsFlatshop')->getThemeOptionsFlatshop('mediaurl');
					$html = 'data-srcX2="' . $mediaurl.$customlogo['logo_retina'] . '"';
				break;
				case 'languages':
					$html = 'data-srcX2="' . Mage::getDesign()->getSkinUrl('images/@x2/'.$_item->getName().'@x2.png') . '"';
				break;
				case 'review_customer_view':
					$html = 'data-srcX2="' . $helpImg->getImg($_item->getProductData(), 'small_image', 250, null) . '"';
				break;
				case 'wishlist_item_image':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'small_image', 420, null) . '"';
				break;
				case 'wishlist_sidebar_item':
					$html = 'data-srcX2="' . $helpImg->getImg($_item, 'thumbnail', 200, null) . '"';
				break;
				case 'more_views':
					$html = 'data-srcX2="' . $helpImg->getImg($_item->getProduct(), 'thumbnail', 400, null) . '"';
				break;
				case 'checkout_cart_sidebar':
					$html = 'data-srcX2="' . $_item->getProductThumbnail()->constrainOnly(TRUE)->keepAspectRatio(TRUE)->keepFrame(FALSE)->resize(144, null)->setWatermarkSize('60x20') . '"';
				break;
				default:
					# code...
					break;
			}
			return $html;
		}
		else return false;
	}

}