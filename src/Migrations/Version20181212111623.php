<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181212111623 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE game_plattform (game_id INT NOT NULL, plattform_id INT NOT NULL, INDEX IDX_81A4CF57E48FD905 (game_id), INDEX IDX_81A4CF577CBB659A (plattform_id), PRIMARY KEY(game_id, plattform_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_entwickler (game_id INT NOT NULL, entwickler_id INT NOT NULL, INDEX IDX_55EED5EDE48FD905 (game_id), INDEX IDX_55EED5EDD662E4D8 (entwickler_id), PRIMARY KEY(game_id, entwickler_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game_plattform ADD CONSTRAINT FK_81A4CF57E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_plattform ADD CONSTRAINT FK_81A4CF577CBB659A FOREIGN KEY (plattform_id) REFERENCES plattform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_entwickler ADD CONSTRAINT FK_55EED5EDE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_entwickler ADD CONSTRAINT FK_55EED5EDD662E4D8 FOREIGN KEY (entwickler_id) REFERENCES entwickler (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game ADD many_to_many VARCHAR(255) NOT NULL, ADD publisher VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE game_plattform');
        $this->addSql('DROP TABLE game_entwickler');
        $this->addSql('ALTER TABLE game DROP many_to_many, DROP publisher');
    }
}
