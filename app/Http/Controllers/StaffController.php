<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Session;
//use Illuminate\Support\Facades\Input;
use Hash;

class StaffController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function managestaff() {
        //whereBetween('status', array(0, 1))
        $staff_details = \App\User::where('status',0 )
                ->Orderby('status', 'desc')
                ->get();
        $details = array();
        foreach ($staff_details as $staff_detail) {
            $id = $staff_detail->id;
            $info['id'] = $id;
            $info['status'] = $staff_detail->status;
            $info['img'] = $staff_detail->img;
            $info['name'] = $staff_detail->name;
            $info['email'] = $staff_detail->email;
            $info['phonenumber'] = $staff_detail->phonenumber;
            $skills = \App\UsersSkills::join('userrole', 'userrole.id', '=', 'userskills.userrole_id')
                            ->where('userskills.users_id', $id)->where('userrole.status', 0)->get();
            $skillname = '';
//            print_r($skills);
            $skillname=array();
            foreach ($skills as $skill) {
                $skillname[] = $skill->work_roal;
            }
//            print_r($skillname);
//            die;
            $info['skills'] = $skillname;
            unset($skillname);
            array_push($details, $info);
            unset($info);
        }
//print_r($details);die;
        $staff_works = \App\UserRole::where('status', 0)->get();
        return view('managestaff')->with(array('staff_details' => $details, 'staff_works' => $staff_works));
    }

    public function manageskills() {
//        $staff_details = \App\User::where('status', 0)->get();
        $works = \App\UserRole::where('status', 0)->get();
        $skills = array();
        foreach ($works as $skill) {

            $sk['id'] = $skill->id;
            $sk['work_roal'] = $skill->work_roal;
            $sk['note'] = $skill->note;
            $staff_names = \App\UsersSkills::join('users', 'users.id', '=', 'userskills.users_id')
                    ->where('userskills.userrole_id', $skill->id)
                    ->where('users.status', 0)
                    ->get();

            $username = array();
            
             $name=array();
            foreach ($staff_names as $staff_name) {
                $name[] = $staff_name->name;
            }
            $sk['staffname'] = $name;
            unset($name);
            array_push($skills, $sk);
            unset($sk);
        }

        return view('manageskills')->with(array('staff_works' => $skills));
    }

    public function settheme() {
        $userid = trim(Input::get('userid'));
        $themename = trim(Input::get('themename'));
        \App\User::where('id', $userid)->update(array('theam_name' => $themename));
        $response = json_encode(array('results' => 'success'));
        echo $response;
    }

    public function createnewstaff() {
        $staff_info = Input::get();
        $tasks = Input::get('task');


        $name = str_replace(' ', '', Input::get('name'));
        $imagepath = 'user_image/user.jpg';
        $destinationPath = public_path('user_image');

        if (Input::hasFile('user_img')) {
            $u_img = Input::file('user_img');
            $filename = "$name.jpg";
            $extension = $u_img->getClientOriginalExtension();
            $uploadSuccess = $u_img->move($destinationPath, $filename);
            if ($uploadSuccess) {
                $imagepath = 'user_image/' . $filename;
            }
        }

        $user = new \App\User();
        $user->name = Input::get('name');
        $user->password = Hash::make(Input::get('password'));
        $user->email = Input::get('email');
        $user->phonenumber = Input::get('phonenumber');
        $user->img = $imagepath;
        $user->address = Input::get('address');
        $user->cpassword = md5(Input::get('password'));
        $user->save();
        $userid = $user->id;

        foreach ($tasks as $task) {
            $userskils = new \App\UsersSkills();
            $userskils->users_id = $userid;
            $userskils->userrole_id = $task;
            $userskils->save();
        }
//        print_r($tasks);
//        die;
        return \Redirect::to('staff');
    }

    public function verifyusername() {
        $input = $_REQUEST;
        $email = $input['email'];
        $count = \App\User::where('email', $email)->count();
        if ($count == 0) {
            echo json_encode(array('results' => 'success'));
        } else {
            echo json_encode(array('results' => 'error'));
        }
    }

    public function editstaff() {
        $input = Input::get();
         $userId = $input['userid'];
//        die;
        \App\UsersSkills::where('users_id', $userId)->Delete();
        if (isset($input['taskedit'])) {
            $tasks = $input['taskedit'];
            foreach ($tasks as $task) {
                $userskils = new \App\UsersSkills();
                $userskils->users_id = $userId;
                $userskils->userrole_id = $task;
                $userskils->save();
            }
        }
        return \Redirect::to('staff');
    }

    public function deleteuser() {
        $input = Input::get();
        $userId = $input['userid'];
        $update = \App\User::where('id', $userId)->update(array('status' => 2));
        return \Redirect::to('staff');
    }

    public function getuserdetails() {
        $input = Input::get();
        $userId = $input['userId'];
        $listing = \App\User::where('id', $userId)->first();

        $skills = \App\UsersSkills::where('users_id', $userId)->get();
//        echo '<pre>';
//        print_r($skills);
        $worktask = '';
        foreach ($skills as $skill) {
            $worktask.=$skill->userrole_id . ',';
        }
        $response = json_encode(
                array(
                    'results' => 'success',
                    'id' => $listing->id,
                    'name' => $listing->name,
                    'email' => $listing->email,
                    'address' => $listing->address,
                    'phonenumber' => $listing->phonenumber,
                    'worktask' => $worktask,
                    'img' => $listing->img,
                    'status' => $listing->status
                )
        );

        echo $response;
    }

    public function profile($userid) {

        $staffdetail = \App\User::where('id', $userid)->first();
        $staffworks = \App\UserRole::get();

        $skills = \App\UsersSkills::join('userrole', 'userrole.id', '=', 'userskills.userrole_id')
                        ->where('userskills.users_id', $userid)->where('userrole.status', 0)->get();
        $skillname = '';
        foreach ($skills as $skill) {
            $skillname[] = $skill->work_roal;
        }

//        print_r($skillname);die;
        return view('profile')->with(array('wortasks' => $skillname, 'staffdetails' => $staffdetail, 'staffworks' => $staffworks));
    }

    public function edituser() {
        $id = Input::get('userid');
        \App\User::where('id', $id)->update(array(
            'name' => Input::get('name'),
            'phonenumber' => Input::get('phonenumber'),
            'address' => Input::get('address'),
            'dateofbirth' => Input::get('dateofbirth'),
            'about' => Input::get('about')
        ));
        return \Redirect::to("profile/$id");
    }

    public function editimg() {
//        echo 'ddddd';die;
        $name_2part = round(microtime(true) * 1000);
        $destinationPath = public_path('user_image');
        $name = str_replace(' ', '', Input::get('name'));
        $id = Input::get('userid');

        if (Input::hasFile('user_img')) {

            $imagepath = '';
            $u_img = Input::file('user_img');
            $filename = "$name" . "$name_2part.jpg";
//            File::delete($filename);
            $extension = $u_img->getClientOriginalExtension();
            $uploadSuccess = $u_img->move($destinationPath, $filename);
            if ($uploadSuccess) {
                $imagepath = 'user_image/' . $filename;
            }
        } else {
            $imagepath = Input::get('img');
        }
        $count = \App\User::where('id', $id)->count();
        if ($count > 0) {
            \App\User::where('id', $id)->update(array(
                'img' => $imagepath
            ));
        }
        return \Redirect::to("profile/$id");
    }

    public function verifypassword() {
        $input = $_REQUEST;
        $userid = $input['userid'];
//        echo '<pre>';
        $password = md5($input['password']);

        $count = \App\User::where('id', $userid)->where('cpassword', $password)->count();
        if ($count == 0) {
            echo json_encode(array('results' => 'error'));
        } else {

            echo json_encode(array('results' => 'success'));
        }
    }

    public function changepassword() {
        $id = Input::get('userid');
        $password = Hash::make(Input::get('newpassword'));
        $cpassword = md5(Input::get('newpassword'));
        \App\User::where('id', $id)->update(array(
            'password' => $password, 'cpassword' => $cpassword
        ));
        return \Redirect::to("profile/$id");
    }

    public function createnewskills() {
        $userskils = new \App\UserRole();
        $userskils->work_roal = Input::get('skillname');
        $userskils->note = Input::get('skilldescription');
        $userskils->save();
        return \Redirect::to("skills");
    }

    public function editskill() {
        $skill_id = Input::get('skill_id');
        \App\UserRole::where('id', $skill_id)->update(array(
            'work_roal' => Input::get('skillname'), 'note' => Input::get('note')
        ));
        return \Redirect::to("skills");
    }

    public function deleteskill() {
        $skill_id = Input::get('skill_id');
//        die;
        \App\UserRole::where('id', $skill_id)->update(array(
            'status' => 1));
        return \Redirect::to("skills");
    }

    public function removestyle() {
        $userid = Input::get('userid');
        $workstyle = trim(Input::get('workstyle'));
        $getid = \App\UserRole::where('work_roal', $workstyle)->first();
//        print_r($getid);
        $userstyleid = $getid->id;
        \App\UsersSkills::where('users_id', $userid)->where('userrole_id', $userstyleid)->Delete();
        echo "success";
    }

}
