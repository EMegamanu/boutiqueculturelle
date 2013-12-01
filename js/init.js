
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

$.extend($.tablesorter.themes.jui, {
	// change default jQuery uitheme icons - find the full list of icons here: http://jqueryui.com/themeroller/ (hover over them for their name)
	table      : 'ui-widget ui-widget-content ui-corner-all', // table classes
	caption    : 'ui-widget-content ui-corner-all',
	header     : 'ui-widget-header ui-corner-all ui-state-default', // header classes
	footerRow  : '',
	footerCells: '',
	icons      : 'ui-icon', // icon class added to the <i> in the header
	sortNone   : 'ui-icon-carat-2-n-s',
	sortAsc    : 'ui-icon-carat-1-n',
	sortDesc   : 'ui-icon-carat-1-s',
	active     : 'ui-state-active', // applied when column is sorted
	hover      : 'ui-state-hover',  // hover class
	filterRow  : '',
	even       : 'ui-widget-content', // odd row zebra striping
	odd        : 'ui-state-default'   // even row zebra striping
});

const TVA = 1.196;

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
			theme: "jui",
    		headerTemplate : '{content} {icon}',
			widgets: ["uitheme", "zebra", "filter"],
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
		articles = {};
	}

	/* Nombre d'articles dans le panier. */
	// var nbArticles = articles.length;
	var nbArticles = Object.keys(articles).length;

	$nbArticles.text(nbArticles);

	var classCoche = "fa-check-square";
	var classDecoche = "fa-square-o";

	var $liensAjoutPanier = $tableResults.find(".ajout-panier a:first-child");

	$liensAjoutPanier.each(function() {
		var $lien = $(this);
		var $tr = $lien.closest("tr");
		var id = $tr.data("id");

		var cocher = articles.hasOwnProperty(id);
		// var cocher = articles.contains(id);

		$lien.data("coche", cocher);
		if(cocher) {
			var $action = $lien.find(".action");
			var $nb = $lien.next(".nb");

			$lien.addClass(classCoche);
			$lien.removeClass(classDecoche);

			$action.text("-");

			$nb.css("visibility", "visible");
			$nb.find("input").val(articles[id]);
		}
	});
	
	$tableResults.trigger("update");

	$liensAjoutPanier.click(function(evt) {
		evt.preventDefault();

		var $lien = $(this);
		var $action = $lien.find(".action");
		var $nb = $lien.next(".nb");

		var $tr = $lien.closest("tr");
		var id = $tr.data("id");

		if($lien.data("coche")) {
			$lien.data("coche", false);
			$lien.removeClass(classCoche);
			$lien.addClass(classDecoche);

			// articles.remove(id);
			delete articles[id];
			$.cookie("articles", articles);

			nbArticles = Object.keys(articles).length;
			$nbArticles.text(nbArticles);

			$action.text("+");

			$nb.css("visibility", "hidden");
			$nb.find("input").val(0);
		} else {
			$lien.data("coche", true);
			$lien.addClass(classCoche);
			$lien.removeClass(classDecoche);

			// articles.push(id);
			articles[id] = 1;
			$.cookie("articles", articles);
			
			nbArticles = Object.keys(articles).length;
			$nbArticles.text(nbArticles);

			$action.text("-");

			$nb.css("visibility", "visible");
			$nb.find("input").val(1);
		}

		$tableResults.trigger("update");
	});

	function actualiseProduit($input) {
		var $tr = $input.closest("tr");
		var id = $tr.data("id");

		articles[id] = parseInt($input.val());
		$.cookie("articles", articles);
	}

	var $inputNb = $tableResults.find(".nb input");
	$inputNb.change(function() {
		var $input = $(this);
		actualiseProduit($input);
	});

	$('.ajout-panier .ui-spinner-button').click(function() {
		var $input = $(this).parent().find("input[type='number']");
		actualiseProduit($input);
	});

	var $resetPanier = $("#section-panier :reset");

	var $prix = $tableResults.find(".prix");

	$resetPanier.click(function(evt) {
		$.removeCookie("articles");
		$tableResults.find("tbody").empty();
		$nbArticles.text(0);
		$prix.text(0);
	});

	var $qteInputs = $tableResults.find(".qte input[type='number']");

	var $prixTHT = $prix.filter(".prix-tht");
	var $prixTTTC = $prix.filter(".prix-tttc");

	function actualisePrixTotaux() {
		var $tousPrixHT = $(".prix-ht");

		var prixTHT = 0;

		$tousPrixHT.each(function(evt) {
			var prixHT = parseFloat($(this).text());
			prixTHT += prixHT;
		});
		prixTTTC = prixTHT * TVA;

		$prixTHT.text(prixTHT.toFixed(2));
		$prixTTTC.text(prixTTTC.toFixed(2));
	}

	function actualiseProduitPanier($input) {
		var qte = $input.val();
		var $tr = $input.closest("tr");
		var id = $tr.data("id");


		if(qte == 0) {
			$tr.remove();
			delete articles[id];

			nbArticles = Object.keys(articles).length;
			$nbArticles.text(nbArticles);
		} else {
			var $prixUHT = $tr.find(".prix-uht");
			var $prixHT = $tr.find(".prix-ht");
			var $prixTTC = $tr.find(".prix-ttc");

			var prixUHT = $prixUHT.text();
			var prixHT = parseInt(qte) * parseFloat(prixUHT);  
			var prixTTC = prixHT * TVA;

			$prixHT.text(prixHT.toFixed(2));
			$prixTTC.text(prixTTC.toFixed(2));

			articles[id] = qte;
		}
		$.cookie("articles", articles);

		actualisePrixTotaux();
	}

	$qteInputs.change(function(evt) {
		var $input = $(this);
		actualiseProduitPanier($input);
	});

	/* Rabattage pour navigateurs ne supportant pas... */
	$('.qte .ui-spinner-button').click(function() {
		var $input = $(this).parent().find("input[type='number']");
		actualiseProduitPanier($input);
	});


});