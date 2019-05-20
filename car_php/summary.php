<?php

function summary(){ 
	$_SESSION['add'] = 3;
?>
	<form method="POST">
		<input type="submit" name="back" value="Back">
	</form>
	<table>

<?php foreach ($_SESSION['carName'] as $carN) { //to make multiple param
		$carY='year_'.$carN;
		$carC='colr_'.$carN;

		echo '<tr><td>'.$carN.'</td><td>';
		echo $_SESSION[$carY].'</td><td>';
		echo $_SESSION[$carC].'</td><td><tr>';
		echo '<br><br>';
                
	} ?>
	</table>
<?php 
}
