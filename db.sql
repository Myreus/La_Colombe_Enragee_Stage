CREATE DATABASE IF NOT EXISTS lce CHARSET utf8mb4;

USE lce;

CREATE TABLE IF NOT EXISTS category(
category_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
category_name VARCHAR(50) UNIQUE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `member`(
member_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
firstname VARCHAR(50) NOT NULL,
lastname VARCHAR(100) NOT NULL,
`role` VARCHAR(100) NOT NULL,
member_img VARCHAR(255) NOT NULL,
display_order TINYINT NOT NULL DEFAULT 0
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS activity(
activity_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
activity_name VARCHAR(50) NOT NULL,
slug VARCHAR(50) UNIQUE NOT NULL,
activity_year VARCHAR(50),
`status` VARCHAR(50),
subtitle VARCHAR(255),
summary TEXT,
`description` TEXT NOT NULL,
credits1 TEXT,
credits2 TEXT,
video_url TEXT,
activity_img VARCHAR(500) NOT NULL,
on_frontpage BOOLEAN NOT NULL DEFAULT 0,
display_order TINYINT NOT NULL DEFAULT 0,
id_category INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `date`(
date_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
date_value DATETIME NOT NULL,
place VARCHAR(100) NOT NULL,
id_activity INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE `admin` (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(100) NOT NULL
);

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
('Atelier -- Action culturelle');

INSERT INTO `member` (firstname, lastname, `role`, member_img) VALUES 
('Maryem', 'D.', 'chorégraphe et porteuse de projets', './img/trombinoscope/Maryem.webp'),
('Louv', 'Barriol', 'chargé.e de production et de diffusion', './img/trombinoscope/Louv.webp'),
('Marthe', 'Mosser', 'danseuse collaboratrice', './img/trombinoscope/Marthe.webp'),
('Fanny', 'Delépine', 'danseuse collaboratrice', './img/trombinoscope/Fanny.webp'),
('Léon', 'Lia', 'rappeuse', './img/trombinoscope/Lea.webp'),
('Noah', 'Fiossi', 'danseur.euse collaborateur.ice', './img/trombinoscope/Noah.webp'),
('Melissa', 'Wyns', 'danseuse collaboratrice', './img/trombinoscope/Melissa.webp'),
('Kynsie', 'Serre', 'danseuse collaboratrice', './img/trombinoscope/Kynsie.webp');

INSERT INTO activity (
    activity_name,
    slug,
    activity_year,
    `status`,
    subtitle,
    summary,
    `description`,
    credits1,
    credits2,
    video_url,
    activity_img,
    on_frontpage,
    display_order,
    id_category) 
    VALUES (
    'Le prénom',
    'le-prenom',
    'Création 2024',
    'Tournée en cours',
    'SOLO DE DANSE ET DE PAROLES INTIMES ET POLITIQUES EN ESPACE PUBLIC',
    'Mêlant danse et oralité, Maryem D. interroge ses racines africaines et son héritage culturel d''enfant d''immigré·es, empêché par des siècles de colonisation et d''assimilation françaises. 
    Le prénom, c''est la tentative de réparation d''une chaîne brisée, la réappropriation viscérale d''un héritage à trous. Un témoignage sensible et nécessaire comme réconciliation transgénérationnelle et multiculturelle.
    ',
    'Dans ce solo mêlant danse et oralité, Maryem interroge ses racines africaines - ivoiriennes et judéo-algériennes - et son héritage culturel d''enfant d''immigré·es empêché par des siècles de colonisation et d''assimilation françaises. 
    Le prénom, c''est la tentative de réparation d''une chaîne brisée, la réappropriation viscérale d''un héritage à trous. Un témoignage sensible et nécessaire comme réconciliation transgénérationnelle et multiculturelle.
    En investissant l''espace public et quotidien de ses gestes et textes, Maryem rend commun et politique ce qui jusqu''alors relevait de l''intime : les mouchoirs de sa grand-mère et ses confessions au détour d''un banc, le rire anisé de sa mère, les fêtes de famille paternelle, son rituel capillaire, ce message rempli de condescendance et de racisme ordinaire d''"une femme expérimentée", des bribes d''échanges avec d''autres enfants d''immigré·es, ... Des pans d''intimité qui relèvent pourtant de notre histoire commune, celle des conséquences du passé colonial français. Comment en combler les trous de mémoire et les effacements culturels ? 
    Ce solo nous embarque dans une enquête sensible à la fois intime et collective, à la recherche des fragments des cultures de ses familles, un passé à combler, à relégitimer et à faire sien.
    ',
    'chorégraphie, textes & interprétation : Maryem D.
	regards extérieurs : Anne Lebatard, Marie Carrère, Mounâ Nemri, Désirée 0100
	création musicale et sonore : Mélio Diawara
	régie : Mélio Diawara / Opal Besseas
	costumes : Récolte studio (Morgane Rozès et Paul Laburre)
	production et diffusion : Louv Barriol
	merci à Joël, Lory, Natacha, Joss, Fanny, Elda, Mounâ, Sas, Hindy-Hanene, Laïd, Doria, Siham, Kemla, Marion, Aurélia, Emma, Louise, Zara, Noah, Raphaël, Bastien, Mickaël, Maël, Eliana, Manal, Nezha, Diarra, Nadia, Ibrahima pour leurs témoignages
	',
    'production déléguée : Les Thérèses
	coproductions : Lieux publics - CNAREP & Pôle européen de production, ARTO, Latitude 50 - Pôle des arts du cirque et de la rue, Ax Animation
	aides à la création : Région Occitanie, Département de la Haute-Garonne, Mairie de Toulouse
	soutiens : ECLAT, ARTCENA, La petite pierre, Centre Culturel Soupetard, Centre Culturel Henri-Desbals, Cie Ex Nihilo, MJC Ancely, Topfloor festival, Festival Ras el hanout, Festival Rebish, Cie La Baraque
	',
    'https://player.vimeo.com/video/951071129?h=2cef335fa2',
    './img/le-prenom.webp',
    1,
    1,
    1
);

INSERT INTO activity (
    activity_name,
    slug,
    activity_year,
    `status`,
    subtitle,
    summary,
    `description`,
    credits1,
    credits2,
    video_url,
    activity_img,
    on_frontpage,
    display_order,
    id_category
) VALUES (
    'Emboucanement',
    'Emboucanement',
    'Création 2026/2027',
    'En création',
    'Danse aux nuisances sonores et olfactives',
    'Boucan déambulatoire pour la rue qui interrogera la gentrification, les normes sonores et olfactives qui régissent l''espace public ainsi que les stigmates qu''elles impliquent pour certains groupes minorisés.
    ',
    '“Emboucanement” est un projet de création déambulatoire, chorégraphique et orale pour et avec la rue, avec 3 à 6 danseureuses. Il s’inscrit dans un contexte de transformations de l’espace public profondes : les rues, espaces historiquement occupés par les pauvres, les racisé·es et les personnes marginalisées, sont progressivement « nettoyées », aseptisées et transformées en vitrines économiques. Gentrification, normes sécuritaires et dispositifs anti-précaires effacent la mémoire populaire des quartiers et villages et repoussent leurs habitant·es toujours plus loin dans les marges. 
	Face à cet effacement, La Colombe enragée souhaite revendiquer une réappropriation totale de la rue : y reprendre place par le corps, le son, la voix, l’odeur — sans polissage ni compromis. “Emboucanement” veut revendiquer le bruit et le bordel comme force de vie et de résistance, transformant ainsi les nuisances sonores et olfactives en geste artistique et politique, en célébration joyeuse du vivant et des identités indociles.
	',
    'chorégraphie et mise en espace : Maryem D.
	danse et collaboration artistique : Fanny Delépine, Kynsie Serre, Marthe Mosser, Melissa Wyns, Noah Fiossi, Elena Vieu musique et son Leon Lia et Mélio Diawara
	costumes : Récolte studio (Morgane Rozès et Paul Laburre)
	production et diffusion : Louv Barriol
    ',
    'production déléguée : Les Thérèses
	partenaires : Arto, l’Usine, Lieux Publics, Eurek’Art, Le Tracteur, La Petite Pierre, L’Espace Germinal, Melando, ADEMASS, Le Carroi - Menetou-Salon, DAC Blagnac, Ax Animation, Théâtre du Grand Rond
	discussions et demandes en cours ou à venir : La Place de la Danse, CC Bonnefoy, Superstrat, ... 
	en recherche : coproductions, semaines de résidence sur 2027, pré-achats à partir d’octobre 27
	',
    null,
    './img/Emboucanement.webp',
    1,
    2,
    1
);

INSERT INTO activity (
    activity_name,
    slug,
    activity_year,
    `status`,
    subtitle,
    summary,
    `description`,
    credits1,
    credits2,
    video_url,
    activity_img,
    on_frontpage,
    display_order,
    id_category
) VALUES (
    'Emboucanement',
    'Emboucanement',
    'Création 2026/2027',
    'En création',
    'Danse aux nuisances sonores et olfactives',
    'Boucan déambulatoire pour la rue qui interrogera la gentrification, les normes sonores et olfactives qui régissent l''espace public ainsi que les stigmates qu''elles impliquent pour certains groupes minorisés.
    ',
    '“Emboucanement” est un projet de création déambulatoire, chorégraphique et orale pour et avec la rue, avec 3 à 6 danseureuses. Il s’inscrit dans un contexte de transformations de l’espace public profondes : les rues, espaces historiquement occupés par les pauvres, les racisé·es et les personnes marginalisées, sont progressivement « nettoyées », aseptisées et transformées en vitrines économiques. Gentrification, normes sécuritaires et dispositifs anti-précaires effacent la mémoire populaire des quartiers et villages et repoussent leurs habitant·es toujours plus loin dans les marges. 
	Face à cet effacement, La Colombe enragée souhaite revendiquer une réappropriation totale de la rue : y reprendre place par le corps, le son, la voix, l’odeur — sans polissage ni compromis. “Emboucanement” veut revendiquer le bruit et le bordel comme force de vie et de résistance, transformant ainsi les nuisances sonores et olfactives en geste artistique et politique, en célébration joyeuse du vivant et des identités indociles.
	',
    'chorégraphie et mise en espace : Maryem D.
	danse et collaboration artistique : Fanny Delépine, Kynsie Serre, Marthe Mosser, Melissa Wyns, Noah Fiossi, Elena Vieu musique et son Leon Lia et Mélio Diawara
	costumes : Récolte studio (Morgane Rozès et Paul Laburre)
	production et diffusion : Louv Barriol
    ',
    'production déléguée : Les Thérèses
	partenaires : Arto, l’Usine, Lieux Publics, Eurek’Art, Le Tracteur, La Petite Pierre, L’Espace Germinal, Melando, ADEMASS, Le Carroi - Menetou-Salon, DAC Blagnac, Ax Animation, Théâtre du Grand Rond
	discussions et demandes en cours ou à venir : La Place de la Danse, CC Bonnefoy, Superstrat, ... 
	en recherche : coproductions, semaines de résidence sur 2027, pré-achats à partir d’octobre 27
	',
    null,
    './img/Emboucanement.webp',
    1,
    2,
    1
);

INSERT INTO `date` (`date_value`, `place`, `id_activity`) VALUES
('2026-06-12 20:30:00', 'Théâtre de la Ville - Paris', 1),
('2026-06-13 20:30:00', 'Théâtre de la Ville - Paris', 2),
('2026-06-20 19:00:00', 'Opéra National de Lyon', 1),
('2026-07-05 18:30:00', 'Grand Théâtre de Provence - Aix-en-Provence', 2),
('2026-07-12 21:00:00', 'Palais des Festivals - Cannes', 1),
('2026-08-02 17:00:00', 'Théâtre Antique - Orange', 2),
('2026-08-15 20:00:00', 'Le Carré - Château-Gontier', 1),
('2026-09-10 20:45:00', 'Maison de la Danse - Lyon', 2);