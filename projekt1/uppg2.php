<article>
    <h2>Tid och datum - Uppg 2</h2>

    <?php
    $tid = date("l.d.M.Y");
    print("idag är det ".$tid);


    $veckodagar = array("Söndag", "Måndag", "Tisdag", "Onsdag", "Torsdag","Fredag","Lördag");
    $Months = array("Januari", "Februari", "Mars", "April", "Maj","Juni","Juli", "Augusti", "October", "September", "November","December");
    $dag = date("l");
    $manad = date("M");

    if ($dag==[0])
    {
        echo "idag är det ".$veckodag[0];
    }
    if ($dag==[1])
    {
        echo "idag är det ".$veckodag[1];
    }
    if ($dag==[2])
    {
        echo "idag är det ".$veckodag[2];
    }
    if ($dag==[3])
    {
        echo "idag är det ".$veckodag[3];
    }
    if ($dag==[4])
    {
        echo "idag är det ".$veckodag[4];
    }
    if ($dag==[5])
    {
        echo "idag är det ".$veckodag[5];
    }
    if ($dag==[6])
    {
        echo "idag är det ".$veckodag[6];
    }
    


    ?>


</article>

<div class="separator"></div>