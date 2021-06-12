<?php
 $imie = $_POST['imie'];
 $nazwisko = $_POST['nazwisko'];
 $plec = $_POST['wybranaPlec'];
 $telefon = $_POST['telefon'];
 $ulica = $_POST['ulica'];
 $dom = $_POST['dom'];
 $lokal = $_POST['lokal'];
 $data = $_POST['data'];
 $godzina = $_POST['wybranaGodzina'];

 //database connection
  $servername = "localhost";
  $username = "natalia";
  $password = "natalia";
  $db = "bazatestowa";

 $conn = new mysqli($servername, $username, $password, $db);
  if ($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
    } else{$stmt = $conn->prepare("insert into rejestracja (imie, nazwisko, plec, telefon, ulica, dom, lokal, data, godzina) 
        values(?,?,?,?,?,?,?,?,?)");
    
        $stmt->bind_param("sssisssss",$imie, $nazwisko, $plec, $telefon, $ulica, $dom, $lokal, $data, $godzina);
        $stmt->execute();
        echo "Pomyślnie zarezerwowano wizytę";
        $stmt->close();
        $conn->close();
    }

?>