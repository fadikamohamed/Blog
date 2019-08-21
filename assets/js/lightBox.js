/**
 * Comment
 */
function startLightBox(idImg) {
    var lbbg = document.getElementById('lightBoxBg');
    var lb = document.getElementById('lightBox');
    var img = document.getElementById(idImg);
    var src = img.getAttribute('src');
    lb.innerHTML = '<p><img id="lightBoxImg" src="' + src + '"></p>';
    lbbg.style.display = 'block';
    lb.style.display = 'block';
}
function dismiss() {
    var lbbg = document.getElementById('lightBoxBg');
    var lb = document.getElementById('lightBox');
    lbbg.style.display = 'none';
    lb.style.display = 'none';
    lb.removeChild(img);
}