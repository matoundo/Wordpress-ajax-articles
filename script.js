$(document).ready(function(){
	
	var compteur = 1;
	var load = $('#load');
	
	load.click(function(e){
		$.ajax({
			url: ajax_var.url,
			data: {
				action: 'posts',
				compteur: compteur
			},
			complete: function(xhr){
				if($.parseJSON(xhr.responseText)['post_count'] > 0){
					var posts = $.parseJSON(xhr.responseText)['posts'];
					for (variable in posts){
						$('<article><h2><a href="' + posts[variable]['guid'] + '">' + posts[variable]['post_title'] + '</a></h2>' + posts[variable]['post_content'] + '</article>').insertAfter($('article').last());
						console.log( posts[variable]);
					}
				}
				else {
					$('<p>Plus de posts à charger</p>').insertAfter(load);
					$(load).hide();
				}
			}
		});
		
		compteur++;
		e.preventDefault();
	});
	
});