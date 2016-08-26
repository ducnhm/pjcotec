@extends('admin.layout.main')
@section('title', 'Danh mục')

@section('content')

	
	

	
				
		{{-- 
		
		
		
					<ol class="breadcrumb bc-3" >
								<li>
						<a href="index.html"><i class="fa-home"></i>Dashboard</a>
					</li>
							<li>
		
									<a href="tables-main.html">Tài khoản</a>
							</li>
						<li class="active">
		
									Danh sách
							</li>
							</ol> <hr> --}}
					
		
		
		<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			var $table1 = jQuery( '#table-1' );
			
			// Initialize DataTable
			$table1.DataTable( {
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
		} );
		</script>

		
		<table class="table table-bordered datatable" id="table-1">

			<thead>
				<tr>
					<th >Id</th>
					<th>Tên danh mục</th>
					<th >Alias</th>
					<th >Danh mục cha</th>
					
					<th>Kích hoạt</th>
					<th>Hành động</th>

				</tr>
			</thead>
			<tbody>
			
			<?php listMulti($category) ?>
				
			</tbody>
			<tfoot>
				<tr>
					<th >Id</th>
					<th>Tên danh mục</th>
					<th >Alias</th>
					<th >Danh mục cha</th>
					
					<th>Kích hoạt</th>
					<th>Hành động</th>
				</tr>
			</tfoot>
		</table>
		
		{{-- <br />
		
		
		</jQuery(>
		</script> --}}

				
				
				
		
		
		
	

@endsection