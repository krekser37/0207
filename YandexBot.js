// ==UserScript==
// @name         YandexBot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       Ekaterina
// @match        https://yandex.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==


let keywords = ["купля-продажа авто", "каталог автомобилей", "автомобили купить"];
let keyword = keywords[getRandom(0, keywords.length)];
let button = document.querySelectorAll(".mini-suggest__button")[0];
let links = document.links;
let text = document.getElementById('text');

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

if(button !== undefined) {
  text.click();
  text.value = keyword;
  button.click();
  for (let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf("auto.ru") !== -1) {
      let link = links[i];
      console.log("Нашел строку " + links[i]);
      console.log(links[i]);
      link.setAttribute('target', '_self');
      link.click();
      console.log(link);
      break;
    }
  }
} else {
  console.log("Button undef");
}
