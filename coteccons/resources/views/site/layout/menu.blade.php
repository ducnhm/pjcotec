<section class="nav" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">

                        	
	                        <li class="active ">
	                        <a href="{{url('/')}}" >Trang chủ </a>
	                        </li>
	                        <li class="dropdown ">
	                        	<a href="#"  class="dropdown-toggle" data-toggle="dropdown" >Giới thiệu <b class="caret"></b></a>
			                    <ul class="dropdown-menu">
			                    <?php 

			                    	$category_parent = DB::table('category')->where('alias','gioi-thieu')->first();
			                    	$category_child = DB::table('category')->where('parent_id',$category_parent->category_id)->get();
			                    	foreach ($category_child as $key => $value) {
			                    		if($value->active == 1){

			                     ?>
			                    	<li class="">
			                    		<a href="{{url('gioi-thieu',$value->alias)}}">{{ $value->name }}</a>
			                    	</li>
			                    	<?php }
			                    	} ?>
			                    	
			                    </ul>
	                   		</li>
	                    <li class="dropdown ">
	                    	<a href="{{url('/')}}"  class="dropdown-toggle" data-toggle="dropdown" >Tin tức <b class="caret"></b></a>
	                    	<ul class="dropdown-menu">
	                    	<?php $cate_parent = DB::table('category')->where('alias','tin-tuc')->first();
	                    	$cate_child = DB::table('category')->where('parent_id',$cate_parent->category_id)->get();
	                    	foreach ($cate_child as $key => $value) {
	                    		if($value->active == 1) {
	                    		
	                    	
	                    	 ?>
	                    		<li class=""><a href="{{url('danh-muc/tin-tuc',$value->alias)}}">{{ $value->name }}</a></li>
	                    		<?php } } ?>
	                    	</ul>
	                    </li>
	                   {{--  <li class="dropdown ">
	                    	<a href="http://www.coteccons.vn/quan-he-co-dong/"  class="dropdown-toggle" data-toggle="dropdown" >Quan hệ cổ đông <b class="caret"></b></a>
	                    	<ul class="dropdown-menu">
	                    		<li class=""><a href="{{url('thong-tin-co-dong')}}">Thông tin Cổ đông</a></li><li class=""><a href="http://www.coteccons.vn/quan-he-co-dong/bao-cao-tai-chinh-thuong-nien/">Báo cáo tài chính - thường niên</a></li><li class=""><a href="http://www.coteccons.vn/quan-he-co-dong/bien-ban-nghi-quyet/">Biên bản và nghị quyết</a></li><li class=""><a href="http://www.coteccons.vn/quan-he-co-dong/dieu-le-quy-che-quy-dinh/">Điều lệ và quy chế qui định</a></li>
	                    	</ul>
	                    </li> --}}
	                    <li class="dropdown mega-dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown" >Dự án <b class="caret"></b></a>
	                    	<ul class="dropdown-menu mega-dropdown-menu row">
		                    	<li class="col-sm-3">
		                        	<ul>
		                        	<li class="dropdown-header">Theo Dự Án</li>
		                        	<?php 
		                        		$cate_pro = DB::table('cate_project')->get();
		                        		foreach ($cate_pro as $key => $value) {
		                        			if($value->active == 1) {
		                        	 ?>
		                        	<li class="mn_custom_sub"><a href="{{ url('danh-muc/du-an',$value->alias) }}">{{ $value->name }}</a></li>
		                        	<?php }
		                        			# code...
		                        		} ?>
		                        	
		                    		</ul>
		                        </li>
		                       	<li class="col-sm-3">
	                        		<ul>
	                        		<li class="dropdown-header">Theo Thời Gian</li>
	                        		<?php 
		                        		$months = DB::table('months')->get();
		                        		foreach ($months as $key => $value) {
		                        			if($value->active == 1) {
		                        	 ?>
	                        		<li class="mn_custom_sub"><a href="{{url('danh-muc/du-an',$value->alias)}}">{{ $value->name }}</a></li>
	                        		<?php } } ?>
	                        		
	                        		
	                        		</ul>
	                        	</li>
	                        	<li class="col-sm-3">
	                        		<ul>
	                        		<li class="dropdown-header">Theo Vị Trí</li>
	                        		<?php 
		                        		$location = DB::table('location')->get();
		                        		foreach ($location as $key => $value) {
		                        			if($value->active == 1) {
		                        	 ?>
	                        		<li class="mn_custom_sub"><a href="{{url('danh-muc/du-an',$value->alias)}}">{{ $value->name }}</a></li>
	                        		<?php  } } ?>
	                        		</ul>
	                        	</li>
	                        		
	                        </ul>
	                    </li>
	                    <li class="">
	                    {{-- <a href="{{url('bat-dong-san')}}" >Bất động sản </a></li> --}}
	                    {{-- <li class=" "><a href="{{url('tai-lieu')}}" >Tài liệu </a></li> --}}
	                   {{--  <li class=" "><a href="{{url('tuyen-dung')}}" >Tuyển dụng </a></li> --}}
	                    <li class=" "><a href="{{url('lien-he')}}" >Liên hệ </a></li>
	                    
	                </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>