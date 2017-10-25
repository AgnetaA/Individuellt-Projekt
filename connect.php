

                //anslut till databas
    $db = mysqli_connect('localhost', 'root', '', 'minsida');
    mysqli_query($db, "SET NAMES utf8");


                //om inte går att ansluta
    if (!$db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }

