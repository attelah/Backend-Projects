<article>
    <h2>Tid och datum - Uppg 2</h2>

    <?php
    $tid = date("d.M.Y");
    print("idag är det ".$tid);


    $veckodagar = array("Söndag", "Måndag", "Tisdag", "Onsdag", "Torsdag","Fredag","Lördag");
    $Months = array("Januari", "Februari", "Mars", "April", "Maj","Juni","Juli", "Augusti", "October", "September", "November","December");
    $dag = [];
    $manad = [];

    if (date("l")==[0])
    {
        $veckodagar = [0];
    }
    if (date("l")==[1])
    {
        $veckodagar = [1];
    }
    if (date("l")==[2])
    {
        $veckodagar = [2];
    }
    if (date("l")==[3])
    {
        $veckodagar = [3];
    }
    if (date("l")==[4])
    {
        $veckodagar = [4];
    }
    if (date("l")==[5])
    {
        $veckodagar = [5];
    }
    if (date("l")==[6])
    {
        $veckodagar = [6];
    }

    print("idag är det ".$veckodag);


    ?>


</article>

<div class="separator"></div>