<?php

namespace App\Http\Controllers;

use App\Menu as Menu;

use View;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id){

        $data = Menu::where('restoran_id',$id)->get();
        return View::make('menu/menu', compact('id','data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        //

        $data        = $request->all();
        $restoran_id = $request->input('restoran_id');
        $insert      = Menu::create($data);

        // upload file
        $file = $request->file('input-file-preview');

        if($file == NULL){
            $name_file = " ";
        }else{
            $name_file      = $file->getClientOriginalName(); //dapat nama file dari $file
            $destination    = public_path().'/Menu'; //lokasi folder yang akan di upload

            $file->move($destination, $name_file);
        }

        return redirect('menu/'.$restoran_id);
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
        $data   = Menu::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

      $data   = $request->all();
      $update = Menu::find($id)->update($data);

      // upload file
      $file = $request->file('input-file-preview');

      if($file==NULL){
          $name_file = " ";
      }else{
          $name_file      = $file->getClientOriginalName(); //dapat nama file dari $file
          $destination    = public_path().'/Menu'; //lokasi folder yang akan di upload

          $file->move($destination, $name_file);
      }

      return redirect('menu/'.$restoran_id);
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
        Menu::find($id)->delete();
    }
}
