<?php

session_start();
	if(!isset($_SESSION['add'])){
		$_SESSION['mode'] = 'Car';
		$_SESSION['add'] = 0;
	}

    $errs=[];
	require_once 'db.php';
	require_once 'displayErrors.php';
	require_once 'saveData.php';
	require_once 'summary.php';
	require_once 'formCar.php';

?>

<html>
	<head><title>Car Multi Radio</title></head>
<body>

<?php
	if(($_SESSION['mode'])=='Car'){

	switch ($_SESSION['add']) {

		case 0:
			form1F();
			$_SESSION['add'] = 1;
			break;

		case 1:
			if ((isset($_POST['next'])) && ($_POST['next'] == 'Next')) {
				$errs = validF1();
				if(count($errs)>0){
					displayErrors($errs);
					form1F();
				} else {
					f1Tsess();
					form2F();
				}
			} else {
				form1F();
			}
			break;

		case 2:

			if ((isset($_POST['next'])) && ($_POST['next'] == 'Next')) {
				$errs = validF2();
					if(count($errs)>0){
						displayErrors($errs);
					} else {

                    f2Tsess();
                                    //function dbconnect($host, $db, $user, $pw)
					$db_conn = dbconnect('localhost', 'php_car', 'kunho', 'lamp2!@#G');
					SaveData($db_conn);
					dbdisconnect($db_conn);
					summary();
				} 
			} else if ((isset($_POST['back'])) && ($_POST['back'] == 'Back')) {
				f2Tsess();
				form1F();
			} else {
				form2F();
			}
			break;

		case 3:
			if ((isset($_POST['back'])) && ($_POST['back'] == 'Back')) {
				form2F();
			} else {
				summary();
			}
			break;

	} 
}
?>
</body>
</html>
