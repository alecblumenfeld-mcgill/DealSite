<section id="tf-about" style="padding-top:0px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/img/sponsor-img/test.jpeg" class="img-responsive">
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
                <br>
                <a href="#" id="verify-btn"class="btn btn-primary btn-xl  mt4 verify-btn">Verify Yourself</a>

                <form action="/sponsor/1show" method="POST" class="mt4" >
                    {!! csrf_field() !!}
                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="sponsor" value="BOUSTAN">

                    <script

                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_wCwW29ZsdUIiU0ikzXVsLyZB"
                    data-amount="1000"
                    data-email = ""
                    data-name="Boustans"
                    data-description="$20 of an order for $10"
                    >
                    </script>
                </form>
            </div>
        </div>
    </div>
</section>