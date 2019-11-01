<?php
    get_header();
?>	
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/regist.css">
	<div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container_regist">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?php bloginfo('template_directory') ?>/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="<?php echo home_url('/?page_id=295'); ?>" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title"><?php the_title(); ?></h2>
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>

    </script>
<?php
get_footer();