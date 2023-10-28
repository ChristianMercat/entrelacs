


barre_outils_edition = {"nameSpace":"edition","previewAutoRefresh":false,"onEnter":{"keepDefault":false,"selectionType":"return","replaceWith":"\n"}
,"onShiftEnter":{"keepDefault":false,"replaceWith":"\n_ "}
,"onCtrlEnter":{"keepDefault":false,"replaceWith":"\n\n"}
,"markupSet":[{"name":"In {{{Zwischentitel}}} umwandeln","key":"H","className":"outil_header1","openWith":"\n{{{","closeWith":"}}}\n","selectionType":"line"}
,{"name":"{{Fett}} setzen","key":"B","className":"outil_bold","replaceWith":function(h){ return espace_si_accolade(h, '{{', '}}');},"selectionType":"word"}
,{"name":"In {kursiv} umwandeln","key":"I","className":"outil_italic","replaceWith":function(h){ return espace_si_accolade(h, '{', '}');},"selectionType":"word"}
,{"name":"Als Liste formatieren","className":"outil_liste_ul","replaceWith":function(h){ return outil_liste(h, '*');},"selectionType":"line","forceMultiline":true,"dropMenu":[{"id":"liste_ol","name":"Als nummerierte Liste formatieren","className":"outil_liste_ol","replaceWith":function(h){ return outil_liste(h, '#');},"display":true,"selectionType":"line","forceMultiline":true}
,{"id":"desindenter","name":"Einrückungen aus Liste entfernen","className":"outil_desindenter","replaceWith":function(h){return outil_desindenter(h);},"display":true,"selectionType":"line","forceMultiline":true}
,{"id":"indenter","name":"Liste mit Einrückungen","className":"outil_indenter","replaceWith":function(h){return outil_indenter(h);},"display":true,"selectionType":"line","forceMultiline":true}
]
}
,{"separator":"---------------"}
,{"name":"In [Hyperlink->http://...] umwandeln","key":"L","className":"outil_link","openWith":"[","closeWith":"->[![Bitte geben sie die Adresse ihrer Website an (Sie können eine Webadresse im Format http://www.meineseite.de, eine Mailadresse oder die Nummer eines Artikels dieser Website angeben.)]!]]"}
,{"name":"In [[Fu�note]] umwandeln","className":"outil_notes","openWith":"[[","closeWith":"]]","selectionType":"word"}
,{"separator":"---------------"}
,{"name":"<quote>Nachricht zitieren</quote>","key":"Q","className":"outil_quote","openWith":"\n<quote>","closeWith":"</quote>\n","selectionType":"word"}
,{"name":"In « Anführungszeichen » setzen.","className":"outil_guillemets","openWith":"«","closeWith":"»","lang":["fr","eo","cpf","ar","es"]
,"selectionType":"word"}
,{"name":"in “ doppelte Anführungszeichen ”","className":"outil_guillemets_simples","openWith":"“","closeWith":"”","lang":["fr","eo","cpf","ar","es"]
,"selectionType":"word"}
,{"name":"In « Anführungszeichen » setzen.","className":"outil_guillemets_de","openWith":"„","closeWith":"“","lang":["bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"in “ doppelte Anführungszeichen ”","className":"outil_guillemets_de_simples","openWith":"&sbquo;","closeWith":"‘","lang":["bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"In « Anführungszeichen » setzen.","className":"outil_guillemets_simples","openWith":"“","closeWith":"”","lang_not":["fr","eo","cpf","ar","es","bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"in “ doppelte Anführungszeichen ”","className":"outil_guillemets_uniques","openWith":"‘","closeWith":"’","lang_not":["fr","eo","cpf","ar","es","bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"separator":"---------------"}
,{"name":"Sonderzeichen einfügen","className":"outil_caracteres","dropMenu":[{"id":"A_grave","name":"Majuskel A mit accent grave einfügen","className":"outil_a_maj_grave","replaceWith":"À","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"E_aigu","name":"Majuskel E mit accent aigu einfügen","className":"outil_e_maj_aigu","replaceWith":"É","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"E_grave","name":"Insérer un E majuscule accent grave","className":"outil_e_maj_grave","replaceWith":"È","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"aelig","name":"Insérer un E dans l'A","className":"outil_aelig","replaceWith":"æ","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"AElig","name":"Majuskel E im A einfügen","className":"outil_aelig_maj","replaceWith":"Æ","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"oe","name":"E im O  einfügen","className":"outil_oe","replaceWith":"œ","display":true,"lang":["fr"]
}
,{"id":"OE","name":"Majuskel E im O  einfügen","className":"outil_oe_maj","replaceWith":"Œ","display":true,"lang":["fr"]
}
,{"id":"Ccedil","name":"Majuskel C cédille  einfügen","className":"outil_ccedil_maj","replaceWith":"Ç","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"uppercase","name":"In Majuskel umwandeln","className":"outil_uppercase","replaceWith":function(markitup) { return markitup.selection.toUpperCase() },"display":true,"lang":["fr","en"]
}
,{"id":"lowercase","name":"In Gemeine umwandeln","className":"outil_lowercase","replaceWith":function(markitup) { return markitup.selection.toLowerCase() },"display":true,"lang":["fr","en"]
}
]
}
]
}


 
				// remplace ou cree -* ou -** ou -# ou -##
				function outil_liste(h, c) {
					if ((s = h.selection) && (r = s.match(/^-([*#]+) (.*)$/)))	 {
						r[1] = r[1].replace(/[#*]/g, c);
						s = '-'+r[1]+' '+r[2];
					} else {
						s = '-' + c + ' '+s;
					}
					return s;
				}

				// indente des -* ou -#
				function outil_indenter(h) {
					if (s = h.selection) {
						if (s.substr(0,2)=='-*') {
							s = '-**' + s.substr(2);
						} else if (s.substr(0,2)=='-#') {
							s = '-##' + s.substr(2);
						} else {
							s = '-* ' + s;
						}
					}
					return s;
				}
						
				// desindente des -* ou -** ou -# ou -##
				function outil_desindenter(h){
					if (s = h.selection) {
						if (s.substr(0,3)=='-**') {
							s = '-*' + s.substr(3);
						} else if (s.substr(0,3)=='-* ') {
							s = s.substr(3);
						} else if (s.substr(0,3)=='-##') {
							s = '-#' + s.substr(3);
						} else if (s.substr(0,3)=='-# ') {
							s = s.substr(3);
						}
					}
					return s;
				}
				
				// ajouter un espace avant, apres un {qqc} pour ne pas que
				// gras {{}} suivi de italique {} donnent {{{}}}, mais { {{}} }
				function espace_si_accolade(h, openWith, closeWith){
					if (s = h.selection) {
						// accolade dans la selection
						if (s.charAt(0)=='{') {
							return openWith + ' ' + s + ' ' + closeWith;
						}
						// accolade avant la selection
						else if (c = h.textarea.selectionStart) {
							if (h.textarea.value.charAt(c-1) == '{') {
								return ' ' + openWith + s + closeWith + ' ';
							}
						}
					}
					return openWith + s + closeWith;
				} 
				

barre_outils_forum = {"nameSpace":"forum","previewAutoRefresh":false,"onEnter":{"keepDefault":false,"selectionType":"return","replaceWith":"\n"}
,"onShiftEnter":{"keepDefault":false,"replaceWith":"\n_ "}
,"onCtrlEnter":{"keepDefault":false,"replaceWith":"\n\n"}
,"markupSet":[{"name":"{{Fett}} setzen","key":"B","className":"outil_bold","replaceWith":function(h){ return espace_si_accolade(h, '{{', '}}');},"selectionType":"word"}
,{"name":"In {kursiv} umwandeln","key":"I","className":"outil_italic","replaceWith":function(h){ return espace_si_accolade(h, '{', '}');},"selectionType":"word"}
,{"separator":"---------------"}
,{"name":"In [Hyperlink->http://...] umwandeln","key":"L","className":"outil_link","openWith":"[","closeWith":"->[![Bitte geben sie die Adresse ihrer Website an (Sie können eine Webadresse im Format http://www.meineseite.de, eine Mailadresse oder die Nummer eines Artikels dieser Website angeben.)]!]]"}
,{"separator":"---------------"}
,{"name":"<quote>Nachricht zitieren</quote>","key":"Q","className":"outil_quote","openWith":"\n<quote>","closeWith":"</quote>\n","selectionType":"word"}
,{"name":"In « Anführungszeichen » setzen.","className":"outil_guillemets","openWith":"«","closeWith":"»","lang":["fr","eo","cpf","ar","es"]
,"selectionType":"word"}
,{"name":"in “ doppelte Anführungszeichen ”","className":"outil_guillemets_simples","openWith":"“","closeWith":"”","lang":["fr","eo","cpf","ar","es"]
,"selectionType":"word"}
,{"name":"In « Anführungszeichen » setzen.","className":"outil_guillemets_de","openWith":"„","closeWith":"“","lang":["bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"in “ doppelte Anführungszeichen ”","className":"outil_guillemets_de_simples","openWith":"&sbquo;","closeWith":"‘","lang":["bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"In « Anführungszeichen » setzen.","className":"outil_guillemets_simples","openWith":"“","closeWith":"”","lang_not":["fr","eo","cpf","ar","es","bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"in “ doppelte Anführungszeichen ”","className":"outil_guillemets_uniques","openWith":"‘","closeWith":"’","lang_not":["fr","eo","cpf","ar","es","bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"separator":"---------------"}
]
}


 
				// remplace ou cree -* ou -** ou -# ou -##
				function outil_liste(h, c) {
					if ((s = h.selection) && (r = s.match(/^-([*#]+) (.*)$/)))	 {
						r[1] = r[1].replace(/[#*]/g, c);
						s = '-'+r[1]+' '+r[2];
					} else {
						s = '-' + c + ' '+s;
					}
					return s;
				}

				// indente des -* ou -#
				function outil_indenter(h) {
					if (s = h.selection) {
						if (s.substr(0,2)=='-*') {
							s = '-**' + s.substr(2);
						} else if (s.substr(0,2)=='-#') {
							s = '-##' + s.substr(2);
						} else {
							s = '-* ' + s;
						}
					}
					return s;
				}
						
				// desindente des -* ou -** ou -# ou -##
				function outil_desindenter(h){
					if (s = h.selection) {
						if (s.substr(0,3)=='-**') {
							s = '-*' + s.substr(3);
						} else if (s.substr(0,3)=='-* ') {
							s = s.substr(3);
						} else if (s.substr(0,3)=='-##') {
							s = '-#' + s.substr(3);
						} else if (s.substr(0,3)=='-# ') {
							s = s.substr(3);
						}
					}
					return s;
				}
				
				// ajouter un espace avant, apres un {qqc} pour ne pas que
				// gras {{}} suivi de italique {} donnent {{{}}}, mais { {{}} }
				function espace_si_accolade(h, openWith, closeWith){
					if (s = h.selection) {
						// accolade dans la selection
						if (s.charAt(0)=='{') {
							return openWith + ' ' + s + ' ' + closeWith;
						}
						// accolade avant la selection
						else if (c = h.textarea.selectionStart) {
							if (h.textarea.value.charAt(c-1) == '{') {
								return ' ' + openWith + s + closeWith + ' ';
							}
						}
					}
					return openWith + s + closeWith;
				} 
				


;(function($){

// 2 fonctions pour appeler le porte plume reutilisables pour d'autres plugins
// on envoie dedans la selection jquery qui doit etre effectuee
// ce qui evite des appels direct a markitup, aucazou on change de lib un jour
$.fn.barre_outils = function(nom, settings) {
	options = {
		lang:'de'
	};
	$.extend(options, settings);

	return $(this)
		.not('.markItUpEditor, .no_barre')
		.markItUp(eval('barre_outils_' + nom), {lang:options.lang});
};

$.fn.barre_previsualisation = function(settings) {
	options = {
		previewParserPath:"index.php?action=porte_plume_previsu", // ici une url relative pour prive/public
		textEditer:"Bearbeiten",
		textVoir:"Anzeigen"
	};
	$.extend(options, settings);

	return $(this)
		.not('.pp_previsualisation, .no_previsualisation')
		.previsu_spip(options);
};

$(window).load(function(){
	// ajoute les barres d'outils markitup
	function barrebouilles(){
		// fonction generique appliquee aux classes CSS :
		// inserer_barre_forum, inserer_barre_edition, inserer_previsualisation
		$('.formulaire_spip textarea.inserer_barre_forum').barre_outils('forum');
		$('.formulaire_spip textarea.inserer_barre_edition').barre_outils('edition');
		$('.formulaire_spip textarea.inserer_previsualisation').barre_previsualisation();
		// fonction specifique aux formulaires de SPIP :
		// barre de forum
		$('textarea.textarea_forum').barre_outils('forum');
		 
		$('.formulaire_forum textarea[name=texte]').barre_outils('forum');
		// barre d'edition et onglets de previsualisation
		$('.formulaire_spip textarea[name=texte]')
			.barre_outils('edition')
			.barre_previsualisation();
	}
	barrebouilles();
	onAjaxLoad(barrebouilles);

});
})(jQuery);
