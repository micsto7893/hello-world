CREATE DATABASE IF NOT EXISTS online_store;
USE online_store;

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    product_description VARCHAR(250) NOT NULL,
    product_cost DECIMAL(10,2) NOT NULL
);

INSERT INTO products
    (product_name, product_description, product_cost)
VALUES
    ('Beer Glass Set', 'Set of four pint glasses for a home bar.', 24.99),
    ('Neon Bar Sign', 'LED Style neon sign perfect for any man cave.', 49.99),
    ('Dart Board', 'A classic game thats required for pretty much any man cave.', 39.99),
    ('Beer Fridge', 'A place to keep the necessities cold and delicious.', 499.99),
    ('Wall Mounted Bottle Opener', 'A metal wall-mounted bottle opener to keep the cave looking of so fancy.', 19.99);