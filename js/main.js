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
      return $(".isotope").isotope({
        sortBy: sort
      });
    });
    $(".mobile-menu").on("click", function() {
      $(".mobile-nav").slideToggle();
      $("section.background").toggleClass("blur");
      $(".viewport").toggleClass("blur");
      $("section.main").toggleClass("blur");
      return $("footer").toggleClass("blur");
    });
    return this;
  });

}).call(this);
