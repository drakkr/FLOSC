##  Étape 2 : ajustement des Points de Fonction

Les Points de Fonction ainsi calculés sont ajustés selon les critères suivants :

* niveau d'industrialisation du projet en charge du développement du logiciel (critère C1) ;

* niveau d'organisation et d'architecture du code source (critère C2) ;

* dépendances du logiciel en termes de librairies externes et de greffons (critère C3).

Ces critères sont évalués avec des notes entières entre 0 et 2, dont les significations sont listées ci-après.

__Critère C1 :__ niveau d'industrialisation du projet :

* 0 : pas d'utilisation d'outils pour gérer le développement (bugtracker, forums...), code source difficile à trouver, pas de roadmap ;
* 1 : seuls quelques processus sont exposés, outillés et utilisés ;
* 2 : processus de développement, de demandes d'évolution, des tests, d'intégration continue... mis en œuvre, documentés et respectés.

__Critère C2 :__ niveau d'organisation et d'architecture du code :

* 0 : code monolithique, langage non objet, pas d'organisation du code en couches ou en modules ;
* 1 : code faiblement architecturé mais proposant quelques principes de factorisation du code, sans que cela soit généralisé à l'ensemble de ce dernier ;
* 2 : code très modulaire, orienté objet avec héritage et utilisation d'interfaces, organisé en modules correspondant à des couches fonctionnelles différentes.

__Critère C3 :__ dépendances du logiciels en termes de librairies externes et de greffons :

* 0 : logiciel embarquant de nombreuses librairies externes ou de nombreux greffons ;
* 1 : logiciel embarquant quelques librairies externes ou pouvant être étendu via quelques greffons ;
* 2 : logiciel n'embarquant aucune librairie externe et n'étant pas conçu pour être étendu via des greffons.

L'analyse en Points de Fonction IFPUG décrit la manière dont sont utilisés les paramètres d'ajustement pour modifier le nombre de PF, via la formule suivante :

$PF_{ajustés} = PF_{non-ajustés} * (0,65 + \frac{\sum paramètres}{100})$

Sachant que le nombre de paramètres proposés par IFPUG est de 14 et qu'ils sont notés de 0 à 5, ces derniers peuvent donc faire varier le nombre de PF de 65% à 135%.

Dans la version adaptée que nous proposons, nous n'utilisons que trois paramètres, pour rester dans le même ordre de variabilité que la méthode IFPUG standard nous utilisons donc la formule suivante :

$PF_{ajustés} = PF_{non-ajustés} * (0,65 + \frac{(2 - C1) + (2 - C2) + (2 - C3)}{20})$

## Étape 3 : détermination de la complexité

Sur la base de métriques obtenues lors de l'utilisation de cette démarche basée sur IFPUG, les abaques suivantes sont utilisées pour déterminer le niveau de complexité d'un logiciel open source.

Nombre de PF ajustés      Niveau de complexité
---------------------   ------------------------
Moins de 1000                  Simple
Entre 1000 et 10 000          Complexe
Plus de 10 000              Très complexe
