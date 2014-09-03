<?php
	$ini_array = parse_ini_file("./pt.ini", true);
?>
<div class="menuItens" style="float: right; ">
	<nav>
		<ul>
			<li> <a href="#homepage"> <?= $ini_array['menu']['home'] ?> </a> </li>
			<li> <a href="#quemsomos"> <?= $ini_array['menu']['quemsomos'] ?> </a> </li>
			<li> <a href="#contacto"> <?= $ini_array['menu']['contactos'] ?> </a> </li>
		</ul>
	</nav>
</div>
