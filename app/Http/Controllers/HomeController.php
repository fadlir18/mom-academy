<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Validator;
use Illuminate\Http\Request;
use App\Models\HomeModel;
use Illuminate\Support\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use DB;

class HomeController extends Controller
{
    protected $currentTime;

    public function __construct()
    {
        $this->currentTime = Carbon::now()->toDateTimeString();
    }

    public function index(HomeModel $model)
    {
        // dd(AppHelper::getAuth('user_id'));
        // request()->session()->forget('user_login');

        // $data_session = AppHelper::getAuth();
        // dd($data_session);

        $course = $model->db_course_lists(['limit' => 3]);
        $module = $model->db_module_lists(['limit' => 3]);
        $module_join = $model->db_module_join_lists(['limit' => 3]);
        // dd($module_join);
        $expert = $model->db_expert_lists(['limit' => 6]);
        $moms   = $model->db_mom_lists(['limit' => 6]);
        $events = $model->db_events_lists(['limit' => 3]);
        $product = $model->db_product_lists(['limit' => 3]);
        // $dt = Carbon::parse($this->currentTime)->timezone('Asia/Jakarta');
        // $toDay = $dt->format('d');
        // $toMonth = $dt->format('M');
        // $toYear = $dt->format('Y');                        
        $data['events'] = $events;
        $data['course'] = $course;
        $data['module'] = $module;
        $data['expert'] = $expert;
        $data['moms'] = $moms;
        $data['product'] = $product;
        $data['titlepage'] = 'home';


        $data['cekOrderEbook'] = DB::table('module_ebook')->select('module_ebook.*', 'orders.status', 'orders.product_id')->leftJoin('orders', function ($join) {
            $join->on('module_ebook.ebook_id', '=', 'orders.product_id')->where("orders.product_type", "=", "Module Ebook")->where("orders.uid", "=", AppHelper::getAuth('user_id'))->where("status", "=", "settlement");
        })->orderBy('module_ebook.created_at')->limit(3)->get();

        $data['cekOrderVideo'] = DB::table('module_video')->select('module_video.*', 'orders.status', 'orders.product_id')->leftJoin('orders', function ($join) {
            $join->on('module_video.video_id', '=', 'orders.product_id')->where("orders.product_type", "=", "Module Video")->where("orders.uid", "=", AppHelper::getAuth('user_id'))->where("status", "=", "settlement");
        })->orderBy('module_video.created_at')->limit(3)->get();

        $data['cekOrderClass'] = DB::table('course')->select('course.*', 'orders.status', 'orders.product_id')->leftJoin('orders', function ($join) {
            $join->on('course.course_id', '=', 'orders.product_id')->where("orders.product_type", "=", "Course")->where("orders.uid", "=", AppHelper::getAuth('user_id'))->where("status", "=", "settlement");
        })->orderBy('course.created_at')->limit(3)->get();

        $data['cekOrderEvents'] = DB::table('events')->select('events.*', 'orders.status', 'orders.product_id')->leftJoin('orders', function ($join) {
            $join->on('events.event_id', '=', 'orders.product_id')->where("orders.product_type", "=", "Course")->where("orders.uid", "=", AppHelper::getAuth('user_id'))->where("status", "=", "settlement");
        })->orderBy('events.created_at')->limit(3)->get();
        return view('home.home', $data);
    }

    function sendMail(Request $request)
    {

        $subject = "Contact dari " . $request->input('name');
        $name = $request->input('name');
        $emailAddress = $request->input('email');
        $noWhatsapp = $request->input('noWhatsapp');
        $message = $request->input('message');

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            // Pengaturan Server
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.zonderstudio.com';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'form@zonderstudio.com';                 // SMTP username
            $mail->Password = '1jk:8uYbMF8]4U';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            // Siapa yang mengirim email
            $mail->setFrom("form@zonderstudio.com", "Form Website MoM Academy");

            // Siapa yang akan menerima email
            $mail->addAddress('yanti@mothersonmission.id', 'Admin');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional

            // ke siapa akan kita balas emailnya
            $mail->addReplyTo($emailAddress, $name);

            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = 'Name : ' . $name;
            $mail->Body    .= '<br>';
            $mail->Body    .= 'Email Address : ' . $emailAddress;
            $mail->Body    .= '<br>';
            $mail->Body    .= 'Whatsapp Number : ' . $noWhatsapp;
            $mail->Body    .= '<br>';
            $mail->Body   .= 'Message : ' . $message;
            $mail->AltBody = $message;

            $mail->send();

            $request->session()->flash('success', 'Terima kasih, kami sudah menerima email anda.');
            return redirect('home');
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
