/**
 * Process contact form
 */
const submit = document.getElementById('contact-form-submit');
const name_input = document.getElementById('contact-form-name');
const email_input = document.getElementById('contact-form-email');
const message_input = document.getElementById('contact-form-message');
submit.addEventListener('click', function(e) {
  e.preventDefault();
  // Clear all error fields
  const error_messages = document.querySelectorAll('.tooltip');
  for (let i = 0; i < error_messages.length; i++) {
    error_messages[i].parentNode.removeChild(error_messages[i]);
  }

  // Validate inputs
  let name = name_input.value;
  if (name == '' || name == 'type your name') {
    const name_input_tooltip = document.createElement('span');
    name_input_tooltip.classList.add('tooltip');
    name_input_tooltip.textContent = name_input.dataset.originalTitle;
    name_input.parentNode.insertBefore(name_input_tooltip, name_input);
    name_input.focus();
    return false;
  }
  let email = email_input.value;
  if (email == '' || email == 'type your email') {
    const email_input_tooltip = document.createElement('span');
    email_input_tooltip.classList.add('tooltip');
    email_input_tooltip.textContent = email_input.dataset.originalTitle;
    email_input.parentNode.insertBefore(email_input_tooltip, email_input);
    email_input.focus();
    return false;
  }
  const filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
  if (!filter.test(email)) {
    const email_input_tooltip = document.createElement('span');
    email_input_tooltip.classList.add('tooltip');
    email_input_tooltip.textContent = 'invalid email address';
    email_input.parentNode.insertBefore(email_input_tooltip, email_input);
    email_input.focus();
    return false;
  }
  let message = message_input.value;
  if (message == '' || message == 'type your message') {
    const message_input_tooltip = document.createElement('span');
    message_input_tooltip.classList.add('tooltip');
    message_input_tooltip.textContent = message_input.dataset.originalTitle;
    message_input.parentNode.insertBefore(message_input_tooltip, message_input);
    message_input.focus();
    return false;
  }

  // Create Modal with Spinner
  const modalAjax = document.querySelector('.modal-ajax');
  const modalAjaxSpinner = document.querySelector('.modal-ajax__spinner');
  const modalAjaxMessage = document.querySelector('.modal-ajax__message');
  modalAjax.style.display = 'block';
  modalAjaxSpinner.style.display = 'block';
  document.body.style.overflow = "hidden";

  // Send data to server for processing
  const xhr = new XMLHttpRequest();
  const url = "contact-form.php";
  const params = 'name=' + name + '&email=' + email + '&message=' + message;
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      modalAjaxSpinner.style.display = 'none';
      modalAjaxMessage.style.display = 'block';
      modalAjaxMessage.textContent = 'Message Sent';
      
      // Remove message after 3 sec
      setTimeout(function() {
        modalAjaxMessage.textContent = '';
        modalAjaxMessage.style.display = 'none';
        modalAjax.style.display = 'none';
        document.body.style.overflow = "initial";
      }, 3000);

      // Clear fields
      name_input.value = '';
      email_input.value = '';
      message_input.value = '';
    }
  }
  xhr.send(params);
  return false;
});