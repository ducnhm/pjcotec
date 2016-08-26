@extends('admin.layout.main')
@section('title', 'Dự án')

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
					<th>Tên dự án</th>
					<th >Alias</th>
					<th >Danh mục</th>
					
					<th>Kích hoạt</th>
					<th>Hành động</th>

				</tr>
			</thead>
			<tbody>
			
			
			@foreach($project as $item)
				<tr class="odd gradeX">
					<td>{{ $item->project_id }}</td>
					<td>{{ $item->title }}</td>
					<td>{{ $item->alias }}</td>
					<td>
					<?php 

						$catepro_name = DB::table('cate_project')->where('catepro_id',$item->catepro_id)->first();

						echo $catepro_name->name;


					 ?>
						
					</td>
					
					<td>
						<?php
                            $active = $item->active;

                            if ($active == 1 ) { ?>
                                <form action="{{route('project/deactive',$item->project_id)}}" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="active" value="0"/>
                                        <button class="btn btn-success btn-xs" value="submit" ><span class="glyphicon glyphicon-ok"></span></button>
                                </form>
                            <?php }
                            else { ?>
                                <form action="{{route('project/active',$item->project_id)}}" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="active" value="1"/>
                                        <center><button class="btn btn-danger btn-xs" value="submit" ><span class="glyphicon glyphicon-remove"></span></i></button></center>
                                </form>
                           <?php }
                        ?>
						
					</td>
					
					
					<td>		

					{{-- edit --}}
					<a class='btn btn-info btn-xs' href="{{ URL::route('admincp.project.edit',$item->project_id) }}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 

					{{-- delete --}}
					

                     <a class='btn btn-danger btn-xs' href="{{ url('admincp/project/destroy',$item->project_id) }}"><span class=" glyphicon glyphicon-remove"></span> Del</a>  
					</td>
					
					
				</tr>
			@endforeach
				
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