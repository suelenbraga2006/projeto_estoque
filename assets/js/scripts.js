$(document).ready(function(){
	var alturaTela = $(window).height();
	$('#login .row').css('height', alturaTela+'px');
	setInterval(aparece(), 3000);

	$('#busca').focus();
});
function aparece(){
	$('#login .row').css('opacity', '1');
}