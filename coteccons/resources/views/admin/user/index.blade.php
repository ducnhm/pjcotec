@extends('admin.layout.main')
@section('title', 'Tài khoản')

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
					<th>Tên đăng nhập</th>
					<th >Họ và tên</th>
					<th >Level</th>
					<th >Avatar</th>
					<th>Kích hoạt</th>
					<th>Hành động</th>

				</tr>
			</thead>
			<tbody>
			@foreach($user as $item)
				<tr class="odd gradeX">
					<td>{{ $item->id }}</td>
					<td>{{ $item->username }}</td>
					<td>{{ $item->fullname }}</td>
					<td>
						{{ $item->level }}
					</td>
					<td><img src="{{ url('public/upload/user/'.$item->avt.'') }}" width="70px" class="img-responsive img-thumbnail"></td>
					<td>
						<?php
                            $active = $item->active;

                            if ($active == 0 ) { ?>
                                <form action="{{route('user/deactive',$item->id)}}" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="active" value="1"/>
                                        <button class="btn btn-success btn-xs" value="submit" ><span class="glyphicon glyphicon-ok"></span></button>
                                </form>
                            <?php }
                            else { ?>
                                <form action="{{route('user/active',$item->id)}}" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="active" value="0"/>
                                        <center><button class="btn btn-danger btn-xs" value="submit" ><span class="glyphicon glyphicon-remove"></span></i></button></center>
                                </form>
                           <?php }
                        ?>
						
					</td>
					
					<td class="text-center">{{-- <button class='btn btn-warning btn-xs' id="myBtn"><span class="glyphicon glyphicon-search"></span> View></button> --}}
						{{-- view --}}
					<!-- Trigger/Open The Modal -->
							{{-- <button class='btn btn-warning btn-xs' id="myBtn"><span class="glyphicon glyphicon-search">
								
							</span> View</button> --}}

							<!-- The Modal -->
							<div id="myModal" class="modal">

							  <!-- Modal content -->
							  <div class="modal-content">
							  	
							    	<span class="close">x</span>
							    	<div class="panel panel-default">
								      <div class="panel-heading resume-heading">
								        <div class="row">
								          <div class="col-lg-12">
								            <div class="col-xs-12 col-sm-3">
								              <figure>
								                <img class="img-circle img-responsive" alt="" src="{{ url('public/upload/user/'.$item->avt.'') }}">
								              </figure><br>
								              
								              
								              
								            </div>

								            <div class="col-xs-12 col-sm-8">
								              <ul class="list-group">
								                <li class="list-group-item text-left"><span class="glyphicon glyphicon-cog"></span> {{ $item->username }}</li>
								                <li class="list-group-item text-left"><span class="glyphicon glyphicon-user"></span> {{ $item->fullname }}</li>
								                <li class="list-group-item text-left"><span class="glyphicon glyphicon-home"></span> {{ $item->address }} </li>
								                <li class="list-group-item text-left"><span class="glyphicon glyphicon-wrench"></span> {{ $item->level }} </li>
								                <li class="list-group-item text-left"><span class="glyphicon glyphicon-phone-alt"></span> {{ $item->phonenumber }} </li>
								                <li class="list-group-item text-left"><span class="glyphicon glyphicon-envelope"></span> {{ $item->email }}</li>
								              </ul>
								            </div>
								          </div>
								        </div>
								      </div>
							    
							    	
								</div>

							  </div>
							</div>

							

					{{-- edit --}}
					<a class='btn btn-info btn-xs' href="{{ URL::route('admincp.user.edit',$item->id) }}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 

					{{-- delete --}}
					{{Form::open(array('route'=>['admincp.user.destroy', $item->id],'class'=>'formbutton','method' => 'DELETE','files' => true))}}
                                <button class="btn btn-danger btn-xs" type="submit"><span class=" glyphicon glyphicon-remove"></span> Del</button>
                                {{Form::close()}}
					</td>
					
					
				</tr>
			@endforeach
				
			</tbody>
			<tfoot>
				<tr>
					<th >Id</th>
					<th>Tên đăng nhập</th>
					<th >Họ và tên</th>
					<th >Level</th>
					<th >Avatar</th>
					<th>Kích hoạt</th>
					<th>Hành động</th>
				</tr>
			</tfoot>
		</table>
		
		{{-- <br />
		
		
		</jQuery(>
		</script> --}}

				
				
				
		
		
		
	

@endsection