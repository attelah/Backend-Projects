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
       $dag = $veckodagar[0];
    }
    if ($dag==[1])
    {
        $dag = $veckodagar[1];
    }
    if ($dag==[2])
    {
        $dag = $veckodagar[2];
    }
    if ($dag==[3])
    {
        $dag = $veckodagar[3];
    }
    if ($dag==[4])
    {
        $dag = $veckodagar[4];
    }
    if ($dag==[5])
    {
        $dag = $veckodagar[5];
    }
    if ($dag==[6])
    {
        $dag = $veckodagar[6];
    }

    print("idag är det ".$dag);


    ?>


</article>

<div class="separator"></div>