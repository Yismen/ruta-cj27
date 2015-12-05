$(document).on('click', 'button[name="deleteBtn"]', function(event) {
	event.preventDefault();
	var parentForm = $(this).parents('form').first();
	
	bootbox.confirm({
	    title: 'Peligro, Alerta!!!',
	    message: 'Esto Borrarrá este record de la base de datos. Está seguro de querer continuar?',
	    buttons: {
	        'confirm': {
	            label: 'Favor Confirmar',
	            className: 'btn-danger'
	        }
	    },
	    callback: function(result) 
	    {	       
			if (result == true) {
				
				$(parentForm).submit();				
				// bootbox.confirm('Last confirmation. Are you realy sure you want to remove this record from the database?', function( result ){
				// 	if ( result == true) {
				// 		$(parentForm).submit();
				// 	};
				// });
			} 
	    }
	});	
});


// var Delete = function(options) {
// 	mergeOptions: {
		
// 	}, 

// 	init: function(){

// 	},

// 	options: {
		
// 	}
// }

// Delete.init();