@extends("app")

@section('head_title', getcong_widgets('about_title') .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

    <div class="sub-banner"
         style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
        <div class="overlay">
            <div class="container">
                <h1>Checkout</h1>
            </div>
        </div>
    </div>
    <div class="what-we-do">
        <div class="container about_block">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php if(!empty($order)) {?>
                <?php
                    $item_names = json_decode($order->item_name, 'true');
                    $item_price = json_decode($order->item_price, 'true');
                ?>
                <div class="summary text-center">
                    <h1>Order Summary</h1>
                    <br/>
                    <table>
                        <tr>
                            <td><h5><strong>Item Name</strong></h5></td>
                            <td>
                                <?php foreach ($item_names as $item_name) {?>
                                <strong>{{ $item_name }}</strong>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><h5><strong>Cart Subtotal</strong></h5></td>
                            <td><strong>{{ $item_price[0] }}</strong></td>
                        </tr>
                        <tr>
                            <td><h5><strong>Order Total</strong></h5></td>
                            <td><strong>{{ $item_price[0] }}</strong></td>
                        </tr>
                    </table>
                </div>
                <br/>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="SBEC4TXW4NZUW">
                    <input type="hidden" name="lc" value="US">
                    <input type="hidden" name="item_name" value="{{ $item_names[0] }}">
                    <input type="hidden" name="item_number" value="1">
                    <input type="hidden" name="amount" value="{{ $item_price[0] }}">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="button_subtype" value="services">
                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
                    <input type="hidden" name="return" value="<?= url('/payment_confirmation') ?>">
                    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
                <?php } ?>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

@endsection