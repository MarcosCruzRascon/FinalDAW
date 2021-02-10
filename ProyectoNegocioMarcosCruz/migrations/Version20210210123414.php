<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210123414 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agenda (id INT AUTO_INCREMENT NOT NULL, fecha_hora DATETIME NOT NULL, realizada TINYINT(1) NOT NULL, motivo LONGTEXT NOT NULL, problemasencontrados LONGTEXT DEFAULT NULL, soluciones LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorias (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedidos (id INT AUTO_INCREMENT NOT NULL, tipoenvio_id INT NOT NULL, usuario_id INT NOT NULL, idpedido VARCHAR(255) NOT NULL, anotaciones VARCHAR(255) DEFAULT NULL, INDEX IDX_6716CCAAF20D8644 (tipoenvio_id), INDEX IDX_6716CCAADB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productos (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, cantidadalmacen INT NOT NULL, precio DOUBLE PRECISION NOT NULL, INDEX IDX_767490E63397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productospedidos (id INT AUTO_INCREMENT NOT NULL, idpedido_id INT NOT NULL, idproducto_id INT NOT NULL, cantidad INT NOT NULL, INDEX IDX_5806F08B364FCCCF (idpedido_id), INDEX IDX_5806F08BB0841921 (idproducto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE servicios (id INT AUTO_INCREMENT NOT NULL, idservicio VARCHAR(255) NOT NULL, categoria VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE servicioscontratados (id INT AUTO_INCREMENT NOT NULL, idservicio_id INT NOT NULL, usuario_id INT NOT NULL, INDEX IDX_DC600992B70BD348 (idservicio_id), INDEX IDX_DC600992DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipoenvios (id INT AUTO_INCREMENT NOT NULL, empresa_transportista VARCHAR(255) NOT NULL, precio DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, agenda_id INT NOT NULL, correo VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, imagen LONGBLOB DEFAULT NULL, direcciones LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', telefono VARCHAR(255) NOT NULL, formasdepago LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_EF687F277040BC9 (correo), UNIQUE INDEX UNIQ_EF687F2EA67784A (agenda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAAF20D8644 FOREIGN KEY (tipoenvio_id) REFERENCES tipoenvios (id)');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAADB38439E FOREIGN KEY (usuario_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E63397707A FOREIGN KEY (categoria_id) REFERENCES categorias (id)');
        $this->addSql('ALTER TABLE productospedidos ADD CONSTRAINT FK_5806F08B364FCCCF FOREIGN KEY (idpedido_id) REFERENCES pedidos (id)');
        $this->addSql('ALTER TABLE productospedidos ADD CONSTRAINT FK_5806F08BB0841921 FOREIGN KEY (idproducto_id) REFERENCES productos (id)');
        $this->addSql('ALTER TABLE servicioscontratados ADD CONSTRAINT FK_DC600992B70BD348 FOREIGN KEY (idservicio_id) REFERENCES servicios (id)');
        $this->addSql('ALTER TABLE servicioscontratados ADD CONSTRAINT FK_DC600992DB38439E FOREIGN KEY (usuario_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE usuarios ADD CONSTRAINT FK_EF687F2EA67784A FOREIGN KEY (agenda_id) REFERENCES agenda (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usuarios DROP FOREIGN KEY FK_EF687F2EA67784A');
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E63397707A');
        $this->addSql('ALTER TABLE productospedidos DROP FOREIGN KEY FK_5806F08B364FCCCF');
        $this->addSql('ALTER TABLE productospedidos DROP FOREIGN KEY FK_5806F08BB0841921');
        $this->addSql('ALTER TABLE servicioscontratados DROP FOREIGN KEY FK_DC600992B70BD348');
        $this->addSql('ALTER TABLE pedidos DROP FOREIGN KEY FK_6716CCAAF20D8644');
        $this->addSql('ALTER TABLE pedidos DROP FOREIGN KEY FK_6716CCAADB38439E');
        $this->addSql('ALTER TABLE servicioscontratados DROP FOREIGN KEY FK_DC600992DB38439E');
        $this->addSql('DROP TABLE agenda');
        $this->addSql('DROP TABLE categorias');
        $this->addSql('DROP TABLE pedidos');
        $this->addSql('DROP TABLE productos');
        $this->addSql('DROP TABLE productospedidos');
        $this->addSql('DROP TABLE servicios');
        $this->addSql('DROP TABLE servicioscontratados');
        $this->addSql('DROP TABLE tipoenvios');
        $this->addSql('DROP TABLE usuarios');
    }
}
