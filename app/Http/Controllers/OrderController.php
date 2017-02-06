<?php

namespace App\Http\Controllers;

use App\Order as Order;
use App\DetailOrder as Detail;

use Response;
use Input;
use Auth;
use View;
use Request;
// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::all();

        return View::make('order/order', compact('data'));
        // return view('head');
        // return view('navbar');
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

    public function get_all(){
        $data = Order::all();
        return Response::json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function insert(Request $request){
        $input = Order::create(array(
            'alamat'    =>Input::get('alamat'),
            'deskripsi' =>Input::get('deskripsi'),
            'tanggal'   =>Input::get('tanggal'),
            'status'    =>Input::get('status'),
            'id_user'   =>Auth::user()->id
            ));

       // $insert = new Order;
       // $insert->alamat    = Input::get('alamat');
       // $insert->deskripsi = Input::get('deskripsi');
       // $insert->tanggal   = Input::get('tanggal');
       // $insert->status    = Input::get('status');
       // $insert->id_user   = Auth::user()->id;

       // $cek = $insert->save();

    }


    public function detail($id){
        $data_detail = Detail::where('id_order',$id)->get();

        return Response::view('detail_order/detail_order', compact('data_detail','id'));
    }

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
        $data =  Order::where('order.id', $id)
            ->join('users','users.id', '=', 'order.id_user')->first();

        return View::make('order/edit_order', compact('data', 'id'));
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
        $OrderUpdate = Request::all();
        $order = Order::find($id);
        $order->update($OrderUpdate);

        return redirect('order/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        Order::find($id)->delete();
        return redirect('order/');
    }



// ====================== API ===================================

    public function api_show(){
        $data = Order::all();

        if($data){
            return Response::json($data);
        }else{
            return Response::json(['status'=>'data ']);
        }
    }

    public function api_orderUser($id){
        try {

            $data = Order::where('id_user', $id)
            ->join('users','users.id', '=', 'order.id_user')
            ->get();

            if(count($data)>=1){
                return Response::json($data);
            }else{
                return Response::json(['status:'=>'tidak ada data']);
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

    //konfirmasi order
    public function api_konfirmasi(Request $request, $id){
        try {

            $id = Input::get('id_order');

            $req  = array(
                'id_driver' => Input::get('id_driver'),
                'status'    => 'sudah di konfirmasi'
            );
            $book = Order::find($id);
            $book->update($req);

            return response(['status']->"sukses");

        } catch (Exception $e) {

            echo $e->getMessage();
            
        }
    }


    public function api_find($id){

        try {

            $data   = Order::where('id_user', $id)->join('users', 'users.id', '=', 'order.id_user')->first();

            $data2 = Detail::where('id_order', $id)->get();

            if(count($data)>=1){
               $data->setAttribute('order', $data2);
               return Response::json($data);
           }else{

            return Response::json(['status'=>'data tdak ada']);
        }

    } catch (Exception $e) {

    }

}

public function api_insert(Request $request){
    $input = Order::create(array(
        'alamat'    =>Input::get('alamat'),
        'deskripsi' =>Input::get('deskripsi'),
        'tanggal'   =>Input::get('tanggal'),
        'status'    =>Input::get('status'),
        'id_user'   =>Auth::user()->id
        ));

    if($input){
        return Response::json(['status'=>'sukses']);
    }else{
        return Response::json(['status'=>'gagal']);
    }
}

public function api_edit($id){
    $edit = Order::find($id)->first();

    if($edit){
        return Response::json($edit);    
    }else{
        return Response::json(['status'=>'data tidak ditemukan']);
    }
}

public function api_update(Request $request, $id){

    //mengambil data dari field secara keseluruhan
    $req = $request->all();

    $book = Order::find($id);
    $book->update($req);
}

public function api_delete($id){
    $delete = Order::find($id);
    $delete->delete($id);
}

    // DETAIL ORDER

public function insertDO(Request $request){

        // $data_json = json_decode($request->input("order")); //baca konten post json
        $data_json = $request->input("order"); //baca konten post json

        // $id = date('Ymdis');

        $insert1 = Order::create(
            array(
                // 'id_order'  => $id,
                // 'id'        => $id,
                'tanggal'   => $request->input('tanggal'),
                'status'    => 'belum di konfirmasi',
                'id_user'   => $request->input('id_user'),
                'longitude' => $request->input('longitude'),
                'latitude'  => $request->input('latitude')
                )
            );

        $id = Order::orderBy('id','desc')->groupBy('id')->first();

        foreach ($data_json as $key =>$value) {
            $insert2 = Detail::create(
                array(
                    'id_order'      => $id->id,
                    'nama_order'    => $value['nama_order'],
                    'keterangan'    => $value['keterangan'],
                    'alamat'        => $value['alamat'],
                    'longitude'     => $value['longitude'],
                    'latitude'      => $value['latitude']
                    )
                );
        } 

        if($insert1&&$insert2){

            return Response::json(['status_response'=>'sukses']);

        }else{
            return Response::json(['status_response'=>'gagal']);
        }

    }

}
