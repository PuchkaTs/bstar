<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests;
use App\Post;
use App\Tag;
use App\Tagpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
	public function show($id)
	{

        $anews = Content::find($id);
        
		return view('pages.news_show')->with(compact('anews'));
	}

	public function index(Request $request)
	{
		if ($request->has('tag'))
		{
		    $tag = Tag::find($request->input('tag'));

		    $news = $tag->contents()->orderBy('position', 'dcs')->paginate(20);

		    $title = $tag->title;

		} else {

			$news = Content::orderBy('position', 'dcs')->paginate(20);

			$title = 'Мэдээлэл & зөвлөгөө';

		}

        $tags = Tag::latest()->get();

        $latestId = Content::latest()->first()->id;
        
		return view('pages.news_index')->with(compact('news', 'tags', 'title', "latestId"));
	}

	public function post_show($id)
	{

        $post = Post::find($id);
        
		return view('pages.post_show')->with(compact('post'));
	}

	public function post_store(Request $request)
	{
	    $this->validate($request, [
	        'title' => 'required',
	        'body' => 'required',

	    ]);

        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();

        $file->move('assets/posts', $name);

		$post = Post::create($request->all());

		$post->photo = $name;

		$post->save();

   		$tagname = $request->input('tag');

    	$tag = Tagpost::where('title', $tagname)->first();

		Auth::user()->posts()->save($post);
        
    	$tag->posts()->save($post);

    	flash()->success('Таны нийтлэл амжилттай орлоо!', 'Баярлалаа');

		return back();
	}

	public function posts_index()
	{

        $posts = Post::latest()->paginate(20);

        $posttags = Tagpost::all();
        
		return view('pages.posts_index')->with(compact('posts', 'posttags'));
	}	
}
