<!DOCTYPE html>

<html>
<head>
<title> Task 2 -Post Status Page</title>
<meta http-equiv="Content-Type" content = "text/html; charset=utf-8"/>
<link rel = "stylesheet" href = "style.css">
</head>
<body>
<h1> Status Posting System</h1>

<form action = "poststatusprocess.php" method = "post">

Status Code (required): <input type = "text" name = "status_code" placeholder="Example: S0001" pattern="S[0-9]{4}" required="required"><br>

Status (required): <input type = "text" name = "status" placeholder= "Example: Hi Bob123?!., "  required="required"><br>

Share: 
<label>Family
       <input type = "radio" name = "radio" value = "Family">
</label>
<label>Friends
		<input type = "radio" name = "radio"value= "Friends"> 
</label>
<label>Only Me
		<input type = "radio" name = "radio" value = "OnlyMe">
</label><br>

<label>Date <input type = "text" name = "date" value = "<?php echo date("d/m/Y");?>" required="required"
</label>

<fieldset>
  <legend>Permission Type</legend>
  <div>
    <input type="checkbox" id="Allow Like" name="permissionType[]" value="Like">
    <label for="AllowLike">Allow Like</label>
 </div>
  <div>
    <input type="checkbox" id="Allow Comment" name="permissionType[]" value="Comment">
    <label for="AllowComment">Allow Comment</label>
  </div>
  <div>
    <input type="checkbox" id="Allow Share" name="permissionType[]" value="Share">
    <label for="AllowShare">Allow Share</label>
  </div>
</fieldset>

<input type = "submit" name = "Post" action= "">
<input type = "reset" name = "reset" value = "Reset">

</form>

<p> <a href = "index.html"> Return to home Page</a></p>

</body>
</html>

