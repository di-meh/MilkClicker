/**
Inspiré du code du cours en ligne vidéo de : Lior CHAMLA
https://www.youtube.com/watch?v=D949qiGjyAU

L'idée y était d'incorporer ce système de chat en AJAX avec notre jeu . 
 */
function getMessages(){
 console.log("SALUT 1");
  // Requête pour se connecter au serveur et acceder aux fichiers du module jeu .
  const requeteAjax = new XMLHttpRequest();
  console.log(requeteAjax.value);
  console.log(requeteAjax);
  requeteAjax.open("GET", "index.php?module=jeu&action=getMessages");
  console.log(requeteAjax.value);
  console.log(requeteAjax);
  console.log("SALUT 2");
  // Récupération des données sous format JSON pour les traiter en texte brute pour former le HTML 
  requeteAjax.onload = function(){
    const res = JSON.parse(requeteAjax.responseText);
    const html = res.reverse().map(function(message){
      return `
        <div class="message">
          <span class="date">${message.dateMessage.substring(11, 16)}</span>
          <span class="pseudo">${message.pseudo}</span> : 
          <span class="contenu">${message.contenu}</span>
        </div>
      `
    }).join('');

    const messages = document.querySelector('.messages');

    messages.innerHTML = html;
    messages.scrollTop = messages.scrollHeight;
  }

  // Envoi de la requête
  requeteAjax.send();
}



function postMessage(event){
  console.log("au revoir 2");
  // STOP le submit du formulaire
  event.preventDefault();

  // Récupération données formulaire
  const pseudo = document.querySelector('#pseudo');
  const contenu = document.querySelector('#contenu');

  // Traitement des données 
  const data = new FormData();
  data.append('pseudo', pseudo.value);
  data.append('contenu', contenu.value);

  // Préparation requête AJAX pour envoi des données
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open('POST', 'index.php?module=jeu&action=postMessage');
  
  requeteAjax.onload = function(){
    contenu.value = '';
    contenu.focus();
    getMessages();
  }

  requeteAjax.send(data);
}

document.querySelector('form').addEventListener('submit',function(){
  postMessage();
});

/**
 Intervalle pour simuler le temps réel.
 */
const interval = window.setInterval(getMessages, 3000);

getMessages();

// Ce code est en grande partie tiré du cours en ligne de Lior CHAMLA .