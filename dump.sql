CREATE DATABASE IF NOT EXISTS patinhas_felizes;
USE patinhas_felizes;

-- Criar tabela de Usuários
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(2000) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
	telefone varchar(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE = InnoDB;

CREATE TABLE address (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cep VARCHAR(9) NOT NULL,
    rua TEXT NOT NULL,
    numero VARCHAR(100),
    complemento VARCHAR(100),
    bairro TEXT NOT NULL,
    cidade TEXT NOT NULL,
    estado TEXT NOT NULL,
    pais TEXT NOT NULL,
    fk_user_id INT NOT NULL,
    FOREIGN KEY (fk_user_id) REFERENCES users(id)
) ENGINE = InnoDB;

-- Criar tabela de Pets
CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nome_pet VARCHAR(255) NOT NULL,
    especie varchar(100) NOT NULL,
    raca VARCHAR(255),
    idade INT,
    cor VARCHAR(100),
    caracteristicas TEXT,
    foto VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Criar tabela de Pets Perdidos
CREATE TABLE lost_pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id 
    INT NOT NULL,
    lost_date DATE NOT NULL,
    last_seen_location VARCHAR(255) NOT NULL,
    additional_info TEXT,
    status ENUM('perdido', 'encontrado') DEFAULT 'perdido',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (pet_id) REFERENCES pets(id) ON DELETE CASCADE
);

-- Criar tabela de Pets para Adoção
CREATE TABLE adoption_pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    vaccinated BOOLEAN DEFAULT FALSE,
    neutered BOOLEAN DEFAULT FALSE,
    health_checked BOOLEAN DEFAULT FALSE,
    adoption_status ENUM('disponível', 'adotado') DEFAULT 'disponível',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (pet_id) REFERENCES pets(id) ON DELETE CASCADE
);

-- Criar tabela de Chats
CREATE TABLE chats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    pet_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (pet_id) REFERENCES pets(id) ON DELETE CASCADE
);

-- Criar tabela de Mensagens do Chat
CREATE TABLE chat_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chat_id INT NOT NULL,
    sender_id INT NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (chat_id) REFERENCES chats(id) ON DELETE CASCADE,
    FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE
);
