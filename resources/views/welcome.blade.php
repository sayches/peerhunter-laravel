@extends('layouts.site')
@section('content')
    <main>
        <div class="slider-area position-relative">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('assets/images/slide.jpg')}}" alt="slide1">
                        <div class="carousel-caption">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay="0.1s" class=""
                                      style="animation-delay: 0.1s;">Our Mission</span>
                                <h1 data-animation="fadeInLeft" data-delay="0.4s" class=""
                                    style="animation-delay: 0.4s;">An
                                    innovative holistic health and fitness lifestyle program that aims to educate,
                                    motivate
                                    and inspire your employees commitment to an optimized life!</h1>
                                <a href="" class="btn view-btn btn-default animated fadeInLeft companyInfoBtn"
                                   data-animation="fadeInLeft"
                                   data-delay="0.8s" tabindex="0" style="animation-delay: 0.8s;" data-toggle="modal"
                                >Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/images/bg.jpg')}}" alt="slide1">
                        <div class="carousel-caption">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay="0.1s" class=""
                                      style="animation-delay: 0.1s;">Corporate Wellness</span>
                                <h1 data-animation="fadeInLeft" data-delay="0.4s" class=""
                                    style="animation-delay: 0.4s;">
                                    Our program is to condition the corporate athlete to thrive in the most challenging
                                    circumstances, becoming stronger, healthier and more aware</h1>
                                <a href="" class="btn view-btn btn-default animated fadeInLeft companyInfoBtn"
                                   data-animation="fadeInLeft"
                                   data-delay="0.8s" tabindex="0" style="animation-delay: 0.8s;" data-toggle="modal">Let
                                    Us Help</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/images/bg2.jpg')}}" alt="slide1">
                        <div class="carousel-caption">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay="0.1s" class=""
                                      style="animation-delay: 0.1s;">Thriving Environment</span>
                                <h1 data-animation="fadeInLeft" data-delay="0.4s" class=""
                                    style="animation-delay: 0.4s;">
                                    Studies have shown that 7 out of 10 employees would participate in a wellness
                                    program if
                                    it were offered.</h1>
                                <a href="" class="btn view-btn btn-default animated fadeInLeft companyInfoBtn"
                                   data-animation="fadeInLeft">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" data-target="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" data-target="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>

        <section class="about-area second-section section-padding30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img ">
                            <img src="{{asset('assets/images/about-health.jpg')}}" alt="about-us">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-caption">
                            <div class="section-tittle section-tittle3 mb-35">
                                <span>It’s time to put your BodyF1RST!</span>
                                <h2>If health and wellness are important to you...then there has never been a better
                                    time to
                                    put your BodyF1RST!</h2>
                            </div>
                            <p class="pera-top">The BodyF1RST Core 4 Optimization Program is an innovative holistic
                                health
                                and wellness program designed for everyone and tailored to you.</p>
                            <p class="mb-45">No matter your goals or current level of fitness, BodyF1RST is specifically
                                designed to balance your holistic wellbeing while maintaining motivation and minimizing
                                burnout.</p>
                            <a href="" class="btn view-btn btn-default companyInfoBtn" data-delay="0.8s" tabindex="0"
                               data-toggle="modal">More info</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="gallery-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="principle-head">BodyF1RST is more than a fitness regimen. It is the total
                            self-optimization of mind, body and soul. Focusing on the Core 4 Principles…</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="gallery-area">
            <div class="container-fluid p-0 fix">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box snake mb-30">
                            <div class="gallery-img big-img"
                                 style="background-image: url({{asset('assets/images/gallerybg2.jpg')}});"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="box snake mb-30">
                                    <div class="gallery-img small-img"
                                         style="background-image: url({{asset('assets/images/spirit.png')}});"></div>
                                    <div class="overlay">
                                        <div class="overlay-content">
                                            <h3>Spirit</h3>
                                            <p>Your Spiritual element tends to be most...</p>
                                            <a href="https://dev.bodyf1rst.com/core-principles"
                                               class="btn view-btn mt-2">More
                                                info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="box snake mb-30">
                                    <div class="gallery-img small-img"
                                         style="background-image: url({{asset('assets/images/mindset.png')}});"></div>
                                    <div class="overlay">
                                        <div class="overlay-content">
                                            <h3>Mindset</h3>
                                            <p>Mindset is your general attitude and the...</p>
                                            <a href="https://dev.bodyf1rst.com/core-principles"
                                               class="btn view-btn mt-2">More
                                                info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="box snake mb-30">
                                    <div class="gallery-img small-img"
                                         style="background-image: url({{asset('assets/images/nutrition-2.jpg')}});"></div>
                                    <div class="overlay">
                                        <div class="overlay-content">
                                            <h3>Nutrition</h3>
                                            <p>Nutrition is the key component to your...</p>
                                            <a href="https://dev.bodyf1rst.com/core-principles"
                                               class="btn view-btn mt-2">More
                                                info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="box snake mb-30">
                                    <div class="gallery-img small-img"
                                         style="background-image: url({{asset('assets/images/exercise2.png')}});"></div>
                                    <div class="overlay">
                                        <div class="overlay-content">

                                            <h3>Exercise</h3>
                                            <p>Exercise element consists of 4 Core..</p>
                                            <a href="https://dev.bodyf1rst.com/core-principles"
                                               class="btn view-btn mt-2">More
                                                info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="about-area2 testimonial-area section-padding30 fix">
            <div class="container">
                <div id="demo11" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators client-indicators">
                        <li data-target="#demo11" data-slide-to="0" class="active"></li>
                        <li data-target="#demo11" data-slide-to="1"></li>
                        <li data-target="#demo11" data-slide-to="2"></li>
                        <li data-target="#demo11" data-slide-to="3"></li>
                        <li data-target="#demo11" data-slide-to="4"></li>
                        <li data-target="#demo11" data-slide-to="5"></li>
                    </ul>

                    <!-- The slideshow -->
                         <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="about-img2">
                                            <img src="{{asset('assets/images/client-feedback.jpg')}}" alt="about2" class="clientslider-img">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <div class="about-caption">
                                            <div class="section-tittle mb-25">
                                                <span>Client Feedback</span>
                                                    <h2 class="client-title">
                                                        <img class="img-fluid quotes" src="https://dev.bodyf1rst.com/assets/images/clientquote.png">
                                                            I have learned more about my body and nutrition than I have ever before. I am continually putting tools in my toolbelt to be successful in the future. 
                                                            Working with BodyF1RST has reaffirmed my need to take care of myself, and above everything else I am more than just a number. The biggest lesson I have learned throughout my time with BodyF1RST is that fitness is a journey, not a destination.
                                                        <img class="img-fluid quotes-down" src="https://dev.bodyf1rst.com/assets/images/downquote.png"> 
                                                    </h2>
                                            </div>
                                            <div class="h1-testimonial-active">
                                                <div class="single-testimonial">
                                                    <div class="testimonial-caption">
                                                        <div class="rattiong-caption">
                                                            <span>Crystalee</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="carousel-item">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                            <div class="about-img2">
                                                <img src="{{asset('assets/images/feedback1.jpg')}}" alt="about2" class="clientslider-img">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                            <div class="about-caption">
                                                 <div class="section-tittle mb-25">
                                                    <span>Client Feedback</span>
                                                    <h2 class="client-title">
                                                        <img class="img-fluid quotes" src="https://dev.bodyf1rst.com/assets/images/clientquote.png">
                                                            My greatest achievement with BodyF1RST is feeling better and getting stronger and continuing to improve ME!
                                                        <img class="img-fluid quotes-down" src="https://dev.bodyf1rst.com/assets/images/downquote.png"> 
                                                    </h2>
                                                </div>
                                                <div class="h1-testimonial-active">
                                                    <div class="single-testimonial">
                                                        <div class="testimonial-caption">
                                                            <div class="rattiong-caption">
                                                                <span>Shelley</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="carousel-item">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                            <div class="about-img2">
                                                <img src="{{asset('assets/images/feedback2.jpg')}}" alt="about2" class="clientslider-img">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                            <div class="about-caption">
                                                <div class="section-tittle mb-25">
                                                    <span>Client Feedback</span>
                                                    <h2 class="client-title">
                                                        <img class="img-fluid quotes" src="https://dev.bodyf1rst.com/assets/images/clientquote.png">
                                                           BodyF1RST has given me the tools to develop a growth mindset on top of losing over 10% body fat!
                                                        <img class="img-fluid quotes-down" src="https://dev.bodyf1rst.com/assets/images/downquote.png"> 
                                                    </h2>
                                                </div>
                                                <div class="h1-testimonial-active">
                                                    <div class="single-testimonial">
                                                        <div class="testimonial-caption">
                                                            <div class="rattiong-caption">
                                                                <span>Mark</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="carousel-item">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                            <div class="about-img2">
                                                <img src="{{asset('assets/images/feedback3.jpg')}}" alt="about2" class="clientslider-img">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                            <div class="about-caption">
                                                <div class="section-tittle mb-25">
                                                    <span>Client Feedback</span>
                                                    <h2 class="client-title">
                                                        <img class="img-fluid quotes" src="https://dev.bodyf1rst.com/assets/images/clientquote.png">
                                                           Need to get his testimony…
                                                        <img class="img-fluid quotes-down" src="https://dev.bodyf1rst.com/assets/images/downquote.png"> 
                                                    </h2>
                                                </div>
                                                <div class="h1-testimonial-active">
                                                    <div class="single-testimonial">
                                                        <div class="testimonial-caption">
                                                            <div class="rattiong-caption">
                                                                <span>Garrett</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="carousel-item">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                            <div class="about-img2">
                                                <img src="{{asset('assets/images/feedback4.jpg')}}" alt="about2" class="clientslider-img">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                            <div class="about-caption">
                                               <div class="section-tittle mb-25">
                                                    <span>Client Feedback</span>
                                                    <h2 class="client-title">
                                                        <img class="img-fluid quotes" src="https://dev.bodyf1rst.com/assets/images/clientquote.png">
                                                           Because of the training that  BodyF1RST has provided I have made some major changes in my body, 
                                                                mind and spirit. I am no longer on blood pressure medication and continue to grow stronger, have increased mobility and endurance.
                                                        <img class="img-fluid quotes-down" src="https://dev.bodyf1rst.com/assets/images/downquote.png"> 
                                                    </h2>
                                                </div>
                                                <div class="h1-testimonial-active">
                                                    <div class="single-testimonial">
                                                        <div class="testimonial-caption">
                                                            <div class="rattiong-caption">
                                                                <span>Seanna</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                             <div class="carousel-item">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                            <div class="about-img2">
                                                <img src="{{asset('assets/images/feedback5.jpg')}}" alt="about2" class="clientslider-img">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                            <div class="about-caption">
                                                <div class="section-tittle mb-25">
                                                    <span>Client Feedback</span>
                                                    <h2 class="client-title">
                                                        <img class="img-fluid quotes" src="https://dev.bodyf1rst.com/assets/images/clientquote.png">
                                                          Bodyf1rst gave me all the necessary tools to change my fitness mindset and plan of action.
                                                                 Through this, I was able to go from 13% body fat to just 6%. This is the best condition I’ve ever been in all thanks to BodyF1RST!
                                                        <img class="img-fluid quotes-down" src="https://dev.bodyf1rst.com/assets/images/downquote.png"> 
                                                    </h2>
                                                </div>
                                                <div class="h1-testimonial-active">
                                                    <div class="single-testimonial">
                                                        <div class="testimonial-caption">
                                                            <div class="rattiong-caption">
                                                                <span>Corey</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                       <!-- Left and right controls
                        <a class="carousel-control-prev precarouselcontrol" data-target="#demo11" data-slide="prev">
                            <i class="fa fa-chevron-left client-indicator"></i>
                        </a>
                        <a class="carousel-control-next precarouselcontrol" data-target="#demo11" data-slide="next">
                            <i class="fa fa-chevron-right client-indicator"></i>
                        </a> -->
                        
	
                </div>
            </div>
            </div>
        </section>

        <section class="services-area pt-80 pb-80 section-bg" style="background:url({{asset('assets/images/bg-core.jpg')}});background-size:cover;">
            <section class="wantToWork-area w-padding">
                <div class="container">
                    <div class="row align-items-end justify-content-between">
                        <div class="col-lg-8 col-md-10 col-sm-10">
                            <div class="section-tittle section-tittle2 pt-4">
                                <span>No matter your goals, there’s truly something for everyone</span>
                                <h2>Take the Core 4 challenge today! Why wait? It’s time to Put Your BodyF1RST!</h2>
                                <a href="" class="btn view-btn companyInfoBtn" data-delay="0.8s" tabindex="0"
                                   data-toggle="modal">GET STARTED</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="wantToWork-area subscribe w-padding section-bg">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="wantToWork-caption text-center">
                            <h3 style="color:black;">SUBSCRIBE</h3>
                            <p>Sign up with your email address to receive news and updates.</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between mt-50 ">
                    <div class="col-xl-8 offset-md-2">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 mb-3">
                                <label for="Subscribe" class="dummy">Subscribe</label>
                                <input type="text" name="Subscribe" class="form-control" placeholder="Subscribe">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <a href="" class="btn subscribe_btn f-left">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection