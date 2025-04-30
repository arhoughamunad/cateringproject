	# Crear la base de datos
	DROP DATABASE IF EXISTS cateringdb;
	CREATE DATABASE IF NOT EXISTS cateringdb;
	USE cateringdb;

	# Crear la tabla Tipo_Usuario primero porque otras tablas la referencian
	CREATE TABLE IF NOT EXISTS Tipo_Usuario (
	  Id_TipoUsuario INT NOT NULL AUTO_INCREMENT,
	  Desc_TipoUsuario VARCHAR(50) NOT NULL,
	  PRIMARY KEY (Id_TipoUsuario),
	  UNIQUE KEY (Desc_TipoUsuario)
	) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

	# Crear la tabla Usuarios
	CREATE TABLE IF NOT EXISTS Usuarios (
	  Id_Usuario INT NOT NULL AUTO_INCREMENT,
	  Id_TipoUsuario INT NOT NULL,
	  Email VARCHAR(50) NOT NULL,
	  PasswordHash VARCHAR(255) NOT NULL,
	  Nombre VARCHAR(100) NOT NULL,
	  Telefono VARCHAR(15) DEFAULT NULL,
	  Direccion VARCHAR(255) DEFAULT NULL,
	  Fecha_Creacion TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	  Cb_UsuarioActivo TINYINT(1) NOT NULL DEFAULT '1',
	  PRIMARY KEY (Id_Usuario),
	  UNIQUE KEY (Email),
	  FOREIGN KEY (Id_TipoUsuario) REFERENCES Tipo_Usuario(Id_TipoUsuario) ON DELETE CASCADE
	) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

	# Crear la tabla Formularios
	CREATE TABLE IF NOT EXISTS Formularios (
	  Id_Formulario INT NOT NULL AUTO_INCREMENT,
	  Id_TipoUsuario INT NOT NULL,
	  Desc_Formulario VARCHAR(255) NOT NULL,
	  PRIMARY KEY (Id_Formulario),
	  FOREIGN KEY (Id_TipoUsuario) REFERENCES Tipo_Usuario(Id_TipoUsuario) ON DELETE CASCADE
	) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

	# Crear la tabla Historial_Formularios
	CREATE TABLE IF NOT EXISTS Historial_Formularios (
	  Id_HistoriaFormulario INT NOT NULL AUTO_INCREMENT,
	  Id_Formulario INT NOT NULL,
	  Id_Usuario INT NOT NULL,
	  Fecha_Formulario TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	  PRIMARY KEY (Id_HistoriaFormulario),
	  FOREIGN KEY (Id_Formulario) REFERENCES Formularios(Id_Formulario) ON DELETE CASCADE,
	  FOREIGN KEY (Id_Usuario) REFERENCES Usuarios(Id_Usuario) ON DELETE CASCADE
	) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

	# Crear la tabla Preguntas_Formularios
	CREATE TABLE IF NOT EXISTS Preguntas_Formularios (
	  Id_Pregunta INT NOT NULL AUTO_INCREMENT,
	  Id_Formulario INT NOT NULL,
	  Id_Usuario INT NOT NULL, 
	  Desc_TipoDato VARCHAR(50) NOT NULL,
	  Desc_Pregunta VARCHAR(255) NOT NULL,
	  Cb_EsRequerida TINYINT(1) DEFAULT '0',
	  Cb_EsHabilitada TINYINT(1) DEFAULT '1',
	  Fecha_Pregunta TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	  PRIMARY KEY (Id_Pregunta),
	  FOREIGN KEY (Id_Formulario) REFERENCES Formularios(Id_Formulario) ON DELETE CASCADE,
	  FOREIGN KEY (Id_Usuario) REFERENCES Usuarios(Id_Usuario) ON DELETE CASCADE  	
	) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

	# Crear la tabla Respuestas_Formularios
	CREATE TABLE IF NOT EXISTS Respuestas_Formularios (
	  Id_Respuesta INT NOT NULL AUTO_INCREMENT,
	  Id_HistoriaFormulario INT NOT NULL,
	  Desc_Pregunta TEXT,
	  Desc_Respuesta TEXT,
	  PRIMARY KEY (Id_Respuesta),
	  FOREIGN KEY (Id_HistoriaFormulario) REFERENCES Historial_Formularios(Id_HistoriaFormulario) ON DELETE CASCADE
	) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

	# Crear tabla Historial_Contactos
	DROP TABLE IF EXISTS `Historial_Contactos`;
	CREATE TABLE IF NOT EXISTS `Historial_Contactos` (
	  `Id_Contacto` int NOT NULL AUTO_INCREMENT,
	  `Nombre_Apellido` varchar(100) NOT NULL,
	  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
	  `Mensaje` varchar(255) NOT NULL,
	  `Fecha_Contacto` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	  PRIMARY KEY (`Id_Contacto`)
	) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

	#Insercion de datos a las tablas Tipo Usuario
	INSERT INTO `Tipo_Usuario` (`Id_TipoUsuario`, `Desc_TipoUsuario`) VALUES
	(1, 'Administrador'),
	(2, 'Cliente'),
	(3, 'Emprendedor 1'),
	(4, 'Emprendedor 2'),
	(5, 'Emprendedor 3');

	#Insercion de datos a la tabla Usuarios
	INSERT INTO `Usuarios` (`Id_Usuario`, `Id_TipoUsuario`, `Email`, `PasswordHash`, `Nombre`, `Telefono`, `Direccion`, `Fecha_Creacion`, `Cb_UsuarioActivo`) VALUES
	(1, 1, 'admin@catering.com', '$2y$10$tv8w6Eh13WxopOcdeqRvZeqVicsTj.StuyzMd/VTPlDH5gNOb0HXm', 'Catering Services', NULL, NULL, '2025-02-28 20:55:44', 1);
	
	#Insertar datos a la tabla formularios
	INSERT INTO `Formularios` (`Id_Formulario`, `Id_TipoUsuario`, `Desc_Formulario`) VALUES
	(1, 3, 'Servicio de catering'),
	(2, 4, 'Servicio de coctelería'),
	(3, 5, 'Servicio de alquiler y menaje');

	#Insertar datos de la tabla  historia_formularios
	
	#Insertar datos a la tabla Preguntas formularios

	#Insertar datos a la tabla Respuestas formularios
	
	

