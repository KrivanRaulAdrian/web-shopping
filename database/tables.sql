CREATE DATABASE IF NOT EXISTS web_shop;

USE web_shop;

CREATE TABLE IF NOT EXISTS products (
        id VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        price DECIMAL(10,2) NOT NULL,
        quantity INT NOT NULL,
        PRIMARY KEY (id)
    );
CREATE TABLE IF NOT EXISTS orders (
        id VARCHAR(255) NOT NULL,
        total DECIMAL(10,2) NOT NULL,
        completed_at DATETIME,
        PRIMARY KEY (id)
    ); 
CREATE TABLE IF NOT EXISTS order_items (
        order_id VARCHAR(255) NOT NULL,
        product_id VARCHAR(255) NOT NULL,
        quantity INT NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        PRIMARY KEY (order_id, product_id),
        FOREIGN KEY (order_id) REFERENCES orders(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
    );