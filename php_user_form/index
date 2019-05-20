<?php 

session_start();

if (!isset($_SESSION['mode'])) { 
    $_SESSION['mode'] = 'Add';
    $_SESSION['add'] = 0;
}
require_once './includes/db_operations.php';
require_once './includes/validate.php'; 
require_once './includes/saveUser.php'; 
require_once './includes/display.php'; 
?>

<!DOCTYPE html>
<html>
	<head>
        <title>User form</title>
	</head> 
	<body>
<?php   


if ($_SESSION['mode'] == 'Add') {
    switch ($_SESSION['add']) {
        case 0:
            formUser();
            break;

        case 1:
            if ((isset($_POST['next']))
                && ($_POST['next'] == 'Next')) {
                $err_msgs = validateUser();

                if (count($err_msgs) > 0) {
                    displayErrors($err_msgs);
                    formUser();
                } else {
                    userPostToSession();
                    forminfo();
                }
            } else {
                formUser();
            }
            break;

        case 2:
            if ((isset($_POST['save'])) 
                && ($_POST['save'] == 'Save')) {
                $err_msgs = validateinfo();

                if (count($err_msgs) > 0) {
                    displayErrors($err_msgs);  
                    forminfo();
                } else {
                    infoPostToSession();
                    $db_conn = dbconnect('localhost', 'demo', 'lamp1user', '!Lamp1!');
                    saveUser($db_conn);
                    dbdisconnect($db_conn);
                    summary();
                }
            } else {
                forminfo();
            }
        break;
    }
}
?>
	</body>
</html>

<?php
    function forminfo()
{
    $_SESSION['add'] = 2;
    $bio = '';                              
    if (isset($_POST['bio'])) { $bio = $_POST['bio']; }
    if (isset($_SESSION['bio'])) { $bio = $_SESSION['bio']; }
?>
    <form method="POST" enctype="multipart/form-data">
        <label for="bio">bio</label>
        <textarea name="bio" id="bio" cols="30" rows="10"><?= $bio ?></textarea>
        <p>Image</p>
        <input type="file" name="pic" accept="image/*"/>
        <input type="submit" name="save" value="Save">
    </form>
<?php
}

function formUser()
{
    $_SESSION['add'] = 1;
    $fullName = '';
    $age = '';

    if (isset($_POST['fullName'])) { $fullName = $_POST['fullName']; }
    if (isset($_SESSION['fullName'])) { $fullName = $_SESSION['fullName']; }
    if (isset($_POST['age'])) { $age = $_POST['age']; }
    if (isset($_SESSION['age'])) { $age = $_SESSION['age']; } ?>

    <form method="POST" >
        <label for="fullName">Full Name</label>
        <input type="text" name="fullName" id="fullName" size="50" maxlength="50" value="<?= $fullName ?>">
        <label for="age">Your Age</label>
        <input type="text" name="age" id="age" size="50" maxlength="3" value="<?= $age ?>">
        <input type="submit" name="next" value="Next">
    </form>
<?php  
}

function displayErrors($errs)
{
    echo "<h4> Containing errors</h4>\n";
    foreach ($errs as $err) {
        echo $err."\n";
    }
}
?>
