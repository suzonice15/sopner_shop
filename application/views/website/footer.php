

<! --------------------------- Footer Area ------------------------------------ !>
<div class="wrapper">
    <footer>
        <div class="footer_nav">
            <div class="wrapper">
                <div class="sc_callouts">
                    <h4>Shopper Central</h4>
                    <ul>
                        <li><a href="#">Sign-in/Register</a></li>
                        <li><a href="#">Our Policies</a></li>
                        <li><a href="#">Payment Policy</a></li>
                        <li><a href="#">FAQs (Help)</a></li>
                        <li><a href="#">Service Centers</a></li>
                        <li><a href="#">User Agreement</a></li>
                    </ul>
                </div>
                <div class="sc_callouts">
                    <h4>Merchant Central</h4>
                    <ul>
                        <li><a href="">Merchant Sign In</a></li>
                        <li><a href="">Merchant Registration</a></li>
                        <li><a href="">How Does It Work</a></li>
                        <li><a href="">Pricing</a></li>
                        <li><a href="">Fulfillment by Bdeshishop</a></li>
                        <li><a href="">Policies &amp; Rules</a></li>
                        <li><a href="">Agreement</a></li>
                        <li><a href="">Merchant Ratings</a></li>
                    </ul>
                </div>
                <div class="sc_callouts">
                    <h4>About Us</h4>
                    <ul>
                        <li><a href="">Band of Trust</a></li>
                        <li><a href="">Bdeshishop History</a></li>
                        <li><a href="">In the Press</a></li>
                        <li><a href="">Careers</a></li>
                        <li><a href="">Blog</a></li>
                    </ul>
                </div>
                <div class="sc_callouts">
                    <h4>Contact Us</h4>
                    <ul>
                        <li><a href="">Customer Inquiries</a></li>
                        <li><a href="">Customer Support Support</a></li>
                        <li><a href="">Merchant Support</a></li>
                        <li><a href="">Merchant Inquiries</a></li>
                        <li><a href="">Bulk Orders</a></li>
                        <li><a href="">Press</a></li>
                    </ul>
                </div>

            </div>
        </div>


        <div class="sc_connection">
            <div class="wrapper">
                <div class="sc_socialconnection" itemscope="" itemtype="http://schema.org/Organization">
                    <h3>Keep In Touch <span>(Social Connect)</span></h3>
                    <ul>
                        <link itemprop="url" href="https://bdeshishop.com//">
                        <li>
                            <a itemprop="sameAs" href="http://facebook.com/bdeshishop" class="sc_ft_facbook"></a>
                        </li>
                        <li>
                            <a itemprop="sameAs" href="http://pinterest.com/bdeshishop/" class="sc_ft_pintrest"></a>
                        </li>
                        <li>
                            <a itemprop="sameAs" href="http://twitter.com/bdeshishop" class="sc_ft_twitter"></a>
                        </li>
                        <li>
                            <a itemprop="sameAs" href="https://plus.google.com/" class="sc_ft_google"></a>
                        </li>
                        <li>
                            <a itemprop="sameAs" href="https://www.youtube.com/channel/" class="sc_ft_youtube"></a>
                        </li>
                        <li>
                            <a itemprop="sameAs" href="http://www.linkedin.com/company/bdeshishop" class="sc_ft_linkedin"></a>
                        </li>
                    </ul>
                </div>
                <div class="sc_trustedpayment">
                    <h3>100% Secure and Trusted Payment</h3>

                    <img src="" alt="">
                </div>
            </div>
        </div>


        <div class="scfooter_bottom">
            <div class="wrapper">

                <ul> <li><a href="#">Developed by </a><a href="https://facebook.com/lijonhabib"><font color="#6bc44d">Moshiur Rahaman</font></a> On behalf of <a href="https://mcp-bd.com"><font color="#6bc44d">MCP-BANGLADESH</font></a></li>

                </ul>
                <div class="sc_copyright">
                    <p>Copyright ©2018 BdeshiShop.Com</p>&nbsp;	&nbsp;
                    <img src="https://bdeshishop.com//assets/images/Logo-gif.gif" alt="">
                </div>
            </div>
        </div>
    </footer>
</div>


<div class="right shopping-cart-tab light visible"  >
    <a href="javascript:void(0)" title="View your shopping shopping-cart" class="shopping-cart-parent  >" style="background-color: #e89504">
        <span class="contents product_count">0</span>
        <span class="woocommerce-Price-amount amount product_total">0.00&nbsp;<span class="woocommerce-Price-currencySymbol">Tk.</span>
        </span>
    </a>
    <div class="widget woocommerce widget_shopping_cart"><div class="widget_shopping_cart_content">
            <ul class="cart_list product_list_widget ">
            </ul>
            <div id="widget_shopping_cart_bottom">
                <p class="total" style="text-align: center;font-size: 21px;"><strong>Total:</strong> <span class="woocommerce-Price-amount amount total_cart_amount">88.00&nbsp;<span class="woocommerce-Price-currencySymbol">Tk.</span></span></p>
                <p class="buttons" style="text-align: center; margin-top: 13px;">
                    <button type="button" class="btn orange-white btn_effect" onclick="CheckOut()">Order Now</button>
                </p>
            </div>
        </div>
    </div>
</div>


<script src="<?=base_url()?>assets/fontend/js/home/common_header.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type='text/javascript' src='<?=base_url()?>assets/fontend/js/home/pixelyoursite.js'></script>
<script type='text/javascript' src='<?=base_url()?>assets/fontend/js/home/sweetalert.min.js?ver=4.9.5'></script>
<script type='text/javascript' src='<?=base_url()?>assets/fontend/js/home/custom.js?ver=4.9.7'></script>



<noscript>
</noscript>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.boka').slick({
            autoplay:true,
        });
        jQuery('.boka1').slick({
            slidesToShow: 6,
            slidesToScroll: 3,
        });
    });
</script>
<script>
    var websiteURL = 'https://bdeshishop.com/';
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '698139620380461',
            xfbml      : true,
            version    : 'v2.10'
        });
        FB.AppEvents.logPageView();
    };
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118813918-1"></script>


</body>
</html>