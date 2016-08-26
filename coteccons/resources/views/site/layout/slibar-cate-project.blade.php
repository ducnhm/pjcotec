<div class="col-xs-12 col-sm-3 col-md-3">
               
<div class="box"> 
                    
    <div class="title3 os-tuyendart w3danima">
        <div class="fleft">
            <h3 style="color:#062245;">Dự án</h3>
        </div>
        <br clear="all">
    </div>
    <div class="boxlink">
    
                   <h1 class="page-heading "><span class="h-title">Theo dự án</span></h1> 
                   <div class="boxlink ">
                    <ul>
                        <?php 

                            $cate_pro = DB::table('cate_project')->get();
                            foreach ($cate_pro as $key => $value) {
                                if($value->active == 1) {
                             ?>
                                <li>
                            &raquo; <a href="{{ url('danh-muc/du-an',$value->alias) }}">{{ $value->name }}</a>
                        </li>
                           <?php } }
                        ?>
                    


                        </ul>
                      </div>
                   <h1 class="page-heading "><span class="h-title">Theo năm</span></h1> 
                   <div class="boxlink sort_years">
                    <ul>
                     <?php 

                            $months = DB::table('months')->get();
                            foreach ($months as $key => $value) { 
                                if($value->active == 1) {
                              ?>
                    <li>
                            &raquo; <a href="{{ url('danh-muc/du-an',$value->alias) }}">{{ $value->name }}</a>
                        </li>
                        <?php } } ?>
                        </ul>
                      </div>
                  {{--  <h1 class="page-heading "><span class="h-title">Theo tiến độ</span></h1> 
                   <div class="boxlink ">
                    <ul><li>
                            &raquo; <a href="http://www.href="#.vn/du-an/category/da-thi-cong/">Đã thi công</a>
                        </li><li>
                            &raquo; <a href="http://www.href="#.vn/du-an/category/dang-thi-cong/">Đang thi công</a>
                        </li></ul>
                      </div> --}}
                   <h1 class="page-heading "><span class="h-title">Theo vị trí</span></h1> 
                   <div class="boxlink ">
                    <ul>
                    <?php 
                    $location = DB::table('location')->get();
                    foreach ($location as $key => $value) { if($value->active == 1) { ?>
                       {{--  # code... --}}
                    

                    <li>
                            &raquo; <a href="{{ url('danh-muc/du-an',$value->alias) }}">{{ $value->name }}</a>
                        </li>

                        <?php } } ?> </ul>
                      </div>    </div>
</div>

<!--
<div class="title3 os-tuyendart w3danima">
    <div class="fleft">
        <h3 style="color:#062245;">Tin thị trường</h3>
    </div>
    <br clear="all">
</div>
-->


            </div>

            </div>
        </div>
    </div>