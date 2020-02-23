CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  user varchar(255) NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  pass varchar(255) NOT NULL,
  postal_code varchar(10),
  PRIMARY KEY (id),
  UNIQUE KEY `unique_id` (id),
  UNIQUE KEY `unique_email` (email)
)