<?php
function tlgr_recipe_creator_shortcode() {
	$creatorHTML = file_get_contents( 'creator-template.php', true );
	$editorHTML = tlgr_generate_content_editor();
	$creatorHTML = str_replace( 'CONTENT_EDITOR', $editorHTML, $creatorHTML );
	return $creatorHTML;
}

function tlgr_generate_content_editor() {
	ob_start();
	wp_editor( '',  'recipecontenteditor' ); // tiny MCE editor for form, will replace the textarea in form with PHP buffer
	// https://codex.wordpress.org/Function_Reference/wp_editor
	$editor_contents = ob_get_clean();
	return $editor_contents;
}
?>