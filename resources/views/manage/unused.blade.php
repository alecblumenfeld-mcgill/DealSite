
<!DOCTYPE html>


<html lang="en">


   @include('header')  

    <body id="page-top">
<form>
{!! csrf_field() !!}
<input type="hidden" name="token" value="{{ csrf_token() }}">

</form>
        
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Un-Used</a></li>
  <li role="presentation"><a href="#">Used</a></li>
</ul>
<ul class="list-group">
  @foreach ($data as $entry)
      <li class="list-group-item" data-id="{{$entry->getObjectId()}}">

        <span class="pull-right pt">
      <button class="btn btn-lg toCheck btn-primary"><i class="fa fa-check white"></i>
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
     alert($(this).parent().parent().attr('data-id'));
     var objectId = $(this).parent().parent().attr('data-id');
     var token = ($( "input" ).prop("value"));

    



     $.ajax({
          type: "POST",
          url: "/manage/check",
          datatype: 'json',
    beforeSend: function(request) {
        return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
    },
          data: {"id":objectId,'_token': '{!! csrf_token() !!}'},
          success: function(data) {
            alert(data);
      }
        });



     $(this).parent().parent().hide();
    });

})(jQuery);

</script>
</body>

</html>
