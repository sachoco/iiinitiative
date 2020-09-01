(function() {
  jQuery(function($) {
    var $container, $grid, defaultOptions, hashChanged, isOptionLinkClicked, isotopeOptions;
    $(".rslides").responsiveSlides({
      speed: 2000,
      random: true,
      timeout: 20000
    });
    $container = $('.isotope');
    isotopeOptions = {};
    defaultOptions = {
      itemSelector: "li",
      layoutMode: "fitRows",
      getSortData: {
        name: '.name',
        date: '.date'
      }
    };
    $grid = $('.isotope').imagesLoaded(function() {
      return $grid.isotope(defaultOptions);
    });
    isOptionLinkClicked = false;
    $('.sort .button').on("click", function() {
      var $this, filterItem, href, option;
      $this = $(this);
      if ($this.hasClass('active')) {
        return;
      }
      // sort = $(this).data("sort-by")
      filterItem = $(this).data("filter");
      $(".sort .button").removeClass("active");
      $(this).addClass("active");
      href = $this.attr('href').replace(/^#/, '');
      option = $.deparam(href, true);
      $.extend(isotopeOptions, option);
      $.bbq.pushState(isotopeOptions);
      return isOptionLinkClicked = true;
    });
    // $(".isotope").isotope({ sortBy : sort })
    // $(".isotope").isotope({ filter : "."+filterItem })
    hashChanged = false;
    $(window).bind("hashchange", function(event) {
      var aniEngine, hashOptions, hrefObj, key, options;
      hashOptions = window.location.hash ? $.deparam.fragment(window.location.hash, true) : {};
      aniEngine = hashChanged ? 'best-available' : 'none';
      options = $.extend({}, defaultOptions, hashOptions, {
        animationEngine: aniEngine
      });
      $container.isotope(options);
      isotopeOptions = hashOptions;
      if (!isOptionLinkClicked) {
        hrefObj = [];
        for (key in hashOptions) {
          hrefObj[key] = hashOptions[key];
          $(".sort .button").removeClass("active");
          $('.sort a[href="#filter=' + hrefObj["filter"] + '"]').addClass("active");
        }
      }
      isOptionLinkClicked = false;
      return hashChanged = true;
    }).trigger('hashchange');
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
