$(function () {

  $('.search').keyup(function () {
    var search = $(this).val();
    $.post('http://192.168.11.3:10002/core/ajax/search.php', { search: search }, function (data) {
      $('.search-result').html(data);
    });
  });
});
