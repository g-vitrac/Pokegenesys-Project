<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261016142627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE monster (dex_number SMALLINT UNSIGNED NOT NULL, name VARCHAR(64) NOT NULL, type1 VARCHAR(16) DEFAULT NULL, type2 VARCHAR(16) DEFAULT NULL, wounds SMALLINT NOT NULL, brawn SMALLINT NOT NULL, physical_soak SMALLINT NOT NULL, strain SMALLINT NOT NULL, brain SMALLINT NOT NULL, special_soak SMALLINT NOT NULL, dexterity SMALLINT NOT NULL, defense SMALLINT NOT NULL, catch_rate SMALLINT NOT NULL, egg_group1 VARCHAR(32) DEFAULT NULL, egg_group2 VARCHAR(32) DEFAULT NULL, UNIQUE INDEX uniq_monster_dex_number (dex_number), UNIQUE INDEX uniq_monster_name (name), PRIMARY KEY (dex_number)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE monster_form (id INT UNSIGNED AUTO_INCREMENT NOT NULL, form_name VARCHAR(32) NOT NULL, type1 VARCHAR(16) DEFAULT NULL, type2 VARCHAR(16) DEFAULT NULL, wounds SMALLINT NOT NULL, brawn SMALLINT NOT NULL, physical_soak SMALLINT NOT NULL, strain SMALLINT NOT NULL, brain SMALLINT NOT NULL, special_soak SMALLINT NOT NULL, dexterity SMALLINT NOT NULL, defense SMALLINT NOT NULL, catch_rate SMALLINT NOT NULL, egg_group1 VARCHAR(32) DEFAULT NULL, egg_group2 VARCHAR(32) DEFAULT NULL, monster_id SMALLINT UNSIGNED NOT NULL references monster (dex_number), INDEX idx_monster_form_monster (monster_id), UNIQUE INDEX uniq_monster_form_name (monster_id, form_name), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
//        $this->addSql('ALTER TABLE monster_form ADD CONSTRAINT fk_monster_form_monster FOREIGN KEY (monster_id) REFERENCES monster (dexNumber) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster_form DROP FOREIGN KEY fk_monster_form_monster');
        $this->addSql('DROP TABLE monster');
        $this->addSql('DROP TABLE monster_form');
    }
}
