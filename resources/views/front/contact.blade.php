@extends('front.layouts.master')
@section('content')
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form id="contactForm"  action="{{route('contact')}}" method="post" >
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <label for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text" placeholder="Your Name..... *"/>
                        <div class="invalid-feedback" ></div>
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <label for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" placeholder="Your Email *" />
                           <div class="invalid-feedback"></div>
                           @error('email')
                           <div class="invalid-feedback">{{$message}}</div>
                           @enderror
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"  type="tel" placeholder="Your Phone *"  />
                        <div class="invalid-feedback"></div>
                        @error('phone')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control @error('message')
                        is-invalid @enderror" id="message" name="message" placeholder="Your Message *"></textarea>
                        <div class="invalid-feedback"> </div>
                        @error('phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                        @enderror
                    </div>
                </div>
            </div>
           
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">Send Message</button></div>
        </form>
    </div>
</section>

@endsection
