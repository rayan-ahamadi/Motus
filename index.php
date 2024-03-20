<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Motus</title>
  </head>
  <body>
    <div class="root">

      <!-- Jeu !-->
      <div class="game">
        <h1>Motus</h1>
        <section class="word-container">
          <div class="word">
            
          </div>
        </section>
        <p id="nbCoup">Il vous reste : 6 coups</p>
        <section class="input-container">
          <input type="text" id="text-input" autocomplete="off" required autofocus>
          <input type="submit" value="Confirmer" id="submit-input">
        </section>
        <input type="submit" value="Recommencer" id="retry-input" hidden>
      </div>

      <!-- Liste des mots devinés !-->
      <div class="Hall of Fame">
        <h2>Hall of Fame (vos mots devinés)</h2>
        <table>
            <p>En développement...</p>
        </table>
      </div>

      <!-- Classement des joueurs dans la db !-->
      <div class="classement">
        <h2>Classement des joueurs</h2>
        <table>
          <p>En développement...</p>
        </table>
      </div>

    </div>
  </body>
</html>