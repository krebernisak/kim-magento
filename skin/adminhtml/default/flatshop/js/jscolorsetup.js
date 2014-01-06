Event.observe(window, 'load', function() {
	function jsColor(mainId, exceptions){
		var selection = 'input.input-text:not('+ exceptions +')';
		var selected_items = $$(mainId)[0].select(selection);
		selected_items.each(function(val){
			new jscolor.color(val);
		});
	}
	jsColor('#meigee_flatshop_design_base');
	jsColor('#meigee_flatshop_design_header', '#meigee_flatshop_design_header_nav_button_border_radius');
	jsColor('#meigee_flatshop_design_footer', '#meigee_flatshop_design_footer_footer_contact_border_radius');
	jsColor('#meigee_flatshop_design_social_icons');
	jsColor('#meigee_flatshop_design_listing');
	jsColor('#meigee_flatshop_design_product_labels');
	jsColor('#meigee_flatshop_design_prices');
});