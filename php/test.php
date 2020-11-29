//wala lang to wag nio na pansinin, pinang testing ko lang kung gagana ung naisip ko kung paano kunin image mula sa database 
//gumana naman hahahahahaha

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "swap_information";

    $conn = new mysqli($servername, $username, $password, $database);

    $result = $conn->query("SELECT id_pic FROM user_information WHERE username = 'gamer123'");
    $row = $result->fetch_assoc();

    echo "<img src= $row[id_pic]>";
?>