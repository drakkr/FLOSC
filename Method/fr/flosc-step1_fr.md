## Étape 1 : estimation des Points de Fonction

### Référentiel IFPUG d'Atos

Depuis 2007, Atos a généralisé au niveau du groupe l'utilisation de la méthode des Points de Fonction et plus particulierment d'IFPUG. Nous disposons ainsi d'un référentiel conséquent de projets évalués selon cette méthode et disposons donc de métriques utilisables pour estimer le nombre de Points de Fonction de nouveaux projets.

La métrique que nous proposons d'utiliser est la correspondance entre le nombre de lignes de code source (_SLOC_ en anglais) et de nombre de Points de Fonction. En effet, les projets estimés en nombre de Points de Fonction sont ensuite, une fois développés, mesurés en nombre SLOC afin de tenir à jour le référentiel IFPUG d'Atos.

### Nombre de SLOC

La notion de nombre de lignes de code source (SLOC) utilisée est celle définie et détaillée par Robert Park^[<http://www.sei.cmu.edu/library/abstracts/reports/92tr020.cfm>] du Software Engineering Institute et dont le comptage est implémenté par de nombreux outils. Nous utilisons l'implémentation libre que nous considérons comme la plus maintenue et supportant le plus de langages : cloc^[<http://cloc.sourceforge.net>].

### Ratios PF/SLOC par langages de programmation

Le référentiel différencie les ratios PF/SLOC en fonction des langages de programmation utilisés pour développer les logiciels. En effet, certains langages étant plus verbeux que d'autres, il convient de prendre ce paramètre en ligne de compte.

En outre les ratios utilisés proviennent des médianes des valeurs mesurées par langage. Le tableau ci-dessus présente ces ratios pour les langages les plus connus. 

  Langage       Ratio PF/SLOC médian
----------    ------------------------
  C              107
  C++            53
  HTML           42
  Java           53
  JavaScript     55
  Perl           57
  PHP            56
  Python         57
  SQL            30

La liste détaillée des ratios pour les différents langages reconnus par cloc est accessible en annexe du présent document.
