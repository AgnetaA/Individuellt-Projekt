
<script>
    
$(document).ready(function(){
    

  $(".cvpunkt").click(function(){
       $(this).next('.info').toggle('fast')
   });  




});
</script>

        

        <div id="plats"></div>

        <main id="content">

            <br />
            <br />
            <br />

            <div class="utsmyck"><img class="utsmBild" src="Bilder/lilaMarmorerad.png" /></div>
            <h2 id="cvTitel">CV</h2>               <!--cv-titel-->
            <a class="länkitext" href="hangman.html" target="_blank"><div class="utsmyck"><img id="uppoNed" class="utsmBild" src="Bilder/lilaMarmorerad.png" /></div></a>

            <br />

            <?php


            ?>

            <ul id="cv" class="cvLista">

                <li id="edu" class="cvLista">
                    <h3 class="cv3rubrik">Utbildning</h3>
                    <ul id="schools" class="cvLista">

                        <?php
                            $query = "SELECT * FROM cv_utbildning ORDER BY ID DESC";
                            $result = mysqli_query($db, $query);


                            $id = 1;

                            while($row = mysqli_fetch_assoc($result)){


                                echo '<li class="cvLista">
                                        <h4 id="show'.$id.'" class="cvpunkt" role="button">'.$row['rubrik'].'</h4>
                                        <p id="showinfo'.$id.'" class="info">'.$row['info'].'</p>
                                    </li>';

                                $id++;    
                            }

                        ?>


                    </ul>
                </li>

                <li id="work" class="cvLista">
                    <h3 class="cv3rubrik">Arbete</h3>

                    <ul id="occTher" class="cvLista">

                        <?php
                            $query = "SELECT * FROM cv_arbete ORDER BY id DESC";
                            $result = mysqli_query($db, $query);

                            $id2 = 1;

                            while($row = mysqli_fetch_assoc($result)){
                                
                                
                                echo '<li class="cvLista">
                                        <h4 id="visa'.$id2.'" class="cvpunkt" role="button">'.$row['rubrik'].'</h4>
                                        <p id="info'.$id2.'" class="info">'.$row['info'].'</p>
                                    </li>';

                                 $id2++;    
                            }

                        ?>

                    </ul>
                </li>

                <li id="compKnow" class="cvLista">
                    <h3 class="cv3rubrik">Datorkunskaper</h3>
                    <ul class="cvLista">
                        <li class="cvLista">

                            <?php

                                $query = "SELECT * FROM cv_annat WHERE ID = 1";
                                $result = mysqli_query($db, $query);

                                $text = mysqli_fetch_assoc($result);

                                echo '<p class="cvpunkt2" id="info10">'.$text['info'].'</p>'; 

                            ?>


                            
                        </li>
                    </ul>
                </li>

                <li id="dLi" class="cvLista">
                    <h3 class="cv3rubrik">Körkort</h3>
                    <ul class="cvLista">
                        <li class="cvLista"><h4 class="cvpunkt2">B</h4></li>
                    </ul>
                </li>

                <li id="languages" class="cvLista">
                    <h3 class="cv3rubrik">Språk</h3>
                    <ul class="cvLista">
                        <li class="cvLista"><h4 class="cvpunkt2">Engelska</h4></li>
                        <li class="cvLista"><h4 class="cvpunkt2">Tyska</h4></li>
                    </ul>
                </li>


            </ul>


            <br />
            <div class="utsmyck"><img class="utsmBild" src="Bilder/lilaMarmorerad.png" /></div>
            <br />


        </main>

        <div id="platsnedre"></div>

        


