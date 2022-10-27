DROP DATABASE IF EXISTS `QCMFAC`;
CREATE DATABASE IF NOT EXISTS `QCMFAC`;
USE `QCMFAC`;

CREATE TABLE IF NOT EXISTS `administration`(
    `id_admin`          INT(2) NOT NULL AUTO_INCREMENT,
    `login_admin`       VARCHAR(50) NOT NULL,
    `psw_admin`         VARCHAR(60) NOT NULL,
    PRIMARY KEY(`id_admin`)
)ENGINE = InnoDb;

INSERT INTO `administration` (`login_admin`,`psw_admin`)
VALUES ('admin','admin');

CREATE TABLE IF NOT EXISTS `group_user`(
    `id_group`          INT(3) NOT NULL AUTO_INCREMENT,
    `lib_group`         VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id_group`)
)ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `user`(
    `id_user`           INT(4) NOT NULL AUTO_INCREMENT,
    `last_name`         VARCHAR(50) NOT NULL,
    `first_name`        VARCHAR(50) NOT NULL,
    `mail_user`         VARCHAR(100) NOT NULL,
    `psw_user`          VARCHAR(60) NOT NULL,
    `id_group`          INT(3) DEFAULT NULL,
    PRIMARY KEY(`id_user`),
    CONSTRAINT `fk_group` FOREIGN KEY(`id_group`) REFERENCES `group_user` (`id_group`)
        ON DELETE restrict ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `supercat`(
    `id_supercat`       INT(3) NOT NULL AUTO_INCREMENT,
    `lib_supercat`      VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id_supercat`)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `categorie`(
    `id_cat`            INT(3) NOT NULL AUTO_INCREMENT,
    `lib_cat`           VARCHAR(50) NOT NULL,
    `id_supercat`       INT(3) NOT NULL,
    PRIMARY KEY(`id_cat`),
    CONSTRAINT `fk_supercat` FOREIGN KEY(`id_supercat`) REFERENCES `supercat` (`id_supercat`)
        ON DELETE restrict ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `question`(
    `id_question`       INT(4) NOT NULL AUTO_INCREMENT,
    `statements`        VARCHAR(255) NOT NULL,
    `statements_bis`    VARCHAR(255) DEFAULT NULL,
    `difficult`         INT(1) DEFAULT NULL,
    `lesson_ref`        VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY(`id_question`)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `answer`(
    `id_answer`         INT(5) NOT NULL AUTO_INCREMENT,
    `answer_text`       VARCHAR(255) NOT NULL,
    `true_answer`       TINYINT(1) NOT NULL,
    `id_question`       INT(4) NOT NULL,
    PRIMARY KEY(`id_answer`),
    CONSTRAINT `fk_question` FOREIGN KEY(`id_question`) REFERENCES `question` (`id_question`)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cat_question`(
    `id_question`       INT(4) NOT NULL,
    `id_cat`            INT(3) NOT NULL,
    PRIMARY KEY(`id_question`,`id_cat`),
    FOREIGN KEY(`id_question`) REFERENCES `question` (`id_question`),
    FOREIGN KEY(`id_cat`) REFERENCES `categorie` (`id_cat`)
)ENGINE = InnoDB;