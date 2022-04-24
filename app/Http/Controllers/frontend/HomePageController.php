<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    use StorageImageTrait;

    public function __construct(Topic $topic, Post $post, User $user)
    {
        $this->Topic = $topic;
        $this->Post = $post;
        $this->User = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::where('highlight', '=', '1')->orderBy('updated_at', 'desc')->limit(4)->get();

        $topics = Topic::all();

        //danh sách bài viết chính trị
        $topics13 = Topic::find(13);
        $postOfId13 = $topics13->Post()->where('status', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
        //danh sách bài viết Khoa học
        $topics26 = Topic::find(26);
        $postOfId26 = $topics26->Post()->where('status', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
        //danh sách bài viết Đời sống
        $topics29 = Topic::find(29);
        $postOfId29 = $topics29->Post()->where('status', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
        $postNews = Post::where('status', '=', '1')->orderBy('id', 'desc')->paginate(8);
//        if($request->ajax())
//        {
//            $html= view('frontend.new_post',compact('postNews'))->render();
//            return response(['html'=>$html]);
//        }

        return view('frontend.main', compact('posts', 'topics', 'topics13', 'postOfId13',
            'topics26', 'postOfId26',
            'topics29', 'postOfId29',
            'postNews',
        ));
    }

    /**
     * Show the form for creating a new resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function detail($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        $posts = Post::where('highlight', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
        $topics_1 = Topic::where('slug', '=', $slug)->first();
        $topics = Topic::all();
        $topics13 = Topic::find(13);
        $postOfId13 = $topics13->Post()->where('status', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
        //danh sách bài viết Khoa học
        $topics26 = Topic::find(26);
        $postOfId26 = $topics26->Post()->where('status', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
        //danh sách bài viết Đời sống
        $topics29 = Topic::find(29);
        $postOfId29 = $topics29->Post()->where('status', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
//        $postOfIds = $topics_1->Post()->where('status', '=', '1')->orderBy('id', 'desc')->get();
        $postNews = Post::orderBy('id', 'desc')->paginate(6);
        return view('frontend.post_detail', compact('topics_1', 'topics', 'topics13', 'topics26', 'postOfId26',
            'topics29', 'postOfId29', 'postOfId13', 'posts', 'postNews', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $posts = Post::where('highlight', '=', '1')->orderBy('id', 'desc')->limit(4)->get();

        $topics_1 = Topic::where('slug', '=', $slug)->first();
        $topics = Topic::all();
        $postOfIds = $topics_1->Post()->where('status', '=', '1')->orderBy('id', 'desc')->get();
        $topics13 = Topic::find(13);
        $postOfId13 = $topics13->Post()->where('status', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
        //danh sách bài viết Khoa học
        $topics26 = Topic::find(26);
        $postOfId26 = $topics26->Post()->where('status', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
        //danh sách bài viết Đời sống
        $topics29 = Topic::find(29);
        $postOfId29 = $topics29->Post()->where('status', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
//        $postOfIds = $topics_1->Post()->where('status', '=', '1')->orderBy('id', 'desc')->get();
        $postNews = Post::orderBy('id', 'desc')->paginate(6);
        return view('frontend.list_post', compact('postOfIds', 'topics_1', 'topics', 'topics13', 'topics26', 'postOfId26',
            'topics29', 'postOfId29', 'postOfId13', 'posts', 'postNews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
