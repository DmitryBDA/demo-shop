<form method="post" action="#" class="woocommerce-cart-form">
  <table class="shop_table shop_table_responsive cart">
    <thead>
    <tr>
      <th class="product-remove">&nbsp;</th>
      <th class="product-thumbnail">&nbsp;</th>
      <th class="product-name">Название</th>
      <th class="product-price">Цена</th>
      <th class="product-quantity">Количество</th>
      <th class="product-subtotal">Итого</th>
    </tr>
    </thead>
    <tbody>
    @foreach($obCartList as $item)
      <tr>
        <td class="product-remove">
          <a class="remove" href="#">×</a>
        </td>
        <td class="product-thumbnail">
          <a href="single-product-fullwidth.html">
            <img width="180" height="180" alt="" class="wp-post-image"
                 src="single-product-fullwidth.html">
          </a>
        </td>
        <td data-title="Product" class="product-name">
          <div class="media cart-item-product-detail">
            <a href="single-product-fullwidth.html">
              <img width="180" height="180" alt="" class="wp-post-image"
                   src="assets/images/products/cart-1.jpg">
            </a>
            <div class="media-body align-self-center">
              <a href="single-product-fullwidth.html">{{$item->name}}</a>
            </div>
          </div>
        </td>
        <td data-title="Price" class="product-price">
        <span class="woocommerce-Price-amount amount">
            <span class="woocommerce-Price-currencySymbol"></span>{{$item->price}}
        </span>Р
        </td>
        <td class="product-quantity" data-title="Quantity">
          <div class="quantity">
            <label for="quantity-input-1">Quantity</label>
            <input data-product-id="{{$item->id}}" id="quantity" type="number" name="quantity" value="{{$item->quantity}}"
                   title="Qty" class="input-text qty text _ajax_quantity" size="4">
          </div>
        </td>
        <td data-title="Total" class="product-subtotal">
          <span class="woocommerce-Price-amount amount">
              <span class="woocommerce-Price-currencySymbol"></span>{{$item->price * $item->quantity}} Р
          </span>
          <a data-product-id="{{$item->id}}" title="Remove this item" class="remove _remove_from_cart" href="#">×</a>
        </td>
      </tr>
    @endforeach
    <tr>
      <td class="actions" colspan="6">
        <div class="coupon">
          <label for="coupon_code">Coupon:</label>
          <input type="text" placeholder="Coupon code" value="" id="coupon_code"
                 class="input-text" name="coupon_code">
          <input type="submit" value="Apply coupon" name="apply_coupon" class="button">
        </div>
        <input type="submit" value="Update cart" name="update_cart" class="button">
      </td>
    </tr>
    </tbody>
  </table>
  <!-- .shop_table shop_table_responsive -->
</form>
<!-- .woocommerce-cart-form -->
<div class="cart-collaterals">
  <div class="cart_totals">
    <h2>Cart totals</h2>
    <table class="shop_table shop_table_responsive">
      <tbody>
      <tr class="cart-subtotal">
        <th>Subtotal</th>
        <td data-title="Subtotal">
                              <span class="woocommerce-Price-amount amount">
                                  <span class="woocommerce-Price-currencySymbol"></span>{{ Cart::getTotal() }}</span> Р
        </td>
      </tr>
      <tr class="shipping">
        <th>Shipping</th>
        <td data-title="Shipping">Flat rate</td>
      </tr>
      <tr class="order-total">
        <th>Total</th>
        <td data-title="Total">
          <strong>
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol"></span>{{ Cart::getTotal() }}</span>
            Р
          </strong>
        </td>
      </tr>
      </tbody>
    </table>
    <!-- .shop_table shop_table_responsive -->
    <div class="wc-proceed-to-checkout">
      <form class="woocommerce-shipping-calculator" method="post" action="#">
        <p>
          <a class="shipping-calculator-button" data-toggle="collapse" href="#shipping-form"
             aria-expanded="false" aria-controls="shipping-form">Calculate shipping</a>
        </p>
        <div class="collapse" id="shipping-form">
          <div class="shipping-calculator-form">
            <p id="calc_shipping_country_field" class="form-row form-row-wide">
              <select rel="calc_shipping_state" class="country_to_state"
                      id="calc_shipping_country" name="calc_shipping_country">
                <option value="">Select a country…</option>
                <option value="AX">Åland Islands</option>
                <option value="AF">Afghanistan</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AO">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AQ">Antarctica</option>
                <option value="AG">Antigua and Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AM">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
              </select>
            </p>
            <p id="calc_shipping_state_field" class="form-row form-row-wide validate-required">
            <span>
                <select id="calc_shipping_state"
                        name="calc_shipping_state">
                    <option
                      value="">Select an option…</option>
                    <option
                      value="AP">Andhra Pradesh</option>
                    <option
                      value="AR">Arunachal Pradesh</option>
                    <option value="AS">Assam</option>
                    <option value="BR">Bihar</option>
                    <option
                      value="CT">Chhattisgarh</option>
                    <option value="GA">Goa</option>
                    <option value="GJ">Gujarat</option>
                    <option value="HR">Haryana</option>
                    <option
                      value="HP">Himachal Pradesh</option>
                    <option
                      value="JK">Jammu and Kashmir</option>
                    <option
                      value="JH">Jharkhand</option>
                    <option
                      value="KA">Karnataka</option>
                    <option value="KL">Kerala</option>
                    <option
                      value="MP">Madhya Pradesh</option>
                    <option
                      value="MH">Maharashtra</option>
                    <option value="MN">Manipur</option>
                    <option
                      value="ML">Meghalaya</option>
                    <option value="MZ">Mizoram</option>
                    <option value="NL">Nagaland</option>
                    <option value="OR">Orissa</option>
                    <option value="PB">Punjab</option>
                    <option
                      value="RJ">Rajasthan</option>
                    <option value="SK">Sikkim</option>
                    <option
                      value="TN">Tamil Nadu</option>
                    <option
                      value="TS">Telangana</option>
                    <option value="TR">Tripura</option>
                    <option
                      value="UK">Uttarakhand</option>
                    <option
                      value="UP">Uttar Pradesh</option>
                    <option
                      value="WB">West Bengal</option>
                    <option value="AN">Andaman and Nicobar Islands</option>
                    <option
                      value="CH">Chandigarh</option>
                    <option value="DN">Dadra and Nagar Haveli</option>
                    <option
                      value="DD">Daman and Diu</option>
                    <option value="DL">Delhi</option>
                    <option
                      value="LD">Lakshadeep</option>
                    <option value="PY">Pondicherry (Puducherry)</option>
                </select>
            </span>
            </p>
            <p id="calc_shipping_postcode_field" class="form-row form-row-wide validate-required">
              <input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode"
                     placeholder="Postcode / ZIP" value="" class="input-text">
            </p>
            <p>
              <button class="button" value="1" name="calc_shipping" type="submit">Update totals
              </button>
            </p>
          </div>
        </div>
      </form>
      <!-- .wc-proceed-to-checkout -->
      <a class="checkout-button button alt wc-forward" href="checkout.html">
        Proceed to checkout</a>
      <a class="back-to-shopping" href="shop.html">Back to Shopping</a>
    </div>
    <!-- .wc-proceed-to-checkout -->
  </div>
  <!-- .cart_totals -->
</div>
<!-- .cart-collaterals -->
