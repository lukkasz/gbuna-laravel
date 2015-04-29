$(document).ready(function(){
	$('form').submit(function(e){
		var method = $(this).children(':hidden[name=_method]').val();
		if (method === 'DELETE') {
			if (!confirm('Dali želite pobrisati sliku/fotografiju')) {
				e.preventDefault();
			}
		} 
	})
});