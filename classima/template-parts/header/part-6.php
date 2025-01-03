<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.4.1
 */

namespace radiustheme\Classima;

use Rtcl\Helpers\Link;

$nav_menu_args = Helper::nav_menu_args();

$light_logo = empty( RDTheme::$options['logo_light']['url'] ) ? Helper::get_img( 'logo-light.png' ) : RDTheme::$options['logo_light'];
$dark_logo = empty( RDTheme::$options['logo']['url'] ) ? Helper::get_img( 'logo-dark.png' ) : RDTheme::$options['logo'];

$logo_width = (int) RDTheme::$options['logo_width'];
$menu_width = 12 - $logo_width;
$logo_class = "col-md-{$logo_width} col-sm-12 col-12";
$menu_class = "col-md-{$menu_width} col-sm-12 col-12";
$login_icon_title = is_user_logged_in() ? esc_html__( 'My Account', 'classima' ) : esc_html__( 'Sign in', 'classima' );
?>
<div class="row align-items-center">
	<div class="<?php echo esc_attr( $logo_class );?>">
        <div class="site-branding">
            <?php if (!empty($dark_logo['url'])): ?>
                <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $dark_logo['url'] ); ?>" width="<?php echo isset($dark_logo['width']) ? esc_attr( $dark_logo['width'] ) : '150'; ?>" height="<?php echo isset($dark_logo['height']) ? esc_attr( $dark_logo['height'] ) : '45'; ?>"  alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
            <?php else: ?>
                <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $dark_logo ); ?>" width="150" height="45" alt="<?php esc_attr( bloginfo( 'name' ) ) ; ?>"></a>
            <?php endif; ?>

            <?php if (!empty($light_logo['url'])): ?>
                <a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $light_logo['url'] ); ?>" height="<?php echo isset($light_logo['height']) ? esc_attr( $light_logo['height'] ) : '45'; ?>" width="<?php echo isset($light_logo['width']) ? esc_attr( $light_logo['width'] ) : '150'; ?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
            <?php else: ?>
                <a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $light_logo ); ?>" width="150" height="45" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
            <?php endif; ?>

        </div>
	</div>
	<div class="<?php echo esc_attr( $menu_class );?>">
		<div class="main-navigation-area">
			<?php if ( RDTheme::$options['header_btn_txt'] && RDTheme::$options['header_btn_url'] ): ?>
				<div class="header-btn-area">
					<a class="header-btn" href="<?php echo esc_url( RDTheme::$options['header_btn_url'] );?>"><i class="fas fa-plus" aria-hidden="true"></i><?php echo esc_html( RDTheme::$options['header_btn_txt'] );?></a>
				</div>
			<?php endif; ?>

			<?php if ( RDTheme::$options['header_icon'] && class_exists( 'RtclPro' ) && class_exists( 'Rtcl' ) ): ?>
				<a class="header-login-icon" href="<?php echo esc_url( Link::get_my_account_page_link() ); ?>">
                    <i class="far fa-user" aria-hidden="true"></i><span><?php echo esc_attr( $login_icon_title ); ?></span>
                </a>
			<?php endif; ?>

			<?php if ( Helper::is_chat_enabled() ): ?>
				<a class="header-chat-icon rtcl-chat-unread-count" href="<?php echo esc_url( Link::get_my_account_page_link( 'chat' ) ); ?>">
                    <i class="far fa-comments" aria-hidden="true"></i><span><?php esc_html_e( 'Live Chat','classima' );?></span>
                </a>
			<?php endif; ?>

			<div id="main-navigation" class="main-navigation"><?php wp_nav_menu( $nav_menu_args );?></div>
		</div>
	</div>
</div>