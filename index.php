<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Contact Form</title>
</head>
<body>

  <section id="contact">
    <div class="contact-box">
      <h2 class="contact-box__title">Contact Form</h2>
        <form class="contact-form" name="contact-form" id="contact-form" method="post" action="#">
          <div class="contact-form__field">
            <input type="text" class="contact-form__control" name="name" id="contact-form-name" value=""  title="" data-original-title="name is required" placeholder="type your name">
          </div>
          <div class="contact-form__field">
            <input type="text" class="contact-form__control" name="email" id="contact-form-email" value=""  title="" data-original-title="email is required" placeholder="type your email">
          </div>
          <div class="contact-form__field">
            <textarea name="message" class="contact-form__control" id="contact-form-message" rows="4" cols="50" title="" data-original-title="message is required" placeholder="type your message"></textarea>
          </div>
          <div class="contact-form__field">
            <input type="submit" id="contact-form-submit" class="btn-primary" value="Send message">
          </div>
        </form>
      </div>
  </section>

  <div class="modal-ajax">
    <div class="modal-ajax__spinner"></div>
    <div class="modal-ajax__message"></div>
  </div>

  <script src="script.js"></script>
</body>
</html>