      
	<head>
		<title>Login Box</title>

		<script type="text/javascript">
			<!--
			    function toggle_visibility(id) {
			       var e = document.getElementById(id);
			       if(e.style.display == 'block')
			          e.style.display = 'none';
			       else
			          e.style.display = 'block';
			    }
			//-->
		</script>

		<style type="text/css">
			#popupBoxPosition{
				top: 0; left: 0; position: fixed; width: 100%; height: 120%;
				background-color: rgba(0,0,0,0.05); display: none;
			}
			.popupBoxWrapper{
				width: 550px; margin: 50px auto; text-align: center;
			}
			.popupBoxContent{
				background-color: #FFF; padding: 15px;
			}
		</style>

	</head>

	<body>
		  <div class = "container form-signin">
				  <?php
               		$msg = '';
            		if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
						if ($_POST['username'] == 'po' && $_POST['password'] == '0') {
                  		$_SESSION['valid'] = true;
                  		$_SESSION['username'] = 'po';
                  
                  	echo 'You have entered valid use name and password';
               		}else {
                  		$msg = 'Wrong username or password';
               			}
            		}
        		 ?>  
          </div>
		 
         <?
		//<div id="popupBoxPosition">
			//<div class="popupBoxWrapper">
				//<div class="popupBoxContent"> ?>
				  
        		   <div class="container">
					<h3>User Login</h3>
					<form class = "form-signin" role = "form" action = "passwordC.php" method ="post">
            		<input type = "text" name = "username" placeholder = "username" required autofocus> <br>
            		<input type = "password" name = "password" placeholder = "password" required> <br>
            		<button type = "submit" name = "login">Login</button>
         			</form>
					<p>Click <a href="javascript:void(0)" onclick="toggle_visibility('container');">here</a> to close the login window.</p>
				  </div>
				 <?
				//</div>
			//</div>
		//</div> ?>

		<div id="wrapper">

			<p>Click <a href="javascript:void(0)" onclick="toggle_visibility('container');">here</a> to see popup box one.</p>
			
		</div><!-- wrapper end -->

	</body>

</html>