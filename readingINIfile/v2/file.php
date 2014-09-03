<?php
	$ini_array = parse_ini_file("./pt.ini");
?>
<div class="menuItens" style="float: right; ">
	<nav>
		<ul>
			<li> <a href="#homepage"> <?= $ini_array['home'] ?> </a> </li>
			<li> <a href="#quemsomos"> <?= $ini_array['quemsomos'] ?> </a> </li>
			<li> <a href="#contacto"> <?= $ini_array['contactos'] ?> </a> </li>
		</ul>
	</nav>
</div>
