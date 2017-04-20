<?php

namespace App\Http\Controllers;

use App\Admin as Admin;
use App\Driver as Driver;
use App\Order as Order;

use Illuminate\Http\Request;
use Auth;
use View;
use Validator;
use Redirect;
use Input;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_POST['ok'] )){
            echo $_POST['username'];
            echo "LOL";
        }
        return view('auth/login');
        //
    }

    public function list_admin(){
        $data_admin = Admin::all();
        return View::make("admin/register2",compact('data_admin'));
        // return View::make("admin/register2");
    }

    public function halaman_utama(){

        if(Auth::guest()){
            return redirect('/');
        }else{
            $total_driver       = count(Driver::all());
            $total_order_belum  = count(Order::where('status', 'belum di konfirmasi')->get());
            $total_order_sudah  = count(Order::where('status', 'sudah di konfirmasi')->get());

            return View::make('admin/index', compact('total_driver','total_order_belum','total_order_sudah'));
        }
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'nama_lengkap'  => 'required|max:255',
            'username'      => 'required|max:255',
            // 'email' => 'required|email|max:255|unique:users',
            'password'      => 'required|confirmed|min:6',
            'jkel'          => 'required',
            'telpon'        => 'required'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data){
        $insert =  Admin::create(array(
            'nama_lengkap'  => $data['nama_lengkap'],
            'username'      => $data['username'],
            // 'email' => $data['email'],
            'password'      => bcrypt($data['password']),
            'jkel'          => $data['jkel'],
            'telpon'        => $data['telpon']
            ));
        return Redirect::to('Admin/');
    }

    public function create2(Request $data){
        $insert =  Admin::create(array(
            'nama_lengkap'  => $data['nama_lengkap'],
            'username'      => $data['username'],
            // 'email' => $data['email'],
            'password'      => bcrypt($data['password']),
            'jkel'          => $data['jkel'],
            'telpon'        => $data['telpon']
            ));
        return Redirect::to('home/');
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
    public function show(){
        //
        $data = Admin::all();
        return Response::json('data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data_edit = Admin::find($id);
        return View::make('admin/udpa', compact('data_edit', 'id'));
        // return View::make(view, data, mergeData)
        // return Response::json('data_edit');
        // print_r($data_edit);
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
        $req = $request->all();
        $book = Admin::find($id);
        $book->update($req);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return redirect('Admin/');
    }

    public function log(Request $request){

        $username = Input::get('username');
        $password = Input::get('password');

        $log = Admin::where('username', $username)
                    ->where('password', $password)
                    ->first();

        if($log){

          $log->setAttribute('status','sukses');
          return Response::json($log);

        }else{
            return Response::json(['status'=>'Gagal Login']);
        }

    }
}
