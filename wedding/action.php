<?php
   $con=mysqli_connect('localhost','root','','wedding');
   session_start();

   /*-----admin login-----*/
  if (isset($_POST['admin'])) {
  	$name=$_POST['name'];
  	$psw=$_POST['psw'];
  	$sql="SELECT *  FROM admin WHERE name='$name'AND psw='$psw'";
  	$run=mysqli_query($con,$sql);
  	if(mysqli_num_rows($run)==1){
       $_SESSION['name']=$name;
       header('location:../dasboard.php');
  	}
  }
  /*--------user registration------*/
  if (isset($_POST['signup'])) {
  	$name=$_POST['name'];
  	$uname=$_POST['uname'];
  	$email=$_POST['email'];
  	$pno=$_POST['pno'];
  	$add=$_POST['add'];
  	$psw=$_POST['psw'];
  	$repsw=$_POST['repsw'];
  	if ($psw==$repsw) {
  	   $sql="SELECT * FROM u_info WHERE uname='$uname'";
  	   $run=mysqli_query($con,$sql);
  	   if(mysqli_num_rows($run)>0){
         echo "<h2>USERNAME ALREADY EXIST PLEASE ENTER VALID USERNAME</h2>";
     	}else{
     		$sql="INSERT INTO `u_info` (`uid`, `name`, `uname`, `email`, `pno`, `adds`, `psw`)
     		 VALUES (NULL, '$name', '$uname', '$email', '$pno', '$add', '$psw')";
     	    $run=mysqli_query($con,$sql);
     	    if ($run) {
     	    	$_SESSION['uid']=mysqli_insert_id($con);
     	    	$_SESSION['uname']=$uname;
            $_SESSION['urname']=$name;
     	    	header('location:login.php');
     	    }
     	}	
  	}else{
  		 echo "<h2>Password not matched</h2>";
  	}
  }
  /*--------------user login------*/
  if (isset($_POST['login'])) {
  	$name=$_POST['name'];
  	$psw=$_POST['psw'];
  	$sql="SELECT *  FROM u_info WHERE uname='$name'AND psw='$psw'";
  	$run=mysqli_query($con,$sql);
  	$row=mysqli_fetch_array($run);
  	if(mysqli_num_rows($run)==1){
       $_SESSION['uname']=$name;
       $_SESSION['uid']=$row['uid'];
       $_SESSION['urname']=$row['name'];
       header('location:../profile.php');
  	}
  }
  /*------------------wedding registration-------*/
  if (isset($_POST['submit'])) {
  	 $name=$_POST['name'];
  	 $dname=$_POST['dname'];
  	 $dlname=$_POST['dlname'];
  	 $date=$_POST['date'];
  	 $pno=$_POST['pno'];
  	 $sql="SELECT *  FROM registration WHERE name='$name'AND dlname='$dlname'AND dname='$dname'";
  	 $run=mysqli_query($con,$sql);
  	 if (mysqli_num_rows($run)>0) {
  	 	 echo "<h2> Already registered please check dashboard</h2>";
  	 }else{
  	 	$sql="INSERT INTO `registration` (`reg_id`, `name`, `dname`, `dlname`, `wdate`, `pno`, `vid`, `mid`, `cid`, `did`, `tid`, `pid`)
  	 	 VALUES (NULL, '$name', '$dname', '$dlname', '$date', '$pno', '', '', '', '', '', '')";
  	 	 $run=mysqli_query($con,$sql);
  	 	 if ($run) {
  	 	 	header('location:../profile.php');
  	 	 }
  	 }

  }
  /*---------------------service addition--------*/
  if (isset($_POST['venue'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM venue WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `venue` (`vid`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }
  if (isset($_POST['music'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM music WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `music` (`mid`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }
  if (isset($_POST['dect'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM decoration WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `decoration` (`did`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }
  if (isset($_POST['cat'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM catering WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `catering` (`cid`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }
  if (isset($_POST['theme'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM theme WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `theme` (`tid`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }
  if (isset($_POST['photo'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM photoshop WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `photoshop` (`pid`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }
  if (isset($_POST['delete'])) {
    $rid=$_POST['rid'];
    $sql="DELETE FROM registration WHERE reg_id='$rid'";
     $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Cancled registration";
         }

   }
   /*=================== service selection----------*/
   
   if (isset($_POST['add1'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET vid='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Venue Fixed for Wedding";
         }
   }
   if (isset($_POST['add2'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET cid='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Catering Fixed for Wedding";
         }
   }
  if (isset($_POST['add3'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET mid='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Music Fixed for Wedding";
         }
   }
  if (isset($_POST['add4'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET did='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Decoration Fixed for Wedding";
         }
   }
    
  if (isset($_POST['add5'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET tid='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Theme Fixed for Wedding";
         }
   }
   if (isset($_POST['add6'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET pid='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "photoshop Fixed for Wedding";
         }
   }
   /*--------------------searching operation----------------------*/

if (isset($_POST['search'])) {
   $bid=$_POST['bid'];
   $sid=$_POST['sid'];
   $date=$_POST['date'];

   switch ($sid) {
     case 'cid':
                  $sql="SELECT * FROM registration WHERE wdate='$date' AND cid='$bid' ";
                  $run=mysqli_query($con,$sql);
                if(mysqli_num_rows($run)==0){
                    echo "<h2 class='text-center'>Not found </h2>";
                 }else{
                  $sql="SELECT * FROM catering WHERE cid='$bid'";
                  $run=mysqli_query($con,$sql);
                  $row=mysqli_fetch_array($run);
                    $name=$row['name'];
                    $price=$row['price'];
                    $type="Catering";
                     echo " <div class='row'>
          <div class='col-md-3'>
            <h3 class='text-center text-white'> $type</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$name</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$date</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$price</h3>
          </div>
        </div>";
                 }
       break;
     case 'pid':
              $sql="SELECT * FROM registration WHERE wdate='$date' AND pid='$bid' ";
                  $run=mysqli_query($con,$sql);
                if(mysqli_num_rows($run)==0){
                    echo "<h2 class='text-center'>Not found </h2>";
                 }else{
                  $sql="SELECT * FROM photoshop WHERE pid='$bid'";
                  $run=mysqli_query($con,$sql);
                  $row=mysqli_fetch_array($run);
                    $name=$row['name'];
                    $price=$row['price'];
                    $type="Photoshop";
                     echo " <div class='row'>
          <div class='col-md-3'>
            <h3 class='text-center text-white'> $type</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$name</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$date</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$price</h3>
          </div>
        </div>";
                 }
       break;
     case 'tid':
            $sql="SELECT * FROM registration WHERE wdate='$date' AND tid='$bid' ";
                  $run=mysqli_query($con,$sql);
                if(mysqli_num_rows($run)==0){
                    echo "<h2 class='text-center'>Not found </h2>";
                 }else{
                  $sql="SELECT * FROM theme WHERE tid='$bid'";
                  $run=mysqli_query($con,$sql);
                  $row=mysqli_fetch_array($run);
                    $name=$row['name'];
                    $price=$row['price'];
                    $type="Theme";
                     echo " <div class='row'>
          <div class='col-md-3'>
            <h3 class='text-center text-white'> $type</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$name</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$date</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$price</h3>
          </div>
        </div>";
                 }
       break;
     case 'mid':
               $sql="SELECT * FROM registration WHERE wdate='$date' AND mid='$bid' ";
                  $run=mysqli_query($con,$sql);
                if(mysqli_num_rows($run)==0){
                    echo "<h2 class='text-center'>Not found </h2>";
                 }else{
                  $sql="SELECT * FROM music WHERE mid='$bid'";
                  $run=mysqli_query($con,$sql);
                  $row=mysqli_fetch_array($run);
                    $name=$row['name'];
                    $price=$row['price'];
                    $type="Music";
                     echo " <div class='row'>
          <div class='col-md-3'>
            <h3 class='text-center text-white'> $type</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$name</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$date</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$price</h3>
          </div>
        </div>";
                 }
       break; 
     case 'vid':
               $sql="SELECT * FROM registration WHERE wdate='$date' AND vid='$bid' ";
                  $run=mysqli_query($con,$sql);
                if(mysqli_num_rows($run)==0){
                    echo "<h2 class='text-center'>Not found </h2>";
                 }else{
                  $sql="SELECT * FROM venue WHERE vid='$bid'";
                  $run=mysqli_query($con,$sql);
                  $row=mysqli_fetch_array($run);
                    $name=$row['name'];
                    $price=$row['price'];
                    $type="Venue";
                     echo " <div class='row'>
          <div class='col-md-3'>
            <h3 class='text-center text-white'> $type</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$name</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$date</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$price</h3>
          </div>
        </div>";
                 }
       break; 
     case 'did':
        $sql="SELECT * FROM registration WHERE wdate='$date' AND did='$bid' ";
                  $run=mysqli_query($con,$sql);
                if(mysqli_num_rows($run)==0){
                    echo "<h2 class='text-center'>Not found </h2>";
                 }else{
                  $sql="SELECT * FROM decoration WHERE did='$bid'";
                  $run=mysqli_query($con,$sql);
                  $row=mysqli_fetch_array($run);
                    $name=$row['name'];
                    $price=$row['price'];
                    $type="Decoration";
                     echo " <div class='row'>
          <div class='col-md-3'>
            <h3 class='text-center text-white'> $type</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$name</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$date</h3>
          </div>
          <div class='col-md-3'>
            <h3 class='text-center text-white'>$price</h3>
          </div>
        </div>";
                 }
       break; 

     
    
   }
   }   

?>