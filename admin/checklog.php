<?php session_start(); ?>
<!--check sessions for security-->
<?php 
if(isset($_SESSION['falses'])){
    if($_SESSION['falses'] <= 0){
    header('location:timout.php');
		
    } 
}
?>    <!--    he php code   -->
    <link rel="stylesheet" href="checklog.css" type="text/css" />
    <?php

 //   $date=gmdate("h:i:s d-m-Y");
 //   $log=true;
    /*     functions in my class    */
   
        /*  check check check  */
        $user=htmlspecialchars($_POST['user']);
        $pass=htmlspecialchars($_POST['pass']);
if($_POST['sub_log']){
    if($user ="" || empty($user)){
 echo '<div class="wan"> <p>you must enter a validat username without spcialcharacter ,<b>PLEASE</b> enter a validat username </p>
</div> <a href="login.php">back</a>';
    }
elseif($pass ="" || empty($pass)){
   echo '<div class="wann"><p>you must enter a validat password without spcialcharacter ,<b>PLEASE</b> enter a validat password</p></div>
<a href="login.php">back</a>';

}else{
    $user=htmlspecialchars($_POST['user']);
        $pass=htmlspecialchars($_POST['pass']);
            //check database
        $connect=mysqli_connect("localhost","root","root","admin");
$sql="SELECT * FROM user WHERE name = '".$user."' AND password = '".$pass."'";
$query=mysqli_query($connect,$sql);
	
	/*                     the login is right                              */
        if(mysqli_num_rows($query) == 1){
			echo "<script>
	setTimeout(function(){window.location.href='admin_page.php'},3233)
</script>";

				$user=htmlspecialchars($_POST['user']);
        $pass=htmlspecialchars($_POST['pass']);
				$connect=mysqli_connect("localhost","root","root","admin");
				$of_type=mysqli_query($connect,"SELECT user.type FROM user WHERE name = 'myuser' AND password = 'myuser'");
				$type=mysqli_fetch_array($of_type);
			$type=$type->type;
				if($type = "big admin"){
					echo "big";
				}elseif($type = "small admin"){
					echo 'small';
				}	
				
				
			
			
			$_SESSION['username']="user";
            $_SESSION['password']="pass";
			/*$_SESSION['type']=;*/
			$_SESSION['checklog']="checklog.php";
                echo " <div class='done'><img style='float:RIGHT' src='us-feature-relaible-icon-new.jpg' width='155' heigh='155'><p>done ! ,YOU enter a valid data ;) <h5>we will go to last page</h5></p></div>";
                //$last_update=mysqli_query($connect,"SELECT last_present from user");
                //update_time=mysqli_query($connect,"UPDATE user set last_present ='' ")
                
                }else{
            
            if(isset($_SESSION['falses'])){ 
                $_SESSION['falses'] = $_SESSION['falses'] - 1;
			}else{$_SESSION[ 'falses']=3;}
                
                echo '<div class="wan"><p>sorry you data are not right ,you have '.$_SESSION['falses'].' for try it</p></div>';
                }
        
        }
}else{
	echo "<meta http-equiv='refresh' content='0;login.php'>";
}

?>