/* Au chargement de la page achevé... */
$(function() {
	/* Tableaux de résultats issus de la base. */
	var $tableResults = $("table.results");

	/* Indice de la colonne du genre dans le tableau de résultats de la page courante. */
	var indiceColGenre = -1;

  	$tableResults.find("th").each(function(i) {
  		if($(this).text() == "Genre") {
  			indiceColGenre = i;
  			return false; /* Trouvé ! On sort de la boucle. */
  		}
  	});

	/* Initialisation de jQuery.tablesorter pour tous les tableaux de résultat. */
	$tableResults.each(function() {
		var $table = $(this);
		$table.tablesorter({ /* Trie du tableau. */
			widgets: ["zebra", "filter"],
			 widgetOptions: {
			 	filter_hideFilters : true, /* + 1 règle dans le CSS pour totalement masquer les champs. */
			 	filter_reset: '#menu2 a.reset',
		     	filter_filteredRow: 'filtered'
			 }
		})
		.tablesorterPager({ /* Pagination. */
			container: $table.next(".pager"),
			output: '{page} / {filteredPages}'
		});
	});


	/* Initialisation de l'application des filtres via le menu latéral. */
	$("#menu2 a:not(.reset)").click(function(evt) {
	  	var $lien = $(this);

	    var filters = [];
	    filters[indiceColGenre] = $lien.text();

	    $.tablesorter.setFilters($tableResults, filters, true);

	  	evt.preventDefault();
	});

	/* ---------------------- */

	/* Méthode de rabatage de la gestion des champs de type Date sur navigateurs ne les gérant pas encore. (Ex : Firefox) */
	var $inputDate = $("input[type='date']");
	if($inputDate.prop("type") == "text") {
		$inputDate.datepicker($.datepicker.regional["fr"]);
	}

	/* ---------------------- */
	/* Champs indiquant le nombre d'articles actuellement dans le panier. */
	var $nbArticles = $(".nb-articles");

	/* Articles du panier. */
	var articles = $.storage.getItem("articles", "localStorage");

	if(articles) {
		articles = JSON.parse(articles);
	} else {
		articles = {};
	}

	/* Nombre d'articles dans le panier. */
	var nbArticles = Object.keys(articles).length;

	$nbArticles.text(nbArticles);

	var classCoche = "fa-check-square";
	var classDecoche = "fa-square-o";

	var $liensAjoutPanier = $tableResults.find(".ajout-panier a");

	$liensAjoutPanier.each(function() {
		var $lien = $(this);
		var id = $lien.data("id");

		// console.log(articles);

		var cocher = articles.hasOwnProperty(id);

		$lien.data("coche", cocher);
		if(cocher) {
			var $action = $lien.find(".action");

			$lien.addClass(classCoche);
			$lien.removeClass(classDecoche);


			$action.text("-");
		}
	});

	$liensAjoutPanier.click(function(evt) {
		evt.preventDefault();

		var $lien = $(this);
		var $action = $lien.find(".action");

		var id = $lien.data("id");

		if($lien.data("coche")) {
			$lien.data("coche", false);
			$lien.removeClass(classCoche);
			$lien.addClass(classDecoche);

			delete articles[id];
			$.storage.setItem("articles", JSON.stringify(articles), "localStorage");

			nbArticles = Object.keys(articles).length;
			$nbArticles.text(nbArticles);

			$action.text("+");
		} else {
			$lien.data("coche", true);
			$lien.addClass(classCoche);
			$lien.removeClass(classDecoche);

			articles[id] = id;
			$.storage.setItem("articles", JSON.stringify(articles), "localStorage");
			
			nbArticles = Object.keys(articles).length;
			$nbArticles.text(nbArticles);

			$action.text("-");
		}
	});

});