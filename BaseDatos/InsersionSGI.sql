USE BDBomberos;

-- Administrador
INSERT INTO Persona (NombrePersona, ApellidoPersona, DireccionPersona,
                     DPIPersona, TelefonoPersona, FechaNacPersona, CorreoPersona)
              VALUES('Administrador', 'administrador', 'Ciudad', '1234 56789 0123',
                     '5555-5555', '1990-1-1', 'admin@site.com');

INSERT INTO Usuario (NombreUsuario, ContraseniaUsuario, idPersona, PrivilegioUsuario)
              VALUES('admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrador');
			  
-- Primer usuario
INSERT INTO Persona (NombrePersona, ApellidoPersona, DireccionPersona,
                     DPIPersona, TelefonoPersona, FechaNacPersona, CorreoPersona)
              VALUES('Gemis Daniel', 'Guevara Villeda', 'Ciudad', '1234 56789 0123',
                     '5555-5555', '1990-1-1', 'gguevara@site.com');

INSERT INTO Usuario (NombreUsuario, ContraseniaUsuario, idPersona, PrivilegioUsuario)
              VALUES('gguevara', 'e60c177bc95bb0d56e2f95ac372bde51', 1, 'Administrador');

INSERT INTO tipoentrada(NombreTipoEntrada)
				   VALUES('Donación');
				   
INSERT INTO tipoentrada(NombreTipoEntrada)
				   VALUES('Compra');