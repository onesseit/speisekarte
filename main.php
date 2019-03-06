<?php
include 'headpage.php';
?>
    <button id="test" onclick="myFunction1()">
        <img src="left2.png" style="width: 200px; height: 200px;position: absolute ;left: 0; margin-top: 15%" id="button">
    </button>

    <button id="test" onclick="myFunction2()">
        <img src="right.png" style="width: 200px; height: 200px;position: absolute ; right: 0; margin-top: 15%">
    </button>
<div class="main">


    <?php
    $servername = "5.189.128.204";
    $username = "speise";
    $password = "FA18B";
    $dbname = "speisekarte";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM kategorien";
    $kategorien = $conn->query($sql);



    while($row = $kategorien->fetch_assoc())
    {
        echo "<div id='kat". $row["id"]."'>";
        echo "<h1 style='text-align: center'>". $row["kategorie"]."</h1>";
            $sql = "SELECT name, beschreibung, small_preis, large_preis FROM produkte WHERE produkte.kategorie= '" . $row["id"] . "'";
            $result = $conn->query($sql);
            ?>
            <table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2" class="table">
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<tr data-href='test.php'>";
                    while($row = $result->fetch_assoc()) {
                        echo "<td class='element' style='width: 70%'><p style='margin: 0px; font-size: 20px'>" . $row["name"]. "</p><br><p style='margin: 0px; font-size: 12px;padding-top: 0px'>" . $row["beschreibung"]."</p></td><td>kleine Portion: " . $row["small_preis"]."<br><br>große Portion: " . $row["large_preis"]. "</td></tr>";
                    }
                }
                ?>
                </tbody></table>
        </div>
        <?php
    }
    ?>
</div>

<?php
include 'buttompage.php';
?>