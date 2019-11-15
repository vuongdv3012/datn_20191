<!-- <section class="breadcrumb breadcrumb_bg" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2><?php the_title(); ?></h2>
                        <p>Home &nbsp; <span>//</span> &nbsp; <?php the_title(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- end khoi tieu de duoi --> 
<?php 
    $text1 = 'Tìm kiếm';
    $text2 = 'Danh mục tin';
    $text3 = 'Tin mới nhất';
    $text4 = 'Tác giả';
    $text5 = 'Bình luận';
    $text6 = 'Đọc thêm';
    $text7 = 'Bài cũ';
    $text8 = 'Bài tiếp';
    if (isset($_GET['lang']) && $_GET['lang'] == 'en') {
        $text1 = 'Search';
        $text2 = 'List New';
        $text3 = 'Recent New';
        $text4 = 'Auth';
        $text5 = 'Comment';
        $text6 = 'Read more';
        $text7 = 'Older posts';
        $text8 = 'Next posts';
    }
?>
<!-- Noi dung trang tin -->
<div class="tintuc">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
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
                            <span class="author"><?php echo $text4; ?> <?php echo get_the_author(); ?></span> / <span class="comment-count"><?php echo get_comments_number(); ?> <?php echo $text5; ?></span> / <span><?php echo get_the_category()['0']->name; ?></span>
                        </div>
						<p><?php the_content(); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 wow fadeInRight">
                <form action="" class="search-form">
                    <input type="text" class="search-field" placeholder="<?php echo $text1; ?>">
                    <input type="submit" class="search-submit">
                </form>
                <div class="widget wow fadeInUp">
                    <h2 class="widget-title"><?php echo $text2; ?></h2>
                    <ul>
                        <?php 
                            $data_categorys = get_categories();
                            foreach ($data_categorys as $data_category) { ?>
                                <li><a href="<?php echo get_category_link($data_category->term_id); ?>"> <?php echo $data_category->name; ?> <span class="so">(<?php echo $data_category->category_count; ?>)</span></a></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="widget widget_recent_entries wow fadeInRight">
                    <h2 class="widget-title"><?php echo $text3; ?></h2>
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