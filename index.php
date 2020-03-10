<?php

  
?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">


    <style type="text/css">
    	.toop{
    		position: absolute;
    		top:50%;
    		left:50%;
    		transform: translate(-50%,-50%);
    	}
    	.ip{
    		background: #0ff;
    		border: 2px solid red;
    		padding: 10px 20px;
    		border-radius: 10px;
    	}
        body{overflow-x: hidden; background-image: url('kali.png');background-size: cover;background-repeat: no-repeat;overflow: hidden;}
        input{border:2px solid #f0f;}
        .follow{border:2px solid red; background-color: #0ff;}
    </style>
    <title>Register</title>
  </head>
  <body id="particles-js">

      <div style="margin:10px auto;text-align:center;">
    <h1 style="margin:10px auto;color:#fff;position: absolute;left:50%;top:10px;transform: translate(-50%,-50%);border:2px solid red;">Enter your records here</h1></div>
    <div class="admin">
        <form action="register.php" method="post">
            <span onclick="show33()" class="ip" style="position: absolute;left:50%;top:30px;transform: translate(-50%,50px);">update</span>



         





            <div id="update" style="display: none;position: absolute;top:30%;left:38%;" class="animated bounceInRight">
            <input type="password" name="pass" placeholder="password" required>
            <input type="submit" name="update" value="update">
        </form>
    </div>
    <div class="container text-center toop">
        <form method='post' action='register.php'>
            <span onclick="show()" class="ip">present</span>
            <span onclick="show1()" class="ip">absent</span>
	        <input type="submit" value="Analyse" name="analyse" class="ip">
            
        </form>
            <form method="post" action="register.php">
	        <div id="present" class="present" style="display:none;margin-top: 15px">
	                <input type="password" placeholder="password" name="pass">
	                <input type="submit" value="present" name="present" class="follow">
            </div>
            </form>
            <form method="post" action="register.php">
            <div id="absent" style="display:none;margin-top: 15px" class="absent">
                    <input type="text" placeholder="reason" name="reason">
	                <input type="password" placeholder="password" name="pass">
	                <input type="submit" value="absent" name="absent" class="follow">
            </div>
        </form>
    </div>
    
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script type="text/javascript" src="particles.js"></script>
    <script type="text/javascript" src="app.js"></script>
    
    <script type="text/javascript">
    	var a=document.getElementById('present');
    	var b=document.getElementById('absent');
        var c=document.getElementById('update');
    	function show(){
    		if (a.style.display=='none'){
    			a.style.display='block';
    			b.style.display='none';
                $(".present").addClass("animated lightSpeedIn");
    		}else{
    			a.style.display='none';
    		}
    		
    	}
    	function show1(){
    		if (b.style.display=='none'){
    			b.style.display='block';
    			a.style.display='none';

                $(".absent").addClass("animated lightSpeedIn");
    		}else{
    			b.style.display='none';
    		}
    	}
        function show33(){
            if (c.style.display=='none'){
                c.style.display='block';
            }else{
                c.style.display='none';
            }
        }
    </script>

  </body>
</html>