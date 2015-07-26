(function() {
  jQuery(function($) {
    var allPages, curPage, i, j, k, len, len1, nextPages, page, pageWrapper, prevPages, resizeHandler, v;
    $(".rslides").responsiveSlides({
      speed: 2000,
      random: true,
      timeout: 20000
    });
    curPage = null;
    pageWrapper = $(".section-wrap");
    nextPages = $("section.page");
    prevPages = nextPages.clone().addClass("page--clone prev").prependTo(pageWrapper).toArray();
    nextPages = nextPages.addClass("next").toArray();
    allPages = $("section.page");
    for (i = j = 0, len = nextPages.length; j < len; i = ++j) {
      page = nextPages[i];
      v = 50 + (i * 100);
      $(page).velocity({
        translateX: v + "%"
      }, {
        duration: 0
      });
    }
    for (i = k = 0, len1 = prevPages.length; k < len1; i = ++k) {
      page = prevPages[i];
      v = -150 - ((prevPages.length - 1 - i) * 100);
      $(page).velocity({
        translateX: v + "%"
      }, {
        duration: 0
      });
    }
    $(document).on("click", ".overlay--right", function() {
      var h, l, len2, target;
      if (curPage === null) {
        curPage = $.inArray(nextPages[0], allPages);
        target = nextPages;
      } else {
        $(allPages[curPage]).removeClass("current").addClass("prev");
        prevPages.push(nextPages.shift());
        nextPages.push(prevPages.shift());
        $("section.page.prev").first().removeClass("prev").addClass("next").appendTo(pageWrapper).velocity("stop").velocity({
          translateX: (nextPages.length - 1) * 100 + 50 + "%"
        }, {
          duration: 0
        });
        target = allPages;
        curPage++;
        if (curPage >= allPages.length) {
          curPage = 0;
        }
      }
      for (l = 0, len2 = target.length; l < len2; l++) {
        page = target[l];
        $(page).velocity({
          translateX: "-=100%"
        }, {
          duration: 1000
        });
      }
      $(allPages[curPage]).addClass("current").removeClass("next").removeClass("hover");
      h = $(".page.current .page__header").height() + $(".page.current .page__body").height();
      return $(".viewport").velocity({
        height: h
      }, {
        duration: 1000
      });
    });
    $(document).on("click", ".overlay--left", function() {
      var h, l, len2, target;
      if (curPage === null) {
        curPage = $.inArray(nextPages[0], allPages) - 1;
        target = prevPages;
      } else {
        $(allPages[curPage]).removeClass("current").addClass("next");
        prevPages.unshift(nextPages.pop());
        $("section.page.next").last().removeClass("next").addClass("prev").prependTo(pageWrapper).velocity("stop").velocity({
          translateX: (prevPages.length - 1) * -100 - 150 + "%"
        }, {
          duration: 0
        });
        target = allPages;
        curPage--;
        if (curPage < 0) {
          curPage = allPages.length - 1;
        }
      }
      for (l = 0, len2 = target.length; l < len2; l++) {
        page = target[l];
        $(page).velocity({
          translateX: "+=100%"
        }, {
          duration: 1000
        });
      }
      nextPages.unshift(prevPages.pop());
      console.log(prevPages);
      $("section.page.prev").last().removeClass("prev");
      $(allPages[curPage]).addClass("current").removeClass("prev").removeClass("hover");
      h = $(".page.current .page__header").height() + $(".page.current .page__body").height();
      return $(".viewport").velocity({
        height: h
      }, {
        duration: 1000
      });
    });
    $(".logo").on("click", function() {
      var h, l, len2;
      if (curPage !== null) {
        $(allPages[curPage]).removeClass("current").addClass("next");
        curPage = null;
        for (l = 0, len2 = nextPages.length; l < len2; l++) {
          page = nextPages[l];
          $(page).velocity({
            translateX: "+=100%"
          }, {
            duration: 1000
          });
        }
        h = $(".home").outerHeight();
        return $(".viewport").velocity({
          height: h
        }, {
          duration: 1000
        });
      }
    });
    $(".overlay--right").on({
      'mouseenter': function() {
        if (curPage !== null) {
          return $(nextPages[1]).addClass("hover");
        } else {
          return $(nextPages[0]).addClass("hover");
        }
      },
      'mouseleave': function() {
        if (curPage !== null) {
          return $(nextPages[1]).removeClass("hover");
        } else {
          return $(nextPages[0]).removeClass("hover");
        }
      }
    });
    $(".overlay--left").on({
      'mouseenter': function() {
        return $(prevPages[prevPages.length - 1]).addClass("hover");
      },
      'mouseleave': function() {
        return $(prevPages[prevPages.length - 1]).removeClass("hover");
      }
    });
    resizeHandler = function() {
      var h;
      if ($(".page.current").length > 0) {
        h = $(".page.current .page__header").height() + $(".page.current .page__body").height();
        return $(".viewport").velocity({
          height: h
        }, {
          duration: 0
        });
      }
    };
    $(window).resize(resizeHandler);
    return this;
  });

}).call(this);
