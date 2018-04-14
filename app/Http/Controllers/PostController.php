<?php

namespace App\Http\Controllers;

use App\Events\SendMail;
use App\Exports\PostsExport;
use App\Post;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function populate()
    {
        $factory = Factory::create();
        for ($i=0; $i<10; $i++) {
            $post = new Post();
            $post->title = $factory->sentence();
            $post->content = $factory->text(200);
            $post->user_id = rand(1, 10);
            $post->save();
        }
        return "Populated";
    }

    public function index()
    {
        event(new SendMail(Auth::user()));
        $data = [
            'posts' => Post::all()
        ];
        $year = Carbon::now()->addSeconds(33);
        $date = Carbon::now()->diffForHumans($year);

        Log::info('User watched the index page');
        return view('posts.index', $data);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->get('content');
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/posts');
    }

    public function edit($post_id)
    {
        $data = [
            'post' => Post::find($post_id)
        ];
        return view('posts.edit', $data);
    }


    public function update($post_id, Request $request)
    {
//        Cookie::queue('lang', 'ru');
        $this->validate($request, [
            'title' => 'required|min:10',
            'content' => 'required',
            'image' => 'image'
        ]);

        $post = Post::find($post_id);
        $post->title = $request->title;
        $post->content = $request->get('content');
        $post->save();

//        $file = $request->file('image');
//        $file->move('.', $file->getClientOriginalName());

        return redirect('/posts');
    }

    public function destroy($post_id)
    {
        $result = $this->destroyAction($post_id);
        return redirect('/posts');
    }
    public function destroyAction($post_id)
    {
        return Post::destroy($post_id);
    }

}
