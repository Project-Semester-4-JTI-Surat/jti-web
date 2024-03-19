<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminProdi;
use App\Models\Prodi;
use App\Models\Role;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    use ApiResponse;
    public function index(Request $request)
    {
        $role = Role::all();
        $prodi = Prodi::where('id', '!=', '2')->get();
        if ($request->ajax()) {
            $admin = Admin::with(['role', 'prodi', 'admin_prodi.prodi'])->where('role_id', '=', '1')->get();
            return DataTables::of($admin)
                ->addIndexColumn()
                ->addColumn('jk', function ($row) {
                    return $row->jk == 'L' ? '<span class="badge bg-label-primary rounded-pill"><i class="fa-solid fa-person fa-lg"></i></span>' : '<span class="badge bg-label-danger rounded-pill"><i class="fa-solid fa-person-dress fa-lg"></i></span>';
                })
                ->addColumn('admin_prodi', function ($row) {
                    $count = count($row->admin_prodi);
                    $index = 0;
                    $arr = array();
                    // foreach ($variable as $key => $value) {
                    //     # code...
                    // }
                    foreach ($row->admin_prodi as $item) {
                        array_push($arr, $item->prodi->keterangan);
                        // $index++;
                        // $item->prodi->keterangan;
                        // $index != $count ? ', ' : ' ';
                    }
                    return $arr;
                })
                ->addColumn('aksi', function ($row) {
                    return '<button onclick="edit(`' . $row->uuid . '`)" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
                })
                ->rawColumns(['aksi', 'jk', 'admin_prodi'])
                ->make(true);
        }
        return view('admin.data-admin', compact('role', 'prodi'));
    }

    public function insert(Request $request)
    {
        $prodi_id = $request->prodi_id;
        $count_prodi_id = count($request->prodi_id);
        $input = $request->only(['username', 'nama', 'role_id','no_hp', 'jk']);
        $passwordField = array('password' => 'jtipolije');
        $field = $input + $passwordField;
        $admin = Admin::create($field);
        //unoptimized function
        for ($i = 0; $i < $count_prodi_id; $i++) {
            AdminProdi::create([
                'prodi_id' => $prodi_id[$i],
                'admin_id' => $admin->uuid
            ]);
        }
        return response()->json(['message' => 'success']);
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

    public function edit($id)
    {
        $admin = Admin::find($id);
        return $this->successResponseData('edit data', $admin);
    }

    public function update($id, Request $request)
    {
        $prodi_id = $request->prodi_id;
        $count_prodi_id = count($request->prodi_id);
        $arr = array();
        AdminProdi::where('admin_id', '=', $id)->delete();

        //unoptimized function
        for ($i = 0; $i < $count_prodi_id; $i++) {
            AdminProdi::create([
                'prodi_id' => $prodi_id[$i],
                'admin_id' => $id
            ]);
        }
        $request->has('password')
            ? $input = $request->only(['password'])
            : '';
        Admin::find($id)->update($input);
        return redirect()->back()->with('updateSuccess', 'true');
    }
}
