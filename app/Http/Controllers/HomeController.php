<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datsemua = [];
        $users = DB::select('SELECT DISTINCT status from users');
        foreach($users as $kita){
            $dataakhir = DB::select("SELECT status as name,count(status) as y from users where status = '$kita->status'");
            foreach($dataakhir as $dats){
                array_push($datsemua,$dats);
            }
        }
        return view('home')->with('leads' ,json_encode($datsemua));
    }
    

    function action(Request $request)
    {
            $newnamearr = []; 
            $image = $request->file('datafile');
            foreach($image as $gambars){
                $new_name = rand() . '.' . $gambars['qfile_html']->getClientOriginalExtension();
                $gambars['qfile_html']->move(public_path('files'), $new_name);
                array_push($newnamearr, $new_name);                
            }
            if(empty($newnamearr)){
                $namaakhir = "";
            } else{
                $namaakhir  = json_encode($newnamearr);
            }
            
            $data=array(
                'name'=>$request->input('name'),
                "email"=>$request->input('email'),
                "gambar"=> $namaakhir,
                "umur"=> $request->input('umur'),
                "tanggal_lahir"=>$request->input('tanggal_lahir'),
                "jenis"=>implode(",",$request->input('jenis')),
                "status"=>$request->input('status'),
                "password"=>Hash::make($request->input('password')));
            DB::table('users')->insert($data);

            return response()->json([
            'message'   => 'Data Successfully Inserted',
            'uploaded_image' => '<img src="/images/'.$new_name.'" class="img-thumbnail" width="300" />',
            'status'  => 'success'
            ]);
    }

    public function getUsers()
    {
        $users = User::select(['id', 'name', 'email', 'status']);

        return Datatables::of($users)
            ->addColumn('actiondelete', function ($user) {
                return '<a onclick="deleteUser(' . "'" . $user->id . "'" . ',' . "'" . $user->gambar . "'" . ')" class="btn btn-xs red darken-2 waves-effect">Delete</a>';
            })
            ->addColumn('actionedit', function ($user) {
                return '<a onclick="editUser(' . "'" . $user->id . "'" . ')" class="btn btn-xs yellow darken-2 waves-effect">Edit</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['actiondelete', 'actionedit'])
            ->removeColumn('password')
            ->make(true);
    }

    public function deleteUsers(Request $request)
    {
        try {
            DB::table('users')->where('id',$request->input('sid'))->delete();
            $status = "success"; $message = "Successfully delete data";
        } catch(Exception $e) {
            $status = "error"; $message = "Something wrong when delete data";
        }
        return response()->json([
            'message'   => $message,
            'status'  => $status,
            'id' => $request->input('sid'),
        ]);
    }

    public function editUsers(Request $request)
    {
        $id = $request->input('sid');
        $Data = DB::table('users')->where('id', '=', $id)->get();
        foreach ($Data as $data) {
            $array = json_decode(json_encode($data), true);
            echo json_encode($array);
        }        
    }

    public function updateUsers(Request $request)
    {
        $data = array (
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'name' => $request->input('name'),
            'status' => $request->input('status_edit'),
        );
        $update = DB::table('users')
        ->where('id', $request->input('id')) 
        ->limit(1) 
        ->update($data); 

        if ($update) {
            $status = "success"; $message = "Successfully update data";
        } else{
            $status = "gagal"; $message = "Something wrong when updating";
        }
        return response()->json([
            'message'   => $message,
            'status'  => $status
         ]);
    }
}
