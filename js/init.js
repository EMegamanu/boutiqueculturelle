/* Au chargement de la page achevé... */
$(function() {
	var indiceColGenre = -1;

  	$(".results th").each(function(i) {
  		if($(this).text() == "Genre") {
  			indiceColGenre = i;
  			return false;
  		}
  	});

	/* Initialisation de jQuery.tablesorter pour tous les tableaux de résultat. */
	$("table.results").each(function() {
		var $table = $(this);
		$table.tablesorter({
			widgets: ["zebra", "filter"],
			 widgetOptions: {
			 	filter_hideFilters : true,
			 	filter_reset: '#menu2 a.reset',
		     	filter_filteredRow: 'filtered'
			 }
		})
		.tablesorterPager({
			container: $(this).next(".pager"),
			output: '{page} / {filteredPages}'
		});
	});

  $("#menu2 a:not(.reset)").click(function(evt) {
  	var $lien = $(this);

    var filters = [];
    filters[indiceColGenre] = $lien.text();

   
    $.tablesorter.setFilters( $('table.results'), filters, true ); // new v2.9


  	evt.preventDefault();
  });
});