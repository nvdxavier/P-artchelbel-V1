<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="views/css/jquery-ui-1.8.13.custom.css">
<link rel="stylesheet" type="text/css" href="views/css/ui.dropdownchecklist.themeroller.css">
<script type="text/javascript" src="views/js/ui.dropdownchecklist-1.4-min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="views/js/app.js"></script>
<script type="text/javascript" src="views/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="views/js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="views/js/ui.dropdownchecklist.js"></script>-->
<link rel="stylesheet" type="text/css" href="views/css/adminstyle.css">
<script type="text/javascript">
        $(document).ready(function() {
        	$returnS5 = $('#returnS5');
			$("#s5").dropdownchecklist({
onItemClick: function(checkbox, selector){
	var justChecked = checkbox.prop("checked");
	var checkCount = (justChecked) ? 1 : -1;
	for( i = 0; i < selector.options.length; i++ ){
		if ( selector.options[i].selected ) checkCount += 1;
	}
}
});

	$('select option').removeProp('selected');
	//for jquery < 1.6
	//$('select option').removeAttr('selected');
       });

        $(document).ready(function() {
        	$returnS5 = $('#returnS5');
			$("#s6").dropdownchecklist({
onItemClick: function(checkbox, selector){
	var justChecked = checkbox.prop("checked");
	var checkCount = (justChecked) ? 1 : -1;
	for( i = 0; i < selector.options.length; i++ ){
		if ( selector.options[i].selected ) checkCount += 1;
	}
}
});
	$('select option').removeProp('selected');
	//for jquery < 1.6
	//$('select option').removeAttr('selected');
       }); 
    </script>


<nav id="nav1">
<form method="POST">
<label for="items">Search by items:</label><br />
<input type="text" placeholder="Title" style="width:170px;" id="title" name="title"  value="<?php $title ?>"/>
&nbsp;
<input type="text" placeholder="Category" style="width:180px;" id="category" name="category"  value="<?php $category ?>"/>
&nbsp;
<input type="text" placeholder="Description" style="width:230px;" id="description" name="description"  value="<?php $description ?>"/>
<br/><p>
<input type="text" placeholder="Price" style="width:80px;" id="price" name="price"  value="<?php $price ?>"/>
&nbsp;
<input type="text" placeholder="Date" style="width:100px;" id="date" name="date"  value="<?php $date ?>"/> 
&nbsp;
<input type="text" placeholder="amount" style="width:120px;" id="amount" name="amount"  value="<?php $amount ?>"/>


<!--category:
<select id="s5"  name="check[]" multiple="multiple">
  <option name="check[]" value="1">1</option>
  <option name="check[]" value="2">2</option>
  <option name="check[]" value="3">3</option>
  <option name="check[]" value="4">4</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->


<input type="submit" name="rechercher" value="Rechercher" /><br />
<!--emplacement table s5-->
</form>
</nav>
<br/><br/><br/>