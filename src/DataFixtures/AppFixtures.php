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
use Symfony\Component\BrowserKit\History;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * TODO : Créer un bien
 * TODO : Créer une Période de construction
 * TODO : Créer un type de construction
 * TODO : Créer une Norme_Environnementale
 * TODO : Créer une Note ( cf VIRGILE )
 * TODO : Créer un agrement de maison, d'immeuble et autres ( parking, cave, grenier , jardin, box)
 * TODO : Proposer une durée si le contrat est de type MOBILITÉ (1 à 10 mois )
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
         * Création des types de bien ( maison , appartement...)
         */
        $typesBienListe = ["Appartement", "Villa", "Maison", "Résidence Etudiante", "Studio"];

        /**
         * @var Collection|TypeConstruction[]
         */
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
         * Les notes environnementales
         */
        $notes = ["A", "B", "C", "D", "E", "F", "G"];

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

            $manager->persist($natureLocation);
        }

        /**
         * Création de l'Admin
         */
        $admin = new User();
        $admin->setEmail("admin@admin.com")
            ->setFirstName("AdminFirstName")
            ->setLastName("AdminLastName")
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->encoder->encodePassword($admin, 'password'))
            ->setLocataire(false)
            ->setProprietaire(false);
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
         * Création des utilisateurs propriétaires
         */

        for ($i = 0; $i < 10; $i++) {
            $user = new User;
            $user->setEmail("proprietaire$i@gmail.com")
                ->setFirstName($this->faker->firstName)
                ->setLastName($this->faker->lastName)
                ->setPassword($this->encoder->encodePassword($user, 'password'))
                ->setLocataire(false)
                ->setProprietaire(true);
            $proprietaires[] = $user;
            $manager->persist($user);
        }

        /**
         * Initialisation des propriétaires avec au mieux 
         */
        foreach ($proprietaires as $proprietaire) {

            /**
             * Création et association des biens au propriétaire actuel.
             */
            for ($i = 0; $i < mt_rand(1, 2); $i++) {
                $bien = new Bien;
                // Assoficer le bien au propriétaire
                $bien->setUser($proprietaire);
                $bien
                    ->setType($this->faker->randomElement($typeConstructions))
                    ->setSuperficie(mt_rand(8, 400))
                    ->setPiece(mt_rand(1, 5))
                    ->setChambre(mt_rand(1, 4))
                    ->setLoyerReference(mt_rand(400, 850))
                    ->setLoyer(mt_rand(250, 2500))
                    ->setCharge(50, 250)
                    ->setDpe($this->faker->randomElement($notes))
                    ->setGse($this->faker->randomElement($notes))
                    ->setDateDisponibilite($this->faker->dateTimeThisYear())
                    // Définir aléatoirement le fait que la location soit disponible en ligne ou non
                    ->setLocationLigne([true, false][mt_rand(0, 1)])
                    ->setCaution(mt_rand(100, 500))
                    ->setMonopropriete([true, false][mt_rand(0, 1)])
                    ->setEauIndiv(([true, false][mt_rand(0, 1)]))
                    ->setFibre([true, false][mt_rand(0, 1)])
                    ->setTnt([true, false][mt_rand(0, 1)])
                    ->setCable([true, false][mt_rand(0, 1)])
                    ->setChauffageInd([true, false][mt_rand(0, 1)])
                    ->setNumeroLot(mt_rand(1, 50))
                    ->setIrl(mt_rand(100, 600))
                    ->setLoyerPrecedent(mt_rand(100, 600))
                    ->setProvisionCharge(mt_rand(100, 600))
                    ->setAdresse($this->faker->streetAddress)
                    ->setCodePostal($this->faker->postcode)
                    ->setVille($this->faker->postcode)
                    ->setDescription($this->faker->sentence(10))
                    ->setAfficherTelephone([true, false][mt_rand(0, 1)]);
                // Définir l'étage lorsqu'il ne s'agit pas d'une maison
                ($bien->getType() == "Maison") || ($bien->getType() == "Villa") ?: $bien->setEtage(mt_rand(1, 10));
                $manager->persist($bien);
            }
        }

        $manager->flush();
    }
}
