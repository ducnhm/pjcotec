@extends('site.layout.main')
@section('title','Danh mục dự án')
@section('content')
@include('site.layout.bredcrumbs')


	<section class="project">
    <div class="container">
        <div class="row custom-project-list">
            <div class="col-xs-12 col-sm-9 col-md-9">
                
                <div class="title os-tuyendart w3danima">
                    <div class="fleft">
                        <h3 style="color:#062245;">
                            <?php 

                               if(isset($name_lo_cate_month)){
                                   echo "Dự án / ".$name_lo_cate_month->name;
                                   
                               }
                               else {
                                    echo "Dự án";
                               }
                             ?>
                        </h3>
                    </div>
                    <br clear="all">
                </div>
                {{-- show project by category project or months or location --}}
                <?php 
                
                    if(empty($project)){
                        echo "Hiện không có dự án nào !";
                    }
                    else {
                 ?>
                @foreach($project as $item)
                @if($item->active == 1)
                <div class="col-xs-12 col-sm-6 col-md-4 project-box">
                            <div class="pic"><a href="{{ url('du-an',$item->alias) }}" title="{{ $item->title }}"><img class="pic-image" src="{{ url('public/upload/project/'.$item->images.'') }}" alt="{{ $item->title }}"></a></div>
                            <h5><a href="{{ url('du-an',$item->alias) }}">{{ $item->title }}</a></h5><h6><a href="{{ url('du-an',$item->alias) }}">Xem thêm</a></h6>
                        </div>
                @endif
                @endforeach
               

                
                        <br clear="all" /><div class="row" id="pagination">
                                <?php echo $project->links(); ?>

                            </div>   <?php } ?>          </div>
    @include('site.layout.slibar-cate-project')
@endsection