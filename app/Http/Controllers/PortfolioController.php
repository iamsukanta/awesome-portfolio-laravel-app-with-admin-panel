<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Portfolio;

class PortfolioController extends Controller
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
      $portfolios = Portfolio::OrderBy('created_at', 'desc')->get();
      return view('admin.portfolio.index')->with('portfolios', $portfolios);
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
      "portfolio_title.required" => "Portfolio Title is Required.",
      "development_tools.required" => "Development Tools is Required.",
      "web_address.required" => "Web Address is Required.",
      ];

      // validate the form data
      $validator = Validator::make($request->all(), [
        'portfolio_title' => 'required',
        'development_tools' => 'required',
        'web_address' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else { 
        $portfolio = new Portfolio;
        $portfolio->title = $request->input('portfolio_title');
        $portfolio->development_tools = $request->input('development_tools');
        $portfolio->web_address = $request->input('web_address');
        $portfolio->save();
        return redirect()->back()->withErrors([
          'success' => 'New Portfolio Created.',
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
      $portfolio = Portfolio::find($id);
      return view('admin.portfolio.edit')->with('portfolio', $portfolio);
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
      "portfolio_title.required" => "Portfolio Title is Required.",
      "development_tools.required" => "Development Tools is Required.",
      "web_address.required" => "Web Address is Required.",
      ];

      // validate the form data
      $validator = Validator::make($request->all(), [
        'portfolio_title' => 'required',
        'development_tools' => 'required',
        'web_address' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else { 
        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->input('portfolio_title');
        $portfolio->development_tools = $request->input('development_tools');
        $portfolio->web_address = $request->input('web_address');
        $portfolio->save();
        return redirect()->back()->withErrors([
          'success' => 'Portfolio Successfully Updated.',
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
      $portfolio = Portfolio::find($id);
      $portfolio->delete();
      return redirect()->back()->withErrors([
        'success' => 'Successfully Portfolio Deleted.',
      ]);
    }
}
