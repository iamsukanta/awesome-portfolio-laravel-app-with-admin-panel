<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\AboutMe;

class AboutmeController extends Controller
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
      $aboutmes = AboutMe::OrderBy('created_at', 'desc')->get();
      return view('admin.aboutme.index')->with('aboutmes', $aboutmes);
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
      "section_1.required" => "Writing Section 1 is Required.",
      "section_2.required" => "Writing Section 2 is Required.",
      "image.required" => "Profile Image is Required.",
      ];

      // validate the form data
      $validator = Validator::make($request->all(), [
        'section_1' => 'required',
        'section_2' => 'required',
        'image' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else { 
        if($request->files->get('image') != "") {
          $aboutme = new AboutMe;
          $aboutme->section_1 = $request->input('section_1');
          $aboutme->section_2 = $request->input('section_2');
          $image = $request->files->get('image');
          $extension = $image->getClientOriginalExtension();
          $fileName = mt_rand(000,111).'_'.time().'.'.$extension;
          $path = $image->move('public/uploads/',$fileName);
          $aboutme->image = $fileName;
          $aboutme->save();
          return redirect()->back()->withErrors([
            'success' => 'AboutMe Section Created.',
          ]);
        }
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
      $aboutme = AboutMe::find($id);
      return view('admin.aboutme.edit')->with('aboutme', $aboutme);
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
      "section_1.required" => "Writing Section 1 is Required.",
      "section_2.required" => "Writing Section 2 is Required.",
      ];

      // validate the form data
      $validator = Validator::make($request->all(), [
        'section_1' => 'required',
        'section_2' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else { 
        if($request->files->get('image') == "") {
          $aboutme = AboutMe::find($id);
          $aboutme->section_1 = $request->input('section_1');
          $aboutme->section_2 = $request->input('section_2');
          $aboutme->save();
          return redirect()->back()->withErrors([
            'success' => 'AboutMe Section Updated.',
          ]);
        } else {
          $aboutme = AboutMe::find($id);
          if($aboutme->image != '') {
            unlink('public/uploads/'.$aboutme->image);
          }
          $aboutme->section_1 = $request->input('section_1');
          $aboutme->section_2 = $request->input('section_2');
          $image = $request->files->get('image');
          $extension = $image->getClientOriginalExtension();
          $fileName = mt_rand(000,111).'_'.time().'.'.$extension;
          $path = $image->move('public/uploads/',$fileName);
          $aboutme->image = $fileName;
          $aboutme->save();
          return redirect()->back()->withErrors([
            'success' => 'AboutMe Section Updated.',
          ]);
        }
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
      $aboutme = AboutMe::find($id);
      if($aboutme->image != '') {
        unlink('public/uploads/'.$aboutme->image);
      }
      $aboutme->delete();
      return redirect()->back()->withErrors([
        'success' => 'Successfully AboutMe Section Deleted.',
      ]);
    }
}
