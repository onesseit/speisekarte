<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Titel der Seite | Name der Website</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="swipe/swipe.js"></script>

    <script>
        var test=0;
        function myFunction1() {
            hide()
            if (test==0)
                test=3
            else
                test=test-1
            unHide()

        }
        function myFunction2() {
            hide()
            if (test==3)
                test=0
            else
                test=test+1
            unHide()
        }
        function unHide() {
            document.getElementById("kat"+test).style.display = "block";
        }
        function hide() {
            document.getElementById("kat"+test).style.display = "none";
        }
    </script>


</head>
<body>
