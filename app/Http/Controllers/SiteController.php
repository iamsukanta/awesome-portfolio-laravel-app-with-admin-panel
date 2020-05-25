<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AboutMe;
use App\Portfolio;
use App\BlogPost;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $blogposts = BlogPost::OrderBy('created_at', 'desc')->paginate(4);
      return view('site.home.index')->with('blogposts', $blogposts);
    }

    public function aboutme()
    {
      $aboutme = AboutMe::OrderBy('created_at', 'desc')->first();
      return view('site.pages.aboutme')->with('aboutme', $aboutme);
    }

    public function portfolio()
    {
      $portfolios = Portfolio::OrderBy('created_at', 'desc')->paginate(4);
      return view('site.pages.portfolio')->with('portfolios', $portfolios);
    }

    public function contact()
    {
      return view('site.pages.contact');
    }

    public function postdetails($id)
    {
      $blogpost = BlogPost::find($id);
      return view('site.pages.postdetails')->with('blogpost', $blogpost);
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
        //
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
        //
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
        //
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
    }
}
