# Projet_-Fil_Rouge

## Définition de problème

- Le planning des sessions est actuellement imprimé et affiché sur un tableau en classe, ce qui limite l'accès et complique les mises à jour. Cette méthode manque de flexibilité et est peu pratique.


## Idéation

- Une solution numérique centralisée permettrait de gérer et mettre à jour les plannings en temps réel, accessible sur tous les appareils. Des notifications automatiques, des fonctionnalités collaboratives amélioreraient l'organisation et l'efficacité.

## mindmap
  root((Apprenant))
    Ce qu’il dit
      Dire["J’ai du mal à suivre les changements de planning."]
    Ce qu'il fait
      Fait["Consulte le planning affiché en classe."]
    Ce qu'il a besoin
      Besoin["Un accès rapide et en temps réel au planning des sessions."]
      Besoin["Des notifications ou rappels pour les sessions importantes."]


## mindmap
  root((formateur))
    Ce qu’il dit
      Dire["Je n’ai pas toujours une visibilité claire sur les modifications de planning."]
      Dire["C’est difficile de jongler entre formation et préparation des cours.."]
    Ce qu'il fait
      Fait["Consulte le planning sur Excel pour ses sessions."]
      Fait["Prépare ses supports de formation en fonction du calendrier."]
    Ce qu'il a besoin
      Besoin["Un accès facile et en temps réel au planning des sessions."]
      Besoin["Des notifications ou rappels pour les sessions planifiées."]



## mindmap
  root((Responsable de Formation))
    Ce qu’il dit
      Dire["C’est compliqué de gérer toutes les sessions sur Excel."]
      Dire["Je crains les erreurs lors des mises à jour des calendriers"]
    Ce qu'il fait
      Fait["Prépare le planning manuellement sur Excel en début d’année."]
      Fait["Travaille avec les formateurs pour fixer les horaires des sessions."]
    Ce qu'il a besoin
      Besoin["Un outil centralisé pour planifier les sessions facilement."]
      Besoin["Une visibilité claire sur les disponibilités des formateurs et les salles."]




## Sprint 1 : 
 @startuml
left to right direction

actor "Responsable de formation" as Admin
actor "Formateur" as Formateur

' Sprint 1
rectangle "Sprint 1 - Planification des sessions de formation" {

    usecase "Consulter les statistiques" as UC1
    usecase "Création de planning" as UC2

}



Admin -- UC1
Admin -- UC2


Formateur -- UC2





@enduml

## Diagramme des classes

classDiagram

namespace PkgPlanficationSessions {
  class Planification
  class Session
  class Module
  class Competence
  class Projet
}

namespace PkgCompetences {
  class Competence 
  class Module
}

class Competence {

  id : Integer
  nom : String
  description : Text

}

class Module {
  id : Integer
  nom : String
  description : Text
  
}

namespace PkgCreationProjet {
  class Projet
}

class Projet {
  id : Integer
  titre : String
  description : Text
  statut : String
}

namespace PkgFormation {
  class Module
  class Formateur
  class AnneeFormation
}

class Formateur {
  id : Integer
  nom : String
  prenom : String
  email : String
  telephone : String
}


class AnneeFormation {
  id : Integer
  date_debut : date
  date_fin : date
}


class Session{
  id : Integer
  date_debut : date
  date_fin : date
  num_semaine : Integer
  statut : String 


}

%% type : cc1, cc2, EFM
class Evaluation{
  id : Integer
  type : enum
  note : Integer
}
class Planification{
 id : Integer
 nom : String
}


Session "*" --> "*" Competence
Session "1" --> "*" Evaluation
Module "1" --> "*" Competence
Session "1" --> "1" Projet
Evaluation "*" --> "1" Module


Planification "1" --> "*" Session
Planification "1" --> "1" Formateur  
Planification "*" --> "1" AnneeFormation



- je travaille juste sur pkg_planification d'autre groupe travaillent sur d'autre package like (absence,inscription....)

- je travaille dans un application globale SOLILMS, mais chaque etudiant travaille sur une pkg