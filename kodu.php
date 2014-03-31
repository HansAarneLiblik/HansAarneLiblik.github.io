<?php
    session_start();
    if (isset($_SESSION['id'])) {
        $option = "<option value=\"P\">Privaatne</option>";
    } else {
        $option = "";
    
    }
?>
<div id="koodiKast">
    <form id="submitCode" action="submitCode.php" method="post" accept-charset="UTF-8">
        <input type="text" name="codeName" id="_codeName" value="Nimetu" />
        <p><textarea id="codeBox" name="koodiLahter"></textarea></p>
        <table>
            <tr>
                <td>Koodi säilimine:</td>
                <td>
                    <select id="expiration" name="expiration">
                        <option value="1d">1 päev</option>
                        <option value="2d">2 päeva</option>
                        <option value="5d">5 päeva</option>
                        <option value="1w">1 nädal</option>
                        <option value="2w">2 nädalat</option>
                        <option value="1m">1 kuu</option>
                        <option value="perm">Igavesti</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Privaatsus:</td>
                <td>
                    <select id="privacy" name="privacy">
                        <option value="A">Avalik      </option>                        
                        <?php
                            echo $option;
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" name="Submit" value="Salvesta" />
    </form>
</div>