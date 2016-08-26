<!DOCTYPE html>
<html lang="vi" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Carboncor - @yield('title')</title>
	<!--[if lt IE 9]>
	<script type='text/javascript' src='http://www.coteccons.vn/template/js/html5.js?ver=3.7.3'></script>
	<![endif]-->
    <base href="{{asset('')}}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="resources/assets/site/css/style.css" rel="stylesheet">
    <link href="resources/assets/site/css/custom.css" rel="stylesheet">
    <link href="resources/assets/site/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/assets/site/css/owl.carousel.css" rel="stylesheet">
    <link href="resources/assets/site/css/owl.theme.css" rel="stylesheet">

    {{-- slide --}}
    {{-- <link href="resources/assets/site/css/full-slider.css" rel="stylesheet"> --}}
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section class="top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-2">
                <div class="logo os-tuyendart">
                    <a href="{{ url('/') }}"><img src="resources/assets/site/images/logo.png" alt="Logo CotecCons" /></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-6">
                <div class="row os-tuyendart">
                    <h2 class="slogan">OUR EXPERIENCE DRIVES US FORWARD</h2>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                {{-- <div class="lang">
                    <ul>
                    <li>
                                <a href=""><img src="resources/assets/site/images/language/vn.png" alt="Tiếng Việt">
                                </a>
                            </li><li>
                                <a href=""><img src="resources/assets/site/images/language/gb.png" alt="English">
                                </a>
                            </li><li>
                                <a href=""><img src="resources/assets/site/images/language/cn.png" alt="中文">
                                </a>
                            </li><li>
                                <a href=""><img src="resources/assets/site/images/language/jp.png" alt="日本語">
                                </a>
                            </li>                    </ul>
                   
                </div> --}}
                 <div class="clearfix"></div><br>

                <div class="search">
                    <div class="bsearch">
                        
<form role="search" method="get" class="search-form" action="http://www.coteccons.vn/">
    <input type="search" class="input-sm" maxlength="64" placeholder="Tìm kiếm &hellip;" value="" name="s" title="Tìm kiếm" />
    <button type="submit" class="btn btn-primary btn-sm">Tìm kiếm</button>
</form>
                        <br clear="all" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('site.layout.menu')

@yield('content')

@include('site.layout.footer')

<div class="sub_top" style="display: none;"><a href="#"><img src="http://www.coteccons.vn/images/btn_top_off.png" alt="top" /></a></div>

</script>
{{-- <script src="resources/assets/site/js/jquery.js"></script> --}}
<script src="resources/assets/site/js/jquery.min.js"></script>
<script src="resources/assets/site/js/bootstrap.min.js"></script>
<script src="resources/assets/site/js/w3danima.js"></script>
<script src="resources/assets/site/js/owl.carousel.js"></script>
<script src="resources/assets/site/js/jquerys.min.js"></script>
<script src="resources/assets/site/js/jquery-ui.js"></script>
<script src="resources/assets/site/js/jquery.slimscroll.min.js"></script>
<script src="resources/assets/site/js/jquery.hc-sticky.js"></script>

<script src="resources/assets/site/js/footer-homepage.js"></script>
<script type="text/javascript">
    var read_more = "Xem thêm";
</script>
<script src="resources/assets/site/js/custom-footer.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.my-grid').WMGridfolio();
        
        
        
        $('.wmg-thumbnail-content img').on('click', function() {
            var custom_height = $(this).closest('.wmg-item').find('.exemplo').height();
            
            custom_height += 40;
            
            $(this).closest('.wmg-item').css({'margin-bottom': custom_height+'px'});
            
        });
        
        
        $('.og-bg').on('click', function() {
            var custom_height = $(this).closest('.wmg-item').find('.exemplo').height();
            
            custom_height += 40;
            
            $(this).closest('.wmg-item').css({'margin-bottom': custom_height+'px'});
            
        });
        
        
    });
</script>
</body>
</html>