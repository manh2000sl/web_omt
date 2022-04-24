@section('new_post')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-20">
                    <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                        <h3 class="f1-m-2 cl3 tab01-title">
                            Tin tức mới nhất
                        </h3>
                    </div>

                    <div class="row p-t-35" id="ok" >
                        @foreach($postNews as $postNew)
                            @if($postNew->status ==1)
                                <div class="col-sm-6 p-r-25 p-r-15-sr991"  >
                                    <!-- Item latest -->
                                    <div class="m-b-45">
                                        <a href="{{route('index.detail',['slug'=>$postNew->slug])}}" class="wrap-pic-w hov1 trans-03">
                                            <img style="width: 320px; height: 180px; object-fit: cover"
                                                 src="{{$postNew->image_path}}">
                                        </a>

                                        <div class="p-t-16">
                                            <h5 class="p-b-5">
                                                <a href="{{route('index.detail',['slug'=>$postNew->slug])}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                    {{$postNew->title}}
                                                </a>
                                            </h5>

                                            <span class="cl8">
										<a href="{{route('index.detail',['slug'=>$postNew->slug])}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            {{$postNew->toUser->name}}
                                        </a>
										<span class="f1-s-3 m-rl-3">
-
										</span>
										<span class="f1-s-3">
                                            {{$postNew->updated_at}}
                                        </span>
									</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="clearfix">
                        {{$postNews->links()}}
                    </div>
                </div>

                {{--/////////////////////////////////////////////////////////--}}
                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!-- Video -->
                        <div class="p-b-55">
                            <div class="how2 how2-cl4 flex-s-c m-b-35">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Featured Video
                                </h3>
                            </div>

                            <div>
                                <div class="wrap-pic-w pos-relative">
                                    <img src="images/video-01.jpg" alt="IMG">

                                    <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03"
                                            data-toggle="modal"
                                            data-target="#modal-video-01">
                                        <span class="fab fa-youtube"></span>
                                    </button>
                                </div>

                                <div class="p-tb-16 p-rl-25 bg3">
                                    <h5 class="p-b-5">
                                        <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
                                            Music lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl15">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
by John Alvarado
</a>

										<span class="f1-s-3 m-rl-3">
-
										</span>

										<span class="f1-s-3">
Feb 18
</span>
									</span>
                                </div>
                            </div>
                        </div>

                        <!-- Subscribe -->
                        <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
                            <h5 class="f1-m-5 cl0 p-b-10">
                                Subscribe
                            </h5>

                            <p class="f1-s-1 cl0 p-b-25">
                                Get all latest content delivered to your email a few times a month.
                            </p>

                            <form class="size-a-9 pos-relative">
                                <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email"
                                       placeholder="Email">

                                <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Tag -->
                        {{--                        <div class="card-footer clearfix">--}}
                        {{--                            {!! $postNew->links() !!}--}}
                        {{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
{{--        @section("script")--}}
{{--        <script type="text/javascript">--}}
{{--            $(function (){--}}
{{--                $('.pagination a').unbind('click').on('click', function(e) {--}}
{{--                    e.preventDefault();--}}
{{--                    var page = $(this).attr('href').split('page=')[1];--}}

{{--                    getlistPosts(page);--}}

{{--                });--}}
{{--                function getlistPosts(page)--}}
{{--                {--}}
{{--                    $.ajax({--}}
{{--                        type: "GET  ",--}}
{{--                        url: '?page='+ page,--}}
{{--                        success: function(data) {--}}
{{--                            alert(data) ;--}}
{{--                        }--}}

{{--                    });--}}

{{--                }--}}
{{--            }--}}
{{--            )--}}
{{--        </script>--}}
{{--        @endsection--}}
@endsection
