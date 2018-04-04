<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use File;

//use Move;
class MailRead extends Controller {

    public function readmail() {

        set_time_limit(0);
        $m_acs = 15;
        $m_t = 0;
        $host = 'mail.imarasoft.net';
        $port = '143';
        $mailbox = "{" . "$host" . ":" . "$port";
        $username = 'dazz@imarasoft.net';
        $m_password = 'Dazz@123';

        $m_mail = imap_open("$mailbox" . "/novalidate-cert}INBOX", trim($username), $m_password) or die("ERROR: " . imap_last_error());

        $m_gunixtp = array(2592000, 1209600, 604800, 259200, 86400, 21600, 3600);
        $m_gdmy = date('d-M-Y', time() - $m_gunixtp[$m_t]);
        $MC = imap_check($m_mail);
        $inbox = $m_mail;
        $numb = $MC->Nmsgs;
        if ($numb == 0)
            return \Redirect::to('neworder');
        $m_search = imap_fetch_overview($m_mail, "1:{$MC->Nmsgs}", 0);
        $count = count($m_search);
        $m_empty = '';
        if ($m_search < 1) {
            $m_empty = "No New Messages";
        } else {

            $emails = imap_search($inbox, 'ALL');
            foreach ($m_search as $email_number) {
                $overview = imap_fetch_overview($inbox, $email_number->msgno, 0);
                $message = imap_fetchbody($inbox, $email_number->msgno, 2);
                $structure = imap_fetchstructure($inbox, $email_number->msgno);
                $attachments = array();
                if (isset($structure->parts) && count($structure->parts)) {
                    for ($i = 0; $i < count($structure->parts); $i++) {
                        $attachments[$i] = array(
                            'is_attachment' => false,
                            'filename' => '',
                            'name' => '',
                            'attachment' => ''
                        );
                        if ($structure->parts[$i]->ifdparameters) {
                            foreach ($structure->parts[$i]->dparameters as $object) {
                                if (strtolower($object->attribute) == 'filename') {
                                    $attachments[$i]['is_attachment'] = true;
                                    $attachments[$i]['filename'] = $object->value;
                                }
                            }
                        }
                        if ($structure->parts[$i]->ifparameters) {
                            foreach ($structure->parts[$i]->parameters as $object) {
                                if (strtolower($object->attribute) == 'name') {
                                    $attachments[$i]['is_attachment'] = true;
                                    $attachments[$i]['name'] = $object->value;
                                }
                            }
                        }
                        if ($attachments[$i]['is_attachment']) {
                            $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number->msgno, $i + 1);

                            if ($structure->parts[$i]->encoding == 3) {
                                $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                            } elseif ($structure->parts[$i]->encoding == 4) {
                                $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                            }
                        }
                    }
                }
                $obj_thang = imap_headerinfo($m_mail, $email_number->msgno);
                $message = imap_fetchbody($m_mail, $email_number->msgno, 1);
                $photestyle = '';

                if (preg_match("/(photostyle=3D)([^`]*?)(;)/", $message, $values) == true ||
                        preg_match("/(Photostyle:)([^`]*?)(;)/", $message, $values) == true) {
                    $frametypes = '';
                    $headlinetext = '';
                    if (!empty($values[2])) {
                        if (preg_match("/(Frametype=3D)([^`]*?)(;)/", $message, $Frametypes) == true ||
                                preg_match("/(Frametype:)([^`]*?)(;)/", $message, $Frametypes) == true) {
                            echo $frametypes =  str_replace('"', '', $Frametypes[2]) ;
                           
                        }
                        if (preg_match("/(Headlinetext=3D)([^`]*?)(;)/", $message, $headline_text) == true ||
                                preg_match("/(Headlinetext:=E2=80=9C)([^`]*?)(=E)/", $message, $headline_text) == true ||
                                preg_match("/(Headlinetext:)([^`]*?)(;)/", $message, $headline_text) == true) {
                            $headlinetext = $headline_text[2];
                        }

                        $photestyle = trim($values[2]);
                        preg_match("/(<)([^`]*?)(>)/", $email_number->from, $ma);
                        $mail = trim($ma[2]); // str_replace('"', '', $overview->from);

                        $Order = new \App\Order();
                        $Order->email = $mail;
                        $Order->frametype = $frametypes;
                        $Order->headlinetext = $headlinetext;
                        $Order->save();
                        $orderid = $Order->id;

                        $UserRole = \App\UserRole::where('work_roal', $photestyle)->first();

                        $taskid = $UserRole->id;
                        $OrderItem = new \App\OrderItem();
                        $OrderItem->order_id = $orderid;
                        $OrderItem->userrole_id = $taskid;
                        $OrderItem->save();

                        $path = public_path('orderfiles') . '/' . $orderid;
                        File::makeDirectory($path, $mode = 0777, true, true);
                        $file_name = '';
                        $files = array();
                        foreach ($attachments as $attachment) {
                            if ($attachment['is_attachment'] == 1) {
                                $filename = $attachment['name'];
                                if (empty($filename))
                                    $filename = $attachment['filename'];
                                if (empty($filename))
                                    $filename = time() . ".dat";
                                $folder = $path;
                                $file_name = $filename;
                                $fp = fopen($folder . "/" . $filename, "w+");
                                fwrite($fp, $attachment['attachment']);
                                fclose($fp);
                                $files[] = $file_name;
                            }
                        }
                        $filename_m = '';
                        $f_name = '';
                        foreach ($files as $file) {
                            $filename_m .='orderfiles/' . $orderid . '/' . $file . ',';
                            $f_name .=$file . ',';
                        }
                        \App\Order::where('id', $orderid)->update(array(
                            'file_name' => $f_name,
                            'image_path' => $filename_m
                        ));
                        imap_delete($inbox, $email_number->msgno);
                        sleep(5);
                    }
                }
                unset($attachments);
            }
        }
        imap_expunge($inbox);
        imap_close($inbox);
        return \Redirect::to('neworder');
    }

//------------------------
//        foreach ($m_search as $overview) {
//            $structure = imap_fetchstructure($inbox, $overview->msgno);
//            $attachments = array();
//            if (isset($structure->parts) && count($structure->parts)) {
//                for ($i = 0; $i < count($structure->parts); $i++) {
//                    $attachments[$i] = array(
//                        'is_attachment' => false,
//                        'filename' => '',
//                        'name' => '',
//                        'attachment' => '');
//                    if ($structure->parts[$i]->ifdparameters) {
//                        foreach ($structure->parts[$i]->dparameters as $object) {
//                            if (strtolower($object->attribute) == 'filename') {
//                                $attachments[$i]['is_attachment'] = true;
//                                $attachments[$i]['filename'] = $object->value;
//                            }
//                        }
//                    }
//                    if ($structure->parts[$i]->ifparameters) {
//                        foreach ($structure->parts[$i]->parameters as $object) {
//                            if (strtolower($object->attribute) == 'name') {
//                                $attachments[$i]['is_attachment'] = true;
//                                $attachments[$i]['name'] = $object->value;
//                            }
//                        }
//                    }
//                    if ($attachments[$i]['is_attachment']) {
//                        $attachments[$i]['attachment'] = imap_fetchbody($inbox, $MC->Nmsgs, $i + 1);
//                        if ($structure->parts[$i]->encoding == 3) { // 3 = BASE64
//                            $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
//                        } elseif ($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
//                            $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
//                        }
//                    }
//                } // for($i = 0; $i < count($structure->parts); $i++)
//            } // if(isset($structure->parts) && count($structure->parts))
//            if (count($attachments) != 0) {
//                $what_ever = $overview->msgno;
//                $obj_thang = imap_headerinfo($m_mail, $what_ever);
//                $message = imap_fetchbody($m_mail, $what_ever, 1);
//                $photestyle = '';
//                if (preg_match("/(photostyle=3D)([^`]*?)(;)/", $message, $values) == true) {
////                        print_r($values);
//                    if (!empty($values[2])) {
//                        $photestyle = trim($values[2]);
//                        preg_match("/(<)([^`]*?)(>)/", $overview->from, $ma);
//                        $mail = trim($ma[2]); // str_replace('"', '', $overview->from);
//
//                        $Order = new \App\Order();
//                        $Order->email = $mail;
//                        $Order->save();
//                        $orderid = $Order->id;
//
//                        $UserRole = \App\UserRole::where('work_roal', $photestyle)->first();
//
//                        $taskid = $UserRole->id;
//                        $OrderItem = new \App\OrderItem();
//                        $OrderItem->order_id = $orderid;
//                        $OrderItem->userrole_id = $taskid;
//                        $OrderItem->save();
//
//                        $path = public_path('orderfiles') . '/' . $orderid;
//                        File::makeDirectory($path, $mode = 0777, true, true);
//                        $file_name = '';
//
//                        foreach ($attachments as $attachment) {
//                            print_r($attachment);
//                            if ($attachment['is_attachment'] == 1) {
//
//                                $filename = $attachment['name'];
//                                if (empty($filename))
//                                    $filename = $attachment['filename'];
//                                if (empty($filename))
//                                    $filename = time() . ".dat";
//
//                                $folder = $path;
//                                if (!is_dir($folder)) {
//                                    mkdir($folder);
//                                }
//                                $file_name = $filename;
//                                $fp = fopen($folder . "/" . $filename . '.jpg', "w+");
//                                fwrite($fp, $attachment['attachment']);
//                                fclose($fp);
////                    $uploadSuccess = $file->move($folder, $filename);
//                                \App\Order::where('id', $orderid)->update(array(
//                                    'file_name' => $file_name,
////                                    'size' => $size,
////                                    'file_type' => $type,
//                                    'image_path' => 'orderfiles/' . $orderid . '/' . $filename
//                                ));
//                            }
//                        }
//                    }
//                }
//            }
//            print_r($overview);
////                unset($attachments);
////                die;
//        }
//        }
//        imap_close($m_mail, CL_EXPUNGE);
//    }
}
