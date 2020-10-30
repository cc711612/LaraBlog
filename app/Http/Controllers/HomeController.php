<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comments;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //首頁顯示
    public function index()
    {
        $datas= Post::where('del','0')->orderBy('created_at','DESC')->get();
        foreach ($datas as $key => $data) {
            $datas[$key]['admin']=false;
            //有登入
            if(!empty(\Auth::id())){
                if($data['user_id']==\Auth::id()){
                    $datas[$key]['admin']=true;
                }
            }
        }
        return view('home',compact('datas'));
    }
    //文章內容頁
    public function show($id)
    {
        $post = Post::find($id);
        //第一層留言
        $comment = Comments::where('post_id', $id)->where('comments_id', '=', '0')->leftJoin('users', 'users.id', '=', 'comments.user_id')->select('comments.id', 'comments.content', 'users.name','users.email','comments.created_at')->get();
        foreach ($comment as $key => $comments) {
            $comment[$key]['indexs']=$key+1;
            //找尋留言回覆
            $reply = Comments::where('comments_id', $comments->id)->leftJoin('users', 'users.id', '=', 'comments.user_id')->select('comments.id', 'comments.content', 'users.name','users.email','comments.created_at')->get();
            $comment[$key]['reply']=$reply;
        }
        // dd($comment);
        return view('post.content',compact('comment'))->with('title', $post->title)->with('content', $post->content)->with('id',$id);
    }
    //文章留言回覆
    public function reply($posts_id,$comments_id,Request $request)
    {
        $reply=new Comments;
        $request->validate([
            'reply'=>'required',
        ]);
        $reply->content=request('reply');
        $reply->user_id=\Auth::id();
        $reply->post_id=$posts_id;
        $reply->comments_id=$comments_id;
        $reply->del=0;
        if($reply->save()){
            return redirect()->to('/content/'.$posts_id);
        }
    }
    //文章留言
    public function comment($posts_id,Request $request)
    {
        $comments=new Comments;
        $request->validate([
            'content'=>'required',
        ]);
        $comments->content=request('content');
        $comments->user_id=\Auth::id();
        $comments->post_id=$posts_id;
        $comments->comments_id=0;
        $comments->del=0;
        if($comments->save()){
            return redirect()->to('/content/'.$posts_id);
        }
    }
}
