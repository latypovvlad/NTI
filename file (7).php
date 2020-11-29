<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<div class="main">
    <div class="top2">
        <p class="title">ВАМ ПРЕДЛОЖЕНЫ СЛЕДУЮЩИЕ ВАРИАНТЫ ПРИЛОЖЕНИЙ</p>
        <div class="button2">
            <a href="site.html" class="back">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="icon2"><path fill="currentColor" d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z" class=""></path></svg>
            </a>
        </div>
    </div>
    <div class="bottom">
<?php
$link = mysqli_connect("localhost", "id15492176_play", "010720059!++!Vl", "id15492176_playmarket");

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
switch ($_POST["sapp"]) {
    case 1:
        $table = "Video";
        break;
    
    case 2:
        $table = "Audio";
        break;
    case 3:
        $table = "Video";
        break;
}
$q = "SELECT * FROM $table WHERE 1";
if ($_POST["one"] != "on") {
    $q = $q." and ColorCorrection=1";
}
//echo ('<form method="post" action="maps.php">');
if ($result = mysqli_query($link, $q)) {
while ($row = mysqli_fetch_assoc($result)) {
        /*printf ("%s (%s)\n", $row["Name"], $row["Name2"]);*/
       echo('<div class="app">');
            echo ('<a href="maps.php?table='.$table.'&id='.$row["ID"].'">');  // Егору
                    echo('<div class="inline">');
                       echo('<img class="applogo" src="'.$row["LinkPhoto"].'">');
                    echo("</div>");
                    echo('<div class="inline">');
                        echo('<p class="apptitle">');
                            echo($row["Name"]);
                        echo("</p>");
                        echo('<p class="appsubtitle">');
                            echo($row["Texts"]);
                        echo("</p>");
                    echo("</div>");

            echo ('</a>');
                echo("</div>");
          //      echo('<input type="hidden" name="id" value="'.$row["ID"].'">');
            //    echo('<input type="hidden" name="table" value="'.$table.'">');
              //  echo('<input type="submit"');
    }
    mysqli_free_result($result);
}
mysqli_close($link);
?>
    </div>
</div>
</body>
</html>