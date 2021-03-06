<section class="woocommerce-order-details">
    <h2 class="woocommerce-order-details__title"><?php echo $method_title ?></h2>
    <noscript><h1>You must enable javascript in order to confirm your order</h1></noscript>

    <strong id="masari_payment_messages">

        <span class="masari_payment_unpaid">Please pay the amount due to complete your transactions. Your order will expire in <span class="masari_payment_expire_time"></span> if payment is not received.</span>

        <span class="masari_payment_partial">We have received partial payment. Please pay the remaining amount to complete your transactions. Your order will expire in <span class="masari_payment_expire_time"></span> if payment is not received.</span>

        <span class="masari_payment_paid">We have received your payment in full. Please wait while amount is confirmed. Approximate confirm time is <span class="masari_confirm_time"></span>. <?php if(is_wc_endpoint_url('order-received')): ?><br/>You can <a href="<?php echo $details['my_order_url']; ?>">check your payment status</a> anytime in your account dashboard.<?php endif; ?></span>

        <span class="masari_payment_confirmed">Your order has been confirmed. Thank you for paying with Masari!</span>

        <span class="masari_payment_expired">Your order has expired. Please place another order to complete your purchase.</span>

        <span class="masari_payment_expired_partial">Your order has expired. Please contact the store owner to receive refund on your partial payment.</span>

    </strong>
    <!-- this section strongly inspired by gnock of Masari -->
    <div class="masari_payment_send_info">
        <div class="data-box">
            <label>Amount</label>
            <input id="masari_total_due" type="text" readonly class="value" value="">
            <button href="#" class="button copy clipboard" title="Copy Amount" data-clipboard-target="#masari_total_due">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" version="1"><path d="M504 118c-6-6-12-8-20-8H365c-11 0-23 3-36 11V27c0-7-3-14-8-19s-12-8-20-8H183c-8 0-16 2-25 6-10 4-17 8-22 13L19 136c-5 5-9 12-13 22-4 9-6 17-6 25v192c0 7 3 14 8 19s12 8 19 8h156v82c0 8 2 14 8 20 5 5 12 8 19 8h274c8 0 14-3 20-8 5-6 8-12 8-20V137c0-8-3-14-8-19zm-175 52v86h-85l85-86zM146 61v85H61l85-85zm56 185c-5 5-10 12-14 21-3 9-5 18-5 25v73H37V183h118c8 0 14-3 20-8 5-6 8-12 8-20V37h109v118l-90 91zm273 229H219V292h119c8 0 14-2 19-8 6-5 8-11 8-19V146h110v329z"/></svg>
            </button>
        </div>
        <div class="data-box">
            <label>Address</label>
            <input id="masari_integrated_address" type="text" readonly class="value" value="">
            <button href="#" class="button copy clipboard" title="Copy Address" data-clipboard-target="#masari_integrated_address">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" version="1"><path d="M504 118c-6-6-12-8-20-8H365c-11 0-23 3-36 11V27c0-7-3-14-8-19s-12-8-20-8H183c-8 0-16 2-25 6-10 4-17 8-22 13L19 136c-5 5-9 12-13 22-4 9-6 17-6 25v192c0 7 3 14 8 19s12 8 19 8h156v82c0 8 2 14 8 20 5 5 12 8 19 8h274c8 0 14-3 20-8 5-6 8-12 8-20V137c0-8-3-14-8-19zm-175 52v86h-85l85-86zM146 61v85H61l85-85zm56 185c-5 5-10 12-14 21-3 9-5 18-5 25v73H37V183h118c8 0 14-3 20-8 5-6 8-12 8-20V37h109v118l-90 91zm273 229H219V292h119c8 0 14-2 19-8 6-5 8-11 8-19V146h110v329z"/></svg>
            </button>           
        </div>
        
        <?php if($show_qr): ?>
        <div class="qr-code">
            <div id="masari_qr_code"></div>
        </div>
         <?php endif; ?>

    </div>          
    
    <div class="data-box">  
        <ul>
            <li style="display:none">
                Total order amount:
                <strong>
                    <span id="masari_total_amount"></span> MSR
                </strong>
            </li>
            <li>
                Total paid:
                <strong>
                    <span id="masari_total_paid"></span> MSR
                </strong>
            </li>
            <li>
                Exchange rate:<strong id="masari_exchange_rate"></strong>
            </li>
        </ul>
    </div>

    <table id="masari_tx_table" style="display:none;">
        <thead>
            <tr>
                <th>Transaction id</th>
                <th>Height</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div id="masari_tx_none" style="display:none;">
    </div>

</section>

<div id="masari_toast"></div>

<script type="text/javascript">
    var masari_show_qr = <?php echo $show_qr ? 'true' : 'false'; ?>;
    var masari_ajax_url = '<?php echo $ajax_url; ?>';
    var masari_explorer_url = '<?php echo MASARI_GATEWAY_EXPLORER_URL; ?>';
    var masari_details = <?php echo $details_json; ?>;
</script>