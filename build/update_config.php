<?php

if (isset($argv[1])) {
	$filename = $argv[1];

	if (file_exists($filename) && is_writable($filename)) {

		$file = file($filename);

		$content = '';
		foreach ($file as $line => $value) {
			if ($line > 0 && $line <= 1) {
				$content .= "define('WP_HOME', !empty(\$_SERVER['HTTPS']) ? 'https' : 'http' . '://' . \$_SERVER['HTTP_HOST']);\n";
				$content .= "define('WP_SITEURL', !empty(\$_SERVER['HTTPS']) ? 'https' : 'http' . '://' . \$_SERVER['HTTP_HOST']);\n";
			}
			$content .= $value;
		}

		//echo $content;
		file_put_contents($argv[1], $content);

	}
} else {
	echo "Path to config file not set\n";
}



