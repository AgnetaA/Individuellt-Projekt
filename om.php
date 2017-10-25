



        

        <div id="plats"></div>

        <main id="content">


            <br />
            <br />

            <section id="omMig">

            <?php

                


                    $query = "SELECT * FROM texter WHERE ID = 2";
                    $result = mysqli_query($db, $query);

                    $text = mysqli_fetch_assoc($result);

                    echo '<h2>'.$text['rubrik'].'</h2>'; 

                    echo '<p>'.$text['texten'].'</p>'; 

            ?>


            </section>

            <br />
            <br />

        </main>



        <div id="platsnedre"></div>

        



       