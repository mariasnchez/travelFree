const translations = {};


function setLanguageCookie(language) {
  document.cookie = `language=${language}; path=/;`;
}

function loadTranslations(language) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `/lang/${language}.json`, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      translations[language] = JSON.parse(xhr.responseText);
      translate(language);
    }
  };
  xhr.send();
}

function translate(language) {
  const translationElements = document.getElementsByClassName('translationText');

  for (let i = 0; i < translationElements.length; i++) {
    const translationKey = translationElements[i].getAttribute('data-translation-key');
    const elementType = translationElements[i].tagName.toLowerCase();

    if (translations[language] && translations[language][translationKey]) {
      if (elementType === 'input') {
        const placeholderTranslation = translations[language][`${translationKey}_placeholder`];
        if (placeholderTranslation) {
          translationElements[i].setAttribute('placeholder', placeholderTranslation);
        }
      } else {
        translationElements[i].textContent = translations[language][translationKey];
      }
    }
  }
}

function getLanguageFromCookie() {
  const cookies = document.cookie.split(';');
  for (let i = 0; i < cookies.length; i++) {
    const cookie = cookies[i].trim();
    if (cookie.startsWith('language=')) {
      return cookie.substring('language='.length);
    }
  }
  return null;
}

window.addEventListener('DOMContentLoaded', function () {
  const language = getLanguageFromCookie();
  if (language) {
    loadTranslations(language);
  }
});

document.getElementById('EnglishButton').addEventListener('click', function () {
  setLanguageCookie('en');
  loadTranslations('en');
});

document.getElementById('SpanishButton').addEventListener('click', function () {
  setLanguageCookie('es');
  loadTranslations('es');
});
