(function() {
  jQuery(function($) {
    var $grid;
    $(".rslides").responsiveSlides({
      speed: 2000,
      random: true,
      timeout: 20000
    });
    $grid = $('.isotope').imagesLoaded(function() {
      return $grid.isotope({
        itemSelector: "li",
        layoutMode: "fitRows",
        getSortData: {
          name: '.name',
          date: '.date'
        }
      });
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
    $(".iii-readmore").readmore({
      moreLink: '<a class="square-btn" href="#">show more</a>',
      lessLink: '<a class="square-btn" href="#">show less</a>',
      embedCSS: true,
      blockCSS: 'margin-bottom: 1em;'
    });
    return this;
  });

}).call(this);
