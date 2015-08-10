(function() {
  jQuery(function($) {
    $(".rslides").responsiveSlides({
      speed: 2000,
      random: true,
      timeout: 20000
    });
    $(".isotope").isotope({
      itemSelector: "li",
      layoutMode: "fitRows",
      getSortData: {
        name: '.name',
        date: '.date'
      }
    });
    $(".button").on("click", function() {
      var sort;
      sort = $(this).data("sort-by");
      console.log(sort);
      return $(".isotope").isotope({
        sortBy: sort
      });
    });
    return this;
  });

}).call(this);
