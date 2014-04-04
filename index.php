<?php
    session_start();
?>
<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
   "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" type="text/css" href="css/StyleSheet.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>Koodi Ämber</title>
        <?php
            if (isset($_SESSION['user'])) {
                $welcome = "Tere, ".$_SESSION['user']."!";
                $menu = "<ul>
                            <li id=\"minu_amber\" class=\"left\"><a href=\"#minu_amber\" title=\"Minu Ämber\">Minu Ämber</a></li>
                            <li id=\"minu_profiil\" class=\"left\"><a href=\"#minu_profiil\" title=\"Profiil\">Profiil</a></li>
                            <li id=\"minu_seaded\" class=\"left\"><a href=\"#minu_seaded\" title=\"Seaded\">Seaded</a></li>
                        </ul>";	
            } else {
                $welcome = "";
                $menu = "";                
            }
            
        ?>
    </head>
    <body>
        <table id="menu">
            <tr>
                <td id="logo" rowspan="2">
                    <div id="header" class="menuItem">
                        <a href="#">KoodiÄmber</a>
                    </div>
                </td>
                <td rowspan="2">
                    <div class="menuItem">
                        <?php
                            echo $menu;
                        ?>
                    </div>
                </td>

                <td id="welcome">
                    <div class="menuItem">
                        <?php
                            echo $welcome;
                        ?>
                    </div>
                </td>
                <td id="search">
                    <div class="menuItem">
                        <form action="index.php" method="post">
                            <div>
                                <input type="text" id="searchBox" />
                                <input type="submit" value="Otsi" />
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>

                <td id="logout">
                    <?php
                        if (!isset($_SESSION['user'])) {
                            echo "
                                <div class=\"menuItem\">
                                    <a id=\"loginLink\" class=\"lingid\" href=\"#login\">Logi sisse</a> või
                                    <a id=\"registerLink\" class=\"lingid\" href=\"#register\">Registreeru</a>
                                </div>
                            ";
                        } else {
                            echo "
                                <div class=\"menuItem\">
                                    <a id=\"logoutLink\" class=\"lingid\" href=\"logout.php\">Logi välja</a>
                                </div>
                            ";
                        }
                    ?>
                </td>

            </tr>
        </table>

        <div id="content">
            <div class="left-content left">
            </div>
            <div class="right-content right">
				<h3>Uued koodid</h3>
				<table class="newCodesTable">
					<?php
						$dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
						$query = "SELECT codes.id, codes.name, users2.firstname, users2.username FROM codes INNER JOIN users2 ON codes.author_id=users2.id WHERE codes.privacy=FALSE ORDER BY codes.time_stamp DESC LIMIT 10";
						$result = pg_query($query);
						$i = 1;
						while($val = pg_fetch_row($result)){
							echo "<tr><td>$i. </td><td><a href=\"#vaade.php?id=$val[0]\" class=\"uuedKoodid\">$val[1]</a></td></tr>";
							echo "<tr>";
							if($val[2]==""){
								echo "<td></td><td class=\"authorName\">- $val[3]</td>";
							} else {
								echo "<td></td><td class=\"authorName\">- $val[2]</td>";
							}
							echo "</tr>";
							$i = $i + 1;
						}
						pg_close($dbconn);
					?>
				</table>
            </div>
        </div>
    </body>
</html>
