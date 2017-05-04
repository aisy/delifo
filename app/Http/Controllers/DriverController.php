<?php

namespace App\Http\Controllers;

use App\Driver as Driver;

use View;
// use Request;
use Response;
use Input;
use Auth;
use Illuminate\Html\FormFacade;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
// use Symfony\Component\HttpFoundation\File\UploadedFile;

class DriverController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        if(Auth::guest()){
            return redirect('/');
        }else{
            $data_driver = Driver::all();
            return View::make('driver/driver', compact('data_driver'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function validator(array $data){
        return Validator::make(
            ''
            );
    }

    public function create(Request $request){


        $file           = $request->file('input-file-preview'); //mangambil data file dari input type file

        if($file==NULL){
            $name_file = " ";
        }else{
            $name_file      = $file->getClientOriginalName(); //dapat nama file dari $file
            $destination    = public_path().'/Driver'; //lokasi folder yang akan di upload

            $file->move($destination, $name_file);
        }

        $insert = Driver::create(
            array(
                'nama_lengkap'  => Input::get('nama_lengkap'),
                'username'      => Input::get('username'),
                'password'      => Input::get('password'),
                'jkel'          => Input::get('jkel'),
                'telpon'        => Input::get('no_tlp'),
                'gambar'        => $name_file
                )
            );

        return redirect('/kurir');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
        $data = Driver::show($id);
        echo $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data_update = Driver::where('id', $id)->first();

        return View::make('driver/edit_driver', compact('data_update', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
     $driverupdate = $request->all();
     $driver = Driver::find($id);
     $driver->update($driverupdate);

     return redirect('kurir/');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Driver::find($id)->delete();
        return redirect('kurir/');
    }


// =====================  API =================================


    public function login(Request $request){

       $log = Driver::where('username', Input::get('username'))
       ->where('password', Input::get('password'))
       ->first();

       if($log){

          $log->setAttribute('status','sukses');
          return Response::json($log);
        }else{
            return Response::json(['status'=>'Gagal Login']);
        }
    }

    public function edit_profile($value=''){

    }



}
