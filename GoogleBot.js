// ==UserScript==
// @name         GoogleBot 21.04
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       Ekaterina
// @match        https://www.google.com/*
// @match        https://www.napli.ru*
// @match        https://www.kiteuniverse.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==
//"10 самых популярных шрифтов от Google", "Отключение редакций и ревизий в WordPress", "Вывод произвольных типов записей и полей в WordPress"
let sites = {"napli.ru":["Редакции — это резервные копии",
                         "10 самых популярных шрифтов от Google",
                         "Отключение редакций и ревизий в WordPress",
                         "Вывод произвольных типов записей и полей в WordPress",],
             "kiteuniverse.ru":["Kite Universe Россия", "Красота. Грация. Интеллект", "Мастер классы Kite Universe",]};

let site = Object.keys(sites)[getRandom(0, Object.keys(sites).length)];
let keywords = sites[site];
let keyword = keywords[getRandom(0, keywords.length)];
let btnK = document.getElementsByName("btnK")[0];
let links = document.links;
let googleInput = document.getElementsByName("q")[0];

if (btnK !== undefined) {
  document.cookie = "site=" + site;
  console.log(site);
}else if (location.hostname == "www.google.com") {
  site = getCookie("site");
  console.log(site);
}else {
  site = location.hostname;
  console.log(site);
}


if (btnK !== undefined) {
  document.cookie = "site=" + site;
  let i = 0;
  let timerId = setInterval(() => {
    googleInput.value += keyword[i];
    i++;
    if (i == keyword.length) {
      clearInterval(timerId);
      btnK.click();
    }
  }, 500);
} else if (location.hostname == site) {
  setInterval(() => {
    let index = getRandom(0, links.length);
  console.log(site);
    if (getRandom(0, 101) >= 80) {
      location.href = "https://www.google.com/";
    } else if (links[index].href.indexOf(site) !== -1) {
      links[index].click();
    }
  }, getRandom(3000, 5000));
  //console.log("Мы на napli.ru ");
} else {
  let nextGooglePage = true;
  for (let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf(site) !== -1) {
      let link = links[i];
      nextGooglePage = false;
      //console.log("Нашел строку " + links[i]);
      setTimeout(() => {
        link.click();
      }, getRandom(2500, 4000));
      break;
    }
  }
  if (document.querySelector(".YyVfkd").innerText == "5") {
    nextGooglePage = false;
    location.href = "https://www.google.com/";
  }
  if (nextGooglePage) {
    setTimeout(() => {
      pnnext.click();
    }, getRandom(2000, 4000));
  }
}

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
