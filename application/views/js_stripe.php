<script src="https://js.stripe.com/v3/"></script>
<script>

	var stripe = Stripe('<?php echo $this->general_settings['stripe_publish_key'] ?>');
	var elements = stripe.elements();

	// Custom styling can be passed to options when creating an Element.
	var style = {
		base: {
			fontWeight: 400,
			fontSize: '16px',
			lineHeight: '1.4',
			color: '#555',
			backgroundColor: '#fff',
			'::placeholder': {
				color: '#888',
			},
		},
		invalid: {
			color: '#eb1c26',
		}
	};


	var cardElement = elements.create('cardNumber', {
		style: style
	});
	cardElement.mount('#card-number');

	var exp = elements.create('cardExpiry', {
		'style': style
	});
	exp.mount('#card_expiry');

	var cvc = elements.create('cardCvc', {
		'style': style
	});
	cvc.mount('#card-cvc');

	// Validate input of the card elements
	var resultContainer = document.getElementById('card-errors');
	cardElement.addEventListener('change', function(event) {
		if (event.error) {
			$(this).closest('form').removeClass('jsform');
			resultContainer.innerHTML = '<p class="text-danger">'+event.error.message+'</p>';
		} else {
			$(this).closest('form').removeClass('jsform');
			resultContainer.innerHTML = '';
		}
	});

	// Create a token or display an error when the form is submitted.
	var form = document.getElementById('paymentFrm');
	form.addEventListener('submit', function(event) {

		event.preventDefault();

		stripe.createToken(cardElement).then(function(result) {
			if (result.error) {
	      // Inform the customer that there was an error.
	      var errorElement = document.getElementById('card-errors');
	      errorElement.textContent = result.error.message;
	  } else {
	      // Send the token to your server.
	      stripeTokenHandler(result.token);
	  }
	});
	});

	function stripeTokenHandler(token) {
	  // Insert the token ID into the form so it gets submitted to the server
	  var form = document.getElementById('paymentFrm');
	  var hiddenInput = document.createElement('input');
	  hiddenInput.setAttribute('type', 'hidden');
	  hiddenInput.setAttribute('name', 'stripeToken');
	  hiddenInput.setAttribute('value', token.id);
	  form.appendChild(hiddenInput);

	  // Submit the form
	  form.submit();
	}


</script>