<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsFlatshop_Model_Cssgenerate extends Mage_Core_Model_Config_Data
{
    private $baseColors;
    private $sidebarParams;
    private $headerColors;
	private $footerColors;
	private $socialIcons;
	private $listing;
	private $productLabels;
	private $prices;
    private $dirPath;
    private $filePath;

    private function setParams () {
        $this->baseColors = Mage::getStoreConfig('meigee_flatshop_design/base');
		$this->headerColors = Mage::getStoreConfig('meigee_flatshop_design/header');
		$this->footerColors = Mage::getStoreConfig('meigee_flatshop_design/footer');
		$this->socialIcons = Mage::getStoreConfig('meigee_flatshop_design/social_icons');
		$this->listing = Mage::getStoreConfig('meigee_flatshop_design/listing');
		$this->productLabels = Mage::getStoreConfig('meigee_flatshop_design/product_labels');
		$this->prices = Mage::getStoreConfig('meigee_flatshop_design/prices');
    }

    private function setLocation () {
        $this->dirPath = Mage::getBaseDir('skin') . '/frontend/flatshop/default/css/';
        $this->filePath = $this->dirPath . 'skin.css';
    }

    public function _afterLoad()
    {

        parent::_afterLoad();

        $this->setParams();


$css = "/**
 * These styles is generated automaticaly. Please Do no edit it directly all changes will be lost.
 */";

$css .= '/*======Site Bg=======*/
.header-slider-holder,
.content-wrapper{background-color:#' . $this->baseColors['sitebg'] . ';}


/*======Skin Color #1=======*/
.onepagecheckout-index-index .onepagecheckout_loginarea .onepagecheckout_loginlink{color:#' . $this->baseColors['maincolor'] . ';}

.checkout-cart-index .iwd-ec-col-main .cart-empty #iwd-emptycart-writeup #buttonwrapper .iwdbutton a,
#onepagecheckout_forgotbox button.button > span,
#onepagecheckout_loginbox button.button > span,
#checkout-review-submit #review-buttons-container button.btn-checkout,
#login-holder .close-button,
aside.sidebar section.block-layered-nav #slider-range .ui-slider-handle,
 button.button.btn-quick-view:hover > span,
.block-related .prev:hover,
.block-related .next:hover,
.product-view .product-prev:hover,
.product-view .product-next:hover,
aside.sidebar section header .mobile-sidebar-button.active,
header#header .menu-button:hover,
.header-slider-container .iosSlider .slider .item h3,
.flipping-banner .banner-button:hover,
span.label-sale,
.block-wishlist .prev:hover,
.block-wishlist .next:hover,
.opc .active .step-title,
.block-account li:hover i,
.block-account li.current i,
.my-wishlist .buttons-set button.btn-add:hover > span,
.my-wishlist .buttons-set button.btn-share:hover > span,
.cart .totals.totals-accordion .checkout-types button.button:hover > span,
#cart-accordion .accordion-content .discount .buttons-set button:hover > span,
#cart-accordion .accordion-content .shipping .buttons-set button:hover > span,
.cart-table tfoot td .btn-update:hover > span,
.cart-table tfoot td .btn-clear:hover > span,
.catalog-product-view #review-form .buttons-set button > span,
.bottom-product-related .block-related .prev:hover,
.bottom-product-related .block-related .next:hover,
.bottom-product-related .block-related .block-content .block-subtitle a,
.my-wishlist div.quantity-decrease:hover,
.my-wishlist div.quantity-increase:hover,
.add-to-cart div.quantity-decrease:hover,
.add-to-cart div.quantity-increase:hover,
.cart-table div.quantity-decrease:hover,
.cart-table div.quantity-increase:hover,
.product-view .product-shop .add-to-links-box .add-to-links li:hover i,
.product-view .product-shop .add-to-links-box .email-friend:hover i,
.more-views .prev:hover,
.more-views .next:hover,
.toolbar-bottom .pager .pages ol li.current,
.toolbar-bottom .pager .pages ol li:hover a,
.products-list .email-friend a:hover i,
.products-list .add-to-links li a:hover i,
.sorter .view-mode strong.grid i,
.sorter .view-mode strong.list i,
.sorter .view-mode a.grid:hover i,
.sorter .view-mode a.list:hover i,
.block-layered-nav dl#layered_navigation_accordion dt.closed .btn-nav,
#categories-accordion li .btn-cat.closed,
.flipping-banner .color-box .item.odd,
.products-grid .color-box .elem.odd,
section .color-box .item.odd,
header#header .top-cart .block-content .color-box .item.odd,
#nav .color-box .item.odd,
#custommenu .color-box .item.odd,
header#header .top-cart .block-title,
header#header .form-search button:hover > span,
button.button > span{background-color:#' . $this->baseColors['maincolor'] . ';}


.cart .totals .checkout-types{
	background-color:rgba('.MAGE::helper('ThemeOptionsFlatshop')->HexToRGB($this->baseColors['maincolor']).', 0.9);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#E6' . $this->baseColors['maincolor'] . ',endColorstr=#E6' . $this->baseColors['maincolor'] . ');
	zoom: 1;
}

button.btn-quick-view:hover i.triangle-topleft,
span.label-sale .triangle-topleft{border-top-color: #' . $this->baseColors['maincolor'] . '!important;}
button.btn-quick-view:hover i.triangle-bottomleft,
span.label-sale .triangle-bottomleft{border-bottom-color: #' . $this->baseColors['maincolor'] . '!important;}


/*======Skin Color #2=======*/
.menu-mobile .parentMenu a i.num,
header#header .nav-container #custommenu div.menu a span i.num,
.block-account h2 i,
.block-related .product-details .price-box .price,
aside.sidebar section.block-wishlist li.item .product-details .price-box .price,
#footer .footer-columns-wrapper li a:before,
header#header .top-cart .product-box,
#nav li a span.num{color:#' . $this->baseColors['secondcolor'] . ';}

.menu-mobile.open > .parentMenu,
header#header .nav-container #custommenu div.menu.act a,
header#header .nav-container #custommenu div.menu.act.active a,
.checkout-cart-index .iwd-ec-col-main .cart-empty #iwd-emptycart-writeup #buttonwrapper .iwdbutton a:hover,
#onepagecheckout_forgotbox button.button:hover > span,
#onepagecheckout_loginbox button.button:hover > span,
#checkout-review-submit #review-buttons-container button.btn-checkout:hover,
#login-holder form .actions,
#login-holder .page-title,
aside.sidebar section.block-layered-nav #slider-range .ui-slider-range,
button.btn-quick-view > span,
aside.sidebar section header .mobile-sidebar-button,
header#header .menu-button,
#menu-button,
.header-slider-container .iosSlider .slider .item h2,
.flipping-banner .banner-button,
span.label-new,
.opc .step-title .number,
.my-wishlist .buttons-set button.btn-add > span,
.my-wishlist .buttons-set button.btn-share > span,
.my-wishlist .data-table thead,
.account-login .registered-users .buttons-set,
.account-login .new-users .buttons-set,
.cart .totals.totals-accordion .checkout-types button.button > span,
#cart-accordion .accordion-content .discount .buttons-set button > span,
#cart-accordion .accordion-content .shipping .buttons-set button > span,
.cart-table tfoot td .btn-update > span,
.cart-table tfoot td .btn-clear > span,
.cart .cart-table thead,
.bottom-product-related .block-related .block-content .block-subtitle a:hover,
.catalog-product-view #review-form .buttons-set button:hover > span,
.catalog-product-view .box-reviews .data-table thead,
.product-view .product-shop .add-to-links-box .add-to-links i,
.product-view .product-shop .add-to-links-box .email-friend i,
.products-list .email-friend a i,
.products-list .add-to-links li a i,
.sorter .view-mode a.grid i,
.sorter .view-mode a.list i,
.sorter .sort-by a,
aside.sidebar .actions,
#footer .footer-columns-wrapper li a:hover,
ul.social-links li a:hover,
header#header .links li a:hover,
.flipping-banner .color-box .item.even,
.products-grid .color-box .elem.even,
section .color-box .item.even,
header#header .top-cart .block-content .color-box .item.even,
#nav .color-box .item.even,
#custommenu .color-box .item.even,
header#header .form-search button > span,
#nav > li.active > a,
button.button:hover > span{background-color:#' . $this->baseColors['secondcolor'] . ';}


.onepagecheckout-index-index #onepagecheckout_forgotbox.op_login_area,
.onepagecheckout-index-index #onepagecheckout_loginbox.op_login_area,
#onepagecheckout_orderform .col3-set.onepagecheckout_datafields .col-1,
#onepagecheckout_orderform .col3-set.onepagecheckout_datafields .col-2,
#onepagecheckout_orderform .col3-set.onepagecheckout_datafields .col-3,
button.btn-quick-view i.triangle-topleft,
span.label-new .triangle-topleft{border-top-color: #' . $this->baseColors['secondcolor'] . '!important;}
button.btn-quick-view i.triangle-bottomleft,
span.label-new .triangle-bottomleft{border-bottom-color: #' . $this->baseColors['secondcolor'] . '!important;}';

$css .= '

/*======Header=======*/
/* Header Wrapper */
header#header{background-color:#' . $this->headerColors['header_bg'] . ';}

/* Navigation text color */
#nav li a{color:#' . $this->headerColors['nav_text'] . ';}

/* Navigation active text color */
#nav li.active a,
#nav li.active a span.num { color:#' . $this->headerColors['nav_active_text'] . '; }

/* Navigation hover bg */
#nav > li > a:hover {background-color: #' . $this->headerColors['nav_hover_bg'] . ';}

/* Navigation active bg */
#nav > li.active > a,
button.button:hover > span{background-color:#' . $this->headerColors['nav_active_bg'] . ';}

/* Navigation button border radius */
#nav li a:hover,
#nav li.over a,
#nav li.active a{
	-webkit-border-radius: ' . $this->headerColors['nav_button_border_radius'] . 'px;
    -moz-border-radius: ' . $this->headerColors['nav_button_border_radius'] . 'px;
    border-radius: ' . $this->headerColors['nav_button_border_radius'] . 'px;
}

/* Navigation divider color */
#nav li.level-top > a > span{
	border-right-color: #' . $this->headerColors['nav_divider_color'] . ';
}';

$css .= '

/* Search form bg */
header#header .form-search,
header#header .form-search .search-autocomplete ul{background-color:#' . $this->headerColors['search_form_bg'] . ';}

/* Search form input text color */
header#header .form-search input{color:#' . $this->headerColors['search_form_input_text_color'] . ';}

/* Search form button text color */
header#header .form-search button span span{color:#' . $this->headerColors['search_form_button_text_color'] . ';}

/* Search form button bg color */
header#header .form-search button > span{background-color:#' . $this->headerColors['search_form_button_bg_color'] . ';}';

$css .= '

/* Top cart button bg */
header#header .top-cart .block-title{background-color: #' . $this->headerColors['top_cart_button_bg'] . ';}

/* Top cart button text color */
header#header .top-cart .block-title .title-cart{
	color:#' . $this->headerColors['top_cart_button_text_color'] . ';
}

/* Top cart button hover bg */
header#header .top-cart .block-title.active,
header#header .top-cart .block-title:hover{background-color: #' . $this->headerColors['top_cart_button_hover_bg'] . ';}

/* Top cart button hover text color */
header#header .top-cart .block-title:hover .title-cart{
	color:#' . $this->headerColors['top_cart_button_hover_text_color'] . ';
}';

$css .= '

/* Header toolbar wrapper */
header#header .header-toolbar-wrapper{
	background-color:#' . $this->headerColors['toolbar_wrapper'] . ';
}

/* Header toolbar links text color */
header#header .links li a{
	color:#' . $this->headerColors['toolbar_links_text_color'] . ';
}

/* Header toolbar links text hover color */
header#header .links li a:hover{
	color:#' . $this->headerColors['toolbar_links_text_hover_color'] . ';
}

/* Header toolbar links bg hover color */
header#header .links li a:hover{
	background-color:#' . $this->headerColors['toolbar_links_bg_hover_color'] . ';
}

/* Language + Currency label color */
header#header .form-language label,
header#header .form-currency label{color:#' . $this->headerColors['lang_curr_label_color'] . ';}

/* Language + Currency link color */
.sbSelector{color:#' . $this->headerColors['lang_curr_link_color'] . ';}

/* Language + Currency link color hover */
.sbSelector:hover{color:#' . $this->headerColors['lang_curr_link_color_hover'] . ';}
';

$css .= '

/*======Footer=======*/

/* Main bg */
body {background-color:#' . $this->footerColors['footer_main_bg'] . ';}

/* Footer columns wrapper */
#footer .footer-columns-wrapper{
	background-color: #' . $this->footerColors['footer_columns_wrapper_bg'] . ';
}

/* Footer top links color */
#footer ul li a{color:#' . $this->footerColors['footer_top_links_color'] . ';}

/* Footer top links hover color */
#footer ul li a:hover{color:#' . $this->footerColors['footer_top_links_color_hover'] . ';}

/* Footer text color */
#footer .footer-columns-wrapper{
	color:#' . $this->footerColors['footer_text_color'] . ';
}

/* Footer Title color */
#footer .footer-columns-wrapper h3{
	color:#' . $this->footerColors['footer_title_color'] . ';
}

/* Footer list: link color */
#footer .footer-columns-wrapper li a{
	color:#' . $this->footerColors['footer_list_link_color'] . ';
}

/* Footer list: marker color */
#footer .footer-columns-wrapper li a:before{
	background: #' . $this->footerColors['footer_list_marker_color'] . ';
}

/* Footer list: link and marker color hover */
#footer .footer-columns-wrapper li a:hover:before{
	background:#' . $this->footerColors['footer_list_link_marker_color_hover'] . ';
}
#footer .footer-columns-wrapper li a:hover{

	color:#' . $this->footerColors['footer_list_link_marker_color_hover'] . ';
}

/* Footer copyright color */
#footer address{color:#' . $this->footerColors['footer_copyright_color'] . ';}';

$css .= '

/* Footer contact form: text color */
#footer .contacts-footer-content input.input-text,
#footer .contacts-footer-content .input-box textarea{
	color:#' . $this->footerColors['footer_contact_form_text_color'] . ';
}

/* Footer contact form: bg color */
#footer .contacts-footer-content input.input-text,
#footer .contacts-footer-content .input-box textarea{
	background-color:rgba('.MAGE::helper('ThemeOptionsFlatshop')->HexToRGB($this->footerColors['footer_contact_form_bg_color']).', 0.3);
}

/* Footer contact form: border radius */
#footer .contacts-footer-content input.input-text,
#footer .contacts-footer-content .input-box textarea{
	-moz-border-radius:' . $this->footerColors['footer_contact_border_radius'] . 'px;
	border-radius:' . $this->footerColors['footer_contact_border_radius'] . 'px;
}

/* Footer contact form: button color */
#footer .contacts-footer-content .buttons-set button > span{
	background-color: #' . $this->footerColors['footer_contact_button_color'] . ';
}

/* Footer contact form: button color hover */
#footer .contacts-footer-content .buttons-set button:hover > span{
	background-color: #' . $this->footerColors['footer_contact_button_color_hover'] . ';
}';

$css .= '

/* Social Icons: item bg */
ul.social-links li a {
	background-color:#' . $this->socialIcons['social_icons_item_bg'] . ';
}

/* Social Icons: item bg hover */
ul.social-links li a:hover {
	background-color:#' . $this->socialIcons['social_icons_item_bg_hover'] . ';
}

/* Social Icons: item color */
ul.social-links li a i{
	color:#' . $this->socialIcons['social_icons_item_text_color'] . ';
}

/* Social Icons: item color hover */
ul.social-links li a:hover i{
	color:#' . $this->socialIcons['social_icons_item_text_color_hover'] . ';
}';

$css .= '

/* Listing title color */
.products-grid .product-name a,
.products-list .product-name a{color:#' . $this->listing['listing_title_color'] . ';}

/* Listing title color hover */
.products-grid .product-name a:hover,
.products-list .product-name a:hover{color:#' . $this->listing['listing_title_color_hover'] . ';}

/* Product List Description color */
.products-list .desc{color:#' . $this->listing['listing_description_color'] . ';}';


$css .= '

/* ===Product Labels=== */
/* Label New color */
span.label-new{color:#' . $this->productLabels['product_labels_new_color'] . ';}

/* Label New bg color */
span.label-new{
	background-color: #' . $this->productLabels['product_labels_new_bg_color'] . ';
}
span.label-new .triangle-topleft{
	border-top-color: #' . $this->productLabels['product_labels_new_bg_color'] . '!important;
}
span.label-new .triangle-bottomleft {
    border-bottom-color: #' . $this->productLabels['product_labels_new_bg_color'] . '!important;
}

/* Label Sale color */
span.label-sale{color:#' . $this->productLabels['product_labels_sale_color'] . ';}

/* Label Sale bg color */
span.label-sale{
	background-color: #' . $this->productLabels['product_labels_sale_bg_color'] . ';
}
span.label-sale .triangle-topleft{
	border-top-color: #' . $this->productLabels['product_labels_sale_bg_color'] . '!important;
}
span.label-sale .triangle-bottomleft {
    border-bottom-color: #' . $this->productLabels['product_labels_sale_bg_color'] . '!important;
}';

$css .= '
/* Regular Price color */
.regular-price .price{color:#' . $this->prices['prices_regular_color'] . ';}

/* Old Price color */
.product-view .product-shop .price-box .old-price .price,
.products-list .product-shop .old-price .price,
.old-price .price{color:#' . $this->prices['prices_old_color'] . ';}

';

    	$this->saveData($css);
        Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('ThemeOptionsFlatshop')->__("CSS file with custom styles has been created"));

        return true;
    }

    private function saveData($data)
    {
        $this->setLocation ();

        try {
	        /*$fh = fopen($file, 'w');
	       	fwrite($fh, $data);
	        fclose($fh);*/

            $fh = new Varien_Io_File(); 
            $fh->setAllowCreateFolders(true); 
            $fh->open(array('path' => $this->dirPath));
            $fh->streamOpen($this->filePath, 'w+'); 
            $fh->streamLock(true); 
            $fh->streamWrite($data); 
            $fh->streamUnlock(); 
            $fh->streamClose(); 
    	}
    	catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('ThemeOptionsFlatshop')->__('Failed creation custom css rules. '.$e->getMessage()));
        }
    }

}