$(function() {
  let storageLength = 50;
  $('.save-history').on('click', function(e) {
    let tagsHistory = Cookies.getJSON('tags-history');
    let idHistory = Cookies.getJSON('id-history');
    // タグの取得、設定
    if (tagsHistory) {
      tagsHistory.unshift($(this).data('tags'));
      tagsHistory = Array.prototype.concat.apply([],tagsHistory);
      if (tagsHistory.length >= storageLength) {
        tagsHistory.length = storageLength;
      }
    } else {
      tagsHistory = $(this).data('tags');
    }
    // idの取得、設定
    if (idHistory) {
      idHistory.unshift($(this).data('id'));
      if (idHistory.length >= storageLength) {
        idHistory.length = storageLength;
      }
    } else {
      idHistory = [];
      idHistory.unshift($(this).data('id'));
    }
    // Cookieとして保存
    Cookies.set('tags-history', tagsHistory, { domain: 'localhost:8000' });
    Cookies.set('id-history', idHistory);
 });
});
