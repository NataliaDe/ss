<?php
//print_r($delete);
//echo $delete;
?>
<div class="container">
    <!-- Форма добавления radmins -->

    <div class="table-responsive col-lg-8 col-lg-offset-2 " id="tbl_list_user">
        <table id="tbl5" class="table table-condensed   table-bordered table-hover" >
            <!-- строка 1 -->
            <thead>
                <tr >
                    <th>Пользователь</th>
                    <th>Роль</th>
                    <th>Уровень</th>
                    <th>Логин</th>

                    <th class="deleteth" >Ред.</th>
                    <th class="deleteth">Уд.</th>


                </tr>

            </thead>
                      <tfoot>
                <tr >
                    <th>Пользователь</th>
                    <th>Роль</th>
                    <th>Уровень</th>
                    <th>Логин</th>

                    <th></th>
                    <th></th>


                </tr>

            </tfoot>
            <tbody>

                <?php
                foreach ($users as $row) {
                    ?>
                    <tr>
                        <td><?= $row->auth ?></td>
                        <td><?= $row->role_name ?></td>
                        <td><?= $row->level_name ?></td>
                        <td><?= $row->l ?></td>

                        <td><a href='/ss/tables/edit/users/<?= $row->user_id ?>' > <span class='glyphicon glyphicon-pencil'></span></a></td>
                        <td>

                            <a href='/ss/tables/remove/users/<?= $row->user_id ?>' > <span class='glyphicon glyphicon-trash'></span></a>



                        </td>

                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
        <br>
    </div>
</div>




