DROP DATABASE IF EXISTS amazingCustom;

create database amazingCustom;
use amazingCustom;

-- criação de tabelas

create table ADM(
    nome_adm varchar(50) not null,
    senha_adm varchar(50) not null
);

create table MODELO(
    cod_modelo int primary key auto_increment,
    nome_modelo varchar(50) not null,
    valor_modelo decimal(6,2) not null,
    nomeArq_modelo varchar(500) not null
);

create table FRAGRANCIA(
    cod_frag int primary key auto_increment,
    nome_frag varchar(50) not null,
    desc_frag varchar(150)
);

create table CLIENTE(
    cod_cli int primary key auto_increment,
    fkcod_endereco int,
    nome varchar(50) not null,
    cod_rastreamento varchar(50) not null,
    tel varchar(40) not null,
    email varchar(100) not null
);

create table PEDIDO(
    cod_ped int primary key auto_increment,
    fkcod_cli int,
    frete decimal(8,2) not null,
    valor decimal(8,2) not null,
    data_ped date not null,
    valor_total decimal(8,2) not null,
    estado_pedido int not null
);

create table PRODUTO(
    cod_prod int primary key auto_increment,
    fkcod_frag int,
    fkcod_modelo int
);

create table PEDIDO_PRODUTO(
    fkcod_ped int,
    fkcod_prod int,
    sub_total decimal(8,2) not null,
    qtd_prod int not null
);

create table ENDERECO(
    cod_endereco int primary key auto_increment,
    cep varchar(10) not null,
    logradouro varchar(70) not null,
    num int not null,
    cidade varchar(50) not null,
    bairro varchar(70) not null,
    uf char(2) not null,
    complemento varchar(60)
);

-- relacionamento (chaves estrangeiras)

alter table PEDIDO
add constraint fk_pedido_cliente
foreign key (fkcod_cli)
references CLIENTE(cod_cli);

alter table PRODUTO
add constraint fk_produto_fragrancia
foreign key (fkcod_frag)
references FRAGRANCIA(cod_frag);

alter table PRODUTO
add constraint fk_produto_modelo
foreign key (fkcod_modelo)
references MODELO(cod_modelo);  

alter table PEDIDO_PRODUTO
add constraint fk_pedidoProduto_pedido
foreign key (fkcod_ped)
references PEDIDO(cod_ped);

alter table PEDIDO_PRODUTO
add constraint fk_pedidoProduto_produto
foreign key (fkcod_prod)
references PRODUTO(cod_prod);

alter table CLIENTE
add constraint fk_endereco_cliente
foreign key (fkcod_endereco)
references ENDERECO(cod_enereco);

INSERT INTO adm(nome_adm,senha_adm) VALUES("123","123");

-- INSERTS PARA APRESENTAÇÃO EPA
INSERT INTO MODELO VALUES (0, "Brasão 1", 3.50, "brasão 1.jpg");
INSERT INTO MODELO VALUES (0, "Redondo Meia Lua", 8.00, "redondo 5 meia lua.jpg");
INSERT INTO MODELO VALUES (0, "Diamante 1", 5.50, "diamante 1.jpg");
INSERT INTO MODELO VALUES (0, "Brasão 2", 5.00, "brasão 2.jpg");
INSERT INTO MODELO VALUES (0, "Redondo", 5.50, "redondo 3.jpg");
INSERT INTO MODELO VALUES (0, "Brasão 3", 5.00, "brasão 3.jpg");
INSERT INTO MODELO VALUES (0, "Octógono", 5.50, "octogono.jpg");

INSERT INTO FRAGRANCIA VALUES(0, "Lorem ipsum", "Nibh mauris cursus mattis molestie a iaculis.");
INSERT INTO FRAGRANCIA VALUES(0, "Lord", "Aroma com tom amadeirado.");
INSERT INTO FRAGRANCIA VALUES(0, "Lorem ipsum", "Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Condimentum vitae sapien pellentesque habitant morbi tristique senectus et netus.");
INSERT INTO FRAGRANCIA VALUES(0, "Vanilla", "Aroma doce.");
INSERT INTO FRAGRANCIA VALUES(0, "Flor", "Cheiro de lavanda.");

INSERT INTO ENDERECO VALUES(0, "04004-040", "Avenida Bernardino de Campos", 100, "São Paulo", "Paraíso", "SP", "até 250 - lado par");
INSERT INTO ENDERECO VALUES(0, "18270-020", "Praça Adelaide Guedes", 01, "Tatuí", "Centro", "SP", "");

INSERT INTO CLIENTE VALUES(0, 1, "Beatriz", "AM9030", "(11) 90000-9999/(15) 98888-1111", "beatriz@gmail.com");
INSERT INTO CLIENTE VALUES(0, 2, "Pedro Aguiar", "AM7777", "(15) 94444-2222", "aguiarpedro@gmail.com");

INSERT INTO PEDIDO VALUES(0, 1, 15.50, 800, "2023-11-30", 815.50, 2);
INSERT INTO PEDIDO VALUES(0, 2, 10, 825, "2024-01-10", 835, 1);

INSERT INTO PRODUTO VALUES(0, 2, 2);
INSERT INTO PRODUTO VALUES(0, 4, 3);

INSERT INTO PEDIDO_PRODUTO VALUES(1, 1, 800, 100);
INSERT INTO PEDIDO_PRODUTO VALUES(2, 2, 825, 150);