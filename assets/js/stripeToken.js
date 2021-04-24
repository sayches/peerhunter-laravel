
$(function() {

			var stripe = Stripe("pk_test_51Gzz8uANahksIG1K5rQAHi93Kl1rV5qU3PlezXrIAv5KeFciIfyqO4359HoVfVrVPOGXAjtPPXl0dNiUTgEQlVJ800HdNIQKPI");
			var elements = stripe.elements();
		   	var style = {
		   		base: {
		   			color: '#32325d',
		   			lineHeight: '18px',
		   			fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
		   			fontSmoothing: 'antialiased',
		   			fontSize: '16px',
		   			'::placeholder': {
		   				color: '#aab7c4'
		   			}
		   		},
		   		invalid: {
		   			color: '#fa755a',
		   			iconColor: '#fa755a'
		   		}
		   	};
		    // Create an instance of the card Element
		   	//var card = elements.create('card', {style: style});
		   
		    // Handle form submission
		   	var form = document.getElementById('payment-form');
		   	form.addEventListener('submit', function(event) {
		   		event.preventDefault();
		   		Stripe.card.createToken({
			        number: $('.card-number').val(),
			        cvc: $('.card-cvc').val(),
			        exp_month: $('.card-expiry-month').val(),
			        exp_year: $('.card-expiry-year').val()
			    }, stripeResponseHandler);
		   		
		   	});

		    function stripeResponseHandler(status, response) {
		        if (response.error) {
		            $('.error')
		                .removeClass('hide')
		                .find('.alert')
		                .text(response.error.message);
		        } else {
		            // token contains id, last4, and card type
		            var token = response['id'];
		            $('.card_token').val(token);
	   				
	   				$('form[name="payment-form"]').submit();
		        }
		    }
		  
	});