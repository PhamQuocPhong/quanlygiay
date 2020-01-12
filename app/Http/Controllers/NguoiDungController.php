<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\ActiveEmail;
use Mail;
use Session, URL;
use App\Order;
use App\OrderDetail;

class NguoiDungController extends Controller
{
    public function ShowLogin()
    {
        if(Session::get('user_id') && Session::get('member'))
        {
            return redirect()->route('/');
        }
        else{

           return view('login');
        }
        
    }

    public function ActionLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $login = ['email' => $email, 'password' => $password];

        $findUSer = User::where('email', $email)->first();

        $user = ActiveEmail::where('user_id', $findUSer->id)->first();

    	if(Auth::attempt($login)  && $user->Check == 1){

            $request->session()->put('user_id', $user->user_id);
            $request->session()->put('fullname', $findUSer->HoTen);
            $request->session()->put('check', 1);
            $request->session()->put('member', 'logined');


            return redirect()->intended('/');
    
        }

        else{
            return view('login', ['error' => 'Đăng nhập k thành công']);
        }
    }

    public function ActionLogout(Request $request)
    {
            $url =  URL::previous();

            $url_explode = explode('/', $url);


            if(in_array('user', $url_explode))
            {
                Auth::logout();
                $request->session()->forget('user_id');
                $request->session()->forget('fullname');
                $request->session()->forget('member');
                $request->session()->forget('check');
                $request->session()->forget('login_api');
                return redirect()->route('login');
            }
            else{

                Auth::logout();
                $request->session()->forget('user_id');
                $request->session()->forget('fullname');
                $request->session()->forget('member');
                $request->session()->forget('check');
                $request->session()->forget('login_api');
                return redirect()->back();
            }
        
    }

    public function CreateRegistration()
    {
         if(Session::get('username'))
        {
            return redirect()->route('/');
        }
        else{
           return view('register');
        }
    }

    public function ActionRegistration(Request $request)
    {
        request()->validate([

            
            'password' => 'required|min:6',   

            'email' => 'required|email|unique:users',

            'fullname' => 'required|min:6',   
            
            'g-recaptcha-response' => ['required', new \App\Rules\ValidRecaptcha]  

        ],

         [


        ]);

        // nếu có trường hợp xác nhận mật khẩu
        // $input = request()->except('password','confirm_password');
         // $user = new User($input);

        $gender = $request->gender;

        $user = new User();

        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->HoTen  = request()->fullname;

        $user->GioiTinh = $gender; 

        $user->save();


        $secret = GenerateRandomString(20);

        $user_id = $user->id;

        DB::table('active_email')->insert(['token' => $secret, 'Check' => 0, 'user_id' => $user_id]);

        Mail::send('mailfb', ['content' => 'Mã xác nhận của bạn là: ' . $secret], function($message){


        $message->to(request()->email, 'Visitor')->subject('Visitor Feedback!');
        });

        $request->session()->put('user_id', $user_id);
        $request->session()->put('fullname', request()->fullname);

        return back()->with('success', 'User created successfully.');
    }


    public function ConfirmRegister(Request $request)
    {
        $token = $request->token;

        $user_id = Session::get('user_id');

        $active = DB::table('active_email')->where('user_id', $user_id)->first();

        if($token == $active->Token)
        {
           DB::table('active_email')->where('user_id', $user_id)->update(['Check' => 1]);
             $request->session()->put('check', 1);
             $request->session()->put('member', 'logined');
           echo 1;
        }
        else{
           echo 0;
        }
    }

    public function Profile()
    {

        $user_id = Session::get('user_id');
        $profileUser = User::where('id', $user_id)->first();

        return view('user.profile', ['profileUser' => $profileUser]);
    }

    public function Info(Request $request)
    {
        $day = $request->day;
        $month = $request->month;
        $year = $request->year;
        $gender = $request->gender;

        $user_id = Session::get('user_id');

        $findUSer = User::where('id', $user_id);

        $birthDay = $year . '-' . $month . '-' . $day;

        $findUSer->update(['NgaySinh' => $birthDay, 'GioiTinh' => $gender ]);

        return redirect()->back();
    }

    public function Ordering()
    {
        $user_id = Session::get('user_id');
        
        $billInfo = DB::table('hoadon')
                    ->join('chitiethoadon', 'hoadon.ID_HoaDon', '=', 'chitiethoadon.ID_HoaDon')
                    ->leftjoin('sanpham', 'chitiethoadon.ID_SanPham', '=', 'sanpham.ID_SanPham')
                    ->where('hoadon.user_id', '=', $user_id)
                    ->select('hoadon.*', 'chitiethoadon.*', 'sanpham.TenSanPham as TenSP' )
                    ->get();
    
        return view('user.ordering', ['billInfo' => $billInfo]);
    }

    public function DeleteBill(Request $request)
    {
        $order_id = $request->order_id;

        $bill = Order::where('ID_HoaDon', $order_id);

        $bill->delete();

    }

    public function Address()
    {
        return view('user.address');
    }
}
