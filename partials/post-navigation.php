<?php if ( ! is_singular( 'post' ) ) {
			return;
	}

		the_post_navigation( array(
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '&larr;', 'scratch' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Previous article:', 'scratch' ) . '</span> ' .
				'<span class="post-title">%title</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next article:', 'scratch' ) . '</span>
				<span class="post-title">%title</span>
				<span class="meta-nav" aria-hidden="true">' . __( '&rarr;', 'scratch' ) . '</span> ',
		) );
