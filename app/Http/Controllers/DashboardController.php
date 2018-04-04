<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Session;
//use Illuminate\Support\Facades\Input;
use Hash;

class DashboardController extends Controller {

    public function homedashboard() {
        $userstatus = Auth::user()->status;
        $userId = Auth::user()->id;
        $Jobs_hold_=array();
        if ($userstatus == 1) {
            $totalstaff = \App\User::where('status', 0)->count();
            $totalcustomer = \App\User::where('status', 3)->count();
            $list_all_jobs = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->where('userrole.status', 0)
                    ->where('orderitem.status', 0)
                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'order.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
                    ->orderBy('order.created_at', 'desc')
                    ->limit(10)
                    ->get();
            $no = 1;
            $jobOnHold = array();
            $Jobs_hold = array();
            foreach ($list_all_jobs as $list_all_job) {
                $jobOnHold['Number'] = $no;
                $jobOnHold['id'] = $list_all_job['id'];
                $image = explode(',', $list_all_job['image_path']);
                $jobOnHold['image'] = $image[0];
                $jobOnHold['created_at'] = $list_all_job['created_at'];
                $jobOnHold['work_roal'] = $list_all_job['work_roal'];
                array_push($Jobs_hold, $jobOnHold);
                $no++;
            }
            $list_all_jobs_inprogress = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->join('orderuser', 'orderitem_id', '=', 'orderitem.id')
                    ->join('users', 'users.id', '=', 'orderuser.users_id')
                    ->where('orderitem.status', 2)
                    ->where('orderuser.status', 0)
                    ->orderBy('order.created_at', 'desc')
                    ->limit(10)
                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'orderuser.created_at as orderassigndate', 'orderitem.status as orderstatus', 'users.status as userstatus', 'users.*', 'order.email as email', 'users.email as staffemail', 'orderitem.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'order.id as order_id', 'userrole.id as userrole_id')
                    ->get();
            $CompletedJobs_ = array();
            $CompletedJobs = array();
            Foreach ($list_all_jobs_inprogress as $list_all_jobs_inprogress_) {
                $CompletedJobs_['order_id'] = $list_all_jobs_inprogress_['order_id'];
                $CompletedJobs_['name'] = $list_all_jobs_inprogress_['name'];
                $CompletedJobs_['orderassigndate'] = $list_all_jobs_inprogress_['orderassigndate'];
                $CompletedJobs_['work_roal'] = $list_all_jobs_inprogress_['work_roal'];
                $CompletedJobs_['id'] = $list_all_jobs_inprogress_['id'];
                array_push($CompletedJobs, $CompletedJobs_);
            }
            $staff_details = \App\User::where('status', 0)
                    ->Orderby('status', 'desc')
                    ->get();
            $list_top_dazzers = array();
            foreach ($staff_details as $staff_detail) {
                $id = $staff_detail->id;
                $info['id'] = $id;
                $info['status'] = $staff_detail->status;
                $info['img'] = $staff_detail->img;
                $info['name'] = $staff_detail->name;
                $info['email'] = $staff_detail->email;
                $info['phonenumber'] = $staff_detail->phonenumber;
                $orderusers = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
                        ->where('orderuser.users_id', $id)
                        ->where('orderuser.status', 0)
                        ->where('orderitem.status', 2)
                        ->count();
                $info['completejobs'] = $orderusers;
                $neworder = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                                ->where('status', 0)->count();
                $skills = \App\UsersSkills::join('userrole', 'userrole.id', '=', 'userskills.userrole_id')
                                ->where('userskills.users_id', $id)->where('userrole.status', 0)->get();
                $skillname = '';
                $skillname = array();
                foreach ($skills as $skill) {
                    $skillname[] = $skill->work_roal;
                }
                $info['skills'] = $skillname;
                unset($skillname);
                array_push($list_top_dazzers, $info);
                unset($info);
            }
            $neworders = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->where('userrole.status', 0)
                    ->where('orderitem.status', 0)
                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'order.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
                    ->limit(20)
                    ->get();
            $r = array();
            $hold_jobs = array();
            foreach ($neworders as $neworder) {
//            print_r($_neworder);die;
                $r['order_id'] = $neworder['id'];
                $r['image_path'] = $neworder['image_path'];
                $r['customer_name'] = $neworder['customer_name'];
                $r['email'] = $neworder['email'];
                $r['tel'] = $neworder['tel'];
                $r['work_roal'] = $neworder['work_roal'];
                $r['headlinetext'] = $neworder['headlinetext'];
                $r['frametype'] = $neworder['frametype'];
                $r['orderitemid'] = $neworder['orderitemid'];
                $r['userrole_id'] = $neworder['userrole_id'];
                $r['duedate'] = $neworder['need_by_date'];
                $r['ordercreate'] = $neworder['created_at'];
                $getcomment = 0;
                $getcomment = \App\OrderUser::where('orderitem_id', $neworder->orderitemid)->count();
                $r['reject'] = $getcomment;
                array_push($hold_jobs, $r);
                unset($r);
            }
            $totalorder = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')->count();
            $assigned = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                            ->whereIn('status', array(1, 4))->count();
            $completed = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                            ->where('status', 2)->count();

            $cencel = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                            ->where('status', 3)->count();
            $details = array('totalstaff' => $totalstaff,
                'totalcustomer' => $totalcustomer,
                'totalorder' => $totalorder,
                'assigned' => $assigned,
                'completed' => $completed);
        } elseif ($userstatus == 0) {
            $totalstaff = \App\User::where('status', 0)->count();
            $totalcustomer = \App\User::where('status', 3)->count();
//            $list_all_jobs = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
//                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
//                    ->join('user', 'user.id', '=', 'userrole.user_id')
////                    ->where('userrole.user_id', $userId)
//                    ->where('userrole.status', 0)
//                    ->where('orderitem.status', 0)
//                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'order.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
//                    ->orderBy('order.created_at', 'desc')
//                    ->limit(10)
//                    ->get();
            $list_all_jobs = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->join('orderuser', 'orderitem_id', '=', 'orderitem.id')
                    ->join('users', 'users.id', '=', 'orderuser.users_id')
                    ->where('orderuser.users_id', Auth::user()->id)
                    ->where('orderuser.status', 0)
                    ->whereIn('orderitem.status', array(1, 4))
                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'order.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
                    ->get();

            $no = 1;
            $jobOnHold = array();
            $Jobs_hold = array();
            foreach ($list_all_jobs as $list_all_job) {
                $jobOnHold['Number'] = $no;
                $jobOnHold['id'] = $list_all_job['id'];
                $image = explode(',', $list_all_job['image_path']);
                $jobOnHold['image'] = $image[0];
                $jobOnHold['created_at'] = $list_all_job['created_at'];
                $jobOnHold['work_roal'] = $list_all_job['work_roal'];
                array_push($Jobs_hold, $jobOnHold);
                $no++;
            }

//            $list_all_jobs_inprogress = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
//                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
//                    ->join('orderuser', 'orderitem_id', '=', 'orderitem.id')
//                    ->join('users', 'users.id', '=', 'orderuser.users_id')
//                    ->where('orderitem.status', 2)
//                    ->where('orderuser.status', 0)
//                    ->orderBy('order.created_at', 'desc')
//                    ->limit(10)
//                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'orderuser.created_at as orderassigndate', 'orderitem.status as orderstatus', 'users.status as userstatus', 'users.*', 'order.email as email', 'users.email as staffemail', 'orderitem.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'order.id as order_id', 'userrole.id as userrole_id')
//                    ->get();
            $list_all_jobs_inprogress = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->join('orderuser', 'orderitem_id', '=', 'orderitem.id')
                    ->join('users', 'users.id', '=', 'orderuser.users_id')
                    ->where('orderitem.status', 2)
                    ->where('orderuser.status', 0)
                    ->where('orderuser.users_id', Auth::user()->id)
                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'orderuser.created_at as orderassigndate', 'orderitem.status as orderstatus', 'users.status as userstatus', 'users.*', 'order.email as email', 'users.email as staffemail', 'orderitem.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'order.id as order_id', 'userrole.id as userrole_id')
                    ->get();
            $CompletedJobs_ = array();
            $CompletedJobs = array();
            Foreach ($list_all_jobs_inprogress as $list_all_jobs_inprogress_) {
                $CompletedJobs_['order_id'] = $list_all_jobs_inprogress_['order_id'];
                $CompletedJobs_['name'] = $list_all_jobs_inprogress_['name'];
                $CompletedJobs_['orderassigndate'] = $list_all_jobs_inprogress_['orderassigndate'];
                $CompletedJobs_['work_roal'] = $list_all_jobs_inprogress_['work_roal'];
                $CompletedJobs_['id'] = $list_all_jobs_inprogress_['id'];
                array_push($CompletedJobs, $CompletedJobs_);
            }


            $staff_details = \App\User::where('status', 0)
                    ->Orderby('status', 'desc')
                    ->get();
            $list_top_dazzers = array();
            foreach ($staff_details as $staff_detail) {
                $id = $staff_detail->id;
                $info['id'] = $id;
                $info['status'] = $staff_detail->status;
                $info['img'] = $staff_detail->img;
                $info['name'] = $staff_detail->name;
                $info['email'] = $staff_detail->email;
                $info['phonenumber'] = $staff_detail->phonenumber;
                $orderusers = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
                        ->where('orderuser.users_id', $id)
                        ->where('orderuser.status', 0)
                        ->where('orderitem.status', 2)
                        ->count();
                $info['completejobs'] = $orderusers;
                $neworder = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                                ->where('status', 0)->count();
                $skills = \App\UsersSkills::join('userrole', 'userrole.id', '=', 'userskills.userrole_id')
                                ->where('userskills.users_id', $id)->where('userrole.status', 0)->get();
                $skillname = '';
                $skillname = array();
                foreach ($skills as $skill) {
                    $skillname[] = $skill->work_roal;
                }
                $info['skills'] = $skillname;
                unset($skillname);
                array_push($list_top_dazzers, $info);
                unset($info);
            }
            $neworders = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->where('userrole.status', 0)
                    ->where('orderitem.status', 0)
                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'order.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
                    ->limit(20)
                    ->get();
            $r = array();
            $hold_jobs = array();
            foreach ($neworders as $neworder) {
//            print_r($_neworder);die;
                $r['order_id'] = $neworder['id'];
                $r['image_path'] = $neworder['image_path'];
                $r['customer_name'] = $neworder['customer_name'];
                $r['email'] = $neworder['email'];
                $r['tel'] = $neworder['tel'];
                $r['work_roal'] = $neworder['work_roal'];
                $r['headlinetext'] = $neworder['headlinetext'];
                $r['frametype'] = $neworder['frametype'];
                $r['orderitemid'] = $neworder['orderitemid'];
                $r['userrole_id'] = $neworder['userrole_id'];
                $r['duedate'] = $neworder['need_by_date'];
                $r['ordercreate'] = $neworder['created_at'];
                $getcomment = 0;
                $getcomment = \App\OrderUser::where('orderitem_id', $neworder->orderitemid)->count();
                $r['reject'] = $getcomment;
                array_push($hold_jobs, $r);
                unset($r);
            }
            $totalorder = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')->count();
            $assigned = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
                    ->where('orderuser.users_id', Auth::user()->id)
                    ->whereIn('orderitem.status', array(1, 4))
                    ->where('orderuser.status', 0)
                    ->count();
            $completed = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
                    ->where('orderuser.users_id', Auth::user()->id)
                    ->where('orderitem.status', 2)
                    ->count();

            $cencel = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                            ->where('status', 3)->count();
            $details = array('totalstaff' => $totalstaff,
                'totalcustomer' => $totalcustomer,
                'totalorder' => $totalorder,
                'assigned' => $assigned,
                'completed' => $completed);
            $listalljobs = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->where('userrole.status', 0)
                    ->where('orderitem.status', 0)
                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'order.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
                    ->orderBy('order.created_at', 'desc')
                    ->limit(10)
                    ->get();
            $no = 1;
            $jobOnHold_ = array();
            $Jobs_hold_ = array();
            foreach ($listalljobs as $list_all_job) {
                $jobOnHold_['Number'] = $no;
                $jobOnHold_['id'] = $list_all_job['id'];
                $image = explode(',', $list_all_job['image_path']);
                $jobOnHold_['image'] = $image[0];
                $jobOnHold_['created_at'] = $list_all_job['created_at'];
                $jobOnHold_['work_roal'] = $list_all_job['work_roal'];
                array_push($Jobs_hold_, $jobOnHold_);
                $no++;
            }
        }

        return view('dashboard/dashboard')->
                        with(array('details' => $details,
                            'Jobs_hold' => $Jobs_hold,
                            'CompletedJobs' => $CompletedJobs,
                            'list_top_dazzers' => $list_top_dazzers,
                            'Jobs_hold_'=>$Jobs_hold_));
    }

    public function job($orderid) {
        $jobs = '';
//        echo $orderid;die;
//        if (Auth::user()->status == 1) {
            $jobs = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->where('userrole.status', 0)
//                    ->where('orderitem.status', 0)
                    ->where('order.id', $orderid)
                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'order.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
                    ->first();

            $commentcount = '';
            $viewRecord = array();

            $images = explode(',', $jobs['image_path']);
            $viewRecord['mainImage'] = $images[0];
            $x = 1;
            $img = array();
            foreach ($images as $image) {
                if ($x > 1 && !empty($image)) {
                    $img[] = $image;
                }
                $x++;
            }
            $viewRecord['images'] = $img;
            $viewRecord['created_at'] = $jobs['created_at'];

            $comment_count = \App\NoteHistory::where('orderitem_id', $jobs['orderitemid'])->count();
            $viewRecord['comment_count'] = $comment_count;

            $comments = \App\NoteHistory::join('users', 'users.id', '=', 'note_history.users_id')
                            ->where('note_history.orderitem_id', $jobs['orderitemid'])->get();
            $viewRecord['orderitemid'] = $jobs['orderitemid'];
            $viewRecord['comments'] = $comments;
            $viewRecord['username'] = Auth::user()->name;
//            $commentcount["$new_order->orderitemid"] = $comments;
//        }
        return view('dashboard/job')->with(array('jobs' => $viewRecord));
    }

}
