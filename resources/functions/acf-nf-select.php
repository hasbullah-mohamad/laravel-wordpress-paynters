<?php

// Add Ninja forms form title/ids to ACF select
add_filter('acf/load_field/name=ninja_form_id', function($field) {
	$field['choices'] = [];
	$field['choices'][] = false;
	$forms = Ninja_Forms()->form()->get_forms();

	foreach ($forms as $form) {
		$field['choices'][$form->get_id()] = $form->get_setting('title');
	}

	return $field;
});
