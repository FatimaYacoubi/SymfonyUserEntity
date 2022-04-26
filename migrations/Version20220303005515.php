<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220303005515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE role CHANGE description_role description_role LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE nom_utilisateur nom_utilisateur VARCHAR(255) NOT NULL, CHANGE prenom_utilisateur prenom_utilisateur VARCHAR(255) NOT NULL, CHANGE adresse_utilisateur adresse_utilisateur VARCHAR(255) NOT NULL, CHANGE mail_utilisateur mail_utilisateur VARCHAR(255) NOT NULL, CHANGE sudo_utilisateur sudo_utilisateur VARCHAR(255) NOT NULL, CHANGE etat_compte etat_compte VARCHAR(255) NOT NULL, CHANGE numero_utilisateur numero_utilisateur VARCHAR(255) NOT NULL, CHANGE date_n_utilisateur date_n_utilisateur DATE NOT NULL, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, mail_utilisateur VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9A9C31E6E (mail_utilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE role CHANGE description_role description_role VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE nom_utilisateur nom_utilisateur VARCHAR(255) DEFAULT NULL, CHANGE prenom_utilisateur prenom_utilisateur VARCHAR(255) DEFAULT NULL, CHANGE adresse_utilisateur adresse_utilisateur VARCHAR(255) DEFAULT NULL, CHANGE mail_utilisateur mail_utilisateur VARCHAR(255) DEFAULT NULL, CHANGE sudo_utilisateur sudo_utilisateur VARCHAR(255) DEFAULT NULL, CHANGE roles roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE etat_compte etat_compte VARCHAR(255) DEFAULT NULL, CHANGE numero_utilisateur numero_utilisateur VARCHAR(255) DEFAULT NULL, CHANGE date_n_utilisateur date_n_utilisateur DATE DEFAULT NULL');
    }
}
