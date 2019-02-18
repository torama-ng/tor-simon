@extends('layouts.app')
@section('content')
  @php
      $gtpay_cust_name = $_POST["gtpay_cust_name"];
$gtpay_mert_id = "17";
$gtpay_cust_id = $_POST["gtpay_cust_id"];
//$gtpay_tranx_noti_url = "";
$gtpay_tranx_id = $_POST["gtpay_tranx_id"];
$hashkey = trim("D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F");
$gtpay_echo_data = "we are testing payment";
$gtpay_gway_name = "";
$gtpay_tranx_curr = "566";
$gtpay_tranx_amt = $_POST["gtpay_tranx_amt"]."00";
$gtpay_tranx_memo = $_POST["gtpay_tranx_memo"];
//$hundred ="00";
$gtpay_tranx_noti_url = "http://localhost:8000/request";

//$hashed = $gtpay_mert_id.$gtpay_tranx_id.$gtpay_tranx_amt.$gtpay_tranx_curr.$gtpay_cust_id.$hashkey;
$hashed = $gtpay_mert_id . $gtpay_tranx_id . $gtpay_tranx_amt . $gtpay_tranx_curr . $gtpay_cust_id . $gtpay_tranx_noti_url . $hashkey;
$gtpay_hash = hash('sha512', $hashed);
  @endphp



                  <td colspan="3">
                                <input type="hidden" name="gtpay_gway_name" value="<?php echo $gtpay_gway_name; ?>" />
                                   </td>
                            </tr>

                            <tr height="25px">
                                <td>&nbsp;</td>
                                <td></td>
                                <td colspan="3" style="color: #110077">
                                <input type="hidden" name="gtpay_hash" value="<?php echo $gtpay_hash; ?>" />
                                   </td>
               <input type="hidden" name="gtpay_tranx_noti_url" value="<?php echo $gtpay_tranx_noti_url;?>"/>




               


  
        
    <form class="payment" name="submit2gtpay_form" action="https://ibank.gtbank.com/GTPay/Tranx.aspx" target="_self" method="post">
        @csrf
        <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                  <div class="row display-tr">
                    <h3 class="panel-title display-td">Torama Pay</h3>         
                    <img class="img-responsive pull-right" src="{{ asset('images/paylogo.png') }}" alt="Interswitch"/>
                  </div>           
                          <p>Torama online payment interface.</p>
                </div>
              </div>


        <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="71E128D2" />
        <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="0jpRXa0nWOikF+p5Rq1VeUSuuzEqiajfNC2aYKPDlL6C4I3QFDHMvi4y8gPvMEXogipRVDyx6z2USgOBJ1GHC5JKKqQNFXTz0/KR41yOIOqUAWNH06aU4aaCqsiHN35kgT5SbJm3Xqi1cjsEddeXTfrCli5aezulnMLGWvJgG/HaralUcJ72OxBy5LmdEgNM+CNuJhtMr3KIQB4c+QYA59UXjziXDJpCtEK4a+anO0u+p9hyjp4Mhv88QnlJeEWlqIXz+Yd2+FIPuIZ7lTO3jmowaRaeLff8azpx8uTg88lOuxdN4QJrb7bDAUHkLYPE" />
        
        

                            <tr height="40px">
                                <td>&nbsp;</td>
                                <td colspan="3"></td>
                            </tr>
                            <tr height="40px">
                                <td>&nbsp;</td>
                                <td><font color="red"> </font></td>
                                <td colspan="3" style="color: #110077">
                                <input readOnly type="hidden" name="gtpay_mert_id" value="<?php echo $gtpay_mert_id; ?>" /></td>
                            </tr>
                            <tr height="25px">
                                <td>&nbsp;</td>
                                <td></td>
                                <td colspan="3" style="color: #110077">
                                <input  readonly type="hidden" name="gtpay_tranx_id" value="<?php echo $gtpay_tranx_id; ?>" /></td>
                            </tr>
                            <tr height="25px">
                                <td>&nbsp;</td>
                                <td></td>
                                <td colspan="3" style="color: #110077">
                                <input readonly="YES" type="hidden" name="gtpay_tranx_amt" value="<?php echo $gtpay_tranx_amt; ?>" />
                                </td>
                              



                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td colspan="" style="color: #110077">
                                <input type="hidden" name="gtpay_tranx_curr" value="<?php echo $gtpay_tranx_curr; ?>" />
                                    </td>
                            </tr>
                            <tr height="25px">
                                <td>&nbsp;</td>
                                <td></td>
                                <td colspan="3" style="color: #110077">
                                <input readonly type="hidden" name="gtpay_cust_id" value="<?php echo $gtpay_cust_id; ?>" />
                                </td>
                            </tr>
                              <tr height="25px">
                                <td>&nbsp;</td>
                                <td></td>
                                <td colspan="3" style="color: #110077">
                                <input readonly="YES" type="hidden" name="gtpay_cust_name" value="<?php echo $gtpay_cust_name; ?>" />

                                  </td>
                            </tr>
                            <tr height="25px">
                                <td>&nbsp;</td>
                                <td></td>
                                <td colspan="3" style="color: #110077">
                                <input readonly="YES" type="hidden" name="gtpay_tranx_memo" value="<?php echo $gtpay_tranx_memo; ?>" />
                                   </td>
                            </tr>
                            <tr height="25px">
                                <td>&nbsp;</td>
                                <td></td>
                                <td colspan="3" style="color: #110077">
                                <input type="hidden" name="gtpay_tranx_noti_url" value="<?php echo $gtpay_tranx_noti_url; ?>" />
                                  </td>
                                  </tr>

                                   <tr height="25px">
                                <td>&nbsp;</td>
                                <td></td>
                                <td colspan="3" style="color: #110077">
                                <input type="hidden" name="gtpay_hash" value="<?php echo $gtpay_hash; ?>" />
                                   </td>
                            </tr>
                            
                    <div class="list-group">
                            <h6 class="list-group-item"> Transaction id:  {{$gtpay_tranx_id}} </h6>
                            <h6 class="list-group-item"> Amount: # {{$gtpay_tranx_amt = $_POST["gtpay_tranx_amt"]}}</h6>
                            <h6 class="list-group-item">Customer id: {{$gtpay_cust_id}}</h6>
                            <h6 class="list-group-item"> Customer name: {{$gtpay_cust_name}}</h6> 
                        </div>
                            <button class="blueButton" style="float:center;" type="submit">Confirm payment</button>
                            <br><br>                      
    </form>
<
</div>
                
            

@endsection
