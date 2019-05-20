<?php 

function saveUser($db_conn){

    $stmt = $db_conn->prepare('INSERT INTO lab5 (person_name, person_age, person_dio, file_name, store_file_name, filesize, file_type) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sisssis', $person_name, $person_age, $person_dio, $file_name, $store_file_name, $filesize, $file_type);

    $person_name = $_SESSION['fullName'];
    $person_age = (int)$_SESSION['age'];
    $person_bio = $_SESSION['bio'];
    $file_name = $_SESSION['file_name'];
    $store_file_name = $_SESSION['store_file_name'];
    $filesize = (int)$_SESSION['filesize'];
    $file_type = $_SESSION['file_type'];

    $stmt->execute();
    $stmt->close();
}


?>
