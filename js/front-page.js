(function() {
  jQuery(function($) {
    var allPages, curPage, goNext, goPrev, homeLoc, i, j, k, len, len1, nextPages, page, pageWrapper, prevPages, resizeHandler, v;
    curPage = null;
    pageWrapper = $(".section-wrap");
    nextPages = $("section.page");
    prevPages = nextPages.clone().addClass("page--clone prev").prependTo(pageWrapper).toArray();
    nextPages = nextPages.addClass("next").toArray();
    allPages = $("section.page");
    for (i = j = 0, len = nextPages.length; j < len; i = ++j) {
      page = nextPages[i];
      v = 50 + ((i - 1) * 100);
      $(page).velocity({
        translateX: v + "%"
      }, {
        duration: 0,
        complete: function(elem) {
          return $(elem).addClass("ready");
        }
      });
    }
    for (i = k = 0, len1 = prevPages.length; k < len1; i = ++k) {
      page = prevPages[i];
      v = -150 - ((prevPages.length - 1 - i) * 100);
      $(page).velocity({
        translateX: v + "%"
      }, {
        duration: 0,
        complete: function(elem) {
          return $(elem).addClass("ready");
        }
      });
    }
    curPage = $.inArray(nextPages[0], allPages);
    $(allPages[curPage]).addClass("current").removeClass("next").removeClass("hover");
    homeLoc = curPage;
    $(document).on("click", ".overlay--right", function() {
      return goNext();
    });
    $(document).on("click", ".overlay--left", function() {
      return goPrev();
    });
    $(".logo").on("click", function(e) {
      var _i, num_to_move, results, results1, results2, results3;
      e.preventDefault();
      if (!$(allPages[curPage]).hasClass('home')) {
        if (((allPages.length * 1 / 4) <= curPage && curPage <= (allPages.length * 3 / 4))) {
          if ((num_to_move = homeLoc - curPage) > 0) {
            _i = 0;
            results = [];
            while (true) {
              goNext();
              _i++;
              if (_i >= num_to_move) {
                break;
              } else {
                results.push(void 0);
              }
            }
            return results;
          } else {
            _i = 0;
            results1 = [];
            while (true) {
              goPrev();
              _i--;
              if (_i <= num_to_move) {
                break;
              } else {
                results1.push(void 0);
              }
            }
            return results1;
          }
        } else {
          if (curPage > allPages.length * 1 / 2) {
            num_to_move = allPages.length - curPage;
            _i = 0;
            results2 = [];
            while (true) {
              goNext();
              _i++;
              console.log(_i);
              if (_i >= num_to_move) {
                break;
              } else {
                results2.push(void 0);
              }
            }
            return results2;
          } else {
            num_to_move = curPage;
            _i = 0;
            results3 = [];
            while (true) {
              goPrev();
              _i++;
              if (_i <= num_to_move) {
                break;
              } else {
                results3.push(void 0);
              }
            }
            return results3;
          }
        }
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
    goNext = function() {
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
      h = $(".page.current").outerHeight();
      return $(".viewport").velocity({
        height: h
      }, {
        duration: 1000
      });
    };
    goPrev = function() {
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
      $("section.page.prev").last().removeClass("prev");
      $(allPages[curPage]).addClass("current").removeClass("prev").removeClass("hover");
      h = $(".page.current").outerHeight();
      return $(".viewport").velocity({
        height: h
      }, {
        duration: 1000
      });
    };
    resizeHandler = function() {
      var h, pageW, winW;
      if ($(".page.current").length > 0) {
        h = $(".page.current").outerHeight();
        $(".viewport").velocity({
          height: h
        }, {
          duration: 0
        });
      }
      winW = $(window).width();
      pageW = $("section.page").width();
      console.log(pageW);
      return $(".viewport .overlay").width((winW - pageW) / 2);
    };
    $(window).resize(resizeHandler);
    $(document).ready(function() {
      resizeHandler();
      return this;
    });
    return this;
  });

}).call(this);
