# Structure du site IDEONS

```
page_web_iot/
├── index.html            accueil (hero, comment ça marche, gamme, sécurité)
├── produits.html         produits & services
├── equipe.html           à propos (contenu à venir)
├── connexion.html        page connexion
├── inscription.html      page création de compte
├── deconnexion.html      page déconnexion
└── assets/css/
    ├── 01-tokens.css      couleurs, polices, espacements (variables)
    ├── 02-base.css        reset, typographie, .container
    ├── 03-components.css  .btn, .eyebrow, .section-head / .section-title
    ├── 04-header.css      <header class="site-header">
    ├── 05-hero.css        <section class="hero" id="accueil">
    ├── 06-how.css         <section class="how" id="fonctionnement">
    ├── 07-range.css       <section class="range" id="gamme">
    ├── 08-safety.css      <section class="safety" id="securite">
    ├── 09-footer.css      <footer class="site-footer">
    ├── 10-effects.css     barre de scroll, apparitions douces (optionnel)
    ├── 11-pages.css       utilitaires partagés + page produits.html
    └── 12-auth.css        pop-ups et pages connexion / inscription
```

Un fichier CSS = un bloc de la page. Pour changer une section, tu n'ouvres
que son fichier (40 à 100 lignes). Pas besoin de lire les 11 autres.

- Tu veux changer une couleur, une police, un espacement partout sur le
  site ? → `assets/css/01-tokens.css`
- Tu veux changer le texte ou la structure d'une section ?
  ouvre la page `.html` correspondante : chaque bloc est encadré par un
  commentaire du type
  `<!-- COMMENT ÇA MARCHE — styles : assets/css/06-how.css -->` qui te dit quel
  fichier CSS le concerne.
- Tu veux changer l'apparence d'une section (marges, tailles, couleurs
  locales) ? ouvre uniquement le fichier CSS indiqué dans ce commentaire.

## Blocs partagés entre les pages

Le header, le footer et les 3 pop-ups (`#connexion`, `#inscription`,
`#deconnexion`) sont copiés dans chaque page `.html` (HTML statique : pas
d'`include` comme avec PHP). Ils portent le commentaire
`bloc partagé` — si tu les modifies, recopie la même modification dans les
6 pages (ou un simple copier-coller depuis `index.html`).

## Ajouter une nouvelle section

1. Copie un bloc `<section>...</section>` existant dans `index.html`,
   colle-le où tu veux, change son `id` et son contenu.
2. Crée un fichier `assets/css/11-ma-section.css` sur le modèle des autres
   (commentaire d'en-tête + règles + media queries à la fin).
3. Ajoute `<link rel="stylesheet" href="assets/css/11-ma-section.css">` dans le
   `<head>` de la page concernée, après les autres.

## Réordonner ou supprimer une section

Chaque section ne dépend que de son propre fichier CSS (et parfois de
`03-components.css` pour les boutons et titres partagés, indiqué dans le
commentaire). Tu peux donc déplacer ou supprimer un bloc `<section>` dans
`index.html` sans toucher au CSS : rien ne casse ailleurs.

## Composants partagés

`03-components.css` contient les éléments réutilisés à plusieurs endroits
(`.btn`, `.eyebrow`, `.section-head`/`.section-title`). Si tu modifies ce
fichier, le changement s'applique partout où le composant est utilisé —
c'est voulu, pour ne pas avoir à répéter le même style dans chaque section.

`11-pages.css` contient les petits utilitaires repris sur plusieurs pages
(`.duo`, `.full`, `.more`, `.ticks`, `.muted`...) ainsi que les styles
propres à `produits.html` (fil d'ariane, pastilles, fiches techniques).

## Effets (optionnel)

`10-effects.css` gère uniquement les animations (barre de progression du
scroll, apparition douce des blocs `.reveal`). Tu peux supprimer ce fichier
(et sa ligne `<link>`) sans casser la mise en page : la page perd juste
ces deux effets.
