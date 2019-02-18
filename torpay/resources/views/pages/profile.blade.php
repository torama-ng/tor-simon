@extends('layouts.app')

@section('content')
 

    <div class="container">
    
            <ul class="nav nav-pills nav-justified">
              <li class="nav-item  ">
                <a class="nav-link active" href="/transactions">Transactions</a>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link active " href="/paynow">pay now</a>
              </li>
              <li class="nav-item  ">
                <a class="nav-link active " href="history">History</a>
              </li>
              <li class="nav-item  ">
                <a class="nav-link active " href="/profile">Profile</a>
              </li>
              
            </ul><br>
          
       
         
          
            {{-- @if (count($profile) > 0)

            @foreach ($profile as $item)
            <ul class="list-group">
                <li class="list-group-item">{{$item->name}} </li>
            </ul>
                
            
            @endforeach
                
            @endif
           --}}
          </div>

          {{--  original --}}
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
	
        
        
       <div class="col-md-7 ">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >My Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                
                <input id="profile-image-upload" class="hidden" type="file">
<div style="color:#999;" >click here to change profile image</div>
                <!--Upload Image Js And Css-->
                     </div>
              <br>
                <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"> {{$profile}} </h4></span>
                     
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
{{-- <div class="col-sm-5 col-xs-6 title " >First Name:</div><div class="col-sm-7 col-xs-6 ">Md. Ashiqur</div>
     <div class="clearfix"></div>
<div class="bot-border"></div> --}}



<div class="col-sm-5 col-xs-6 title " >Date Of Joining:</div><div class="col-sm-7">----------</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Email:</div><div class="col-sm-7"> {{$user_email}}</div>


<div class="clearfix"></div>
<div class="bot-border"></div>
<div class="col-sm-5 col-xs-6 title " >Date Of Birth:</div><div class="col-sm-7">------</div>



 <div class="clearfix"></div>
<div class="bot-border"></div>
      <div class="col-sm-5 col-xs-6 title " >Nationality:</div><div class="col-sm-7">----------</div>
      

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Gender:</div><div class="col-sm-7"> ---------</div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script> 
       
       
       
       
       
       
       
       
       
   </div>
</div>




         

        @endSection