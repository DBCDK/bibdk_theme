(function () {
  var scripts = document.getElementsByTagName('script');
  var script = scripts[scripts.length - 1];
  var xhr = new XMLHttpRequest();

  xhr.onload = function () {
    var div = document.createElement('div');
    div.innerHTML = this.responseText;
    div.style.display = 'none';
    script.parentNode.insertBefore(div, script);
  };

  xhr.open('get', Drupal.settings.basePath + 'profiles/bibdk/themes/bibdk_theme/build/img/images.svg', true);
  xhr.send();
})();