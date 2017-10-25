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

//inlogg
$user = mysqli_real_escape_string($db, $_POST['user']);
$pass = mysqli_real_escape_string($db, $_POST['password']);

$anv = "SELECT anv FROM login WHERE anv = '$user' AND los = '$pass'";
$result = mysqli_query($db, $anv); 



//kolla om inloggad, sätt session
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
<a href="textadmin.php">Texter</a>

<br />
<br />
<br />

<div class="messouter">
<h2>Meddelanden</h2>

<?php

	


    $query = "SELECT * FROM meddelanden ORDER BY id DESC";
    $result = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($result)){

    echo '<div class="messbox">';
  
    //echo $row['id'].'<br />';

   
 	echo $row['namn'].'<br />';
    echo $row['email'].'<br />';
    echo $row['meddelande'];
    echo "<form method='post' action=''>
          <input type='hidden' name='id' value='{$row['id']}'>
          <input type='submit' name='removemsg' value='Ta bort'>
          </form>";

 	if(isset($_POST['id'])) {
	
    	$idt = $_POST['id'];
    	//echo $idt;

		$remove = "DELETE FROM meddelanden WHERE id = $idt";   
		
		mysqli_query($db, $remove);	
	
    }

    echo '</div>';

    echo '<br />';

    }




?>
</div>

</body>
</html>