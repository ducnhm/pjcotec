<div class="col-xs-12 col-sm-4 col-md-4">
            <div class="box"> 
    <div class="title3 os-tuyendart w3danima">
        <div class="fleft">
            <h3 style="color:#062245;">Giới thiệu</h3>
        </div>
        <br clear="all">
    </div>

    <div class="boxlink">
    <ul id="menu-mn-aboutus" class="">

    <?php $cate_parent = DB::table('category')->where('alias','tin-tuc')->first();
        
        if($cate_parent){
            $cate_child = DB::table('category')->where('parent_id',$cate_parent->category_id)->get();
        foreach ($cate_child as $key => $value) {
            if ($value->active == 1) {
                # code...
            
            # code...
       
     ?>
    <li id="menu-item-1088" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1088">&raquo; <a href="{{ url('danh-muc/tin-tuc',$value->alias) }}">{{ $value->name }}</a></li>
    <?php  } } } ?>
</ul>    </div>
</div>
<br clear="all">
<div class="box sub-right">
    <div class="title title-bg os-tuyendart w3danima">
        <h3>Thông tin dự án</h3>
    </div>
    <?php $project = DB::table('project')->inRandomOrder()->limit(10)->get(); 
    foreach ($project as $key => $value) {
        # code...
   

    ?>
    <div class="media">
                <div class="media-left">
                                        <a href="{{ url('du-an',$value->alias) }}">
                                            <img class="media-object" src="{{ url('public/upload/project/'.$value->images.'') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="{{ url('du-an',$value->alias) }}">{{ $value->title }}</a><div><p><?php echo substr($value->content, 0,80)." ..."; ?></p></div></div>
                                   
            </div>

            <?php } ?>

            </div>
<br clear="all">
        
            </div>

           