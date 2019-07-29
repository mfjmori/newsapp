$(function() {
  $('.delete-button').on('click', function() {
    let deleteConfirm = confirm('削除しますか？');

    if(deleteConfirm) {
      let articleId = $(this).data('article-id');

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: '/stocks/' + articleId,
        type: 'POST',
        data: {'_method' : 'DELETE'}
      })
      .done(function() {
        let article = $('#article-' + articleId);
        article.remove();
        $('.alert').remove();
        $('main').prepend('<p class="alert alert-success fixed-top">記事を削除しました</p>');
        setTimeout("$('.alert').fadeOut('slow')", 2000);
      })
      .fail(function() {
        $('.alert').remove();
        $('main').prepend('<p class="alert alert-danger fixed-top">記事を削除できませんでした</p>');
        setTimeout("$('.alert').fadeOut('slow')", 2000);
      });
    }
  });
});
