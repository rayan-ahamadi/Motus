
fetch('mots.json')
  .then(response => {
    if(!response.ok){
      throw new Error("Erreur")
    }
    return response.json();
  })
  .then(data => {

    let wordList = new Array();
    //dat est l'index dans ce for
    for(let dat in data){
      wordList.push(data[dat]["mot"])
    }
    //Ici on va exécuter le code du reste du jeu 
    // car on dépend de la donnée json

    const newLetter = wordList[randomIndex(wordList)];
    putLetter(newLetter);

    const submitText = document.querySelector('#submit-input');
    submitText.addEventListener('click' , () => {checkWord(newLetter)});

  })
  .catch(error => {
    console.log(error);
  })



function randomIndex(array){
  const randomIndex = Math.floor(Math.random() * (array.length));
  return randomIndex
}

function putLetter(word){
  const wordContainer = document.querySelector(".word");
  let listWord = word.split('');
  // Remplacer les lettres pas encore devinés par des points
  for(i=0;i<listWord.length;i++){
    if(!i == 0){
      listWord[i] = "."
    }
  }

  // Ajouter les mots aux container
  for(i=0;i<listWord.length;i++){
    let newdiv = document.createElement('div')
    newdiv.classList = 'letter';
    newdiv.textContent = listWord[i];
    wordContainer.appendChild(newdiv);
  }
  setInputTextLength(listWord.length)
}

function setInputTextLength(length){
  const inputText = document.querySelector('#text-input');
  inputText.minLength = length;
  inputText.maxLength = length;

}


// Script pour contrôler la saisie de texte
const textInput = document.querySelector('#text-input');
textInput.addEventListener('input',(e) => {
  const input = e.target; 
  const valueInput = input.value;

  if(input.value){
  
    let valueList = valueInput.split('');

    valueList[valueList.length - 1] = valueList[valueList.length - 1].toUpperCase();


    input.value = '';
    input.value = valueList.join("");

  }  
})

//script pour le submit

let nbCoup = 6;
let nbPoints = 12;
function checkWord(realWord){
  const lastWord = document.querySelectorAll('.word:last-child .letter' );
  const wordList = realWord.split('');
  const textGiven = document.querySelector('#text-input').value.split('');
  const goodResponse = new Array();
  const userName = document.querySelector('#h1-name').getAttribute('data-username');
  const idUser = document.querySelector('#h1-name').getAttribute('data-id'); 
  


  for(i=0;i<lastWord.length;i++){
    if(textGiven[i] == wordList[i]){
      lastWord[i].style.color = 'green';
      lastWord[i].textContent = textGiven[i];
      goodResponse.push(textGiven[i]);
    }else{
      lastWord[i].style.color = 'red';
      lastWord[i].textContent = textGiven[i];
      lastWord[i].classList.add('text-decoration-line-through');
      goodResponse.push('.');
    }
  }

  if(goodResponse.join('') == realWord && nbCoup > 0){
    document.querySelector('#text-input').value = "";
    alert('Bravo vous avez trouvé le mot !');
    document.querySelector('#text-input').disabled = true;
    document.querySelector('#retry-input').hidden = false;
    document.querySelector('#submit-input').hidden = true;
    if(userName != 'Joueur' && idUser != 'NULL'){
      addScoreOnDb(nbPoints);
      addWordOnDb(realWord,nbCoup);
    }
  }else if(nbCoup == 0){
    document.querySelector('#text-input').value = "";
    alert('Vous avez perdu !');
    document.querySelector('#text-input').disabled = true;
    document.querySelector('#retry-input').hidden = false;
    document.querySelector('#submit-input').hidden = true;
  }
  else{
    document.querySelector('#text-input').value = "";
     nbCoup -= 1;
     nbPoints -= 2;
     tryNewWord(goodResponse,nbCoup);
  }
  
 
}

function tryNewWord(letterList,nbCoup){
  //On va créer un nouveau mot (nouvelle div mot)
  const wordContainer = document.querySelector('.word-container');
  const newWord = document.createElement('div');
  newWord.classList = 'word';
  wordContainer.appendChild(newWord);

  //On va ajouter les lettres du mot
  for(i=0;i<letterList.length;i++){
    let newdiv = document.createElement('div')
    newdiv.classList = 'letter';
    newdiv.textContent = letterList[i];
    newWord.appendChild(newdiv);
  }
  document.querySelector('#nbCoup').textContent = `Il vous reste ${nbCoup} coups - Vous êtes à ${nbPoints} points`;
}

const retryButton = document.querySelector('#retry-input');
retryButton.addEventListener('click',() => {
  location.reload();
})

//code pour les requêtes post vers la BD

// ajouter dans la table mot

function addWordOnDb(word,nbCoups){
  let idUser = document.querySelector('#h1-name').getAttribute('data-id'); 
  //il faut récuperer en combien de coups le mot est trouvé
  nbCoups = 6 - nbCoups;
  const data = {
    mot: word,
    idUser: idUser,
    nbCoups: nbCoups
  }
  
  fetch('../controller/updateWords.php',{
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams(data).toString()})
    .then(response => {
      if(!response.ok){
        throw new Error("Erreur")
      }
      return response.json();}
    )
    .catch(error => {
      console.log(error);
    })
}

// ajouter dans la table score

function addScoreOnDb(score){
  let userName = document.querySelector('#h1-name').getAttribute('data-username');

  const data = {
    username: userName,
    score: score
  }
  
  fetch('../controller/updateNbPoints.php',{
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams(data).toString()
  })
  .then(response => {
    if(!response.ok){
      throw new Error("Erreur")
    }
    console.log(response);})
  .catch(error => {
    console.log(error);
  })

}



