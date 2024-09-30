<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240916140450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE team_user (team_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_5C722232296CD8AE (team_id), INDEX IDX_5C722232A76ED395 (user_id), PRIMARY KEY(team_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE timeslot_team (timeslot_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_908C0A24F920B9E9 (timeslot_id), INDEX IDX_908C0A24296CD8AE (team_id), PRIMARY KEY(timeslot_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_user ADD CONSTRAINT FK_5C722232296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_user ADD CONSTRAINT FK_5C722232A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE timeslot_team ADD CONSTRAINT FK_908C0A24F920B9E9 FOREIGN KEY (timeslot_id) REFERENCES timeslot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE timeslot_team ADD CONSTRAINT FK_908C0A24296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE forum ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE forum ADD CONSTRAINT FK_852BBECDA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_852BBECDA76ED395 ON forum (user_id)');
        $this->addSql('ALTER TABLE stand ADD forum_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stand ADD CONSTRAINT FK_64B918B629CCBAD0 FOREIGN KEY (forum_id) REFERENCES forum (id)');
        $this->addSql('CREATE INDEX IDX_64B918B629CCBAD0 ON stand (forum_id)');
        $this->addSql('ALTER TABLE timeslot ADD stand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE timeslot ADD CONSTRAINT FK_3BE452F79734D487 FOREIGN KEY (stand_id) REFERENCES stand (id)');
        $this->addSql('CREATE INDEX IDX_3BE452F79734D487 ON timeslot (stand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team_user DROP FOREIGN KEY FK_5C722232296CD8AE');
        $this->addSql('ALTER TABLE team_user DROP FOREIGN KEY FK_5C722232A76ED395');
        $this->addSql('ALTER TABLE timeslot_team DROP FOREIGN KEY FK_908C0A24F920B9E9');
        $this->addSql('ALTER TABLE timeslot_team DROP FOREIGN KEY FK_908C0A24296CD8AE');
        $this->addSql('DROP TABLE team_user');
        $this->addSql('DROP TABLE timeslot_team');
        $this->addSql('ALTER TABLE forum DROP FOREIGN KEY FK_852BBECDA76ED395');
        $this->addSql('DROP INDEX IDX_852BBECDA76ED395 ON forum');
        $this->addSql('ALTER TABLE forum DROP user_id');
        $this->addSql('ALTER TABLE stand DROP FOREIGN KEY FK_64B918B629CCBAD0');
        $this->addSql('DROP INDEX IDX_64B918B629CCBAD0 ON stand');
        $this->addSql('ALTER TABLE stand DROP forum_id');
        $this->addSql('ALTER TABLE timeslot DROP FOREIGN KEY FK_3BE452F79734D487');
        $this->addSql('DROP INDEX IDX_3BE452F79734D487 ON timeslot');
        $this->addSql('ALTER TABLE timeslot DROP stand_id');
    }
}
