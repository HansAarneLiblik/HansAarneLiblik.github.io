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
		<table id="menu">
			<tr>
				<td id="logo" rowspan="2">
					<div id="header" class="menuItem">
						<a href="index.php">KoodiÄmber</a>
					</div>
				</td>
				<td id="lingid" rowspan="2">
					<div class="menuItem">
						<a href="?p=amber">Minu ämber</a>
					</div>
				</td>
				<td id="lingid" rowspan="2">
					<div class="menuItem">
						<a href="?p=profiil">Minu profiil</a>
					</div>
				</td>
				<td id="lingid" rowspan="2">
					<div class="menuItem">
						<a href="?p=seaded">Seaded</a>
					</div>
				</td>
				<td id="welcome">
					<div class="menuItem">
						  Tere &laquo eesnimi &raquo !
					</div>
				</td>
				<td id="search">
					<div class="menuItem">
						<form  action="/" method="post">
								<input type="text" id="searchBox" onFocus="if(this.value==' Otsing..')this.value='';" value=" Otsing..."/>
								<input type="button" value="Otsi"/>
						</form>
					</div>
				</td>
			</tr>
			<tr>
				<td></td>
				<td id="logout">
					<div class="menuItem">
						<input type="button" value="Logi välja"/>
					</div>
				</td>
		</table>
		
		<br/><br/><br/>
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
