<?php
function create_faqs_shortcode($atts, $content = NULL) {
    // Attributes
    $atts = shortcode_atts(
            array(
        'title' => 'Auto Maintenance FAQs',
            ), $atts, 'faqs'
    );
    // Attributes in var
    $title = $atts['title'];
    // Output Code
    $output = '<h3>' . $title . '</h3><div class="faq-items-sm panel-group" id="accordionFaq">';
    $output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
}

add_shortcode('faqs', 'create_faqs_shortcode');

function create_faqsitem_shortcode($atts) {
    // Attributes
    $atts = shortcode_atts(
            array(
        'question' => 'How often should I get my oil changed?',
        'answer' => 'For a long time and sometimes still today, standard practice at many lube shops is to suggest oil changes every three months or 3,000 miles. In order to know when the best time to get your oil changed is, check the owner’s manual of your specific model for manufacturer-recommended intervals.',
        'faq_active' => '',
            ), $atts, 'faqs_item'
    );
    // Attributes in var
    $question = $atts['question'];
    $answer = $atts['answer'];
    $faq_active = $atts['faq_active'];
    ob_start();
    $rand = uniqid();


    ?>
    <div class="faq-item-sm panel panel-default">
        <div class="panel-heading" id="headingTwo">
            <h4 class="panel-title"><a data-toggle="collapse" href="#faq<?php echo $rand; ?>" data-parent="#accordionFaq" class="collapsed">  <?php echo $question; ?><span class="caret-toggle closed">–</span><span class="caret-toggle opened">+</span></a></h4>
        </div>
        <div id="faq<?php echo $rand; ?>" class="panel-collapse collapse <?php if($faq_active == true){ echo 'in';} ?> ">
            <div class="panel-body">
                 <?php echo $answer; ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('faqs_item', 'create_faqsitem_shortcode');
