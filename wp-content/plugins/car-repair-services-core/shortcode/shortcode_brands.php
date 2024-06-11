<?php
Class CreateBrands {
    public static $colno=0;
    public function __construct() {
        add_shortcode('brands', array($this,'create_brands_shortcode'));
        add_shortcode('brands_item', array($this,'create_brandsitem_shortcode'));
    }

    public function create_brands_shortcode($atts, $content = null) {
        // Attributes
        $atts = shortcode_atts(
                array(
            'title' => 'We Repair All Makes of Automobiles',
            'sub_title' => 'Find here your vehicle',
            'btn_close_txt' => 'View All Makes',
            'btn_open_txt' => 'Show Less Makes',
            'button_action' => '1',
            
                ), $atts, 'brands'
        );
    
    
        // Attributes in var
        $title = $atts['title'];
        $sub_title = $atts['sub_title'];
        $btn_close_txt = $atts['btn_close_txt'];
        $btn_open_txt = $atts['btn_open_txt'];
    
        // Output Code
        $output = '<div class="container">'
                . '<div class="text-center"><h2 class="h-lg">' . $title . '</h2> <p class="info">' . $sub_title . '</p></div>'
                . '<div class="brands-grid">';
        $output .= do_shortcode($content);
        $output .= '</div><div class="divider-lg"></div> <div class="text-center">';
          if(self::$colno > 7){ 
            
            $output .=  '<a href="javascript:void(0);" class="btn btn-border view-all-brands js-view-all-brands active"><span>+ '.$btn_close_txt.'</span><span>- '.$btn_open_txt.'</span></a>';
          }
        
             $output .=  '</div></div>';
        self::$colno = null;
        return $output;
        
    }
    
    
    
    // Create Shortcode brands_item
    // Use the shortcode: [brands_item image=""]
    public function create_brandsitem_shortcode($atts, $content = null) {
        // Attributes
        $atts = shortcode_atts(
                array(
            'image' => '',
            'url' => '',
                ), $atts, 'brands_item'
        );

        self::$colno++;
        // Attributes in var
        $image = $atts['image'];
        $url = $atts['url'];
        $attachement = wp_get_attachment_image_src((int) $image);
        ob_start()
        ?>
        <?php if($url != ''){ ?>
        <a href="<?php echo esc_url($url);?>">
        <img src="<?php
        if ($attachement != array()) {
            echo esc_url($attachement[0]);
        }
        ?>" alt="image">
        </a>
       <?php }else{ ?>
        <img src="<?php
        if ($attachement != array()) {
            echo esc_url($attachement[0]);
        }
        ?>" alt="image">
       <?php } ?>
    
        <?php
       
        return ob_get_clean();
    }
}

new CreateBrands();