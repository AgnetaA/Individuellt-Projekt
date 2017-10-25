<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />

    <link type="text/css" rel="stylesheet" href="CSS2.css" />  


</head>

<body>

<?php



//anslut till databas
$db = mysqli_connect('localhost', 'root', '', 'minsida');
mysqli_query($db, "SET NAMES utf8");


//om inte går att ansluta
if (!$db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
//var_dump($db);

echo "<form method='post'>
        <input type='submit' value='Logga ut' name='logout'>
      </form><br />";


if ($_SESSION['indivAdmin'] == FALSE) {



//kolla om inloggad, sätt session
$anv = "SELECT anv FROM login WHERE anv = '$user' AND los = '$pass'";
$result = mysqli_query($db, $anv); 


if ($result->num_rows == 1) {
        $_SESSION['indivAdmin'] = TRUE;
    }
}

if (isset($_POST['logout']) ) {
	$_SESSION['indivAdmin'] = FALSE;
} 


//avsluta om inte inloggad eller har loggat ut
if (!isset($_SESSION['indivAdmin']) || $_SESSION['indivAdmin'] != TRUE) {
	echo "Inte inloggad!<br />";
	echo "<a href='index.html'>Till inloggning</a>";
	exit();
}



?>

<a href="CVadmin.php">CV admin</a>
<a href="meddelande.php">Meddelanden</a>


<h2>Välkomstsidan:</h2>

	<?php

		if(isset($_POST['update2'])){ 
        	$change = mysqli_real_escape_string($db, $_POST['rubrik1']);
   		 	$q = "UPDATE texter SET rubrik = '$change' WHERE id = 1;";
    		mysqli_query($db, $q);
    		}

    	if(isset($_POST['update3'])){ 
        	$change = mysqli_real_escape_string($db, $_POST['text1']);
   		 	$q = "UPDATE texter SET texten = '$change' WHERE id = 1;";
    		mysqli_query($db, $q);
    		}


 		$query = "SELECT * FROM texter WHERE ID = 1";
        $result = mysqli_query($db, $query);
        $text = mysqli_fetch_assoc($result);


    ?>

	<form method='post'>
		<input type='text' size='50%' name='rubrik1' value='<?php echo $text['rubrik']; ?>'/>
		<input type='submit' value='Ändra' name='update2'>
		<br />
		<textarea type='text' cols=50 rows=5 name='text1'><?php echo $text['texten']; ?></textarea>
		<input type='submit' value='Ändra' name='update3'>
	</form>


<h2>Om mig:</h2>

<?php

		if(isset($_POST['update4'])){ 
        	$change = mysqli_real_escape_string($db, $_POST['rubrik2']);
   		 	$q = "UPDATE texter SET rubrik = '$change' WHERE id = 2;";
    		mysqli_query($db, $q);
    		}

    	if(isset($_POST['update5'])){ 
        	$change = mysqli_real_escape_string($db, $_POST['text2']);
   		 	$q = "UPDATE texter SET texten = '$change' WHERE id = 2;";
    		mysqli_query($db, $q);
    		}


 		$query = "SELECT * FROM texter WHERE ID = 2";
        $result = mysqli_query($db, $query);
        $text = mysqli_fetch_assoc($result);


    ?>

	<form method='post'>
		<input type='text' size='50%' name='rubrik2' value='<?php echo $text['rubrik']; ?>'/>
		<input type='submit' value='Ändra' name='update4'>
		<br />
		<textarea type='text' cols=50 rows=5 name='text2'><?php echo $text['texten']; ?></textarea>
		<input type='submit' value='Ändra' name='update5'>
	</form>


	<br />
	<br />
	<br />

</body>
</html>