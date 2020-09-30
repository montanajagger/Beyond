<!-- <link rel="stylesheet" href="https://www.paytabs.com/theme/express_checkout/css/express.css">
<script src="https://www.paytabs.com/theme/express_checkout/js/jquery-1.11.1.min.js"></script>
<script src="https://www.paytabs.com/express/express_checkout_v3.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
Button Code for PayTabs Express Checkout
<div class="PT_express_checkout"></div>
<script type="text/javascript">
Paytabs("#express_checkout").expresscheckout({
  settings: {
    merchant_id: "10023693",
    secret_key: "H3OKWJXONEYEFxpNhgDx1KnC79gaWpsDthop1leO0ctGKSt287AaRXMZ6392tCGWU4mVqAKrNd7x6BzfJ9pA7cAdfKfInWEh00dr",
    amount: "10.00",
    currency: "USD",
    title: "Mr. John Doe",
    product_names: "Product1,Product2,Product3",
    order_id: 25,
    url_redirect: "http://localhost:8000/callback/",
    display_customer_info: 1,
    display_billing_fields: 1,
    display_shipping_fields: 0,
    language: "en",
    redirect_on_reject: 0,
    
  }
});
</script> -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment</title>
    <link rel="stylesheet" href="">
</head>
<body>
    
</body>
<script src="https://paytabs.com/express/v4/paytabs-express-checkout.js"
   id="paytabs-express-checkout"
   data-secret-key="H3OKWJXONEYEFxpNhgDx1KnC79gaWpsDthop1leO0ctGKSt287AaRXMZ6392tCGWU4mVqAKrNd7x6BzfJ9pA7cAdfKfInWEh00dr"
   data-merchant-id="10023693"
   data-url-redirect="http://localhost:8000/callback/"
   data-amount="01"
   data-currency="SAR"
   data-title="John Doe"
   data-product-names="Iphone"
   data-order-id="25"
   data-customer-phone-number="5486253"
   data-customer-email-address="john.deo@paytabs.com"
   data-customer-country-code="973"
>
</script>
</html>