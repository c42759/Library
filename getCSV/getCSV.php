<?php
	include "./backoffice/configuration.php";
	include "./backoffice/connect.php";

	$query[0] = sprintf("SELECT * FROM %s_images WHERE true", $configuration["mysql-prefix"]);
	$source[0] = $mysqli->query($query[0]);

	header("Content-type: text/csv");
	header("Content-Disposition: attachment; filename=file.csv");
	header("Pragma: no-cache");
	header("Expires: 0");

	while ($data[0] = $source[0]->fetch_object()) {
		print $data[0]->id . ", " . $data[0]->file . ", " . $data[0]->date . "\n";
	}
