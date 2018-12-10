<!--Modal-->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
                <h4 class="modal-title">Инструкция по эксплуатации</h4>
            </div>
            <div class="modal-body">

                <?php
                if (isset($_GET["file"]))
                    $filename = $_GET["file"];
                else {

                    if ($prior == 1)
                        $filename = "instruction1.doc"; //для РЦУ
                    else
                        $filename = "instruction.doc";
                }
                if (strpos($filename, "/") !== false)
                    die("Hack atempt detected!");
                if ($fileext = substr($filename, strrpos($filename, ".")) !== ".doc")
                    die("Поддерживается только чтение вордовских документов");

                $p = '/nm/';
                $path = $p . $filename;
//echo $path;
                echo "Скачать <a href='$path'>инструкцию</a><br><br> ";
//echo "<br>Скачать инструкцию  <a href=\"$filename\">$filename</a><br> ";

                if ($prior == 1) {
                    //echo 'инструкция для РЦУ';
                } else {
                    //echo 'инструкция для всех, кроме РЦУ';
                }
                ?>

            </div>
            <div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button></div>
        </div>
    </div>
</div>