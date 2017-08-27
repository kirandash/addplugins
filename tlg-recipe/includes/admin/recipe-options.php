<?php
function tlgr_recipe_options_mb( $post ) {
	$recipe_data = get_post_meta( $post->ID, 'recipe_data', true ); // returns array values
	// var_dump($recipe_data);
	if(!$recipe_data){
		$recipe_data = array(
			'ingredients'	=> '',
			'time'			=> '',
			'utensils'		=> '',
			'level'			=> 'Beginner',
			'meal_type'		=> ''
		);
	}
	?>
	<div class="form-group">
		<label for="Ingredients">Ingredients</label>
		<input type="text" class="form-control" name="tlgr_inputIngredients" value="<?php echo $recipe_data['ingredients']; ?>">
	</div>
	<div class="form-group">
		<label for="Cooking Time">Cooking Time</label>
		<input type="text" class="form-control" name="tlgr_inputCookingTime" value="<?php echo $recipe_data['time']; ?>">
	</div>
	<div class="form-group">
		<label for="Cooking Utensils">Cooking Utensils</label>
		<input type="text" class="form-control" name="tlgr_inputCookingUtensils" value="<?php echo $recipe_data['utensils']; ?>">
	</div>
	<div class="form-group">
		<label for="cooking-level">Cooking Level</label>
		<select name="tlgr_inputLevel" id="tlgr_inputLevel">
			<option value="Beginner">Beginner</option>
			<option value="Intermediate" <?php echo $recipe_data['level'] == "Intermediate" ? "SELECTED" : ""; ?>>Intermediate</option>
			<option value="Expert" <?php echo $recipe_data['level'] == "Expert" ? "SELECTED" : ""; ?>>Expert</option>
		</select>
	</div>
	<div class="form-group">
		<label for="Meal Type">Meal Type</label>
		<input type="text" class="form-control" name="tlgr_inputMealType" value="<?php echo $recipe_data['meal_type']; ?>">
	</div>
	<?php
}