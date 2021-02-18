<?php

namespace App\DataFixtures;

use App\Entity\Agrement;
use App\Entity\Bien;
use App\Entity\NormeEnvironnementale;
use App\Entity\Note;
use App\Entity\PeriodeConstruction;
use App\Entity\TypeConstruction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * TODO : Créer un bien
 * TODO : Créer une Période de construction
 * TODO : Créer un type de construction
 * TODO : Créer une Norme_Environnementale
 * TODO : Créer une Note
 * TODO : Créer un agrement
 */
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /**
         * ?Création des biens
         */
        $biens = [];
        // *Création du bien 
        $bien = new Bien;
        $bien->setLoyer(650)
            ->setVille("Strasbourg");

        // Stocker le bien dans une liste
        $biens[] = $bien;

        // Persister le bien
        $manager->persist($bien);

        /**
         * ?Création Période de Construction
         */

        $perdiodeConstructions = [];
        $periodeConstruction = new PeriodeConstruction;
        $periodeConstruction->setPeriode("Avant 2005");

        //Stocker la période dans une liste
        $perdiodeConstructions[] = $periodeConstruction;
        // Persister la période
        $manager->persist($periodeConstruction);

        /**
         * ?Création du type de construction  
         * Appartement,Maison,Studio...
         */
        $typeConstructions = [];

        $typeConstruction = new TypeConstruction;
        $typeConstruction->setNom("Appartement");

        // Sauvegarder le type dans une liste
        $typeConstructions[] = $typeConstruction;

        // Persister le type de construction
        $manager->persist($typeConstruction);

        /**
         * ?Création du type de Norme Environnementale
         * DPE...
         */
        $normeEnvironnementale = new NormeEnvironnementale;
        $normeEnvironnementale->setNom("DPE");

        /**
         * ? Création des notes allant de A jusqu'à G pour les normenes environnementales
         */
        $notes = [];
        $grades = ["A", "B", "C", "D", "E", "F", "G"];

        foreach ($grades as $i) {
            $note = new Note;
            $note->setGrade($i);

            // Sauvegarder la note dans une liste
            $notes[] = $note;

            // Persister la note
            $manager->persist($note);
        }
        /**
         * ? Création des agréments
         * Terasse, Cave, Grenier...
         */
        $agrements = [];
        $agrementsType = ["Ascenseur", "Grenier", "Cave"];
        foreach ($agrementsType as $i) {
            $agrement = new Agrement;
            $agrement->setNom($i);

            // Sauvegarder l'agrément une liste
            $agrements[] = $agrement;

            // Persiter l'agrément
            $manager->persist($agrement);
        }
        $manager->flush();
    }
}
