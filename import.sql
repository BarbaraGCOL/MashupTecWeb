create database mashup;
use mashup;
CREATE TABLE IF NOT EXISTS localidade (
	id int not null auto_increment, 
	nome varchar (150),
	endereco varchar (250), 
	latlong varchar(100), primary key (id)
);