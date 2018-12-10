<!-- tab2  по районам-->
<div class="tab-pane" id="tab5">



    <div class=" col-lg-5 col-lg-offset-3" >

        <table class="table table-condensed   table-bordered table-hover" id="tbl_cou_by_local" style="width: 100%" >
            <!--   строка 1 -->
            <thead>
                <tr >
                    <th>Область</th>
                    <th>Район</th>
                    <th>ЦОУ</th>
                </tr>
            </thead>
            <tfoot>
            <th>Область</th>
            <th>Район</th>
            <th>ЦОУ</th>


            </tfoot>


            <tbody>

                <?php
                foreach ($cou_by_local as $d) {

                    ?>

      <tr>
                        <td ><?= $d->region_name ?></td>
                        <td><?= $d->local_name ?></td>
                        <td class="warning"><?= $d->divizion_name ?></td>
                    </tr>
                    <?php
                }

                ?>

                <?php

                ?>

            </tbody>

        </table>
    </div>



</div>

</div>
</div>
</div>
