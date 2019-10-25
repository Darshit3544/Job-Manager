<?php 
session_start();
require "connect.php";
	$action=$_POST['act'];
	
	if($action=="log")
	{
		$email=$_POST['mail'];
		$pa=$_POST['pas'];
		$tab="select * from login where user_id='$email'";
		$rlt=mysqli_query($con,$tab);
		$num=mysqli_num_rows($rlt);
		if($num==1)
		{
			$re=mysqli_fetch_array($rlt);
			{
				if($re['Password']==md5($pa))
				{
					$tab="select * from details where User_id='$email'";
					$rlt=mysqli_query($con,$tab);
					$re=mysqli_fetch_array($rlt);
					$_SESSION["user_id"] =$email;
					$message = "Welcome ".$re['Name'];
					echo "<script>alert('$message');window.location='home.php';</script>";
				}
  	        	else
  				{
  					$message = "Password Does not Match";
					echo "<script type='text/javascript'>alert('$message');</script>";        		
				}
  			}
  		}
		else
		{
			$message = "User ID Does not Exsists";
			echo "<script type='text/javascript'>alert('$message');</script>";	
		}
	}

	if($action=="comlog")
	{
		$email=$_POST['name'];
		$pa=$_POST['pas'];
		$tab="select * from com_login where name='$email'";
		$rlt=mysqli_query($con,$tab);
		$num=mysqli_num_rows($rlt);
		if($num==1)
		{
			$re=mysqli_fetch_array($rlt);
			{
				if($re['password']==md5($pa))
				{
					$tab="select * from com_login where name='$email'";
					$rlt=mysqli_query($con,$tab);
					$re=mysqli_fetch_array($rlt);
					$_SESSION["user_id"]=$re['id'];
					$message = "Welcome ".$re['name'];
					echo "<script>alert('$message');window.location='com_home.php';</script>";
				}
  	        	else
  				{
  					$message = "Password Does not Match";
					echo "<script type='text/javascript'>alert('$message');</script>";        		
				}
  			}
  		}
		else
		{
			$message = "User ID Does not Exsists";
			echo "<script type='text/javascript'>alert('$message');</script>";	
		}
	}

	if($action=="comsign")
	{
		$email=$_POST['name'];
		$pa=$_POST['pas'];
		$tab="select * from com_login where name='$email'";
		$rlt=mysqli_query($con,$tab);
		$num=mysqli_num_rows($rlt);
		if($num==1)
		{	
			$message = "User Already Exsists Try Another One!!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else
		{
			$tab="insert into com_login (name,password) values ('$email',md5('$pa'))";
			if(mysqli_query($con,$tab))
			{
				$tab1="select * from com_login where name='$email'";
					$rlt=mysqli_query($con,$tab1);
					$re=mysqli_fetch_array($rlt);
					$_SESSION["user_id"]=$re['id'];
				$message = "Welcome ".$email;
				echo "<script type='text/javascript'>alert('$message');window.location='com_home.php';</script>";	
			}
		}
	}

	if($action=="pro")
	{
		$user=$_SESSION["user_id"];
		$tab="select * from details where User_id='$user'";
		$rlt=mysqli_query($con,$tab);
		$re=mysqli_fetch_array($rlt);
		echo $re['Name'];
		
	}

	if($action=="com_pro")
	{
		$user=$_SESSION["user_id"];
		$tab="select * from com_login where id='$user'";
		$rlt=mysqli_query($con,$tab);
		$re=mysqli_fetch_array($rlt);
		echo $re['name'];
		
	}

	if($action=="app_list")
	{
		$user=$_SESSION["user_id"];
		$tab="select * from post where id='$user'";
		$rlt=mysqli_query($con,$tab);
		$str="";
		while($re=mysqli_fetch_array($rlt))
		{
			$str.="<div><table><tr><td>Post Name</td><td>Student Name</td></tr>";
			$id=$re['post_id'];
			$tab1="select * from apply where post_id='$id'";
			$rlt1=mysqli_query($con,$tab1);
			while($re1=mysqli_fetch_array($rlt1))
			{
				$str.="<tr><td>".$re['post']."</td><td>".$re1['User_id']."</td></tr>";
			}
			$str.="</table></div>";
		}
		echo $str;
	}

	if($action=="logout")
	{
		$user=$_SESSION["user_id"];
		if($user=="")
		{
			$message = "Already Logout!!!";
			echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
		}
		else
		{
			session_destroy();
    		session_unset();
			$message = "Logout Succesfull!!!";
			echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
		}	
		
		
	}

	if($action=="upl")
	{
		$img_name = $_SESSION["user_id"];
		$temporary = explode(".", $_FILES["im"]["name"]);
		$file_extension = end($temporary);
		$final_name = $img_name.".".$file_extension; 
		if(move_uploaded_file($_FILES['im']['tmp_name'], "upls/".$final_name))
		{
			$message = "Image Uploaded Succesfully";
			echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
		}
	}

	if($action=="project")
	{
		$name=$_POST['nam'];
		$tech=$_POST['tec'];
		$dec=$_POST['desc'];
		$user=$_SESSION["user_id"];
		$tab="insert into projects values('$user','$name','$tech','$dec')";
		if(mysqli_query($con,$tab))
		{
			$message = "Project Details Added Succesfully";
			echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
		}
	}

	if($action=="ski")
	{
		$ski=$_POST['nam'];
		$user=$_SESSION["user_id"];
		$tab="insert into interests values('$user','$ski')";
		if(mysqli_query($con,$tab))
		{
			$message = "Skills Added Succesfully";
			echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
		}
	}

	if($action=="apply")
	{
		$a=$_POST['num'];
		$c=0;
		$b=$_POST['id'];
		$user=$_SESSION["user_id"];
		$tab="select * from apply where User_id='$user'";
		$rlt=mysqli_query($con,$tab);
		while($re=mysqli_fetch_array($rlt))
		{
			if($a==$re['post_id'])
				$c=1;
		}		
		if($c==0)
		{
			$tab="insert into apply values('$user','$a','$b')";
			if(mysqli_query($con,$tab))
			{
				$message = "Applied Succesfully";
				echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
			}
		}
		else
		{
			$message = "Already Applied";
				echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
		}
	}

	if($action=="com_post")
	{
		$des=$_POST['nam'];
		$po=$_POST['post'];
		$req=$_POST['req'];
		$eli=$_POST['eli'];
		$user=$_SESSION["user_id"];
		$tab="insert into post (id,post,requirement,Eligible,description) values ('$user','$po','$req','$eli','$des')";
		if(mysqli_query($con,$tab))
		{
			$message = "Post Succesfully";
			echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
		}
	}

	if($action=="com_ski")
	{
		$ski=$_POST['nam'];
		$user=$_SESSION["user_id"];
		$tab="select * from com_login where id='$user'";
		$rlt=mysqli_query($con,$tab);
		$re=mysqli_fetch_array($rlt);
		$name=$re['name'];
		$tab="delete from com_detail where name='$name'";
		mysqli_query($con,$tab);
		$tab="insert into com_detail values('$user','$name','$ski')";
		if(mysqli_query($con,$tab))
		{
			$message = "Details Added Succesfully";
			echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
		}
	}

	if($action=="intern")
	{
		$name=$_POST['nam'];
		$tech=$_POST['tim'];
		$dec=$_POST['desc'];
		$user=$_SESSION["user_id"];
		$tab="insert into internship values('$user','$name','$tech','$dec')";
		if(mysqli_query($con,$tab))
		{
			$message = "Internship Details Added Succesfully";
			echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
		}
	}

	if ($action=="ski_view")
	{
		$a=0;
		$user=$_SESSION["user_id"];
		$tab="select * from interests where User_id='$user'";
		$rlt=mysqli_query($con,$tab);
		$str="<h3>Total List Of Skills</h3><div><table>";
		while($re=mysqli_fetch_array($rlt)) 
		{
			$a++;
			$str.="<tr><td>".$re['Skills']."</td><td style='color:red' width='5%'><button type='button'  onclick='del(".$a.")' >&times;</button></td></tr>";
		}
		$str.="</table></div><br>";
		echo $str;
	}

	if ($action=="post_view")
	{
		$a=0;
		$user=$_SESSION["user_id"];
		$tab="select * from post where id='$user'";
		$rlt=mysqli_query($con,$tab);
		$str="<h3>Total List Of Posts</h3><div><table><tr><td><strong>Post</strong></td><td><strong>Requirement</strong></td><td><strong>Eligible</strong></td><td><strong>Description</strong></td></tr>";
		while($re=mysqli_fetch_array($rlt)) 
		{
			$a++;
			$str.="<tr><td>".$re['post']."</td><td>".$re['requirement']."</td><td>".$re['Eligible']."</td><td>".$re['description']."</td><td style='color:red'><button type='button' onclick='del(".$a.")' >&times;</button></td></tr>";
		}
		$str.="</table></div><br>";
		echo $str;
	}

	if ($action=="home_post")
	{
		$a=0;
		$tab="select * from post";
		$rlt=mysqli_query($con,$tab);
		$str="";
		while($re=mysqli_fetch_array($rlt)) 
		{
			$a++;
			$aaa="'profile.jpg'";
			$user=$re['id'];
			$tab="select * from com_detail where id=$user";
			$rlt1=mysqli_query($con,$tab);
			$re1=mysqli_fetch_array($rlt1);
			$str.='<div class="fl-col-group fl-node-5b6e9b2b0cf24" data-node="5b6e9b2b0cf24">
            <div class="fl-col fl-node-5b6e9b2b0d25c fl-col-small" data-node="5b6e9b2b0d25c">
    		<div class="fl-col-content fl-node-content">
  		 <div class="fl-module fl-module-photo fl-node-5b6e9b4a12217" data-node="5b6e9b4a12217">
   		 <div class="fl-module-content fl-node-content">
    	    <div class="fl-photo fl-photo-align-center" itemscope itemtype="https://schema.org/ImageObject">
 		   <div class="fl-photo-content fl-photo-img-png">
                <img class="fl-photo-img wp-image-66 size-full" src="upls/'.$user.'.jpg" alt="profile.jpg" OnError="this.src='.$aaa.';" itemprop="image" height="150" width="200" title="digit.png"  />
			                    </div>
			    </div>
			    </div>
			</div>
			    </div>
			</div>
			            <div class="fl-col fl-node-5b6e9b2b0d26f" data-node="5b6e9b2b0d26f">
			    <div class="fl-col-content fl-node-content">
			    <div class="fl-module fl-module-rich-text fl-node-5b6e9b6775717" data-node="5b6e9b6775717">
			    <div class="fl-module-content fl-node-content">
			        <div class="fl-rich-text">
			    <p>'.'<a><h1>'.$re1['name'].'</h1></a>'.$re1['Description'];
			$str.="Post: ".$re['post']."<br>Requirement: ".$re['requirement']."<br>Eligible: ".$re['Eligible']."<br>Description: ".$re['description']."</p><button type='button' class='btn btn-primary' style='font-size:20px' onclick='app(".$re['post_id'].",".$re['id'].")'><strong>Apply</strong></button></div></div></div></div></div></div>";
		}
		
		echo $str;
	}

	if ($action=="com_view")
	{
		$user=$_SESSION["user_id"];
		$tab="select * from com_detail where id='$user'";
		$rlt=mysqli_query($con,$tab);
		$str="<h3>Description Of Company</h3><div>";
		$re=mysqli_fetch_array($rlt);
		$str.=$re['Description'];
		$str.="</div><br>";
		echo $str;
	}

	if($action=="ski_del")
	{
		$i=0;
		$user=$_SESSION["user_id"];
		$n=$_POST['num'];
		$tab="select * from interests where User_id='$user'";
		$rlt=mysqli_query($con,$tab);
		while($re=mysqli_fetch_array($rlt))
		{
			$i++;
			if($i==$n)
			{				
				$name=$re['Skills'];
				$tab="delete from interests where Skills='$name'";
			
				
				if(mysqli_query($con,$tab));
				{
					$message = "Data Deleted Succesfully";
					echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
				}
			}
		}
	}

	if($action=="post_del")
	{
		$i=0;
		$user=$_SESSION["user_id"];
		$n=$_POST['num'];
		$tab="select * from post where id='$user'";
		$rlt=mysqli_query($con,$tab);
		while($re=mysqli_fetch_array($rlt))
		{
			$i++;
			if($i==$n)
			{				
				$name=$re['post'];
				$tab="delete from post where post='$name'";
			
				
				if(mysqli_query($con,$tab));
				{
					$message = "Data Deleted Succesfully";
					echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
				}
			}
		}
	}

	if ($action=="view")
	{
		$i=0;
		$user=$_SESSION["user_id"];
		$tab="select * from projects where User_id='$user'";
		$rlt=mysqli_query($con,$tab);
		$str="<h3>Total List Of Projects</h3><div><table><tr><td width='25%'><strong>Name</strong></td><td width='25%'><strong>Technology</strong></td><td><strong width='45%'>Description</strong></td><td width='5%'></td></tr>";
		while($re=mysqli_fetch_array($rlt)) 
		{
			$i++;
			$a=1;
			$str.="<tr><td>".$re['Projects']."</td><td>".$re['tech']."</td><td>".$re['Description']."</td><td style='color:red'><button type='button' onclick='dele(".$a.",".$i.")' >&times;</button></td></tr>";
		}
		$str.="</table></div><br>";
		$tab="select * from achievements where User_id='$user'";
		$rlt=mysqli_query($con,$tab);
		$str.="<div><h3>Total List Of Achievements</h3><table><tr><td width='25%'><strong>Name</strong></td><td width='25%'><strong>Rank</strong></td><td><strong width='45%'>Description</strong></td><td width='5%'></td></tr>";
		$i=0;
		while($re=mysqli_fetch_array($rlt)) 
		{
			$i++;
			$a=2;
			$str.="<tr><td>".$re['name']."</td><td>".$re['rank']."</td><td>".$re['description']."</td><td style='color:red'><button type='button' onclick='dele(".$a.",".$i.")' >&times;</button></td></tr>";
		}
		$str.="</table></div><br>";
		$tab="select * from internship where User_id='$user'";
		$rlt=mysqli_query($con,$tab);
		$str.="<div><h3>Total List Of Internship Done</h3><table><tr><td width='25%'><strong>Name</strong></td><td width='25%'><strong>Rank</strong></td><td><strong width='45%'>Description</strong></td><td width='5%'></td></tr>";
		$i=0;
		while($re=mysqli_fetch_array($rlt)) 
		{
			$i++;
			$a=3;
			$str.="<tr><td>".$re['company']."</td><td>".$re['time']."</td><td>".$re['description']."</td><td style='color:red'><button type='button' onclick='dele(".$a.",".$i.")' >&times;</button></td></tr>";
		}
		$str.="</table></div>";
		echo $str;
	}

	if($action=='aca')
	{
		$user=$_SESSION["user_id"];
		$tab="select * from academic where User_id='$user'";
		$rlt=mysqli_query($con,$tab);
		$str="<h3>Qualification Details</h3><div><table><tr><td>Sr No.</td><td><strong>Name</strong></td><td><strong>Institute</strong></td><td><strong>Grade</strong></td></tr>";
		$re=mysqli_fetch_array($rlt);
		$str.="<tr><td>1</td><td>10 Std</td><td>".$re['10_Board']."</td><td>".$re['10th']."</td></tr>";
		$str.="<tr><td>2</td><td>12 Std</td><td>".$re['12_board']."</td><td>".$re['12th']."</td></tr>";
		$str.="<tr><td>3</td><td>Current CGPA</td><td>CSPIT</td><td>".$re['CGPA']."</td></tr>";
		$str.="</table></div><br>";
		echo $str;
	}

	if($action=="dele")
	{
		$i=0;
		$user=$_SESSION["user_id"];
		$n=$_POST['num'];
		$a=$_POST['daa'];
		if($a==1)
			$tab="select * from projects where User_id='$user'";
		if($a==2)
			$tab="select * from achievements where User_id='$user'";
		if($a==3)
			$tab="select * from internship where User_id='$user'";
		$rlt=mysqli_query($con,$tab);
		while($re=mysqli_fetch_array($rlt))
		{
			$i++;
			if($i==$n)
			{
				
				if($a==1)
				{
					$name=$re['Projects'];
					$tab="delete from projects where Projects='$name'";
				}
				if($a==2)
				{
					$name=$re['name'];
					$tab="delete from achievements where name='$name'";
				}
				if($a==3)
				{
					$name=$re['company'];
					$tab="delete from internship where company='$name'";
				}
				if(mysqli_query($con,$tab));
				{
					$message = "Data Deleted Succesfully";
					echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
				}
			}
		}
	}

	if($action=="ach")
	{
		$name=$_POST['nam'];
		$tech=$_POST['tec'];
		$dec=$_POST['desc'];
		$user=$_SESSION["user_id"];
		$tab="insert into achievements values('$user','$name','$tech','$dec')";
		if(mysqli_query($con,$tab))
		{
			$message = "Achievement Details Added Succesfully";
			echo "<script type='text/javascript'>alert('$message');location.reload();</script>";
		}
	}
?>