<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241007123654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timeslot_team DROP FOREIGN KEY FK_908C0A24296CD8AE');
        $this->addSql('ALTER TABLE timeslot_team DROP FOREIGN KEY FK_908C0A24F920B9E9');
        $this->addSql('DROP TABLE timeslot_team');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE timeslot_team (timeslot_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_908C0A24296CD8AE (team_id), INDEX IDX_908C0A24F920B9E9 (timeslot_id), PRIMARY KEY(timeslot_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE timeslot_team ADD CONSTRAINT FK_908C0A24296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE timeslot_team ADD CONSTRAINT FK_908C0A24F920B9E9 FOREIGN KEY (timeslot_id) REFERENCES timeslot (id) ON DELETE CASCADE');
    }
}
