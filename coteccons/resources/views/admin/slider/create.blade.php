@extends('admin.layout.main')
@section('content')
@section('title', 'SLIDER')



<br>

<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading" style="background: #EEEEEE;">
						<div class="panel-title">
							THÊM SLIDER
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
						
						<form role="form" class="form-horizontal form-groups-bordered" method="post" action="{{ route('admincp.slider.store') }}" enctype="multipart/form-data">

							 <input type="hidden" name="_token" value="{{csrf_token()}}" />
							 
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Tiêu Đề</label>
								<div class="col-sm-5">
									<input type="text" id="title" class="form-control" value="{{ old('title') }}" name="title" placeholder="Tiêu Đề">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Image Upload</label>

								<div class="col-sm-5">

									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
											<img src="http://placehold.it/200x150" alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
										<div>
											<span class="btn btn-white btn-file">
												<span class="fileinput-new">Select image</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" name="img" accept="image/*">
											</span>
											<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
										</div>
									</div>

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