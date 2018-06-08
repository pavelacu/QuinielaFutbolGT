<article class="module width_full">

    <div style="float: left">
        <img style="width: 130px; padding: 20px" onclick="location.replace('<?= Front::myUrl("main/index") ?>')" src="<?= Front::myUrl('images/zabivaka_full.png') ?>"></h1>
    </div>
    <span style="text-height: 30px"><?= $ronda ?></span><br>
    <span style="text-height: 30px">Fecha actual: <b><?= $fecha ?></b></span>
    <form name="form1" id="form1">
        <table align="center" class="zebra" border="0" style="text-align: center; width: 450px;" cellspacing="1" cellpadding="1" >

            <tr>
                <th colspan="7"> Expectativa</th>                
                <th colspan="7"> Realidad</th>
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
                    echo "<tr><td colspan='15'><p><b>Jornada: $fecha2<b></p></td></tr>";
                    $fechatemp = $fecha2;
                }
                ?>


                <tr>
                    <td style="text-align: right"><?= utf8_encode($nombre1) ?></td>
                    <td><img src="<?= Front::myUrl('images/band/' . $bandera1) ?>"></td>                    
                    <td><?= $row->marcador1 ?></td>
                    <td><b>Vs</b></td>
                    <td><?= $row->marcador2 ?></td>                    
                    <td><img src="<?= Front::myUrl('images/band/' . $bandera2) ?>"></td>
                    <td style="text-align: left"><?= utf8_encode($nombre2) ?></td>                    

                    <td style="text-align: right"><?= utf8_encode($nombre1) ?></td>
                    <td><img src="<?= Front::myUrl('images/band/' . $bandera1) ?>"></td>
                    <td><?= $row->real1 ?></td>                    
                    <td><b>Vs</b></td>                    
                    <td><?= $row->real2 ?></td>
                    <td><img src="<?= Front::myUrl('images/band/' . $bandera2) ?>"></td>
                    <td style="text-align: left"><?= utf8_encode($nombre2) ?></td>

                    <td><b><?= $row->puntaje ?></b></td>
                </tr>
            <?php } ?>            
        </table>
        <p>&nbsp;</p>
        <input type="hidden" name="fechaAct" id="fechaAct" value="<?=Calendar::getDatabaseDateTime()?>">
    </form>
</article>