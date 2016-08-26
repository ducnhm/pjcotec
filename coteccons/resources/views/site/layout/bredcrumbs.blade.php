<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb" vocab="http://rdf.data-vocabulary.org/#">

  {{-- // bredcrumbs level 1 --}}
                {{-- home --}}
                <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="{{ url('') }}"><i class="glyphicon glyphicon-home"></i> {{ Request::is('*') ? 'Trang chủ' : '' }}</a></span> / 

  {{-- // bredcrumbs level 2 --}}

                  


                 {{-- xử lý project --}}
                 @if(Request::is('danh-muc/du-an*'))
                  <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="{{ url('du-an/') }}"> {{ Request::is('danh-muc/du-an*')? 'Dự án' : '' }}</a>/</span> 
                  @endif

                  @if(Request::is('du-an/*'))
                      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="{{ url('du-an/') }}"> {{ Request::is('du-an/*')? 'Dự án' : '' }}</a>/</span> 
                  @endif
                  {{--  xử lý tin tức --}}
                  @if(Request::is('danh-muc/tin-tuc*'))
                  <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="{{ url('tin-tuc/') }}"> {{ Request::is('danh-muc/tin-tuc*')? 'Tin tức' : '' }}</a>/</span> 
                  @endif
                   @if(Request::is('tin-tuc/*'))
                      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="{{ url('tin-tuc/') }}"> {{ Request::is('tin-tuc/*')? 'Tin tức' : '' }}</a>/</span> 
                  @endif
                  

                  





 {{--  // // bredcrumbs level 3 --}}
                {{-- xử ly project --}}
                @if(Request::is('danh-muc/du-an*'))
                <span class="current">{{ Request::is('danh-muc/du-an*')? $name_lo_cate_month->name : '' }}</span> 
                @endif
                  {{-- new --}}
                @if(Request::is('du-an'))
                   <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="{{ url('du-an') }}"> {{ Request::is('du-an')? 'Dự án' : '' }}</a></span> 
                   @endif

                @if(Request::is('du-an/*'))
                <span class="current">{{ Request::is('du-an/*')? $project->title : '' }}</span> 
                @endif

                {{-- xử lý tin tức --}}
                @if(Request::is('tin-tuc'))
                   <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="{{ url('tin-tuc') }}"> {{ Request::is('tin-tuc')? 'Tin tức' : '' }}</a></span> 
                   @endif
                @if(Request::is('danh-muc/tin-tuc*'))
                <span class="current">{{ Request::is('danh-muc/tin-tuc*')? $category->name : '' }}</span> 
                @endif
                @if(Request::is('tin-tuc/*'))
                <span class="current">{{ Request::is('tin-tuc/*')? $new->title : '' }}</span> 
                @endif

                @if(Request::is('gioi-thieu/*'))
                <span class="current">{{ Request::is('gioi-thieu/*')? $category->name : '' }}</span> 
                @endif

                         
                 

                 
                 {{-- get url du-an --}}
                  
                               <!--
                <ol class="breadcrumb">
                  <li><i class="glyphicon glyphicon-home"></i> <a href="#">Trang chủ</a></li>
                  <li><a href="#">Tin tức</a></li>
                  <li class="active">Thông tin công ty</li>
                </ol>
                -->
                </div> 
            </div>
        </div>
    </div>
</section>