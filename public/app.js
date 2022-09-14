$(document).ready(function() {
	
    // $(document.body).on('click','.supprimer',function(e) {

	// 	e.preventDefault() ;
    //     var id = $(this).attr("data-id");
	// 	// alert(id) ;
    //     $.ajax({
	// 		url: "http://localhost/Restaurant/Menu/supprimer" ,
	// 		type: "post" ,
	// 		data: {
	// 			"id":id ,
	// 		}
	// 	})
	// 	.done(function(data) {
	// 		if(data.trim() == "deleted") {
	// 			afficher() ;
	// 		}
	// 	})
	// 	.fail(function(errorMessage) {
	// 		console.log(errorMessage) ;
	// 	})
        

    // })

	$(".modifier").click(function() {
		var id = $(this).attr("data-id") ;
		var nom = $(this).attr("data-nom") ;
		var prix = $(this).attr("data-prix") ;
		$("#idProduit").val(id) ;
		$("#nomProduit").val(nom) ;
		$("#prixProduit").val(prix) ;
	})

}) ;

