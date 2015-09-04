jQuery ($) -> 

	curPage = null
	pageWrapper = $(".section-wrap")
	nextPages = $("section.page")
	prevPages = nextPages.clone().addClass("page--clone prev").prependTo( pageWrapper).toArray()
	nextPages = nextPages.addClass("next").toArray()
	# prevPages = clones.toArray()
	allPages = $("section.page")

	for page, i in nextPages
		v = 50 + ((i-1) * 100)
		$(page).velocity { translateX: v+"%" }, { duration: 0, complete: (elem)->
			$(elem).addClass("ready")
		}

	for page, i in prevPages
		v = -150 - ((prevPages.length - 1 - i) * 100)
		$(page).velocity { translateX: v+"%" }, { duration: 0, complete: (elem)->
			$(elem).addClass("ready")
		}

	curPage = $.inArray nextPages[0], allPages
	$(allPages[curPage]).addClass("current").removeClass("next").removeClass("hover")
	homeLoc = curPage
	
	$(document).on "click", ".overlay--right", -> 
		goNext()
		
	$(document).on "click", ".overlay--left", -> 
		goPrev()

	$(".logo").on "click", (e) ->
		e.preventDefault();
		if not $(allPages[curPage]).hasClass('home') 
			if  (allPages.length * 1/4) <= curPage <= (allPages.length * 3/4)
				if (num_to_move = homeLoc - curPage) > 0
					_i = 0
					loop
						goNext()
						_i++
						break if _i >= num_to_move
					
				else
					_i = 0
					loop
						goPrev()
						_i--
						break if _i <= num_to_move
			else
				if curPage > allPages.length * 1/2
					num_to_move = allPages.length - curPage
					_i = 0
					loop
						goNext()
						_i++
						console.log(_i)
						break if _i >= num_to_move
					
				else
					num_to_move = curPage
					_i = 0
					loop
						goPrev()
						_i++
						break if _i <= num_to_move

		# if curPage isnt null
		# 	$(allPages[curPage]).removeClass("current").addClass("next")
		# 	curPage = null
		# 	prevPages.unshift( nextPages.pop() )
		# 	$("section.page.next").last().removeClass("next").addClass("prev").prependTo( pageWrapper ).velocity("stop").velocity { translateX: (prevPages.length - 1) * -100 - 150 + "%" }, { duration: 0 }
		# 	for page in nextPages
		# 		$(page).velocity { translateX: "+=100%" }, { duration: 1000 }

		# 	# nextPages.unshift( prevPages.pop() )		
		# 	h = $("section.home").outerHeight();
		# 	$(".viewport").velocity {height: h}, {duration: 1000}


	$(".overlay--right").on {
		'mouseenter': ->
			# console.log "test"
			if curPage isnt null
				$(nextPages[1]).addClass("hover")
			else
				$(nextPages[0]).addClass("hover")
		,
		'mouseleave': -> 
			if curPage isnt null
				$(nextPages[1]).removeClass("hover")
			else
				$(nextPages[0]).removeClass("hover")
	}

	$(".overlay--left").on {
		'mouseenter': ->
			$(prevPages[prevPages.length-1]).addClass("hover")
		,
		'mouseleave': -> 
			$(prevPages[prevPages.length-1]).removeClass("hover")
	}

	goNext = -> 
		if curPage is null
			curPage = $.inArray nextPages[0], allPages
			target = nextPages
		else
			$(allPages[curPage]).removeClass("current").addClass("prev")
			prevPages.push( nextPages.shift() )
			nextPages.push( prevPages.shift() )
			$("section.page.prev").first().removeClass("prev").addClass("next").appendTo( pageWrapper ).velocity("stop").velocity { translateX: (nextPages.length - 1) * 100 + 50 + "%" }, { duration: 0 }
			target = allPages
			curPage++
			if curPage >= allPages.length
				curPage = 0
		for page in target
			$(page).velocity { translateX: "-=100%" }, { duration: 1000}
		$(allPages[curPage]).addClass("current").removeClass("next").removeClass("hover")
		# h = $(".page.current .page__header").outerHeight() + $(".page.current .page__body").outerHeight();
		h = $(".page.current").outerHeight()
		$(".viewport").velocity {height: h}, {duration: 1000}

	goPrev = ->
		if curPage is null
			curPage = $.inArray(nextPages[0], allPages) - 1
			target = prevPages
		else
			$(allPages[curPage]).removeClass("current").addClass("next")
			prevPages.unshift( nextPages.pop() )
			$("section.page.next").last().removeClass("next").addClass("prev").prependTo( pageWrapper ).velocity("stop").velocity { translateX: (prevPages.length - 1) * -100 - 150 + "%" }, { duration: 0 }
			target = allPages
			curPage--
			if curPage < 0
				curPage = allPages.length - 1
		for page in target
			$(page).velocity { translateX: "+=100%" }, { duration: 1000}
		nextPages.unshift( prevPages.pop() )
		$("section.page.prev").last().removeClass("prev")
		$(allPages[curPage]).addClass("current").removeClass("prev").removeClass("hover")

		# h = $(".page.current .page__header").outerHeight() + $(".page.current .page__body").outerHeight();
		h = $(".page.current").outerHeight()
		$(".viewport").velocity {height: h}, {duration: 1000}

	resizeHandler = ->
		if $(".page.current").length > 0
			# h = $(".page.current .page__header").height() + $(".page.current .page__body").height();
			h = $(".page.current").outerHeight()
			# console.log h
			$(".viewport").velocity {height: h}, {duration: 0}
		winW = $(window).width();
		pageW = $("section.page").width();
		console.log(pageW)
		$(".viewport .overlay").width((winW - pageW) / 2)

	$(window).resize resizeHandler

	$(document).ready ->
		resizeHandler()

		@

	@
