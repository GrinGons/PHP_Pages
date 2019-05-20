<?php 

function validateInfo() 
{
    $err_msgs = [];

    if (!isset($_POST['info'])) {
        $err_msgs[] = 'Info must be specified.';
    } else {
        $info = trim($_POST['info']);
        if (strlen($info) == 0) {
            $err_msgs[] = 'Info must be specified';
        } elseif (strlen($info) > 65535) {
            $err_msgs[] = 'Info must be no longer than 65535 characters in length.';
        }
    }
 
    if (count($err_msgs) == 0) {
        $_POST['info'] = $info;
    }

    
    $acceptedExt = ['jpg', 'bmp', 'png'];
    $isValid = true;

    if ($_FILES['pic']['error'] == 0 && $_FILES['pic']['size'] > 0) {
        $ext = strtolower(pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION));

        if (!file_exists($_FILES['pic']['tmp_name'])) {
            $err_msgs[] = "The file doesn't exist! ";
            $isValid = false;
        } elseif (!in_array($ext, $acceptedExt)) {
            $err_msgs[] = "That file type isn't accepted!";
            $isValid = false;
        }
    } else {
        $err_msgs[] = 'Upload failed.';
        $isValid = false;
    }

    if ($isValid) {
        chmod($_FILES['pic']['tmp_name'], 0777);
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777);
        }
        $fn = $_FILES['pic']['name'];
        $newName = "uploads/$fn." . rand(10000, 99999) . '.' . $ext;
        $success = move_uploaded_file($_FILES['pic']['tmp_name'], $newName);

        if ($success) {

            $_SESSION['store_file_name'] = $newName;
        } else {
            $err_msgs[] = 'Upload failed.';
        }
    }
    return $err_msgs;
}

function infoPostToSession()
{
    $_SESSION['info'] = $_POST['info'];
    $_SESSION['file_name'] = $_FILES['pic']['name'];
    $_SESSION['filesize'] = $_FILES['pic']['size'];
    $_SESSION['file_type'] = $_FILES['pic']['type'];
}




function validateUser()
{
    $err_msgs = [];
    if (!isset($_POST['fullName'])) {
        $err_msgs[] = 'A name must be specified';
    } else {
        $fullName = trim($_POST['fullName']);
        if (strlen($fullName) == 0) {
            $err_msgs[] = 'A name must be specified';
        } elseif (strlen($fullName) > 100) {
            $err_msgs[] = 'The full name must be no longer than 100 characters in length.';
        }
    }
    if (count($err_msgs) == 0) {
        $_POST['fullName'] = $fullName; 
    }

    if (!isset($_POST['age'])) {
        $err_msgs[] = 'An age must be specified';
    } else {
        $age = trim($_POST['age']);
        if (strlen($age) == 0) {
            $err_msgs[] = 'An age must be specified';
        } elseif (!is_numeric($age)) {
            $err_msgs[] = 'An age must be numbers.';
        } elseif (strlen($age) > 3) {
            $err_msgs[] = 'An age must be no longer than 999.';
        }
    }

    if (count($err_msgs) == 0) {
        $_POST['age'] = $age;
    }
    return $err_msgs;
}

function userPostToSession()
{
    $_SESSION['fullName'] = $_POST['fullName'];
    $_SESSION['age'] = $_POST['age'];
}
?>
