(function($){
	// jQuery rating script
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
	
	// recipe Form submit script
	$(document).on( 'submit', '#recipeForm', function(e){
		e.preventDefault();

		$(this).hide();
		$("#recipeStatus").html("<div class='alert alert-info'>Please wait! We are submitting your recipe.</div>");

		var formObj = {
			action: 		"tlgr_submit_user_recipe",
			title: 			$("#tlgr_inputTitle").val(),
			content: 		tinymce.activeEditor.getContent(), // wordpress loads the tinymce object - returns unsanitized data
			ingredients: 	$("#tlgr_inputIngredients").val(),
			time: 			$("#tlgr_inputTime").val(),
			utensils: 		$("#tlgr_inputUtensils").val(),
			level: 			$("#tlgr_inputLevel").val(),
			meal_type: 		$("#tlgr_inputMealType").val()
		}

		$.post( recipe_obj.ajax_url, formObj, function(data){
			console.log(data);
			if(data.status == 2){
				$("#recipeStatus").html("<div class='alert alert-info'>Recipe submitted successfully! An admin will approve </div>");
			}else{
				$("#recipeStatus").html("<div class='alert alert-info'>Unable to submit recipe. Please fill in all fields.</div>");
				$("#recipeForm").show();
			}
		});
	});
})(jQuery)