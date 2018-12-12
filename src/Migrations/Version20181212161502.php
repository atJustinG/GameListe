<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181212161502 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entwickler_game (entwickler_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_A4C0980ED662E4D8 (entwickler_id), INDEX IDX_A4C0980EE48FD905 (game_id), PRIMARY KEY(entwickler_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entwickler_game ADD CONSTRAINT FK_A4C0980ED662E4D8 FOREIGN KEY (entwickler_id) REFERENCES entwickler (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entwickler_game ADD CONSTRAINT FK_A4C0980EE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE game_entwickler');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE game_entwickler (game_id INT NOT NULL, entwickler_id INT NOT NULL, INDEX IDX_55EED5EDD662E4D8 (entwickler_id), INDEX IDX_55EED5EDE48FD905 (game_id), PRIMARY KEY(game_id, entwickler_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE game_entwickler ADD CONSTRAINT FK_55EED5EDD662E4D8 FOREIGN KEY (entwickler_id) REFERENCES entwickler (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_entwickler ADD CONSTRAINT FK_55EED5EDE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE entwickler_game');
    }
}
