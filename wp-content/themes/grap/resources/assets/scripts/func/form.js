export function initContactFormValidation() {
  console.log('hoooooooooo');

  $('.wpcf7-form .form-control').focusout(function () {
    checkFormValidation(this);
  });

  $('.wpcf7-form .wpcf7-submit').click(function () {
    $('.wpcf7-form .form-control').each(function () {
      checkFormValidation(this);
    });
  });
}

function checkFormValidation(el) {
  const value = $(el).val();
  const type = $(el).attr('type');
  const wrapper = $(el).parents('.form-group');
  let errors = 0;

  if (value.trim() === '') {
    wrapper.addClass('empty').removeClass('valid invalid-email invalid-phone');
    errors += 1;
  } else {
    wrapper.removeClass('empty');

    if (type === 'email') {
      if (!validateEmail(value)) {
        wrapper.addClass('invalid-email');
        errors += 1;
      } else {
        wrapper.removeClass('invalid-email').addClass('valid');
      }
    } else if (type === 'tel') {
      if (!validatePhone(value)) {
        wrapper.addClass('invalid-phone');
        errors += 1;
      } else {
        wrapper.removeClass('invalid-phone').addClass('valid');
      }
    } else {
      wrapper.addClass('valid');
    }
  }

  return errors === 0;
}

/*eslint-disable */
function validateEmail(email) {
  const regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return regex.test(String(email).toLowerCase());
}
/*eslint-enable */
function validatePhone(phone) {
  const regex = /^[+]?[0-9()/ -]*$/;
  return regex.test(String(phone));
}
