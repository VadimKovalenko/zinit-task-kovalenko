CREATE TABLE `users` (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), username VARCHAR(30), email VARCHAR(30), password VARCHAR(255), last_visit DATETIME); 

--Add custom usert to the 'users' table-
INSERT INTO users (username, email, password, last_visit) 
VALUES ('John', 'john@gmail.com', SHA(1111), '2015-10-16 16:03:38'),
	('Max', 'max@gmail.com', SHA(2222), '2013-02-22 18:17:20'),
	('Lenny', 'lenny@gmail.com', SHA(3333), '2014-08-16 12:15:00'),
	('Steve', 'steve@gmail.com', SHA(4444), '2012-05-14 14:52:29');