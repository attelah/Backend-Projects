<article>
    <h2>Tid och datum - Uppg 2</h2>

    <?php
   
    $veckodagar = array("Söndag", "Måndag", "Tisdag", "Onsdag", "Torsdag","Fredag","Lördag");
    $Months = array("Januari", "Februari", "Mars", "April", "Maj","Juni","Juli", "Augusti", "October", "September", "November","December");
    $dag = date("w");
    $week = date("W");
    $manad = date("n");
    $datnum = date("j");    

    $day = $veckodagar[$dag-1];
    $month = $Months[$manad-1];

    print ("idag är det ".$day." den " .$datnum." " .$month. ", Vecka ".$week.". Vilken härlig dag!");
    
    ?>

</article>

<div class="separator"></div>