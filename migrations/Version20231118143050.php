<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231118143050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, num_article INT NOT NULL, titre VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, texte LONGTEXT NOT NULL, auteur VARCHAR(255) NOT NULL, statut TINYINT(1) NOT NULL, commentaire_publication LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_23A0E66C739148F (num_article), INDEX IDX_23A0E66FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis_article (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, id_note_article INT NOT NULL, avis_article INT NOT NULL, UNIQUE INDEX UNIQ_29399E60A05DBF8E (id_note_article), INDEX IDX_29399E607294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis_encyclopedie (id INT AUTO_INCREMENT NOT NULL, encyclopedie_id INT DEFAULT NULL, id_note_encyclopedie INT NOT NULL, avis_encyclopedie INT NOT NULL, UNIQUE INDEX UNIQ_31A300FD1B56F1E6 (id_note_encyclopedie), INDEX IDX_31A300FD8DA0C4D0 (encyclopedie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis_recette (id INT AUTO_INCREMENT NOT NULL, recette_id INT DEFAULT NULL, id_note_recette INT NOT NULL, avis_recette INT NOT NULL, UNIQUE INDEX UNIQ_62B8F396EBDCD278 (id_note_recette), INDEX IDX_62B8F39689312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE calendrier (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, num_encart_calendaire INT NOT NULL, debut DATE NOT NULL, fin DATE NOT NULL, type VARCHAR(255) DEFAULT NULL, statut TINYINT(1) NOT NULL, commentaire_publication LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_B2753CB974E4DE04 (num_encart_calendaire), INDEX IDX_B2753CB9FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE encyclopedie (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, id_encyclopedie INT NOT NULL, titre VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, mois_semis INT NOT NULL, mois_repiquage INT DEFAULT NULL, mois_recolte INT DEFAULT NULL, climat VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, nouriture VARCHAR(255) DEFAULT NULL, famille VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, localisation VARCHAR(255) NOT NULL, statut TINYINT(1) NOT NULL, commentaire_publication LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_779557C9545422BB (id_encyclopedie), INDEX IDX_779557C9FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, id_log INT NOT NULL, description_log VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8F3F68C5119B809F (id_log), INDEX IDX_8F3F68C5727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, num_recette INT NOT NULL, liste_ingredients LONGTEXT NOT NULL, instruction LONGTEXT NOT NULL, temps_preparation VARCHAR(255) NOT NULL, exemple_utilisation LONGTEXT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, statut TINYINT(1) NOT NULL, commentaire_publication LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_49BB63908CB87979 (num_recette), INDEX IDX_49BB6390FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, annee_experience INT NOT NULL, localisation_potager VARCHAR(255) NOT NULL, role TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE avis_article ADD CONSTRAINT FK_29399E607294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE avis_encyclopedie ADD CONSTRAINT FK_31A300FD8DA0C4D0 FOREIGN KEY (encyclopedie_id) REFERENCES encyclopedie (id)');
        $this->addSql('ALTER TABLE avis_recette ADD CONSTRAINT FK_62B8F39689312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE calendrier ADD CONSTRAINT FK_B2753CB9FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE encyclopedie ADD CONSTRAINT FK_779557C9FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE log ADD CONSTRAINT FK_8F3F68C5727ACA70 FOREIGN KEY (parent_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66FB88E14F');
        $this->addSql('ALTER TABLE avis_article DROP FOREIGN KEY FK_29399E607294869C');
        $this->addSql('ALTER TABLE avis_encyclopedie DROP FOREIGN KEY FK_31A300FD8DA0C4D0');
        $this->addSql('ALTER TABLE avis_recette DROP FOREIGN KEY FK_62B8F39689312FE9');
        $this->addSql('ALTER TABLE calendrier DROP FOREIGN KEY FK_B2753CB9FB88E14F');
        $this->addSql('ALTER TABLE encyclopedie DROP FOREIGN KEY FK_779557C9FB88E14F');
        $this->addSql('ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C5727ACA70');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390FB88E14F');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE avis_article');
        $this->addSql('DROP TABLE avis_encyclopedie');
        $this->addSql('DROP TABLE avis_recette');
        $this->addSql('DROP TABLE calendrier');
        $this->addSql('DROP TABLE encyclopedie');
        $this->addSql('DROP TABLE log');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
