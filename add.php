<?php
include 'headpage.php';

$servername = "5.189.128.204";
$username = "speise";
$password = "FA18B";
$dbname = "speisekarte";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM kategorien";
$kategorien = $conn->query($sql);
?>
<div style="text-align: center; vertical-align: middle; background-color: lightblue; margin-left: 30%;margin-right: 30%">
<h1>Insert Form</h1>
    <div class="fehler">
    <?php
    if(isset($_POST['save']))if($_POST["Kategorie"]==""||$_POST["GerichtName"]==""||$_POST["GerichtDesc"]==""||($_POST["smallPreis"]==""&&$_POST["largePreis"]==""))
    {
        $ErrorMessage="";
        if($_POST["Kategorie"]=="")
        {
            $ErrorMessage=$ErrorMessage."Kategorie auswählen!<br>";
        }
        if($_POST["GerichtName"]=="")
        {
            $ErrorMessage=$ErrorMessage."Essen benötigt einen Namen!<br>";
        }
        if($_POST["GerichtDesc"]=="")
        {
            $ErrorMessage=$ErrorMessage."Beschreiben sie das Essen!<br>";
        }
        if($_POST["smallPreis"]==""&&$_POST["smallPreis"]=="")
        {
            $ErrorMessage=$ErrorMessage."Bitte mindestens einen Preis angeben!<br>";
        }
    }
    echo $ErrorMessage; ?>
    </div>
        <form method="post">
        <br></br>Kategorie: <select name="Kategorie">
            <option value="">Kategorie wählen</option>
            <?php while ($row = $kategorien->fetch_assoc()) { ?>
                <option value="<?php echo $row["id"] ?>"><?php echo $row["kategorie"] ?></option>
                <?php } ?>
        </select>
        <br></br>Gericht: <input type="text" name="GerichtName">
        <p>Beschreibung: </p><textarea name="GerichtDesc" style="width: 300px; height: 100px"></textarea>
        <br><br>kleiner Preis:<input type="text" name="smallPreis">
        <br><br>großer Preis:<input type="text" name="largePreis">
        <br><input type="submit" name="save">
    </form>
</div>
<?php
if($_POST["Kategorie"]!=""&&$_POST["GerichtName"]!=""&&$_POST["GerichtDesc"]!=""&&($_POST["smallPreis"]!=""||$_POST["largePreis"]!=""))
{
    if(isset($_POST['save'])){
        $sql = "INSERT INTO produkte (name, beschreibung, kategorie, small_preis, large_preis) VALUES ('".$_POST["GerichtName"]."','".$_POST["GerichtDesc"]."','".$_POST["Kategorie"]."','".$_POST["smallPreis"]."','".$_POST["largePreis"]."')";
        $result = mysqli_query($conn,$sql);
    }
}
