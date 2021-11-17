<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607083724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE questionnaires (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, questionnaire_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8ADC54D5CE07E8FF (questionnaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponses (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, choix TINYINT(1) NOT NULL, INDEX IDX_1E512EC61E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5CE07E8FF FOREIGN KEY (questionnaire_id) REFERENCES questionnaires (id)');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC61E27F6BF FOREIGN KEY (question_id) REFERENCES questions (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D5CE07E8FF');
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC61E27F6BF');
        $this->addSql('DROP TABLE questionnaires');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE reponses');
    }
}
