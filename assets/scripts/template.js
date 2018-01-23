$( document ).ready(function() {

	$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
		event.preventDefault();
		$(this).ekkoLightbox({
			alwaysShowClose: true
		});
	});

	$("[data-scroll-to]").on("click", function(e){
		e.preventDefault();
		var wrapper = window;
		var $this = $( this );
		var $target = $( "#" + $this.data('scroll-to') );
		var offset = 0;

		if( $this.data('scroll-to-offset') ) {
			var $offsetContainer = $( "#" + $this.data('scroll-to-offset'));
			var offset =+ $offsetContainer.outerHeight();
		}

		let location = $target.offset().top - offset;

		wrapper.scroll({
			top: location,
			left: 0, behavior: 'smooth'
		});

	});

	$("[data-toggle-class]").on("click", function(e){
		e.preventDefault();
		var target = $(this).data('toggle-class').split(':');
		$target = $(target[0]);
		$target.toggleClass(target[1]);
	});

	var inView = $('[data-in-view]').waypoint(function(direction) {
    var nav = this.element.dataset.inView;
    var $nav = $("#" + nav);
		console.log('[data-scroll-to="#'+ this.element.id +'"]');
		$nav.find('a[data-scroll-to]').removeClass('active');
		$anchor = $nav.find('[data-scroll-to="'+ this.element.id +'"]');
	  $anchor.toggleClass('active');
  });

});
