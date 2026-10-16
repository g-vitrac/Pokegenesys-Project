<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261018102717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE biome (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE biome_monster (monster_id SMALLINT UNSIGNED NOT NULL, biome_id INT NOT NULL, INDEX IDX_10D5AE3BC5FF1223 (monster_id), INDEX IDX_10D5AE3BE43A64F9 (biome_id), PRIMARY KEY (monster_id, biome_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE biome_monster ADD CONSTRAINT FK_10D5AE3BC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (dex_number)');
        $this->addSql('ALTER TABLE biome_monster ADD CONSTRAINT FK_10D5AE3BE43A64F9 FOREIGN KEY (biome_id) REFERENCES biome (id)');
        $this->addSql('ALTER TABLE monster ADD type JSON DEFAULT NULL, CHANGE type1 type1 VARCHAR(50) DEFAULT NULL, CHANGE type2 type2 VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE monster_form DROP FOREIGN KEY `1`');
        $this->addSql('ALTER TABLE monster_form CHANGE type1 type1 VARCHAR(50) DEFAULT NULL, CHANGE type2 type2 VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE monster_form ADD CONSTRAINT fk_monster_form_monster FOREIGN KEY (monster_id) REFERENCES monster (dex_number) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE biome_monster DROP FOREIGN KEY FK_10D5AE3BC5FF1223');
        $this->addSql('ALTER TABLE biome_monster DROP FOREIGN KEY FK_10D5AE3BE43A64F9');
        $this->addSql('DROP TABLE biome');
        $this->addSql('DROP TABLE biome_monster');
        $this->addSql('ALTER TABLE monster DROP type, CHANGE type1 type1 VARCHAR(16) DEFAULT NULL, CHANGE type2 type2 VARCHAR(16) DEFAULT NULL');
        $this->addSql('ALTER TABLE monster_form DROP FOREIGN KEY fk_monster_form_monster');
        $this->addSql('ALTER TABLE monster_form CHANGE type1 type1 VARCHAR(16) DEFAULT NULL, CHANGE type2 type2 VARCHAR(16) DEFAULT NULL');
        $this->addSql('ALTER TABLE monster_form ADD CONSTRAINT `1` FOREIGN KEY (monster_id) REFERENCES monster (dex_number)');
    }
}
