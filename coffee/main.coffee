jQuery ($) -> 

	$(".rslides").responsiveSlides speed: 2000, random: true, timeout: 20000
	$(".isotope").isotope itemSelector: "li", layoutMode: "fitRows", getSortData: { name: '.name', date: '.date'}
	$(".button").on "click", ->
		sort = $(this).data("sort-by")
		console.log(sort)

		$(".isotope").isotope({ sortBy : sort })


	@
