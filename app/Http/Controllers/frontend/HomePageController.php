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
        $topics = Topic::whereIn('id', [ID_TOPIC_CHINH_TRI, ID_TOPIC_KHOA_HOC, ID_TOPIC_DOI_SONG])->get();

        //danh sách bài viết chính trị
        $topics13 = $topics->where('id', ID_TOPIC_CHINH_TRI)->first();
        $postOfId13 = Post::where('topic', ID_TOPIC_CHINH_TRI)->where('status', '=', '1')->orderBy('id', 'desc')->with('author')->limit(LIMIT_OF_POST_IN_DASHBOARD)->get();

        //danh sách bài viết Khoa học
        $topics26 = $topics->where('id', ID_TOPIC_KHOA_HOC)->first();
        $postOfId26 = Post::where('topic', ID_TOPIC_KHOA_HOC)->where('status', '=', '1')->orderBy('id', 'desc')->with('author')->limit(LIMIT_OF_POST_IN_DASHBOARD)->get();

        //danh sách bài viết Đời sống
        $topics29 = $topics->where('id', ID_TOPIC_DOI_SONG)->first();
        $postOfId29 = Post::where('topic', ID_TOPIC_DOI_SONG)->where('status', '=', '1')->orderBy('id', 'desc')->with('author')->limit(LIMIT_OF_POST_IN_DASHBOARD)->get();

        return view('frontend.dashboard', compact('topics13', 'postOfId13', 'topics26', 'postOfId26', 'topics29', 'postOfId29'));
    }

    /**
     * Show the form for creating a new resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function detail($slug)
    {
        $post = Post::where('slug', '=', $slug)->with('toTopic')->first();
        return view('frontend.post_detail', compact('post'));
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $topics_info = Topic::where('slug', '=', $slug)->first();
        $postOfIds = [];
        if (!empty($topics_info)) {
            $postOfIds = Post::where('topic', $topics_info->id)->where('status', '=', '1')->orderBy('id', 'desc')->get();
        }
        return view('frontend.list_post', compact('postOfIds', 'topics_info'));
    }

}
