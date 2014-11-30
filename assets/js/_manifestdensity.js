window.md_atBottom = false;

function fetchFlickrImages(page){
	page = typeof page !== 'undefined' ? page : 1;

	jQuery('#sidebar-flickr-photos img').waypoint('destroy');

	if( (window.md_atBottom===true)||(parseInt(page, 10)>3) ) {
		return;
	}

	jQuery.getJSON('/wp-content/themes/roots/fetchPhotos.php?page=' + page, null, function(data){
		if (window.md_atBottom===true) {
			return;
		}

		for(var p in data.photos.photo){
			var photo = data.photos.photo[p];
			var p_class = (p%2===0) ? 'odd' : 'even';
			var p_url = '//flickr.com/photos/' + photo.owner + '/' + photo.id;
			var p_src = '//farm' + photo.farm + '.staticflickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_q.jpg';
			jQuery('#sidebar-flickr-photos').append(jQuery('<a href="' + p_url + '"><img class="' + p_class + '" src="' + p_src + '"></a>'));
		}
		jQuery('#sidebar-flickr-photos img:last').waypoint(function(){
			fetchFlickrImages(page+1);
		});
	});
}

jQuery(document).ready(function(){
	jQuery('footer, .post-nav').waypoint(function(){
		window.md_atBottom = true;
	});

	fetchFlickrImages();
});