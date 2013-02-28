<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="session-header">

<?php
						$postTags = wp_get_post_tags( $id );
            echo '<h3>';
            echo '<a href="' . get_permalink( $id ) . '">';
            echo get_the_title($id);
            echo ' with ';
            echo    esc_html( get_post_meta( $id,'lead_presenter_fname', true ) ).' ';
            echo    esc_html( get_post_meta( $id,'lead_presenter_lname', true ) );
            echo '</a>';

            $categories = get_the_category();
            $separator = ' ';
            $output = '';
            if($categories){
                foreach($categories as $category) {
                    $output .= '<a class="category button '.esc_attr( $category->slug ).'" href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                }
            echo trim($output, $separator);
            }
            echo '</h3>';
?>
            </header>
            <div class="session-content">
                <p><?php echo esc_html( get_post_meta( $id,'session_sentence', true ) ); ?></p>
                <p>
                    <span class="label">Location: </span><?php echo get_post_meta( $id,'session_room', true ); ?> at

                    <?php
                        switch ( get_post_meta( $id, 'session_slot', true ) ) {
                            case '1':
                                echo 'Wednesday 1:45 p.m.';
                                break;
                            case '2':
                                echo 'Wednesday 3:00 p.m.';
                                break;
                            case '3':
                                echo 'Wednesday 4:15 p.m.';
                                break;
                            case '4':
                                echo 'Thursday 8:30 a.m.';
                                break;
                            case '5':
                                echo 'Thursday 9:45 a.m.';
                                break;
                            case '6':
                                echo 'Thursday 11:00 a.m.';
                                break;
                            case '7':
                                echo 'Thursday 2:00 p.m.';
                                break;
                            case '8':
                                echo 'Thursday 3:15 p.m.';
                                break;
                            case '9':
                                echo 'Thursday 4:30 p.m.';
                                break;
                            case '10':
                                echo 'Friday 9:00 a.m.';
                                break;
                            case '11':
                                echo 'Friday 10:15 a.m.';
                                break;
                            default:
                                break;
                        }
                    ?></p>
                    <p><?php echo the_tags( '<span class="session-tags label">Tags: ', ', ' ,'</span>'); ?></p>
            </div>
        </article>