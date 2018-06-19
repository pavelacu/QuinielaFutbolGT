<article class="module width_full">

    <div style="float: left">
        <img style="width: 130px; padding: 20px" onclick="location.replace('<?= Front::myUrl("main/index") ?>')" src="<?= Front::myUrl('images/zabivaka_full.png') ?>"></h1>
    </div>
    <h2><?= $name_player ?></h2>
    <span style="text-height: 30px"><?= $ronda ?></span><br>
    <span style="text-height: 30px">Fecha actual: <b><?= $fecha ?></b></span>
    <form name="form1" id="form1">
        <table align="center" class="zebra" border="1" style="text-align: center; width: 600px;" cellspacing="1" cellpadding="1" >

            <tr>
                <th> Pronostico</th>                                
                <th> Puntos </th>
            </tr>
            <?php
            $fechatemp = "";
            
            while ($row = $partidos->getRowFields()) {
                $equipo1 = explode("_", $row->e1);
                $nombre1 = $equipo1[0];
                $bandera1 = $equipo1[1];
                                
                $equipo2 = explode("_", $row->e2);
                $nombre2 = $equipo2[0];
                $bandera2 = $equipo2[1];

                ////grupo por fecha 
                $fecha2 = $row->fecha2;
                ?>

                <?php
                if ($fecha2 != $fechatemp) {
                    echo "<tr><td colspan='3'><p><b>Jornada: $fecha2<b></p></td></tr>";
                    $fechatemp = $fecha2;
                }
                ?>


                <tr>
                    <td ><?= utf8_encode($nombre1) ?>
                    <img src="<?= Front::myUrl('images/band/' . $bandera1) ?>">
                    <?= $row->marcador1 ?>
                    <b>-</b>
                    <?= $row->marcador2 ?>
                    <img src="<?= Front::myUrl('images/band/' . $bandera2) ?>">
                    <?= utf8_encode($nombre2) ?>                   
                                        </td> 
                    <td><b><?= $row->puntaje ?></b></td>
                </tr>
            <?php } ?>            
        </table>
        <p>&nbsp;</p>
        <input type="hidden" name="fechaAct" id="fechaAct" value="<?=Calendar::getDatabaseDateTime()?>">
    </form>
</article>