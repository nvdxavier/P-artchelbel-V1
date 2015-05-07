(function($){

$('.addcart').click(function(event){ 
	//event.preventDefault(); 
	$.get($(this).attr('href'),{},function(data){
	if(data.error){
		alert(data.message);
	}else{ 
		if(confirm(data.message + '. Product added. check your cart ?')){
			location.href = '?page=cart';
		}else{
			location.href = '?page=search';
			$('#total').empty().append(data.total);//ajouté récement
			$('#count').empty().append(data.count);
		}
	}
	}, 'json');
	return false;
});
})(jQuery);
               

