@extends('admin.layout.main')
@section('content')


<div class="row">
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<?php

					$users = DB::table('users')->count();


					?>
					<div class="num" data-start="0" data-end="{{$users}}" data-postfix="" data-duration="1500" data-delay="0">

					</div>
		
					<h3>Registered users</h3>
					<p>Tổng số tài khoản.</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
					<?php

					$news = DB::table('news')->count();

					?>
					<div class="num" data-start="0" data-end="{{$news}}" data-postfix="" data-duration="1500" data-delay="600">

					</div>
		
					<h3>Tin Tức</h3>
					<p>Tổng số tin tức.</p>
				</div>
		
			</div>
			
			<div class="clear visible-xs"></div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-mail"></i></div>
					<?php

					$about = DB::table('about')->count();


					?>
					<div class="num" data-start="0" data-end="{{$about}}" data-postfix="" data-duration="1500" data-delay="1200">
					</div>
		
					<h3>About</h3>
					<p>Tổng số giới thiệu.</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-rss"></i></div>
					<?php

					$category = DB::table('category')->count();


					?>
					<div class="num" data-start="0" data-end="{{$category}}" data-postfix="" data-duration="1500" data-delay="1800">

					</div>
		
					<h3>Danh Mục</h3>
					<p>Tổng số danh mục.</p>
				</div>
		
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">

				<div class="panel panel-primary" id="charts_env">

					<div class="panel-heading">
						<div class="panel-title">Site Stats</div>
		
						<div class="panel-options">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#line-chart" data-toggle="tab">Bài Viết Mới</a></li>
							</ul>
						</div>
					</div>
		
					<div class="panel-body">

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
								<th>Id</th>
								<th data-hide="phone">Title</th>
								<th>Category</th>
								<th data-hide="phone">View</th>
								<th data-hide="phone,tablet">Date</th>
							</tr>
							</thead>
							<tbody>
							
								<?php

								$news = DB::table('news')
										->orderBy('new_id', 'desc')
										->limit(10)
										->get();
								?>
								@foreach($news as $key => $value)
								<tr>
									<td>{{$value->new_id}}</td>
									<td>{{$value->title}}</td>
									<?php
										$category_id = $value->category_id;
										$category = DB::table('category')->where('category_id',$category_id)->first();
									?>
									<td>{{$category->name}}</td>
									<td>{{$value->view}}</td>
									<td>{{$value->created_at}}</td>
								</tr>
								@endforeach
							
							</tbody>
						</table>
		
					</div>

				</div>

			</div>
		

		</div>

@endsection