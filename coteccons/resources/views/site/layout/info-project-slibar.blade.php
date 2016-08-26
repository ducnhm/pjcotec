    <div class="box custom-duan">
                    <div class="title title-bg os-tuyendart w3danima">
                        <a href="{{ url('du-an') }}" style="text-decoration: none;"><h3>Thông tin dự án</h3></a>
                    </div>
                    @foreach($projects as $item)
                    @if($item->active == 1)
                    <div class="media">
                                    <div class="media-left">
                                        <a href="{{ url('du-an',$item->alias) }}">
                                            <img class="media-object" src="{{ url('public/upload/project/'.$item->images.'') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="{{ url('du-an',$item->alias) }}">{{ $item->title }}</a><div><p><?php echo substr($item->desc, 0,100); ?></p></div></div>
                                    </div>
                                @endif
                            @endforeach
                  </div>