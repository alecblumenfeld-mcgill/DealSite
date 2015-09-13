
<!DOCTYPE html>
<html lang="en">


   @include('header')  

    <body id="page-top">
   @include('nav')     

        
        

        <section class="bg-primary" id="about">
            <div class="container">
                <h1>Thank You Kindly!</h1>
            </div>
        </section>

        <section class = "pt2" id="instructions">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-left">
                        <h2 class="section-heading">Whats Next?</h2>
                        <p>Just bring your mcgill id to {{session('data')['retailer']}} by {{session('data')['deadline']}} inorder to redeam your purchase </p>
                    </div>
                </div>
            </div>
        </section>
        <section class = "pt2" id="deals">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                                            <a href="/#deals" class="btn btn-primary btn-xl page-scroll mt4">Find More Deals</a>

                    </div>
                </div>
            </div>
        </section>
        
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Let's Get In Touch!</h2>
                <hr class="primary">
                <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x wow bounceIn"></i>
                <p>123-456-6789</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/creative.js"></script>

</body>

</html>
