SET NAMES utf8;

create table paginas_estaticas (
  id int(11) auto_increment primary key,
  slug varchar(40) unique,
  titulo varchar(140),
  conteudo text,
  imagem varchar(140)
) character set utf8 collate utf8_general_ci;

create table contato (
  id int(11) auto_increment primary key,
  email varchar(140)
) character set utf8 collate utf8_general_ci;

create table categorias (
  id int(11) auto_increment primary key,
  nome varchar(40),
  descricao text,
  slug varchar(40) unique
) character set utf8 collate utf8_general_ci;

create table cursos (
  id int(11) auto_increment primary key,
  categoria_id int(11) references categorias (id),
  nome varchar(40),
  descricao text,
  horas int(11),
  coordenador varchar(40),
  slug varchar(40) unique
) character set utf8 collate utf8_general_ci;

create table usuarios (
  id int(11) auto_increment primary key,
  login varchar(40) unique,
  senha varchar(40)
) character set utf8 collate utf8_general_ci;