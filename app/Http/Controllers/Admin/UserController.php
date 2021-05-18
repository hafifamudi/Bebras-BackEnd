<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role_id',2)->get();
        return view('admin.user.index', compact('user'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'unique:users',
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role_id'] = 2;
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'unique:users,email,'.$request->id,
        ]);
        $user = User::find($request->id);
        $data['role_id'] = 2;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        if($request->password != null){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $user->password;
        }
        $user->update($data);
        return redirect()->back()->with('success','Data berhasil diubah');
    }
    public function delete(Request $request, $id)
    {
        $user = DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }

}
