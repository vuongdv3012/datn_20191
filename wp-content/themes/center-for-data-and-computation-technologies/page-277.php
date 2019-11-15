<?php
    get_header();
?>

    <section class="breadcrumb breadcrumb_bg" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2><?php the_title(); ?></h2>
                            <p>Trang chủ &nbsp; <span>//</span> &nbsp; <?php the_title(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- end khoi tieu de duoi -->

    <!-- Noi dung trang tin -->
    <div class="tintuc">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array('posts_per_page' => 12, 'paged' => $paged );
                        $data_news = query_posts($args);
                        if ( have_posts() ) : while (have_posts()) : the_post();
                    ?>
                        <div class="mottinchuan wow fadeIn">
                            <a href="<?php the_permalink(); ?>" class="anhtin">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="" class="">
                                <div class="ngaythang">
                                    <b><?php echo get_the_date('d', get_the_ID()); ?></b>
                                    <i><?php echo get_the_date('M', get_the_ID()); ?></i>
                                </div>
                            </a>
                            <div class="noidungtin">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="thongsotin">
                                    <span class="author">Đăng bởi <?php echo get_the_author(); ?></span> / <span class="comment-count"><?php echo get_comments_number(); ?> Bình luận</span> / <span><?php echo get_the_category()['0']->name; ?></span>
                                </div>
                                <div class="trichdan">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="rmtin">Đọc thêm <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php
                        endwhile; endif;
                    ?>
                        <div class="nav-previous alignleft"><?php echo previous_posts_link( 'Older posts' ); ?></div>
                        <div class="nav-next alignright"><?php next_posts_link( 'Next posts' ); ?></div>
                    <?php 
                        wp_reset_query();
                    ?>
    
                </div>

                <div class="col-sm-3 wow fadeInRight">
                    <form action="" class="search-form">
                        <input type="text" class="search-field" placeholder="Tìm kiếm">
                        <input type="submit" class="search-submit">
                    </form>
                    <div class="widget wow fadeInUp">
                        <h2 class="widget-title">Danh mục tin tức</h2>
                        <ul>
                            <?php 
                                $data_categorys = get_categories();
                                foreach ($data_categorys as $data_category) { ?>
                                    <li><a href="<?php echo get_category_link($data_category->term_id); ?>"> <?php echo $data_category->name; ?> <span class="so">(<?php echo $data_category->category_count; ?>)</span></a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="widget widget_recent_entries wow fadeInRight">
                        <h2 class="widget-title">Tin mới nhất</h2>
                        <?php
                            $new_recent = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 5));
                            while ( $new_recent->have_posts() ) :
                                $new_recent->the_post();
                        ?>
                        <a href="" class="motitnnho">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="">
                            <b><?php the_title(); ?></b>
                            <i><?php echo get_the_date(); ?></i>
                        </a>
                        <?php
                            endwhile;
                            wp_reset_query();
                        ?>
                    </div>

                </div>
            </div>
        </div> <!-- het div container -->
    </div>

<?php
get_footer();