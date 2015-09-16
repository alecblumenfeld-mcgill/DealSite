
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
                        <p>Please check your email for your official receipt for your order. In which you will be given another record of your order number which is:<br>
                         <b>{{$stripeOrderNumber}}</b> <br>
                         All you have to do now is go to {{$sponsorName}} by {{ date('F jS',strtotime($expirationdate))}} and bring your McGill ID to redeem your order.</p> 

                        <p>If you have any problems, feel free to contact us at support@mcgill-deals.com</p>

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
<script src="js/creative.js"></script>

<!-- Analytics -->
@include('analytics')     

</body>

</html>
