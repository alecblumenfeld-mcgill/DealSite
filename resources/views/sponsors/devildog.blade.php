
@if (strtotime('now') < strtotime(env('DEVILDOG_DEADLINE')))
    <section id="tf-about" style="padding-top:0px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/img/sponsor-img/devildog.jpg" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h4>DEVILDOG's</h4>
                            <h2>You havent seen hot dogs like this before</h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">We love building and rebuilding brands through our  specific skills. Using colour, fonts, and illustration, we brand companies in a way they will never forget.</p>
                        <p class="intro"><b>Deadline: </b>{{ date('F jS g:i a',strtotime(env('DEVILDOG_DEADLINE')))}}</p>

                    </div>
                    <div class="inline-headers">
                        <h1 class="green mb0 inline">$20</h1> <h2 class="inline pl1">in credit for $10</h2>
                    </div>
                    <br>
                    <form action="/sponsor/purchase" method="POST" class="mt4" >
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="sponsor" value="DEVILDOG">

                        <script

                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_wCwW29ZsdUIiU0ikzXVsLyZB"
                        data-amount="1000"
                        data-email = ""
                        data-name="DEVILDOGs"
                        data-description="$20 of an order for $10"
                        >
                        </script>
                    </form>
                    <a href="#" id="verify-btn"class="btn btn-primary btn-xl  mt4 verify-btn">Verify Yourself</a>
                    <a href="" id="DEVILDOGs-info" class="btn btn-primary btn-xl  ml1 mt4 ">More Info</a>

                    
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    (function($) {
    "use strict";

    $('#DEVILDOGs-info').click(function(e){
        e.preventDefault();
        basicModal.show({
            body: '<p><b>Expiry:</b> June 20th 2016 Limitations: 1 coupon per person. Can not be combined with other promotions.  Not transferable. See the rules. That apply to all deals <br> <b>Taxes:</b> Not included, applicable on the amount paid on mcgilldeals.com.<br>',
            closable: true,
            buttons: {
                action: {
                    title: 'Dismiss',
                    fn: basicModal.close
                }
            }
        })
    })
    })(jQuery);

    </script>
@endif