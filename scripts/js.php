<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider({
				effect: 'random',
				slices: 50,
				animSpeed: 500,
				pauseTime: 4000,
				startSlide: 2, //Set starting Slide (0 index)
				directionNav: true,
				directionNavHide: false, //Only show on hover
				controlNav: true, //1,2,3...
				controlNavThumbs: false, //Use thumbnails for Control Nav
				pauseOnHover: false, //Stop animation while hovering
				manualAdvance: false, //Force manual transitions
				captionOpacity: 0.8, //Universal caption opacity
				beforeChange: function() {},
				afterChange: function() {},
				slideshowEnd: function() {} //Triggers after all slides have been shown
			});
		});
	</script>