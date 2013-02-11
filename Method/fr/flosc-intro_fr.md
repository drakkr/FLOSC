# Introduction

L'évaluation de la complexité d'un logiciel est une problématique connue de l’ingénierie du développement. Plusieurs méthodes ont été proposées en allant du simple comptage du nombre de lignes de code à des démarche plus élaborées comme la méthode des points de fonction.

Nous proposons une méthode intermédiaire entre ces deux extrêmes pour pouvoir disposer d'une démarche simple, adaptée à la nature des logiciels libres ou open source et pouvant être outillée.

La méthode d'analyse en Points de Fonction (PF) mesure la taille d'une application en quantifiant les fonctionnalités offertes aux utilisateurs ou aux autres applications ainsi que les données manipulées. Cette mesure est réalisée en se basant sur les spécifications fonctionnelles et la modélisation logique des données.

Les concepts de cette méthode sont basés sur le point de fonction qui est une unité de mesure, permettant d'exprimer la taille fonctionnelle d'un système d'information du point de vue des utilisateurs métiers. Le Point de Fonction est une métrique informatique de référence. Elle permet de déterminer la taille fonctionnelle d'une application, basée sur les fonctionnalités perçues par les utilisateurs, et indépendamment des techniques mises en œuvre pour la réalisation et l'exploitation du système.

Le standard de l'IFPUG^[<http://www.ifpug.org>] (_International Function Point Users Group_), normalisé à l'ISO, a notamment été retenu par Atos pour l’analyse en Points de Fonction de ses projets.
