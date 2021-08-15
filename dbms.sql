CREATE DATABASE newsportal;

create Table reporter (
    id INT primary key AUTO_INCREMENT,
    username varchar(255),
    email varchar(255),
    category varchar(255),
    password varchar(255)
);

drop table reporter;

insert into reporter (username, email, category, password)
values ('kaium', 'kaium@example.com', 'foods', '123');

select * from reporter;

SELECT * FROM reporter WHERE email = 'wahid@gmail.com';

SELECT * FROM reporter WHERE email = 'najma@gmail.com' AND password = '789';

-- Admin table creation

create Table admin (
    id INT primary key AUTO_INCREMENT,
    username varchar(255),
    email varchar(255),
    password varchar(255)
);

insert into admin (username, email, password)
values ('admin', 'admin@gmail.com', '123');


-- News table creation

create Table news (
    id INT primary key AUTO_INCREMENT,
    imagename varchar(255),
    title BLOB,
    content BLOB,
    reporterid int,
    reportername varchar(255),
    category varchar(255),
    approved boolean
);

insert into news (imagename, title, content, reporterid, reportername, category, approved)
values ('cylinder.png', 'oxygen', 'kaium is a student', 7, 'kaium', 'bussiness', 0);

select * from news;
drop table news;



UPDATE news SET approved = 0 WHERE id = 1;
UPDATE news SET approved = 1 WHERE approved = 0;
UPDATE news SET approved = 0 WHERE approved = 1;

DELETE FROM news WHERE id = 1;
    

SELECT * FROM news WHERE approved = 1 ORDER BY id DESC;

SELECT * FROM news WHERE approved = 1 AND category = 'corona';
SELECT * FROM news WHERE approved = 1 AND category = 'bussiness';
SELECT * FROM news WHERE approved = 1 AND category = 'sports';
SELECT * FROM news WHERE approved = 1 AND category = 'foods';

UPDATE news SET category = 'corona' WHERE approved = 1;
UPDATE news SET category = 'bussiness' WHERE approved = 1;
UPDATE news SET category = 'sports' WHERE approved = 1;
UPDATE news SET category = 'foods' WHERE approved = 1;
UPDATE news SET approved = 0 WHERE category = 'foods';
