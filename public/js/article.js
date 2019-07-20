$(function() {
  // 記事のhttpを生成する
  let getArticleHtml = (index, article) => {
    let urlToImage = (article.urlToImage) ? article.urlToImage : "#";
    let title = article.title;
    let description = article.description;
    let url = article.url;
    let publishedAt = article.publishedAt;
    let source = article.source.name;
    let html = 
      `<a href="${url}" class="show-detail" target="_blank" data-index="${index}">
        <div class="card my-3">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="${urlToImage}" class="card-img-top">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">${title}</h5>
                <p class="card-text">${description}</p>
                <p><span class="card-source text-muted mr-2">${source}</span>${publishedAt}<small class="card-date text-muted"></small></p>
              </div>
            </div>
          </div>
        </div>
      </a>`
    return html;
    
  };

  $.ajax({
    url:'https://newsapi.org/v2/top-headlines?' +
        'country=jp&' +
        'apiKey=f83368c03a674f18b9fc1a48ac264a74',
    type:'GET',
    })
    // Ajaxリクエストが成功した時発動
    .done( (data) => {
        $.each(data.articles,function(index, article) {
          let html = getArticleHtml(index, article);
          console.log(html);
          $('.articles-container').append(html);
        });
    })
    // Ajaxリクエストが失敗した時発動
    .fail( (data) => {
        console.log(data);
    })
});
