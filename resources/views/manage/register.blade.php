
<!DOCTYPE html>
<html lang="en">


   @include('header')  

    <body id="page-top">
   @include('nav')     

         
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Register</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="/manage/register" method="POST" >
            <div class="form-group">
              {!! csrf_field() !!}
              <input type="hidden" name="token" value="{{ csrf_token() }}">


              <input type="text"  name="email" class="form-control input-lg" placeholder="Email">
            </div>

             <div class="form-group">
              <input type="text"  name="sponsor" class="form-control input-lg" placeholder="sponsor">
            </div>

            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password"  name="masterPassword" class="form-control input-lg" placeholder="masterPassword">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
            </div>

          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
          </div>    
      </div>
  </div>
  </div>
</div>
        

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


</body>

</html>
