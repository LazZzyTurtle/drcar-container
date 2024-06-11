<?php
class car_repair_servicesTeam{
        public  $colno, $mask,$style;
        public  function __construct(){
            add_shortcode( 'car_repair_services_team_carousel', array($this, 'car_repair_services_team_carousel_func'));
            add_shortcode( 'car_repair_services_team', array($this, 'car_repair_services_team_func'));
        }
        public  function car_repair_services_team_carousel_func ($atts = array(), $content = null)
        {
            extract(shortcode_atts(array(
                'team_col' => '2',
                'team_style'=> '2'
            ), $atts));


            $changed_atts = shortcode_atts(array(
                'slides_to_show' => '4',
                'slides_to_scroll' => 'true',
                'infinite' => 'true',
                'autoplay' => 'true',
                'autoplay_speed' => '2000',
                'arrows' => 'true',
                'dots' => 'true',
            ), $atts);
            wp_localize_script( 'custom', 'ajax_team', $changed_atts);
            $this->colno = $team_col;
            $this->style = $team_style;
            if($this->style==2) :
                $output = '<div class="row person-carousel">';
                    $output .=  do_shortcode($content);
                $output .= '</div>';
            else:
                $output = '<div class="row">';
                    $output .=  do_shortcode($content);
                $output .= '</div>';
            endif;
            $this->colno = null;
            $this->style = null;
            return $output;
        }


        public  function car_repair_services_team_func ($atts, $content = null)
        {
            extract( shortcode_atts( array(
                'name' => '',
                'designation' => '',
                'description' => '',
                'social_facebook' => '',
                'social_twitter' => '',
                'social_instagram' => '',
                'image' => '',
            ), $atts ));
            $column_no = $this->colno;

            switch((int)$column_no){
                case 3:
                    $colclass = 'col-md-4 col-sm-4 col-xs-12';
                    break;
                case 4:
                    $colclass = 'col-md-3 col-sm-4 col-xs-12';
                    break;
                default:
                    $colclass = 'col-sm-6 col-xs-12';
                    break;
            }
            $attachement_url = wp_get_attachment_url((int)$image);

            ob_start();
            if ( $this->style==2):
            ?>
            <div class="<?php echo esc_attr($colclass)?>">
                <div class="person">
                    <div class="image image-scale-color"> <?php echo wp_get_attachment_image((int)$image, 'full');?>
                        <div class="hover"></div>
                    </div>
                    <h5 class="name"><?php echo wp_kses_post($name) ;?></h5>
                    <h6 class="position"><?php echo wp_kses_post($designation);?></h6>
                    <div class="text"><?php echo wp_kses_post($description);?></div>
                    <div class="link">
                        <?php if(isset($social_facebook)&&(!empty($social_facebook))) :?>
                            <a class="icon icon-facebook-logo" href="<?php echo esc_url($social_facebook);?>"></a>
                        <?php endif;?>
                        <?php if(isset($social_twitter)&&(!empty($social_twitter))) :?>
                            <a class="icon icon-twitter-logo" href="<?php echo esc_url($social_twitter);?>"></a>
                        <?php endif;?>
                            <?php if(isset($social_instagram)&&(!empty($social_instagram))) :?>
                        <a class="icon icon-instagram-logo" href="<?php echo esc_url($social_instagram);?>"></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php else:  ?>
            <div class="<?php echo esc_attr($colclass)?>">
                <div class="person person-hor">
                    <div class="image image-scale-color"><?php echo wp_get_attachment_image((int)$image, 'full');?>
                        <div class="hover"></div>
                    </div>
                    <div class="person-info">
                        <h5 class="name"><?php echo wp_kses_post($name) ;?></h5>
                        <h6 class="position"><?php echo wp_kses_post($designation);?></h6>
                        <div class="text"><?php echo wp_kses_post($description);?></div>
                        <div class="link">
                        <?php if(isset($social_facebook)&&(!empty($social_facebook))) :?>
                            <a class="icon icon-facebook-logo" href="<?php echo esc_url($social_facebook);?>"></a>
                        <?php endif;?>
                        <?php if(isset($social_twitter)&&(!empty($social_twitter))) :?>
                            <a class="icon icon-twitter-logo" href="<?php echo esc_url($social_twitter);?>"></a>
                        <?php endif;?>
                            <?php if(isset($social_instagram)&&(!empty($social_instagram))) :?>
                        <a class="icon icon-instagram-logo" href="<?php echo esc_url($social_instagram);?>"></a>
                        <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            endif;
            return ob_get_clean();
        }
    }
    
    new car_repair_servicesTeam();