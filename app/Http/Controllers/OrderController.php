<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use File;
use ZipArchive;

class OrderController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $orders = \App\Order::all();
        return view('order')->with('orders', $orders);
    }

    public function lastcomplete() {
        $orderitemid = Input::get('orderitemid');
        $orderid = Input::get('order_id');
        $message = Input::get('completemail');
//        $subject =Input::get('subject');
        $order = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                ->where('order.id', $orderid)
                ->where('orderitem.id', $orderitemid)
                ->first();
//        print_r($order);
        $mailto = $order->email;

        $M_files = explode(',', $order->output_image_path);
        $zipname = "completefiles/$orderitemid/$orderitemid.zip";
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
//        print_r($M_files);
        foreach ($M_files as $multi_file) {
            if (empty($multi_file))
                continue;
            $zip->addFile($multi_file);
        }
        $zip->close();

        $file = "completefiles/$orderitemid/$orderitemid.zip";
        $filename = "$orderitemid.zip";
        $mailto = 'rilwanhnd20@gmail.com'; //$mailte; // 'rilwanhnd20@gmail.com';
        $subject = 'Order Completed';
        $filepath = public_path("completefiles/$orderitemid/$orderitemid.zip");

        $content = file_get_contents($filepath);
        $content = chunk_split(base64_encode($content));

        $separator = md5(time());
        $eol = "\r\n";
        $headers = "From: name <test@test.com>" . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
        $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
        $headers .= "This is a MIME encoded message." . $eol;

        $message = $message; //$customer_message;
        $body = "--" . $separator . $eol;
        $body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
        $body .= "Content-Transfer-Encoding: 8bit" . $eol;
        $body .= $message . $eol;
        // attachment
        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment" . $eol;
        $body .= $content . $eol;
        $body .= "--" . $separator . "--";
        //SEND Mail
        if (mail($mailto, $subject, $body, $headers)) {
//            echo "mail send ... OK"; // or use booleans here
            \App\OrderItem::where('id', $orderitemid)->update(array('status' => 2));
        } else {
            echo "mail send ... ERROR!";
            print_r(error_get_last());
            die;
        }
        $this->getordercount();
        return \Redirect::to('assigned');
    }

    public function getordercount() {
        if (Auth::user()->status == 1) {
            $neworder = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                            ->where('status', 0)->count();
            $assigned = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                            ->whereIn('status', array(1, 4))->count();
            $completed = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                            ->where('status', 2)->count();
            $cencel = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                            ->where('status', 3)->count();
        } elseif (Auth::user()->status == 0) {
            $neworder = 0;
            $assigned = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
//                            ->where('orderitem.status', 1)
                    ->where('orderuser.users_id', Auth::user()->id)
                    ->whereIn('orderitem.status', array(1, 4))
                    ->where('orderuser.status', 0)
                    ->count();
            $completed = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
                    ->where('orderuser.users_id', Auth::user()->id)
                    ->where('orderitem.status', 2)
                    ->count();
            $cencel = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
                    ->where('orderuser.users_id', Auth::user()->id)
                    ->where('orderuser.status', 1)
                    ->count();
        }
        session(['neworder' => $neworder, 'assigned' => $assigned, 'completed' => $completed, 'cencel' => $cencel]);
        return;
    }

    public function downloadOrder() {
        
    }

    public function neworder() {
        $this->getordercount();
        $neworders = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                ->where('userrole.status', 0)
                ->where('orderitem.status', 0)
                ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'order.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
                ->get();

        $ar = array();
        foreach ($neworders as $neworder) {
            $r['order_id'] = $neworder['order_id'];

            $images = explode(',', $neworder['image_path']);
            $x = 1;
            $count = count($images);
            $i = 1;
            $img=array();
            foreach ($images as $image) {
                if (empty($image) || $image == '')
                    continue;
                $img[$i] = $image;
                $i++;
            }
            $r['image_path'] = $img;
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
            $diff = abs(strtotime($neworder['created_at']) - strtotime(date('Y-m-d h:i:s')));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $how_months = floor(($diff) / (30 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
            $min = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / (60));
            $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $min * 60));
            if ($how_months != 0) {
                $r['how_months'] = $how_months;
            }
            if ($days != 0) {
                $r['days'] = $days;
            }
            if ($hours != 0) {
                $r['hours'] = $hours;
            }
            $r['min'] = $min;
            $getcomment = 0;
            $getcomment = \App\OrderUser::where('orderitem_id', $neworder->orderitemid)->count();
            $r['reject'] = $getcomment;
            array_push($ar, $r);
            unset($img);
            unset($r);
        }

//print_r($ar);die;
        return view('orderdetails')->with('jobs', $ar);
    }

    public function getstaffname() {
        $userrrolid = Input::get('userroleId');
        $staffname = \App\UsersSkills::join('users', 'users.id', '=', 'userskills.users_id')
                ->where('userskills.userrole_id', $userrrolid)
                ->whereBetween('users.status', array(0, 1))
                ->select('users.name as staffname', 'users.id as staffid')
                ->get();
        $staff = '<option value="">-- select staff -- </option>';
        foreach ($staffname as $staffna) {
            $staff.="<option value='$staffna->staffid'>$staffna->staffname</option>";
        }
        echo json_encode($staff);
    }

    public function rejectby() {
        $id = Input::get('orderitemid');
        $rejectcomments = \App\OrderUser::where('orderitem_id', $id)->where('status', 1)->get();
        $note = '';
        foreach ($rejectcomments as $rejectcomment) {
            $userid = $rejectcomment->users_id;
            $staff = \App\User::where('id', $userid)->first();
            $name = $staff->name;
            $note.='
							<div class="col-md-12" >
								<h3>' . $name . ' </h3>
								<a href="#" class="pull-left">
								<img alt="" src="' . $staff->img . '" width="125"  class="media-object">
								</a>
								<div class="media-body">
									<h4 class="media-heading">' . $rejectcomment->cancel_date . '
									
									</h4>
									<p>' . $rejectcomment->note . '</p>
								</div></div><hr>';
        }
        echo json_encode($note);
    }

    public function getnote() {
        $id = Input::get('orderitemid');
        $getnotes = \App\NoteHistory::where('orderitem_id', $id)->get();
        \App\NoteHistory::where('orderitem_id', $id)
                ->where('users_id', '!=', Auth::user()->id)
                ->update(array('status' => 0));
        $allmessage = '';
        foreach ($getnotes as $getnote) {
            $userid = $getnote->users_id;
            $message = $getnote->note;
            $date = $getnote->date;
            $user = \App\User::where('id', $userid)->first();

            $allmessage.='<div class = "media"><a href = "#" class = "pull-left">';
            $allmessage.='<img alt = "" src = "' . $user->img . '" width="35" class = "media-object"></a>';
            $allmessage.='<div class = "media-body">
' . $message . '<p>';
            $allmessage.='</div></div><hr>';
        }
        echo json_encode($allmessage);
    }

    public function ordernote() {
        $id = Input::get('orderitemid');
        $formvalue =Input::get('formname');
        $comment = Input::get('comment');
        if (!empty($comment)) {
            $note = new \App\NoteHistory();
            $note->orderitem_id = $id;
            $note->users_id = Auth::user()->id;
            $note->note = $comment;
            $note->save();
        }
        if($formvalue ==0){
        return \Redirect::to('assigned');
        }else{
          return  \Redirect::to("job/".$id);
        }
    }

    public function assignstaff() {
        $date = date("Y-m-d");
        $orderitemid = Input::get('orderitemid');
        $orderid = Input::get('orderid');
        $staffid = Input::get('staff');
        \App\OrderItem::where('id', $orderitemid)->update(array('status' => 1));
        $user = new \App\OrderUser();
        $user->orderitem_id = $orderitemid;
        $user->users_id = $staffid;
        $user->assign_date = $date;
        $user->save();
        if (!empty(Input::get('note'))) {
            $note = new \App\NoteHistory();
            $note->orderitem_id = $orderitemid;
            $note->users_id = Auth::user()->id;
            $note->note = Input::get('note');
            $note->date = $date;
            $note->save();
        }
        $this->getordercount();
        return \Redirect::to('neworder');
    }

    public function reassignstaff() {
        $date = date("Y-m-d");
        $orderitemid = Input::get('orderitemid');
        $staffid = Input::get('staff');
        if (empty($staffid = Input::get('staff'))) {
            \App\OrderItem::where('id', $orderitemid)->update(array('status' => 0));
            \App\OrderUser::where('orderitem_id', $orderitemid)->delete();
        } else {
            \App\OrderUser::where('orderitem_id', $orderitemid)->update(array('users_id' => $staffid));
        }
        $this->getordercount();
        return \Redirect::to('assigned');
    }

    public function reaction() {
        $date = date("Y-m-d");
        $orderitemid = Input::get('orderitemid');
        $comment = Input::get('reason');
        \App\OrderItem::where('id', $orderitemid)->update(array('status' => 1));
        if (!empty($comment)) {
            $note = new \App\NoteHistory();
            $note->orderitem_id = $orderitemid;
            $note->users_id = Auth::user()->id;
            $note->note = $comment;
            $note->date = $date;
            $note->save();
        }
        return \Redirect::to('assigned');
    }

    public function cancelorder() {
        $orderid = Input::get('order_id');
        $mail = trim(Input::get('email'));
        $reason = Input::get('reason');
        $orderitemid = Input::get('orderitemid');
        //*****sent mail work
        $manageconfig = \App\Configs::first();
        $receive_mail = $manageconfig->mailaddress;
        $subject = "Cancel Order";
        $headers = "From: $receive_mail" . "\r\n" .
                "Reply-To: $receive_mail" . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        mail($mail, $subject, $reason, $headers);

        \App\OrderItem::where('id', $orderitemid)->update(array('status' => 3));
        \App\Order::where('id', $orderid)->update(array('note' => $reason));
        $this->getordercount();
        return \Redirect::to('neworder');
    }

    public function completed() {
        if (Auth::user()->status == 1) {
            $this->getordercount();
            $neworder = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->join('orderuser', 'orderitem_id', '=', 'orderitem.id')
                    ->join('users', 'users.id', '=', 'orderuser.users_id')
                    ->where('orderitem.status', 2)
                    ->where('orderuser.status', 0)
                    ->select('orderuser.created_at as orderassigndate', 'orderitem.status as orderstatus', 'users.status as userstatus', 'users.*', 'order.email as email', 'users.email as staffemail', 'orderitem.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id', 'order.headlinetext as headlinetext', 'order.frametype as frametype')
                    ->get();
// print_r($neworder);die;
            $commentcount = '';
            foreach ($neworder as $new_order) {
                $comments = \App\NoteHistory::where('orderitem_id', $new_order->orderitemid)
                        ->where('status', 1)
                        ->where('users_id', '!=', Auth::user()->id)
                        ->count();
                if ($comments == 0)
                    continue;
                $commentcount["$new_order->orderitemid"] = $comments;
            }
        }elseif (Auth::user()->status == 0) {

            $neworder = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->join('orderuser', 'orderitem_id', '=', 'orderitem.id')
                    ->join('users', 'users.id', '=', 'orderuser.users_id')
                    ->where('orderitem.status', 2)
                    ->where('orderuser.status', 0)
                    ->where('orderuser.users_id', Auth::user()->id)
                    ->select('orderuser.created_at as orderassigndate', 'orderitem.status as orderstatus', 'users.status as userstatus', 'users.*', 'order.email as email', 'users.email as staffemail', 'orderitem.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id', 'order.headlinetext as headlinetext', 'order.frametype as frametype')
                    ->get();

            $commentcount = '';
            foreach ($neworder as $new_order) {
                $comments = \App\NoteHistory::where('orderitem_id', $new_order->orderitemid)
                        ->where('status', 1)
                        ->where('users_id', '!=', Auth::user()->id)
                        ->count();
                if ($comments == 0)
                    continue;
                $commentcount["$new_order->orderitemid"] = $comments;
            }
        }
        $this->getordercount();
        return view('completedorder')->with(array('neworder' => $neworder, 'commentcount' => $commentcount));
    }

    public function cencel() {
        if (Auth::user()->status == 1) {
            $this->getordercount();
            $neworder = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->where('orderitem.status', 3)
//                    ->where('orderuser.status',0)
                    ->select('orderitem.status as orderstatus', 'order.email as email', 'orderitem.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
                    ->get();
// print_r($neworder);die;
            $commentcount = '';
            foreach ($neworder as $new_order) {
                $comments = \App\NoteHistory::where('orderitem_id', $new_order->orderitemid)
                        ->where('status', 1)
                        ->where('users_id', '!=', Auth::user()->id)
                        ->count();
                if ($comments == 0)
                    continue;
                $commentcount["$new_order->orderitemid"] = $comments;
            }
        }elseif (Auth::user()->status == 0) {
            $neworder = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
                    ->join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->where('orderuser.users_id', Auth::user()->id)
                    ->where('orderuser.status', 1)
                    ->select('orderuser.note as rejectreason', 'orderitem.status as orderstatus', 'order.email as email', 'orderitem.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
                    ->get();

            $commentcount = '';
            foreach ($neworder as $new_order) {
                $comments = \App\NoteHistory::where('orderitem_id', $new_order->orderitemid)
                        ->where('status', 1)
                        ->where('users_id', '!=', Auth::user()->id)
                        ->count();
                if ($comments == 0)
                    continue;
                $commentcount["$new_order->orderitemid"] = $comments;
            }
        }
        $this->getordercount();
        return view('cancelorder')->with(array('neworder' => $neworder, 'commentcount' => $commentcount));
    }

    public function assigned() {

        if (Auth::user()->status == 1) {
            $this->getordercount();
            $neworder = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->join('orderuser', 'orderitem_id', '=', 'orderitem.id')
                    ->join('users', 'users.id', '=', 'orderuser.users_id')
                    ->whereIn('orderitem.status', array(1, 4))
                    ->where('orderuser.status', 0)
                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'orderuser.created_at as orderassigndate', 'orderitem.status as orderstatus', 'users.status as userstatus', 'users.*', 'order.email as email', 'users.email as staffemail', 'orderitem.id as order_id', 'userrole.*', 'order.*', 'orderitem.id as orderitemid', 'order.id as order_id', 'userrole.id as userrole_id')
                    ->get();
            $commentcount = '';
            foreach ($neworder as $new_order) {
                $comments = \App\NoteHistory::where('orderitem_id', $new_order->orderitemid)
                        ->where('status', 1)
                        ->where('users_id', '!=', Auth::user()->id)
                        ->count();
                if ($comments == 0)
                    continue;
                $commentcount["$new_order->orderitemid"] = $comments;
            }
        }elseif (Auth::user()->status == 0) {

            $neworder = \App\OrderItem::join('order', 'order.id', '=', 'orderitem.order_id')
                    ->join('userrole', 'userrole.id', '=', 'orderitem.userrole_id')
                    ->join('orderuser', 'orderitem_id', '=', 'orderitem.id')
                    ->join('users', 'users.id', '=', 'orderuser.users_id')
                    ->where('orderuser.users_id', Auth::user()->id)
                    ->where('orderuser.status', 0)
                    ->whereIn('orderitem.status', array(1, 4))
                    ->select('order.headlinetext as headlinetext', 'order.frametype as frametype', 'orderuser.created_at as orderassigndate', 'orderuser.id as orderusersid', 'orderitem.status as orderstatus', 'users.status as userstatus', 'users.*', 'order.email as email', 'users.email as staffemail', 'orderitem.id as order_id', 'userrole.*', 'order.*', 'order.id as order_id', 'orderitem.id as orderitemid', 'userrole.id as userrole_id')
                    ->get();
            $commentcount = '';
            foreach ($neworder as $new_order) {
                $comments = \App\NoteHistory::where('orderitem_id', $new_order->orderitemid)
                        ->where('status', 1)
                        ->where('users_id', '!=', Auth::user()->id)
                        ->count();
                if ($comments == 0)
                    continue;
                $commentcount["$new_order->orderitemid"] = $comments;
            }
        }
//        print_r($neworder);
//        $assign=array();
//        $assign_=array();
//        foreach($neworder as $re){
//            $assign_['order_id']=$re['order_id'];
//            $assign_['image_path']=$re['image_path'];
//            $assign_['order_id']=$re['order_id'];
//            $assign_['order_id']=$re['order_id'];
//            $assign_['order_id']=$re['order_id'];
//            $assign_['order_id']=$re['order_id'];
//            $assign_['order_id']=$re['order_id'];
//        }
//        die;

        $this->getordercount();
        return view('assignorder')->with(array('neworder' => $neworder, 'commentcount' => $commentcount));
    }

    public function submitfile() {
        $orderitemid = Input::get('orderitemid');
        $comment = Input::get('comment');
        $orderid = Input::get('orderid');
        $time = round(microtime(true) * 1000);
        $path = public_path('completefiles') . '/' . $orderitemid;
        File::makeDirectory($path, $mode = 0777, true, true);
//************working on image part

        $output_image_path = '';
        if (Input::hasFile('submitfile')) {
            $files = Input::file("submitfile");
            foreach ($files as $file) {
//                print_r($file);
                $size = $file->getClientSize();
                $type = $file->getClientMimeType();
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $uploadSuccess = $file->move($path, $filename);
                $output_image_path .='completefiles/' . $orderitemid . '/' . $filename . ',';
            }
            \App\Order::where('id', $orderid)->update(array(
                'output_image_path' => $output_image_path
            ));
        }
        \App\OrderItem::where('id', $orderitemid)->update(array('status' => 4));
        $this->getordercount();
        return \Redirect::to('assigned');
    }

    public function rejectorder() {
        $date = date("Y-m-d H:i:s");
        $orderitemid = Input::get('orderitemidreject');
        $rejectreason = Input::get('rejectreason');
        $orderid = Input::get('orderidreject');
        $orderusersid = Input::get('orderusersid');
//        print_r(Input::get());die;
        \App\OrderItem::where('id', $orderitemid)->update(array('status' => 0));
        \App\OrderUser::where('id', $orderusersid)->update(array('status' => 1, 'note' => $rejectreason, 'cancel_date' => $date));
        $this->getordercount();
        return \Redirect::to('assigned');
    }

}
