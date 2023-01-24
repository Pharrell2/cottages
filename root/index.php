<?php
include 'includes/database.php';

include 'includes/functions.php';

include "header.php"; 
include 'includes/filter.php';
?>

<section>
    <div class="container mt-4">
        <div class="row">
            <?php
               
                            
            if($filter == false){
                
                $sql = "SELECT * FROM cottages";
            }
            else{
                $sql_add = "";

               if(count($arrFrmFilter) > 0){
                   
                    $sql_add = "AND cf.facility_id in (" . implode (", ", $arrFrmFilter) . ")";
               } 

              
                $sql = "SELECT * FROM `cottages` c WHERE c.cottage_id in 
                    (
                        SELECT cottage_id FROM `cottages_facilities` cf
                        WHERE cf.cottage_id = c.cottage_id " .
                        $sql_add .
                    ")";
            } 


            ?>
             <?php
            $tblCottages = getData($sql, "fetchALL")
             //echo "<pre>";
              // var_dump($tblCottages);
             ?>
            <?php
              //foreach($tblCottages AS $cottages) {
               // echo "----------";
              //var_dump($cottages);
              
             ?>


                    
            
               <?php if(count($tblCottages)==0){ ?> <!-- als er geen resultaat getoond kan worden omdat er 0 resultaat is op het filter de volgende melding tonen -->
                <!-- de variabele $selection in filter.php gebruiken om te laten zien waar op gefiltert is -->
                <div class="col-12"> 
                <button type="submit" name="submit_filter" value="submit" class="btn btn-primary  mb-4 mt-2">Filter</button>
                <div class="alert alert-warning" role="alert">Helaas er zijn geen huisjes met de volgende selectie: <?php echo $selection; ?> </div>
                </div>
            
            <?php }else {?>
           
           
                <?php foreach($tblCottages AS $cottage) { ?>
                <div class="col-12 col-md-4 mb-4 d-flex align-self-stretch">
                    <div class="card">
                        <img class="card-img-top" src=<?php echo 'images/'.$cottage["cottage_img"]; ?> alt="cottage_name">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $cottage['cottage_name'];?></h5> 
                                <p class="card-text"><?php echo $cottage['cottage_excerpt'];?></p> 
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?php echo $cottage['cottage_price_a'];?></li><!-- maak prijs volwassenen dynamisch -->
                                    <li class="list-group-item"><?php echo $cottage['cottage_price_c'];?></li><!-- maak prijs kinderen dynamisch -->
                                </ul>
                                <a href="huisjes.php?cottageID=<?php echo $cottage['cottage_id']; ?>" class="btn btn-secondary mt-2">Lees meer...</a><!-- maak href dynamisch -->
                            </div>
                        </div>
                    </div>
                <?php }?>
            <?php }?>
        </div>
    </div>
</section>

<?php 
include 'footer.php';
?>