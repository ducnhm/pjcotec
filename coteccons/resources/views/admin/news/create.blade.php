@extends('admin.layout.main')
@section('content')
@section('title', 'Tin tức')



<br>

<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading" style="background: #EEEEEE;">
						<div class="panel-title">
							THÊM TIN TỨC
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
						
						<form role="form" class="form-horizontal form-groups-bordered" method="post" action="{{ route('admincp.news.store') }}" enctype="multipart/form-data">

							 <input type="hidden" name="_token" value="{{csrf_token()}}" />
							 
							<div class="form-group">
								<label for="field-1" class="col-sm-2 control-label">Tiêu đề</label>
								
								<div class="col-sm-10">
									<input type="text" id="title" onkeyup="ChangeToSlug()" class="form-control" value="{{ old('title') }}" name="title" placeholder="Tin tức">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-2 control-label">Alias</label>
								
								<div class="col-sm-10">
									<input type="text" class="form-control" readonly="" id="slug" name="alias" value="{{ old('alias') }}" placeholder="slug">
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-2 control-label">Danh mục</label>
								
								<div class="col-sm-10">
									<select name="category_id" class="form form-control">
									<?php  ?>
										@foreach($category as $value)
											<option value="{{ $value->category_id }}">{{ $value->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-2 control-label">Mô tả</label>
							
								<div class="col-sm-10">
								
									<textarea class="form-control editor" rows="1000" id="editor" value="{{ old('desc') }}" name="desc" placeholder=""></textarea>
									
									<script type="text/javascript">
										var editor = CKEDITOR.replace('desc',{
											language:'vi',
											filebrowserImageBrowseUrl : '../../public/plugins/ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl : '../../public/plugins/ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl : '../../public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl : '../../public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',



        									height: 300,
        
    });


    
									</script>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-2 control-label">Nội dung</label>
							
								<div class="col-sm-10">
								
									<textarea class="form-control editor" rows="1000" id="editor" value="{{ old('content') }}" name="content" placeholder=""></textarea>
									
									<script type="text/javascript">
										var editor = CKEDITOR.replace('content',{
											language:'vi',
											filebrowserImageBrowseUrl : '../../public/plugins/ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl : '../../public/plugins/ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl : '../../public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl : '../../public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',



        									height: 600,
        
    });


    
									</script>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-2 control-label">Hình đại diện</label>
								
								<div class="col-sm-10">
									<input type="file" class="form-control" name="img" placeholder="">
								</div>
							</div>
							
							
							
							
							
							
							
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-3">
									<button type="submit" class="btn btn-default">Thêm</button>
									<button type="reset" class="btn btn-default">Xóa</button>
								</div>
								
							</div>
						</form>
						
					</div>
				
				</div>
			
			</div>
		</div>
{{-- slug script--}}
                        <script language="javascript">
            function ChangeToSlug()
                {
                    var title, slug;
                 
                    //Lấy text từ thẻ input title 
                    title = document.getElementById("title").value;
                 
                    //Đổi chữ hoa thành chữ thường
                    slug = title.toLowerCase();
                 
                    //Đổi ký tự có dấu thành không dấu
                    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                    slug = slug.replace(/đ/gi, 'd');
                    //Xóa các ký tự đặt biệt
                    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //Đổi khoảng trắng thành ký tự gạch ngang
                    slug = slug.replace(/ /gi, "-");
                    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                    slug = slug.replace(/\-\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-/gi, '-');
                    //Xóa các ký tự gạch ngang ở đầu và cuối
                    slug = '@' + slug + '@';
                    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox có id “slug”
                    document.getElementById('slug').value = slug;
                }
        </script>
                        {{-- slug script--}}
@endsection