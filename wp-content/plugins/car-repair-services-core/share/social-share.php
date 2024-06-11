<?php
function car_repair_services_social_share() {
?>
    <div class="col-auto">
        <div class="social-box">
            <div class="social-box__title"><?php esc_html_e('Share:','car-repair-service-core');?></div>
            <div class="social-box__list">
                <ul>
                    <li><a class="icon icon-59439" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>"></a></li>
                    <li><a class="icon icon-8800" href="https://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?>-<?php echo esc_url(get_permalink()); ?>"></a></li>
                    <li><a class="icon icon-733614" href="https://instagram.com/share?url=<?php echo esc_url(get_permalink()) ?>"></a></li>
                </ul>
            </div>
        </div>
    </div>
<?php
}