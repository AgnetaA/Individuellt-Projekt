<!DOCTYPE html>
<html lang="sv">
<head>
    <title>Agnetas krypin</title>
    <meta charset="utf-8" />

    <link type="text/css" rel="stylesheet" href="CSS3.css" />

    <script
              src="https://code.jquery.com/jquery-3.1.1.min.js"
              integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
              crossorigin="anonymous">
    </script>

        

</head>

<?php

//anslut till databas
                $db = mysqli_connect('localhost', 'root', '', 'minsida');
            
                mysqli_query($db, "SET NAMES utf8");


                //om inte går att ansluta
                if (!$db) {
                    die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
                }


$ladda = isset($_GET['load']) ? ($_GET['load']): '';  


if ($ladda == "hem") {
    echo '<body id="bakgrund1">';
}

else if ($ladda == "CV") {
    echo '<body id="bakgrund2">';
}

else if ($ladda == "annat") {
    echo '<body id="bakgrund3">';
}

else if ($ladda == "portfolio") {
    echo '<body id="bakgrund4">';
}

else {
    echo '<body id="bakgrund1">';
}

?>

    <div id="wrapall">

        <header id="header">

            <div id="sitename">
                <h1 id="sitetitle"><a id="siteTitleLink" href="?load=hem">Agnetas krypin &nbsp; &#9749;</a></h1>
            </div>

            <nav id="menubox">
                <ul id="menu">
                    <?php

                    $ladda = isset($_GET['load']) ? ($_GET['load']): '';  


                    if ($ladda == "hem") {
                        echo '<li class="menulist"><a id="menyHem" class="menulink active1" href="?load=hem">Hem</a></li>
                            <li class="menulist"><a id="menyCV" class="menulink" href="?load=CV">CV</a></li>
                            <li class="menulist"><a id="menyPortfolio" class="menulink" href="?load=portfolio">Portfolio</a></li>
                            <li class="menulist"><a id="menyAnnat" class="menulink" href="?load=annat">Annat</a></li>';
                    }

                    else if ($ladda == "CV") {
                        echo '<li class="menulist"><a id="menyHem" class="menulink" href="?load=hem">Hem</a></li>
                            <li class="menulist"><a id="menyCV" class="menulink active2" href="?load=CV">CV</a></li>
                            <li class="menulist"><a id="menyPortfolio" class="menulink" href="?load=portfolio">Portfolio</a></li>
                            <li class="menulist"><a id="menyAnnat" class="menulink" href="?load=annat">Annat</a></li>';
                    }

                    else if ($ladda == "annat") {
                        echo '<li class="menulist"><a id="menyHem" class="menulink" href="?load=hem">Hem</a></li>
                            <li class="menulist"><a id="menyCV" class="menulink" href="?load=CV">CV</a></li>
                            <li class="menulist"><a id="menyPortfolio" class="menulink" href="?load=portfolio">Portfolio</a></li>
                            <li class="menulist"><a id="menyAnnat" class="menulink active3" href="?load=annat">Annat</a></li>';
                    }

                    else if ($ladda == "portfolio") {
                        echo '<li class="menulist"><a id="menyHem" class="menulink" href="?load=hem">Hem</a></li>
                            <li class="menulist"><a id="menyCV" class="menulink" href="?load=CV">CV</a></li>
                            <li class="menulist"><a id="menyPortfolio" class="menulink active4" href="?load=portfolio">Portfolio</a></li>
                            <li class="menulist"><a id="menyAnnat" class="menulink" href="?load=annat">Annat</a></li>';
                    }

                    else {
                        echo '<li class="menulist"><a id="menyHem" class="menulink" href="?load=hem">Hem</a></li>
                            <li class="menulist"><a id="menyCV" class="menulink" href="?load=CV">CV</a></li>
                            <li class="menulist"><a id="menyPortfolio" class="menulink" href="?load=portfolio">Portfolio</a></li>
                            <li class="menulist"><a id="menyAnnat" class="menulink" href="?load=annat">Annat</a></li>';
                    }

                    ?>


                    <!-- <li class="menulist"><a id="menyHem" class="menulink" href="?load=hem">Hem</a></li> -->
                    <!-- <li class="menulist"><a id="menyCV" class="menulink" href="?load=CV">CV</a></li> -->
                    <!-- <li class="menulist"><a id="menyPortfolio" class="menulink" href="?load=portfolio">Portfolio</a></li> -->
                    <!-- <li class="menulist"><a id="menyAnnat" class="menulink" href="?load=annat">Annat</a></li> -->
                </ul>
            </nav>

        </header>



        <!--==================-->

       
<?php



$ladda = isset($_GET['load']) ? ($_GET['load']): '';  


if ($ladda == "hem") {
	include "hem.php";
}

else if ($ladda == "CV") {
	include "CV.php";
}

else if ($ladda == "annat") {
	include "annat.php";
}

else if ($ladda == "portfolio") {
	include "portfolio.php";
}

else {
	include "hem.php";
}



?>


     
        <!--==================-->



        <?php

include 'footer.html';

        ?>

       </div>

</body>

</html>