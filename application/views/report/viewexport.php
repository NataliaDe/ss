<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container">



    <div class="col-lg-12">
        <form class="form-horizontal" role="form" id="report" method="POST" action="/ss/report/export">

            <div class="row col-lg-12">


                <!-- Область  -->

                <input type="hidden" class="form-control" name="region" id="reg" value="<?= $region ?>">


                <input type="hidden" class="form-control" name="local" id="loc" value="<?= $local ?>">


                <input type="hidden" class="form-control" name="divizionName" value="<?= $divizionName ?>">


                <input type="hidden" class="form-control" name="org" value="<?= $organ ?>">


                <input type="hidden" class="form-control" id="countDivmin" name="countDivmin" value="<?= $countDivmin ?>">

                <input type="hidden" class="form-control" id="countDivmax" name="countDivmax" value="<?= $countDivmax ?>">

                <input type="hidden" class="form-control" id="countChange1min"  name="countChange1min" value="<?= $countChange1min ?>">

                <input type="hidden" class="form-control" id="countChange1max"  name="countChange1max" value="<?= $countChange1max ?>">

                <input type="hidden" class="form-control" id="countChange2min"  name="countChange2min" value="<?= $countChange2min ?>">

                <input type="hidden" class="form-control" id="countChange2max" name="countChange2max" value="<?= $countChange2max ?>">

                <input type="hidden" class="form-control" id="countChange3min"  name="countChange3min" value="<?= $countChange3min ?>">

                <input type="hidden" class="form-control" id="countChange3max"  name="countChange3max" value="<?= $countChange3max ?>">

                <input type="hidden" class="form-control" id="countDriverAllmin"  name="countDriverAllmin" value="<?= $countDriverAllmin ?>">

                <input type="hidden" class="form-control" id="countDriverAllmax"  name="countDriverAllmax" value="<?= $countDriverAllmax ?>">

                <input type="hidden" class="form-control" id="countDriverChangemin" name="countDriverChangemin" value="<?= $countDriverChangemin ?>">


                <input type="hidden" class="form-control" id="countDispAllmin"  name="countDispAllmin" value="<?= $countDispAllmin ?>">

                <input type="hidden" class="form-control" id="countDispAllmax" name="countDispAllmax" value="<?= $countDispAllmax ?>">

                <input type="hidden" class="form-control" id="countDispChangemin" name="countDispChangemin" value="<?= $countDispChangemin ?>">

                <input type="hidden" class="form-control" id="countDispChangemax" name="countDispChangemax" value="<?= $countDispChangemax ?>">


                <input type="hidden" class="form-control" name="technicName" id="technicName"  value="<?= $technicName ?>">



                <input type="hidden" class="form-control" id="mark" name="mark" value="<?= $mark ?>" >

                <input type="hidden" class="form-control" id="vmin" name="vmin" value="<?= $vmin ?>">

                <input type="hidden" class="form-control" id="vmax" name="vmax" value="<?= $vmax ?>">

                <input type="hidden" class="form-control" name="type" id="type" value="<?= $type ?>">


                <input type="hidden" class="form-control" id="calculationmin"  name="calculationmin" value="<?= $calculationmin ?>">

                <input type="hidden" class="form-control" id="calculationmax"  name="calculationmax" value="<?= $calculationmax ?>">





                <div class="row">

                    <div class="form-group">

                        <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                            <button type="submit" class="btn btn-warning" name="create">Экспорт в Excel</button>
                        </div>
                    </div>


                </div>



        </form>
    </div>
</div>

