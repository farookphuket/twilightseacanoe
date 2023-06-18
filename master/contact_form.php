        
<script src="https://www.google.com/recaptcha/api.js?render=6LfYYXklAAAAAIh-b4MbH_aA6mkrrvd06G2_x5z2"></script>
<script>
	grecaptcha.ready(function() {
    grecaptcha.execute('6LfYYXklAAAAAIh-b4MbH_aA6mkrrvd06G2_x5z2', {action:'validate_captcha'})
    .then(function(token) {
            document.getElementById('g-recaptcha-response').value = token;
        });
});
</script>

        <div class="form">
          <form action="forms/contact_mail.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div> 