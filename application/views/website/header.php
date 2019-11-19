<?php
$uri_string = uri_string();
$site_title = get_option('site_title');
$page_title = isset($page_title) ? $page_title : $site_title;
$og_image = $logo = get_option('logo');
$favicon = get_option('icon');


if (isset($seo_title) && !empty($seo_title)) {
    $title = $seo_title;
} else {
    $title = $page_title . (!empty($uri_string) ? ' | ' . $site_title : NULL);
}


if (isset($prod_row)) {
    $og_image = get_product_meta($prod_row->product_id, 'featured_image');
    $og_image = get_media_path($og_image);
}


$cart_items = 0;
foreach ($this->cart->contents() as $key => $val) {
    if (!is_array($val) OR !isset($val['price']) OR !isset($val['qty'])) {
        continue;
    }
    $cart_items += $val['qty'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= $title ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta charset="utf-8">

    <link rel="shortcut icon" href="<?= $favicon ?>">

    <meta name="description" content="<?= isset($seo_content) ? $seo_content : $page_title ?>"/>
    <meta name="keywords" content="<?= isset($seo_keywords) ? $seo_keywords : $page_title ?>"/>
    <meta name="robots" content="noodp"/>
    <link rel="canonical" href="<?= base_url() ?>"/>
    <meta property="og:locale" content="EN"/>
    <meta property="og:url" content="<?= current_url() ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?= $page_title ?>"/>
    <meta property="og:description" content="<?= $page_title ?>"/>
    <meta property="og:image" content="<?= $og_image ?>"/>
    <meta property="og:site_name" content="<?= $site_title ?>"/>

    <link rel="image_src" href="<?= $og_image ?>"/>
    <script type='text/javascript' src='<?=base_url()?>assets/fontend/js/home/jquery.js?ver=1.12.4'></script>
    <script type='text/javascript' src='<?=base_url()?>assets/fontend/js/home/jquery-migrate.min.js?ver=1.4.1'></script>
    <script>
        var $ = jQuery;
    </script>
    <script type='text/javascript' src='<?=base_url()?>assets/fontend/js/home/homebundle.js'></script>
    <script type='text/javascript' src='<?=base_url()?>assets/fontend/js/home/cart.js?v=3'></script>

    <link rel="stylesheet" href="<?=base_url()?>assets/fontend/css/home/home.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>assets/fontend/css/home/cart.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>assets/fontend/css/home/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <! ------------------------- product carousel titlebar style --------------- !>

    <style>

        .section-heading{margin:0 0 15px;font-size:16px;line-height:20px;position:relative;}
        .section-heading .h-text,.section-heading:after{display:inline-block;-webkit-transition:.35s cubic-bezier(.39,.58,.57,1) 0s;-moz-transition:.35s cubic-bezier(.39,.58,.57,1) 0s;-o-transition:.35s cubic-bezier(.39,.58,.57,1) 0s;transition:.35s cubic-bezier(.39,.58,.57,1) 0s;}
        .section-heading .other-link{float:right;outline:0;}
        .section-heading .other-link .h-text{margin-left:0;color:#484848;font-weight:400;text-transform:capitalize;font-size:82%;padding:4px 0 4px 14px;}
        .section-heading.sh-t6:before{content:'';display:inline-block;height:3px;position:absolute;top:0;left:0;width:100%;}
        .section-heading.sh-t6>.main-link>.h-text{position:relative;padding:0 11px;color:#fff;}
        .section-heading.sh-t6 .h-text{padding:0;text-transform:uppercase;line-height:32px;}
        .section-heading.sh-t6.sh-s3:before{top:inherit;bottom:0;height:3px;margin-top:0;}
        .section-heading.sh-t6.sh-s3>.main-link>.h-text:after,.section-heading.sh-t6.sh-s3>.main-link>.h-text:before{content:'';display:inline-block;position:absolute;top:0;width:0;height:0;border-bottom:30px solid #000;border-right:20px solid transparent;z-index:1;right:-20px;background-color:transparent!important;}
        .mtab-main-term-2.mtab-main-term-2.section-heading.sh-t6:before,.main-term-2.section-heading.sh-t6:before,.mtab-main-term-2.mtab-main-term-2.section-heading.sh-t6>.main-link>.main-term-2.h-text,.mtab-main-term-2.mtab-main-term-2.section-heading.sh-t6>.main-link>.main-term-2.h-text:before{background-color:#24a3b5;}
        .mtab-main-term-2.mtab-main-term-2.section-heading.sh-t6.sh-s3>.main-link>.main-term-2.h-text:before{border-bottom-color:#000000;}
        /*!.section-heading.sh-t6.sh-s3>.main-link>.h-text:after{border-bottom-color:rgba(255,255,255,.43);z-index:2;-webkir-box-shadow:-2px 2px 2px rgba(0,0,0,.1);-moz-box-shadow:-2px 2px 2px rgba(0,0,0,.1);box-shadow:-2px 2px 2px rgba(0,0,0,.1);}
        */
        .swal-content__input, .swal-content__textarea{border: 1px solid rgba(0,0,0,.14) !important;}
    </style>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TJW25CN');</script>
    <!-- End Google Tag Manager -->

</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJW25CN"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!      -------------------------   Top Scroll ------------------------------------------------>



<!      -------------------------            Header  ------------------------------------------------>
<div class="sc_header">
    <div class="ffix_header removeAbc">
        <div class="wrapper">


            <form id="home_page_search" method="get" action="https://bdeshishop.com/search">
            <div class="sc_search">
            <span id="search">
                 <input type="text" id="autocomplete" value="" placeholder="What are you looking for?" onfocus="autoComplete(this)"  onkeyup="searchItem(this)" autocorrect="off" autocapitalize="off" autocomplete="off" spellcheck="false" name="s"/>
                <input type="hidden" name="product_cat" value="0">
                    <input type="hidden" name="post_type" value="product">
                <input type="submit" value="" onclick="searchTrigger()">
                <button type="submit" class="srch_action btn orange">Search</button>
                <div class="srch_sugg_lst" style="display:none;">
                  <ul id="search-result"></ul>
                </div>
            </span>
            </div>
                                    <div style="float: right;margin: 21px 0 0 0; ">
                        <input id="mobileNuberTotrack" type="text" placeholder="&#x1F50E; এখানে ফোন নাম্বার দিন" style="text-indent: 10px; width: 200px; background-color: #e9f6f7; background-clip: padding-box; border: #dbf0f2 solid 1px; font-size: 15px; color: #353535; font-weight: 500; height: 39px;"/>
                        <div class="sc_rlinks_btm orange" style="font-size: 13px; cursor: pointer; margin: 0; padding: 10px 23px" onclick="trackOrder()">
                            <div>অর্ডার ট্র্যাক করুন</div>
                        </div>
                    </div>
                            </form>
            <! ---------- !>

        </div>
    </div>
</div>
<!         ----------------------- Main Navigation  -------------------------------->
<div class="main_navigation">
    <div class="ffix nav-down">
        <div class="wrapper">
            <ul>
                <li id="nav_1" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Footwear</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/footwear-all/" alt="">All Footwear</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/footwear-all/mens-shoes/" alt="">Men's Shoes</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/footwear-all/womens-shoes/" alt="">Women's Shoes</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/footwear-all/casual-shoes/" alt="">Casual Shoes</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/footwear-all/formal-shoes/" alt="">Formal Shoes</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/footwear-all/loofer/" alt="">Loofer</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/footwear-all/sandal-slippers/" alt="">Sandal & Slippers</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/footwear-all/discounted-shoes/" alt="">Discounted Shoes</a></li>

                                </ul></div></div></div></li>


                <li id="nav_2" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Jewellery</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/" alt="">All Jewellery</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/rings/" alt="">Rings</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/neckless/" alt="">Neckless</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/jewellery-sets/" alt="">Jewellery Sets</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/payel/" alt="">Payel</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/ear-rings/" alt="">Ear Rings</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/bracelets/" alt="">Bracelets</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/couple-rings/" alt="">Couple Rings</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/couple-neckless/" alt="">Couple Neckless</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/pendent/" alt="">Pendent</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/bracelet-watches/" alt="">Bracelet Watches</a></li>

                                </ul></div></div></div></li>


                <li id="nav_3" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Watches</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/watch-all/" alt="">All Watches</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/watch-all/mens-watches/" alt="">Men's Watches</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/watch-all/womens-watches/" alt="">Women's Watches</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/jewllery-all/jewellery-sets/" alt="">Matching Watches</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/watch-all/smart-watches/" alt="">Smart Watches</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/watch-all/led-watches/" alt="">Led Watches</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/watch-all/couple-watches/" alt="">Couple Watches</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/watch-all/wall-clock/" alt="">Wall Clock</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/watch-all/table-clock/" alt="">Table Clock</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/watch-all/projection-clock/" alt="">Projection Clock</a></li>

                                </ul></div></div></div></li>



                <li id="nav_4" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Shaver & Trimmer</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/shaver-trimmer-all/" alt="">All Shaver & Trimmer</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/shaver-trimmer-all/mens/" alt="">Men's Shaver & Trimmer</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/watch-all/womens-watches/" alt="">Women's Shaver & Trimmer</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/shaver-trimmer-all/kids/" alt="">Kid's Trimmer</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/shaver-trimmer-all/nose-trimmer/" alt="">Nose & Ear Trimmer</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/shaver-trimmer-all/multi-functional/" alt="">Multi Functional</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/shaver-trimmer-all/non-rechargeable/" alt="">Non Rechargeable</a></li>
                                    <li><a target="_blank" href="#" alt="">Philips Pro Brand</a></li>

                                </ul></div></div></div></li>




                <li id="nav_5" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Home & Living</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/homeliving-all/" alt="">All Home & Living Applience</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/homeliving-all/cleaning/" alt="">Cleaning</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/homeliving-all/home-decorate/" alt="">Home Decorate</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/homeliving-all/clothing-rack/" alt="">Clothing Rack</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/homeliving-all/shoe-rack/" alt="">Shoe Rack</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/homeliving-all/anti-mosquito-device/" alt="">Anti Mosquito Devices</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/homeliving-all/bathroom-ccessories/" alt="">Bathroom Accessories</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/homeliving-all/safety-security/" alt="">Safety & Security</a></li>

                                </ul></div></div></div></li>


                <li id="nav_6" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Kitchen & Dining</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/kitchen-dining-all/" alt="">All Kitchen & Dining Accessories</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/kitchen-dining-all/slicer-cutter/" alt="">Slicer & Cutter</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/kitchen-dining-all/blender-mixer/" alt="">Blender & Mixer</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/kitchen-dining-all/kitchener-shelf/" alt="">Kitchener Shelf</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/kitchen-dining-all/choclate-cake-maker/" alt="">Choclate & Cake Maker</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/kitchen-dining-all/jucer/" alt="">Jucer</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/kitchen-dining-all/bbq-grill-maker/" alt="">BBQ Grill Maker</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/kitchen-dining-all/kitchen-accessories/" alt="">Kitchen Accessories</a></li>

                                </ul></div></div></div></li>


                <li id="nav_7" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Gadget & Electronics</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/gadget-electronics-all/" alt="">All Gadget & Electronics Products</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/gadget-electronics-all/unique-products/" alt="">Unique Products</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/gadget-electronics-all/laptop-table/" alt="">Laptop Tables</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/gadget-electronics-all/power-bank/" alt="">Power Bank</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/gadget-electronics-all/electric-product/" alt="">Electric Products</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/gadget-electronics-all/tools/" alt="">Tools</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/gadget-electronics-all/handheld-products/" alt="">Handheld Products</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/gadget-electronics-all/electric-iron-gadget-electronics-all/" alt="">Electric Iron</a></li>

                                </ul></div></div></div></li>


                <li id="nav_8" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Health & Beauty</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/health-beauty-all/" alt="">All Health & Beauty Products</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/health-beauty-all/face-care/" alt="">Face Care</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/health-beauty-all/hair-care/" alt="">Hair Care</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/health-beauty-all/foot-care/" alt="">Foot Care</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/health-beauty-all/slimming-fitness/" alt="">Slimming & Fitness</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/gadget-electronics-all/tools/" alt="">Therapy & Massager</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/health-beauty-all/health-checker/" alt="">Health Checker</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/health-beauty-all/fast-aid/" alt="">Fat Aid</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/health-beauty-all/beauty-accessories/" alt="">Beauty Accessories</a></li>

                                </ul></div></div></div></li>


                <li id="nav_9" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Bag & Bagpack</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/bag-backpack-all/" alt="">All Bag & Bagpack</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/bag-backpack-all/mens-bag-backpack/" alt="">Men's Bagpack</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/bag-backpack-all/womens-bag-backpack/" alt="">Women's Bagpack</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/bag-backpack-all/casual-bag/" alt="">Casual Bagpack</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/bag-backpack-all/office-bag/" alt="">Office Bagpack</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/bag-backpack-all/laptop-bag/" alt="">Laptop Bags</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/bag-backpack-all/wallet/" alt="">Wallet</a></li>

                                </ul></div></div></div></li>


                <li id="nav_10" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Toy, Kids & Baby</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/babys-zone/" alt="">All Toy, Kids & Baby's Product</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/babys-zone/baby-bouncer/" alt="">Baby Bouncer</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/babys-zone/baby-carrier/" alt="">Baby Carrier</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/babys-zone/kids-learning/" alt="">Kid's Learning</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/babys-zone/kids-toy/" alt="">Kid's Toy</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/babys-zone/baby-dresses/" alt="">Kid's Dresses</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/babys-zone/baby-accessories/" alt="">Kid's Accessories</a></li>

                                </ul></div></div></div></li>


                <li id="nav_11" onmouseover="mouseoverNavigation(this);"><a href="javascript:void(0);">Clothing</a>
                    <div class="menu_wrap_sub" id="rightpanel_4">
                        <div class="ul_menu_block">
                            <div id="column_0" class="s_col">
                                <ul class="list_blocks">
                                    <li class="g_heading" column="0" it="0"><a target="_blank" href="https://bdeshishop.com/product-category/dress-all/" alt="">All Clothing</a></li>

                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/dress-all/mens-wear/" alt="">Men's Wear</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/babys-zone/baby-carrier/" alt="">Women's Wear</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/dress-all/kids-wear/" alt="">Kid's Wear</a></li>
                                    <li><a target="_blank" href="https://bdeshishop.com/product-category/dress-all/couple/" alt="">Couple Wear</a></li>

                                </ul></div></div></div></li>
            </ul>
        </div>
    </div>
</div>

<! ---------------------------------- Promo Navigation   --------------------------------------- !>

<div class="promo_navigation" style="display: none;">
    <div class="wrapper">
        <ul id="promo_strip">

            <li><a target="_blank" id="promo-1" rev="" href="#">Flash Sales of the Month</a></li>
            <li><a target="_blank" id="promo-8" rev="" href="">Up to 70% Off</a></li>
            <li><a target="_blank" id="promo-8" rev="" href="">Buy 1 Get 1 Free</a>
            <li><a target="_blank" id="promo-8" rev="" href="">Membership's Benefits</a></li>
        </ul>
    </div>
</div>

<! -----------        important Script ---------------- !>






<! ------------------------------ Small Gap Before Slider ----------------------------- !>

<div class="ecod_strip">
    <div class="wrapper">
        <div class="eCOD_notification">
            <ul class="regular eCOD_slider" id="eCOD_block">
            </ul>
        </div>
    </div>
</div>
