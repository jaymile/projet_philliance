<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021140911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD article_id_id INT DEFAULT NULL, ADD bon_plan_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC8F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC70C61801 FOREIGN KEY (bon_plan_id_id) REFERENCES bon_plan (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC8F3EC46 ON commentaire (article_id_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC70C61801 ON commentaire (bon_plan_id_id)');
        $this->addSql('ALTER TABLE instrument_jouer ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE instrument_jouer ADD CONSTRAINT FK_5A84EE84A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5A84EE84A76ED395 ON instrument_jouer (user_id)');
        $this->addSql('ALTER TABLE jam_concert ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jam_concert ADD CONSTRAINT FK_8EE34A2BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8EE34A2BA76ED395 ON jam_concert (user_id)');
        $this->addSql('ALTER TABLE user DROP instrument_jouer_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC8F3EC46');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC70C61801');
        $this->addSql('DROP INDEX IDX_67F068BC8F3EC46 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC70C61801 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP article_id_id, DROP bon_plan_id_id');
        $this->addSql('ALTER TABLE instrument_jouer DROP FOREIGN KEY FK_5A84EE84A76ED395');
        $this->addSql('DROP INDEX IDX_5A84EE84A76ED395 ON instrument_jouer');
        $this->addSql('ALTER TABLE instrument_jouer DROP user_id');
        $this->addSql('ALTER TABLE jam_concert DROP FOREIGN KEY FK_8EE34A2BA76ED395');
        $this->addSql('DROP INDEX IDX_8EE34A2BA76ED395 ON jam_concert');
        $this->addSql('ALTER TABLE jam_concert DROP user_id');
        $this->addSql('ALTER TABLE user ADD instrument_jouer_id INT DEFAULT NULL');
    }
}
