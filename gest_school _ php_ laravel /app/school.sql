
   -- //............... table utilisateur ............//
CREATE TABLE `fadi-school-utilisateur` (
  id_utilisateur INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  email varchar(255) NOT NULL,
  mot_de_passe varchar(255) NOT NULL
  ) ENGINE InnoDB;

-- //............... cursus ............//
CREATE TABLE `fadi-school-cursus` (
  id_cursus INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom_cursus varchar(255) NOT NULL,
  frais_cursus varchar(255) NOT NULL
) ENGINE InnoDB;

INSERT INTO `fadi-school-cursus` (`id_cursus`, `nom_cursus`, `frais_cursus`) VALUES 
(NULL, 'CP', '50$'), (NULL, 'CE1', '60$'), (NULL, 'CE2', '70$'), (NULL, 'CM1', '80$'),
(NULL, 'CM2', '90$');
   

-- //............... matière ............//
CREATE TABLE `fadi-school-matiere` (
  id_matiere INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom_matiere varchar(255) NOT NULL
  ) ENGINE InnoDB;

  INSERT INTO `fadi-school-matiere` (`id_matiere`, `nom_matiere`) VALUES 
(NULL, 'français'), (NULL, 'mathématique'), (NULL, 'anglais'), (NULL, ' poésie'),(NULL, 'biologie');


    -- //............... professur ............//
CREATE TABLE `fadi-school-professeur` (
  id_professeur varchar(255) PRIMARY KEY NOT NULL,
  nom_professeur varchar(255) NOT NULL,
  prenom_professeur varchar(255) NOT NULL
  ) ENGINE InnoDB;

    INSERT INTO `fadi-school-professeur` (`id_professeur`, `nom_professeur`, `prenom_professeur`) VALUES 
('0AZ14GH', 'Granier', 'Céline'), ('5AK14GJ', 'Grosso', 'Elina'), ('8AB14GM', 'Germain', 'Alain'), 
('3AU14LP', 'Boudan', 'Gad'),('0ZR54KO', 'Serro', 'Melina'), ('9JI14GS', 'Zinon', 'Linda'), ('6DZ14GU', 'Sahia', 'Samira'),
('9AA15RH', 'Gonaille', 'Elvira'), ('2ZZ86KH', 'Ovidio', 'Anna'), ('7ZQ13VV', 'Elka', 'Erika'), ('1AA99OO', 'Andelgo', 'Helen'),
('6FF76II', 'Magnon', 'Mira'), ('6YZ32IP', 'Anton', 'Lisa'), ('2EZ65LL', 'Bonsson', 'Sara'), ('3KO14DS', 'Travido', 'Lili'),
('3YU77PV', 'Seban', 'Appoline');



-- //............... etudiant ............//
CREATE TABLE `fadi-school-etudiant` (
  id_etudiant varchar (255) PRIMARY KEY NOT NULL,
  nom_etudiant varchar(255) NOT NULL,
  prenom_etudiant varchar(255) NOT NULL,
  id_cursus INTEGER NOT NULL,
  FOREIGN KEY (id_cursus) REFERENCES `fadi-school-cursus`(id_cursus) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;

      INSERT INTO `fadi-school-etudiant` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `id_cursus`) VALUES 
('0AAZZ95', 'Martin', 'Céline',1), ('5AT14KM', 'Grolo', 'Eva', 1), ('9AR14FS', 'GOOL', 'Liona',1), 
('3IU12MI', 'Bouli', 'Gadin', 1), ('0ZT53KB', 'Serralion', 'Maiva', 1), ('1YJ00ZE', 'Zinonal', 'Lila', 1), 
('6KZ94TT', 'Samiam', 'Sami', 1), ('9UY12TT', 'Kamil', 'Chrlotte', 1), ('2ZY00KP', 'Ovissi', 'Anar', 1),
('2UY00VV', 'Erna', 'Ola', 1), ('1AA61PO', 'Anoila', 'Helena', 1),('6TF06TT', 'Magnonira', 'Mirada', 1), 
('8YU37IM', 'Antonella', 'Lio', 1), ('2QZ09LB', 'Bonssonaop', 'Sozi', 2), ('9UO04PS', 'Trhvidoi', 'Lilia', 2),
('9XX77GU', 'Sebanion', 'Appolin', 2), ('0IAZR10', 'Goli', 'Céline',2), ('8AK14GE', 'Grossolian', 'Ela', 2),
('0XB16GY', 'Geroo', 'Alix', 2), ('3XX14XX', 'Bounir', 'Gadion', 2),('7XZ55LO', 'Seo', 'Teli', 2), 
('3JU11VS', 'Zimft', 'Lolitta', 2), ('0XW19WU', 'Smool', 'Saziro', 2), ('9FA15WW', 'Gonyi', 'Sali', 2),
('9ZW88LH', 'Ovo', 'Ana', 2), ('4ZT11NV', 'aloka', 'Grika', 2), ('0ZA94JO', 'Adil', 'Holen', 2),
('6CF06XC', 'Magillan', 'Mirakel', 3), ('7ED02FP', 'Antonian', 'Loka', 3), ('2RZ55LU', 'Bonss', 'Solo', 3), 
('3XC14XC', 'Travd', 'Lio', 3), ('3YC70PC', 'Seb', 'Artor', 3), ('0WA0Z95', 'Goan', 'Sirina',3), 
('0CB14PJ', 'Gro', 'Eli', 3), ('3AN99GA', 'Gir', 'Matilda', 3), ('8BT14XN', 'Boush', 'Zak', 4),
('9SF54FR', 'Mathias', 'Henri', 4), ('5SC14IS', 'Zioa', 'Zios', 4), ('1BB14AA', 'Shahia', 'Dorra', 4),
('9VB15XK', 'Gogo', 'Ela', 4), ('4SQ86SQ', 'Ovi', 'Malik', 4), ('7QQ93JO', 'Elkaoli', 'Frika', 4),
('2AT99PO', 'Andora', 'Damian', 4), ('8BM76QQ', 'Magali', 'Mira', 5), ('3RR80IS', 'Antonan', 'Liza', 5),
('5EX65XL', 'Bons', 'Sara', 5), ('4QO82DF', 'Trav', 'Lilian', 5), ('3UU77VX', 'Saxic', 'Konan', 5), 
('0XXZZ91', 'Goana', 'Céline',5), ('8AT49OJ', 'Grinaldi', 'Elin', 5), ('8YM14YM', 'Juoam', 'Alain', 5), 
('3JR14MC', 'Bolla', 'Gad', 5), ('0SSTT34', 'Soaze', 'Mel', 5), ('6JB58AS', 'Ziman', 'Mouna', 5), ('6XV91ZT', 'Shool', 'Toni', 5);



    -- //............... cursus-professeur_matiere ............//
CREATE TABLE `fadi-school-c_p_m` (
  id_cursus INTEGER NOT NULL,
  id_professeur VARCHAR (255) NOT NULL,
  id_matiere INTEGER NOT NULL,
  FOREIGN KEY (id_cursus) REFERENCES `fadi-school-cursus`(id_cursus) 
  ON DELETE CASCADE,
   FOREIGN KEY (id_professeur) REFERENCES `fadi-school-professeur`(id_professeur) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_matiere) REFERENCES `fadi-school-matiere`(id_matiere) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;


      INSERT INTO `fadi-school-c_p_m` (`id_cursus`, `id_professeur`, `id_matiere`) VALUES 
(1, '0AZ14GH', 1), (1, '5AK14GJ', 2), (1, '8AB14GM', 3), (1, '3AU14LP', 4), (1, '0ZR54KO', 5),
(2, '9JI14GS', 1), (2, '6DZ14GU', 2), (2, '9AA15RH', 3), (2, '2ZZ86KH', 4), (2, '7ZQ13VV', 5),
(3, '1AA99OO', 1), (3, '6FF76II', 2), (3, '6YZ32IP', 3), (3, '2EZ65LL', 4), (3, '3KO14DS', 5),
(4, '3YU77PV', 1), (4, '5AK14GJ', 2), (4, '8AB14GM', 3), (4, '3AU14LP', 4), (4, '3KO14DS', 5),
(5, '3YU77PV', 1), (5, '5AK14GJ', 2), (5, '8AB14GM', 3), (5, '2ZZ86KH', 4), (5, '3KO14DS', 5);




    -- //............... note ............//

CREATE TABLE `fadi-school-note` (
  id_note INTEGER PRIMARY KEY NOT NULL auto_increment,
  note INTEGER(255) NOT NULL,
  appreciation Text (255) NOT NULL,
  semestre INTEGER (25) NOT NULL,
  annee_scolaire VARCHAR (255) NOT NULL,
  id_matiere INTEGER (255) NOT NULL,
  id_etudiant varchar (255) NOT NULL,
  id_professeur varchar (255) NOT NULL,
  id_cursus INTEGER (255) NOT NULL,
  FOREIGN KEY (id_matiere) REFERENCES `fadi-school-matiere`(id_matiere) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_etudiant) REFERENCES `fadi-school-etudiant`(id_etudiant) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_professeur) REFERENCES `fadi-school-professeur`(id_professeur) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_cursus) REFERENCES `fadi-school-cursus`(id_cursus) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;




 





   