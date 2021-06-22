<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210622075831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, INDEX IDX_F65593E5B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce_details (id INT AUTO_INCREMENT NOT NULL, annonce_id INT NOT NULL, category_id INT NOT NULL, job_salary INT DEFAULT NULL, contract_type VARCHAR(255) DEFAULT NULL, type_carburant VARCHAR(255) DEFAULT NULL, auto_price INT DEFAULT NULL, immo_surface INT DEFAULT NULL, immo_price INT DEFAULT NULL, INDEX IDX_884991EA8805AB2F (annonce_id), INDEX IDX_884991EA12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonce_details ADD CONSTRAINT FK_884991EA8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE annonce_details ADD CONSTRAINT FK_884991EA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce_details DROP FOREIGN KEY FK_884991EA8805AB2F');
        $this->addSql('ALTER TABLE annonce_details DROP FOREIGN KEY FK_884991EA12469DE2');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5B03A8386');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE annonce_details');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE user');
    }
}
