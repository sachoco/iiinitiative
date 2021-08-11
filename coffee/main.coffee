jQuery ($) ->

	$(".rslides").responsiveSlides speed: 2000, random: true, timeout: 20000

	$(".iii-readmore").readmore
		moreLink: '<a class="square-btn" href="#">show more</a>',
		lessLink: '<a class="square-btn" href="#">show less</a>',
		embedCSS: true,
		blockCSS: 'margin-bottom: 1em;'

	$container = $('.isotope')
	isotopeOptions = {}
	defaultOptions = itemSelector: "li", layoutMode: "fitRows", getSortData: { name: '.name', date: '.date'}

	$grid = $('.isotope').imagesLoaded ->
		$grid.isotope defaultOptions

	isOptionLinkClicked = false
	$('.sort .button').on "click", ->
		$this = $(this)
		if $this.hasClass('active') then return
		# sort = $(this).data("sort-by")
		filterItem = $(this).data("filter")
		$(".sort .button").removeClass("active")
		$(this).addClass("active")
		href = $this.attr('href').replace( /^#/, '' )
		option = $.deparam( href, true )
		$.extend( isotopeOptions, option )
		$.bbq.pushState( isotopeOptions )
		isOptionLinkClicked = true
		# $(".isotope").isotope({ sortBy : sort })
		# $(".isotope").isotope({ filter : "."+filterItem })
	hashChanged = false;
	$(window).bind "hashchange", (event)->
		hashOptions = if window.location.hash then $.deparam.fragment( window.location.hash, true ) else {}
		aniEngine = if hashChanged then 'best-available' else 'none'
		options = $.extend( {}, defaultOptions, hashOptions, { animationEngine: aniEngine } )
		$container.isotope( options )
		isotopeOptions = hashOptions
		if !isOptionLinkClicked
			hrefObj=[]
			for key of hashOptions
				hrefObj[ key ] = hashOptions[ key ]
				$(".sort .button").removeClass("active")
				$('.sort a[href="#filter=' + hrefObj["filter"] + '"]').addClass("active")
		isOptionLinkClicked = false;
		hashChanged = true;
	.trigger('hashchange');

	$(".mobile-menu").on "click", ->
		$(".mobile-nav").slideToggle()
		$("section.background").toggleClass("blur")
		$(".viewport").toggleClass("blur")
		$("section.main").toggleClass("blur")
		$("footer").toggleClass("blur")
		$(".viewport .overlay").toggleClass("disable")



	@
