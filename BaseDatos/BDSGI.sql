DROP DATABASE BDBomberos;

CREATE OR REPLACE DATABASE BDBomberos;

USE BDBomberos;

CREATE OR REPLACE TABLE Persona(
	idPersona				INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombrePersona			VARCHAR(50)		NOT NULL,
	ApellidoPersona			VARCHAR(50)		NOT NULL,
	DireccionPersona		VARCHAR(75)		NOT NULL,
	DPIPersona				VARCHAR(15)		NOT NULL,
	TelefonoPersona			VARCHAR(20),
	FechaNacPersona			DATE			NOT NULL,
	CorreoPersona			VARCHAR(50)
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Usuario(
	idUsuario				TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreUsuario			VARCHAR(10)		NOT NULL,
	ContraseniaUsuario		Text			NOT NULL,
	idPersona				INTEGER,
	PrivilegioUsuario		VARCHAR(15)		NOT NULL,
	INDEX (idPersona),
	FOREIGN	KEY	(idPersona)
        REFERENCES Persona(idPersona)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE UnidadMedida(
	idUnidadMedida			TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreUnidadMedida		VARCHAR(20)
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE TipoEntrada(
	idTipoEntrada			TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreTipoEntrada		VARCHAR(20)
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE LineaProducto(
	idLinea					INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreLineaProducto		VARCHAR(25)
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Marca(
	idMarca					TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreMarca				VARCHAR(20)
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Producto(
	idProducto				INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	SerieProducto			VARCHAR(30),
	NombreProducto			VARCHAR(200)	NOT NULL,
	ChasisProducto			VARCHAR(30),
	MotorProducto			VARCHAR(30),
	idMarca					TINYINT,
	idUnidadMedida			TINYINT,
	NumeroInvenProd			VARCHAR(20),
	ModeloProducto			VARCHAR(20),
	idLinea					INTEGER,
	ColorProducto			VARCHAR(15),
	PrecioProducto			DECIMAL(10,2),
	EstadoProducto			VARCHAR(20),
	INDEX (idMarca),
	FOREIGN KEY(idMarca)
		REFERENCES Marca(idMarca)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idUnidadMedida),
	FOREIGN KEY(idUnidadMedida)
		REFERENCES UnidadMedida(idUnidadMedida)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idLinea),
	FOREIGN KEY(idLinea)
		REFERENCES LineaProducto(idLinea)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Inventario(
	idInventario			INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	idProducto				INTEGER			NOT NULL,
	CantidadInventario		INTEGER			NOT NULL,
	INDEX (idProducto),
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE AjusteInventario(
	idAjusteInventario		INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	FechaHoraAjusteInventario	DATETIME		NOT NULL,
	idProducto				INTEGER			NOT NULL,
	CantidadAjusteInventario			DECIMAL(10,2)			NOT NULL,
	ComentarioAjusteInventario		TEXT			NOT NULL,
	UsuarioAjusteInventario			VARCHAR(10)			NOT NULL,
	INDEX (idProducto),
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE RegistroEntrada(
	idRegistroEntrada		INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	FechaHoraEntrada		DATETIME		NOT NULL,
	UsuarioEntrada			VARCHAR(10)		NOT NULL,
	idProducto				INTEGER			NOT NULL,
	CantidadEntrada			DECIMAL(10,2)			NOT NULL,
	DetalleEntrada			VARCHAR(150)	NOT NULL,
	idTipoEntrada			TINYINT			NOT NULL,
	INDEX (idProducto),
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idTipoEntrada),
	FOREIGN KEY(idTipoEntrada)
		REFERENCES TipoEntrada(idTipoEntrada)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE RegistroSalida(
	idRegistroSalida		INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	FechaHoraSalida			DATETIME		NOT NULL,
	UsuarioSalida			VARCHAR(10)		NOT NULL,
	idProducto				INTEGER			NOT NULL,
	CantidadSalida			DECIMAL(10,2)			NOT NULL,
	DetalleSalida			VARCHAR(150)	NOT NULL,
	INDEX (idProducto),
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE HojaResponsabilidad(
	idHojaResponsabilidad	INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	FechaHoraHojaRespons		DATETIME			NOT NULL,
	idPersonaEntrega		INTEGER			NOT NULL,
	ObservacionHojaRespons	TEXT			NOT NULL,
	idPersonaRecibe				INTEGER			NOT NULL,
	INDEX (idPersonaEntrega),
	FOREIGN KEY(idPersonaEntrega)
		REFERENCES Persona(idPersona)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idPersonaRecibe),
	FOREIGN KEY(idPersonaRecibe)
		REFERENCES Persona(idPersona)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE DetalleProdHojasRespons(
	idDetalleProdHojasRespons	INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	idHojaResponsabilidad	INTEGER			NOT NULL,
	idProducto				INTEGER			NOT NULL,
	CantidadDetalleProdHojasRespons			DECIMAL(10,2)				NOT NULL,
	INDEX (idHojaResponsabilidad),
	FOREIGN KEY(idHojaResponsabilidad)
		REFERENCES HojaResponsabilidad(idHojaResponsabilidad)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idProducto),
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Kardex(
	idKardex				INTEGER			NOT NULL			PRIMARY KEY				AUTO_INCREMENT,
	FechaKardex				TIMESTAMP		NOT NULL			DEFAULT CURRENT_TIMESTAMP,
	idProducto				INTEGER			NOT NULL,
	DebeKardex				INTEGER,
	HaberKardex				INTEGER,
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;