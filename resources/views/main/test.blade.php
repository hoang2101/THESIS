<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>

<body>
    <div id="paypal-button"></div>
    <form role="form" method="POST" action="{{ route('testsubmit') }}">
    					{{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="addHotel">
    	<input type="submit" name="addhotel" value="ok">
    </form>

    <script>
        paypal.Button.render({

            env: 'production', // Or 'sandbox',

            commit: true, // Show a 'Pay Now' button

            payment: function() {
                // Set up the payment here
            },

            onAuthorize: function(data, actions) {
                // Execute the payment here
           }

        }, '#paypal-button');
    </script>
    <!-- Load the required components. -->
<script src="https://js.braintreegateway.com/web/3.17.0/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.17.0/js/paypal-checkout.min.js"></script>

<!-- Use the components. We'll see usage instructions next. -->
<script>
braintree.client.create({
  authorization: 'CLIENT_TOKEN_FROM_SERVER'
}, function (clientErr, clientInstance) {

  // Stop if there was a problem creating the client.
  // This could happen if there is a network error or if the authorization
  // is invalid.
  if (clientErr) {
    console.error('Error creating client:', clientErr);
    return;
  }

  // Create a PayPal Checkout component.
  braintree.paypalCheckout.create({
    client: clientInstance
  }, function (paypalCheckoutErr, paypalCheckoutInstance) {

    // Stop if there was a problem creating PayPal Checkout.
    // This could happen if there was a network error or if it's incorrectly
    // configured.
    if (paypalCheckoutErr) {
      console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
      return;
    }

    // Set up PayPal with the checkout.js library
    paypal.Button.render({
      env: 'production', // or 'sandbox'

      payment: function () {
        return paypalCheckoutInstance.createPayment({
          flow: 'checkout', // Required
          amount: 10.00, // Required
          currency: 'USD', // Required
          locale: 'en_US',
          enableShippingAddress: true,
          shippingAddressEditable: false,
          shippingAddressOverride: {
            recipientName: 'Scruff McGruff',
            line1: '1234 Main St.',
            line2: 'Unit 1',
            city: 'Chicago',
            countryCode: 'US',
            postalCode: '60652',
            state: 'IL',
            phone: '123.456.7890'
          }
        });
      },

      onAuthorize: function (data, actions) {
        return paypalCheckoutInstance.tokenizePayment(data)
          .then(function (payload) {
            // Submit `payload.nonce` to your server
          });
      },

      onCancel: function (data) {
        console.log('checkout.js payment cancelled', JSON.stringify(data, 0, 2));
      },

      onError: function (err) {
        console.error('checkout.js error', err);
      }
    }, '#paypal-button').then(function () {
      // The PayPal button will be rendered in an html element with the id
      // `paypal-button`. This function will be called when the PayPal button
      // is set up and ready to be used.
    });

  });

});
</script>
</body>
</html>