


<div class="ecod_strip">
    <div class="wrapper">
        <div class="eCOD_notification">
            <ul class="regular eCOD_slider" id="eCOD_block">
            </ul>
        </div>
    </div>
</div>
<! -------------------------------------- Main Slider -------------------------------------- !>
<div class="bnnr_container">
    <div class="wrapper">


        <div class="sliding_banner">
            <div class="slider-for slick-initialized slick-slider ">
                <div class="boka">
                    <?php

                    $sliders = get_homeslider();
                    if ($sliders):
                    foreach ($sliders as $slider):
                    ?>

                    <div href="<?php echo $slider->target_url; ?>" tabindex="0">
                      <a  href="<?php echo $slider->target_url; ?>" >
                        <img alt="<?php echo $slider->homeslider_text; ?>"
                             src="<?php echo base_url();
                             echo $slider->homeslider_banner; ?>">
                          </a>
                    </div>

                    <?php endforeach;endif;?>


                </div>
            </div>
        </div>
        <! --------------------------- Slider right Content ------------------------------------ !>
        <! --------------------------- Slider below Content ------------------------------------ !>

        <! ------------------ !>
    </div>
</div>

<div class="container-fluid add_class">
    <div class="row">
        <?php
       // $adds = get_adds();
        $adds = get_result("SELECT adds_link,media_path FROM `adds`
WHERE adds_type='home' limit 3");

        if(isset($adds))
        {

        foreach ($adds as $add){
        ?>
        <div class="col-md-4 col-12 col-lg-4">
            <a target="_blank" href="<?php echo $add->adds_link;?>">
                <img class="img-fluid" src="<?php echo $add->media_path;?>" alt="">
            </a>
         </div>
        <?php } }?>

        </div>

    </div>

<! --------------------------- Main Content Area ------------------------------------ !>

<div class="container-fluid  mobile_category_show"   style="background-color: white;margin-left: 0px;">

    <div class="row mobile_add_responsive_portion" >


        <?php

        $result = get_result("SELECT * FROM `category` where parent_id=0 ORDER BY rank_order ASC");
        if(isset($result))
        {

            $i=1;
            foreach($result as $row)
            {
                $category[$row->parent_id][]=$row;
            }

            foreach($result as $row)
            {

                if($row->parent_id==0)
                {

                    if($i<=12){
                        $media =get_media_path($row->medium_banner);
                        if($row->category_name=='popular-product' or $row->category_name=='tend-product' or $row->category_name=='buy-one' or $row->category_name=='big-discount' or $row->category_name=='menbership' or $row->category_name=='footwear'){
                            continue;
                        }


                        ?>
                        <div class="middle_mobile_category">
                            <a  href="<?php echo base_url();?>category/<?php echo  $row->category_name;?>">
                                <?php if($media) { ?>
                                <img class="img-responsive" src="<?php echo $media;?>">
                            <?php } else { ?>
                                    <img class="img-responsive" src="<?php echo base_url();?>uploads/footware.jpg">

                                <?php }?>
                           
                            <h4 style="font-size: 12px;
padding: 3px 4px;
text-align: center;" ><?php echo $row->category_title;?></h4>
 </a>
                        </div>
                        <?php
                    }
                    $i++;
                }


            }


        }
        ?>



    </div>
</div>

<! ------------------------------ Small Gap Before next carousel ----------------------------- !>

<div class="ecod_strip">
    <div class="wrapper">
        <div class="eCOD_notification">
            <ul class="regular eCOD_slider" id="eCOD_block">
            </ul>
        </div>
    </div>
</div>

<! ------------------------------ Small Gap Before next carousel ----------------------------- !>





<div class="category_section_class wrapper" 
<div class="row cat_promotion_box" id="ab68">
    <?php
    $home_cat_section = explode(",", get_option('home_cat_section'));
   // echo '<pre>'; print_r($home_cat_section); echo '</pre>';
    $active_tab = 0;
if(sizeof($home_cat_section)>0){
    foreach ($home_cat_section as $home_cat) {
    $category_info = get_category_info($home_cat);
    $category_title = $category_info->category_title;
    $category_id = $category_info->category_id;
    $category_name = $category_info->category_name;
    $link = base_url().'category/'.$category_info->category_name;
    //print_r($category_info)
    $featured_image = get_media_path($category_info->medium_banner);
    //$featured_image = get_media_path($featured_image, 'thumb');


    ?>

    <h3 class="section-heading sh-t6 sh-s3 mtab-main-term-2 main-term-2 multi-tab bs-pretty-tabs bs-pretty-tabs-initialized">

        <a href="<?=$link?>" data-toggle="tab" aria-expanded="true"
           class="main-link main_carosel_category_link">
            <span class="h-text main-term-2"><?=$category_title?> </span>
        </a>

    </h3>
    <div class="tabbing">
        <div class="tabbing_products">
            <ul class="boka1 ">
                <?php
                $catproducts = get_category_products($home_cat, 10);
                if (isset($catproducts)) {
                    $i = 0;
                    foreach ($catproducts as $prod) {
                        $featured_image = get_product_meta($prod->product_id, 'featured_image');
                        $featured_image = get_media_path($featured_image, 'thumb');
                        $_product_title = strip_tags($prod->product_title);

                        $product_link = base_url() . 'product/' . $prod->product_name;


                        $discount = false;

                        $product_price = $sell_price = $prod->product_price;

                        $product_discount = $prod->discount_price;
                        $discount_type = $prod->discount_type;

                        if ($product_discount != 0) {
                            $product_discount_price = floatval($product_discount);


                            $sell_price = $product_discount_price;
                        }

                        $_product_title = strip_tags($prod->product_title);



                        ?>


                        <li class="">
                            <a
                               href="<?=$product_link?>">
                                <img src="<?php echo $featured_image;?>"
                                     data-img="<?php echo $featured_image;?>"
                                     alt="<?= $prod->product_title;?>">
                                <h4><?= $prod->product_title;?></h4>
                                <div align="center"  class="product_code" style="color: red">Code : <?= $prod->sku;?></div>
                                <p>
                                <div class="" style="color: green"><span> <?php echo formatted_price($sell_price); ?></span></div>
                                <div class="" style="color: black">
                                    <del>
                                        <?php
                                        if ($product_discount) {
                                            echo formatted_price($product_price);

                                        } ?>
                                    </del>
                                </div>
                                </p>
                            </a>
                        </li>

                    <?php } } ?>



            </ul>


        </div>
    </div>

    <?php } } ?>


</div>
</div>







<script>
    jQuery('.main_carosel_category_link').click(function () {
       var href= this.href;
        window.location=href;

    });

    </script>