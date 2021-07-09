<div class="row position-relative">
    <div class="col-12 p-0">
        <section class="quote-customer">
            <div class="quote-customer-wrap">
                <div id="carouselQuote" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        $reviews = get_terms( array(
                            'taxonomy' => 'reviews-category',
                            'hide_empty' => false,
                             //'parent'   => 0
                        ) );
                        $i = 0;
                        if(!empty($reviews)){ 
                            foreach($reviews as $review) { ?>
                        <li data-target="#carouselQuote" data-slide-to="<?php echo $i; ?>"
                            class="<?php if($i==0) echo 'active'; $i++; ?>"></li>
                        <?php } ?>
                        <?php } ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php 
                        $i = 0;
                        if(!empty($reviews)){ 
                            foreach($reviews as $review) { 
                                $review_id = $review->term_id;
                                $review_content =  get_field('review_content',$review->taxonomy.'_'.$review_id) ;
                                ?>
                        <div class="carousel-item <?php if($i==0) echo 'active'; $i++; ?>">
                            <p class="quote-content"><q><?php echo $review_content ; ?></q></p>
                            <div class="quote-author"><?php echo $review->name; ?></div>
                        </div>
                        <?php } ?>
                        <?php } ?>

                    </div>
                </div>
                <div class="quote-orverlay"></div>
            </div>
        </section>
    </div>
</div>
