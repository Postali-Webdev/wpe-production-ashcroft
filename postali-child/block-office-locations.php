<section class="location-boxes black">
    <div class="container">
        <div class="columns">
            <?php if( have_rows('office_details','options') ): ?>
            <?php while( have_rows('office_details','options') ): the_row(); 
                    $location_name = get_sub_field('location_name');
                    $location_address = get_sub_field('location_address');
                    $location_phone = get_sub_field('location_phone');
                    $fax_number = get_sub_field('fax_number');
                    $location_image = get_sub_field('location_image');
                    $google_map_link = get_sub_field('google_map_link');
                ?>
                <div class="location-box">
                    <img src="<?php echo $location_image; ?>" alt="Our <?php echo $location_name; ?> office">
                    <div class="address">
                        <h4><?php echo $location_name; ?></h4>
                        <div class="spacer-15"></div>
                        <p class="small"><?php echo $location_address; ?></p>
                        <span class="map-link"><a href="<?php echo $google_map_link; ?>" title="Map link for our <?php echo $location_name; ?> office" target="_blank">Google Maps <span class="icon-right-arrow"></span></a></span>
                    </div>
                    <div class="phone-fax">
                        <div class="column">
                            <span class="gold">P</span> &nbsp;&nbsp;<a href="tel:<?php echo $location_phone; ?>" title="Call our <?php echo $location_name; ?> office" target="_blank"><?php echo $location_phone; ?></a>
                        </div>
                        <div class="column">
                            <span class="gold">F</span> &nbsp; <?php echo $fax_number; ?>
                        </div>
                    </div>
                            
                </div>
            <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>
</section>  