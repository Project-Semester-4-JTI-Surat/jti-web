<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Prodi;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $role = Role::all();
        $prodi = Prodi::where('id','!=','2')->get();
        if ($request->ajax()) {
            $admin = Admin::with(['role','prodi'])->where('role_id','=','1')->get();
            return DataTables::of($admin)
            ->addIndexColumn()
            ->addColumn('aksi',function($row){
                return '<button onclick="edit(`'.$row->uuid.'`)" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
        return view('admin.data-admin',compact('role','prodi'));
    }

    public function insert(Request $request)
    {
        $input = $request->only(['username','nama','role_id','prodi_id','no_hp']);
        // dd($input);
        $passwordField = array('password'=>'12345678');
        $field = $input + $passwordField;
        Admin::create($field);
        // dd($field);
        return response()->json(['message'=>'success']);
    }

    public function pengaturanAkun()
    {
        return view('admin.pengaturan-akun');
    }

    public function updateAkun(Request $request)
    {
        $id = Auth::guard('admin')->user()->uuid;
        $admin = Admin::find($id);
        $username = $request->get('username');
        $admin->username = $username;
        if ($request->get('password') != null) {
            $admin->password = $request->get('password');
            $admin->change_password = true;
            // dd("null");
        }
        // dd($request->has('password'));
        Auth::guard('admin')->logout();
        $admin->update();
        return redirect()->route('auth.login');
    }

}
