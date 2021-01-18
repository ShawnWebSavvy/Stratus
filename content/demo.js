var bricklayer = new Bricklayer(document.querySelector('.bricklayer'))
bricklayer.on("afterAppend", function (e) {
  var el = e.detail.item;
  el.classList.add('is-append');
  setTimeout(function () {
    el.classList.remove('is-append');
  }, 500);
});

var buttons = document.querySelectorAll("button");

function goToScroll(value) {
  document.body.scrollTop = value
}
Array.prototype.slice.call(buttons).forEach(function (button) {
  button.addEventListener('click', function (e) {
    var button = e.target
    if (button.hasAttribute("data-append")) {
      bricklayer.append(box);
      goToScroll(document.body.scrollHeight)
    }
  });
});
