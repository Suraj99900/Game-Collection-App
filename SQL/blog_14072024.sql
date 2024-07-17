CREATE TABLE blog_manage (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author_name VARCHAR(255) NOT NULL,
    blog_data LONGTEXT,
    added_on DATE,
    status INT DEFAULT 1,
    deleted INT DEFAULT 0
);
