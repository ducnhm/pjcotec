@extends('site.layout.main')
@section('content')
@section('title','Trang chủ')
@include('site.layout.slide')
<section class="duan">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title os-tuyendart">
                        <div class="fleft">
                            <h3 style="color: #062245;font-size: 19px;margin-top: 25px;">Dự án tiêu biểu</h3>
                        </div>
                        <div class="fright">
                            <ul id="filters" class="clearfix">
                            @foreach($cate_pro as $value)
                            @if($value->active == 1)
                                <li><a href="{{ url('danh-muc/du-an',$value->alias) }}"><span>{{ $value->name }}</span></a></li> 
                            @endif
                            @endforeach
                                                   
                            </ul>
                        </div>
                        <br clear="all" />
                    </div>
                </div>
                <div class="col-xs-12">
                    <div id="portfoliolist" class="owl-carousel">

                    @foreach($projects_hl as $item)
                    @if($item->active == 1)
                        <div class="item">
                                    <div class="portfolio-wrapper pic">
                                        <a href="{{ url('du-an',$item->alias) }}"><img height="150px" class="pic-image" src="{{ url('public/upload/project/'.$item->images.'') }}" alt="{{ $item->title }}" /></a>
                                        <div>
                                            <br />
                                            <div><a href="{{ url('du-an',$item->alias) }}" class="text-title" style="font-weight:bold;">{{ $item->title }}</a>
                                            </div>
                                            <div style="font-size:11px;"><p><?php echo substr($item->content,0,100 )." ..."; ?></p>

</div>
                                        </div>
                                    </div>
                                </div>   
                                @endif
                                @endforeach                     
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="new">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8">
                
                	<div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row" style="margin-top: -20px;">
                            	<a href="{{ url('tin-tuc') }}">
                                <h1 class="page-heading"><span class="h-title" style="text-transform: uppercase;">Tin tức</span></h1>
                                </a>
                            </div>
                     </div>       

                    <div class="clearfix">
                                
                        <div class="col-xs-12 col-sm-12 col-md-6" id="col-l">
                            <div class="row">
                            	
                                <div id="clientTestimonials" class="news os-tuyendart">
                                <?php 
                                 // biến tự tăng khi hover link news 
                                $i = -1; ?>
                                        @foreach($news as $value)
                                        @if($value->active == 1)
                                        <?php 
                                       $i++;
                                        
                                         
                                            
                                        ?>
                                <div id="itm-news<?php echo $i; ?>" class="itm-news" >
                                            <a href="{{ url('tin-tuc',$value->alias) }}"><img src="{{ url('public/upload/news/'.$value->image.'') }}" alt="{{ $value->title }}"></a>
                                            <a href="{{ url('tin-tuc',$value->alias) }}"><h2>{{ $value->title }}</h2></a>
                                            <div style="text-overflow: ellipsis; word-wrap: break-word; overflow: hidden; max-height: 3.6em; line-height: 1.8em; padding:0px 10px;">
                                             <?php echo substr($value->content, 0,100)." ..."; ?>
                                            </div>
                                        </div>    

                                            @endif
                                            @endforeach                         
                                        </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 " id="col-r">
                            <div class="row">
                                
                                <div class=" os-tuyendart">
                                    <div class="tab-content">
                                        <div class="tab-pane active news_list" id="home">
                                        
                                        <?php  $i = -1; ?>
                                        @foreach($news as $value)
                                        @if($value->active == 1)
                                        <?php 
                                       $i++;
                                        
                                         
                                            
                                        ?>
                                       
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="{{ url('tin-tuc',$value->alias) }}" onmouseover="Slidenews(<?php echo $i; ?>)" title="{{ $value->title }}">
                                                <img class="media-object" src="{{ url('public/upload/news/'.$value->image.'') }}" alt="{{ $value->title }}">
                                                    </a>
                                                </div>
                                                <div class="media-body my_max_line">
                                                    <a href="{{ url('tin-tuc',$value->alias) }}" onmouseover="Slidenews(<?php echo $i; ?>)" title="{{ $value->title }}" class="new_title">{{ $value->title }}</a>
                                                </div>
                                            </div>
                                           <?php     ?>
                                            @endif
                                            @endforeach 
                                              <a class="xemtatca pull-right" style="padding-top: 5px;" href="{{ url('tin-tuc') }}">» Xem tất cả</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--.news-->


                    <hr style="padding-bottom:0px;margin-bottom: 0px;" />
                    {{-- <div class="row">
                        <h3 class="text-center text-uppercase os-tuyendart">Lĩnh vực hoạt động chính</h3>
                        <div id="owl-demo" class="owl-carousel os-tuyendart">
                        <div class="item col-xs-12">
                                        <div class="bord">
                                            <div class="pic">
                                                <a href="#coteccons-gia-tri-vuot-troi-cua-mot-tong-thau/"><img class="pic-image" src="http://www.coteccons.vn/app/uploads/2016/04/Tong-thau1-services.jpg" alt="" />
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h4 style="padding: 0px; margin: 10px 0px;">Tổng thầu xây lắp</h4>
                                                <p>Tổng thầu xây lắp, sửa chữa các công trình dân dụng, công trình công nghiệp.</p>
                                            </div>
                                        </div>
                                    </div><div class="item col-xs-12">
                                        <div class="bord">
                                            <div class="pic">
                                                <a href="#coteccons-su-tai-tinh-cua-thiet-ke-va-thi-cong/"><img class="pic-image" src="http://www.coteccons.vn/app/uploads/2016/04/design-build.jpg" alt="" />
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h4 style="padding: 0px; margin: 10px 0px;">Thiết kế và Thi công</h4>
                                                <p>Thiết kế tổng mặt bằng xây dựng công trình. Thiết kế và thi công công trình dân dụng.</p>
                                            </div>
                                        </div>
                                    </div><div class="item col-xs-12">
                                        <div class="bord">
                                            <div class="pic">
                                                <a href="#noi-that/"><img class="pic-image" src="http://www.coteccons.vn/app/uploads/2016/04/Noi-that-Service-330x220.jpg" alt="" />
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h4 style="padding: 0px; margin: 10px 0px;">Nội Thất</h4>
                                                <p>Thiết kế và thi công nội thất công trình dân dụng và công nghiệp.</p>
                                            </div>
                                        </div>
                                    </div><div class="item col-xs-12">
                                        <div class="bord">
                                            <div class="pic">
                                                <a href=""><img class="pic-image" src="http://www.coteccons.vn/app/uploads/2016/04/ha-tang.jpg" alt="" />
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h4 style="padding: 0px; margin: 10px 0px;">Hạ tầng</h4>
                                                <p>Thi công công trình kỹ thuật hạ tầng khu đô thị, khu công nghiệp, giao thông và thủy lợi.</p>
                                            </div>
                                        </div>
                                    </div><div class="item col-xs-12">
                                        <div class="bord">
                                            <div class="pic">
                                                <a href=""><img class="pic-image" src="http://www.coteccons.vn/app/uploads/2016/04/m-e-300x195.jpg" alt="" />
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h4 style="padding: 0px; margin: 10px 0px;">MEP</h4>
                                                <p>Thiết kế cập nhiệt, thông hơi, thông gió, điều hòa không khí công trình dân dụng.</p>
                                            </div>
                                        </div>
                                    </div>                        </div>
                    </div><!-- .linhvuchoatdong--> --}}

                </div> <!-- .column left-->
                
                <div class="col-xs-12 col-sm-4 col-md-4">
                        
                  {{-- <div class="box">
                    <div class="title title-bg clearfix os-tuyendart w3danima">
                        <h3>Hợp tác cùng CotecCons</h3>
                    </div>
                    <div>
                        <div class="media pad15"><div class="media-left"><a href="#" data-toggle="modal" data-target="#videoModal" data-thevideo="http://www.youtube.com/embed/GkZsYZPH9TE"> <img class="media-object" style="width: auto;" src="images/icon3_3.png" alt="..." /> </a></div><div class="media-body"><p>Thương hiệu Coteccons giờ đây đã trở thành bảo chứng chất lượng cho những công trình mang đẳng cấp quốc tế. Nhấp chuột vào link liên kết để tham gia vào chuỗi cung ứng của CotecCons</p></div></div><div class="text-center button-link"><a class="btn btn-custom" href="#thong-tin-nang-luc/">Giới thiệu Năng lực</a> <a class="btn btn-custom" style="width: 148px;" href="#gop-y/">Góp ý</a></div><div class="text-center"><table border="0" width="95%"><tbody><tr><td style="text-align: right;"><div style="font-size: 22px;"><a href="tel:0931106080">0931 106 080</a></div></td><td rowspan="2"><a href="tel:0931106080"><img class="hotline" src="images/icon-hotline.jpg" alt="" /></a></td></tr><tr><td style="text-align: right;"><div style="font-size: 15px; color: #337ab7;">HOTLINE</div></td></tr></tbody></table></div>                    </div>
                  </div> --}}
                  @include('site.layout.info-project-slibar')
                </div>
                <!-- left col-md-4-->
                
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="title os-tuyendart w3danima">
                        <div class="fleft">
                        <?php 
                            $category_parent = DB::table('category')->where('alias','tin-tuc')->first();
                            $category_child = DB::table('category')->where('parent_id',$category_parent->category_id)->first();
                            $news = DB::table('news')->where('category_id',$category_child->category_id)->limit(3)->get();
                         ?>
                            
                                <a href="{{ url('danh-muc/tin-tuc',$category_child->alias) }}"><h3 style="color:#062245;">{{ $category_child->name }}</h3></a>
                           
                        </div>
                        <br clear="all">
                    </div>
                    @foreach($news  as $value)
                    @if($value->active == 1)
                    <div class="media">
                                    <div class="media-left">
                                        <a href="{{ url('tin-tuc',$value->alias) }}">
                                            <img class="media-object" src="{{ url('public/upload/news/'.$value->image.'') }}" alt="{{ $value->title }}">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="{{ url('tin-tuc',$value->alias) }}">{{ $value->title }}</a>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="title os-tuyendart w3danima">
                        <div class="fleft">
                        <?php 
                            $category_parent_1 = DB::table('category')->where('alias','tin-tuc')->first();
                            $category_child_1 = DB::table('category')->where('parent_id',$category_parent_1->category_id)->orderBy('category_id','desc')->first();
                            $news_1 = DB::table('news')->where('category_id',$category_child_1->category_id)->limit(3)->get();
                         ?>
                            <a href="{{ url('danh-muc/tin-tuc',$category_child->alias) }}"><h3 style="color:#062245;">{{ $category_child_1->name }}</h3></a>   
                        </div>
                        <br clear="all">
                    </div>
                    @foreach($news_1  as $value)
                    @if($value->active == 1)
                    
                    <div class="media">
                                    <div class="media-left">
                                        <a href="{{ url('tin-tuc',$value->alias) }}">
                                            <img class="media-object" src="{{ url('public/upload/news/'.$value->image.'') }}" alt="{{ $value->title }}">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="{{ url('tin-tuc',$value->alias) }}">{{ $value->title }}</a>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4" style="padding-top: 8px;">
                    <div class="title title-bg os-tuyendart w3danima">
                        <h3>Tuyển dụng</h3>
                    </div>

                    <div class="boxlink">
                        {{-- <ul>
                        <li>
                                    &raquo; <a href="#recruitment/ky-su-trac-dia/">Kỹ sư Trắc Địa</a>
                                </li><li>
                                    &raquo; <a href="#recruitment/nhan-vien-bim-khoi-co-dien/">Nhân viên BIM – Khối Cơ Điện</a>
                                </li><li>
                                    &raquo; <a href="#recruitment/giam-sat-me/">Giám sát M&E</a>
                                </li><li>
                                    &raquo; <a href="#recruitment/giam-sat-thi-cong-xay-dung/">Giám sát thi công xây dựng</a>
                                </li><li>
                                    &raquo; <a href="#recruitment/nhan-vien-ke-toan/">Nhân viên kế toán</a>
                                </li><li>
                                    &raquo; <a href="#recruitment/chuyen-vien-an-toan/">Chuyên viên An toàn</a>
                                </li>  
                        </ul> --}}
                    </div>
            </div>

        </div>
                    
    </div>
</section>
    
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div>
                    <iframe width="100%" height="350" src="" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>    
<br clear="all">	
@endsection