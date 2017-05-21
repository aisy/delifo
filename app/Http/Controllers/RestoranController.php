<?php

namespace App\Http\Controllers;

use App\Restoran as Restoran;

use Illuminate\Http\Request;

use View;
use Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RestoranController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
    $data = Restoran::all();
    return View::make('restoran/restoran', compact('data'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(Request $request){
    //
    $data = $request->all();
    $insert = Restoran::create($data);
    return redirect('restoran/');
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
    $data = Restoran::where('id', $id)->first();
    return View::make('restoran/edit_restoran', compact('data','id'));
    return redirect('restoran/');
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
    $data = $request->all();
    $udpate = Restoran::find($id)->update($data);
    return redirect('restoran/');
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
    // $data = $request->all();
    $udpate = Restoran::find($id)->delete();
    return redirect('restoran/');
  }


  // =============================================================================
  // API
  // =============================================================================

  public function api_result_all(){
    $restoran = Restoran::with('daftar_menu')->get();
    // print_r($data);
    return Response::json($restoran);
  }

  public function api_result_restoran(){
    $restoran = Restoran::all();
    // print_r($data);
    return Response::json($restoran);
  }

  public function api_post(Request $request){
    $data = $request->all();
    $insert = Restoran::create($data);

    if($insert){
      return Response::json(['data'=>'Sukses']);
    }else{
      return Response::json(['data'=>'Tidak bisa dimasukkan']);
    }
  }

}
