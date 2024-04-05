<footer id="footer" class="sectionPadding">
    <div class="container">
        <div class="contactText">
            <h5>contact</h5>
            <ul>
                <li><span>Address:</span> 562 wellington road street 32 son francisco</li>
                <li><a href="tel:+<?php //the_field('ft_phone_number','options');?>"><span>phone:</span> +<?php //the_field('ft_phone_number','options');?></a></li>
                <li><span>hours:</span> 10:10-18:00, mon-sat</li>
            </ul>
            <h5>follow us</h5>
            <ul class="socialIcon">
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
            <div class="copyrightText">
                <p>@ 2024. <a href="#">Nurul Imran</a> CEO of CoderIT</p>
            </div>
        </div>
        <div class="aboutText">
            <h5>About</h5>
            <ul>
                <li>About us</li>
                <li>delivery information</li>
                <li>privacy policy</li>
                <li>terms & conditions</li>
                <li>contact us</li>
            </ul>
        </div>
        <div class="accountText">
            <h5>my account</h5>
            <ul>
                <li>sign in</li>
                <li>view cart</li>
                <li>my wishlist</li>
                <li>track my order</li>
                <li>help</li>
            </ul>
        </div>
        <div class="installappText">
            <h5>Install app</h5>
            <p>from app store or google play</p>
            <div class="appstore">
                <div class="singleAppstore">
                    <img src="<?php //echo get_template_directory_uri();?>/asset/img/pay/app.jpg" alt="Apple app store">
                </div>
                <div class="singleAppstore">
                    <img src="<?php //echo get_template_directory_uri();?>/asset/img/pay/play.jpg" alt="google play">
                </div>
            </div>
            <p>secured payment gateways</p>
            <div class="payment">
                <img src="<?php //echo get_template_directory_uri();?>/asset/img/pay/pay.png" alt="payment method">
            </div>
        </div>
    </div>
</footer>
</body>
<?php wp_footer ();?>