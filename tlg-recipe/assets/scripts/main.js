(function($){
	$("#recipe_rating").bind("rated", function(){
		$(this).rateit("readonly", true);

		var formObj = {
			action: "tlgr_rate_recipe",
			rid: $(this).data("rid"),
			rating: $(this).rateit("value")
		}

		// console.log(formObj);
		$.post( recipe_obj.ajax_url, formObj, function(data){
			console.log(data);
		});
	});
})(jQuery)