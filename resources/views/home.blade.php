
<!DOCTYPE html>
<html lang="en">


   @include('header')  

    <body id="page-top">
   @include('nav')     

        
        <header>
            <div class="header-content">
                <div class="header-content-inner">
                    <h2>McGill Students: </h2>
                    <hr>
                    <h1>Stop OverPaying For Food In MTL</h1>

                    <a href="#about" class="btn btn-primary btn-xl page-scroll mt4">Find Out More</a>
                </div>
            </div>
        </header>

        <section class="bg-primary" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">We've got what you need!</h2>
                        <hr class="light">
                        <p class="text-faded">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>
                        <a href="#" class="btn btn-default btn-xl">Get Started!</a>
                    </div>
                </div>
            </div>
        </section>

       <section class = "pt4 mt4 pb0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Our Current Deals</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
        </section>
        <section id="tf-about" style="padding-top:0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="http://boustan.jtdsolutions.com/wp-content/uploads/sites/29/2014/03/boustan-icon1.png" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <div class="about-text">
                            <div class="section-title">
                                <h4>Boustans</h4>
                                <h2>The Best Late Night Lebinse Food You'll ever Tase</h2>
                                <hr>
                                <div class="clearfix"></div>
                            </div>
                            <p class="intro">We love building and rebuilding brands through our  specific skills. Using colour, fonts, and illustration, we brand companies in a way they will never forget.</p>

                        </div>
                        <div class="inline-headers">
                        <h1 class="green mb0 inline">$20</h1> <h2 class="inline pl1">in credit for $10</h2>
                    </div>
                        <a href="#" id="verify-btn"class="btn btn-primary btn-xl  mt4 verify-btn">Verify Yourself</a>

                         <form action="/sponsor/1show" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="token" value="{{ csrf_token() }}">
                            <input type="hidden" name="sponsor" value="BOUSTAN">

                      <script

                              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                              data-key="pk_test_wCwW29ZsdUIiU0ikzXVsLyZB"
                              data-amount="20000"
                              data-name="Sponsor Shows"
                              data-description="1 Show a Month ($200.00)"
                              data-image="/128x128.png">
                      </script>
                  </form>
</div>
</div>
</div>
</section>


 <section id="deals">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">At Your Service</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                            <h3>Sturdy Templates</h3>
                            <p class="text-muted">Our templates are updated regularly so they don't break.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                            <h3>Ready to Ship</h3>
                            <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                            <h3>Up to Date</h3>
                            <p class="text-muted">We update dependencies to keep things fresh.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                            <h3>Made with Love</h3>
                            <p class="text-muted">You have to make your websites with love these days!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
@include("contact")

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/basicModal.min.js"></script>

<script src="js/creative.js"></script>

</body>

</html>
