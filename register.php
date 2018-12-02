<?php 

 include 'header.php';
?> 
    <script src="js/jquery-3.3.1.min.js" ></script>

 
		
   <div class="header">
      <h2>Register</h2>
   </div> 
   <form method="post" action="#" class="form" id="registerForm">
   <!-- display validation errors here -->
      <div class="input-group">
         <label>Username</label>
         <input type="text" name="username" placeholder="Enter username">
      </div>
      <div class="input-group">
         <label>Email</label>
         <input type="text" name="email" placeholder="Enter email" value="">
      </div>
      <div class="input-group">
         <label>Password</label>
         <input type="password" name="password_1" placeholder="Enter password">   
      </div>
      <div class="input-group">
         <label>Confirm Password</label>
         <input type="password" name="password_2" placeholder="Confirm password">   
      </div>
      <div class="input-group">
        <button type="submit" name="register" class="btn btn-primary">Register</button> 
        <!-- <input type="submit" name="register" class="btn btn-primary">-->
      </div>
      <p>
         Already a member?<a href="login.php">&nbsp;&nbsp;Sing in</a>
      </p>
      <div id="msg_box"></div>
    </form> 
    

<script>
//var submitButton = $("#registerForm button[type='submit']").attr("disabled", true);
$("#registerForm input").change(function () {
                var valid = true;
                $.each($("#registerForm input"), function (index, value) {
                    if(!$(value).val()){
                        $(this).addClass('error');
                        valid = false;
                    }
                    else{
                        $(this).removeClass('error');
                    }
                });
            });

 

           
$("#registerForm").submit(function(e){
                        
                var formData = {
                'username': $('input[name=username]').val(),
                'email': $('input[name=email]').val(),
                'password_1': $('input[name=password_1]').val(),
                'password_2': $('input[name=password_2]').val()
                };
               $.ajax({
                type:"post",
                data: formData,
                dataType:"json",
                url:"register_check.php"
                //encode: true
                    })
                .done(function(data){
                    if (data['error']){
                         $('#msg_box').text(data['error']);
                    }
                    else if (data['status']){
                         window.location.replace('index.php');
                    }
                    
                })
                .fail(function() {
                  console.log(formData);
                    console.log("fail");
                $('#msg_box').text("ajax fail");
                });
            e.preventDefault();    
            });
            
//}           
</script>
 
   
   
   <script src="js/axios.min.js"></script>
   <script src="js/main.js"></script> 
   	  
</body>

</html>
