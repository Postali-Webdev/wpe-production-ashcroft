<section class="attorneys black">
    <div class="container">
        <div class="columns">
            <div class="column-full centered">
            <?php if (  is_page(42) ) { ?> <!-- get link to attorneys landing page -->
                <a href="/professionals/" title="Meet our Attorneys">Meet our Attorneys</a>   
            <?php } elseif ( is_singular() ) { ?> 
                <a href="/professionals/" title="Meet our Attorneys">View All Attorneys</a>
            <?php } ?>
			</div>
        </div>
    </div>
</section>  