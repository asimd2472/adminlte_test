<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $users = User::orderBy('id', 'desc')->where('user_type', 2)->get();

            return DataTables::of($users)
                ->addColumn('profile_image', function ($row) {
                    $image = $row->profile_image 
                        ? asset('storage/images/'.$row->profile_image)
                        : asset('images/default-profile.jpg');

                    return '<img src="'.$image.'" width="50" height="50" style="border-radius:50%;">';
                })
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('email', function ($row) {
                    return $row->email;
                })
                ->addColumn('phone_number', function ($row) {
                    return $row->phone_number !='' ? $row->phone_number : 'N/A';
                })
                ->addColumn('status', function ($row) {
                    $checked = '';
                    if($row->status==1){
                        $checked = 'checked';
                    }
                    $status = '<div class="form-check form-switch">
                                    <input class="form-check-input commoncls" role="switch" type="checkbox" name="status" id="userId_'.$row->id.'" onclick="checkStatusUsers(\''.$row->id.'\', this.value)" '.$checked.'>
                                </div>';

                    return $status;
                })
                ->addColumn('action', function ($row) {
                    $dropdown = '';
                    
                    
                    $dropdown .= '<a class="dropdown-item delete-item" 
                                    href="javascript:void(0)"
                                    onclick="deleteUser('.$row->id.')"
                                    >
                                    Delete
                                </a>';
                    

                    $btn = '';
                        $btn = '<div class="dropdown">
                                <div class="actionList " id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg style="cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    ' . $dropdown . '
                                </div>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'profile_image', 'status'])
                ->make(true);
        }
        return view('admin.users.index');
    }

    public function checkStatusUsers(Request $request){
        $user = User::where('id', $request->userId)->first();

        if($user->status=='1'){
            $input['status']='0';
        }else{
            $input['status']='1';
        }
        // print_r($input);exit;
        User::where('id', $request->userId)->update($input);
        echo json_encode(['status'=>1, 'msg'=>'Status updated successfully']);
    }

    public function deleteUser(Request $request){
        $id = $request->userId;
        User::where('id', $id)->delete();
        return response()->json([
            'status' => 1,
            'msg' => 'Users Deleted successfully',
        ]);
    }
}
