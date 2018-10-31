
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('angular');
require('jquery-autogrow-textarea');
import * as Ladda from 'ladda';


$(function () {
  $('[data-toggle="tooltip"]').tooltip();

  // Ladda button - Buttons with built-in loading indicators
  Ladda.bind('button[type=submit]', {
      style: 'expand-left',
  });
})
