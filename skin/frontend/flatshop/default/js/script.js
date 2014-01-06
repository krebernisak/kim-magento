/* Login ajax */
function ajaxLogin(ajaxUrl, clear){
	if(clear == true){
		clearHolder();
		jQuery(".ajax-box-overlay").removeClass('loaded');
	}
	jQuery("#header").append("<div id='login-holder' />");
	if(!jQuery(".ajax-box-overlay").length){
		jQuery("#login-holder").after('<div class="ajax-box-overlay"><i class="load" /></div>');
		jQuery(".ajax-box-overlay").fadeIn('medium');
	}
	function overlayResizer(){
		jQuery(".ajax-box-overlay").css('height', jQuery(window).height());
	}
	overlayResizer();
	jQuery(window).resize(function(){overlayResizer()});
	
	jQuery.ajax({
		url: ajaxUrl,
		cache: false
	}).done(function(html){
		jQuery("#login-holder").html(html).animate({
			opacity: 1,
			top: '100px'
		}, 500 );
		jQuery(".ajax-box-overlay").addClass('loaded');
		clearAll();
	});
	
	function clearAll(){
		jQuery("#login-holder .close-button").on('click', function(){
			jQuery(".ajax-box-overlay").fadeOut('medium', function(){
				jQuery(this).remove();
			});
			clearHolder();
		});
	}
	function clearHolder(){
		jQuery("#login-holder").animate({
			opacity: 0,
			top: 0
		  }, 500, function() {
			jQuery(this).remove();
		});
	}
}

/* Top Cart */
function topCart(){
	jQuery('.top-cart .block-title').on('click', function(){
		jQuery(this).toggleClass('active');
		jQuery('#topCartContent').slideToggle(500).toggleClass('active');
		
		boxWidth = jQuery(this).next('.block-content').innerWidth();
		itemCount = jQuery(this).next('.block-content').find('> .color-box .item').size();
		itemWidth = boxWidth/itemCount;
		jQuery(this).next('.block-content').find('> .color-box').css('width', boxWidth);
		jQuery(this).next('.block-content').find('> .color-box .item').css('width', itemWidth);
		
	});
}
/* Top Cart */

/* Wishlist Block Slider */
function wishlist_slider(){
  jQuery('#wishlist-slider .es-carousel').iosSlider({
	responsiveSlideWidth: true,
	snapToChildren: true,
	desktopClickDrag: true,
	infiniteSlider: false,
	navNextSelector: '#wishlist-slider .next',
	navPrevSelector: '#wishlist-slider .prev'
  });
}
 
function wishlist_set_height(){
	var wishlist_height = 0;
	jQuery('#wishlist-slider .es-carousel li').each(function(){
	 if(jQuery(this).height() > wishlist_height){
	  wishlist_height = jQuery(this).height();
	 }
	})
	jQuery('#wishlist-slider .es-carousel').css('min-height', wishlist_height+2);
}
if(jQuery('#wishlist-slider').length){
  whs_first_set = true;
  wishlist_slider();
}
/* Wishlist Block Slider */

jQuery(window).load(function() {

	jQuery('.block-layered-nav dd:last').addClass('last');
	
	if(jQuery('.block-layered-nav dd #slider-range').length){
		jQuery('body').addClass('ajax-price-slider');
	}
	

	/* Fix for IE */
    	if(navigator.userAgent.indexOf('IE')!=-1 && jQuery.support.noCloneEvent){
			jQuery.support.noCloneEvent = true;
		}
	/* End fix for IE */

	/* More Views Slider */
	if(jQuery('#more-views-slider').length){
	  jQuery('#more-views-slider').iosSlider({
		   responsiveSlideWidth: true,
		   snapToChildren: true,
		   desktopClickDrag: true,
		   infiniteSlider: false,
		   navSlideSelector: '.sliderNavi .naviItem',
		   navNextSelector: '.more-views .next',
		   navPrevSelector: '.more-views .prev'
		 });
		 
		
	 }
	 function more_view_set_height(){
		if(jQuery('#more-views-slider').length){
			var more_view_height = 0;
			jQuery('#more-views-slider li a').each(function(){
			 if(jQuery(this).height() > more_view_height){
			  more_view_height = jQuery(this).height();
			 }
			})
			jQuery('#more-views-slider').css('min-height', more_view_height+2);
		}
	 }
	 /* More Views Slider */

	 /* Related Block Slider */
	  if(jQuery('.block-related-slider').length) {
	  
	  
		jQuery('.product-essential .block-related-slider').iosSlider({
		   responsiveSlideWidth: true,
		   snapToChildren: true,
		   desktopClickDrag: true,
		   infiniteSlider: false,
		   navNextSelector: '.product-essential .block-related .next',
		   navPrevSelector: '.product-essential .block-related .prev'
		});
		 
		jQuery('.bottom-product-related .block-related-slider').iosSlider({
		   responsiveSlideWidth: true,
		   snapToChildren: true,
		   desktopClickDrag: true,
		   infiniteSlider: false,
		   navNextSelector: '.bottom-product-related .block-related .next',
		   navPrevSelector: '.bottom-product-related .block-related .prev'
		}); 
		 
	 }
	 
	 function related_set_height(){
		jQuery('.block-related-slider').each(function(){
			var related_height = 0;
			jQuery(this).find('li.item').each(function(){
				if(jQuery(this).height() > related_height){
					related_height = jQuery(this).height();
				}
			})
			jQuery(this).css('min-height', related_height+2);
		});
	}
	 /* Related Block Slider */
	 
	 
   /* Layered Navigation Accorion */
  if (jQuery('#layered_navigation_accordion').length) {
    jQuery('.filter-label').each(function(){
        jQuery(this).toggle(function(){
            jQuery(this).addClass('closed').next().slideToggle(200);
        },function(){
            jQuery(this).removeClass('closed').next().slideToggle(200);
        })
    });
  }
  /* Layered Navigation Accorion */


  /* Product Collateral Accordion */
  if (jQuery('#collateral-accordion').length) {
	  jQuery('#collateral-accordion > div.box-collateral').hide();  
	  jQuery('#collateral-accordion > h2').click(function() {
		jQuery(this).parent().find('h2').removeClass('active');
		jQuery(this).addClass('active');
		
	    var nextDiv = jQuery(this).next();
	    var visibleSiblings = nextDiv.siblings('div:visible');
	 
	    if (visibleSiblings.length ) {
	      visibleSiblings.slideUp(300, function() {
	        nextDiv.slideToggle(500);
	      });
	    } else {
	       nextDiv.slideToggle(300);
	    }
	  });
  }
  /* Product Collateral Accordion */

  /* My Cart Accordion */
  if (jQuery('#cart-accordion').length) {
	  jQuery('#cart-accordion > div.accordion-content').hide();	  
	  
	  jQuery('#cart-accordion > h3.accordion-title').wrapInner('<span/>').click(function(){
	  
		var accordion_title_check_flag = false;
		if(jQuery(this).hasClass('active')){accordion_title_check_flag = true;}
		jQuery('#cart-accordion > h3.accordion-title').removeClass('active');
		if(accordion_title_check_flag == false){
			jQuery(this).toggleClass('active');
	    }
		
		var nextDiv = jQuery(this).next();
	    var visibleSiblings = nextDiv.siblings('div:visible');
	 
	    if (visibleSiblings.length ) {
	      visibleSiblings.slideUp(300, function() {
	        nextDiv.slideToggle(500);
	      });
	    } else {
	       nextDiv.slideToggle(300);
	    }
		
	  });
	  
	  
  }
  /* My Cart Accordion */
  
  /* Coin Slider */

	/* Fancybox */
	if (jQuery.fn.fancybox) {
		jQuery('.fancybox').fancybox();
	}
	/* Fancybox */

	/* Zoom */
	if (jQuery('#zoom').length) {
		jQuery('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
  	}
	/* Zoom */
		
	/* Responsive */
	var responsiveflag = false;
	var topSelectFlag = false;
	var menu_type = jQuery('#nav').attr('class');
	
	function mobile_menu(mode){
		switch(mode)
		 {
		 case 'animate':
		   if(!jQuery('.nav-container').hasClass('mobile')){
				jQuery(".nav-container").addClass('mobile');
				jQuery('.nav-container > ul').slideUp('fast');
				jQuery('.menu-button').removeClass('active');
				jQuery('.menu-button').on('click', function(){
					jQuery(this).toggleClass('active');
					jQuery('.nav-container > ul').slideToggle('medium');
				});
			   jQuery('.nav-container > ul a').each(function(){
					if(jQuery(this).next('ul').length){
						jQuery(this).before('<span class="menu-item-button"><i class="fa fa-plus" /><i class="fa fa-minus" /></div>');
						jQuery(this).next('ul').slideUp('fast');
						jQuery(this).prev('.menu-item-button').on('click', function(){
							jQuery(this).toggleClass('active');
							jQuery(this).nextAll('ul').slideToggle('medium');
						});
					}
			   });
		   }
		   break;
		 default:
				jQuery(".nav-container").removeClass('mobile');
				jQuery('.menu-button').off();
				jQuery('.nav-container > ul').slideDown('fast');
				jQuery('.nav-container .menu-item-button').each(function(){
					jQuery(this).nextAll('ul').slideDown('fast');
					jQuery(this).remove();
				});
		 }
	}
	
	function accordion (status){
		if(status == 'enable'){
			if(!jQuery('aside.sidebar section header .mobile-sidebar-button').length){
				jQuery('aside.sidebar section:not(.opc-block-progress) header').append('<div class="mobile-sidebar-button"><i class="fa fa-angle-left" /><i class="fa fa-angle-right" /></div>');
			}
			jQuery('aside.sidebar section:not(.opc-block-progress) header .mobile-sidebar-button').on('click', function(){
				jQuery(this).toggleClass('active').parent().parent().find(".block-content").slideToggle('medium');
				wishlist_slider();
			})
			jQuery('aside.sidebar').addClass('accordion').find("section:not(.opc-block-progress) .block-content").slideUp('fast');
		}else{
			jQuery('aside.sidebar section header .mobile-sidebar-button').removeClass("active").off();
			jQuery('aside.sidebar header').parent().find(".block-content").slideDown('fast');
			jQuery('aside.sidebar').removeClass('accordion');
		}
	}
	function toDo(){
		if (jQuery(document.body).width() < 767 && responsiveflag == false){
		    accordion('enable');
			
			/* Top Menu Select */
			if(topSelectFlag == false){
				jQuery('.nav-container .sbSelector').wrapInner('<span />').prepend('<span />');
				topSelectFlag = true;
			}
			jQuery('.nav-container .sbOptions li a').on('click', function(){
				if(!jQuery('.nav-container .sbSelector span').length){
					jQuery('.nav-container .sbSelector').wrapInner('<span />').prepend('<span />');
				}
			});
			/* //Top Menu Select */
			responsiveflag = true;
		}
		else if (jQuery(document.body).width() > 767){
			accordion('disable');
			responsiveflag = false;
		}
	}
	function replacingClass () {

	   if (jQuery(document.body).width() < 480) { //Mobile
			mobile_menu('animate');
	   }
	   if (jQuery(document.body).width() > 479 && jQuery(document.body).width() < 768) { //iPhone
			mobile_menu('animate');
	   }  
	   else if (jQuery(document.body).width() > 767) { //Desktop
			mobile_menu('reset');
	   }
		if (jQuery(document.body).width() > 767 && jQuery(document.body).width() < 977){ //Tablet
			mobile_menu('reset');
			if(jQuery('#custommenu-mobile').length){jQuery('header#header').addClass('mega-menu');}
	    }
		if (jQuery(document.body).width() > 1279){ //Extra Large
			mobile_menu('reset');
		}
	}
	replacingClass();
	toDo();
	more_view_set_height();
	wishlist_set_height();
	related_set_height()
	//menuHeight2();
	jQuery(window).resize(function(){toDo(); replacingClass(); more_view_set_height(); wishlist_set_height(); related_set_height();});
	/* Responsive */
	
	/* Top Menu */
	function menuHeight2 () {
		var menu_min_height = 0;
		jQuery('#nav li.tech').css('height', 'auto');
		jQuery('#nav li.tech').each(function(){
			if(jQuery(this).height() > menu_min_height){
				menu_min_height = jQuery(this).height();
			}
		});		
		jQuery('#nav li.tech').each(function(){
			jQuery(this).css('height', menu_min_height + 'px');
		});
	}
	
	/* Top Selects */
	function option_class_add(items, is_selector){
		jQuery(items).each(function(){
			if(is_selector){
				jQuery(this).removeAttr('class'); 
				jQuery(this).addClass('sbSelector');
			}			
			stripped_string = jQuery(this).html().replace(/(<([^>]+)>)/ig,"");
			RegEx=/\s/g;
			stripped_string=stripped_string.replace(RegEx,"");
			jQuery(this).addClass(stripped_string.toLowerCase());
			if(is_selector){
				tags_add();
			}
		});
	}
	option_class_add('.form-language .sbOptions li a, .form-language .sbSelector, .form-currency .sbOptions li a, .form-currency .sbSelector', false);
	jQuery('.form-language .sbOptions li a, .form-currency .sbOptions li a').on('click', function(){
		option_class_add('.form-language .sbSelector, .form-currency .sbSelector', true);
	});	
	function tags_add(){
		jQuery('.form-language .sbSelector, .form-currency .sbSelector').each(function(){
			if(!jQuery(this).find('span.text').length){
				jQuery(this).wrapInner('<span class="text" />');
			}
		});
	}
	tags_add();
	/* //Top Selects */
	
	
	if (jQuery('body').hasClass('retina-ready')) {
		/* Mobile Devices */
		if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i))){
			
			/* Mobile Devices Class */
			jQuery('body').addClass('mobile-device');
			
			/* Menu */
			jQuery(".nav-container:not('.mobile') #nav li").on({
	            click: function (){
	                if ( !jQuery(this).hasClass('touched') && jQuery(this).children('ul').length ){
						jQuery(this).addClass('touched');
						clearTouch(jQuery(this));
						return false;
	                }
	            }
	        });
			
			/* Clear Touch Function */
			function clearTouch(handlerObject){
				jQuery('body').on('click', function(){
					handlerObject.removeClass('touched closed');
					if(handlerObject.parent().attr('id') == 'categories-accordion'){
						handlerObject.children('ul').slideToggle(200);
					}
					jQuery('body').off();
				});
				handlerObject.click(function(event){
					event.stopPropagation();
				});
				handlerObject.parent().click(function(){
					handlerObject.removeClass('touched');
				});
				handlerObject.siblings().click(function(){
					handlerObject.removeClass('touched');
				});
			}
			
			var mobileDevice = true;
		}else{
			var mobileDevice = false;
		}

		
		//images with custom attributes
		if (pixelRatio > 1) {
			jQuery('img[data-srcX2]').each(function(){
				jQuery(this).attr('src',jQuery(this).attr('data-srcX2'));
			});
		}
    }
	
	
	/* Categories Accorion */
	if (jQuery('#categories-accordion').length){
		jQuery('#categories-accordion li.level-top.parent ul.level0').before('<div class="btn-cat"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></div>');
		if(mobileDevice == true){
			jQuery('#categories-accordion li.level-top.parent').each(function(){
				jQuery(this).on({
					click: function (){
						if(!jQuery(this).hasClass('touched')){
							jQuery(this).addClass('touched closed').children('ul').slideToggle(200);
							clearTouch(jQuery(this));
							return false;
						}
					}
				});
			});
		}else{
			jQuery('#categories-accordion li.level-top.parent .btn-cat').each(function(){
				jQuery(this).toggle(function(){
					jQuery(this).addClass('closed').next().slideToggle(200);
					jQuery(this).prev().addClass('opened');
				},function(){
					jQuery(this).removeClass('closed').next().slideToggle(200);
					jQuery(this).prev().removeClass('opened');
				})
			});
		}
	}
	/* Categories Accorion */
	
	/* Home banners */
	jQuery('.flipping-banner').each(function(){
		jQuery(this).addClass('transform');
		if(navigator.userAgent.indexOf('IE')!=-1){
			jQuery(this).removeClass('transform');
			jQuery(this).addClass('fader');
			jQuery(this).find('.back-side').fadeOut(1);
			jQuery(this).find('.banner-button').on('click', function(){
				jQuery(this).parent().find('.back-side').fadeToggle('fast');
			});
		}
		function banner_height(){
			jQuery('.flipping-banner').each(function(){
				jQuery(this).find('.front-side').attr('style', '');
				bannerHeight = jQuery(this).find('.front-side').height();
				jQuery(this).find('.front-side, .back-side').css('height', bannerHeight);
				jQuery(this).css('height', bannerHeight);
			})
		}
		banner_height(jQuery(this));
		jQuery(window).resize(function(){banner_height()});
		jQuery(this).find('.banner-button').on('click', function(){
			jQuery(this).fadeOut(300).delay(400).fadeIn(300);
			jQuery(this).parent().toggleClass('inverted');
		});
	});
	
	/* Home Blocks */
	if(jQuery('.header-blocks-wrapper').length){
		setTimeout(function(){
			jQuery('.header-blocks-wrapper').animate({
				opacity: 1
			 }, 1000 );
		}, 500);
	}
	
	if(jQuery('#custommenu').length){
		if(jQuery('#custommenu').hasClass('full')){
			jQuery('#custommenu > .wp-custom-menu-popup').each(function(){
				jQuery(this).prepend('<ol class="color-box"><li class="item first odd" /><li class="item even" /><li class="item odd" /><li class="item even" /><li class="item odd" /><li class="item even" /><li class="item odd" /><li class="item even" /><li class="item odd" /><li class="item even last" /></ol>');
			});
		}else{
			jQuery('#custommenu > .wp-custom-menu-popup').each(function(){
				jQuery(this).prepend('<ol class="color-box"><li class="item first odd" /><li class="item even" /><li class="item odd" /><li class="item even" /><li class="item odd" /><li class="item even" /><li class="item odd last" /></ol>');
			});
		}
		function mega_menu_colors(){
			jQuery('#custommenu > .wp-custom-menu-popup').each(function(){
				boxWidth = jQuery(this).innerWidth();
				itemCount = jQuery(this).find('.color-box .item').size();
				itemWidth = boxWidth/itemCount;
				jQuery(this).find('.color-box').css('width', boxWidth);
				indent = Math.round((itemWidth - Math.floor(itemWidth))*itemCount);
				jQuery(this).find('.item').css('width', Math.floor(itemWidth));
				jQuery(this).find('.item:first').css('width', Math.floor(itemWidth)+indent);
			});
		}
		mega_menu_colors();
		jQuery(window).resize(function(){mega_menu_colors();});
	}
	
});
var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;
jQuery(document).ready(function(){
	/* Header Selects */
	if(!jQuery(".form-language .sbHolder").length || !jQuery(".form-currency .sbHolder").length){
		jQuery(".form-language select, .form-currency select").selectbox();
	}
	 
    /* Cart Increase/Decrease Buttons */            
	jQuery('.cart .qty, .my-wishlist .qty').each(function(){
		var thisQty = jQuery(this);
		
		var decreaseButton = thisQty.prev();
		decreaseButton.on('click', function(){
			if( !isNaN( thisQty.attr("value") ) && thisQty.attr("value") > 0 ){
			   var el_val = parseFloat(thisQty.attr("value"))-1;
			   thisQty.attr('value', el_val);
		    }
		});
		
		var increaseButton = jQuery(this).next();
		increaseButton.on('click', function(){
			if( !isNaN(thisQty.attr("value"))){
			   var el_val = parseFloat(thisQty.attr("value"))+1; 
			   thisQty.attr('value', el_val);
		    }
		});
	});
	
	
	/* Messages button */
	if(jQuery('ul.messages').length){
		jQuery('ul.messages > li').prepend('<div class="messages-close-btn" />');
		jQuery('ul.messages .messages-close-btn').on('click', function(){
			jQuery('ul.messages').remove();
		});
	}
	
	/* nav num */
	  if (jQuery('#nav li a').length) {
		var n = 0;
		jQuery('#nav li.level-top > a').each(function(n){
			jQuery(this).find('span').prepend('<span class="num">0' + (n+1) + '</span>');
		});
	  }
	/* nav num */
	
	/* nav custome num */
	  if (jQuery('#custommenu').length) {
		var n = 0;
		jQuery('#custommenu .menu .parentMenu > a, #custommenu-mobile #menu-content > .menu-mobile > .parentMenu > a').each(function(n){
			if(n < 9){is_null = '0'}else{is_null = ''}
			jQuery(this).find('span').prepend('<i class="num">' + is_null + (n+1) + '</i>');
		});
		
		jQuery('#custommenu .menu:last').addClass('last');
		jQuery('#menu-content .menu-mobile span.button').prepend('<i class="fa fa-plus" /><i class="fa fa-minus" />');
	  }
	/* nav custome */
	
	
	/* Menu items */
	jQuery('#nav > li:last').addClass('last-item');
	
	/* Menu triangle */
	jQuery('#nav ul li.parent > a').each(function(){
		jQuery(this).prepend('<i class="triangle-down" />');
	});
	
	/* Messages button */
	if(jQuery('ul.messages').length){
		switch (jQuery('ul.messages > li').attr('class')){
		   case 'success-msg':
				messageIcon = '<i class="fa fa-ok" />';
		   break;
		   case 'error-msg':
				messageIcon = '<i class="fa fa-times" />';
		   break;
		   case 'note-msg':
				messageIcon = '<i class="fa fa-exclamation" />';
		   break;
		   case 'notice-msg':
				messageIcon = '<i class="fa fa-exclamation" />';
		   break;
		}
		jQuery('ul.messages > li').prepend('<div class="messages-close-btn"><i class="fa fa-times" /></div>', messageIcon);
		jQuery('ul.messages .messages-close-btn').on('click', function(){
			jQuery('ul.messages').remove();
		});
	}
	
	/* Top Links Icons */
	jQuery('#header .links li a').each(function(){
		jQuery(this).wrapInner('<span />');
		switch (jQuery(this).attr('class')){
			case 'top-link-account':
				jQuery(this).prepend('<i class="fa fa-user" />');
			break;
			case 'top-link-wishlist':
				jQuery(this).prepend('<i class="fa fa-star" />');
			break;
			case 'top-link-checkout':
				jQuery(this).prepend('<i class="fa fa-money" />');
			break;
			case 'top-link-login':
				jQuery(this).prepend('<i class="fa fa-key" />');
			break;
			case 'top-link-logout':
				jQuery(this).prepend('<i class="fa fa-key" />');
			break;
		}
	});
	
	/* Drop down menu color box */
	jQuery('#nav ul').each(function(){
		jQuery(this).find('li:first > a').prepend('<ol class="color-box"><li class="item first odd" /><li class="item even" /><li class="item odd" /><li class="item even last" /></ol>');
	});
	
	jQuery('#nav .static-wrapper').each(function(){
		jQuery(this).prepend('<ol class="color-box"><li class="item first odd" /><li class="item even" /><li class="item odd" /><li class="item even last" /></ol>');
	});
	
	jQuery('#nav li a').on('mouseover', function(){
		boxWidth = jQuery(this).next('ul').innerWidth();
		itemCount = jQuery(this).next('ul').find('> li:first > a > .color-box .item').size();
		itemWidth = boxWidth/itemCount;
		jQuery(this).next('ul').find('> li:first > a > .color-box').css('width', boxWidth);
		jQuery(this).next('ul').find('> li:first > a > .color-box .item').css('width', itemWidth);
	});
	
	jQuery('#nav li a').on('mouseover', function(){
		boxWidth = jQuery(this).next('.static-wrapper').innerWidth();
		itemCount = jQuery(this).next('.static-wrapper').find('> .color-box .item').size();
		itemWidth = boxWidth/itemCount;
		jQuery(this).next('.static-wrapper').find('> .color-box').css('width', boxWidth);
		jQuery(this).next('.static-wrapper').find('> .color-box .item').css('width', itemWidth);
	});
	
	/* Sidebar blocks */
	jQuery('aside.sidebar section:first').addClass('first');
	jQuery('aside.sidebar section:last').addClass('last');
	jQuery('aside.sidebar section:first, aside.sidebar section:last').each(function(){
		jQuery(this).prepend('<ol class="color-box"><li class="item first odd" /><li class="item even" /><li class="item odd" /><li class="item even" /><li class="item odd last" /></ol>');
	});
	jQuery('.footer-block section.block-subscribe').each(function(){
		jQuery(this).prepend('<ol class="color-box"><li class="item first odd" /><li class="item even" /><li class="item odd" /><li class="item even" /><li class="item odd" /><li class="item even" /><li class="item odd last" /></ol>');
	});
	function colorItems(){
		jQuery('aside.sidebar section .color-box, .footer-block section.block-subscribe .color-box, .flipping-banner .color-box').each(function(){
			boxWidth = jQuery(this).innerWidth();
			itemCount = jQuery(this).find('.item').size();
			itemWidth = boxWidth/itemCount;
			indent = Math.round((itemWidth - Math.floor(itemWidth))*itemCount);
			jQuery(this).find('.item').css('width', Math.floor(itemWidth));
			jQuery(this).find('.item:first').css('width', Math.floor(itemWidth)+indent);
		});
	}
	colorItems();
	jQuery(window).resize(function(){colorItems();});
	
});