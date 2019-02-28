<?php
include 'headpage.php';
?>
<div class="main">
    <?php
    $kat_counter=0;
    $kat_seite=0;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "speisekarte";

    //Kategorie anzeigen
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT kategorie FROM kategorien";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<tr data-href='test.php'>";
        while($row = $result->fetch_assoc()) {
        $kat_counter++;
        }
    }
    $conn->close();
    echo $kat_counter;


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, beschreibung, small_preis, large_preis FROM produkte";
    $result = $conn->query($sql);
    ?>
    <table style="text-align: left; width: 100%;" border="1" class="sortierbar"
           cellpadding="2" cellspacing="2">
        <thead>
        <tr>
            <th rowspan="2">Produkt</th>
            <th rowspan="2">Beschreibung</th>
            <th colspan="2" style="text-align: center">Preis</th>
        </tr>
        <tr>
            <th>kleine Portion</th>
            <th>große Portion</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<tr data-href='test.php'>";
            while($row = $result->fetch_assoc()) {
                echo "<td class='element'>" . $row["name"]. "</td><td>" . $row["beschreibung"]."</td><td>" . $row["small_preis"]."</td><td>" . $row["large_preis"]. "</td></tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
</div>


<?php
include 'buttompage.php';
?>