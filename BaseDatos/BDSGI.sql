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
);

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
);

CREATE TABLE UnidadMedida(
	idUnidadMedida			TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreUnidadMedida		VARCHAR(20)
);

CREATE TABLE LineaProducto(
	idLinea					INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreLineaProducto		VARCHAR(25)
);

CREATE TABLE Marca(
	idMarca					TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreMarca				VARCHAR(20)
);

CREATE TABLE Producto(
	idProducto				INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreProducto			VARCHAR(100)	NOT NULL,
	PrecioProducto			DECIMAL			NOT NULL,
	idMarca					TINYINT,
	idUnidadMedida			TINYINT,
	NumeroInvenProd			VARCHAR(20),
	ModeloProducto			INTEGER,
	idLinea					INTEGER,
	ColorProducto			VARCHAR(15),
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
);

CREATE TABLE Inventario(
	idInventario			INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	idProducto				INTEGER			NOT NULL,
	DetalleProducto			VARCHAR(50)		NOT NULL,
	PrecioUnidadInventario	DECIMAL			NOT NULL,
	CantidadInventario		INTEGER			NOT NULL,
	idUnidadMedida			TINYINT			NOT NULL,
	TotalInventario			DECIMAL			NOT NULL,
	INDEX (idProducto),
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
);

CREATE TABLE AjusteInventario(
	idAjusteInventario		INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	FechaAjusteInventario	DATE			NOT NULL,
	idProducto				INTEGER			NOT NULL,
	CantidadAjusteInventario			DECIMAL			NOT NULL,
	ComentarioAjusteInventario		TEXT			NOT NULL,
	UsuarioAjusteInventario			INTEGER			NOT NULL,
	INDEX (idProducto),
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
);

CREATE TABLE RegistroEntrada(
	idRegistroEntrada		INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	FechaHoraEntrada		DATETIME		NOT NULL,
	idUsuario				TINYINT			NOT NULL,
	idProducto				INTEGER			NOT NULL,
	CantidadEntrada			DECIMAL			NOT NULL,
	DetalleEntrada			VARCHAR(50)		NOT NULL,
	INDEX (idProducto),
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idUsuario),
	FOREIGN KEY(idUsuario)
		REFERENCES Usuario(idUsuario)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
);

CREATE TABLE RegistroSalida(
	idRegistroSalida		INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	FechaHoraSalida			DATETIME		NOT NULL,
	idUsuario				TINYINT			NOT NULL,
	idProducto				INTEGER			NOT NULL,
	CantidadSalida			DECIMAL			NOT NULL,
	DetalleEntrada			VARCHAR(50)		NOT NULL,
	INDEX (idProducto),
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idUsuario),
	FOREIGN KEY(idUsuario)
		REFERENCES Usuario(idUsuario)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
);

CREATE TABLE DetalleProdHojasRespons(
	idDetalleProdHojasRespons	INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	idProducto				INTEGER			NOT NULL,
	NombreProducto			INTEGER			NOT NULL,
	CantidadDetalleProdHojasRespons			DECIMAL				NOT NULL,
	INDEX (idProducto),
	FOREIGN KEY(idProducto)
		REFERENCES Producto(idProducto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
);

CREATE TABLE HojaResponsabilidad(
	idHojaResponsabilidad	INTEGER			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	FechaHojaRespons		DATE			NOT NULL,
	idPersonaEntrega		INTEGER			NOT NULL,
	idDetalleProdHojasRespons	INTEGER			NOT NULL,
	ObservacionHojaRespons	TEXT			NOT NULL,
	idPersonaRecibe				INTEGER			NOT NULL,
	INDEX (idDetalleProdHojasRespons),
	FOREIGN KEY(idDetalleProdHojasRespons)
		REFERENCES DetalleProdHojasRespons(idDetalleProdHojasRespons)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
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
);
