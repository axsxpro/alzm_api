<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231103231343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE advantage_id_advantage_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE app_user_id_user_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE availability_id_availability_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE course_id_course_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE files_id_files_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE plan_id_plan_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE planning_rules_id_planning_rules_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE resources_id_resources_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE schedule_id_schedule_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE text_id_text_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transaction_id_transaction_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE admin (id_user INT NOT NULL, PRIMARY KEY(id_user))');
        $this->addSql('CREATE TABLE advantage (id_advantage INT NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id_advantage))');
        $this->addSql('CREATE TABLE app_user (id_user INT NOT NULL, lastname VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, datebirth DATE NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(1000) DEFAULT NULL, access_token VARCHAR(1000) DEFAULT NULL, date_registration DATE DEFAULT NULL, roles JSON DEFAULT NULL, PRIMARY KEY(id_user))');
        $this->addSql('CREATE TABLE appointment (id_coach INT NOT NULL, id_patient INT NOT NULL, id_schedule INT NOT NULL, PRIMARY KEY(id_coach, id_patient, id_schedule))');
        $this->addSql('CREATE INDEX IDX_FE38F844D1DC2CFC ON appointment (id_coach)');
        $this->addSql('CREATE INDEX IDX_FE38F844C4477E9B ON appointment (id_patient)');
        $this->addSql('CREATE INDEX IDX_FE38F844AE3FD6E ON appointment (id_schedule)');
        $this->addSql('CREATE TABLE availability (id_availability INT NOT NULL, id_user INT DEFAULT NULL, date_availability DATE NOT NULL, hour_start_slot TIME(0) WITHOUT TIME ZONE DEFAULT NULL, hour_end_slot TIME(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id_availability))');
        $this->addSql('CREATE INDEX IDX_3FB7A2BF6B3CA4B ON availability (id_user)');
        $this->addSql('CREATE TABLE coach (id_user INT NOT NULL, isconfirmed BOOLEAN DEFAULT NULL, hourly_rate NUMERIC(8, 2) DEFAULT NULL, PRIMARY KEY(id_user))');
        $this->addSql('CREATE TABLE assign (id_user INT NOT NULL, id_course INT NOT NULL, PRIMARY KEY(id_user, id_course))');
        $this->addSql('CREATE INDEX IDX_7222A9A16B3CA4B ON assign (id_user)');
        $this->addSql('CREATE INDEX IDX_7222A9A130A9DA54 ON assign (id_course)');
        $this->addSql('CREATE TABLE course (id_course INT NOT NULL, name VARCHAR(50) DEFAULT NULL, description VARCHAR(50) DEFAULT NULL, duration INT DEFAULT NULL, cost NUMERIC(15, 2) DEFAULT NULL, PRIMARY KEY(id_course))');
        $this->addSql('CREATE TABLE files (id_files INT NOT NULL, link VARCHAR(50) NOT NULL, type VARCHAR(3) DEFAULT NULL, PRIMARY KEY(id_files))');
        $this->addSql('CREATE TABLE patient (id_user INT NOT NULL, sold NUMERIC(15, 2) DEFAULT NULL, PRIMARY KEY(id_user))');
        $this->addSql('CREATE TABLE subscribe (id_user INT NOT NULL, id_plan INT NOT NULL, PRIMARY KEY(id_user, id_plan))');
        $this->addSql('CREATE INDEX IDX_68B95F3E6B3CA4B ON subscribe (id_user)');
        $this->addSql('CREATE INDEX IDX_68B95F3E567A477F ON subscribe (id_plan)');
        $this->addSql('CREATE TABLE plan (id_plan INT NOT NULL, name VARCHAR(50) DEFAULT NULL, description TEXT DEFAULT NULL, cost NUMERIC(15, 2) DEFAULT NULL, PRIMARY KEY(id_plan))');
        $this->addSql('CREATE TABLE plan_describe (id_plan INT NOT NULL, id_advantage INT NOT NULL, PRIMARY KEY(id_plan, id_advantage))');
        $this->addSql('CREATE INDEX IDX_596F53A8567A477F ON plan_describe (id_plan)');
        $this->addSql('CREATE INDEX IDX_596F53A8A9BB9D86 ON plan_describe (id_advantage)');
        $this->addSql('CREATE TABLE allocated (id_plan INT NOT NULL, id_resources INT NOT NULL, PRIMARY KEY(id_plan, id_resources))');
        $this->addSql('CREATE INDEX IDX_C344C877567A477F ON allocated (id_plan)');
        $this->addSql('CREATE INDEX IDX_C344C8776F535789 ON allocated (id_resources)');
        $this->addSql('CREATE TABLE planning_rules (id_planning_rules INT NOT NULL, id_user INT DEFAULT NULL, minimal_time_slot TIME(0) WITHOUT TIME ZONE DEFAULT NULL, maximal_time_slot TIME(0) WITHOUT TIME ZONE DEFAULT NULL, work_days VARCHAR(7) DEFAULT NULL, work_hours_start TIME(0) WITHOUT TIME ZONE DEFAULT NULL, work_hours_end TIME(0) WITHOUT TIME ZONE DEFAULT NULL, time_between_appointments VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id_planning_rules))');
        $this->addSql('CREATE INDEX IDX_183623A36B3CA4B ON planning_rules (id_user)');
        $this->addSql('CREATE TABLE resources (id_resources INT NOT NULL, PRIMARY KEY(id_resources))');
        $this->addSql('CREATE TABLE compose (id_resources INT NOT NULL, id_text INT NOT NULL, PRIMARY KEY(id_resources, id_text))');
        $this->addSql('CREATE INDEX IDX_AE4C14166F535789 ON compose (id_resources)');
        $this->addSql('CREATE INDEX IDX_AE4C1416B0ABBBC5 ON compose (id_text)');
        $this->addSql('CREATE TABLE content (id_resources INT NOT NULL, id_files INT NOT NULL, PRIMARY KEY(id_resources, id_files))');
        $this->addSql('CREATE INDEX IDX_FEC530A96F535789 ON content (id_resources)');
        $this->addSql('CREATE INDEX IDX_FEC530A9E8B00169 ON content (id_files)');
        $this->addSql('CREATE TABLE schedule (id_schedule INT NOT NULL, week_number DATE NOT NULL, year_date INT NOT NULL, hour_start_date TIME(0) WITHOUT TIME ZONE NOT NULL, hour_end_date TIME(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id_schedule))');
        $this->addSql('CREATE TABLE text (id_text INT NOT NULL, text TEXT DEFAULT NULL, PRIMARY KEY(id_text))');
        $this->addSql('CREATE TABLE transaction (id_transaction INT NOT NULL, id_user INT DEFAULT NULL, date_transaction TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, amount NUMERIC(15, 2) DEFAULT NULL, payment_method VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id_transaction))');
        $this->addSql('CREATE INDEX IDX_723705D16B3CA4B ON transaction (id_user)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D766B3CA4B FOREIGN KEY (id_user) REFERENCES app_user (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844D1DC2CFC FOREIGN KEY (id_coach) REFERENCES coach (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844C4477E9B FOREIGN KEY (id_patient) REFERENCES patient (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844AE3FD6E FOREIGN KEY (id_schedule) REFERENCES schedule (id_schedule) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BF6B3CA4B FOREIGN KEY (id_user) REFERENCES coach (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE coach ADD CONSTRAINT FK_3F596DCC6B3CA4B FOREIGN KEY (id_user) REFERENCES app_user (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE assign ADD CONSTRAINT FK_7222A9A16B3CA4B FOREIGN KEY (id_user) REFERENCES coach (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE assign ADD CONSTRAINT FK_7222A9A130A9DA54 FOREIGN KEY (id_course) REFERENCES course (id_course) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB6B3CA4B FOREIGN KEY (id_user) REFERENCES app_user (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subscribe ADD CONSTRAINT FK_68B95F3E6B3CA4B FOREIGN KEY (id_user) REFERENCES patient (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subscribe ADD CONSTRAINT FK_68B95F3E567A477F FOREIGN KEY (id_plan) REFERENCES plan (id_plan) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plan_describe ADD CONSTRAINT FK_596F53A8567A477F FOREIGN KEY (id_plan) REFERENCES plan (id_plan) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plan_describe ADD CONSTRAINT FK_596F53A8A9BB9D86 FOREIGN KEY (id_advantage) REFERENCES advantage (id_advantage) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE allocated ADD CONSTRAINT FK_C344C877567A477F FOREIGN KEY (id_plan) REFERENCES plan (id_plan) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE allocated ADD CONSTRAINT FK_C344C8776F535789 FOREIGN KEY (id_resources) REFERENCES resources (id_resources) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE planning_rules ADD CONSTRAINT FK_183623A36B3CA4B FOREIGN KEY (id_user) REFERENCES coach (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE compose ADD CONSTRAINT FK_AE4C14166F535789 FOREIGN KEY (id_resources) REFERENCES resources (id_resources) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE compose ADD CONSTRAINT FK_AE4C1416B0ABBBC5 FOREIGN KEY (id_text) REFERENCES text (id_text) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A96F535789 FOREIGN KEY (id_resources) REFERENCES resources (id_resources) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9E8B00169 FOREIGN KEY (id_files) REFERENCES files (id_files) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D16B3CA4B FOREIGN KEY (id_user) REFERENCES patient (id_user) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE advantage_id_advantage_seq CASCADE');
        $this->addSql('DROP SEQUENCE app_user_id_user_seq CASCADE');
        $this->addSql('DROP SEQUENCE availability_id_availability_seq CASCADE');
        $this->addSql('DROP SEQUENCE course_id_course_seq CASCADE');
        $this->addSql('DROP SEQUENCE files_id_files_seq CASCADE');
        $this->addSql('DROP SEQUENCE plan_id_plan_seq CASCADE');
        $this->addSql('DROP SEQUENCE planning_rules_id_planning_rules_seq CASCADE');
        $this->addSql('DROP SEQUENCE resources_id_resources_seq CASCADE');
        $this->addSql('DROP SEQUENCE schedule_id_schedule_seq CASCADE');
        $this->addSql('DROP SEQUENCE text_id_text_seq CASCADE');
        $this->addSql('DROP SEQUENCE transaction_id_transaction_seq CASCADE');
        $this->addSql('ALTER TABLE admin DROP CONSTRAINT FK_880E0D766B3CA4B');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F844D1DC2CFC');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F844C4477E9B');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F844AE3FD6E');
        $this->addSql('ALTER TABLE availability DROP CONSTRAINT FK_3FB7A2BF6B3CA4B');
        $this->addSql('ALTER TABLE coach DROP CONSTRAINT FK_3F596DCC6B3CA4B');
        $this->addSql('ALTER TABLE assign DROP CONSTRAINT FK_7222A9A16B3CA4B');
        $this->addSql('ALTER TABLE assign DROP CONSTRAINT FK_7222A9A130A9DA54');
        $this->addSql('ALTER TABLE patient DROP CONSTRAINT FK_1ADAD7EB6B3CA4B');
        $this->addSql('ALTER TABLE subscribe DROP CONSTRAINT FK_68B95F3E6B3CA4B');
        $this->addSql('ALTER TABLE subscribe DROP CONSTRAINT FK_68B95F3E567A477F');
        $this->addSql('ALTER TABLE plan_describe DROP CONSTRAINT FK_596F53A8567A477F');
        $this->addSql('ALTER TABLE plan_describe DROP CONSTRAINT FK_596F53A8A9BB9D86');
        $this->addSql('ALTER TABLE allocated DROP CONSTRAINT FK_C344C877567A477F');
        $this->addSql('ALTER TABLE allocated DROP CONSTRAINT FK_C344C8776F535789');
        $this->addSql('ALTER TABLE planning_rules DROP CONSTRAINT FK_183623A36B3CA4B');
        $this->addSql('ALTER TABLE compose DROP CONSTRAINT FK_AE4C14166F535789');
        $this->addSql('ALTER TABLE compose DROP CONSTRAINT FK_AE4C1416B0ABBBC5');
        $this->addSql('ALTER TABLE content DROP CONSTRAINT FK_FEC530A96F535789');
        $this->addSql('ALTER TABLE content DROP CONSTRAINT FK_FEC530A9E8B00169');
        $this->addSql('ALTER TABLE transaction DROP CONSTRAINT FK_723705D16B3CA4B');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE advantage');
        $this->addSql('DROP TABLE app_user');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE availability');
        $this->addSql('DROP TABLE coach');
        $this->addSql('DROP TABLE assign');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE files');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE subscribe');
        $this->addSql('DROP TABLE plan');
        $this->addSql('DROP TABLE plan_describe');
        $this->addSql('DROP TABLE allocated');
        $this->addSql('DROP TABLE planning_rules');
        $this->addSql('DROP TABLE resources');
        $this->addSql('DROP TABLE compose');
        $this->addSql('DROP TABLE content');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('DROP TABLE text');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
