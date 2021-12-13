export function createNewsletterSignUpFormHandler() {
  $('.newsletter-signup-form form').submit(function (e) {
    e.preventDefault();
    const $this = $(this);
    const email = $(this).find('input[name="email"').val();
    const portalId = $(this).find('input[name="portalId"').val();
    const formGuid = $(this).find('input[name="formGuid"').val();
    const resultMessage = $(this).find('.result-message');

    if ($this.hasClass('submitting')) {
      return false;
    }

    $this.addClass('submitting');
    
    $.ajax({
      method: 'POST',
      url: '/wp-admin/admin-ajax.php',
      data: {
        action: 'submit_newsletter_form',
        email,
        portalId,
        formGuid,
      },
      success: function (res) {
        const message = res.errors ? res.errors[0].message : res.inlineMessage;
        resultMessage.text(message);
        $this.removeClass('submitting')
      },
      error: function () {
        resultMessage.text('Something went wrong!');
        $this.removeClass('submitting')
      },
    });
  });
}
