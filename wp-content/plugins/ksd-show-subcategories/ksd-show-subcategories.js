jQuery(function(a){
	a("#wooc_sclist_mobile").on("change","select.wooc_sclist_select",function(){
		a(this).closest("form").submit()
	})
});