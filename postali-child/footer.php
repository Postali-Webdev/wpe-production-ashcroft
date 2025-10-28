<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>

<footer>
    <div class="container">
        <div class="columns">
            <div class="column-25">
                <img src="/wp-content/uploads/2020/04/Ashcroft-firm-logo.svg" title="Ashcroft Law Firm" class="footer-logo">
                <div class="spacer-30"></div>
                <p><span class="gold">E</span> &nbsp; <a href="mailto:info@ashcroftlawfirm.com" title="Email Ashcroft Law Firm today">info@ashcroftlawfirm.com</a>
            </div>
            <div class="column-75">
            <p class="small-gold">/ office locations</p>
                <?php if( have_rows('office_details','options') ): ?>
                <?php while( have_rows('office_details','options') ): the_row(); 
                        $location_name = get_sub_field('location_name');
                        $location_phone = get_sub_field('location_phone');
                        $google_map_link = get_sub_field('google_map_link');
                    ?>
                    <div class="location-column">
                        <div class="column location-name"><?php echo $location_name; ?></div>
                        <div class="column location-number"><a href="tel:<?php echo $location_phone; ?>" title="Call our <?php echo $location_name; ?> office" target="_blank"><?php echo $location_phone; ?></a></div>
                        <div class="column map-link"><a href="<?php echo $google_map_link; ?>" title="Map link for our <?php echo $location_name; ?> office" target="_blank">Google Maps <span class="icon-right-arrow"></span></a></div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?> 
                <div class="spacer-30"></div>
                <p class="xsmall"><a href="/contact/" title="Contact Ashcroft" class="stretched gold">VISIT OUR CONTACT PAGE</a> &nbsp; <span class="icon-right-arrow"></span></p>
            </div>
            <div class="spacer-90"></div>
            <div class="footer-utility">
                <p class="small">© 2024 &nbsp; / &nbsp; <a href="/sitemap/" title="Site Map">Site Map</a> &nbsp; / &nbsp; <a href="/privacy-policy/" title="Privacy Policy">Privacy Policy</a><p>
                <?php if(is_page_template('front-page.php')) { ?>
                <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px;" /></a>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>

</div> <!-- this ends the page container -->

<?php wp_footer(); ?>

</body>
</html>


