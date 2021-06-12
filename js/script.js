$(document).ready(function(){

  // search

  function loadSearch()
  {
    let keyword = $("#input-search").val();
    $("#table-content").load('search.php?key=' + keyword);
    // console.log(keyword);
  }

  $('#input-search').keyup(function () { 
    loadSearch();
  });

  // $('#input-search').keypress(function (e) { 
  //   if( e.which == 13 ){
  //     loadSearch();
  //   }
  // });

  $('#btn-search').click(function () {
      loadSearch();
  });


});