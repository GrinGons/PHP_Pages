<?php 

function displayInfo($db_conn)
{
    $result = $db_conn->query('SELECT * FROM lab5');
    ?>
    <h3>Display Info</h3>
    <table id='survey-table'>
        <tr>
            <th>name</th> <th>age</th> <th>bio</th> <th>picture</th>
        </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr><td>'; 
            echo $row['person_name'] . '</td><td>';
            echo $row['person_age'] . '</td><td>';
            echo $row['person_bio'] . '</td><td>';
            echo '<img src="' . $row['store_file_name'] . '" alt="Info image" width="400" height="400">' . '</td></tr>';
        }
    } 
    echo '</table>';
}

function summary() {
    echo 'Data saved successfully' . '<br>';
    echo 'name ' . $_SESSION['fullName'] . '<br>';
    echo 'age ' . $_SESSION['age'] . '<br>';
    echo 'bio ' . $_SESSION['bio'] . '<br>';
    echo 'file name ' . $_SESSION['file_name'] . '<br>';
    echo 'store file name ' . $_SESSION['store_file_name'] . '<br>';
    echo 'filesize ' . $_SESSION['filesize'] . '<br>';
    echo 'file type ' . $_SESSION['file_type'] . '<br>';
}
?>
