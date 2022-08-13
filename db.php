<?php

    $con = mysqli_connect("remotemysql.com", "Ptf9qvbbu0", "BDWl3BErKt", "Ptf9qvbbu0", "3306");       
        
    if(isset($_GET['data'])) {
        $dataa = $_GET['data'];
        $stmt = $con->prepare("INSERT INTO Moves (ID, Move) VALUES (NULL, ?)");
        $stmt->bind_param("s",$dataa);
        $stmt->execute();
    }
        
    $stmt = $con->prepare("SELECT * FROM Moves ORDER BY ID DESC LIMIT 1");
    $stmt->execute();
        
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $res = $row['Move'];
        echo "<p style= \"font-size: 8rem; text-align: center; line-height: 100px; margin: 0; position: relative; top: 50%; transform: translate(0, -50%)\">";
        echo "{$res}";
        echo "</p>";
    };

?>