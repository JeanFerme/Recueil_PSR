<?php

declare(strict_types=1);

namespace default;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721150535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ListSurvRef (id INT AUTO_INCREMENT NOT NULL, year INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recpsrtable ADD listSurv_id INT DEFAULT NULL, DROP listSurv');
        $this->addSql('ALTER TABLE recpsrtable ADD CONSTRAINT FK_EEE25913E01BC546 FOREIGN KEY (listSurv_id) REFERENCES ListSurvRef (id)');
        $this->addSql('CREATE INDEX IDX_EEE25913E01BC546 ON recpsrtable (listSurv_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE RecPSRTable DROP FOREIGN KEY FK_EEE25913E01BC546');
        $this->addSql('DROP TABLE ListSurvRef');
        $this->addSql('DROP INDEX IDX_EEE25913E01BC546 ON RecPSRTable');
        $this->addSql('ALTER TABLE RecPSRTable ADD listSurv VARCHAR(50) DEFAULT NULL, DROP listSurv_id');
    }
}
