<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261018102718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('update monster m1 left join monster m2 on m1.dex_number = m2.dex_number set m1.type = JSON_ARRAY(m2.type1, m2.type2);');
    }

    public function down(Schema $schema): void
    {

    }
}
