<?php

add_shortcode('pdf', function($attrs, $url) {
	$viewerUrl = "https://drive.google.com/viewerng/viewer?embedded=true&url=";

	$defaults = [
		'width' => '100%',
		'height' => '800'
	];
	$attrs = shortcode_atts($defaults, $attrs);

	return sprintf('<embed src="%s%s" width="%s" height="%s" class="pdf-embed" allowfullscreen>', $viewerUrl, $url, $attrs['width'], $attrs['height']);
});

add_filter('media_send_to_editor', function($html, $id='', $attachment='') {
	if (preg_match('#<a[^>]+href="([^"]+)[^>]+>(.+)<\/a>#is', $html, $matches)) {
		$url = $matches[1];
		$title = $matches[2];

		if (preg_match("/\.pdf$/i", $url)) {
			return '[pdf width=100% height=800 title='. $title. ']'. $url. '[/pdf]';
		}
	}

	return $html;
});