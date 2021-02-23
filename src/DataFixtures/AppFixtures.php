<?php

namespace App\DataFixtures;

use App\Entity\Agrement;
use App\Entity\Bien;
use App\Entity\NatureLocation;
use App\Entity\NormeEnvironnementale;
use App\Entity\Note;
use App\Entity\PeriodeConstruction;
use App\Entity\TypeConstruction;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
    protected $faker, $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        // $this->faker = new Factory::create("fr_FR");
        $this->faker = Factory::create("fr_FR");
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        /**
         * Création des Agréments
         */
        $agrements = [];
        $agrementList = ["Balcon", "Terasse", "Ascenseur", "Grenier"];
        foreach ($agrementList as $i) {
            $agrement = new Agrement;
            $agrement->setLabel($i);

            $manager->persist($agrement);
            $agrements[] = $agrement;
        }
        /**
         * Création des Normes Environnementales
         * DPE et GES
         */
        $normeEnviDPE = new NormeEnvironnementale;
        $normeEnviDPE->setNom("DPE");

        $manager->persist($normeEnviDPE);

        $normeEnviGSE = new NormeEnvironnementale;
        $normeEnviGSE->setNom("GSE");

        $manager->persist($normeEnviGSE);

        /**
         * Création des notes pour les normes Environnementales DPE et GES
         * Les notes allant de A jusqu'à E
         */
        $notesListe = ["A", "B", "C", "D", "E", "E", "G"];
        $notes = [];

        foreach ($notesListe as $i) {
            $note = new Note;
            $note->setGrade($i);

            $notes[] = $note;

            $manager->persist($note);
        }


        /**
         * Création des types de bien ( maison , appartement...)
         */
        $typesBienListe = ["Appartement", "Maison", "Résidence Etudiante", "Studio"];
        $typeConstructions = [];

        foreach ($typesBienListe as $i) {
            $construction = new TypeConstruction;
            $construction->setNom($i);

            // Sauvegarder le type dans une liste
            $typeConstructions[] = $construction;

            $manager->persist($construction);
        }

        /**
         * Création Période de Construction
         * Il y en a 4
         */
        $perdioDeConstructionListe = [
            'Avant 1945',
            "Entre 1945 et 1974",
            "Entre 1975 et 1989",
            "Entre 1989 et 2005",
            "Après 2005"
        ];
        $perdiodeConstruction = [];
        foreach ($perdioDeConstructionListe as $i) {
            $periode = new PeriodeConstruction;
            $periode->setPeriode($i);

            $perdiodeConstruction[] = $periode;
            $manager->persist($periode);
        }

        /**
         * Nature de la location
         */
        $typeLocationListe = [
            "Colocation",
            "Co-Living",
            "Meublé",
            "Non Meublé"
        ];

        $locations = [];

        foreach ($typeLocationListe as $i) {
            $natureLocation = new NatureLocation;
            $natureLocation->setType($i);

            $locations[] = $natureLocation;
        }

        /**
         * Création de l'Admin
         */
        $admin = new User();
        $admin->setEmail("admin@admin.com")
            ->setFirstName("AdminFirstName")
            ->setLastName("AdminLastName")
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->encoder->encodePassword($admin, 'password'));
        // Persist Admin
        $manager->persist($admin);

        /**
         * @var Collection|User[]
         * @psalm-var Collection<int, User>
         * Liste des utilisateurs locataires
         */
        $locataires = [];

        /**
         * Création des locataires
         * 
         */

        for ($i = 0; $i < 10; $i++) {
            $user = new User;
            $user->setEmail("locataire$i@gmail.com")
                ->setFirstName($this->faker->firstName)
                ->setLastName($this->faker->lastName)
                // ->setUsername($this->faker->)
                ->setPassword($this->encoder->encodePassword($user, 'password'))
                ->setLocataire(true)
                ->setProprietaire(false);
            $locataires[] = $user;
            $manager->persist($user);
        }


        /**
         * @var Collection|User[]
         * @psalm-var Collection<int, User>
         * Liste des utilisateurs propriétaires
         */
        $proprietaires = [];

        /**
         * Création des propriétaires
         */

        for ($i = 0; $i < 10; $i++) {
            $user = new User;
            $user->setEmail("proprietaire$i@gmail.com")
                ->setFirstName($this->faker->firstName)
                ->setLastName($this->faker->lastName)
                ->setPassword($this->encoder->encodePassword($user, 'password'))
                ->setLocataire(false)
                ->setProprietaire(true);
            $users[] = $user;
            $manager->persist($user);
        }


        /**
         * Configuration des utilisateurs et des biens
         */
        // foreach ($users as $user) {

        //     $user->
        // }
        $manager->flush();
    }
}
