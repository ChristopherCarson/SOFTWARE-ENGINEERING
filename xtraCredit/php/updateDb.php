<?php
    include'dbConnection.php';
    
        $conn = getDatabaseConnection();
        
        $sql="insert into cities_searched (city) values ('".$_POST['city']."')";
        $statement = $conn->prepare($sql);
        $statement->execute();  
        
        $sql="select city, count(city) as times from cities_searched group by city";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($records);
?>