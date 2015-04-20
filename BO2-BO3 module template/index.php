<?php

$cfg->module = new stdClass();
$cfg->module->name = "base for modules";
$cfg->module->folder = "base_for_modules";

switch ($a) {
	case "choice":
		include "modules/orders/answer.php";
		break;
	default:
		include "modules/orders/list.php";
}
