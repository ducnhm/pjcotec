@extends('admin.layout.main')
@section('title', 'Tin tức')

@section('content')

	
	

		
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
					<th>Tiêu đề</th>
					
					<th >Danh mục</th>
					
					<th>Kích hoạt</th>
					<th>Hành động</th>

				</tr>
			</thead>
			<tbody>
			
			
			@foreach($news as $item)
				<tr class="odd gradeX">
					<td>{{ $item->new_id }}</td>
					
					<td><?php echo substr($item->title,0,70)."..."; ?></td>
					<td>
					<?php 

						$category = DB::table('category')->where('category_id',$item->category_id)->first();

						echo $category->name;


					 ?>
						
					</td>
					
					<td>
						<?php
                            $active = $item->active;

                            if ($active == 1 ) { ?>
                                <form action="{{route('news/active',$item->new_id)}}" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="active" value="0"/>
                                        <button class="btn btn-success btn-xs" value="submit" ><span class="glyphicon glyphicon-ok"></span></button>
                                </form>
                            <?php }
                            else { ?>
                                <form action="{{route('news/active',$item->new_id)}}" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="active" value="1"/>
                                        <center><button class="btn btn-danger btn-xs" value="submit" ><span class="glyphicon glyphicon-remove"></span></i></button></center>
                                </form>
                           <?php }
                        ?>
						
					</td>
					
					
					<td>		

					{{-- edit --}}
					<a class='btn btn-info btn-xs' href="{{ URL::route('admincp.news.edit',$item->new_id) }}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 

					{{-- delete --}}
					

                     <a class='btn btn-danger btn-xs' href="{{ url('admincp/news/destroy',$item->new_id) }}"><span class=" glyphicon glyphicon-remove"></span> Del</a>  
					</td>
					
					
				</tr>
			@endforeach
				
			</tbody>
			<tfoot>
				<tr>
					<th >Id</th>
					<th>Tên danh mục</th>
					
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