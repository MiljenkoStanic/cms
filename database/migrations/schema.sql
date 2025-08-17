CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    username VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role VARCHAR(50) DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(10) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    flag VARCHAR(255) NULL
);

CREATE TABLE translations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text_key VARCHAR(190) NOT NULL,
    lang_code VARCHAR(10) NOT NULL,
    value TEXT NOT NULL,
    UNIQUE KEY unique_translation (text_key, lang_code)
);
