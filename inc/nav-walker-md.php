<?php
/**
 * Custom Walker
 *
 * @package audibene
 */

/**
 * Header Navigation
 */

function walker_header_navigation_md( $menu ) {

//    echo '<pre>';
//    print_r(wp_get_nav_menu_items($menu ));
//    echo '</pre>';

	$menu = wp_get_nav_menu_items( $menu );

	if ( $menu ) {

		$output = '<div class="site-navigation-md">' . "\n";
		$output .= '<div class="site-navigation-container">' . "\n";
		$output .= '<ul class="menu">' . "\n";

		foreach ( $menu as $item ) {

			if ( $item->menu_item_parent == 0 ) {

				$parents = wp_list_pluck( $menu, 'menu_item_parent' );
				in_array( $item->ID, $parents ) && $item->more = 1;

				$class_has_mega_menu = false;
				$data_attribute      = false;

				if ( $item->more ) {

					$class_has_mega_menu = ' menu-item-has-children';
					$data_attribute      = ' data-menu-id="' . $item->ID . '"';

				}

				if ( $item->object_id == get_the_ID() ) {

					$current_page = ' current-menu-item';

				} else {

					$current_page = false;

				}

				$output .= '<li class="menu-item menu-item-' . $item->ID . $current_page . $class_has_mega_menu . '"' . $data_attribute . '><a href="' . $item->url . '" title="' . $item->title . '">' . $item->title . '</a></li>' . "\n";

			}

		}

		$output .= '</ul>' . "\n";
		$output .= '</div>' . "\n";

		// navigation mega menu
		foreach ( $menu as $item ) {

			if ( $item->menu_item_parent == 0 ) {

				// level 1
				$level_1 = '';

				foreach ( $menu as $level_1_item ) {

					$level_1_item_has_more = false;

					if ( $level_1_item->menu_item_parent == $item->ID ) {

						$parents = wp_list_pluck( $menu, 'menu_item_parent' );
						in_array( $level_1_item->ID, $parents ) && $level_1_item->more = 1;

						$level_1 .= '<li class="mega-menu-item"><a href="' . $level_1_item->url . '" title="' . $level_1_item->title . '">' . $level_1_item->title . '</a></li>' . "\n";

					}

					// create level 2 array
					if ( $level_1_item_has_more ) {

						foreach ( $menu as $level_2_item ) {

							if ( $level_2_item->menu_item_parent == $level_1_item->ID && $level_1_item->more ) {

								$level_2_item_arr = array(
									'ID'               => $level_2_item->ID,
									'object_id'        => $level_2_item->object_id,
									'menu_item_parent' => $level_2_item->menu_item_parent,
									'title'            => $level_2_item->title,
									'url'              => $level_2_item->url,
								);

								$level_2_arr[ $level_2_item->menu_item_parent ][] = $level_2_item_arr;

							}

						}

					}

				}

				if ( $level_1 ) {

					$data_attribute = ' data-mega-menu-id="' . $item->ID . '"';
					$output         .= '<div class="mega-menu mega-menu-' . $item->ID . '"' . $data_attribute . '>' . "\n";

					$output .= '<div class="mega-menu-wrapper">' . "\n";
					$output .= '<div class="mega-menu-description">' . "\n";
					$output .= '<h2 class="mega-menu-headline">' . $item->title . '</h2>' . "\n";
					$output .= '<p class="mega-menu-copy">' . $item->post_content . '</p>' . "\n";
					$output .= '</div>' . "\n";
					$output .= '<div class="mega-menu-list-wrapper">' . "\n";
					$output .= '<ul class="mega-menu-list">' . "\n";
					$output .= $level_1;
					$output .= '</ul>' . "\n";
					$output .= '</div>' . "\n";

					$output .= '</div>' . "\n";
					$output .= '</div>' . "\n";

				}

			}

		}

		$output .= '</div>' . "\n";

		return $output;

	}

}