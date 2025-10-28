/* script to control page scroll with arrows */
var height = 0.9 * window.innerHeight;

function scrollDown() {
window.scrollBy({
top: height,
behavior: 'smooth',
});
}
function scrollUp() {
window.scrollBy({
top: -height,
behavior: 'smooth',
});
}