create database BlackAndWhite CHARSET = UTF8 COLLATE = utf8_general_ci;

use BlackAndWhite;

create table tipo_usuario(
idTipoUser INT(1) unsigned auto_increment primary key,
descTipoUser varchar(7) not null
) engine = InnoDB;

create table usuario(
nomeUser varchar(100) not null default '',
cpfUser varchar(11) not null primary key,
emailUser varchar(100) not null,
senhaUser varchar(35) not null,
idTipoUser int(1) unsigned not null,
constraint FK_idTipoUser foreign key (idTipoUser) references tipo_usuario(idTipoUser)
) engine = InnoDB;

create table tipo_produto(
idTipoProd int unsigned auto_increment primary key,
descTipoProd varchar(45) not null default ''
) engine = InnoDB;

create table produto(
idProd int unsigned auto_increment primary key,
descProd varchar(160) not null,
qtdProd int not null,
infoAddProd text(5000),
precoUnit double unsigned not null,
idTipoProd int unsigned not null,
CONSTRAINT FK_idTipoProd FOREIGN KEY (idTipoProd) REFERENCES tipo_produto(idTipoProd)
) engine = InnoDB ;

create table pedido(
idPedido int unsigned auto_increment primary key,
dataPedido datetime default now(),
valorTotal double unsigned not null,
cpfUser char(11) not null,
constraint FK_cpfUser foreign key (cpfUser) references usuario(cpfUser)
) engine = InnoDB;

create table pedido_item(
idPedidoItem int unsigned auto_increment primary key,
qtdItem int unsigned not null,
precoItem double unsigned not null,
valorTotalItem double unsigned not null,
idPedido int unsigned not null,
idProd int unsigned not null,
constraint FK_idPedido foreign key (idPedido) references pedido(idPedido),
constraint FK_idProd foreign key (idProd) references produto(idProd)
) engine = InnoDB;