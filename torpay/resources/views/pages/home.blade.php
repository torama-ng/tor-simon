@extends('layouts.app')

    
   
@section('content')

  
   
<section class="hero">
        <div class="background-image" style="background-image: url(https://wallpaper-house.com/data/out/7/wallpaper2you_139824.jpg)"></div>
            <div class="hero-content-area">
            <h1 class="text-success">Torama Pay</h1>
                <h3>Modern online  payments for Nigeria </h3>
            <a href="/dash" class="btn bg-success">Get Started</a>
            
            </div>
            
        </section>
       
    <hr> <hr>
    <div class="bg-white"> 
 
    <div class="card-deck">
            <div class=" ">
              <div class="">
                <img src="{{ asset('images/mastercard.png') }}" alt="">
              </div>
            </div>
            <div class=" ">
              <div class="">
                <img src="{{ asset('images/interswitch.png') }}" alt="">
              </div>
            </div>
            <div class="">
              <div class="">
               <img src="{{ asset('images/verve.jfif') }}" alt="">
              </div>
            </div>
            <div class="">
                    <div class="">
                          <img src="{{ asset('images/visa.png') }}" alt="">
                    </div>
                  </div> 
          </div>

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
<img src="{{ asset('images/photo_smile.png') }}" style="width:100%">
<div class="text"><h3 class="text-danger"></h3> </div>
</div>

<div class="mySlides fade">
<img src="  {{ asset('images/shakehands.png') }}" style="width:100%">
<div class="text"> <h3 class="text-danger"> </h3>
  </div>
</div>

<div class="mySlides fade">
<img src="  {{ asset('images/smile2.png') }}" style="width:100%">
<div class="text"> <h3 class="text-danger"></h3></div>
</div>


<!-- Next and previous buttons -->


    <section class="contact">
    <h3 class="title">Join our newsletter</h3>	
    <p>Torama Pay is highly technical and fanatically customer oriented.
   We’re excited to back such people in one of the world’s fastest-growing regions.</p>
    <hr>

    <form method="POST">
        <input type="email" name="email" placeholder="Email">
        <a href="" ><button type="submit"  class="btn bg-primary">Subscribe now</button> </a>
    </form>
</section>
</div>
   
@endsection