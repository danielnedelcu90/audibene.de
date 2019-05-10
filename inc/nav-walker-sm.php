<?php
/**
 * Custom Walker
 *
 * @package audibene
 */

/**
 * Header Navigation
 */

function walker_header_navigation_sm( $menu ) {

//    echo '<pre>';
//    print_r(wp_get_nav_menu_items($menu ));
//    echo '</pre>';

	if ( empty($menu) ) return;

    $menu = wp_get_nav_menu_items( $menu );

	if ( $menu ) {

		$output = '<div class="site-navigation-sm">' . "\n";
		$output .= '<div class="site-navigation-container">' . "\n";
		$output .= '<ul class="menu-sm-list">' . "\n";

		foreach ( $menu as $item ) {

			if ( $item->menu_item_parent == 0 ) {

				$parents = wp_list_pluck( $menu, 'menu_item_parent' );
				in_array( $item->ID, $parents ) && $item->more = 1;

				$class_has_mega_menu = false;
				$data_attribute      = false;

				if ( $item->more ) {

					$class_has_mega_menu = ' menu-sm-item-has-children';
					$data_attribute      = ' data-menu-sm-id="' . $item->ID . '"';

				}

				if ( $item->object_id == get_the_ID() ) {

					$current_page = ' current-menu-sm-item';

				} else {

					$current_page = false;

				}

				if ( $class_has_mega_menu ) {

					$output .= '<li class="menu-sm-item menu-sm-item-' . $item->ID . $current_page . $class_has_mega_menu . '"' . $data_attribute . '>' . "\n";
					$output .= '<div class="sub-menu-sm-title">' . $item->title . '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312.3 578.5"><path d="M46.7 1.2c4.5 0 8.6 1.9 12.1 5.8L304 276c3.5 3.9 5.3 8.3 5.3 13.3s-1.8 9.4-5.3 13.3l-245.2 269c-3.5 3.8-7.5 5.8-12.1 5.8s-8.6-1.9-12.1-5.8L8.3 542.7c-3.5-3.9-5.3-8.3-5.3-13.3 0-5.1 1.8-9.4 5.3-13.3l206.8-226.9L8.3 62.4C4.8 58.5 3 54.1 3 49.1s1.8-9.4 5.3-13.3L34.6 7c3.5-3.9 7.6-5.9 12.1-5.8z"/></svg></div>' . "\n";

				} else {

					$output .= '<li class="menu-sm-item menu-sm-item-' . $item->ID . $class_has_mega_menu . '"' . $data_attribute . '>' . "\n";
					$output .= '<a href="' . $item->url . '" title="' . $item->title . '" class="sub-menu-sm-title">' . $item->title . '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312.3 578.5"><path d="M46.7 1.2c4.5 0 8.6 1.9 12.1 5.8L304 276c3.5 3.9 5.3 8.3 5.3 13.3s-1.8 9.4-5.3 13.3l-245.2 269c-3.5 3.8-7.5 5.8-12.1 5.8s-8.6-1.9-12.1-5.8L8.3 542.7c-3.5-3.9-5.3-8.3-5.3-13.3 0-5.1 1.8-9.4 5.3-13.3l206.8-226.9L8.3 62.4C4.8 58.5 3 54.1 3 49.1s1.8-9.4 5.3-13.3L34.6 7c3.5-3.9 7.6-5.9 12.1-5.8z"/></svg></a>' . "\n";

				}

				// navigation mega menu
				if ( $item->menu_item_parent == 0 ) {

					// level 1
					$level_1 = '';

					foreach ( $menu as $level_1_item ) {

						$level_1_item_has_more = false;

						if ( $level_1_item->menu_item_parent == $item->ID ) {

							$parents = wp_list_pluck( $menu, 'menu_item_parent' );
							in_array( $level_1_item->ID, $parents ) && $level_1_item->more = 1;

							$level_1 .= '<li class="sub-menu-sm-item"><a href="' . $level_1_item->url . '" title="' . $level_1_item->title . '">' . $level_1_item->title . '</a></li>' . "\n";

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

						$output .= '<ul class="sub-menu-list sub-menu-list-' . $item->ID . '">' . "\n";
						$output .= $level_1;
						$output .= '</ul>' . "\n";

					}

				}

				$output .= '</li>' . "\n";

			}

		}

		$output .= '</ul>' . "\n";
		$output .= '</div>' . "\n";
		$output .= '</div>' . "\n";

		return $output;

	}

}