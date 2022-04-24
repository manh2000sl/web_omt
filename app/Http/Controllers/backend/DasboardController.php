<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\PostAddRequest;
use App\Models\Topic;
use App\Models\User;

use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\Post;
use phpDocumentor\Reflection\Element;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class DasboardController extends Controller
{
    use StorageImageTrait;

    public function __construct(Topic $topic, Post $post, User $user)
    {
        $this->middleware('auth');
        $this->Topic = $topic;
        $this->Post = $post;
        $this->User = $user;

    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->Paginate(10);
        return view('backend.post.index', compact('posts'))->with('i',(request()->input('page',1)-1)*10);
    }
    public function create()
    {
        $topics = Topic::all();
        return view('backend.post.create', compact('topics'));
    }

    public function store(Request $request)
    {
        ///////----------Validator--------///////
        $roles = [
            'InputTitle' => 'bail|required|max:255|min:20',
            'convert_slug' => 'required',
            'exampleInputFile' => 'required',
            'summernote' => 'required',
            'summernote2' => 'required',
        ];
        $messages = [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá 255 kí tự',
            'min' => ':attribute không được ngắn hơn 20 kí tự',
            'unique:posts' => 'Chỉ được chọn 1 :attribute',

        ];
        $attributes = [
            'InputTitle' => 'Tiêu đề',
            'convert_slug' => 'slug',
            'input_topic' => 'Danh mục',
            'exampleInputFile' => 'Ảnh',
            'summernote2' => 'Nội dung',
            'summernote' => 'Tóm tắt',
        ];
        $validator = Validator::make($request->all(), $roles, $messages, $attributes);
        if ($validator->fails()) {
            return redirect('admin/create')
                ->withErrors($validator)
                ->withInput();
        }


        // Retrieve a portion of the validated input...
//        $validated = $validator->safe()->only(['name', 'email']);
//        $validated = $validator->safe()->except(['name', 'email']);
        /////////////////////////////////////////////////
        $post = [
            'title' => $request->InputTitle,
            'slug' => $request->convert_slug,
            'topic' => $request->input_topic,
            'summary' => $request->summernote,
            'content' => $request->summernote2,
            'user_id' => auth()->id(),
        ];
        $data = $this->storageTraitUpload($request, 'exampleInputFile', 'post');

        if (!empty($data)) {
            $post['image'] = $data['fileName'];
            $post['image_path'] = $data['filePath'];
        }
        Post::create($post);
        $posts = Post::get();
        return redirect()->route('admin.home', compact('posts'));

    }

    public function edit($id)
    {
        $topics = Topic::all();
        $posts = Post::find($id);

        $topicsOfPost = $posts->toTopic;

        return view('backend.post.edit', compact('topics', 'posts', 'topicsOfPost'));

    }

    public function update(Request $request, $id)
    {
        $post = [
            'title' => $request->InputTitle,
            'slug' => $request->convert_slug,
            'topic' => $request->input_topic,
            'summary' => $request->summernote,
            'content' => $request->summernote2,
            'status' => $request->r1,
            'highlight' => $request->r2,
//            'highlight'=>$request->checkBox2,
//            'user_id'=>auth()->id(),
        ];
        $data = $this->storageTraitUpload($request, 'exampleInputFile', 'post');
        if (!empty($data)) {
            $post['image'] = $data['fileName'];
            $post['image_path'] = $data['filePath'];
        }
        Post::find($id)->update($post);
        $posts = Post::get();

        return redirect()->route('admin.home', compact('posts'));
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        User::where('id', $id)->delete();
        Topic::where('id', $id)->delete();
        return redirect()->route('admin.home');
    }

    public function Search(Request $request)
    {
        $posts = Post::where('title', 'Like', '%' . $request->table_search . '%')
            ->orWhere('id', 'Like', '%' . $request->table_search . '%')
            ->get();
        return view('backend.post.search', compact('posts'));
    }
}
