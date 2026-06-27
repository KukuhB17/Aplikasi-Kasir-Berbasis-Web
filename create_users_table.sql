-- SQL untuk membuat tabel users di database kasir_db
-- Jalankan di phpMyAdmin atau MySQL CLI

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contoh: tambah user admin secara manual (password: admin123)
-- INSERT INTO users (username, password) VALUES ('admin', MD5('admin123'));
