<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"
>
	<head>
		<link rel="stylesheet" type="text/css" href="css/StyleSheet.css"/>
		<title>Koodi Ämber</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<table>
			<tr>
				<td>
			<div id="header" class="menuItem">
				<a href="index.php">KoodiÄmber</a>
			</div>
			</td>
			<td>
			<div id="lingid" class="menuItem">
				<ul>
					<li>
						<a href="?p=amber">Minu ämber</a>
					</li>
					<li>
						<a href="?p=profiil">Minu profiil</a>
					</li>
					<li>
						<a href="?p=seaded">Seaded</a>
					</li>
				</ul>
			</div>
			</td>
			<td>
			<div id="search" class="menuItem">
				<form  action="/" method="post">
					<p>
						<input type="text" id="searchBox"/>
						<input type="button" title="searchButton" value="Otsi"/>
					</p>
				</form>
			</div>
			</td>
		</tr>
		</table>
		
		
		<?php
		
		if (isset($_GET['p'])) {
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
		 
		
		?>
	</body>
</html>
