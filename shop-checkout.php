<?php 
    $head_title="Purerelax | Spa & Beauty PHP Template | Checkout Page";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
	$page_title = "Checkout Page";
	require_once('parts/page-title.php');
?>

<!--checkout Start-->
<section>
  <div class="container pt-70 pb-100">
    <form class="checkout-form" id="checkout-form" action="#">
      <div class="row mt-30">
        <div class="col-md-6">
          <div class="billing-details">
            <h3 class="mb-30">Billing Details</h3>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="checkuot-form-fname">First Name</label>
                <input id="checkuot-form-fname" type="email" class="form-control" placeholder="First Name">
              </div>
              <div class="mb-3 col-md-6">
                <label for="checkuot-form-lname">Last Name</label>
                <input id="checkuot-form-lname" type="email" class="form-control" placeholder="Last Name">
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="checkuot-form-cname">Company Name</label>
                  <input id="checkuot-form-cname" type="email" class="form-control" placeholder="Company Name">
                </div>
                <div class="mb-3">
                  <label for="checkuot-form-email">Email Address</label>
                  <input id="checkuot-form-email" type="email" class="form-control" placeholder="Email Address">
                </div>
                <div class="mb-3">
                  <label for="checkuot-form-address">Address</label>
                  <input id="checkuot-form-address" type="email" class="form-control" placeholder="Street address">
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <label for="checkuot-form-city">City</label>
                <input id="checkuot-form-city" type="email" class="form-control" placeholder="City">
              </div>
              <div class="mb-3 col-md-6">
                <label>State/Province</label>
                <select class="form-control">
                  <option>Select Country</option>
                  <option>Australia</option>
                  <option>UK</option>
                  <option>USA</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="checkuot-form-zip">Zip/Postal Code</label>
                <input id="checkuot-form-zip" type="email" class="form-control" placeholder="Zip/Postal Code">
              </div>
              <div class="mb-3 col-md-6">
                <label>Country</label>
                <select class="form-control">
                  <option>Select Country</option>
                  <option>Australia</option>
                  <option>UK</option>
                  <option>USA</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Additional information</h3>
          <label for="order_comments" class="">Order notes&nbsp;<span class="optional">(optional)</span></label>
          <textarea id="order_comments" class="form-control" rows="7" placeholder="Notes about your order, e.g. special notes for delivery.">
          </textarea>
        </div>
        <div class="col-md-12 mt-30">
          <h3>Your order</h3>
          <table class="table table-striped table-bordered tbl-shopping-cart">
            <thead>
              <tr>
                <th>Photo</th>
                <th>Product Name</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="product-thumbnail"><a href="shop-product-details.php"><img alt="product" src="images/resource/products/1.jpg"></a></td>
                <td class="product-name"><a href="shop-product-details.php">Headphone</a> x 2</td>
                <td><span class="amount">$36.00</span></td>
              </tr>
              <tr>
                <td class="product-thumbnail"><a href="shop-product-details.php"><img alt="product" src="images/resource/products/2.jpg"></a></td>
                <td class="product-name"><a href="shop-product-details.php">Lagage</a> x 3</td>
                <td><span class="amount">$115.00</span></td>
              </tr>
              <tr>
                <td class="product-thumbnail"><a href="shop-product-details.php"><img alt="product" src="images/resource/products/3.jpg"></a></td>
                <td class="product-name"><a href="shop-product-details.php">Watch</a> x 1</td>
                <td><span class="amount">$68.00</span></td>
              </tr>
              <tr>
                <td>Cart Subtotal</td>
                <td>&nbsp;</td>
                <td>$180.00</td>
              </tr>
              <tr>
                <td>Shipping and Handling</td>
                <td>&nbsp;</td>
                <td>Free Shipping</td>
              </tr>
              <tr>
                <td>Order Total</td>
                <td>&nbsp;</td>
                <td>$250.00</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-12 mt-60">
          <div class="payment-method">
            <h3>Choose a Payment Method</h3>
            <ul class="accordion-box">
              <li class="accordion block active-block">
                <div class="acc-btn active">
                  <div class="icon-outer"><i class="lnr-icon-chevron-down"></i></div>
                  Credir Card / Debit Card
                </div>
                <div class="acc-content current">
                  <div class="payment-info">
                    <div class="row clearfix">
                      <div class="col-lg-6 col-md-6 col-sm-12 column">
                        <div class="field-input mb-3">
                          <input type="text" class="form-control" name="name" placeholder="Name on the Card" required="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 column">
                        <div class="field-input mb-3">
                          <input type="text" class="form-control" name="number" placeholder="Card Number" required="">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12 column">
                        <div class="field-input mb-3">
                          <input type="text" class="form-control" name="date" placeholder="Expiry Date" required="">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12 column">
                        <div class="field-input mb-3">
                          <input type="text" class="form-control" name="code" placeholder="Security Code" required="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-12 column">
                        <div class="field-input message-btn">
                          <button type="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span class="btn-title">Make Payment</span></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="accordion block">
                <div class="acc-btn">
                  <div class="icon-outer"><i class="lnr-icon-chevron-down"></i></div>
                  Direct Bank Transfer
                </div>
                <div class="acc-content">
                  <div class="payment-info">
                    <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                  </div>
                </div>
              </li>
              <li class="accordion block">
                <div class="acc-btn">
                  <div class="icon-outer"><i class="lnr-icon-chevron-down"></i></div>
                  Cheque Payment
                </div>
                <div class="acc-content">
                  <div class="payment-info">
                    <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                  </div>
                </div>
              </li>
              <li class="accordion block">
                <div class="acc-btn">
                  <div class="icon-outer"><i class="lnr-icon-chevron-down"></i></div>
                  Other Payment
                </div>
                <div class="acc-content">
                  <div class="payment-info">
                    <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!--checkout Start-->

<?php require_once('parts/footer/footer3.php'); ?>