
<!DOCTYPE html>


<html lang="en">


   @include('header')  

    <body id="page-top">
<form>
{!! csrf_field() !!}
<input type="hidden" name="token" value="{{ csrf_token() }}">

</form>
        
<ul class="nav nav-tabs">
  <li role="presentation"  ><a href="/manage/">Un-Used</a></li>
  <li role="presentation" class="active"><a href="/manage/used">Used</a></li>
</ul>

<form class="input-group" action="/manage/search" method="POST">
      {!! csrf_field() !!}
      <input type="hidden" name="token" value="{{ csrf_token() }}">
      <input type="hidden" name="used" value="true">
      <input type="text" name="search" class="form-control" placeholder="McGill ID" >
      <span class="input-group-btn">
        <input type="submit"   value="Submit" class="btn btn-primary" type="button">Go!</input>
      </span>
    </form><!-- /input-group -->
      <h2 class="text-center">{{count($data)}} Results</h2>

<ul class="list-group">
  @foreach ($data as $entry)
      <li class="list-group-item" data-id="{{$entry->getObjectId()}}">

        <span class="pull-right pt">
      <button class="btn btn-md toCheck btn-warning">Switch to Un-Used</i>
</button>
      
    </span>


        {{$entry->get("name")}}<br>
        {{$entry->get("studentID")}}
        
      </li>

  @endforeach
  
</ul>

<script src="/js/jquery.js"></script>

<script src="/js/list.js"></script>
<script type="text/javascript">

(function($) {
    "use strict"; // Start of use strict
 $('.toCheck').click(function(e){
     e.preventDefault();
     var objectId = $(this).parent().parent().attr('data-id');
     var token = ($( "input" ).prop("value"));
     $.ajax({
          type: "POST",
          url: "/manage/uncheck",
          datatype: 'json',
    beforeSend: function(request) {
        return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
    },
          data: {"id":objectId,'_token': '{!! csrf_token() !!}'},
          success: function(data) {
      }
        });



     $(this).parent().parent().hide();
    });

})(jQuery);

</script>
</body>

</html>
