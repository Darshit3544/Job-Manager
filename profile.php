<?php
include "header.php";
    if($_SESSION["user_id"]=='')
        {
            $message = "Login First!!!";
            echo "<script type='text/javascript'>alert('$message');window.location='home.php'</script>";
        }
?>
	<title>Profile &#8211; Job Creator</title>
<script type="text/javascript">
     $(document).ready(function(){
        var action="pro";
        $.ajax({
        type:"POST",
        url:"login.php",
        data:"act="+action,
        success : function(data)
        {
            $("#prof").html(data);
        }
       })

      action="ski_view";
      $.ajax({
        type:"POST",
        url:"login.php",
        data:"act="+action,
        success : function(data)
        {
            $("#ski_view").html(data);
        }
       })
     })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var user_name = "<?php echo $_SESSION['user_id'];?>";
    user_name="upls/".concat(user_name).concat(".jpg");
    $("#profile_image").attr("src",user_name);
  })
</script>
<script type="text/javascript">
  function del(b)
  {
    var action="ski_del";
    $.ajax({
        type:"POST",
        url:"login.php",
        data:"act="+action+"&num="+b,
        success : function(data)
        {
          $("#m2").html(data);
        }
       })
  }
</script>
<script type="text/javascript">
$(document).ready(function(){
        $("#upl").submit(function(event){
           var action="upl";

      event.preventDefault();

      var formData = new FormData(this);
      formData.append('act',action);
      $.ajax({
        type:"POST",
        url:"login.php",
        data:formData,
        contentType:false,
        processData:false,
        success : function(data)
        {
          $("#msg").html(data);
        }
       })
    })

    $("#ski_form").submit(function(event){
           var action="ski";
      event.preventDefault();
      var sk=document.getElementById('id1').value;
      $.ajax({
        type:"POST",
        url:"login.php",
        data:"act="+action+"&nam="+sk,
        success : function(data)
        {
          $("#msg2").html(data);
        }
       })
    })
})
</script>
<p id="m2"></p>
<div style="background-image:url('back_pro.jpg');margin-top:-20px">
<a href=""  data-toggle="modal" data-target="#img"><img src="profile.jpg" OnError="this.src='profile.jpg';" id="profile_image" style="border-radius:150px;box-shadow: 0px 0px 10px 0px;height:180px;width:180px;margin-bottom:-90px;margin-top:70px;margin-left:20px"></a>
<div style="background-color:white;box-shadow: 0px 0px 10px 0px;">
    <br><br><br><br>
    <h3 id="prof" style="margin-left:25px">
        
    </h3>
    <br><br>
</div>
</div>
<br>
<div class="col-md-6"><h3><button><a data-toggle="modal" data-target="#Skill_modal" href="">Add Skills</a></button></h3></div>
<p id="ski_view"></p>
<div class="modal fade" id="Skill_modal" tabindex="-1" role="dialog" aria-hidden="true" style="top:120px">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add Skills
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cl()">
          <span aria-hidden="true">&times;</span>
        </button>
    </h3>
      </div>
      <div class="modal-body" >
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        
  <form id="ski_form">
  <div class="form-group"> 
    <label><strong>Skills</strong></label>
    
    <input type="text" id="id1" required>
    </div>
    
    <div class="form-group">
  <button type="submit" class="btn btn-primary" style="font-size:25px"><strong>Submit</strong></button>
  </div>
<p id="msg2" ></p>


</form> 
      </div>
    </div>
    
</div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cl()" >Close</button>
       </div>
    </div>
  </div>
</div>

<div class="modal fade" id="img" tabindex="-1" role="dialog" aria-hidden="true" style="top:120px">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Update Profile Picture
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cl()">
          <span aria-hidden="true">&times;</span>
        </button>
    </h3>
      </div>
      <div class="modal-body" style="font-size:20px">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        
  <form class="formst" id="upl">
  <div class="form-group"> 
    <label><strong>Enter Image</strong></label>
    </div>
    <div class="form-group">
    <input type="file" class="form-control-file" id="image" name="im" required>
    </div>
    <div class="form-group">
  <button type="submit" class="btn btn-primary" style="font-size:20px"><strong>Upload</strong></button>
  </div>
<p id="msg" ></p>
<br>

</form> 
      </div>
    </div>
    
</div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cl()" >Close</button>
       </div>
    </div>
  </div>
</div>
                        
                          


<?php
include "footer.php";
?>