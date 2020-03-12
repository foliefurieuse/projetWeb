CREATE TABLE clients (
id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
clientname varchar(255) NOT NULL,
email varchar(255) NOT NULL,
role enum('Author', 'Admin') DEFAULT NULL,
password varchar(255) NOT NULL,
created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO clients (id, clientname, email, role, password, created_at, updated_at)
VALUES (1,'Test','info@code.com', 'Admin', 'mypassword','2018-01-08 12:52:58', '2018-01-08 12:52:58');

CREATE TABLE orders (
id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
client_id int(11) DEFAULT NULL,
ord_total DECIMAL(12,2) NOT NULL,
ord_description text NOT NULL,
ord_status INT(2) NOT NULL,
slug varchar(255) NOT NULL UNIQUE,
order_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
updated_at timestamp NOT NULL DEFAULT '1980-01-01 01:01:01',
FOREIGN KEY (client_id) REFERENCES clients (id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO orders (id, client_id, ord_total, ord_description, ord_status,slug,order_date, updated_at)
VALUES (1,1,1260,'Furnitures IKEA for better life', 0, 'Furnitures-IKEA-for-better-life','2018-02-03 07:58:02', '2018-02-01 19:14:31');
INSERT INTO orders VALUES
(2,1,4569,'Furnitures Boulanger TV HD', 0, 'Furnitures-Boulanger-TV-HD', '2018-02-02 11:40:12', '2018-02-01 13:04:36');
