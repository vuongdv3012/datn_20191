<section class="breadcrumb breadcrumb_bg" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2><a href="<?php echo get_page_link(10); ?>"><?php echo  get_the_title(10); ?></a> / <a href=""><?php the_title(); ?></a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- end khoi tieu de duoi -->
<div class="lastest_project">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-60">
                    <h3><?php the_title(); ?></h3>
                    <div class="seperator"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div>
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-lg-3" style="margin-left: 1px #777 solid;">
                <div class="row center"><p style="width: 100%;"><strong>Tài liệu, văn bản(Download)</strong></p></div>
                <div class="row">
                    <ul class="list-group tai_lieu">
                        <?php
                            $data_Documents = new WP_Query(array('post_type' => 'document'));
                                while ( $data_Documents->have_posts() ) :
                                    $data_Documents->the_post();
                        ?>
                        <li class="list-group-item"><a href="<?php echo get_field('upload_document')['url']; ?>"><?php the_title(); ?></a></li>
                        <?php
                            endwhile; // End of the loop.
                            wp_reset_query();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="center gap fade-down section-heading no-display animated fadeInDown appear">
    <h2 class="main-title">My Team</h2>
    <hr>
</div> <!-- end khoi gioi thieu my team-->

<div class="container">
    <div id="meet-the-team" class="row">
        <?php
            $data_Menber = new WP_Query(array('post_type' => 'data_member_page'));
                while ( $data_Menber->have_posts() ) :
                    $data_Menber->the_post();
        ?>
        <div class="col-md-3 col-xs-6">
            <div class="center team-member">
                <img class="img-responsive img-thumbnail bounce-in no-display animated bounceIn appear" src="<?php echo get_field('avatar_cua_tv'); ?>" alt="">
                <div class="team-content fade-up no-display animated fadeInUp appear">
                    <h5><?php the_title(); ?><small class="role muted"><?php echo get_field('chuc_vu_thanh_vien'); ?></small></h5>
                    <p><?php echo get_field('loi_gioi_thieu_tv'); ?></p>
                    <a class="btn btn-social btn-facebook" href="<?php echo get_field('dia_chi_facebook'); ?>"><i class="fa fa-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="<?php echo get_field('dia_chi_gmail'); ?>"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
        <?php
            endwhile; // End of the loop.
            wp_reset_query();
        ?>
    </div>
</div> <!-- end khoi my team-->

<div class="top-content">
    <div class="container-fluid">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid mx-auto d-block" alt="img1">
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid mx-auto d-block" alt="img2">
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid mx-auto d-block" alt="img3">
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid mx-auto d-block" alt="img4">
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid mx-auto d-block" alt="img5">
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid mx-auto d-block" alt="img6">
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid mx-auto d-block" alt="img7">
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid mx-auto d-block" alt="img8">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<style>
    @media (min-width: 768px) and (max-width: 991px) {
    /* Show 4th slide on md if col-md-4*/
    .carousel-inner .active.col-md-4.carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -33.3333%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
}
@media (min-width: 576px) and (max-width: 768px) {
    /* Show 3rd slide on sm if col-sm-6*/
    .carousel-inner .active.col-sm-6.carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -50%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
}
@media (min-width: 576px) {
    .carousel-item {
        margin-right: 0;
    }
    /* show 2 items */
    .carousel-inner .active + .carousel-item {
        display: block;
    }
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item {
        transition: none;
    }
    .carousel-inner .carousel-item-next {
        position: relative;
        transform: translate3d(0, 0, 0);
    }
    /* left or forward direction */
    .active.carousel-item-left + .carousel-item-next.carousel-item-left,
    .carousel-item-next.carousel-item-left + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* farthest right hidden item must be also positioned for animations */
    .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    /* right or prev direction */
    .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
    .carousel-item-prev.carousel-item-right + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
/* MD */
@media (min-width: 768px) {
    /* show 3rd of 3 item slide */
    .carousel-inner .active + .carousel-item + .carousel-item {
        display: block;
    }
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item {
        transition: none;
    }
    .carousel-inner .carousel-item-next {
        position: relative;
        transform: translate3d(0, 0, 0);
    }
    /* left or forward direction */
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* right or prev direction */
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
/* LG */
@media (min-width: 991px) {
    /* show 4th item */
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item {
        display: block;
    }
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
        transition: none;
    }
    /* Show 5th slide on lg if col-lg-3 */
    .carousel-inner .active.col-lg-3.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -25%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
    /* left or forward direction */
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* right or prev direction //t - previous slide direction last item animation fix */
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
</style>
<script>$('#carousel-example').on('slide.bs.carousel', function (e) {
    /*
        CC 2.0 License Iatek LLC 2018 - Attribution required
    */
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('.carousel-item').length;
 
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});</script>