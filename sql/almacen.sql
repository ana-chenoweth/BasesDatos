CREATE TABLE Departamento (
    id_departamento SERIAL PRIMARY KEY,
    nombre VARCHAR(100)
);

CREATE TABLE Categoria (
    id_categoria SERIAL PRIMARY KEY,
    tipo VARCHAR(50)
);

CREATE TABLE Objeto (
    id_objeto SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(255),
    id_categoria INT NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES Categoria(id_categoria)
);

CREATE TABLE Edificio (
    id_edificio SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    id_departamento INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamento(id_departamento)
);

CREATE TABLE Aula (
    id_aula INT NOT NULL,
    id_edificio INT NOT NULL,
    nombre VARCHAR(100),
    PRIMARY KEY (id_aula, id_edificio),
    FOREIGN KEY (id_edificio) REFERENCES Edificio(id_edificio)
);

CREATE TABLE Ejemplar (
    id_ejemplar SERIAL PRIMARY KEY,
    id_aula INT NOT NULL,
    id_edificio INT NOT NULL,
    id_objeto INT NOT NULL,
    FOREIGN KEY (id_aula, id_edificio) REFERENCES Aula(id_aula, id_edificio),
    FOREIGN KEY (id_objeto) REFERENCES Objeto(id_objeto)
);

