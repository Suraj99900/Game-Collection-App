CREATE TABLE app_user (
    id INT PRIMARY KEY auto_increment,
    name VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    user_type VARCHAR(50),
    added_on DATE,
    status INT DEFAULT 1,
    deleted INT DEFAULT 0
);

-- genrate client ---
CREATE TABLE client_code (
    client_id VARCHAR(255) UNIQUE,
    client_key VARCHAR(255) UNIQUE,
    client_name VARCHAR(255)
);

-- insert client value
insert into client_code (client_id,client_key,client_name) value("99900","6306e34f4877c2ea7e5d3c09f64d732241dba09afb2cffce295479c75d0b2b49","suraj jaiswal");