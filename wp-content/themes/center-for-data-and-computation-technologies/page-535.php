<?php
    get_header();
?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/regist.css">
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container_regist">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title"><?php the_title(); ?></h2>
                        <div class="form-group">
                            <input type="text" name="name" id="input_name_re" placeholder="Your Name"/>
                            <p class="input_name_re"> <i class="fa fa-star-o"></i> Enter Your Name</p>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="input_email_re" placeholder="Your Email"/>
                            <p class="input_email_re"> <i class="fa fa-star-o"></i> Email address does not match</p>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" id="input_pass_re" placeholder="Password"/>
                            <p class="input_pass_re"> <i class="fa fa-star-o"></i> Passwork Empty</p>
                        </div>
                        <div class="form-group">
                            <input type="password" name="re_pass" id="input_re_pass_re" placeholder="Repeat your password"/>
                            <p class="input_re_pass_re"> <i class="fa fa-star-o"></i> The two passwords do not match</p>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php bloginfo('template_directory') ?>/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="/?page_id=537" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
get_footer();