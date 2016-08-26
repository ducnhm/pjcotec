@extends('site.layout.main')
@section('content')
@include('site.layout.bredcrumbs')	
    <section class="project">
    <div class="container">
        <div class="row tintuc">
            <div class="col-xs-12 col-sm-8 col-md-8">
                
                <div class="title os-tuyendart w3danima">
                    <div class="fleft">
                        <h3 style="color:#062245;">
                            
                            <?php 

                                if(isset($category)){
                                    echo $category->name;
                                }
                                else {
                                    echo "Tin tức";
                                }
                             ?>
                        </h3>
                    </div>
                    <br clear="all">
                </div>
                @foreach($news as $value)
                @if($value->active == 1)
                <div class="row mgb10 custom-small">
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <a class="post-thumbnail image-link" href="{{ url('tin-tuc',$value->alias) }}">
                                            <img src="{{ url('public/upload/news/'.$value->image.'') }}" class="img-responsive" alt="{{ $value->title }}">                    
                                        </a>
                                        <span class="term-title term-13"><a class="colorf" href="javascript:void(0)"><?php 
                                                $category = DB::table('category')->where('category_id',$value->category_id)->first();
                                                if($category){
                                                    echo $category->name;
                                                }
                                         ?></a></span>                
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                        <h2 class="title-news"><a class="post-url" rel="bookmark" href="{{ url('tin-tuc',$value->alias) }}" title="{{ $value->title }}">{{ $value->title }}</a>
                                        </h2>

                                        <div class="post-summary summary the-content"><?php echo substr($value->content, 0,320)." ..."; ?></div>
                                        <a class="btn btn-read-more" href="{{ url('tin-tuc',$value->alias) }}" title="Xem thêm">Xem thêm</a>                    
                                    </div>
                                </div>
                                @endif
                                @endforeach
                               
                               
                                <hr /><div id="pagination">
                            <nav><?php echo $news->links(); ?>
</nav></div>            </div>
	@include('site.layout.slibar-news')
@endsection