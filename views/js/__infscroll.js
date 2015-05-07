$(window).scroll(function(){
	if($(window).scrollTop() == $(document).height() - $(window).height()){
		$('#loader').show(); 
		$.ajax({
			url : "controllers/products/load.php?page=search&lastid=" + $(".item:last").attr("id"),

			beforeSend: function(){$("#loader").show();},
			success: function(html){
				if(html){
					$(".post").append(html);
					$("#loader").hide();
				}else{
					alert('plus de post !');
				}
			}
		});
	}
});