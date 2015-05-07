(function($){

$('.addcart').click(function(event){
	event.preventDefault();
	//event.defaultPrevented;
	$.getJSON($(this).attr('href'),function(data){
		if(data.error){
		alert(data.message);
	}else{
		if(confirm(data.message + '. Want to check your cart ?')){
			location.href = '?page=cart';
		}else{
			$('#total').empty().append(data.total);//ajouté récement
			$('#count').empty().append(data.count);
		}
	}
	});
	return false;
});
})(jQuery);