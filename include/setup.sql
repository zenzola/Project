// Create Table: //////////////////////////////////////////////////////

CREATE TABLE myclub
(
lastname char(50),
firstname char(50),
email char(50),
password char(40),
registrationdate DATETIME,
membertype enum('Gryffindor', 'Slytherin', 'Ravenclaw', 'Hufflepuff')
);



// Insert Members: ////////////////////////////////////////////////////

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ('Alex', 'Pear', 'aapear@mac.com', SHA1('Fluffy1'), now(), 'Gryffindor');

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ('Alex', 'Anne', 'pear@bc.edu', SHA1('Dobby2'), now(), 'Ravenclaw');

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ('Haein', 'Kang', 'haein.kang.1@bc.edu', SHA1('Dumbledore'), now(), 'Hufflepuff');

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ('Caroline', 'Kulig', 'caroline.kulig.1@bc.edu', SHA1('phoenix33'), now(), 'Slytherin');

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ('Christine', 'Cocce', 'christine.cocce.1@bc.edu', SHA1('patronum1998'), now(), 'Gryffindor');

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ('Courtney', 'Shea', 'courtney.shea.1@bc.edu', SHA1('BertieBotts11'), now(), 'Ravenclaw');

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ('Michaela', 'Nolan', 'michaela.nolan.1@bc.edu', SHA1('quidditch2000'), now(), 'Hufflepuff');

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ('Rachael', 'OKeefe', 'rachael.okeefe.1@bc.edu', SHA1('potions20'), now(), 'Hufflepuff');

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ('Katie', 'Williamson', 'katie.williamson.1@bc.edu', SHA1('chocofrog10'), now(), 'Slytherin');

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ('Kate', 'Lowrie', 'lowriek@bc.edu', SHA1('swordfish'), now(), 'Gryffindor');



// Select: ////////////////////////////////////////////////////////////

query examples:
SELECT * FROM myclub WHERE email='aapear@mac.com';
SELECT * FROM myclub WHERE email regexp '@bc\.edu$';


// Update Member: /////////////////////////////////////////////////////

UPDATE myclub SET email = 'apear43@gmail.com' WHERE firstname = 'Alex' AND lastname = 'Pear';
UPDATE myclub SET email = 'apear43@gmail.com' WHERE firstname = 'Alex' AND lastname = 'Anne';
UPDATE myclub SET membertype = 'Gryffindor' WHERE membertype = 'Slytherin';


// Delete Member ////////////////////////////////////////////////////

DELETE FROM myclub WHERE membertype = 'Slytherin';
DELETE FROM myclub WHERE firstname = 'Alex';
