
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" href="views/css/adminstyle.css">




<form method="POST">
<form action="?page=manage_users" method=post>
<label for="username">Search by username:</label>
<input type="text" id="username" name="username"  value="<?php $username ?>"/>      
<label for="nom">Search by date:</label>
<input type="text" id="datepicker" value=" <?php $datepicker ?>"/>

<input type="submit" name="rechercher" value="Rechercher" /><br />
</form>
<div id="container">

</div>
<script>
$(function() {
$( "#datepicker" ).datepicker({
	dateFormat : 'dd-mm-yy',
});
});
</script>

