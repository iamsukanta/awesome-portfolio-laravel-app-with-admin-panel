<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Resume;

class ResumeController extends Controller
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
      $resumes = Resume::OrderBy('created_at', 'desc')->get();
      return view('admin.resume.index')->with('resumes', $resumes);
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
      "resume_link.required" => "Resume Link is Required.",
      ];

      // validate the form data
      $validator = Validator::make($request->all(), [
        'resume_link' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else { 
        $resume = new Resume;
        $resume->resume_link = $request->input('resume_link');
        $resume->save();
        return redirect()->back()->withErrors([
          'success' => 'New Resume Link Created.',
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
      $resume = Resume::find($id);
      return view('admin.resume.edit')->with('resume', $resume);
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
      "resume_link.required" => "Resume Link is Required.",
      ];

      // validate the form data
      $validator = Validator::make($request->all(), [
        'resume_link' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else { 
        $resume = Resume::find($id);
        $resume->resume_link = $request->input('resume_link');
        $resume->save();
        return redirect()->back()->withErrors([
          'success' => 'Resume Link Updated.',
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
      $resume = Resume::find($id);
      $resume->delete();
      return redirect()->back()->withErrors([
        'success' => 'Successfully Resume Link Deleted.',
      ]);
    }
}
