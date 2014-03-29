<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
    session_start();
?>

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
                            <li><a id=\"minu_amber\" href=\"#minu_amber\" title=\"Minu Ämber\">Minu Ämber</a></li>
                            <li><a id=\"profiil\" href=\"#profiil\" title=\"Profiil\">Profiil</a></li>
                            <li id=\"seaded\"><a href=\"#seaded\" title=\"Seaded\">Seaded</a></li>
                        </ul>";	
            } else {
                $welcome = "Pole sisse logitud.";
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
                                <input type="text" id="searchBox" value="Otsing..." />
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
                                    <a id=\"loginLink\" class=\"lingid2\" href=\"#login\">Logi sisse</a> või
                                    <a id=\"registerLink\" class=\"lingid2\" href=\"#register\">Registreeru</a>
                                </div>
                            ";
                        } else {
                            echo "
                                <div class=\"menuItem\">
                                    <a id=\"logoutLink\" class=\"lingid2\" href=\"logout.php\">Logi välja</a>
                                </div>
                            ";
                        }
                    ?>
                </td>

            </tr>
        </table>


        <div id="content">
            <?php
                if (isset($_SESSION['notice'])) {
                    echo $_SESSION['notice'];
                    unset($_SESSION['notice']);
                }
            ?>

        </div>
    </body>
</html>
