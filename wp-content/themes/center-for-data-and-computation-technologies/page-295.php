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
                            <input type="text" name="name" id="input_name_re" placeholder="UserName"/>
                            <p class="input_name_re"> <i class="fa fa-star-o"></i> Nhập tài tên tài khoản</p>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="input_email_re" placeholder="Địa chỉ Email"/>
                            <p class="input_email_re"> <i class="fa fa-star-o"></i> Địa chỉ email không hợp lệ</p>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" id="input_pass_re" placeholder="Mật Khẩu"/>
                            <p class="input_pass_re"> <i class="fa fa-star-o"></i> Không được để trống mật khẩu</p>
                        </div>
                        <div class="form-group">
                            <input type="password" name="re_pass" id="input_re_pass_re" placeholder="Repeat your password"/>
                            <p class="input_re_pass_re"> <i class="fa fa-star-o"></i> Hai mật khẩu không khớp</p>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng Ký"/>
                        </div>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php bloginfo('template_directory') ?>/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="/?page_id=297" class="signup-image-link">Tôi đã là một thành viên</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
get_footer();