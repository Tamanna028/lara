<!DOCTYPE html>
<html>
<head>
	<title>Php Ajax Form Validation Example</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<script>
function ajaxnew(feild){
	
	var nvalue = $("#"+feild).val();
     

	 var postForm = { //Fetch form data
            [feild]    : nvalue //Store name fields value
        };
	//var ht = "";
	 $.ajax({
            type: "POST",
            url: "processajax.php",
            dataType: "json",
            data: postForm,
            success : function(data){
                if (data.fieldtype == "email"){
                    $(".email-display-error").html("<span>"+data.msgemail+"</span>");
					$(".email-display-error").css("display","block");
					
                } 
				else if(data.fieldtype == "name") {
                    $(".name-display-error").html("<span>"+data.msgname+"</span>");
                    $(".name-display-error").css("display","block");
					
                }
				
            }
        });


}
</script>
<body>


<div class="container">
  <h1>Php Ajax Form Validation Example</h1>
  <form>
  <div class="testing"></div>
    <div class="alert alert-danger display-error" style="display: none">
    </div>
    <div class="form-group">
      <div class="controls">
        <input type="text" id="name" name="name" onkeyup="ajaxnew('name')" class="form-control" placeholder="Name">
      <div class="alert alert-danger name-display-error" style="display: none">
	  </div>
    </div>
    <div class="form-group">
      <div class="controls">
        <input type="email" name="email" class="email form-control" onkeyup="ajaxnew('email')" id="email" placeholder="Email" >
      <div class="alert alert-danger email-display-error" style="display: none">
	  </div>
    </div>
    <div class="form-group">
      <div class="controls">
        <input type="text" id="msg_subject" class="form-control" placeholder="Subject" >
      </div>
    </div>
    <div class="form-group">
      <div class="controls">
        <textarea id="message" rows="7" placeholder="Massage" class="form-control"></textarea>
      </div>  
    </div>
    <input type="submit" id="submit" value="submit" class="btn btn-success"><i class="fa fa-check"></i> Send Message</button>
  </form>
</div>


</body>


<script type="text/javascript">
  $(document).ready(function() {


      $('form').submit(function(e){
        e.preventDefault();


       var name = $("#name").val();
        var email = $("#email").val();
      //  var msg_subject = $("#msg_subject").val();
      //  var message = $("#message").val();
       var postForm = { //Fetch form data
            email:email,name:name
        };
		if(postForm.email ==""){
			
		}
       var ht = "";
        $.ajax({
            type: "POST",
            url: "processajax.php",
            dataType: "json",
            data: $('form').serialize(),
            success : function(data){
                if (data.success == true){
                    $(".display-error").html("<ul><li>success</li></ul>");
					$(".display-error").css("display","block");
                } else {
                    $(".name-display-error").html("<span>"+data.msgname+"</span>");
					$(".email-display-error").html("<span>"+data.msgemail+"</span>");
                    
					$(".name-display-error").css("display","block");
					$(".email-display-error").css("display","block");
                }
            }
        });


      });
  });
</script>
</html>