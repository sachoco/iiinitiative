jQuery ($) -> 

	$(".rslides").responsiveSlides speed: 2000, random: true, timeout: 20000

	$grid = $('.isotope').imagesLoaded ->
		$grid.isotope itemSelector: "li", layoutMode: "fitRows", getSortData: { name: '.name', date: '.date'}

	$(".button").on "click", ->
		sort = $(this).data("sort-by")
		# console.log(sort)
		$(".isotope").isotope({ sortBy : sort })
	$(".mobile-menu").on "click", ->
		$(".mobile-nav").slideToggle()
		$("section.background").toggleClass("blur")
		$(".viewport").toggleClass("blur")
		$("section.main").toggleClass("blur")
		$("footer").toggleClass("blur")

	$(".iii-readmore").readmore 
		moreLink: '<a class="square-btn" href="#">show more</a>',
		lessLink: '<a class="square-btn" href="#">show less</a>',
		embedCSS: true,
		collapsedHeight: 1500,
		blockCSS: 'margin-bottom: 2em;'

	@
