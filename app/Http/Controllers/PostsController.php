<?php
// $post = Post::where('id',$post)->get()->first();
//select * from posts where id=1 limit 1;
// $post = Post::where('id',$post)->first();
// $post = Post::find($post);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\post\StorePostRequest;
use App\Http\Requests\post\UpdatePostRequest;
class PostsController extends Controller
{
    //
    public function index()
    {  
        return view('posts.index', [
            'posts' => Post::paginate(2)
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }
   
    public function store(StorePostRequest $request)
    {
        Post::create($request->all());

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        
        return view('posts.edit', [
            'post' => $post,
            'users' => User::all(),
        ]);
    }
    public function show($id)
    {
        return view('posts.show', ['post' => Post::findOrFail($id)]);
    }
    public function update(UpdatePostRequest $request, $post)
    {    //dd($request);
        Post::find($post) -> update($request -> all());
        return view('posts.index', [
            'posts' => Post::paginate(2),'updated'=>TRUE
        ]);
        
    }
    public function destroy( $post)
    {
        Post::destroy($post);
        return view('posts.index', [
            'posts' => Post::paginate(2)
        ]);
    }
}
