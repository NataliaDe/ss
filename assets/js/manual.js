/*function addField(n)

 var telnum = parseInt($('#add_field_area').find('div.add:last').attr('id').slice(3)) + 1;
 $('div#add_field_area').append('<hr> <div id="add' + telnum + '" class="add">');
 for (var i = 1; i <= n; i++) {

 if (i === 1) {

 $('div#add' + telnum + '').append('<div class="row"><label class="control-label col-sm-4 col-lg-3 col-xs-4" for="technicName">Наименование</label><div class="col-sm-6 col-lg-5 col-md-7 col-xs-7"><div class="form-group"><select class="form-control" name="technicName[' + telnum + ']" id="technicName' + telnum + '" onclick="technicName(' + telnum + ');" ><option></option><?php foreach ($views as $row) { printf("<p><option value=%s><label>%s</label></option></p>", $row->id, $row->name);} ?></select></div></div>');
 }
 if (i === 2) {

 $('div#add' + telnum + '').append('    <div class="row"><label class="control-label col-sm-4 col-lg-3 col-xs-4" for="mark">Марка</label><div class="col-sm-6 col-lg-2 col-md-7 col-xs-7"><div class="form-group"><input type="text" class="form-control" id="mark' + telnum + '" placeholder="Марка" name="mark[' + telnum + ']" data-toggle="tooltip" data-placement="left" title="Русск/англ. заглавные буквы - , ()" required="required"></div></div><label class="control-label col-sm-4 col-lg-1 col-xs-4" for="v">Объем цистерны</label><div class="col-sm-6 col-lg-2 col-md-7 col-xs-7"><div class="form-group"><input type="text" class="form-control" id="v" placeholder="Объем цистерны" name="v"></div></div></div>');
 }
 if (i === 3) {
 $('div#add' + telnum + '').append('  <div class="row"><label class="control-label col-sm-4 col-lg-3 col-xs-4"  for="type">Тип</label><div class="col-sm-6 col-lg-2 col-md-7 col-xs-7"><div class="form-group"><select class="form-control" name="type[' + telnum + ']" id="type' + telnum + '"><option></option><?php foreach ($types as $row) { printf("<p><option value=%s ><label>%s</label></option></p>", $row->id, $row->name);} ?></select></div></div><label class="control-label col-sm-4 col-lg-2 col-xs-4" for="calculation">Минимальный боевой расчет</label> <div class="col-sm-6 col-lg-1 col-md-7 col-xs-7"> <div class="form-group"><input type="text" class="form-control" id="calculation" placeholder="Минимальный боевой расчет" name="calculation" ></div></div></div>');
 }
 if (i === 4) {
 $('div#add' + telnum + '').append('<div class="deletebutton" onclick="deleteField(' + telnum + ');"></div></div></div>');
 }

 }
 }
 //<div class="deletebutton" onclick="deleteField(' + telnum + ');"></div>
 function deleteField(id) {
 $('div#add' + id).remove();
 writeFieldsVlues();
 }

 function technicName(id) {

 }

 //марка
 function checkMark(id) {
 $('div#add' + id).find('#mark').keypress(function (key) {
 if ((key.charCode < 40) || ((key.charCode > 41) && (key.charCode < 44)) || ((key.charCode > 45) && (key.charCode < 48)) || ((key.charCode > 57) && (key.charCode < 65)) || ((key.charCode > 90) && (key.charCode < 188)) || ((key.charCode > 189) && (key.charCode < 1040)) || (key.charCode > 1071))
 return false;
 });
 /*if(document.forms['fill'].mark.value==='') {
 alert('111');
 }*/
//}
//v АЦ
/*function checkV(id) {
 $('div#add' + id).find('#v').keypress(function (key) {
 if ((key.charCode < 48) || (key.charCode > 57))
 return false;
 });
 }
 //мин.боевой расчет
 function checkCalc(id) {
 $('div#add' + id).find('#calculation').keypress(function (key) {
 if ((key.charCode < 48) || (key.charCode > 57))
 return false;
 });
 }
 */



 $(function () { //всплывающая подсказка
    $("[data-toggle='tooltip']").tooltip();
  });

function buttonDisTrue () {
          if(document.getElementById("createAdd")) { //button create submit
             document.getElementById("createAdd").disabled = true;
         }
         if( document.getElementById("recordEdit")) { //button record submit
            document.getElementById("recordEdit").disabled = true;
        }
        if( document.getElementById("continueFill")) { //button record submit
            document.getElementById("continueFill").disabled = true;
        }
        if( document.getElementById("exitFill")) { //button record submit
            document.getElementById("exitFill").disabled = true;
        }
      }

       function buttonDisFalse () {
               if(document.getElementById("createAdd")) { //button create submit
             document.getElementById("createAdd").disabled = false;
         }
         if( document.getElementById("recordEdit")) { //button record submit
            document.getElementById("recordEdit").disabled = false;
        }
        if( document.getElementById("continueFill")) { //button record submit
            document.getElementById("continueFill").disabled = false;
        }
        if( document.getElementById("exitFill")) { //button record submit
            document.getElementById("exitFill").disabled = false;
        }

       }


function see(i) {// скрыть/показать р-н выезда

var p=document.getElementById('sp'+i);
	if(p.style.display=="none"){
		p.style.display="block";
            }
	else{
		p.style.display="none";
            }

  }

function focOnTechnic(i) {
   /* если заполнена марка авто, должно быть заполнено  наименование */
    if($('#mark'+i).val() !== '') {
       if($('#technicName'+i).val() === '') {
            //alert('Выберите наименование техники!!!');
            $('#technicName'+i).focus();
            $('#technicName'+i).css({'backgroundColor' : '#FF6A6A'});

       buttonDisTrue();

       }
         else {
          $('#technicName'+i).css({'backgroundColor' : 'white'});

       buttonDisFalse();
      }

      //номерной знак обязательный для заполнения
           if($('#numbsign'+i).val() === '') {
            //alert('Выберите наименование техники!!!');
            //$('#numbsign'+i).focus();
            $('#numbsign'+i).css({'backgroundColor' : '#FF6A6A'});

       buttonDisTrue();

       }
         else {
          $('#numbsign'+i).css({'backgroundColor' : 'white'});

       buttonDisFalse();
      }
    }
}

//убираем фокус с номерного знака-проверяем, если заполнена марка+наименование, то проверить на заполненность номерной знак
function focFromNumbSign(i) {
    /* если заполнена марка авто, должно быть заполнено  наименование */
    if ($('#mark' + i).val() !== '' || $('#technicName' + i).val() !== '') {

        //номерной знак обязательный для заполнения
        if ($('#numbsign' + i).val() === '') {
            //alert('Выберите наименование техники!!!');
            $('#numbsign' + i).focus();
            $('#numbsign' + i).css({'backgroundColor': '#FF6A6A'});

            buttonDisTrue();

        }
        else {
//            var d = $('#numbsign' + i).val();
//            //на 6 позиции должно быть -
//            if (d.indexOf("-") === 6) {
//                $('#numbsign' + i).css({'backgroundColor': 'white'});
//                buttonDisFalse();
//            }
//            else {
//                $('#numbsign' + i).css({'backgroundColor': '#FF6A6A'});
//
//                buttonDisTrue();
//            }
 $('#numbsign' + i).css({'backgroundColor': 'white'});
                buttonDisFalse();

        }
    }
}

//при отпускании клавиши номерном знаке
function upNumbSign(i) {
    /* если заполнена марка авто, должно быть заполнено  наименование */
    if ($('#mark' + i).val() !== '' || $('#technicName' + i).val() !== '') {

        //номерной знак обязательный для заполнения
        if ($('#numbsign' + i).val() === '') {
            //alert('Выберите наименование техники!!!');
            $('#numbsign' + i).focus();
            $('#numbsign' + i).css({'backgroundColor': '#FF6A6A'});

            buttonDisTrue();

        }
        else {
            ////Номерной знак 8 символов
//            if ($('#numbsign' + i).length === 8) {
//
//                $('#numbsign' + i).css({'backgroundColor': 'white'});
//                buttonDisTrue();
//            }
//            //ошибка, если <8
//            else {
//                $('#numbsign' + i).focus();
//                $('#numbsign' + i).css({'backgroundColor': '#FF6A6A'});
//
//                buttonDisTrue();
//            }
          $('#numbsign' + i).css({'backgroundColor': 'white'});
                buttonDisTrue();

        }

    }
}



function colorWhite(i) {
          $('#technicName'+i).css({'backgroundColor' : 'white'});
 /*document.getElementById("recordEdit").disabled = false;*/
}


function gh(i) {
   //alert(i);
    if(($('#mark'+i).val() !== '') &&($('#technicName'+i).val() !== '')) {
       if($('#type'+i).val() === '') {
            //alert('Выберите тип техники!!!');
            $('#type'+i).focus();
              $('#type'+i).css({'backgroundColor' : '#FF6A6A'});
             // document.getElementById("recordEdit").disabled = true;
           // $('#technicName'+i+1).blur();
       }
      else {
           $('#type'+i).css({'backgroundColor' : 'white'});
           // document.getElementById("recordEdit").disabled = false;
      }

    }
}
function colorWhiteType(i) {
          $('#type'+i).css({'backgroundColor' : 'white'});
  // document.getElementById("recordEdit").disabled = false;
}


function funcPrint() {//печать страницы
    window.print();
}

$(document).ready(function () {  // поиск значения в выпад меню
$(".chosen-select-deselect").chosen({
   allow_single_deselect: true,
   width: '100%'

});
});

//------------------------------------------------------------ DataTables список карточек  tbl --------------------------------------------------------------------------
(function ($, undefined) {
    $(function () {
        $('#tbl, #tbl3, #tbl5').DataTable({
            language: {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            }
        });
    });
})(jQuery);

//DataTables
$(document).ready(function () {
    $("tfoot").css("display", "table-header-group");




 var table = $('#tbl').DataTable();
    $("#tbl tfoot th").each(function (i) {

if(i !== 1){
            if ((i == 0)||(i == 3)||(i == 4)||(i == 6)) {//выпадающий список
                var select = $('<select class="' + i + '  noprint"><option value=""></option></select>')
                        .appendTo($(this).empty())
                        .on('change', function () {

                            var val = $(this).val();

                            table.column(i) //Only the first column
                                    .search(val ? '^' + $(this).val() + '$' : val, true, false)
                                    .draw();
                        });
                table.column(i).data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });

            } else {//input поиск


                var title = $('#tbl tfoot th').eq($(this).index()).text();
                var x = $('#tbl tfoot th').index($(this));
                var y = 1;
                $(this).html('<input type="text" class="noprint" id="inpt' + y + x + '" placeholder="Поиск ' + title + '" />');


            }
        }





    });

    $("#tbl tfoot input").on('keyup change', function () {
        table
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
    });

    //--------------------------------- classif
 var tbl3 = $('#tbl3').DataTable();
    $("#tbl3 tfoot th").each(function (i) {

if((i !== 1)&&(i !== 2)){
   //input поиск
                var title = $('#tbl3 tfoot th').eq($(this).index()).text();
                var x = $('#tbl3 tfoot th').index($(this));
                var y = 3;
                $(this).html('<input type="text" class="noprint" id="inpt' + y + x + '" placeholder="Поиск ' + title + '" />');
        }
    });

    $("#tbl3 tfoot input").on('keyup change', function () {
        tbl3
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
    });

// --------------------------------------- end classif


    //---------------------------------table with user's list

      var tbl5 = $('#tbl5').DataTable();
    $("#tbl5 tfoot th").each(function (i) {

if((i !== 4)&&(i !== 5)){

    if ((i == 1) ||(i == 2)) {//выпадающий список
                var select = $('<select class="' + i + '  noprint"><option value=""></option></select>')
                        .appendTo($(this).empty())
                        .on('change', function () {

                            var val = $(this).val();

                            tbl5.column(i) //Only the first column
                                    .search(val ? '^' + $(this).val() + '$' : val, true, false)
                                    .draw();
                        });
                tbl5.column(i).data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });

            }
            else {

   //input поиск
                var title = $('#tbl5 tfoot th').eq($(this).index()).text();
                var x = $('#tbl5 tfoot th').index($(this));
                //var y = 4;
                $(this).html('<input type="text" class="noprint" id="inpt' + x + '" placeholder="Поиск ' + title + '" />');
            }
        }
    });

    $("#tbl5 tfoot input").on('keyup change', function () {
        tbl5
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
    });

// --------------------------------------- end table with user's list


});



//---------------------------------------------------------------------- DataTables   count gochs, grochs... ------------------------------------------------------------

$(document).ready(function() { //Show / hide columns dynamically
    var tcount = $('#countorg').DataTable( {
               language: {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            }


    } );

    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();

        // Get the column API object
        var column = tcount.column( $(this).attr('data-column') );

        // Toggle the visibility
        column.visible( ! column.visible() );


    } );

    //******* count divizions  ******************

     var tbl4 = $('#tbl4').DataTable( {
               language: {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            },
            "order": [],
              "aoColumnDefs": [
      { "bSortable": false, "aTargets": [ 0,1,2 ] }
    ]


    } );

    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();

        // Get the column API object
        var column = tbl4.column( $(this).attr('data-column') );

        // Toggle the visibility
        column.visible( ! column.visible() );


    } );


    var tbl4 = $('#tbl4').DataTable();
    $("#tbl4 tfoot th").each(function (i) {

if((i !== 3)&&(i !== 4)&&(i !== 5)&&(i !== 6)&&(i !== 7)){

    if ((i == 0) ||(i == 2)) {//выпадающий список
                var select = $('<select class="' + i + '  noprint"><option value=""></option></select>')
                        .appendTo($(this).empty())
                        .on('change', function () {

                            var val = $(this).val();

                            tbl4.column(i) //Only the first column
                                    .search(val ? '^' + $(this).val() + '$' : val, true, false)
                                    .draw();
                        });
                tbl4.column(i).data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });

            }
            else {

   //input поиск
                var title = $('#tbl4 tfoot th').eq($(this).index()).text();
                var x = $('#tbl4 tfoot th').index($(this));
                var y = 4;
                $(this).html('<input type="text" class="noprint" id="inpt' + y + x + '" placeholder="Поиск ' + title + '" />');
            }
        }
    });

    $("#tbl4 tfoot input").on('keyup change', function () {
        tbl4
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
    });

    //********end count divizions  ******************


} );


//min-max Gochs
/* $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("countorg");
            var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minGochs = parseInt($('#minGochs').val(), 10);
            var maxGochs = parseInt($('#maxGochs').val(), 10);
            var countDiv = parseFloat(data[1]) || 0; // use data for the countDiv column
            console.log(data);

            console.log(settings);
            console.log(dataIndex);
            if ((isNaN(minGochs ) && isNaN(maxGochs)) ||
                    (isNaN(minGochs ) && countDiv <= maxGochs) ||
                    (minGochs  <= countDiv && isNaN(maxGochs)) ||
                    (minGochs  <= countDiv && countDiv <= maxGochs))
            {
                return true;
            }
            return false;


        }
);


//min-max Grochs
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("countorg");
            var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minGrochs = parseInt($('#minGrochs').val(), 10);
            var maxGrochs = parseInt($('#maxGrochs').val(), 10);
            var countDiv = parseFloat(data[3]) || 0; // use data for the countDiv column
            console.log(data);

            console.log(settings);
            console.log(dataIndex);
            if ((isNaN(minGrochs ) && isNaN(maxGrochs)) ||
                    (isNaN(minGrochs ) && countDiv <= maxGrochs) ||
                    (minGrochs  <= countDiv && isNaN(maxGrochs)) ||
                    (minGrochs  <= countDiv && countDiv <= maxGrochs))
            {
                return true;
            }
            return false;


        }
);


//min-max Rochs
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("countorg");
            var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minRochs = parseInt($('#minRochs').val(), 10);
            var maxRochs = parseInt($('#maxRochs').val(), 10);
            var countDiv = parseFloat(data[5]) || 0; // use data for the countDiv column
            console.log(data);

            console.log(settings);
            console.log(dataIndex);
            if ((isNaN(minRochs ) && isNaN(maxRochs)) ||
                    (isNaN(minRochs ) && countDiv <= maxRochs) ||
                    (minRochs  <= countDiv && isNaN(maxRochs)) ||
                    (minRochs  <= countDiv && countDiv <= maxRochs))
            {
                return true;
            }
            return false;


        }
);

//min-max Dall
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("countorg");
            var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minDall = parseInt($('#minDall').val(), 10);
            var maxDall = parseInt($('#maxDall').val(), 10);
            var countDiv = parseFloat(data[7]) || 0; // use data for the countDiv column
            console.log(data);

            console.log(settings);
            console.log(dataIndex);
            if ((isNaN(minDall ) && isNaN(maxDall)) ||
                    (isNaN(minDall ) && countDiv <= maxDall) ||
                    (minDall  <= countDiv && isNaN(maxDall)) ||
                    (minDall  <= countDiv && countDiv <= maxDall))
            {
                return true;
            }
            return false;


        }
);
*/
//---------------------------------------------------------------------- DataTables end  count gochs, grochs... ------------------------------------------------------------


//---------------------------------------------------------------------- DataTables   общая информация  tbl1 ------------------------------------------------------------

(function ($, undefined) {
    $(function () {
        $('#tbl1').DataTable({
            language: {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            }



           /*  dom: 'Bfrtip',
 dom: 'Bfrtip',
        buttons: [ {
            extend: 'excelHtml5',
            customize: function ( xlsx ){
           //console.log(xlsx);
        var sheet = xlsx.xl.worksheets['sheet1.xml'];
           //  $('c[r=A0] t', sheet).text( 'Custom text' );
            $('row c[r*="A1"]', sheet).text( 'Custom text' );
               $('row c[r*="1"]', sheet).attr( 's', '25' );
        var downrows = 3;
        var clRow = $('row', sheet);
        //update Row
        clRow.each(function () {
            var attr = $(this).attr('r');
            var ind = parseInt(attr);
            ind = ind + downrows;
            $(this).attr("r",ind);
        });

        // Update  row > c
      $('row c ', sheet).each(function () {
            var attr = $(this).attr('r');
            var pre = attr.substring(0, 1);
            var ind = parseInt(attr.substring(1, attr.length));
            ind = ind + downrows;
            $(this).attr("r", pre + ind);
        });


            }
        } ]*/
        });
    });
})(jQuery);



//DataTables
$(document).ready(function () {
    var table = $('#tbl1').DataTable();
    $("#tbl1 tfoot th").each(function (i) {

        if (i != 13) {

            if ((i == 0) || (i == 2)) {//выпадающий список
                var select = $('<select class="' + i + '  noprint"><option value=""></option></select>')
                        .appendTo($(this).empty())
                        .on('change', function () {

                            var val = $(this).val();

                            table.column(i) //Only the first column
                                    .search(val ? '^' + $(this).val() + '$' : val, true, false)
                                    .draw();
                        });
                table.column(i).data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });

            } else {//input поиск


                var title = $('#tbl1 tfoot th').eq($(this).index()).text();
                var x = $('#tbl1 tfoot th').index($(this));
                var y = 1;
                $(this).html('<input type="text" class="noprint" id="inpt' + y + x + '" placeholder="Поиск ' + title + '" />');


            }

        }



    });

    var table = $('#tbl1').DataTable();
    $("#tbl1 tfoot input").on('keyup change', function () {
        table
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
    });
});

//------------------------------------------------------------ DataTables инф по технике  tbl2 --------------------------------------------------------------------------
(function ($, undefined) {
    $(function () {
        $('#tbl2').DataTable({
            language: {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            }
        });
    });
})(jQuery);

//DataTables
$(document).ready(function () {

    var table = $('#tbl2').DataTable();

    $("#tbl2 tfoot th").each(function (i) {

        if ((i == 1) || (i == 2) || (i == 3) || (i == 5) || (i == 6)) {//input поиск
            var title = $('#tbl2 tfoot th').eq($(this).index()).text();
            var x = $('#tbl2 tfoot th').index($(this));
            var y = 2;
            $(this).html('<input type="text" class="noprint" id="inpt' + y + x + '" placeholder="Поиск ' + title + '" />');

        } else {
            var select = $('<select class="' + i + '  noprint"><option value=""></option></select>')
                    .appendTo($(this).empty())
                    .on('change', function () {

                        var val = $(this).val();

                        table.column(i) //Only the first column
                                .search(val ? '^' + $(this).val() + '$' : val, true, false)
                                .draw();
                    });

            table.column(i).data().unique().sort().each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
            });
        }
    });

    var table = $('#tbl2').DataTable();
    $("#tbl2 tfoot input").on('keyup change', function () {
        table
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
    });
});

//-------------------------------------------------------------------фильтр штатная числ.подразделения для tbl1 -------------------------------------------------------------------

//числ.подразделения

$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("tbl1");
            var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minDiv = parseInt($('#minDiv').val(), 10);
            var maxDiv = parseInt($('#maxDiv').val(), 10);
            var countDiv = parseFloat(data[5]) || 0; // use data for the countDiv column
            console.log(data);

            console.log(settings);
            console.log(dataIndex);
            if ((isNaN(minDiv) && isNaN(maxDiv)) ||
                    (isNaN(minDiv) && countDiv <= maxDiv) ||
                    (minDiv <= countDiv && isNaN(maxDiv)) ||
                    (minDiv <= countDiv && countDiv <= maxDiv))
            {
                return true;
            }
            return false;


        }
);
// число л/с смены 1
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("tbl1");
 var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minOne = parseInt($('#minOne').val(), 10);
            var maxOne = parseInt($('#maxOne').val(), 10);
            var countOne = parseFloat(data[6]) || 0; // use data for the countDiv column

            if ((isNaN(minOne) && isNaN(maxOne)) ||
                    (isNaN(minOne) && countOne <= maxOne) ||
                    (minOne <= countOne && isNaN(maxOne)) ||
                    (minOne <= countOne && countOne <= maxOne))
            {
                return true;
            }
            return false;
        }
);
// число л/с смены 2
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("tbl1");
             var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }

            var minTwo = parseInt($('#minTwo').val(), 10);
            var maxTwo = parseInt($('#maxTwo').val(), 10);
            var countTwo = parseFloat(data[7]) || 0; // use data for the countDiv column

            if ((isNaN(minTwo) && isNaN(maxTwo)) ||
                    (isNaN(minTwo) && countTwo <= maxTwo) ||
                    (minTwo <= countTwo && isNaN(maxTwo)) ||
                    (minTwo <= countTwo && countTwo <= maxTwo))
            {
                return true;
            }
            return false;
        }
);
// число л/с смены 3
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("tbl1");
 var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minThree = parseInt($('#minThree').val(), 10);
            var maxThree = parseInt($('#maxThree').val(), 10);
            var countThree = parseFloat(data[8]) || 0; // use data for the countDiv column

            if ((isNaN(minThree) && isNaN(maxThree)) ||
                    (isNaN(minThree) && countThree <= maxThree) ||
                    (minThree <= countThree && isNaN(maxThree)) ||
                    (minThree <= countThree && countThree <= maxThree))
            {
                return true;
            }
            return false;
        }
);

// число водителей всего
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("tbl1");
 var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minDrAll = parseInt($('#minDrAll').val(), 10);
            var maxDrAll = parseInt($('#maxDrAll').val(), 10);
            var countDrAll = parseFloat(data[9]) || 0; // use data for the countDiv column

            if ((isNaN(minDrAll) && isNaN(maxDrAll)) ||
                    (isNaN(minDrAll) && countDrAll <= maxDrAll) ||
                    (minDrAll <= countDrAll && isNaN(maxDrAll)) ||
                    (minDrAll <= countDrAll && countDrAll <= maxDrAll))
            {
                return true;
            }
            return false;
        }
);
// число водителей в смене
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("tbl1");
 var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minDrChange = parseInt($('#minDrChange').val(), 10);
            var maxDrChange = parseInt($('#maxDrChange').val(), 10);
            var countDrChange = parseFloat(data[10]) || 0; // use data for the countDiv column

            if ((isNaN(minDrChange) && isNaN(maxDrChange)) ||
                    (isNaN(minDrChange) && countDrChange <= maxDrChange) ||
                    (minDrChange <= countDrChange && isNaN(maxDrChange)) ||
                    (minDrChange <= countDrChange && countDrChange <= maxDrChange))
            {
                return true;
            }
            return false;
        }
);
// число диспетчеров всего
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("tbl1");
 var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minDispAll = parseInt($('#minDispAll').val(), 10);
            var maxDispAll = parseInt($('#maxDispAll').val(), 10);
            var countDispAll = parseFloat(data[11]) || 0; // use data for the countDiv column

            if ((isNaN(minDispAll) && isNaN(maxDispAll)) ||
                    (isNaN(minDispAll) && countDispAll <= maxDispAll) ||
                    (minDispAll <= countDispAll && isNaN(maxDispAll)) ||
                    (minDispAll <= countDispAll && countDispAll <= maxDispAll))
            {
                return true;
            }
            return false;
        }


);
// число диспетчеров в смене
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("tbl1");
 var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minDispChange = parseInt($('#minDispChange').val(), 10);
            var maxDispChange = parseInt($('#maxDispChange').val(), 10);
            var countDispChange = parseFloat(data[12]) || 0; // use data for the countDiv column

            if ((isNaN(minDispChange) && isNaN(maxDispChange)) ||
                    (isNaN(minDispChange) && countDispChange <= maxDispChange) ||
                    (minDispChange <= countDispChange && isNaN(maxDispChange)) ||
                    (minDispChange <= countDispChange && countDispChange <= maxDispChange))
            {
                return true;
            }
            return false;
        }
);

$(document).ready(function () {
    var table1 = $('#tbl1').DataTable();
     var countorg = $('#countorg').DataTable();

    // Event listener to the two range filtering inputs to redraw on input
    $('#minDiv, #maxDiv').keyup(function () {//числ.подразделения
        table1.draw();
    });

    $('#minOne, #maxOne').keyup(function () {// число л/с смены 1
        table1.draw();
    });
    $('#minTwo, #maxTwo').keyup(function () {// число л/с смены 2
        table1.draw();
    });
    $('#minThree, #maxThree').keyup(function () {// число л/с смены 3
        table1.draw();
    });
    $('#minDrAll, #maxDrAll').keyup(function () {// число водителей всего
        table1.draw();
    });
    $('#minDrChange, #maxDrChange').keyup(function () {// число водителей в смене
        table1.draw();
    });
    $('#minDispAll, #maxDispAll').keyup(function () {// число диспетчеров всего
        table1.draw();
    });
    $('#minDispChange, #maxDispChange').keyup(function () {// число диспетчеров в смене
        table1.draw();
    });

   /*
    // for table countorg
      $('#minGochs, #maxGochs').keyup(function () {// Gochs
       countorg.draw();
    });
          $('#minGrochs, #maxGrochs').keyup(function () {// Grochs
       countorg.draw();
    });
          $('#minRochs, #maxRochs').keyup(function () {// Rochs
        countorg.draw();
    });
          $('#minDall, #maxDall').keyup(function () {// all
        countorg.draw();
    });
    */

});
//-------------------------------------------------------------------конец фильтр штатная числ.подразделения  -------------------------------------------------------------------


//-------------------------------------------------------------------фильтр техника для tbl2  --------------------------------------------------------------------------------------------
// объем цистерны
//var tablesToSearchArray = new Array("tbl2");
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var tablesToSearchArray = new Array("tbl2");
 var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minV = parseInt($('#minV').val(), 10);
            var maxV = parseInt($('#maxV').val(), 10);
            var countV = parseFloat(data[2]) || 0; // use data for the countDiv column

            if ((isNaN(minV) && isNaN(maxV)) ||
                    (isNaN(minV) && countV <= maxV) ||
                    (minV <= countV && isNaN(maxV)) ||
                    (minV <= countV && countV <= maxV))
            {
                return true;
            }
            return false;
        }
);
// мин.боевой расчет
$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
                var tablesToSearchArray = new Array("tbl2");
 var api = new $.fn.dataTable.Api(settings);
            var tableId = api.table().node().id;
            if (tablesToSearchArray.indexOf(tableId) === -1) {
                return true;
            }
            var minCalc = parseInt($('#minCalc').val(), 10);
            var maxCalc = parseInt($('#maxCalc').val(), 10);
            var countCalc = parseFloat(data[3]) || 0; // use data for the countDiv column

            if ((isNaN(minCalc) && isNaN(maxCalc)) ||
                    (isNaN(minCalc) && countCalc <= maxCalc) ||
                    (minCalc <= countCalc && isNaN(maxCalc)) ||
                    (minCalc <= countCalc && countCalc <= maxCalc))
            {
                return true;
            }
            return false;
        }
);

$(document).ready(function () {
    var table2 = $('#tbl2').DataTable();
    // Event listener to the two range filtering inputs to redraw on input
    $('#minV, #maxV').keyup(function () {// объем цистерны
        table2.draw();
    });
    $('#minCalc, #maxCalc').keyup(function () { // мин.боевой расчет
        table2.draw();
    });
});
//------------------------------------------------------------------- конец фильтр техника  ------------------------------------------------------------------------------------

function getMark(i){//value mark field
    var sel=document.getElementById("technicName"+i);
    //document.getElementById("mark"+i).value= sel.options[sel.selectedIndex].text;
    var y=sel.options[sel.selectedIndex].text.lastIndexOf("(");//без description
    var z=sel.options[sel.selectedIndex].text.slice(0,y);
     document.getElementById("mark"+i).value=z;
    //alert(z);
}


// -------------------------------------------------- query/index.php  ------------------------------------------------------------
(function ($, undefined) {
    $(function () {
        $('#tblreq, #tblreqrcu, #tbl_cou_by_local').DataTable({
            language: {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            }
        });
    });
})(jQuery);

//DataTables
$(document).ready(function () {
    $("tfoot").css("display", "table-header-group");

 var tblreq = $('#tblreq').DataTable();
    $("#tblreq tfoot th").each(function (i) {
                var title = $('#tblreq tfoot th').eq($(this).index()).text();
                var x = $('#tblreq tfoot th').index($(this));
                var y = 1;
                $(this).html('<input type="text" class="noprint" id="inpt' + y + x + '" placeholder="Поиск ' + title + '" />');

    });

    $("#tblreq tfoot input").on('keyup change', function () {
        tblreq
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
    });

    //********** tblreqrcu ************
     var tblreqrcu = $('#tblreqrcu').DataTable();
    $("#tblreqrcu tfoot th").each(function (i) {

                if ((i == 0)||(i == 3)) {//выпадающий список
                var select = $('<select class="' + i + '  noprint"><option value=""></option></select>')
                        .appendTo($(this).empty())
                        .on('change', function () {

                            var val = $(this).val();

                            tblreqrcu.column(i) //Only the first column
                                    .search(val ? '^' + $(this).val() + '$' : val, true, false)
                                    .draw();
                        });
                tblreqrcu.column(i).data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });

            } else {//input поиск

             var title = $('#tblreqrcu tfoot th').eq($(this).index()).text();
                var x = $('#tblreqrcu tfoot th').index($(this));
                var y = 1;
                $(this).html('<input type="text" class="noprint" id="inpt' + y + x + '" placeholder="Поиск ' + title + '" />');
            }
    });

    $("#tblreqrcu tfoot input").on('keyup change', function () {
        tblreqrcu
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
    });
    //********** end tblreqrcu ************


     /* table cou by local  */

   var tbl_cou_by_local = $('#tbl_cou_by_local').DataTable();
    $("#tbl_cou_by_local tfoot th").each(function (i) {


    if ((i == 0) ||(i == 2)) {// dropdown list
                var select = $('<select class="' + i + '  noprint"><option value=""></option></select>')
                        .appendTo($(this).empty())
                        .on('change', function () {

                            var val = $(this).val();

                           tbl_cou_by_local.column(i) //Only the first column
                                    .search(val ? '^' + $(this).val() + '$' : val, true, false)
                                    .draw();
                        });
               tbl_cou_by_local.column(i).data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });

            }
            else {

   //input поиск
                var title = $('#tbl_cou_by_local tfoot th').eq($(this).index()).text();
                var x = $('#tbl_cou_by_local tfoot th').index($(this));
                var y = 4;
                $(this).html('<input type="text" class="noprint" id="inpt' + y + x + '" placeholder="Поиск ' + title + '" />');
            }

    });

    $("#tbl_cou_by_local tfoot input").on('keyup change', function () {
      tbl_cou_by_local
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
    });

    /* END cou by local */


});

//--------------------------------------- end  query/index.php  ------------------------------------------------------------


$(document).ready(function () {


      jQuery("#coord_lat").mask("99.9999?99");
      jQuery("#coord_lon").mask("99.9999?99");



      $( "#latitude" ).blur(function() {

  if($( "#latitude" ).val()==="") {//если широта не заполнена

        $('#latitude').css({'backgroundColor' : '#FF6A6A'});

      buttonDisTrue();
  }
  else {
         $('#latitude').css({'backgroundColor' : 'white'});

          if($( "#longitude" ).val()==="") {//если долгота не заполнена
              buttonDisTrue();
          }
          else {
          buttonDisFalse();
    }
  }
});

 $( "#longitude" ).blur(function() {

  if($( "#longitude" ).val()==="") {//если долгота не заполнена

        $('#longitude').css({'backgroundColor' : '#FF6A6A'});

        buttonDisTrue();
  }
  else {
         $('#longitude').css({'backgroundColor' : 'white'});

        if($( "#latitude" ).val()==="") {//если широта не заполнена
             buttonDisTrue();
        }
             else {
          buttonDisFalse();
    }

  }
});

  jQuery("#loc").chained("#reg"); //отчеты, зависимость района от области



    $('#login').keypress(function (key) {
        if ((key.charCode > 47 && key.charCode < 58) || (key.charCode > 64 && key.charCode < 91) || (key.charCode > 96 && key.charCode < 123) || (key.charCode === 95) || (key.charCode === 13))
            return true;
        else
            return false;

    });

    $('#login').keyup(function () {
        var $this = $(this);
        if ($this.val().length > 30)
            $this.val($this.val().substr(0, 30));

    });





    $('#password').keypress(function (key) {
        if ((key.charCode > 47 && key.charCode < 58) || (key.charCode > 64 && key.charCode < 91) || (key.charCode > 96 && key.charCode < 123) || (key.charCode === 13) || (key.charCode === 95))
            return true;
        else
            return false;

    });

    //номер подразделения
    $('#divizionNum').keypress(function (key) {
        if ((key.charCode < 48) || (key.charCode > 57))
            return false;
    });
    //штатная численность подращделения
    $('#countDiv, #countDivmin, #countDivmax').keypress(function (key) {
        if ((key.charCode < 48) || (key.charCode > 57))
            return false;
    });
    //штатная численность смена1
    $('#countChange1, #countChange1min, #countChange1max').keypress(function (key) {
        if ((key.charCode < 48) || (key.charCode > 57))
            return false;
    });
    //штатная численность смена2
    $('#countChange2, #countChange2min, #countChange2max').keypress(function (key) {
        if ((key.charCode < 48) || (key.charCode > 57))
            return false;
    });
    //штатная численность смена3
    $('#countChange3, #countChange3min, #countChange3max').keypress(function (key) {
        if ((key.charCode < 48) || (key.charCode > 57))
            return false;
    });
    //штатная численность водителей всего
    $('#countDriverAll, #countDriverAllmin, #countDriverAllmax').keypress(function (key) {
        if ((key.charCode < 48) || (key.charCode > 57))
            return false;
    });
    //штатная численность водителей в смене
    $('#countDriverChange, #countDriverChangemin, #countDriverChangemax').keypress(function (key) {
        if ((key.charCode < 48) || (key.charCode > 57))
            return false;
    });
    //штатная численность диспетчеров всего
    $('#countDispAll, #countDispAllmin, #countDispAllmax').keypress(function (key) {
        if ((key.charCode < 48) || (key.charCode > 57))
            return false;
    });
    //штатная численность диспетчеров в cмене
    $('#countDispChange, #countDispChangemin, #countDispChangemax').keypress(function (key) {
        if ((key.charCode < 48) || (key.charCode > 57))
            return false;
    });
/*********************** техника ***************************/
    for (var i = 0; i <= 30; i++) {
        //марка русск/англ. заглавные , -()
        $('#mark' + i).keypress(function (key) {
            if ((key.charCode < 40) || ((key.charCode > 41) && (key.charCode < 44)) || ((key.charCode > 45) && (key.charCode < 47)) || ((key.charCode > 47) && (key.charCode < 48)) || ((key.charCode > 57) && (key.charCode < 65)) || ((key.charCode > 90) && (key.charCode < 188)) || ((key.charCode > 189) && (key.charCode < 1040)) || (key.charCode > 1071))
                return false;
        });

     $('#fio').keypress(function (key) {
            if (((key.charCode < 44) &&(key.charCode != 32))||((key.charCode > 46) &&  (key.charCode <1040)) || (key.charCode > 1103) )
                return false;
        });

        //v АЦ
        $('#v' + i).keypress(function (key) {
            if ((key.charCode < 48) || (key.charCode > 57))
                return false;
        });
        //мин.боевой расчет
        $('#calculation' + i).keypress(function (key) {
            if ((key.charCode < 48) || (key.charCode > 57))
                return false;
        });

           //Номерной знак АН3400-7
    $('#numbsign' + i).keypress(function (key) {
            if ((key.charCode < 45) || ((key.charCode > 45) && (key.charCode < 48)) || ((key.charCode > 57) && (key.charCode < 65)) || ((key.charCode > 90) && (key.charCode < 1040))  || (key.charCode > 1071) )
                return false;
        });
        ////Номерной знак 8 символов
//         $('#numbsign' + i).keyup(function () {
//        var $this = $(this);
//        if ($this.val().length > 8)
//            $this.val($this.val().substr(0, 8));
//
//    });


    }

      $('#vmin, #vmax').keypress(function (key) {
            if ((key.charCode < 48) || (key.charCode > 57))
                return false;
        });
        //мин.боевой расчет
        $('#calculationmin, #calculationmax').keypress(function (key) {
            if ((key.charCode < 48) || (key.charCode > 57))
                return false;
        });
          //марка русск/англ. заглавные , -()
        $('#mark').keypress(function (key) {
            if ((key.charCode < 40) || ((key.charCode > 41) && (key.charCode < 44)) || ((key.charCode > 45) && (key.charCode < 48)) || ((key.charCode > 57) && (key.charCode < 65)) || ((key.charCode > 90) && (key.charCode < 188)) || ((key.charCode > 189) && (key.charCode < 1040)) || (key.charCode > 1071))
                return false;
        });

    //фильтрация данных
    $('#minDiv, #minOne, #minTwo, #minThree, #minDrAll, #minDrChange, #minDispAll, #minDispChange, #maxDiv, #maxOne, #maxTwo, #maxThree, #maxDrChange,#maxDrAll, #maxDispAll, #maxDispChange, #minV, #maxV, #minCalc, #maxCalc, #minGochs, #maxGochs, #minGrochs, #maxGrochs, #minRochs, #maxRochs, #minDall, #maxDall').keypress(function (key) {
        if ((key.charCode < 48) || (key.charCode > 57))
            return false;
    });




 //марка русск/англ. заглавные , -()
        $('#technicName').keypress(function (key) {
            if ( ((key.charCode > 32) && (key.charCode < 40)) || ((key.charCode > 41) && (key.charCode < 65)) || ((key.charCode > 90) && (key.charCode < 1040)) || (key.charCode > 1071)  )
                return false;
        });






//validation form ----------------------------------------------------------------------------------------------

    $('#check')
            .bootstrapValidator({
                message: 'This value is not valid',
                //live: 'submitted',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    login: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите логин'
                            }
                        }
                    },
                    password: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите пароль'
                            }
                        }
                    }
                }

            });
    $('#refuseform')
            .bootstrapValidator({
                message: 'This value is not valid',
                //live: 'submitted',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    desc: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите основание'
                            }
                        }
                    }
                }
            });

//форма заполнения карточки
    $('#fill')
            .bootstrapValidator({
                message: 'This value is not valid',
                //live: 'submitted',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    divizionName: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Выберите наименование подразделения'
                            }
                        }
                    },
                    divizionNum: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите номер подразделения'
                            }
                        }
                    },
                    disloc: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите место дислокации'
                            }
                        }
                    },
                  /* latitude: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите широту'
                            }

                        }
                    },
                    longitude: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите долготу'
                            }
                        }
                    },*/
                    countDiv: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите штатную численность подразделения'
                            }
                        }
                    },
                    countChange1: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите число л/с смены 1'
                            }
                        }
                    },
                    countChange2: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите число л/с смены 2'
                            }
                        }
                    },
                    countChange3: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите число л/с смены 3'
                            }
                        }
                    },
                    countDriverAll: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите общее количество водителей'
                            }
                        }
                    },
                    countDriverChange: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите число водителей в смене'
                            }
                        }
                    },
                    countDispAll: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите общее количество диспетчеров'
                            }
                        }
                    },
                    countDispChange: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите число диспетчеров в смене'
                            }
                        }
                    },
//                    technicName0: {
//                        message: 'The username is not valid',
//                        validators: {
//                            notEmpty: {
//                                message: 'Выберите наименование'
//                            }
//                        }
//                    },
//                    mark0: {
//                        message: 'The username is not valid',
//                        validators: {
//                            notEmpty: {
//                                message: 'Введите марку'
//                            }
//                        }
//                    },
//                    type0: {
//                        message: 'The username is not valid',
//                        validators: {
//                            notEmpty: {
//                                message: 'Выберите тип техники'
//                            }
//                        }
//                    },
//                    v0: {
//                        message: 'The username is not valid',
//                        validators: {
//                            notEmpty: {
//                                message: 'Введите минимальный боевой расчет'
//                            }
//                        }
//                    },

                    phone: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите телефон'
                            }
                        }
                    },
                    localExit: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите район выезда'
                            }
                        }
                    },
                    locrosn: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Выберите район'
                            }
                        }
                    }
                }

            });


    //окончание заполнения карточки
    $('#exit')
            .bootstrapValidator({
                message: 'This value is not valid',
                //live: 'submitted',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    fio: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите Ф.И.О.'
                            }
                        }
                    }
                }

            });
    $('#editsend')
            .bootstrapValidator({
                message: 'This value is not valid',
                //live: 'submitted',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    fio: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите Ф.И.О.'
                            }
                        }
                    }
                }

            });

    $('#write')
            .bootstrapValidator({
                message: 'This value is not valid',
                //live: 'submitted',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    fio: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите Ф.И.О.'
                            }
                        }
                    }
                }

            });


    $('#create')
            .bootstrapValidator({
                message: 'This value is not valid',
                //live: 'submitted',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    divizionName: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Выберите наименование подразделения'
                            }
                        }
                    },
                    divizionNum: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите номер подразделения'
                            }
                        }
                    },
                    disloc: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите место дислокации'
                            }
                        }
                    },
                   /* latitude: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите широту'
                            }
                        }
                    },
                    longitude: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите долготу'
                            }
                        }
                    },*/
                    countDiv: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите штатную численность подразделения'
                            }
                        }
                    },
                    countChange1: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите число л/с смены 1'
                            }
                        }
                    },
                    countChange2: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите число л/с смены 2'
                            }
                        }
                    },
                    countChange3: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите число л/с смены 3'
                            }
                        }
                    },
                    countDriverAll: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите общее количество водителей'
                            }
                        }
                    },
                    countDriverChange: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите число водителей в смене'
                            }
                        }
                    },
                    countDispAll: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите общее количество диспетчеров'
                            }
                        }
                    },
                    countDispChange: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите число диспетчеров в смене'
                            }
                        }
                    },
//                    technicName0: {
//                        message: 'The username is not valid',
//                        validators: {
//                            notEmpty: {
//                                message: 'Выберите наименование'
//                            }
//                        }
//                    },
//                    mark0: {
//                        message: 'The username is not valid',
//                        validators: {
//                            notEmpty: {
//                                message: 'Введите марку'
//                            }
//                        }
//                    },
//                    type0: {
//                        message: 'The username is not valid',
//                        validators: {
//                            notEmpty: {
//                                message: 'Выберите тип техники'
//                            }
//                        }
//                    },
//                    v0: {
//                        message: 'The username is not valid',
//                        validators: {
//                            notEmpty: {
//                                message: 'Введите минимальный боевой расчет'
//                            }
//                        }
//                    },

                    phone: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите телефон'
                            }
                        }
                    },
                    localExit: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите район выезда'
                            }
                        }
                    },
                     locrosn: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Выберите район'
                            }
                        }
                    }
                }

            });



    $('#newTech, #updtTech')
            .bootstrapValidator({
                message: 'This value is not valid',
                //live: 'submitted',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    technicName: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите наименование'
                            }
                        }
                    },
                     descTech: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите полное наименование'
                            }
                        }
                    }
                }

            });

              $('#radmin')
            .bootstrapValidator({
                message: 'This value is not valid',
                //live: 'submitted',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    password: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Введите пароль'
                            }
                        }
                    }
                }

            });
});



/* change podrazdelenie. If cou - we can check ckeckbox */
$(document).ready(function () {

    $('#div_name').on('change', function (e) {

var name_divizion=parseInt($('#div_name').val());

/* cou */
if(name_divizion === 8){
/* show 'cou with slhs' */
$('#div-cou_with_slhs').fadeIn('slow');
}
else{
    /* reset 'cou with slhs' */
   $('#cou_with_slhs').prop("checked",false);
    /* hide 'cou with slhs' */
$('#div-cou_with_slhs').fadeOut('slow');
}

    });
});


