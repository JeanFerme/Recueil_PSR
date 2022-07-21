<?php

declare(strict_types=1);

namespace default;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721100356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recpsrtable CHANGE substance substance VARCHAR(400) DEFAULT NULL, CHANGE produit produit VARCHAR(300) DEFAULT NULL, CHANGE code_atc code_atc VARCHAR(10) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE RecPSRTable CHANGE substance substance VARCHAR(400) NOT NULL, CHANGE produit produit VARCHAR(300) NOT NULL, CHANGE code_atc code_atc VARCHAR(10) NOT NULL');
    }
}
