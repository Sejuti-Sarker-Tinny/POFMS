//Modal code start
$(document).ready(function(){
	$(document).on("click", "#softDelete", function () {
		 var deleteID = $(this).data('id');
		 $(".modal-body #modal_id").val( deleteID );
	});
});

//Datepicker setting code start
$(function(){
	 $('#income_date').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});
});

$(function(){
	 $('#expense_date').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});
});

$('#datepickerFrom').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd',
  todayHighlight: true
});

$('#datepickerTo').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd',
  todayHighlight: true
});

//Summary search form submit code start
$(document).ready(function(){
  $('#search').click(function() {
    var from = $('#datepickerFrom').val();
    var to = $('#datepickerTo').val();
    var base_url = window.location.origin;
    var url = base_url+'/admin/summary/search/'+from+'/'+to;
    location.href = url;
  });
});


// Data Table
$(document).ready( function () {
    $('#alltableinfo').DataTable({
        ordering:  false,
        searching: true,
        paging: true,
        select: true,
        //pageLength: 10
    });
} );