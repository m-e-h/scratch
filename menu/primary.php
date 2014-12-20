<?php if ( has_nav_menu( 'primary' ) ) : ?>

		<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'scratch' ); ?></button>
			<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'menu_class'      => 'nav-menu'
					)
			); ?>
		</nav><!-- #site-navigation -->

<?php endif; // End check for menu. ?>