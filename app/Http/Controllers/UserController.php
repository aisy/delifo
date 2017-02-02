<?php

namespace App\Http\Controllers;

use App\User as User;
use Response;
use Input;
use Illuminate\Http\Request;

use Crypt;
use Collection;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

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

    public function get_user(){
        $users = User::all();

        // foreach ($users as $user) {
        //     echo $user->name;
        //     echo "<br>";
        // }

        return Response::json($users, 200);
    }

    public function get_id($id){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        try {
            $insert = User::create(array(
                'name'      => Input::get('name'),
                'username'  => Input::get('username'),
                'email'     => Input::get('email'),
                'telpon'    => Input::get('telpon'),
                'password'  => Input::get('password'),
                'alamat'    => Input::get('alamat') 
                ));

            // if($insert){
            // return Response::json('input success');
            return Response::json(['status'=>'sukses']);
            // }else{
            //     return Response::json(['status'=>'gagal']);
            // }

        } catch (Exception $e) {
            Response::json(['status'=>$e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = User::find($id);
        if(is_null($data)){
            return Response::json("Data Tidak di temukan", 404);
        }else{
            return Response::json($data);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
        $data = User::find($id)->first();

        return View::make('', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
        $updateUser = $request->all();
        $update = User::find($id);
        $update->update($updateUser);

        return redirect('user/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function hapus($id){
        # code...
        User::find($id)->delete();

        return redirect('user/'); 
    }

    public function destroy($id)
    {
        //
        $hapus = User::find($id)->delete();
        if(is_null($hapus)){
            return Response::json("Data Tidak di temukan", 404);
        }else{
            return Response::json($hapus);
        }

    }

    public function log(Request $request){

        // $username = Input::get('username');
        // $password = Input::get('password');

        $log = User::where('username', Input::get('username'))
        ->where('password', Input::get('password'))
        ->first();

        if($log){

          $log->setAttribute('status','sukses');
          return Response::json($log);

      }else{
        return Response::json(['status'=>'Gagal Login']);
    }


}

}
