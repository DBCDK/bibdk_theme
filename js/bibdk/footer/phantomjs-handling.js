/**
 * @file
 * PhantomJS is flagged as a touch enabled browser. To avoid that the
 * Modernizr.touch flag is overridden.
 */

(function(){
  if(window._phantom){
    Modernizr.touch = false;
  }
})();