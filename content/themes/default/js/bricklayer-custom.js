var isClassExist = document.getElementsByClassName('bricklayer');
if (isClassExist.length > 0) {
  var bricklayer = new Bricklayer(document.querySelector('.bricklayer'));
  bricklayer.on("afterAppend", function (e) {
    var el = e.detail.item;
    el.classList.add('is-append');
    setTimeout(function () {
      el.classList.remove('is-append');
    }, 500);
  });
}
