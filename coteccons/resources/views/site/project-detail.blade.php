@extends('site.layout.main')
@section('title','Dự án')
@section('content')
	
@include('site.layout.bredcrumbs')
    <section class="project">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8">
                
                <!--
                <div class="title os-tuyendart w3danima">
                    <div class="fleft">
                        <h3 style="color:#062245;">Tin Công Ty</h3>
                    </div>
                    <br clear="all">
                </div>
                -->
                
                <h1 class="custom-detail">{{ $project->title }}</h1>
                        <?php echo $project->content; ?>
                
                                
                <br clear="all">    
                <div class="title3 os-tuyendart w3danima">
                    <div class="fleft">
                        <h3 style="color:#062245;">Chủ đề liên quan</h3>
                    </div>
                    <br clear="all">
                </div>
                
                <div class="row list1">
                @foreach($projects_rela as $item)
                @if($item->active == 1)
                <div class="col-xs-12 col-sm-6 col-md-4">
                            <a href="{{ url('du-an',$item->alias) }}"><img src="{{ url('public/upload/project/'.$item->images.'') }}" alt=""></a>
                            <h5><a href="{{ url('du-an',$item->alias) }}">{{ $item->title }}</a></h5>
                            <p><?php echo substr($item->content, 0,100); ?></p>
                            <h6><a href="{{ url('du-an',$item->alias) }}">Xem chi tiết</a></h6>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            {{--  get category , location and months of project --}}
	@include('site.layout.slibar-cate-project')
@endsection