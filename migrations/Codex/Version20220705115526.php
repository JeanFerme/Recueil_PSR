<?php

declare(strict_types=1);

namespace codex;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220705115526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE SAVU (id INT AUTO_INCREMENT NOT NULL, codeVU VARCHAR(8) DEFAULT NULL, codeCIS VARCHAR(8) DEFAULT NULL, codeDossier VARCHAR(12) DEFAULT NULL, nomVU VARCHAR(255) DEFAULT NULL, numElement INT DEFAULT NULL, codeSubstance VARCHAR(9) DEFAULT NULL, numComposant INT DEFAULT NULL, codeUniteDosage INT DEFAULT NULL, codeNature INT DEFAULT NULL, dosageLibraTypo VARCHAR(255) DEFAULT NULL, dosageLibra VARCHAR(100) DEFAULT NULL, libCourt VARCHAR(80) DEFAULT NULL, nomSubstance VARCHAR(255) DEFAULT NULL, codeProduit VARCHAR(9) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SAVUUTIL (id INT AUTO_INCREMENT NOT NULL, nomVU VARCHAR(255) DEFAULT NULL, dbo_Autorisation_libAbr VARCHAR(9) DEFAULT NULL, dbo_ClasseATC_libAbr VARCHAR(9) DEFAULT NULL, dbo_ClasseATC_libCourt VARCHAR(80) DEFAULT NULL, dbo_StatutSpeci_libAbr VARCHAR(9) DEFAULT NULL, nomSubstance VARCHAR(255) DEFAULT NULL, DP VARCHAR(10) DEFAULT NULL, codeVU VARCHAR(8) DEFAULT NULL, codeCIS VARCHAR(8) DEFAULT NULL, codeDossier VARCHAR(12) DEFAULT NULL, nomContactLibra VARCHAR(255) DEFAULT NULL, adresseContact VARCHAR(200) DEFAULT NULL, adresseCompl VARCHAR(200) DEFAULT NULL, codePost VARCHAR(20) DEFAULT NULL, nomVille VARCHAR(100) DEFAULT NULL, telContact VARCHAR(50) DEFAULT NULL, faxContact VARCHAR(50) DEFAULT NULL, nomActeurLong VARCHAR(255) DEFAULT NULL, adresse VARCHAR(200) DEFAULT NULL, adresseComplExpl VARCHAR(200) DEFAULT NULL, codePostExpl VARCHAR(20) DEFAULT NULL, nomVilleExpl VARCHAR(100) DEFAULT NULL, tel VARCHAR(50) DEFAULT NULL, fax VARCHAR(50) DEFAULT NULL, codeContact VARCHAR(9) DEFAULT NULL, codeActeur INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE SAVU');
        $this->addSql('DROP TABLE SAVUUTIL');
    }
}
