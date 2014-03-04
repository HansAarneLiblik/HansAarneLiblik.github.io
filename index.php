<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"
>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/StyleSheet.css"/>
		<title>Koodi Ämber</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<div class="header">
			<a href="index.php">KoodiÄmber</a>
		</div>
		<div class="search" >
			<form  action="/" method="post">
				<p>
					<input type="text" id="search"/>
					<input type="button" title="otsi" value="Otsi"/>
				</p>
			</form>
		</div>
		<div class="menubar">
			<ul>
				<li>
					<a href="index.php?p=amber">Minu ämber</a>
				</li>
				<li>
					<a href="index.php?p=profiil">Minu profiil</a>
				</li>
				<li>
					<a href="index.php?p=seaded">Seaded</a>
				</li>
			</ul>
		</div>

		<?php
		/*
		if ($_GET['p']) {
			switch ($_GET['p']) {
				case "amber" :
					include "minu_amber.html";
					break;
				case "profiil" :
					include "minu_profiil.html";
					break;
				case "seaded" :
					include "seaded.html";
					break;

				default :
					include 'minu_amber.html';
			}
		} else {
			include 'minu_amber.html';
		}
		 
		 */
		?>
	</body>
</html>
