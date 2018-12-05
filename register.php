<?php 

 include 'header.php';
?> 

    <script src="js/jquery-3.3.1.min.js" ></script>

    <body style="background:black">

    <div class="jumbotron form" >

        <div class="header" id="register_header">
            <h2>Register</h2>
        </div> 
   
        <form method="post" action="#" class="form" id="registerForm">
   
        <!-- Display validation errors here -->
        
            <label>Username:</label>
            <input class="register_box" id="rb1" type="text" name="username" placeholder="Enter username">
            <br>

        
            <label>Email:</label>
            <input class="register_box" id="rb2" type="text" name="email" placeholder="Enter email" value="">
            <br>

         
            <label>Password:</label>
            <input class="register_box" id="rb3" type="password" name="password_1" placeholder="Enter password">   
            <br>

        
            <label>Confirm Password:</label>
            <input class="register_box" id="rb4" type="password" name="password_2" placeholder="Confirm password">   
            <br>
            <br>
         
            <button type="submit" name="register" class="btn btn-success">Register</button> 
            <!-- <input type="submit" name="register" class="btn btn-primary">-->

            <footer class="footer" id="register_footer">
			    <p>
                    Already a member...?&nbsp;&nbsp;<a href="login.php">Sign in!</a>
                </p>
            </footer>
        
            <div id="msg_box"></div>
    
        </form> 
    </div>

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
                         window.location.replace('index.php?origin=register');
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
