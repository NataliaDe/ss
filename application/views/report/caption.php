<?php

/* if (!empty($caption)) {//name card орган
  foreach ($caption as $row) {
  $name = $row->auth;
  }
  } elseif (!empty($captionReg)) {//name card область
  foreach ($captionReg as $row) {
  $name = $row->head;
  }
  } elseif (!empty($captionLoc)) {//name card район
  foreach ($captionLoc as $row) {
  $name = $row->locname;
  }
  } elseif (!empty($captionROSN)) {//name card ROSN
  foreach ($captionROSN as $row) {
  $name = $row->head;
  }
  } else
  $name = '';
  if (!empty($datecaption)) {//date card
  foreach ($datecaption as $row) {
  $datte = $row->dat;
  }
  } elseif (!empty($datecaptionLoc)) {//date card район
  foreach ($datecaptionLoc as $row) {
  $datte = $row->dat;
  }
  } else
  $datte = '';
 */
if (!empty($datecaption)) {//date card
    foreach ($datecaption as $row) {
        $datte = $row->dat;
    }
}
?>
   <a name='result_page'></a>
   <?php
echo '<br>';
echo '<b><center>Карточка учета сил и средств подразделений';
echo '<br>по состоянию на <u>' . $datte . '</u></center></b>';
