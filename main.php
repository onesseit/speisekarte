<?php
include 'headpage.php';
?>
    <?php
    $servername = "5.189.128.204";
    $username = "speise";
    $password = "FA18B";
    $dbname = "speisekarte";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM kategorien";
    $kategorien = $conn->query($sql);

?>
    <div id="slider" class="swipe">
        <div class="swipe-wrap">

        <?php

            while($row = $kategorien->fetch_assoc())
                {
                echo "<div id='kat". $row["id"]."'>";
                echo "<h1 style='text-align: center'>". $row["kategorie"]."</h1>";
                    $sql = "SELECT name, beschreibung, small_preis, large_preis FROM produkte WHERE produkte.kategorie= '" . $row["id"] . "'";
                    $result = $conn->query($sql);
                    ?>
                    <table style="text-align: left; width: 100%;"class="table">
                        <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            echo "<tr data-href='test.php' class=\"table\">";
                            while($row = $result->fetch_assoc()) {
                                echo "<td id='element' style='width: 60%' class=\"table\"><p style='margin: 0px; font-size: 20px'>" . $row["name"]. "</p><br><p style='margin: 0px; font-size: 12px;padding-top: 0px'>" . $row["beschreibung"]."</p></td><td class=\"table\">kleine Portion: " . $row["small_preis"]."<br><br>große Portion: " . $row["large_preis"]. "</td></tr>";
                            }
                        }
                        ?></table>
                </div>
                <?php
                }
        ?>
        </div>
    </div>
<?php
include 'buttompage.php';
?>
<script>
    var element = document.getElementById('slider');
    window.mySwipe = new Swipe(element, {
        startSlide: 0,
        draggable: true,
        autoRestart: false,
        continuous: true,
        disableScroll: true,
        stopPropagation: true,
        callback: function(index, element) {},
        transitionEnd: function(index, element) {}
    });
</script>
<script>window.mySwipe = new Swipe(document.getElementById('ultimate'));</script>

