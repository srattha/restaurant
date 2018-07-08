function marquee ( bar, speed, direction ) { 
	var initWidth = $( bar + " .marquee-message" ).width();

	$( bar + " .marquee-message" ).css( 'margin-left', function () {
		return ( $( bar ).width() - initWidth ) / 2;
	});

	if ( direction == 'left' ) {
		function resMarquee_left () {
			var left = -1 * initWidth;
			$( bar + " .marquee-message" ).css( 'margin-left', left );
		}
		function marquee_left () {
			$( bar + " .marquee-message" ).css( 'margin-left', function ( index, val ) {
				return parseInt( val, 10 ) + speed + 'px';
			});
			if ( parseInt ( $( bar + " .marquee-message" ).css( 'margin-left' ) ) > $( bar ).width() ) {
				resMarquee_left();
			}
		}
		setInterval( marquee_left, 18 );
	} else {
		var initWidth = $( bar + " .marquee-message" ).width();
		$( bar + " .marquee-message" ).css( 'margin-left', function () {
			return ( $( bar ).width() - initWidth ) / 2;
		});
		function resMarquee_right () {
			$( bar + " .marquee-message" ).css( 'margin-left', $( bar ).width() );
		}
		function marquee_right () {
			$( bar + " .marquee-message" ).css( 'margin-left', function ( index, val ) {
				return parseInt( val, 10 ) - speed + 'px';
			});
			if ( parseInt ( $( bar + " .marquee-message" ).css( 'margin-left' ) ) < -1 * $( bar + " .marquee-message" ).width() ) {
				resMarquee_right ();
			}
		}
		setInterval( marquee_right, 18 );
	}
	return true;
}