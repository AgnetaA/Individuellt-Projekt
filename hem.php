

        <div id="plats"></div>

        <main id="content">


            <br />
            <section class="text">
                <div id="indexText">

                    <?php


                    $query = "SELECT * FROM texter WHERE ID = 1";
                    $result = mysqli_query($db, $query);

                    $text = mysqli_fetch_assoc($result);

                    echo '<h2>'.$text['rubrik'].'</h2>'; 

                    echo '<br />';

                    echo '<p>'.$text['texten'].'</p>'; 

            ?>


                </div>


            </section>

            <br />
            <br />
            <br />
            <hr />
            <br />

            <section id="countdown">
                 <h2>Nedräkningar</h2>                        <!--nedräkningsklockor-->

                <p id="förklaring">
                    Så här långt är det kvar tills vi går på LIA resp. tar examen:
                    <br />
                    <br />
                </p>

                <div id="liaYttre" class="typKlocka">
                    <!--Lia-klocka-->
                    <p id="klocktitel">LIA</p>
                    <div id="lia" class="klocka">
                        <div class="räknare">
                            Dagar
                            <div id="dagar2"></div>
                        </div>
                        <div class="räknare">
                            Timmar
                            <div id="timmar2"></div>
                        </div>

                        <!-- kan tas tillbaka senare: -->
                        <div class="räknare ejmobil">    
                            Minuter
                            <div id="minuter2"></div>
                        </div>
                        <div class="räknare ejmobil">
                            Sekunder
                            <div id="sekunder2"></div>
                        </div>
                    </div>
                </div>

               <div id="examenYttre" class="typKlocka">
                    <!--Examen-klocka-->
                    <p id="klocktitel">Examen</p>
                    <div id="examen" class="klocka">
                        <div class="räknare">
                            Dagar
                            <div id="dagar"></div>
                        </div>
                        <div class="räknare">
                            Timmar
                            <div id="timmar"></div>
                        </div>
                        <div class="räknare ejmobil">
                            Minuter
                            <div id="minuter"></div>
                        </div>
                        <div class="räknare ejmobil">
                            Sekunder
                            <div id="sekunder"></div>
                        </div>
                    </div>
                </div>


<div id=counter1></div>
<div id=counter2></div>

<script>

//------------------------NEDRÄKNINGAR------------------------------

var examen = new Date(2018, 4, 31);  //2018-05-31   månad startar på 0!!!
var lia = new Date(2017, 10, 13);   //2017-11-13 


//Räkna ut tid kvar               metod baserad på www.sitepoint.com/build-javascript-countdown-timer-no-dependencies/
function getTimeRemaining(endtime) {
    var tidKvar = endtime.getTime() - new Date().getTime();
    var seconds = Math.floor((tidKvar / 1000) % 60);
    var minutes = Math.floor((tidKvar / 1000 / 60) % 60);           //% 60 för att bara de min som blir kvar efter timmar räknas, samma gäller för timmar, sekunder
    var hours = Math.floor((tidKvar / (1000 * 60 * 60)) % 24);
    var days = Math.floor(tidKvar / (1000 * 60 * 60 * 24));

    return {
        "total": tidKvar,
        "sekunder": seconds,
        "minuter": minutes,
        "timmar": hours,
        "dagar": days
    }
}





var nedräkning1 = document.getElementById("dagar"); //hitta div, klocka 1, Examen
var nedräkning2 = document.getElementById("timmar");
var nedräkning3 = document.getElementById("minuter");
var nedräkning4 = document.getElementById("sekunder");


var nedräkning5 = document.getElementById("dagar2"); //klocka 2, LIA
var nedräkning6 = document.getElementById("timmar2");
var nedräkning7 = document.getElementById("minuter2");
var nedräkning8 = document.getElementById("sekunder2");


function skrivUt() {   //Examen

    var dag = getTimeRemaining(examen).dagar;             //kallar på funktion getTimeRemaining för "examen"
    var timme = getTimeRemaining(examen).timmar;
    var min = getTimeRemaining(examen).minuter;
    var sek = getTimeRemaining(examen).sekunder;

    if (dag < 0)
    { nedräkning1.innerHTML = 0; } //ska stå 0 och inte minus något om klockan sätts igång efter att tiden gått ut
    else
    { nedräkning1.innerHTML = dag; }

    if (timme < 0)
    { nedräkning2.innerHTML = 0; }
    else
    { nedräkning2.innerHTML = timme; }

    if (min < 10 && min > -1)
    { nedräkning3.innerHTML = "0" + min; }  //lägger till nolla om mindre än 10 min -> 09
    else if (min < 0)
    { nedräkning3.innerHTML = 0; }
    else
    { nedräkning3.innerHTML = min; }

    if (sek < 10 && sek > -1)
    { nedräkning4.innerHTML = "0" + sek; }
    else if (sek < 0)
    { nedräkning4.innerHTML = 0; }
    else
    { nedräkning4.innerHTML = sek; }

    if (getTimeRemaining(examen).total <= 0)   //om nedräkningen nått 0
    {
        clearInterval(uppdatering);
    }

}

function skrivUt2() {   //LIA

    var dag2 = getTimeRemaining(lia).dagar;
    var timme2 = getTimeRemaining(lia).timmar;
    var min2 = getTimeRemaining(lia).minuter;
    var sek2 = getTimeRemaining(lia).sekunder;

    if (dag2 < 0)
    { nedräkning5.innerHTML = 0; }
    else
    { nedräkning5.innerHTML = dag2; }

    if (timme2 < 0)
    { nedräkning6.innerHTML = 0; }
    else
    { nedräkning6.innerHTML = timme2; }

    if (min2 < 10 && min2 > -1)
    { nedräkning7.innerHTML = "0" + min2; }
    else if (min2 < 0)
    { nedräkning7.innerHTML = 0; }
    else
    { nedräkning7.innerHTML = min2; }

    if (sek2 < 10 && sek2 > -1)
    { nedräkning8.innerHTML = "0" + sek2; }
    else if (sek2 < 0)
    { nedräkning8.innerHTML = 0; }
    else
    { nedräkning8.innerHTML = sek2; }



    if (getTimeRemaining(lia).total <= 0)   //om nedräkningen nått 0
    {
        clearInterval(uppdatering2);
    }

}

var uppdatering = setInterval(skrivUt, 1000);  //examen    
var uppdatering2 = setInterval(skrivUt2, 1000);  //lia


 

</script>

        

            </section>

            <br />
            <br />
            <hr />
            <br />


            <section class="text" id="message">

                <div id="contact">
                
                    <h2>Kontakta mig:</h2>

                    <?php

                   
                    if(isset($_POST['msg'])) {

                        $name = mysqli_real_escape_string($db, $_POST['namn']);
                        $email = mysqli_real_escape_string($db, $_POST['email']);
                        $message = mysqli_real_escape_string($db, $_POST['message']);

                        $q = "INSERT INTO meddelanden (namn, email, meddelande) VALUES ('$name', '$email', '$message')";
                    
                        mysqli_query($db, $q);


                        echo "<script type='text/javascript'>alert('Meddelandet är skickat.');</script>";
                    }

                    ?>

                    <form method="post">
                        <label>Namn:</label><br />
                        <input type="text" name="namn" id="namn" >
                        <br />
                        <label>e-mail:</label><br />
                        <input type="email" name="email" >
                        <br />
                        <label>Meddelande:</label><br />
                        <textarea name="message"></textarea><br />
                        <input type="submit" name="msg" value="Skicka" /> 
                    </form>



                    

                </div>

            </section>


            



        <!-- <script src="JavaScript.js"></script> -->   


        </main>

        <div id="platsnedre"></div>




