<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106162758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE appointment_id_appointment_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE appointment (id_appointment INT NOT NULL, id_coach INT DEFAULT NULL, id_patient INT DEFAULT NULL, id_schedule INT DEFAULT NULL, PRIMARY KEY(id_appointment))');
        $this->addSql('CREATE INDEX IDX_FE38F844D1DC2CFC ON appointment (id_coach)');
        $this->addSql('CREATE INDEX IDX_FE38F844C4477E9B ON appointment (id_patient)');
        $this->addSql('CREATE INDEX IDX_FE38F844AE3FD6E ON appointment (id_schedule)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844D1DC2CFC FOREIGN KEY (id_coach) REFERENCES coach (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844C4477E9B FOREIGN KEY (id_patient) REFERENCES patient (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844AE3FD6E FOREIGN KEY (id_schedule) REFERENCES schedule (id_schedule) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE assign ADD PRIMARY KEY (id_user, id_course)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE appointment_id_appointment_seq CASCADE');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F844D1DC2CFC');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F844C4477E9B');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F844AE3FD6E');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('ALTER TABLE assign DROP CONSTRAINT assign_pkey');
    }
}
