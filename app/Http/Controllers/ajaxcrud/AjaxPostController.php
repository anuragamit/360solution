<?php

namespace App\Http\Controllers\ajaxcrud;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Redirect,Response;


class AjaxPostController extends Controller
{
    public function index()
    {
        //
        $data['posts'] = Article::Where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(8);
   
        return view('ajaxcrud.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $postID = $request->post_id;
        $post   =   Article::updateOrCreate(['id' => $postID],
                    ['article' => $request->article, 'user_id' => Auth::user()->id]);
    
        return Response::json($post);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $where = array('id' => $id);
        $post  = Article::where($where)->first();
 
        return Response::json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Article::where('id',$id)->delete();
   
        return Response::json($post);
    }
}
