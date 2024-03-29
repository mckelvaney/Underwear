/* Inspired by (and partially nicked from) the far superior #grid (http://hashgrid.com/) but simpler for a simple person - me. */

$(document).ready(function(){
  
  // Find asset server
  
  scripts = $("script[src]");
  scripts.each(function(i,e){
    e = $(e);
    if (e.attr('src').match(/.+minigrid.+/)) {
      url = e.attr('src').split('.js');
      asset_server = url[0];
    }
  });

	$('body').append('<div id="grid"><div class="inner"></div></div>').css({
		position: 'relative'
	});

	$('#grid').hide().css({
		margin: '0',
		padding: '0',	
		width: '100%',
		height: '100%',
		position: 'absolute',
		top: '0',
		zIndex: '1000'
	});

	$('#grid .inner').css({
		width: '980px',
		margin: '0 auto',
		padding: '0',
		background: 'url('+asset_server+'/bg-grid-980_20.png)',
		height: '100%'
	});
	
	$(document).bind('keydown', function(e){
		var source = e.target.tagName.toLowerCase();
		if ((source == 'input') || (source == 'textarea') || (source == 'select')) return true;
		var k = getKey(e);
		switch(k) {
			case "g":
				$('#grid').show();
				break;
			case "f":
				$('#grid').css('z-index', 1000);
				break;
		};
	});
	
	$(document).bind('keyup', function(e){
		var source = e.target.tagName.toLowerCase();
		if ((source == 'input') || (source == 'textarea') || (source == 'select')) return true;
		var k = getKey(e);
		switch(k) {
			case "g":
				$('#grid').hide();
				break;
			case "f":
				$('#grid').css('z-index', 1000);
				break;
		};
	});

});

function getKey(e) {
		var k = false, c = (e.keyCode ? e.keyCode : e.which);
		// Handle keywords
		if (c == 13) k = 'enter';
		// Handle letters
		else k = String.fromCharCode(c).toLowerCase();
		return k;
}