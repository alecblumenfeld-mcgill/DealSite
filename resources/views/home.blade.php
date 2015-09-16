
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
                <h2 class="section-heading">We Got Whatcha Need!</h2>
                <hr class="light">
                <p class="text-faded">We scourer the neighborhood around McGill hunting for great deals for other students. We handle your payment and give the merchants easy means to verify your purchase. It really is the best and easiest way to save as a student at McGill. </p>
                <a href="#" class="btn btn-default btn-xl">Get Started!</a>
            </div>
        </div>
    </div>
</section>

<section class = "pt4 mt4 pb0" id="deals">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Our Current Deals</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
</section>


@include('sponsors.boustan')



@include('values')


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

<script src="js/home.js"></script>

</body>

</html>
