@extends('site.layout.main')
@section('title','Giới thiệu')
@section('content')
	<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb" vocab="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="#"><i class="glyphicon glyphicon-home"></i> Trang chủ</a></span> / <span class="current">Liên hệ</span></div>                <!--
                <ol class="breadcrumb">
                  <li><i class="glyphicon glyphicon-home"></i> <a href="#">Trang chủ</a></li>
                  <li><a href="#">Tin tức</a></li>
                  <li class="active">Thông tin công ty</li>
                </ol>
                -->
            </div>
        </div>
    </div>
</section><script>
var top = ($('.content-nav').offset() || { "top": NaN }).top;
</script>

<section class="project">
    <div class="container">
        <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7">
<div>
<h1 class="page-heading "><span class="h-title">Văn phòng chính</span></h1>
<ul class="list-f lienhe-f">
	<li>{{ $contact->address }}</li>
	<li><strong>ĐT</strong>: {{ $contact->phone }} &#8211; <strong>Fax</strong>: {{ $contact->fax }}</li>
	<li><strong>Email:</strong> <a href="">{{ $contact->email }}</a></li>
</ul>
</div>
<div class="fl-wrapper mymaps-area-1" style="">  <div class="map-wrapper-1" style="width=100%;height:500px;"><div id="map-canvas-1" style="width:100%;height:100%;top:0;left:0;"><?php echo $contact->map ?></div></div><div class="legend-carousel-1" style="width:100%;"></div>
            </div><style>.mymaps-area-1 img{ visibility:visible; }</style></div>
<div class="col-xs-12 col-sm-5 col-md-5">
<div>
<h3>Liên Hệ</h3>
</div>
<div role="form" class="wpcf7" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>
<form action="{{  url('/') }}" method="post" class="wpcf7-form frm_contact" novalidate="novalidate">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="5" />
<input type="hidden" name="_wpcf7_version" value="4.4.2" />
<input type="hidden" name="_wpcf7_locale" value="en_US" />
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f5-o1" />
<input type="hidden" name="_wpnonce" value="15eaca2162" />
</div>
<div class="form-group">
    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required custom-w100" aria-required="true" aria-invalid="false" placeholder="Họ tên" /></span> </p>
</div>
<div class="form-group">
    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email custom-w100" aria-invalid="false" placeholder="Email" /></span>
</div>
<div class="form-group">
<span class="wpcf7-form-control-wrap tel-989"><input type="tel" name="tel-989" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel custom-w100" aria-invalid="false" placeholder="Điện thoại" /></span>
</div>
<div class="form-group">
    <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text custom-w100" aria-invalid="false" placeholder="Tiêu đề" /></span>
</div>
<div class="form-group">
    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea custom-w100" aria-invalid="false" placeholder="Nội dung"></textarea></span>
</div>
<div class="form-group">
    <span class="wpcf7-form-control-wrap mathcaptcha-262"><input type="text" name="mathcaptcha-262" value="" size="2" maxlength="2" class="wpcf7-form-control wpcf7-mathcaptcha" aria-required="true" /> + &#53;7 = &#x36;5</span><input type="hidden" value="0" name="mathcaptcha-262-sn" />
</div>
<div class="form-group"><input type="submit" value="Liên Hệ" class="wpcf7-form-control wpcf7-submit btn btn-default custom-border-radius-none" /></div>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div></div>
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6">

</div>
<div class="fl-wrapper mymaps-area-3" style="">  <div class="map-wrapper-3" style="width=100%;height:500px;"><div id="map-canvas-3" style="width:100%;height:100%;top:0;left:0;"></div></div><div class="legend-carousel-3" style="width:100%;"></div>
            </div><style>.mymaps-area-3 img{ visibility:visible; }</style>
</div>
</div>            
        </div>
    </div>
    <br clear="all" />
</section>
@endsection