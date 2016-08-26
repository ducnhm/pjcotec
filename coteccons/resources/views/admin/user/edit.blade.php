@extends('admin.layout.main')
@section('title', 'TÀI KHOẢN')
@section('content')
{{-- <ol class="breadcrumb bc-3">


			@if(count($errors) > 0)
		<div class="alert alert-danger fade in">
		    <a href="#" class="close" data-dismiss="alert">&times;</a>
		    <strong>Error!</strong> <br>
		    @foreach($errors->all() as $error)
		    	{{ $error }} <br>
		    @endforeach
		</div>
		@endif
		@if(session('message'))
		<div class="alert alert-success fade in">
		    <a href="#" class="close" data-dismiss="alert">&times;</a>
		    <strong>Success!</strong> {{ session('message') }}
		</div>
		@endif
								
								<li>
						<a href="index.html"><i class="fa-home"></i>Dashboard</a>
					</li>
							<li>
		
									<a href="tables-main.html">Tài khoản</a>
							</li>
						<li class="active">
		
									Sửa
							</li>
							</ol> <hr> --}}


<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading" style="background: #EEEEEE;">
						<div class="panel-title">
							CHỈNH SỬA TÀI KHOẢN
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
						
						{{Form::open(array('route'=>['admincp.user.update', $user->id],'class'=>'cmxform form-horizontal tasi-form', 'method' => 'PUT','files' => true))}}

							 <input type="hidden" name="_token" value="{{csrf_token()}}" />
							 
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Tên đăng nhập</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" value="{{ $user->username }}" name="username" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Họ và tên</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" value="{{ $user->fullname }}" name="fullname" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Email</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" value="{{ $user->email }}" name="email" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Địa chỉ</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" value="{{ $user->address }}" name="address" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Số điện thoại</label>
								
								<div class="col-sm-5">
									<input type="number" class="form-control" value="{{ $user->phonenumber }}" name="phonenumber" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Mật khẩu</label>
								
								<div class="col-sm-5">
									<input type="password" class="form-control" name="password" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Nhập lại mật khẩu</label>
								
								<div class="col-sm-5">
									<input type="password" class="form-control" name="password_again" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Avatar</label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" name="avt" placeholder="">
								</div>
							</div>
							
							
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Level</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="level">
										<option value="Admintrator">Admintrator</option>
										<option value="Customer">Customer</option>
									</select>
								</div>
							</div>
							
							{{-- <div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<div class="checkbox">
										<label>
											<input type="checkbox">Checkbox 1
										</label>
									</div>
									
									<div class="checkbox">
										<label>
											<input type="checkbox">Checkbox 2
										</label>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Radio Input 1
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Input 2
										</label>
									</div>
								</div>
							</div> --}}
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-3">
									<button type="submit" class="btn btn-default">Cập nhập</button>
									<button type="reset" class="btn btn-default">Xóa</button>
								</div>
								
							</div>
						{{ Form::close() }}
						
					</div>
				
				</div>
			
			</div>
		</div>

@endsection