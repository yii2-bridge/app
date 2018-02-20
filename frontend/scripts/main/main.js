'use strict';

import myModule from './module-to-import';

$(document).ready(function() {

  let welcomeFunction = function(name) {
    console.log('Yo ' + name + ' !');
  }('Rocketman');

  // imported module
  myModule('myModule');
});

