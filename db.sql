CREATE DATABASE IF NOT EXISTS lce CHARSET utf8mb4;

USE lce;

CREATE TABLE IF NOT EXISTS category(
category_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
category_name VARCHAR(25) UNIQUE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `member`(
member_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
firstname VARCHAR(50) NOT NULL,
lastname VARCHAR(50) NOT NULL,
`role` VARCHAR(50) NOT NULL,
member_img VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS activity(
activity_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
activity_name VARCHAR(50) NOT NULL,
activity_year VARCHAR(25),
`status` VARCHAR(50),
subtitle VARCHAR(255),
summary TEXT,
`description` TEXT NOT NULL,
credits TEXT,
video_url VARCHAR(500),
activity_img VARCHAR(500) NOT NULL,
id_category INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `date`(
date_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
date_value DATETIME NOT NULL,
place VARCHAR(100) NOT NULL,
id_activity INT NOT NULL
)ENGINE=InnoDB;

ALTER TABLE activity
ADD FOREIGN KEY (id_category) REFERENCES category(category_id)
ON DELETE RESTRICT;

ALTER TABLE `date`
ADD FOREIGN KEY (id_activity) REFERENCES activity(activity_id)
ON DELETE CASCADE;

INSERT INTO category (category_name) VALUES 
('Création'),
('Culture et santé -- Action culturelle'),
('Projet de territoire -- Action culturelle'),
('Ateliers attenants aux spectacles -- Action culturelle');

INSERT INTO activity (
    activity_name,
    activity_year,
    `status`,
    subtitle,
    summary,
    `description`,
    credits,
    video_url,
    activity_img,
    id_category
) VALUES (

INSERT INTO activity (
    activity_name,
    activity_year,
    `status`,
    subtitle,
    summary,
    `description`,
    credits,
    video_url,
    activity_img,
    id_category
) VALUES (
    'Le prénom',
    'Création 2024',
    'Tournée en cours',
    'SOLO DE DANSE ET DE PAROLES INTIMES ET POLITIQUES EN ESPACE PUBLIC',
    'Mêlant danse et oralité, XXXX interroge ses racines africaines et son héritage culturel d''enfant d''immigré·es, empêché par des siècles de colonisation et d''assimilation françaises. 
    Le prénom, c''est la tentative de réparation d''une chaîne brisée, la réappropriation viscérale d''un héritage à trous. Un témoignage sensible et nécessaire comme réconciliation transgénérationnelle et multiculturelle.
    ',
    'Dans ce solo mêlant danse et oralité, Maryem interroge ses racines africaines - ivoiriennes et judéo-algériennes - et son héritage culturel d''enfant d''immigré·es empêché par des siècles de colonisation et d''assimilation françaises. 
    Le prénom, c''est la tentative de réparation d''une chaîne brisée, la réappropriation viscérale d''un héritage à trous. Un témoignage sensible et nécessaire comme réconciliation transgénérationnelle et multiculturelle.
    En investissant l''espace public et quotidien de ses gestes et textes, Maryem rend commun et politique ce qui jusqu''alors relevait de l''intime : les mouchoirs de sa grand-mère et ses confessions au détour d''un banc, le rire anisé de sa mère, les fêtes de famille paternelle, son rituel capillaire, ce message rempli de condescendance et de racisme ordinaire d''"une femme expérimentée", des bribes d''échanges avec d''autres enfants d''immigré·es, ... Des pans d''intimité qui relèvent pourtant de notre histoire commune, celle des conséquences du passé colonial français. Comment en combler les trous de mémoire et les effacements culturels ? 
    Ce solo nous embarque dans une enquête sensible à la fois intime et collective, à la recherche des fragments des cultures de ses familles, un passé à combler, à relégitimer et à faire sien.
    ',
    'chorégraphie : XXXX
    regards extérieurs : YYYY
    création musicale : ZZZZ',
    'https://vimeo.com/951071129',
    './img/le-prenom.webp',
    1
);

INSERT INTO activity (
    activity_name,
    activity_year,
    `status`,
    summary,
    `description`,
    credits,
    video_url,
    activity_img,
    id_category
) VALUES (
    'Emboucanement',
    'Création 2026/2027',
    'En création',
    'Danse aux nuisances sonores et olfactives
    Boucan déambulatoire pour la rue en cours de création (2026-2027)
    avec 3 à 6 danseur·euses
    expérimentations en contextes urbains variés
    ',
    '“Emboucanement” est un projet de création déambulatoire, chorégraphique et orale pour et avec la rue, avec 3 à 6 danseureuses. Il s''inscrit dans un contexte de transformations de l''espace public profondes : les rues, espaces historiquement occupés par les pauvres, les racisé·es et les personnes marginalisées, sont progressivement « nettoyées », aseptisées et transformées en vitrines économiques. Gentrification, normes sécuritaires et dispositifs anti-précaires effacent la mémoire populaire des quartiers et villages et repoussent leurs habitant·es toujours plus loin dans les marges. 
    Face à cet effacement, La Colombe enragée souhaite revendiquer une réappropriation totale de la rue : y reprendre place par le corps, le son, la voix, l''odeur — sans polissage ni compromis. “Emboucanement” veut revendiquer le bruit et le bordel comme force de vie et de résistance, transformant ainsi les nuisances sonores et olfactives en geste artistique et politique, en célébration joyeuse du vivant et des identités indociles.
    ',
    'chorégraphie et mise en espace : XXXX
    danse et collaboration artistique : XXXX
    costumes : XXXX
    production et diffusion : XXXX
    ',
    'https://www.youtube.com/watch?v=XXXXXXXXXXX',
    './img/Emboucanement.webp',
    1
);