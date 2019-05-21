	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">



	<style type="text/css">

		.dataTables_filter{
			display: inline-flex;
			float: right;
		}

		.mt-20{
			margin-top: 20px;
		}
	</style>
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-8"><h2>Users</h2></div>
					<div class="col-sm-4">
						<div class="pull-right">
							<a href="<?php echo site_url('muser/add'); ?>" class="btn btn-success mt-20"><i class="glyphicon glyphicon-plus"></i> Add</a> 
						</div>
					</div>
				</div>
			</div>

			<table class="table table-striped table-bordered listtable">
				<thead>
					<tr>

						<th>FirstName</th>
						<th>LastName</th>
						<th>CountryName</th>
						<th>TeamName</th>
						<th>CollegeName</th>
						<th>Position</th>
						<th>Birthday</th>
						<th>Height</th>
						<th>Weight</th>
						<th>Number</th>
						<th>NBAdebut</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($musers as $m){ ?>

						<tr>
							<td><?php echo $m['FirstName']; ?></td>
							<td><?php echo $m['LastName']; ?></td>
							<td><?php echo $m['CountryName']; ?></td>
							<td><?php echo $m['TeamName']; ?></td>
							<td><?php echo $m['CollegeName']; ?></td>
							<td><?php echo $m['Position']; ?></td>
							<td><?php echo $m['Birthday']; ?></td>
							<td><?php echo $m['Height']; ?></td>
							<td><?php echo $m['Weight']; ?></td>
							<td><?php echo $m['Number']; ?></td>
							<td><?php echo $m['NBAdebut']; ?></td>
							<td>
								<a href="<?php echo site_url('Muser/edit/'.$m['UserUID']); ?>" title="Edit!" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
								<button  title="Delete!" class="btn btn-danger btn-xs" onclick="delete_book(<?php echo $m['UserUID'];?>)"><i class="glyphicon glyphicon-remove"></i></button>
								<!-- <a href="<?php echo site_url('Muser/remove/'.$m['UserUID']); ?>" class="btn btn-danger btn-xs">Delete</a> -->
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>
	</div>



	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

	<script type="text/javascript">


		$(document).ready(function() {


			var table = $('.listtable').DataTable( {
				lengthChange: false,
				//buttons: [ 'copy', 'excel', 'pdf' ],
				"scrollX": true,
				dom: 'Bfrtip',

				 buttons: [ 'copy', 'excel',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]


			} );

			table.buttons().container()
			.appendTo( '.listtable_wrapper .col-sm-6:eq(0)' );
		} );

		function delete_book(id)
		{
			if(confirm('Are you sure delete this data?'))
			{
        // ajax delete data from database
        $.ajax({
        	url : "<?php echo site_url('Muser/remove')?>/"+id,
        	type: "POST",
        	dataType: "JSON",
        	success: function(data)
        	{
        		if(data.success == 1){

 		       		location.reload();
        		}else{
        			alert(data.message)
        		}
        	},
        	error: function (jqXHR, textStatus, errorThrown)
        	{
        		alert('Error deleting data');
        	}
        });

      }
    }
  </script>