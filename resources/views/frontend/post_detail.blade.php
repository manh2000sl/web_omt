@extends('layouts.app')
@section('content_left')
@if(empty($post))
        Khoong ton tai bai viet
@else
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
                        {{$post->author->name}}
                    </a>

                    <span class="m-rl-3">-</span>

                    <span>
                        {{$post->updated_at}}
                    </span>
                </span>
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
    </div>
</div>
@endif
@endsection
