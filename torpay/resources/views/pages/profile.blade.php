@extends('layouts.app')

@section('content')
 

    <div class="container">
    
            <ul class="nav nav-pills nav-justified">
              <li class="nav-item  ">
                <a class="nav-link active" href="/trax">My transactions</a>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link active " href="/paynow">pay now</a>
              </li>
              <li class="nav-item  ">
                <a class="nav-link active " href="/dash">Dashboard</a>
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
 
<div class="container">
	<div class="row">      
       <div class="col-md-7 ">
<div class="panel panel-default">
  <div class="panel-heading">  <h4 >My Profile</h4></div>
   <div class="panel-body">    
    <div class="box box-info">
              <br>
                <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"> {{$profile}} </h4></span>
                     
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
<div class="col-sm-5 col-xs-6 title " >Date Of Joining:</div><div class="col-sm-7">{{$reg_date}} </div>
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

    </div>
</div>  
   
       
   </div>
</div>




         

        @endSection