CREATE TABLE users_table (
user_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(40) NOT NULL,
email VARCHAR(80) NOT NULL,
pass VARCHAR(256) NOT NULL,
user_level TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,/*Regular user = 0, Administrator is 1*/
active CHAR(32), /*Stores an activation code if you will require users to activate their accounts via email*/
registration_date DATETIME NOT NULL,
PRIMARY KEY (user_id),
UNIQUE KEY (email)
);