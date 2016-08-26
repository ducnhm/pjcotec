@extends('site.layout.main')
@section('title','Giới thiệu')
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
                
                <h1 class="custom-detail">{{ $about->title }}</h1>
                        <?php echo $about->content; ?>
                
                                
                
                
                <div class="row list1">
                
                </div>
            </div>
            {{--  get category , location and months of project --}}
	@include('site.layout.slibar-about')
@endsection