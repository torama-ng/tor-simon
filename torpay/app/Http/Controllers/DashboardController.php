<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Transaction;
use App\Total_trax;
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
        return redirect('/dash');
    }

    // about function
    public function about(){
        return view('pages.about');
    }

    // dashboard function
    public function dash(){
        $current_user =  Auth::user()->email;
        $tranx = \DB::table('transactions')->where('customer_name', $current_user)->get()->toArray();
        $total = \DB::table('total_traxs')->where('customer_name', $current_user)->get()->toArray();
        $last_tranx =  \DB::table('total_traxs')->where('customer_name', $current_user)->pluck('created_at')->last();
        $success_ful_trax  = count( $tranx);
        $my_total_trax  = count( $total);
        $failed = ($my_total_trax - $success_ful_trax);
        return view('pages.dashboard', compact('success_ful_trax', 'my_total_trax','failed',
        'last_tranx'));

    }

    // profile funtion
    public function profile(){
        // $profile = \DB::table('users')->where('email', 'swagasoft@gmail.com');
        $profile =  Auth::user()->name;
        $user_email =  Auth::user()->email;
        $reg_date =  \DB::table('users')->where('email', $user_email)->pluck('created_at');
        return view('pages.profile', compact('profile', 'user_email','reg_date'));
    }

    // pay now function
    public function paynow(){ 
        $user_email =  Auth::user()->email;
        $user_id =  \DB::table('users')->where('email', $user_email)->pluck('id');
        return view('pages.paynow', compact('user_id'));
    }

    // payment function
    public function payment(){
        return view('pages.payment');
    }

    // Handling in comming request from gtpay.
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

    // payment post function
    public function payment_post(){
        $gtpay_tranx_id = $_REQUEST['gtpay_tranx_id'];
        $gtpay_cust_id = $_REQUEST['gtpay_cust_id'];
        $gtpay_tranx_amt = $_REQUEST['gtpay_tranx_amt'];
        $gtpay_tranx_memo = $_REQUEST['gtpay_tranx_memo'];

        $mydata = new Total_trax;
        $mydata->transaction_id = $gtpay_tranx_id;
        $mydata->customer_id =  $gtpay_cust_id;
        $mydata->amount =   $gtpay_tranx_amt;
        $mydata->memo =   $gtpay_tranx_memo;
        $current_user =  Auth::user()->email;
        $mydata->customer_name =  $current_user;
        $mydata->save();
        return view('pages.payment', compact('gtpay_tranx_id','gtpay_cust_id', 'gtpay_tranx_amt', 'gtpay_tranx_id'));
    }

    // transaction function
    // public function transactions(){
    //     //testing total number of transactions 
    //    $total_trax  = App\Transactions::count();
    //     $current_user =  Auth::user()->email;
    //     $tranx = \DB::table('transactions')->where('customer_name', $current_user)->get()->toArray();
    //     return view('pages.transactions',compact('tranx'));
    // }
}
