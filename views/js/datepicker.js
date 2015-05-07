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
