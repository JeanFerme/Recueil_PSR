<?php

declare(strict_types=1);

namespace default;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220704140232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE DMMRef (id INT AUTO_INCREMENT NOT NULL, pole VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE MesImpact (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE OrigineRef (id INT AUTO_INCREMENT NOT NULL, origine VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PropOutSurvRef (id INT AUTO_INCREMENT NOT NULL, proposition VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE RecPSRTable (id INT AUTO_INCREMENT NOT NULL, origine_id INT NOT NULL, dmm_id INT NOT NULL, substance VARCHAR(400) NOT NULL, produit VARCHAR(300) NOT NULL, code_atc VARCHAR(10) NOT NULL, niveau_risque INT DEFAULT NULL, problematique VARCHAR(1024) DEFAULT NULL, mesure_impact TINYINT(1) NOT NULL, resultat_surv VARCHAR(1024) DEFAULT NULL, priorisation INT DEFAULT NULL, mesMaitRisk VARCHAR(1024) DEFAULT NULL, mesImpactComment VARCHAR(1024) DEFAULT NULL, commentaire VARCHAR(2048) DEFAULT NULL, listSurv VARCHAR(50) DEFAULT NULL, visible TINYINT(1) NOT NULL, mesImpact_id INT NOT NULL, INDEX IDX_EEE2591387998E (origine_id), INDEX IDX_EEE2591313496CEF (dmm_id), INDEX IDX_EEE25913440585FE (mesImpact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recpsrtable_propoutsurvref (recpsrtable_id INT NOT NULL, propoutsurvref_id INT NOT NULL, INDEX IDX_B09C44F9227EA994 (recpsrtable_id), INDEX IDX_B09C44F984276F86 (propoutsurvref_id), PRIMARY KEY(recpsrtable_id, propoutsurvref_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE RecPSRTable ADD CONSTRAINT FK_EEE2591387998E FOREIGN KEY (origine_id) REFERENCES OrigineRef (id)');
        $this->addSql('ALTER TABLE RecPSRTable ADD CONSTRAINT FK_EEE2591313496CEF FOREIGN KEY (dmm_id) REFERENCES DMMRef (id)');
        $this->addSql('ALTER TABLE RecPSRTable ADD CONSTRAINT FK_EEE25913440585FE FOREIGN KEY (mesImpact_id) REFERENCES MesImpact (id)');
        $this->addSql('ALTER TABLE recpsrtable_propoutsurvref ADD CONSTRAINT FK_B09C44F9227EA994 FOREIGN KEY (recpsrtable_id) REFERENCES RecPSRTable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recpsrtable_propoutsurvref ADD CONSTRAINT FK_B09C44F984276F86 FOREIGN KEY (propoutsurvref_id) REFERENCES PropOutSurvRef (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE mainentity');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE RecPSRTable DROP FOREIGN KEY FK_EEE2591313496CEF');
        $this->addSql('ALTER TABLE RecPSRTable DROP FOREIGN KEY FK_EEE25913440585FE');
        $this->addSql('ALTER TABLE RecPSRTable DROP FOREIGN KEY FK_EEE2591387998E');
        $this->addSql('ALTER TABLE recpsrtable_propoutsurvref DROP FOREIGN KEY FK_B09C44F984276F86');
        $this->addSql('ALTER TABLE recpsrtable_propoutsurvref DROP FOREIGN KEY FK_B09C44F9227EA994');
        $this->addSql('CREATE TABLE mainentity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, champ1 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE DMMRef');
        $this->addSql('DROP TABLE MesImpact');
        $this->addSql('DROP TABLE OrigineRef');
        $this->addSql('DROP TABLE PropOutSurvRef');
        $this->addSql('DROP TABLE RecPSRTable');
        $this->addSql('DROP TABLE recpsrtable_propoutsurvref');
    }
}
