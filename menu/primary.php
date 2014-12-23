<?php if ( has_nav_menu( 'primary' ) ) : ?>

		<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>

			<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container'       => 'div',
						'container_class' => 'main-navigation',
						'menu_id'         => 'menu-primary-items',
						'menu_class'      => 'menu-items nav-menu',
						'fallback_cb'     => ''
					)
			); ?>
		</nav><!-- #site-navigation -->

<?php endif; // End check for menu. ?>
