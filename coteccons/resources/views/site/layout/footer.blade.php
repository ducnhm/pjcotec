<footer>
    
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="title">
                    <h3>Công ty thành viên</h3>
                </div>
                {{-- <div id="owl-demo2" class="owl-carousel">
                <div class="item col-xs-11" style="padding:0px 7px;"><a href="http://unicons.com.vn" target="_blank"><img src="http://www.href="#.vn/app/uploads/2016/04/20/Unicons_Logo_27062016.jpg" alt="Unicons" /></a></div><div class="item col-xs-11" style="padding:0px 7px;"><a href="http://www.ricons.vn/" target="_blank"><img src="http://www.href="#.vn/app/uploads/2016/04/logo2.jpg" alt="Ricons" /></a></div><div class="item col-xs-11" style="padding:0px 7px;"><img src="http://www.href="#.vn/app/uploads/2016/04/logo3.jpg" alt="FCC" /></div>                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 os-tuyendart">
                <div class="title">
                    <h3><p>Đối tác chiến lược</p></h3>
                </div>
                <div id="owl-demo3" class="owl-carousel">
                    <div class="item col-xs-11" style="padding:0px 7px;">
                                    <img src="http://www.href="#.vn/app/uploads/2016/05/31/Logo-Kusto.jpg" alt="Kustocem Pte. Ltd" />
                                </div>                </div> --}}
            </div>
        </div>
    </div>
        <div class="container">
        <div class="col-xs-12 bgopa">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h4>Thông tin công ty</h4>
                    <div class="menu-footer-1-container"><ul id="menu-footer-1" class="list">
                        <?php 

                                    $category_parent = DB::table('category')->where('alias','gioi-thieu')->first();
                                    $category_child = DB::table('category')->where('parent_id',$category_parent->category_id)->get();
                                    if($category_parent && $category_child) {
                                    foreach ($category_child as $key => $value) {
                                        if($value->active == 1){

                                 ?>
                    <li id="menu-item-186" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-186"><a href="{{ url('gioi-thieu',$value->alias) }}">{{ $value->name }}</a></li>

    <?php  } } } ?>

                    </ul></div>                
                </div>

                <div class="col-xs-12 col-sm-2 col-md-2">
                    
                    <h4> &nbsp; CTD</h4>
                    <div style="color:#fff; padding-left:30px;">
                        <strong style="font-size:36px;">215.0</strong> <span></span>
                    </div>
                    <div style="color:#fff; padding-left:10px;">
                        <br /> &nbsp; 3.0 (1.4%)                         <br /> 15:15 - 11/08/2016                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h4>Liên hệ</h4>
                    <div class="some-content-related-div">
                        <div id="inner-content-div">
                            <h5>Văn phòng Chính:</h5>
                            <?php $contact = DB::table('contact')->first(); ?>
                                <ul class="list-f lienhe-f">
                                	<li><span class="glyphicon glyphicon-home"></span>{{ $contact->address }}</li>
                                	<li><span class="glyphicon glyphicon-earphone"></span>{{ $contact->phone }}</li>
                                    {{-- <li><span class="glyphicon glyphicon-download-alt"></span>{{ $contact->phone }}</li> --}}
                                	<li><span class="glyphicon glyphicon-envelope"></span><strong>Email:</strong> <a href="">{{ $contact->email }}</a></li>
                                </ul>
                   </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<section class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <p class="text-left"><span>Copyright © 2016 <strong></strong> Carboncor Company</span> Design by <a href="http://panpic.com.vn" target="_blank" style="color:#333;">DucIT</a></p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="text-right">
                    {{-- <a href="http://portal.href="#.vn/" target="_blank"><img src="http://www.href="#.vn/app/uploads/2016/05/16/portal.png" alt="portal" /></a> &nbsp; 
<a href="http://mail.href="#.vn" target="_blank"><img src="http://www.href="#.vn/app/uploads/2016/05/15/email-icon.png" alt="Webmail href="#"></a> &nbsp; 
<a href="https://www.youtube.com/watch?v=dX1HeayFxww&amp;feature=youtu.be" target="_blank"><img class="alignnone wp-image-549 size-full" src="http://www.href="#.vn/app/uploads/2016/04/yt.jpg" alt="yt" /></a> --}}                </div>
            </div>
        </div>
    </div>
</section>