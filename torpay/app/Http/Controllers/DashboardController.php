<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\transaction;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    public function about(){
        return view('pages.about');
    }
    public function dash(){
        return view('pages.dashboard');
    }
    public function profile(){
        // $profile = \DB::table('users')->where('email', 'swagasoft@gmail.com');
        $profile =  Auth::user()->name;
        $user_email =  Auth::user()->email;
        return view('pages.profile', compact('profile', 'user_email'));
    }
    public function paynow(){
        
        return view('pages.paynow', );
    }
    public function payment(){
       
        return view('pages.payment');
    }
    // Handling in comming request.
    public function request(){
    // var_dump($_POST);
   
        $gtpay_tranx_status_code =  $_REQUEST['gtpay_tranx_status_code'];
        $gtpay_tranx_status_msg =  $_REQUEST['gtpay_tranx_status_msg'];
        $gtpay_tranx_amt =  $_REQUEST['gtpay_tranx_amt'];
        $gtpay_cust_id =  $_REQUEST['gtpay_cust_id'];
        $gtpay_tranx_id =  $_REQUEST['gtpay_tranx_id'];
        $gtpay_echo_data =  $_REQUEST['gtpay_echo_data'];
        $success_message = ' Your transaction was successful';
        $current_user =  Auth::user()->email;
       
            // store incomming value to database .
            $mydata = new Transaction;
            $mydata->transaction_id = Input::get('gtpay_tranx_id');
            $mydata->customer_id =  Input::get('gtpay_cust_id');
            $mydata->amount =  Input::get ('gtpay_tranx_amt');
            $mydata->message =   Input::get ('gtpay_tranx_status_msg');
            $mydata->status_code =   Input::get ('gtpay_tranx_status_code');
            $mydata->customer_name =  $current_user;
            $mydata->save();
        
    
            return view('pages.request', compact('gtpay_tranx_status_code',
            'gtpay_tranx_status_msg', 'gtpay_tranx_amt',
        'gtpay_echo_data', 'gtpay_cust_id', 'success_message','gtpay_tranx_id' ));
        // return ($_POST);
  
      
   
    }
    public function payment_post(){
        $gtpay_tranx_id = $_REQUEST['gtpay_tranx_id'];
        $gtpay_cust_id = $_REQUEST['gtpay_cust_id'];
        $gtpay_tranx_amt = $_REQUEST['gtpay_tranx_amt'];
        return view('pages.payment', compact('gtpay_tranx_id','gtpay_cust_id', 'gtpay_tranx_amt', 'gtpay_tranx_id'));
    }

    public function transactions(){
        $tranx = \DB::table('transactions')->where('customer_name', 'swagasoft@gmail.com')->array();


        return view('pages.transactions','tranx');
    }
}
