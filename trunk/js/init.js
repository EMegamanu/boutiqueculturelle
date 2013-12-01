
/* Trouvé ici : http://michalbe.blogspot.fr/2010/04/removing-item-with-given-value-from.html */
Array.prototype.remove = function(value) {
    if (this.indexOf(value) !== -1) {
       this.splice(this.indexOf(value), 1);
       return true;
   } else {
      return false;
   };
} 

Array.prototype.contains = function(value) {
	return this.indexOf(value) !== -1;
} 

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

	/* Méthode de rabatage de la gestion des champs de types Date et Number sur navigateurs ne les gérant pas encore. (Ex : Firefox) */
	var $inputDate = $("input[type='date']");
	if($inputDate.prop("type") == "text") {
		$inputDate.datepicker($.datepicker.regional["fr"]);
	}

	var $inputNumber = $("input[type='number']");
	if($inputNumber.prop("type") == "text") {
		$inputNumber.each(function() {
			var $this = $(this);

			$this.spinner({
				min: $this.attr("min"),
				max: $this.attr("max"),
				step: $this.attr("step")
			});
		});
	}

	/* ---------------------- */
	/* Facilite enregistrement/lecture des données des cookies. */
	$.cookie.json = true;
	$.cookie.default = {
		path: '/',
		domain: document.location.hostname,
		secure: true
	}

	/* Champs indiquant le nombre d'articles actuellement dans le panier. */
	var $nbArticles = $(".nb-articles");

	/* Articles du panier. */
	var articles = $.cookie("articles");

	if(!articles) {
		articles = [];
	}

	/* Nombre d'articles dans le panier. */
	var nbArticles = articles.length;

	$nbArticles.text(nbArticles);

	var classCoche = "fa-check-square";
	var classDecoche = "fa-square-o";

	var $liensAjoutPanier = $tableResults.find(".ajout-panier a");

	$liensAjoutPanier.each(function() {
		var $lien = $(this);
		var id = $lien.data("id");

		// console.log(articles);

		// var cocher = articles.hasOwnProperty(id);
		var cocher = articles.contains(id);

		$lien.data("coche", cocher);
		if(cocher) {
			var $action = $lien.find(".action");
			var $nb = $lien.next(".nb");

			$lien.addClass(classCoche);
			$lien.removeClass(classDecoche);

			$action.text("-");

			$nb.removeClass("hidden");
			$nb.val(1);
		}
	});
	
	$tableResults.trigger("update");


	$liensAjoutPanier.click(function(evt) {
		evt.preventDefault();

		var $lien = $(this);
		var $action = $lien.find(".action");
		var $nb = $lien.next(".nb");

		var id = $lien.data("id");

		if($lien.data("coche")) {
			$lien.data("coche", false);
			$lien.removeClass(classCoche);
			$lien.addClass(classDecoche);

			articles.remove(id);
			$.cookie("articles", articles);

			nbArticles = articles.length;
			$nbArticles.text(nbArticles);

			$action.text("+");

			$nb.addClass("hidden");
			$nb.val(0);
		} else {
			$lien.data("coche", true);
			$lien.addClass(classCoche);
			$lien.removeClass(classDecoche);

			articles.push(id);
			$.cookie("articles", articles);
			
			nbArticles = articles.length;
			$nbArticles.text(nbArticles);

			$action.text("-");

			$nb.removeClass("hidden");
			$nb.val(1);
		}

		$tableResults.trigger("update");
	});

});