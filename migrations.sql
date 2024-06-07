CREATE TABLE bonus (id INT AUTOINCREMENT, name TEXT, time INT, PRIMARY KEY (id));

CREATE TABLE bonuses (id INT AUTOINCREMENT, bonus_ref INT, date DATE, sold INT , PRIMARY KEY (id), FOREIGN KEY (bonus_ref));
