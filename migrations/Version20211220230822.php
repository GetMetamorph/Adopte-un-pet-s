<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211220230822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, usr_id_id INT NOT NULL, UNIQUE INDEX UNIQ_BA388B741AB162D (usr_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart_items (id INT AUTO_INCREMENT NOT NULL, crt_id_id INT NOT NULL, INDEX IDX_BEF48445310B1872 (crt_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, cart_items_id INT DEFAULT NULL, order_items_id INT DEFAULT NULL, item_category_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, price DOUBLE PRECISION NOT NULL, image VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_1F1B251EF52FE1EF (cart_items_id), INDEX IDX_1F1B251E8A484C35 (order_items_id), INDEX IDX_1F1B251EF22EC5D4 (item_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_category (id INT AUTO_INCREMENT NOT NULL, cat_id_id INT NOT NULL, INDEX IDX_6A41D10AC33F2EBA (cat_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, pet_id_id INT NOT NULL, usr_id_id INT NOT NULL, status VARCHAR(50) NOT NULL, document_path VARCHAR(100) NOT NULL, date DATE NOT NULL, INDEX IDX_29D6873ED2385EF4 (pet_id_id), INDEX IDX_29D6873E41AB162D (usr_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, order_items_id INT DEFAULT NULL, status INT NOT NULL, date DATE NOT NULL, INDEX IDX_F52993988A484C35 (order_items_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_items (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, species VARCHAR(50) NOT NULL, joined_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(30) NOT NULL, firstname VARCHAR(30) NOT NULL, mail VARCHAR(50) NOT NULL, phone VARCHAR(30) NOT NULL, password VARCHAR(50) NOT NULL, privilege TINYINT(1) NOT NULL, adress VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B741AB162D FOREIGN KEY (usr_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE cart_items ADD CONSTRAINT FK_BEF48445310B1872 FOREIGN KEY (crt_id_id) REFERENCES cart (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EF52FE1EF FOREIGN KEY (cart_items_id) REFERENCES cart_items (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E8A484C35 FOREIGN KEY (order_items_id) REFERENCES order_items (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EF22EC5D4 FOREIGN KEY (item_category_id) REFERENCES item_category (id)');
        $this->addSql('ALTER TABLE item_category ADD CONSTRAINT FK_6A41D10AC33F2EBA FOREIGN KEY (cat_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873ED2385EF4 FOREIGN KEY (pet_id_id) REFERENCES pet (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E41AB162D FOREIGN KEY (usr_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993988A484C35 FOREIGN KEY (order_items_id) REFERENCES order_items (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_items DROP FOREIGN KEY FK_BEF48445310B1872');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EF52FE1EF');
        $this->addSql('ALTER TABLE item_category DROP FOREIGN KEY FK_6A41D10AC33F2EBA');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EF22EC5D4');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E8A484C35');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993988A484C35');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873ED2385EF4');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B741AB162D');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E41AB162D');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE cart_items');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_category');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_items');
        $this->addSql('DROP TABLE pet');
        $this->addSql('DROP TABLE `user`');
    }
}
