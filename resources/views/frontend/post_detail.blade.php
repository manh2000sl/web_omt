@extends('frontend.main')
@section('content_left')
<div class="col-md-10 col-lg-8 p-b-30">
    <div class="p-r-10 p-r-0-sr991">
        <!-- Blog Detail -->
        <div class="p-b-70">
            <h1 href="#" class="f1-l-1 cl2 text-danger">
                {{$post->toTopic->name}}
            </h1>

            <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                {{$post->title}}
            </h3>

            <div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										{{$post->toUser->name}}
									</a>

									<span class="m-rl-3">-</span>

									<span>
										{{$post->updated_at}}
									</span>
								</span>

{{--                <span class="f1-s-3 cl8 m-r-15">--}}
{{--									5239 Views--}}
{{--								</span>--}}

{{--                <a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">--}}
{{--                    0 Comment--}}
{{--                </a>--}}
            </div>

            <div class="wrap-pic-max-w p-b-30">
                <img src="{{$post->image_path}}" alt="IMG">
            </div>

            <p class="f1-s-11 cl6 p-b-25">
                {!! $post->summary !!}
            </p>

            <p class="f1-s-11 cl6 p-b-25">
                {!! $post->content !!}
            </p>



        </div>

        <!-- Leave a comment -->
{{--        <div>--}}
{{--            <h4 class="f1-l-4 cl3 p-b-12">--}}
{{--                Leave a Comment--}}
{{--            </h4>--}}

{{--            <p class="f1-s-13 cl8 p-b-40">--}}
{{--                Your email address will not be published. Required fields are marked *--}}
{{--            </p>--}}

{{--            <form>--}}
{{--                <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Comment..."></textarea>--}}

{{--                <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">--}}

{{--                <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*">--}}

{{--                <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="website" placeholder="Website">--}}

{{--                <button class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">--}}
{{--                    Post Comment--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
    </div>
</div>
@endsection
