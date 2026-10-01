CREATE DATABASE IF NOT EXISTS lostfound CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE lostfound;

CREATE TABLE IF NOT EXISTS pengguna (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL,
  role VARCHAR(10) NOT NULL DEFAULT 'user'
);

CREATE TABLE IF NOT EXISTS barang (
  id_barang INT AUTO_INCREMENT PRIMARY KEY,
  nama_barang VARCHAR(100) NOT NULL,
  deskripsi VARCHAR(255) NOT NULL,
  lokasi VARCHAR(100) NOT NULL,
  jenis VARCHAR(20) NOT NULL DEFAULT 'hilang',
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  pelapor VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS klaim (
  id_klaim INT AUTO_INCREMENT PRIMARY KEY,
  id_barang INT NOT NULL,
  pengklaim VARCHAR(50) NOT NULL,
  alasan VARCHAR(255) NOT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'pending'
);

INSERT INTO pengguna (name, email, username, password, role) VALUES
('Admin', 'admin@lf.com', 'admin', 'admin123', 'admin'),
('User', 'user@lf.com', 'user', 'user123', 'user');

INSERT INTO barang (nama_barang, deskripsi, lokasi, jenis, status, pelapor) VALUES
('Dompet Coklat', 'Dompet kulit isi KTP', 'Kantin', 'hilang', 'pending', 'user'),
('Kunci Motor', 'Kunci Yamaha + gantungan', 'Parkiran', 'ditemukan', 'approved', 'admin');
