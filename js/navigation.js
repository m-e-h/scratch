/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
(function() {
  var appbarElement, body, closeMenu, main, menuBtn, navdrawerContainer, querySelector, toggleMenu;

  closeMenu = function() {
    body.classList.remove('open');
    appbarElement.classList.remove('open');
    navdrawerContainer.classList.remove('open');
  };

  toggleMenu = function() {
    body.classList.toggle('open');
    appbarElement.classList.toggle('open');
    navdrawerContainer.classList.toggle('open');
    navdrawerContainer.classList.add('opened');
  };

  'use strict';

  querySelector = document.querySelector.bind(document);

  navdrawerContainer = querySelector('.menu');

  body = document.body;

  appbarElement = querySelector('#header');

  menuBtn = querySelector('.menu-toggle');

  main = querySelector('.site-container');

  main.addEventListener('click', closeMenu);

  menuBtn.addEventListener('click', toggleMenu);

}).call(this);
