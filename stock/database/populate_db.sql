insert into customers(username, lastname,firstname,email,role,password,address,city,state,zip,country) values
('Carine','Schmitt','Carine','sc@tmail.com','Customer','password','54, rue Royale','Nantes',NULL,'44000','France'),
('Jean','King', 'Jean','kj@mail.com','Customer','password','8489 Strong St.','Las Vegas','NV','83030','USA'),
('Janine','Labrune', 'Janine','janine@tmail.com','Customer','password','67, rue des Cerises','Nantes',NULL,'44000','France');

INSERT INTO products (prodid,catid ,name ,price ,description  ,img ,date_added) VALUES (11,1,'Smart Watch',29.99,'<p>Unique watch made with stainless steel, ideal for those that prefer interative watches.</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>Powered by Android with built-in apps.</li>\r\n<li>Adjustable to fit most.</li>\r\n<li>Long battery life, continuous wear for up to 2 days.</li>\r\n<li>Lightweight design, comfort on your wrist.</li>\r\n</ul>','1.jpg','2020-04-04 18:54:07'),(12,2,'kiwi',1.99,'','2.png','2020-04-04 18:54:07'),(13,1,'Digital camera',99.00,'<p>Digital cameras and their liquid crystal displays (LCDs) enable instant reviews of photographs, which can be reshot without wasting film.</p>','3.jpg','2020-04-04 20:39:25');


INSERT INTO categories(catid,catname) VALUES (1,'Electronics'),(2,'Fruits'),(3,'Furniture');
