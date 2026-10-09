CREATE DATABASE IF NOT EXISTS campus_complaint_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE campus_complaint_portal;

CREATE TABLE IF NOT EXISTS users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('student','admin') NOT NULL DEFAULT 'student',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS complaints (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  category VARCHAR(60) NOT NULL,
  location VARCHAR(190) NOT NULL,
  description TEXT NOT NULL,
  image VARCHAR(255) NULL,
  status ENUM('Pending','Assigned','In Progress','Resolved') NOT NULL DEFAULT 'Pending',
  assigned_to VARCHAR(120) NULL,
  admin_note TEXT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_complaint_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  INDEX idx_status (status), INDEX idx_category (category), INDEX idx_created (created_at)
) ENGINE=InnoDB;

-- Demo accounts. Passwords: password123 / admin123
INSERT INTO users (name,email,password,role) VALUES
('Demo Student','student@campus.local','$2y$12$gz2SpnCw0jkQ3vA7TIhCBe3yBwYfpIP4pbIGMgBQdg6IU9dFB1DTa','student'),
('Campus Administrator','admin@campus.local','$2y$12$Z7AdW7XahmI2OYYXpogzNOp06dLV9pOyTiA72eCpHbbgJiHJiURca','admin')
ON DUPLICATE KEY UPDATE email=email;
