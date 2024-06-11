<?php
class Car_Repair_howitworks extends WPBakeryShortCode {
    public static $colno;
    public function __construct() {
        add_shortcode('how_it_works', array($this, 'create_howitworks_shortcode'));
        add_shortcode('how_it_works_item', array($this, 'create_howitworksitem_shortcode'));
    }

    public function create_howitworks_shortcode($atts, $content = null) {
        // Attributes
        $atts = shortcode_atts(
                array(
            'title' => 'How It Works',
            'sub_title' => 'We offer full service auto repair & maintenance',
            'show_item_in_row' => '',
            'extra_class' => '',

                ), $atts, 'how_it_works'
        );
        // Attributes in var
        $title = $atts['title'];
        $sub_title = $atts['sub_title'];
        $show_item_in_row = $atts['show_item_in_row'];
        $extra_class = $atts['extra_class'];

        self::$colno = $show_item_in_row;

        // Output Code
        $output = '<div class="block '.$extra_class.'">'
                . '<div class="text-center">'
                . '<h2 class="h-lg">' . $title . '</h2>'
                . '<p class="info">' . $sub_title . '</p>'
                . '</div>'
                . '<div class="row" id="stepsAnimation">';
        $output .= do_shortcode($content);
        $output .= '</div></div>';

        self::$colno = null;
        return $output;
    }


    public function create_howitworksitem_shortcode($atts, $content = null) {
        // Attributes
        $atts = shortcode_atts(
                array(
            'images' => '',
            'number' => '1',
            'text' => 'CHOOSE YOUR SERVICE',
                ), $atts, 'how_it_works_item'
        );
        // Attributes in var
        $images = $atts['images'];
        $number = $atts['number'];
        $text = $atts['text'];

        ob_start();

        $column_no = self::$colno;
        ?>
        <?php if($column_no == '2'){ ?>
          <div class="col-sm-3 col-xs-6">
        <?php }else{ ?>
          <div class="col-sm-3">
        <?php } ?>
            <div class="how-works-circle">
                <div class="step step<?php echo $number; ?>">
                    <div class="step-inside">
                        <?php
                        $image_ids = explode(',',$images);
                        $i = 1;
                        foreach( $image_ids as $image_id ){
                            $image = wp_get_attachment_image_src( $image_id, array('246', '246'));
                            ?>
                            <img src="<?php echo $image[0] ?>" alt="">
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
                <div class="how-works-number">
                    <?php echo $number; ?>
                </div>
                <div class="how-works-text">
                    <?php echo $text; ?>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}
new Car_Repair_howitworks();