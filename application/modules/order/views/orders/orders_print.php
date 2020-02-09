<div class="col-md-offset-0 col-md-12">
    <div class="box box ">


        <div class="box-body">
            <section class="content">
                <div class="row">
                    <div class="col-md-8">
                        <?php
                        $order_id = $order->order_id;
                        $service_cost = $order->order_id;
                        ?>

                        <form method="POST" id="order_update" action="<?= base_url() ?>order-update"
                              enctype="multipart/form-data">
                            <div class="row">
                                <div class=" col-md-10">
                                    <h4 style="text-align: center
                                    "><b>ShopnerShop.com</h4>
                                    <h6 style="text-align: center
                                    "> <b>118/H Distelary Road,Gandaria ,Dhaka</b></h6>
                                    <h6 style="text-align: center
                                    "> <b><?= get_option('phone') ?></b></h6>
                                <table class="table  table-bordered">
                                    <tr>
                                        <td colspan="6">Memo Id-<?=$order->memo_id?></td>



                                        <td style="text-align: right;
                                    ">Date:<?php echo date('d-m-Y')?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Name : <?=$order->customer_name?></td>


                                        <td style="text-align: right;
                                    ">Phone:<?=$order->customer_phone?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">Adreess: <?=$order->customer_address?></td>


                                    </tr>

                                    </table>
                                    </div>
                                <div class=" col-md-10">
                                    <div class="box box-primary" style="border:2px solid #ddd">
                                        <div class="box-header" style="background-color:#ddd">
                                            <h3 class="box-title">Order Info</h3>
                                        </div>
                                        <div class="box-body">




									<table class="table  table-bordered">
                                        <tr>

                                            <th class="name" width="5%">Sl</th>
                                            <th class="name" width="5%">Code</th>
                                            <th class="name" width="30%">Product</th>
                                            <th class="quantity text-center" width="10%">Quantity</th>
                                            <th class="price text-center" width="10%">Price</th>
                                            <th class="total text-right" width="10%">Sub-Total</th>
                                        </tr>
                                        <?php
                                        $product_ids = array();
                                        $count = 0;
                                        $subtotal_price=0;
                                        $item_count=0;
                                        $product_items = unserialize($order->products);



                                        $html = null;
                                        if (is_array($product_items['items'])) {
                                            foreach ($product_items['items'] as $product_id => $item) {







                                                $this->db->select('sku');
                                                $this->db->where('product_id', $product_id);
                                                $productlink_data_sku = $this->db->get('product')->row();
                                                $productlink_data_sku = $productlink_data_sku->sku;
                                                //  $product_id=0;
                                                $_product_title = substr($item['name'], 0, 50);

                                                $totall = intval(preg_replace('/[^\d.]/', '', $item['subtotal']));

                                                $subtotal_price += $totall ;
                                                //  $subtotal_price= $subtotal_price+ $item['subtotal'] ;
                                                $item_count=$item_count+$item['qty'];

?>

                                               <tr>
	<td><?php echo ++$count ?></td>
	<td><?php echo $productlink_data_sku ?></td>
														<td><?php echo  $_product_title  ?> </td>




</td><td class="text-center">
															<?php echo
                                                            $item['qty'] ?>
														</td>
														<td class="text-center">৳ <?php echo  $item['price'] ?></td>
														<td class="text-right">৳   <?php echo  $item['subtotal'] ?></td>
													</tr>


                                        <?php
                                            }

                                            ?>
                                            <tr>
                                                <td>

                                                </td>
                                                <td colspan="4" style="text-align: right;">
Delevery Cost
                                                </td>

                                                <td style="text-align: right;">



                                                    ৳ <span id="subtotal_cost"> <?= $order->shipping_charge; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>

                                                </td>
                                                <td colspan="4" style="text-align: right;">
                                                   Total
                                                </td>

                                                <td style="text-align: right;">



                                                    ৳ <span id="subtotal_cost"> <?php echo $order->order_total.'.00'?></span>
                                                </td>
                                            </tr>
                                        <?php
                                        }




                                        ?>
                                        <tr>


                                    </table>





                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </section>
        </div>



        <script>

            window.onload = function () {
                    window.print();
                }

                </script>






