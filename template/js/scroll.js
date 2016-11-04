/**
 * Created by Александр on 14.07.2016.
 */
function cuteScroll(arrow, header) {
	var offsetHeader = header.offset().top;

	arrow.click(function () {
    	$('html, body').animate({ scrollTop : offsetHeader }, 'slow');
	});
}