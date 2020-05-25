<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BlogPost;

class BlogpostController extends Controller
{
    
    public function __construct(){
      $this->middleware('auth:web')->except("logout");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $blogposts = BlogPost::OrderBy('created_at', 'desc')->get();
      return view('admin.blogpost.index')->with('blogposts', $blogposts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $messages = [
      "blogpost_title.required" => "Blogpost Title is Required.",
      "blogpost_body.required" => "Blogpost Body is Required.",
      ];

      // validate the form data
      $validator = Validator::make($request->all(), [
        'blogpost_title' => 'required',
        'blogpost_body' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else { 
        $blogpost = new BlogPost;
        $blogpost->title = $request->input('blogpost_title');
        $blogpost->body = $request->input('blogpost_body');
        $blogpost->save();
        return redirect()->back()->withErrors([
          'success' => 'New Blogpost Created.',
        ]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $blogpost = BlogPost::find($id);
      return view('admin.blogpost.edit')->with('blogpost', $blogpost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $messages = [
      "blogpost_title.required" => "Blogpost Title is Required.",
      "blogpost_body.required" => "Blogpost Body is Required.",
      ];

      // validate the form data
      $validator = Validator::make($request->all(), [
        'blogpost_title' => 'required',
        'blogpost_body' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else { 
        $blogpost = BlogPost::find($id);
        $blogpost->title = $request->input('blogpost_title');
        $blogpost->body = $request->input('blogpost_body');
        $blogpost->save();
        return redirect()->back()->withErrors([
          'success' => 'Blogpost Successfully Updated.',
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $blogpost = BlogPost::find($id);
      $blogpost->delete();
      return redirect()->back()->withErrors([
        'success' => 'Successfully Blogpost Deleted.',
      ]);
    }

    public function summernoteImgDelete(Request $request) {
      $image= $request->input( 'file' );
      if($image != '') {
        unlink('public/uploads/summernote/'.$image);
      } else {
        echo "error";
      }
    }

    public function summernoteImgUpload(Request $request) {
      $image = $request->files->get('file');
      $extension = $image->getClientOriginalExtension();
      $fileName = mt_rand(00000,11100).'_'.time().'.'.$extension;
      $path = $image->move('public/uploads/summernote/',$fileName);
      echo $fileName;
    }
}
