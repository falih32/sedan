<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <h1>
            <i class="fa fa-book"></i> Syarat Penyedia
            <?php if($role <= 1){?>
            <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah Syarat Penyedia' href="<?php echo base_url()."SuratIzin/";?>tambah_suratizin"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
            <?php } ?>
        </h1>
        <hr>
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-book"></i> Daftar Dokumen Kualifikasi
            </div>
            <div class="panel-body">
            </div>
            <form id="frm-example" action="<?php echo site_url('Test/coba'); ?>" method="POST">
            <table class="table table-responsive table-hover table-striped" id="tabel-suratizin" cellspacing="0" width="100%">
            	<thead>
                <tr>
                    <th>id</th>	
                    <th>Nama Dokumen</th>
                    <th>Aksi</th>
                    <th>Check ALL<input name="select_all" value="1"  type="checkbox" /></th>
                </tr>
                </thead>
            </table>
                <button type="submit" class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Submit'> Submit </button>
 
            
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
<!--
    function makeConfirmation(){
	var deleteLinks = document.querySelectorAll('.delete');
	for (var i = 0, length = deleteLinks.length; i < length; i++) {
            deleteLinks[i].addEventListener('click', function(event) {
                event.preventDefault();

                var choice = confirm(this.getAttribute('data-confirm'));

                if (choice) {
                    window.location.href = this.getAttribute('href');
                }
            });
	}
    }

    function makeTooltip(){
	$('[data-toggle="tooltip"]').tooltip({});
    }

    function fixedButton(){
        $('.btn-aksi').width(
            Math.max.apply( 
                Math, 
                $('.btn-aksi').map(function(){
                    return $(this).outerWidth();
                }).get()
            )
        );
    }

//
// Updates "Select all" control in a data table
//
function updateDataTableSelectAllCtrl(table){
   var $table             = table.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // If none of the checkboxes are checked
   if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If all of the checkboxes are checked
   } else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If some of the checkboxes are checked
   } else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = true;
      }
   }
}





$(document).ready(function() {
       var rows_selected = [];
	var table = $('#tabel-suratizin').DataTable( {
            "paging": true, 
            "search":true,
            "scrollX":true,
            "ordering": true, 
            "responsive": false,
            "processing":true, 
            "serverSide": true,
            "pageLength": 50,
            "ajax":{
                "url":"<?php echo site_url('SuratIzin/ajaxProcess');?>",
                "type":"POST"
            },
            "columns": [
                { "data": "siz_id" },
                { "data": "siz_nama" },
                { "data": "aksi" },
                { "data": "checkbox" }
            ],
            "columnDefs": [
                { "searchable": false, "orderable":false, "targets": [0,2,3] },
                { "visible": false, "targets": [0] },
                { "targets": 3,      "render": function (data, type, full, meta){
                     return '<input type="checkbox" name="id[]" value="' 
                        + full.siz_id+ '">';
                        },  className: "dt-body-center"
                }
            ],
            "order": [[ 1, "asc" ]],
            "drawCallback": function( settings ) {
                makeConfirmation();
                makeTooltip();
                fixedButton();
            },
               "rowCallback": function(row, data, dataIndex){
                 // Get row ID
                 var rowId = data[0];

                 // If row ID is in the list of selected row IDs
                 if($.inArray(rowId, rows_selected) !== -1){
                    $(row).find('input[type="checkbox"]').prop('checked', true);
                    $(row).addClass('selected');
                 }
              }
	} );
        
//         $('#tabel-suratizin-select-all').on('click', function(){
//      // Check/uncheck all checkboxes in the table
//      var rows = table.rows({ 'search': 'applied' }).nodes();
//      $('input[type="checkbox"]', rows).prop('checked', this.checked);
//        });
        
//        $('#tabel-suratizin tbody').on('change', 'input[type="checkbox"]', function(){
//      // If checkbox is not checked
//      if(!this.checked){
//         var el = $('#tabel-suratizin-select-all').get(0);
//         // If "Select all" control is checked and has 'indeterminate' property
//         if(el && el.checked && ('indeterminate' in el)){
//            // Set visual state of "Select all" control 
//            // as 'indeterminate'
//            el.indeterminate = true;
//         }
//      }
//   });

 // Handle click on checkbox
   $('#tabel-suratizin tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();

      // Get row ID
      var rowId = data[0];

      // Determine whether row ID is in the list of selected row IDs 
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });
   
     // Handle click on table cells with checkboxes
   $('#tabel-suratizin').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   }); 
   
   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('#tabel-suratizin tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#tabel-suratizin tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });
   
   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });
   
    $('#frm-example').on('submit', function(e){
      var form = this;
      
      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });
   });


//      // FOR TESTING ONLY
//      
//      // Output form data to a console
//      $('#example-console').text($(form).serialize()); 
//      console.log("Form submission", $(form).serialize()); 
//       
//   });

});
</script>
