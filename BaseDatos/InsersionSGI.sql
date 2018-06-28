USE BDBomberos;

-- Administrador
INSERT INTO Persona (NombrePersona, ApellidoPersona, DireccionPersona,
                     DPIPersona, TelefonoPersona, FechaNacPersona, CorreoPersona)
              VALUES('Administrador', 'administrador', 'Ciudad', '1234 56789 0123',
                     '5555-5555', '1990-1-1', 'gemisdguevarav@gmail.com');
					 
INSERT INTO Usuario (NombreUsuario, ContraseniaUsuario, idPersona, PrivilegioUsuario)
              VALUES('admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrador');
			  
-- Primer usuario
INSERT INTO Persona (NombrePersona, ApellidoPersona, DireccionPersona,
                     DPIPersona, TelefonoPersona, FechaNacPersona, CorreoPersona)
			  VALUES('Gemis Daniel', 'Guevara Villeda', 'Los Amates, Izabal', '1234 56789 0123',
                     '(502) 5179-7457', '1990-1-1', 'gemisdguevarav@gmail.com');

INSERT INTO Usuario (NombreUsuario, ContraseniaUsuario, idPersona, PrivilegioUsuario)
              VALUES('gguevara', 'e60c177bc95bb0d56e2f95ac372bde51', 2, 'Superadmin');

INSERT INTO tipoentrada(NombreTipoEntrada)
				   VALUES('Donación');
				   
INSERT INTO tipoentrada(NombreTipoEntrada)
				   VALUES('Compra');