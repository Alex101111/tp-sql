
CREATE DATABASE `tp_sql`;
USE `tp_sql` ;

-- creating memebres table 
CREATE TABLE `membre` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `date_inscription` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `email` VARCHAR(255) NULL,
  `mdp` VARCHAR(255) NULL,
  `nom` VARCHAR(255) NULL,
  `pseudo` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- creating recette table 

CREATE TABLE `recette` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `auteur` VARCHAR(255) NULL,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `description` VARCHAR(255) NULL,
  `photo` VARCHAR(255) NULL,
  `titre` VARCHAR(255) NULL,
  `membre_id` BIGINT(20) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_recette_membre1`
    FOREIGN KEY (`membre_id`)
    REFERENCES `membre` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB;

-- creating commentaire table
CREATE TABLE `commentaire` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `auteur` VARCHAR(255) NULL,
  `contenu` VARCHAR(255) NULL,
  `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `note` INT(11) NULL,
  `recette_id` BIGINT(20) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_commentaire_recette`
    FOREIGN KEY (`recette_id`)
    REFERENCES `recette` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB;

-- creating ingredient table 
CREATE TABLE `ingredient` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NULL,
  `quantitie` INT(11) NULL,
  `unit` VARCHAR(255) NULL,
  `recette_id` BIGINT(20) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_ingredient_recette1`
    FOREIGN KEY (`recette_id`)
    REFERENCES `recette` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB;

-- creating categorie table 
CREATE TABLE `categorie` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- creating intermidiate table between categorie and recette tables 
CREATE TABLE `categorie_recette` (
  `categorie_id` BIGINT(20) NOT NULL,
  `recette_id` BIGINT NOT NULL,
  PRIMARY KEY (`categorie_id`, `recette_id`),
  CONSTRAINT `fk_categorie_has_recette_categorie1`
    FOREIGN KEY (`categorie_id`)
    REFERENCES `categorie` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_categorie_has_recette_recette1`
    FOREIGN KEY (`recette_id`)
    REFERENCES `recette` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB;


