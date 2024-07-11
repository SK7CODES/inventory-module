CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE subcategories (
    id SERIAL PRIMARY KEY,
    category_id INTEGER REFERENCES categories(id) ON DELETE CASCADE,
    name VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE items (
    id SERIAL PRIMARY KEY,
    category_id INTEGER REFERENCES categories(id) ON DELETE CASCADE,
    subcategory_id INTEGER REFERENCES subcategories(id) ON DELETE CASCADE,
    name VARCHAR(255) NOT NULL,
    quantity INTEGER NOT NULL,
    unit VARCHAR(50) NOT NULL,
    expiry_date DATE,
    description TEXT,
    storage_location VARCHAR(255),
    perishable BOOLEAN NOT NULL
);

INSERT INTO categories (name) VALUES ('Food and Beverages'), ('Equipments'), ('Decors');
INSERT INTO subcategories (name, category_id) VALUES
    ('Dry Goods', 1), ('Dairy', 1), 
    ('Kitchen Appliances', 2), ('Tools', 2);


