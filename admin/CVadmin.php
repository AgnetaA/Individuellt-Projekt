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

<a href="meddelande.php">Meddelanden</a>
<a href="textadmin.php">Texter</a>



<h2>Utbildning</h2>

<?php

    $query3 = "SELECT * FROM cv_utbildning ORDER BY id ASC";
    $result3 = mysqli_query($db, $query3);

    $id = 1;

    while($row = mysqli_fetch_assoc($result3)){


        if(isset($_POST['update'.$id])){ 

        
            $change1 = $_POST['rubrik'];
            $q1 = "UPDATE cv_utbildning SET rubrik = '$change1' WHERE id = $id";
            mysqli_query($db, $q1);

            $change2 = $_POST['info'];
            $q2 = "UPDATE cv_utbildning SET info = '$change2' WHERE id = $id;";
            mysqli_query($db, $q2);
        }


        $query2 = "SELECT * FROM cv_utbildning WHERE id = $id";
        $result2 = mysqli_query($db, $query2);
        $text = mysqli_fetch_assoc($result2);

    


        echo
        "<form method='post'>
        <input type='text' style='width: 30%' name='rubrik' value='{$text['rubrik']}' /><br />
        <textarea type='text' cols=50 rows=5 name='info'>{$text['info']}</textarea>
        <input type='submit' value='Ändra' name='update{$id}'>
        </form>";

        $id++;

    }

        echo "<p>Lägg till en utbildning:</p>";

        if(isset($_POST['add1'])){ 

        
            $head1 = $_POST['rubrik1'];
            $info1 = $_POST['info1'];
            $q3 = "INSERT INTO cv_utbildning (rubrik, info) VALUES ('$head1', '$info1')";
            mysqli_query($db, $q3);

            
        }


        echo 
        "<form method='post'>
        <input type='text' style='width: 30%' name='rubrik1' /><br />
        <textarea type='text' cols=50 rows=5 name='info1'></textarea>
        <input type='submit' value='Lägg till' name='add1'>
        </form>";

?>

<h2>Arbete</h2>


<?php

    $query4 = "SELECT * FROM cv_arbete ORDER BY id ASC";
    $result4 = mysqli_query($db, $query4);

    $id2 = 1;

    while($row = mysqli_fetch_assoc($result4)){


        if(isset($_POST['uppydaty'.$id2])){ 

        
            $change3 = $_POST['rubrik'];
            $q4 = "UPDATE cv_arbete SET rubrik = '$change3' WHERE id = $id2";
            mysqli_query($db, $q4);

            $change4 = $_POST['info'];
            $q5 = "UPDATE cv_arbete SET info = '$change4' WHERE id = $id2;";
            mysqli_query($db, $q5);
        }


        $query5 = "SELECT * FROM cv_arbete WHERE id = $id2";
        $result5 = mysqli_query($db, $query5);
        $text2 = mysqli_fetch_assoc($result5);

    


        echo
        "<form method='post'>
        <input type='text' style='width: 30%' name='rubrik' value='{$text2['rubrik']}' /><br />
        <textarea type='text' cols=50 rows=5 name='info'>{$text2['info']}</textarea>
        <input type='submit' value='Ändra' name='uppydaty{$id2}'>
        </form>";

        $id2++;

    }

        echo "<p>Lägg till ett arbete:</p>";

        if(isset($_POST['add2'])){ 

        
            $head2 = $_POST['rubrik2'];
            $info2 = $_POST['info2'];
            $q6 = "INSERT INTO cv_arbete (rubrik, info) VALUES ('$head2', '$info2')";
            mysqli_query($db, $q6);

            
        }


        echo 
        "<form method='post'>
        <input type='text' style='width: 30%' name='rubrik2' /><br />
        <textarea type='text' cols=50 rows=5 name='info2'></textarea>
        <input type='submit' value='Lägg till' name='add2'>
        </form>";

?>




<h2>Datorkunskaper</h2>

	<?php

	if(isset($_POST['update01'])){ 
        $change = $_POST['other'];
    $q = "UPDATE cv_annat SET info = '$change' WHERE id = 1;";
    mysqli_query($db, $q);
    }


        $query = "SELECT * FROM cv_annat WHERE ID = 1";
        $result = mysqli_query($db, $query);
        $text = mysqli_fetch_assoc($result);
        ?>


	    <form method='post'>
		<textarea type='text' cols=50 rows=5 name='other'><?php echo $text['info']; ?></textarea>
		<input type='submit' value='Ändra' name='update01'>
		</form>


	
<br />
<br />

</body>
</html>