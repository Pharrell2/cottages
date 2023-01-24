<?php

// de programmeur was vergeten de files te includen.

include 'includes/database.php';

include 'includes/functions.php';

include 'header.php';

$cottageID = 1;

if ( isset($_GET['cottageID']) ) {

    $cottageID=$_GET['cottageID'];

};

echo $cottageID;

$sql= "SELECT * FROM `cottages` WHERE cottage_id=".$cottageID;

$tblCottages= getData($sql, "fetch");

//echo $sql;
// echo "<pre>";



?>
<section>
    <div class="container mt-4">
    <h1><?php echo $tblCottages['cottage_name']; ?></h1>
        <div class="row"> 
            <div class="col">
                <div id="carouseExampleControls" class="carousel slide pointer-event" data-bt--ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item">
                        <img src=<?php echo 'images/'.$tblCottages['cottage_img']; ?> class= "d-block w-100" alt="ijmuiden.jpg"><!--src en alt dynamisch maken -->
                        </div>
                        <div class="carousel-item active">
                        <img src=<?php echo 'images/'.$tblCottages['cottage_img2']; ?> class= "d-block w-100" alt="ijmuiden-strand.jpg"><!--src en alt dynamisch maken -->
                        </div>
                        <div class="carousel-item">
                        <img src=<?php echo 'images/'.$tblCottages['cottage_img3']; ?> class= "d-block w-100" alt="ijmuiden-hottub.jpg"><!--src en alt dynamisch maken -->
                        </div> 
                        <div class="carousel-item">
                        <img src=<?php echo 'images/'.$tblCottages['cottage_img4']; ?> class= "d-block w-100" alt="ijmuiden-haard.jpg"><!--src en alt dynamisch maken -->    
                       </div>
                   </div>
                   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        </div>
                    </div>  
                    <div class="col">
                    <h5><?php echo $tblCottages['cottage_excerpt']; ?></h5> 
                    <p><?php echo $tblCottages['cottage_descr']; ?></p>
                    </div>
                </div>
            </div>
        </section>
          
<section>
    <div class="container mt-4 bg-light">
          <div class="row px-4 py-4">
          <div class="col">
          <!-- faciliteiten (aparte file in includes) -->  
          <?php include 'includes/facilities.php'; ?>
          </div>

          <div class="col">
              <h4>Prijzen (per persoon per nacht)</h4>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">Volwassen: &euro; <?php echo $tblCottages['cottage_price_a']; ?></li>
                      <li class="list-group-item">Kinderen: &euro; <?php echo $tblCottages['cottage_price_c']; ?></li> 
                      
                     </ul>
                 </div>
                  
            <div class="col">
                <!-- additions (aparte file in includes) -->
                <?php include 'includes/additions.php'; ?>
             </div>
        </div>
    </div>
    <?php 
include "includes/calculateprice.php"; ?>
</section>


<?php
include 'footer.php';
?>

