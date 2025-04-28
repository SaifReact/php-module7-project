CREATE DATABASE photo_gallery;

-- Use the photo_gallery database
USE photo_gallery;

-- Create the images table
CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    filename VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);