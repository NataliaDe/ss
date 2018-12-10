/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


	$(document).ready(function() {
		$('table#filterTable1').columnFilters({alternateRowClassNames:['rowa','rowb']});
		$('table#filterTable2').columnFilters({alternateRowClassNames:['rowa','rowb'], excludeColumns:[2,3]});
		$('table#filterTable3').columnFilters({caseSensitive:true});
		$('table#filterTable4').columnFilters({minSearchCharacters:3});
		$('table#filterTable5').columnFilters({wildCard:'#',notCharacter:'?'});
                $('table#tbl').columnFilters({alternateRowClassNames:['rowa','rowb']});
	});
        
        $(document).ready( function () {
   $('#tbl').DataTable( {
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
} );


$(document).ready(function() {
$('#tbl tfoot th').each( function () {
        var title = $('#tbl tfoot th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Поиск '+title+'" />' );
});
 var table = $('#tbl').DataTable();
$("#tbl tfoot input").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
});
});


