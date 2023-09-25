<svg class="tsm-badge" x="0px" y="0px" viewBox="0 0 100 82" width="100" height="82" preserveAspectRatio="xMidYMid meet">
	<polygon class="badge-uprights badge-upright-left" points="17.9,0 0,82 28.5,82 34.5,67.8 17.6,67.8 32.4,0 "/>
	<polygon class="badge-uprights badge-upright-right" points="85.5,0 70.7,67.8 51.4,67.8 41.6,82 82.1,82 100,0 "/>
	<g class="bolt-container">
		<polygon class="badge-bolt" points="39,0 35.9,14.1 48.9,14.1 37,42.6 51,42.6 34.8,82 70.6,28.5 57,28.5 62.9,14.1 75.5,14.1 78.6,0 "/>
	</g>
</svg>


<script type="text/javascript">	
	(function( $ ) {
	
		$('.tsm-badge').on('mouseleave', function() {
			$(this).addClass("badge-leave").delay(500).queue(function(){
				$(this).removeClass("badge-leave").dequeue();
			});
		});
	
	})(jQuery);
</script>
