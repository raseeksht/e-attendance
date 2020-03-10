<!DOCTYPE html>
<html>
<head>
  <title>my records</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <style>
        .fin{
            text-decoration:none;
            
        }
        .table{
          height:90%;
        }

        .spage{
          width: 90%;
          height:400px;
          overflow: auto;
          border:2px solid red;
          margin: auto;
        }
        table{
          width: 60%;
          color: #000;
        }
        .color{
          background-color: green;
          color:white; 
        }
        .color1{
          background-color: red;
          color:white;  
        }
        body{overflow-x: hidden; background-image: url('kali.png');background-size: cover;background-repeat: no-repeat;color: #fff;}
        .main{
          position: absolute;
          width: 90%;
          left:50%;
          top:0px;
          transform: translate(-50%);
        }
    </style>
</head>
<body>


<?php
    $con = mysqli_connect("localhost","root","mysql","raseek");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  //  to present
if (isset($_POST['present'])){
        $date=date("Y/m/d");
        $day=date("l");
        $password=$_POST['pass'];
        $password=md5($password);
        
        $id='NULL';
        $check="SELECT date FROM `info`";
        $sql = "INSERT INTO info (id, date, status,day) VALUES ($id, '$date','present','$day')";
        //check for correct password for entry ;)
        $pass_check="SELECT * FROM pass";
        $pass_res=mysqli_query($con,$pass_check);
        $pass_row=mysqli_fetch_row($pass_res);
        $her=$pass_row[2];
        if ($her==$password){
            
        




        if ($result=mysqli_query($con,$check)){
            while ($row=mysqli_fetch_row($result))
            {
                $checkdate=$row[0];
            }
        }
        if(date("l")=="Saturday"){
          echo "<script>alert('aja ta saanibar .. saturday is holiday')</script>";
            echo "aja ta saanibar .. saturday is holiday";
        }
        elseif ($date==$checkdate){
                    echo "<script>alert('record is already added today come back tomorrow')</script>";
                    echo "record is already added today come back tomorrow";
        }
        else{
            if ($con->query($sql) === TRUE) {
                echo "<script>alert('record added successfully')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }
      }
      else{
        echo "<script>alert('wrong password')</script>";
      }
     



}
    
// to absent
if (isset($_POST['absent'])){
        $date=date("Y/m/d");
        $day=date("l");
        $password=$_POST['pass'];
        $reason=$_POST['reason'];
        $password=md5($password);
        $id='NULL';
        $check="SELECT date FROM `info`";
        $sql = "INSERT INTO info (id, date, status,day,reason) VALUES ($id, '$date', 'absent','$day','$reason')";
        $pass_check="SELECT * FROM pass";
        $pass_res=mysqli_query($con,$pass_check);
        $pass_row=mysqli_fetch_row($pass_res);
        $her=$pass_row[2];
        if ($her==$password){
        
        if ($result=mysqli_query($con,$check)){
            while ($row=mysqli_fetch_row($result))
            {
                $checkdate=$row[0];
            }
        }
        if(date("l")=="Saturday"){
          echo "<script>alert('aja ta saanibar .. saturday is holiday')</script>";
            echo "aja ta saanibar .. saturday is holiday";
        }
        elseif ($date==$checkdate){
          echo "<script>alert('record is already added today come back tomorrow')</script>";
                    echo "record is already added today come back tomorrow";
        }else{
            if ($con->query($sql) === TRUE) {
                echo "<script>alert('record added successfully')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }
      }
      else{
        echo "<script>alert('wrong password bruteforce this pass')</script>";
      }
}
    
    // to analyse report
if (isset($_POST['analyse'])){
  
    $sql="SELECT * FROM info";
    echo "Today is ".date("Y/m/d") .",". date("l");
    echo "<div class='spage text-center'>";

    if ($result=mysqli_query($con,$sql))
      {
      // Fetch one and one row
      ?>
      <div class="table" style="margin:auto;">
      <table border=1 cellspacing=0 class="table" contenteditable="all">
          <tr>
              <th>id</th>
              <th>date</th>
              <th>status</th>
          </tr>
      
      <?php
      $total=0;
      while ($row=mysqli_fetch_row($result))
        {
          
            if ($row[2]=="present"){
            echo "<tr><td>$row[0]</td><td>$row[1] ($row[3])</td><td class='color'>$row[2]</td></tr>";
            }
            else{
              echo "<tr><td>$row[0]</td><td>$row[1] ($row[3])</td><td class='color1'>$row[2]<br> ($row[4])</td></tr>";
            }
            $total+=1;
        }
      // Free result set
      echo "</table></div></div>";
      echo "total class day : ".$total;
      $present="SELECT status from info";
      $present_que=mysqli_query($con,$present);
      $present_day=0;
      $absent_day=0;
      while ($present_result=mysqli_fetch_row($present_que))
        {
            if ($present_result[0]=="present"){
              $present_day+=1;
            }else{
              $absent_day+=1;
            }
            
        }
      echo "<br>total present day : ".$present_day;
      echo "<br>total absent day : ".$absent_day;
      mysqli_free_result($result);
    }
    
   
    
    
}
//update result
if (isset($_POST['update'])){
  $password=$_POST['pass'];
  $password=md5($password);
  $pass_check="SELECT * FROM pass";
  $pass_res=mysqli_query($con,$pass_check);
  $main_pass=mysqli_fetch_row($pass_res);
  $her=$main_pass[2];
  if ($her==$password){
    echo "hello raseek you can now update anything";
    ?>
    <br>
    <p>Modify your records?</p>
    enter date to modify:
    <form action="register.php" method="post">
    <select name="year">
      <option value="2018">2018</option>
      <option value="2019">2019</option>
    </select>
    <select name="month"> 
      <option value="01">01</option>
      <option value="02">02</option>v
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>
    <select name="day"> 
      <option value="01">01</option>
      <option value="02">02</option>v
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
    </select>
    ======>
    <select name="status">
      <option value="present">present</option>
      <option value="absent">absent</option>
    </select><br>
    <input type="submit" name="changeit" value="send">
  </form>

  <?php
  }else{
    echo "<script>alert('wrong password')</script>";
  }
}

//update the records -- root permission
if (isset($_POST['changeit'])){
    $year=$_POST['year'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $date=$year."/".$month."/".$day;
    $status=$_POST['status'];
    echo $date;
    echo "<br>".$status."<br>";
    $sql="SELECT * FROM info where date='$date'";
    $first=mysqli_query($con,$sql);
    $second=mysqli_fetch_row($first);

    
    $update= "UPDATE `info` SET `status` = '$status' where date='$date'";
    $process=mysqli_query($con,$update);
    if ($second!=""){
      if ($process===True){
        echo "<h1>updated</h1>";
      }else{
        echo "<h1>failed due to unknown reason</h1>";
      }
    }else{
      echo "<script>alert('wrong date / date not found')</script>";
    }
    
  }
    ?>

     <center><br>
    <a href='http://rashikshrestha.com.np/register' class='fin'><i class="fas fa-backward"></i>Go back </a>&nbsp;<a href='http://rashikshrestha.com.np/' class='fin'><i class="fas fa-home"></i>Go home </a>
    </center>

</div>
    <script type="text/javascript" src="particles.js"></script>
    <script type="text/javascript" src="app.js"></script>
  
</body>
</html>

    
    
   