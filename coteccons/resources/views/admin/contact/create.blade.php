@extends('admin.layout.main')
@section('content')
@section('title', 'LIÊN HỆ')



<br>

<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading" style="background: #EEEEEE;">
						<div class="panel-title">
							THÊM LIÊN HỆ
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
						
						<form role="form" class="form-horizontal form-groups-bordered" method="post" action="{{ route('admincp.contact.store') }}" enctype="multipart/form-data">

							 <input type="hidden" name="_token" value="{{csrf_token()}}" />
							 
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Tiêu Đề</label>
								<div class="col-sm-5">
									<input type="text" id="title" class="form-control" value="{{ old('title') }}" name="title" placeholder="Tiêu Đề">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Địa Chỉ</label>
								
								<div class="col-sm-5">
								
									<textarea class="form-control" rows="5" value="{{ old('address') }}" name="address" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Số Điện Thoại</label>
								<div class="col-sm-5">
									<input type="text" id="phone" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Số Điện Thoại">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Fax</label>
								<div class="col-sm-5">
									<input type="text" id="fax" class="form-control" value="{{ old('fax') }}" name="fax" placeholder="Fax">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-5">
									<input type="text" id="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Địa chỉ Email">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Bản Đồ</label>

								<div class="col-sm-5">

									<textarea class="form-control" rows="5" value="{{ old('map') }}" name="map" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-3">
									<button type="submit" class="btn btn-default">Thêm</button>
									<button type="reset" class="btn btn-default">Xóa</button>
								</div>
								
							</div>
						</form>
						
					</div>
				
				</div>
			
			</div>
		</div>
@endsection