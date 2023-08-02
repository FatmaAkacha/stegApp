<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230801013019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, id_categorie_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, quantite INT NOT NULL, INDEX IDX_23A0E669F34925F (id_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_intervention (id INT AUTO_INCREMENT NOT NULL, article_etat_id INT DEFAULT NULL, date DATETIME NOT NULL, solde_comptable INT NOT NULL, solde_physique INT NOT NULL, difference NUMERIC(10, 0) NOT NULL, justification LONGTEXT DEFAULT NULL, INDEX IDX_C9C22774E08CC248 (article_etat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_exploitation (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, date DATE NOT NULL, fact_bt_ord_debut VARCHAR(255) NOT NULL, fact_bt_ord_fin VARCHAR(255) NOT NULL, fact_bt_ord_machine VARCHAR(255) NOT NULL, fact_bt_simp_debut VARCHAR(255) NOT NULL, fact_bt_simp_fin VARCHAR(255) NOT NULL, fact_bt_simp_machine VARCHAR(255) NOT NULL, fact_bt_simp_tu_debut VARCHAR(255) NOT NULL, fact_bt_simp_tu_fin VARCHAR(255) NOT NULL, fact_bt_simp_tu_machine VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_intervention_tech (id INT AUTO_INCREMENT NOT NULL, code_erreur INT NOT NULL, module VARCHAR(255) NOT NULL, description_anomalie VARCHAR(255) NOT NULL, etat_intervention VARCHAR(255) NOT NULL, agent_technique VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_stock (id INT AUTO_INCREMENT NOT NULL, article_stock_id INT DEFAULT NULL, date DATE NOT NULL, quantite_entree INT NOT NULL, num_bon_entree INT NOT NULL, quantite_sortie INT NOT NULL, machine_sortie VARCHAR(255) NOT NULL, solde NUMERIC(10, 0) NOT NULL, INDEX IDX_31B6BC5F5825957B (article_stock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E669F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE etat_intervention ADD CONSTRAINT FK_C9C22774E08CC248 FOREIGN KEY (article_etat_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE fiche_stock ADD CONSTRAINT FK_31B6BC5F5825957B FOREIGN KEY (article_stock_id) REFERENCES article (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E669F34925F');
        $this->addSql('ALTER TABLE etat_intervention DROP FOREIGN KEY FK_C9C22774E08CC248');
        $this->addSql('ALTER TABLE fiche_stock DROP FOREIGN KEY FK_31B6BC5F5825957B');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE etat_intervention');
        $this->addSql('DROP TABLE fiche_exploitation');
        $this->addSql('DROP TABLE fiche_intervention_tech');
        $this->addSql('DROP TABLE fiche_stock');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
