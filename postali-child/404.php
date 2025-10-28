<?php
/**
 * Template Name: 404
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="page-right">
    <span class="page-title">Page Not Found</span>
    <span class="arrows">
        <a href="javascript:scrollUp()"><span class="icon-up-arrow"></span></a>
        <a href="javascript:scrollDown()"><span class="icon-down-arrow"></span></a>
    </span>
</div>

<div class="page-left">
    <section class="title-section">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    }
                    ?>
                    <div class="spacer-30"></div>
                    <h1>404 - Page Not Found</h1>
                </div>
            </div>
        </div> 
    </section>

    <section>
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <p>Sorry, we weren't able to locate that page. Click here to return to the homepage.</p>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>