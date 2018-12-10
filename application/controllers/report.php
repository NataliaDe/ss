<?php

DEFINE('COUNT_CHARS_PER_STR', 20);

class Report extends CI_Controller {

    private $height_min_cell = 19;

    public function __construct() {
        parent::__construct();
        $this->load->model('card_model');
        $this->load->model('query_model');
        $this->load->model('fill_model');
        $this->load->model('edit_model');
        $this->load->model('report_model');

        $this->load->library('excel');

        $this->load->helper('url');
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {//форма для формирования отчета
            $this->load->view('templates/header');
            $userId = $this->session->userdata('user_id');
            if (!empty($userId)) {
                $this->load->view('templates/menuauth');
            } else {
                $this->load->view('templates/menu');
            }

            $data['regions'] = $this->report_model->get_region();
            $data['locals'] = $this->report_model->get_local();
            $data['divizions'] = $this->fill_model->get_divizionName();
            $data['organs'] = $this->report_model->get_organ();
            $data['types'] = $this->fill_model->get_types();
            $data['views'] = $this->fill_model->get_views();

            $this->load->view('report/bread');
            $this->load->view('report/form', $data); //форма для формирования отчета
            $this->load->view('templates/footer');
        }
        if (isset($_POST['onScreen'])) {//результат формирования отчета - вывод на экран
            $reg = $this->input->post('region');
            $loc = $this->input->post('local');
            $org = $this->input->post('org');
            $diviz = $this->input->post('divizionName');


            $data['region'] = $this->input->post('region');
            $data['local'] = $this->input->post('local');
            $data['organ'] = $this->input->post('org');
            $data['divizionName'] = $this->input->post('divizionName');

            $data['technicName'] = $this->input->post('technicName');
            $data['mark'] = $this->input->post('mark');
            $data['type'] = $this->input->post('type');
            $data['countDivmin'] = $this->input->post('countDivmin');

            $data['countDivmax'] = $this->input->post('countDivmax');
            $data['countChange1min'] = $this->input->post('countChange1min');
            $data['countChange1max'] = $this->input->post('countChange1max');
            $data['countChange2min'] = $this->input->post('countChange2min');


            $data['countChange2max'] = $this->input->post('countChange2max');
            $data['countChange3min'] = $this->input->post('countChange3min');
            $data['countChange3max'] = $this->input->post('countChange3max');

            $data['countDriverAllmin'] = $this->input->post('countDriverAllmin');
            $data['countDriverAllmax'] = $this->input->post('countDriverAllmax');

            $data['countDriverChangemin'] = $this->input->post('countDriverChangemin');
            $data['countDriverChangemax'] = $this->input->post('countDriverChangemax');


            $data['countDispAllmin'] = $this->input->post('countDispAllmin');
            $data['countDispAllmax'] = $this->input->post('countDispAllmax');
            $data['countDispChangemin'] = $this->input->post('countDispChangemin');
            $data['countDispChangemax'] = $this->input->post('countDispChangemax');

            $data['vmin'] = $this->input->post('vmin');
            $data['vmax'] = $this->input->post('vmax');
            $data['calculationmin'] = $this->input->post('calculationmin');
            $data['calculationmax'] = $this->input->post('calculationmax');






            $data['recordkey'] = $this->report_model->get_keyid($this->input->post('region'), $this->input->post('local'), $this->input->post('org'), $this->input->post('divizionName')); //выбор id записей области как ключей
            $data['report'] = $this->report_model->get_report($this->input->post('region'), $this->input->post('local'), $this->input->post('org'), $this->input->post('divizionName'), $this->input->post('technicName'), $this->input->post('mark'), $this->input->post('type'), $this->input->post('countDivmin'), $this->input->post('countDivmax'), $this->input->post('countChange1min'), $this->input->post('countChange1max')
                    , $this->input->post('countChange2min'), $this->input->post('countChange2max'), $this->input->post('countChange3min'), $this->input->post('countChange3max')
                    , $this->input->post('countDriverAllmin'), $this->input->post('countDriverAllmax'), $this->input->post('countDriverChangemin'), $this->input->post('countDriverChangemax'), $this->input->post('countDispAllmin'), $this->input->post('countDispAllmax'), $this->input->post('countDispChangemin'), $this->input->post('countDispChangemax')
                    , $this->input->post('vmin'), $this->input->post('vmax'), $this->input->post('calculationmin'), $this->input->post('calculationmax'));
            if (!empty($data['report'])) {

                if (!empty($reg)) {//выбрана область
                    /* if (!empty($loc) && !empty($org)) {//орган
                      // $data['caption'] = $this->report_model->caption_organ($loc, $org); //название карточки
                      $data['datecaption'] = $this->report_model->date_caption_organ($loc, $org); //дата карточки
                      } elseif (!empty($org) || !empty($diviz)) {//область
                      $data['captionReg'] = $this->card_model->caption_region($reg); //название карточки области
                      $data['datecaption'] = $this->card_model->date_caption($reg); //дата карточки
                      } elseif (!empty($loc)) {//район весь
                      $data['captionLoc'] = $this->report_model->caption_local($loc); //название карточки района
                      $data['datecaptionLoc'] = $this->report_model->date_caption_local($loc); //дата карточки района
                      } else {

                      $data['captionReg'] = $this->card_model->caption_region($reg); //название карточки области
                      $data['datecaption'] = $this->card_model->date_caption($reg); //дата карточки
                      } */

                    if (!empty($loc)) {
                        if (!empty($org)) {//орган
                            $data['datecaption'] = $this->report_model->date_caption_organ(NULL, $loc, $org); //дата карточки
                        } else {
                            $data['datecaption'] = $this->report_model->date_caption_organ($reg, $loc, NULL); //дата карточки
                        }
                    } else {
                        if (!empty($org)) {//орган
                            $data['datecaption'] = $this->report_model->date_caption_organ($reg, NULL, $org); //дата карточки
                        } else {
                            $data['datecaption'] = $this->report_model->date_caption_organ($reg, NULL, NULL); //дата карточки
                        }
                    }
                } else {
                    /*  if (isset($data['organ']) && !empty($data['organ']) && $data['organ'] == 8) {
                      $data['captionROSN'] = $this->report_model->caption_ROSN($data['organ']); //название карточки области
                      }
                      $data['datecaption'] = $this->report_model->date_caption(); //дата
                     */
                    if (!empty($org)) {//орган
                        $data['datecaption'] = $this->report_model->date_caption_organ(NULL, NULL, $org); //дата карточки
                    } else {
                        $data['datecaption'] = $this->report_model->date_caption_organ(NULL, NULL, NULL); //дата карточки
                    }
                }
            }


            $this->load->view('templates/header');
            $userId = $this->session->userdata('user_id');
            if (!empty($userId)) {
                $this->load->view('templates/menuauth');
            } else {
                $this->load->view('templates/menu');
            }

            $data['regions'] = $this->report_model->get_region();
            $data['locals'] = $this->report_model->get_local();
            $data['divizions'] = $this->fill_model->get_divizionName();
            $data['organs'] = $this->report_model->get_organ();
            $data['types'] = $this->fill_model->get_types();
            $data['views'] = $this->fill_model->get_views();

            /*             * *** условия выборки  ------ */
            if (isset($data['region']) && !empty($data['region'])) {
                $data['ob'] = $this->report_model->get_name_ob($this->input->post('region'));
            }
            if (isset($data['local']) && !empty($data['local'])) {
                $data['lo'] = $this->report_model->get_name_lo($this->input->post('local'));
            }
            if (isset($data['organ']) && !empty($data['organ'])) {
                $data['or'] = $this->report_model->get_name_or($this->input->post('org'));
            }
            if (isset($data['divizionName']) && !empty($data['divizionName'])) {
                $data['di'] = $this->report_model->get_name_di($this->input->post('divizionName'));
            }
            if (isset($data['technicName']) && !empty($data['technicName'])) {
                $data['te'] = $this->report_model->get_name_te($this->input->post('technicName'));
            }
            if (isset($data['type']) && !empty($data['type'])) {
                $data['ty'] = $this->report_model->get_name_ty($this->input->post('type'));
            }

            $this->load->view('report/bread');

            if (empty($data['report'])) {

                $this->load->view('report/msgempt'); //данных нет
                $this->load->view('report/condition', $data); //условия
            }

            $this->load->view('report/form', $data); //форма для формирования отчета

            if (!empty($data['report'])) {
                $this->load->view('report/condition', $data); //условия выборки
                $this->load->view('report/caption', $data);
                $this->load->view('report/result', $data); //итог
                //$this->load->view('report/viewexport', $data);
            }
            $this->load->view('templates/footer');
        }
        if (isset($_POST['exportToExcel'])) {//результат формирования отчета - экспорт в Excel
            $this->export();
        }
    }

    public function export() {
        $reg = $this->input->post('region');
        $loc = $this->input->post('local');
        $org = $this->input->post('org');
        $diviz = $this->input->post('divizionName');


        $data['recordkey'] = $this->report_model->get_keyid($this->input->post('region'), $this->input->post('local'), $this->input->post('org'), $this->input->post('divizionName')); //выбор id записей области как ключей
        $data['report'] = $this->report_model->get_report($this->input->post('region'), $this->input->post('local'), $this->input->post('org'), $this->input->post('divizionName'), $this->input->post('technicName'), $this->input->post('mark'), $this->input->post('type'), $this->input->post('countDivmin'), $this->input->post('countDivmax'), $this->input->post('countChange1min'), $this->input->post('countChange1max')
                , $this->input->post('countChange2min'), $this->input->post('countChange2max'), $this->input->post('countChange3min'), $this->input->post('countChange3max')
                , $this->input->post('countDriverAllmin'), $this->input->post('countDriverAllmax'), $this->input->post('countDriverChangemin'), $this->input->post('countDriverChangemax'), $this->input->post('countDispAllmin'), $this->input->post('countDispAllmax'), $this->input->post('countDispChangemin'), $this->input->post('countDispChangemax')
                , $this->input->post('vmin'), $this->input->post('vmax'), $this->input->post('calculationmin'), $this->input->post('calculationmax'));
        if (!empty($data['report'])) {

            if (!empty($reg)) {//
                if (!empty($loc)) {
                    if (!empty($org)) {//орган
                        $data['datecaption'] = $this->report_model->date_caption_organ(NULL, $loc, $org); //дата карточки
                    } else {
                        $data['datecaption'] = $this->report_model->date_caption_organ($reg, $loc, NULL); //дата карточки
                    }
                } else {
                    if (!empty($org)) {//орган
                        $data['datecaption'] = $this->report_model->date_caption_organ($reg, NULL, $org); //дата карточки
                    } else {
                        $data['datecaption'] = $this->report_model->date_caption_organ($reg, NULL, NULL); //дата карточки
                    }
                }
            } else {
                if (!empty($org)) {//орган
                    $data['datecaption'] = $this->report_model->date_caption_organ(NULL, NULL, $org); //дата карточки
                } else {
                    $data['datecaption'] = $this->report_model->date_caption_organ(NULL, NULL, NULL); //дата карточки
                }
            }
        }


        /* $this->load->view('templates/header');
          $userId = $this->session->userdata('user_id');
          if (!empty($userId)) {
          $this->load->view('templates/menuauth');
          } else {
          $this->load->view('templates/menu');
          }

          $data['regions'] = $this->report_model->get_region();
          $data['locals'] = $this->report_model->get_local();
          $data['divizions'] = $this->fill_model->get_divizionName();
          $data['organs'] = $this->report_model->get_organ();
          $data['types'] = $this->fill_model->get_types();
          $data['views'] = $this->fill_model->get_views();

          $this->load->view('report/bread');


          $this->load->view('report/form', $data); //форма для формирования отчета
         */
        if (!empty($data['report'])) {

            // $this->load->view('report/result', $data); //итог
            // $this->load->view('report/viewexport', $data);

            /* if (!empty($data['caption'])) {//name card орган
              foreach ($data['caption'] as $row) {
              $name = $row->auth;
              }
              } elseif (!empty($data['captionReg'])) {//name card область
              foreach ($data['captionReg'] as $row) {
              $name = $row->head;
              }
              } elseif (!empty($data['captionLoc'])) {//name card район
              foreach ($data['captionLoc'] as $row) {
              $name = $row->locname;
              }
              } elseif (!empty($captionROSN)) {//name card ROSN
              foreach ($captionROSN as $row) {
              $name = $row->head;
              }
              } else
              $name = '';
              if (!empty($data['datecaption'])) {//date card
              foreach ($data['datecaption'] as $row) {
              $datte = $row->dat;
              }
              } elseif (!empty($data['datecaptionLoc'])) {//date card район
              foreach ($data['datecaptionLoc'] as $row) {
              $datte = $row->dat;
              }
              } else
              $datte = ''; */
            //echo $name . $datte;
            if (!empty($data['datecaption'])) {//date card
                foreach ($data['datecaption'] as $row) {
                    $datte = $row->dat;
                }
            }
        }


        //  **************** export to excel **************************
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);

        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Отчет' . ' на ' . $datte);
        //set cell A1 content with some text
        //название таблицы
        /* if (isset($org) && !empty($org) && $org == 8) {//ROSN
          $this->excel->getActiveSheet()->setCellValue('A1', 'Карточка учета сил и средств' . chr(10) . $name . ' на ' . $datte);
          } else { */
        $this->excel->getActiveSheet()->setCellValue('A1', 'Карточка учета сил и средств ОПЧС' . chr(10) . ' по состоянию на ' . $datte);
        //}

        $this->excel->getActiveSheet()->mergeCells('A1:U3');
        // конец название таблицы
        //шапка таблицы
        $this->excel->getActiveSheet()->setCellValue('A4', 'Управление');
        $this->excel->getActiveSheet()->mergeCells('A4:A6');

        $this->excel->getActiveSheet()->setCellValue('B4', 'Наименование органа');
        $this->excel->getActiveSheet()->mergeCells('B4:B6');

        $this->excel->getActiveSheet()->setCellValue('C4', 'Наименование подразделения, место дислокации');
        $this->excel->getActiveSheet()->mergeCells('C4:C6');

        $this->excel->getActiveSheet()->setCellValue('D4', 'Географические координаты подразделения');
        $this->excel->getActiveSheet()->mergeCells('D4:E4');

        $this->excel->getActiveSheet()->setCellValue('D5', 'Широта');
        $this->excel->getActiveSheet()->mergeCells('D5:D6');

        $this->excel->getActiveSheet()->setCellValue('E5', 'Долгота');
        $this->excel->getActiveSheet()->mergeCells('E5:E6');

        $this->excel->getActiveSheet()->setCellValue('F4', 'Штатная численность');
        $this->excel->getActiveSheet()->mergeCells('F4:M4');

        $this->excel->getActiveSheet()->setCellValue('F5', 'подразделения');
        $this->excel->getActiveSheet()->mergeCells('F5:F6');

        $this->excel->getActiveSheet()->setCellValue('G5', 'Число л/с дежурной смены');
        $this->excel->getActiveSheet()->mergeCells('G5:I5');

        $this->excel->getActiveSheet()->setCellValue('G6', '1 смена');
        $this->excel->getActiveSheet()->setCellValue('H6', '2 смена');
        $this->excel->getActiveSheet()->setCellValue('I6', '3 смена');

        $this->excel->getActiveSheet()->setCellValue('J5', 'Количество водителей');
        $this->excel->getActiveSheet()->mergeCells('J5:K5');

        $this->excel->getActiveSheet()->setCellValue('J6', 'всего');
        $this->excel->getActiveSheet()->setCellValue('K6', 'в смене');

        $this->excel->getActiveSheet()->setCellValue('L5', 'Количество диспетчеров');
        $this->excel->getActiveSheet()->mergeCells('L5:M5');
        $this->excel->getActiveSheet()->setCellValue('L6', 'всего');
        $this->excel->getActiveSheet()->setCellValue('M6', 'в смене');

        $this->excel->getActiveSheet()->setCellValue('N4', 'Техника');
        $this->excel->getActiveSheet()->mergeCells('N4:T4');

        $this->excel->getActiveSheet()->setCellValue('N5', 'Наименование');
        $this->excel->getActiveSheet()->mergeCells('N5:N6');

        $this->excel->getActiveSheet()->setCellValue('O5', 'Марка');
        $this->excel->getActiveSheet()->mergeCells('O5:O6');
        
                $this->excel->getActiveSheet()->setCellValue('P5', 'Вид');
        $this->excel->getActiveSheet()->mergeCells('P5:P6');

        $this->excel->getActiveSheet()->setCellValue('Q5', 'Объем цистерны');
        $this->excel->getActiveSheet()->mergeCells('Q5:Q6');

        $this->excel->getActiveSheet()->setCellValue('R5', 'Мин.боевой расчет');
        $this->excel->getActiveSheet()->mergeCells('R5:R6');

        $this->excel->getActiveSheet()->setCellValue('S5', 'Тип');
        $this->excel->getActiveSheet()->mergeCells('S5:S6');
        
        $this->excel->getActiveSheet()->setCellValue('T5', 'Номерной знак');
        $this->excel->getActiveSheet()->mergeCells('T5:T6');

        $this->excel->getActiveSheet()->setCellValue('U4', 'Телефон ЦОУ');
        $this->excel->getActiveSheet()->mergeCells('U4:U6');

      /*  $this->excel->getActiveSheet()->setCellValue('T4', 'В какие нас.пункты района,сеседних районов привлекается на тушение(район выезда)');
        $this->excel->getActiveSheet()->mergeCells('T4:T6');*/

        //конец шапка таблицы



        $row_start = 7; //начальная ячейка для вывода данных
        $i = 0;
        $techCount = 0;
        $p = 0;
        foreach ($data['recordkey'] as $row) {

            unset($recKey);
            $x = 0;
            $recKey = $row->id_record;

            foreach ($data['report'] as $row) {//количество единиц техники
                if ($row->id_record == $recKey)
                    $x++;
            }
            $techCount+=$x;
            foreach ($data['report'] as $row) {

                if ($row->id_record == $recKey) {
                    $p++;
                    $row_next = $row_start + $i;
                    $z = $row_next + $x - 1;
                    
                    
                     if ($row->orgid == 6 || $row->orgid == 8) {//ПАСО, РОСН
                        $disl = $row->divizion_name .', '. $row->disloc;
                    } else {
                        $disl = $row->divizion_name . ' №' . $row->divizion_num .', '. $row->disloc;
                    }

                    //$height_cell = $this->height_for_cell($disl, $row_next - $z);
                     $height_cell = $this->height_for_cell($disl, $row_next - $z);
                    for ($k = $row_next; $k <= $z; $k++) {
                        //$this->excel->getActiveSheet()->getStyle('A' . $k . ':U' . $k)->getAlignment()->setWrapText(true);
                        if ($k == $z)
                            $this->excel->getActiveSheet()->getRowDimension($k)->setRowHeight($height_cell);
                    }


                    $this->excel->getActiveSheet()->setCellValue('A' . $row_next, $row->region_name);
                    $this->excel->getActiveSheet()->mergeCells('A' . $row_next . ':A' . $z);

                    $o = $row->local_name . ' ' . $row->organ_name;
                    $this->excel->getActiveSheet()->setCellValue('B' . $row_next, $o);
                    $this->excel->getActiveSheet()->mergeCells('B' . $row_next . ':B' . $z);


                    $this->excel->getActiveSheet()->setCellValue('C' . $row_next, preg_replace("/ {2,}/"," ",$disl));
                    $this->excel->getActiveSheet()->mergeCells('C' . $row_next . ':C' . $z);

                    if (preg_match("/^[a-zA-Z0-9,\.]+$/", $row->latitude)) {//сохранить в виде xx.xxxxxx, а не xx,xxxxxx
                        $this->excel->getActiveSheet()->getCell('D' . $row_next)->setValueExplicit($row->latitude, PHPExcel_Cell_DataType::TYPE_STRING);
                    } else {
                        $this->excel->getActiveSheet()->setCellValue('D' . $row_next, $row->latitude);
                    }
                    // $this->excel->getActiveSheet()->setCellValue('D' . $row_next, $row->latitude);
                    $this->excel->getActiveSheet()->mergeCells('D' . $row_next . ':D' . $z);

                    if (preg_match("/^[a-zA-Z0-9,\.]+$/", $row->latitude)) {//сохранить в виде xx.xxxxxx, а не xx,xxxxxx
                        $this->excel->getActiveSheet()->getCell('E' . $row_next)->setValueExplicit($row->longitude, PHPExcel_Cell_DataType::TYPE_STRING);
                    } else {
                        $this->excel->getActiveSheet()->setCellValue('E' . $row_next, $row->longitude);
                    }

                    // $this->excel->getActiveSheet()->setCellValue('E' . $row_next, $row->longitude);
                    $this->excel->getActiveSheet()->mergeCells('E' . $row_next . ':E' . $z);

                    $this->excel->getActiveSheet()->setCellValue('F' . $row_next, $row->count_div);
                    $this->excel->getActiveSheet()->mergeCells('F' . $row_next . ':F' . $z);

                    $this->excel->getActiveSheet()->setCellValue('G' . $row_next, $row->change_one);
                    $this->excel->getActiveSheet()->mergeCells('G' . $row_next . ':G' . $z);

                    $this->excel->getActiveSheet()->setCellValue('H' . $row_next, $row->change_two);
                    $this->excel->getActiveSheet()->mergeCells('H' . $row_next . ':H' . $z);

                    $this->excel->getActiveSheet()->setCellValue('I' . $row_next, $row->change_three);
                    $this->excel->getActiveSheet()->mergeCells('I' . $row_next . ':I' . $z);

                    $this->excel->getActiveSheet()->setCellValue('J' . $row_next, $row->driver_all);
                    $this->excel->getActiveSheet()->mergeCells('J' . $row_next . ':J' . $z);

                    $this->excel->getActiveSheet()->setCellValue('K' . $row_next, $row->driver_change);
                    $this->excel->getActiveSheet()->mergeCells('K' . $row_next . ':K' . $z);

                    $this->excel->getActiveSheet()->setCellValue('L' . $row_next, $row->disp_all);
                    $this->excel->getActiveSheet()->mergeCells('L' . $row_next . ':L' . $z);

                    $this->excel->getActiveSheet()->setCellValue('M' . $row_next, $row->disp_change);
                    $this->excel->getActiveSheet()->mergeCells('M' . $row_next . ':M' . $z);



                    $i = $i + $x;
                    $num = $row_next;
                    break;
                }
            }
            $y = 0;

            foreach ($data['report'] as $row) {
                if ($row->id_record == $recKey) {
                    $y++;

                    $this->excel->getActiveSheet()->setCellValue('N' . $num, $row->name_teh);
                    $this->excel->getActiveSheet()->setCellValue('O' . $num, $row->mark);
                     $this->excel->getActiveSheet()->setCellValue('P' . $num, $row->vid);
                    $this->excel->getActiveSheet()->setCellValue('Q' . $num, $row->v);
                    $this->excel->getActiveSheet()->setCellValue('R' . $num, $row->calculation);
                    $this->excel->getActiveSheet()->setCellValue('S' . $num, $row->type_name);
                    $this->excel->getActiveSheet()->setCellValue('T' . $num, $row->numbsign);

                    $num ++;

                    if ($y == 1) {


                        $this->excel->getActiveSheet()->setCellValue('U' . $row_next, preg_replace("/ {2,}/"," ", $row->phone));
                        $this->excel->getActiveSheet()->mergeCells('U' . $row_next . ':U' . $z);
                        
                       

                        /*$this->excel->getActiveSheet()->setCellValue('T' . $row_next, $row->local_exit);
                        $this->excel->getActiveSheet()->mergeCells('T' . $row_next . ':T' . $z);*/
                    }
                    $d = $num - 1;
                }
            }
        }
        /* количество органов */
        $rosn = 0;
        foreach ($data['report'] as $row) {
            if ($row->orgid == 8) {//ROSN это 1 орган
                $rosn = 1;
            } else
                $idCard[] = $row->id_card;
        }

        if (!empty($idCard)) {
            $countOrgans = array_unique($idCard);
            $countOrgans = count($countOrgans) + $rosn;
        } else
            $countOrgans = $rosn;
        /* конец количество органов */
        $dd = $d + 1;
        $tt = 'Общее количество единиц техники: ' . $techCount;
        $co = 'Общее количество органов: ' . $countOrgans;
        $pp = 'Общее количество подразделений: ' . $p;

        $this->excel->getActiveSheet()->setCellValue('A' . $dd, $tt);
        $this->excel->getActiveSheet()->mergeCells('A' . $dd . ':M' . $dd);
        $dd++;
        $this->excel->getActiveSheet()->setCellValue('A' . $dd, $co);
        $this->excel->getActiveSheet()->mergeCells('A' . $dd . ':M' . $dd);

        $dd++;
        $this->excel->getActiveSheet()->setCellValue('A' . $dd, $pp);
        $this->excel->getActiveSheet()->mergeCells('A' . $dd . ':M' . $dd);


        //**************** style *******************************
        // $d = $row_next - 1;

//выравнивание по центру ячейки
        $this->excel->getActiveSheet()->getStyle('A1' . ':U' . $d)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('A1' . ':U' . $d)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        //выравнивание по центру по гориз и по вертикали по верхн краю ячейки
        $this->excel->getActiveSheet()->getStyle('C7' . ':C' . $d)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C7' . ':C' . $d)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
        $this->excel->getActiveSheet()->getStyle('T7' . ':U' . $d)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('T7' . ':U' . $d)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

        $this->excel->getActiveSheet()->getStyle('A1' . ':U' . $d)->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('A1' . ':U' . $d)->getAlignment()->setWrapText(true);

        $this->excel->getActiveSheet()->getStyle('A1' . ':U' . $d)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        //$this->excel->getActiveSheet()->getStyle('A1:T3')->getFill()->getStartColor()->applyFromArray(array('rgb' => 'C2FABD'));
        //$this->excel->getActiveSheet()->getStyle('4')->getBorders()->getBottom()->applyFromArray(array('style' => PHPExcel_Style_Border::BORDER_THICK, 'color' => array('rgb' => '000000')));
        // $this->excel->getActiveSheet()->getCell('D7' . ':D' . $d)->setValueExplicit('1.1', PHPExcel_Cell_DataType::TYPE_STRING);
        $this->excel->getActiveSheet()->getStyle("A4:U6")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THICK,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
        ); //шапка таблицы

        $this->excel->getActiveSheet()->getStyle('A4:U6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cedec7'); //фон шапки

        $this->excel->getActiveSheet()->getStyle('A7' . ':U' . $d)->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )
                )
        ); //таблица border


        $arHeadStyle = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),
                'size' => 10
            )
        );
        $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($arHeadStyle); //заголовок таблицы

        $this->excel->getActiveSheet()->getStyle('A1' . ':U' . $dd)->getFont()->setName('Times New Roman'); //шрифт


        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(13);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(16);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(7);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(7);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(7);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(7);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(7);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(7);
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(7);
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(8);
        $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(8);
        $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(7);
        $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(8);

        $this->excel->getActiveSheet()->getRowDimension(4)->setRowHeight(47);
        $this->excel->getActiveSheet()->getRowDimension(5)->setRowHeight(37);
        $this->excel->getActiveSheet()->getRowDimension(6)->setRowHeight(30);

        //**************** end style *******************************

        $filename = 'Учет сил и средств.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');

        //  **************** end export to excel **************************
        //  $this->load->view('templates/footer');
    }

    public function height_for_cell($str, $count_cell_merge) {
        $height_cell = 3; //px
        $length_field = strlen($str);
        // $arrayBlock = array(); //массив строк
        // $next_char = 0;
        /* if ($length_field < COUNT_CHARS_PER_STR) {//если строка не помещается в одну
          while ($other_str >= 0) {
          $arrayBlock[] = substr($str, $next_char, COUNT_CHARS_PER_STR);
          $next_char+=COUNT_CHARS_PER_STR; //передвигаемся на слудующий символ строки
          $other_str = $length_field - COUNT_CHARS_PER_STR; //осталось для обработки
          }
          $need_row_for_field = ceil($length_field/$height_cell);
          } else {

          } */
        if ($length_field > COUNT_CHARS_PER_STR) {
            $need_row = ceil($length_field / COUNT_CHARS_PER_STR); //кол-во строк в тексте
            $need_height_all = $need_row * $height_cell; //всего размер текста в пикселях

            if ($count_cell_merge > 1) {//если ячека объединенная
               
                return ceil($need_height_all / $count_cell_merge)+5;
            } else {//если одинарная
                return $need_height_all + 13;
            }
        } else {//если текст меньше COUNT_CHARS_PER_STR символов
            return $height_cell + 25;
        }
    }

}
