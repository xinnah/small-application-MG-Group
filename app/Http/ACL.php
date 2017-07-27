<?php

namespace App\Http;
use DB;
use Auth;
class ACL  
{
	public static function has($accessName){
	       $userJoinAlls = DB::table('users')
                ->leftJoin('user_access_role','users.id','=','user_access_role.fk_user_id')
                ->leftJoin('role','user_access_role.fk_role_id','=','role.id')
                ->leftJoin('userrolepermission','role.id','=','userrolepermission.fk_role_id')
                ->leftJoin('permission','userrolepermission.fk_permission_id','=','permission.id')
                ->orderBy('users.id','asc')
                ->where('users.id',Auth::user()->id)
                ->select('permission_name')
                ->get();
        $errFlag=0;
        foreach($userJoinAlls as $val){
        	if($val->permission_name==$accessName){
        		return true;
        	}else{
        		$errFlag=1;
        		continue;
        	}
        }
        if($errFlag==1)
        	return false;
	}
}
