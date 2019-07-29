$(function() {
  let appendSuccessMessage = () => {
    $('.alert').remove();
    $('main').prepend('<p class="alert alert-success fixed-top">記事をストックしました</p>');
    setTimeout("$('.alert').fadeOut('slow')", 2000);
  }

  let appendErrorMessage = () => {
    $('.alert').remove();
    $('main').prepend('<p class="alert alert-danger fixed-top">記事をストックできませんでした</p>');
    setTimeout("$('.alert').fadeOut('slow')", 2000);
  }

  $('.article-form').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    let formData = new FormData(this);
    let url = $(this).attr('action');
    let formId = $(this).attr("id"); 

    $.ajax({
      url: url,
      type: "POST",
      data: formData,
      dataType: 'json',
      processData: false,
      contentType: false
    })
    .done(function(json) {
      if (json.code == 201) {
        let submitButton = $(`[form = '${formId}']`);
        submitButton.before(
          '<button type="button" disabled class="form-submit btn btn-outline-secondary"><i class="fas fa-check mr-1"></i>ストック中</button>'
          );
        submitButton.remove();
        appendSuccessMessage();

      } else if(json.code == 400 ) {
        appendErrorMessage();
      }
    })
    .fail(function() {
      appendErrorMessage();
    })
  });
});
