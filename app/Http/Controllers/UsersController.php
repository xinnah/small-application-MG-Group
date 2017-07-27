<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\ACL;

use App\Models\UserRoles;

use App\Models\UserPermissions;

use App\Models\RoleWisePermissions;
use App\Models\UserAccessRoles;
use App\Models\Address;
use App\Models\Users;

use Validator;
use Auth;
use DB;
use Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleWisePermissions = RoleWisePermissions::all();
        $roles = UserRoles::all();
        $permissions = UserPermissions::all();
        $roleJoinPermissions = DB::table('role_wise_permission')
        ->leftJoin('role','role_wise_permission.fk_role_id','=','role.id')
        ->orderBy('role_wise_permission.id','asc')
        ->get();
        //return $roleJoinPermissions;
        return view('backend.user.addNewUser', compact('roleWisePermissions','roles','permissions','roleJoinPermissions'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*validator user information user table*/
        $validator = Validator::make($request->all(), [
                'name'     => 'required',
                'email'         => 'email|required|unique:users',
                'password'      => 'required|min:6|confirmed',
                'phone_number'  => 'required',
                'gender'        => 'required',
                'address'       => 'required'
            ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        //$roleAccessId = $input['fk_role_id'];
        //$userRole = $request->roleId;
        
        if($request->hasFile('profile_image')){
            $photo = $request->file('profile_image');
            $fileType = substr($_FILES['profile_image']['type'], 6);
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            $upload=$photo->move('images/users', $fileName );
            $input['profile_image']=$fileName;
        }

        $input['password'] = bcrypt($input['password']);

        
        
        try {
            $createUserAddress = Address::insertUserAddress($input);
            $fk_address_id = $createUserAddress;
            $input['fk_address_id'] = $fk_address_id;
            $createUserInfo = Users::insertUserInfo($input);
            $fk_user_id = $createUserInfo;

            if($request->has('fk_role_id')){
                
                $createUserRole = UserAccessRoles::insertUserAccessRole($input,$fk_user_id);
                
            } 
            $bug = 0;
        } catch (\Exception $e) {
            $bug=$e->errorInfo[1]; 
            $bug1=$e->errorInfo[2]; 
        }
        if($bug == 0){
            return redirect('addNewUser')->with('success','New User Successfully Inserted');
            }elseif($bug == 1062){
                return redirect('addNewUser')->with('error','The Email has already been taken.');
            }else{
                return redirect('addNewUser')->with('error','Something Error Found ! '.$bug1);
        }

    }

    /**
     * Display the specified resource show all users from user table.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
         
        $users = Users::all();
        $roles = UserRoles::all();
        $permissions = UserPermissions::all();
        $roleWisePermissions = RoleWisePermissions::all();
        $userAccessRoles = UserAccessRoles::all();

        $userJoinRoles = DB::table('users')
        ->leftJoin('address','users.fk_address_id','=','address.id')
        ->leftJoin('user_access_role','users.id','=','user_access_role.fk_user_id')
        ->leftJoin('role','user_access_role.fk_role_id','=','role.id')
        ->orderBy('fk_user_id','asc')
        ->get();

        $userJoinAlls = DB::table('users')
        ->leftJoin('address','users.fk_address_id','=','address.id')
        ->leftJoin('user_access_role','users.id','=','user_access_role.fk_user_id')
        ->leftJoin('role','user_access_role.fk_role_id','=','role.id')
        ->leftJoin('role_wise_permission','role.id','=','role_wise_permission.fk_role_id')
        ->leftJoin('permission','role_wise_permission.fk_permission_id','=','permission.id')
        ->orderBy('users.id','asc')
        ->get();


        $user =  Auth::user()->name ;

        return view('backend.user.viewUsers', compact('userJoinRoles','users','userJoinAlls'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = $id;
        $data = Users::findOrFail($id);

        $userData = DB::table('users')
        ->where('users.id',$data->id)
        ->join('address','users.fk_address_id','=','address.id')
        ->orderBy('users.id','desc')
        ->first();  
        return view('backend.user.userUpdate',compact('userData','id'));
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
        $data = Users::findOrFail($id);
        $validator = Validator::make($request->all(), [
                'name'     => 'required',
                'email'         => 'email|required',
                'phone_number'  => 'required',
                'gender'        => 'required'
            ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $addressId = $data->fk_address_id;    
        $input = $request->all();
        
        if ($request->hasFile('profile_image')) {
            $photo=$request->file('profile_image');
            $fileType=substr($_FILES['profile_image']['type'], 6);
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            $upload=$photo->move('images/users', $fileName );
            $input['profile_image']=$fileName;
            $img_path='images/users/'.$data['profile_image'];

            if($data['profile_image']!=null and file_exists($img_path)){
                unlink($img_path);
            }
        }

        try{
            $createUserInfo = Users::updateUserInfo($input,$data);
            $updateUserAddress = Address::updateUserAddress($input,$addressId);
            $result=0;
        }catch(\Exception $e){
            $result = $e->errorInfo[1];
            $result1 = $e->errorInfo[1];
        }

        if($result==0){
        return redirect('userUpdate'.'/'.$id)->with('success','User Profile Successfully Updated');
        }elseif($result==1062){
            return redirect('userUpdate'.'/'.$id)->with('error','The name has already been taken.');
        }else{
        return redirect('userUpdate'.'/'.$id)->with('error','Something Error Found ! '.$result1);
        }
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewPassword($id)
    {
        $id = $id;
        return view('backend.user.changeUserPassword', compact('id'));
    }

    public function changeUserPassword(Request $request, $id){

        $input = $request->all();
        //print_r($input);exit;
        $newPassword = $input['password'];
        $data = Users::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
            ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $input['password']=bcrypt($newPassword);
            
        
        //print_r($input);exit;
        
        try{
            $data->update($input);
            $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $bug1=$e->errorInfo[2];
        }
        if($bug==0){
            return redirect()->back()->with('success','Password Changed Successfully !');
        }else{
            return redirect()->back()->with('error','Something is wrong !'.$bug1);

        }

    }
}
