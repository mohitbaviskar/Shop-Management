CREATE DATABASE SHOP;
CREATE TABLE USERS( email varchar(25), password varchar(16), u_type varchar(10), u_number varchar(10), PRIMARY KEY(email));
CREATE TABLE STAFF_DETAILS(
    e_number varchar(10),
    designation varchar(10),
    salary int(10),
    e_name varchar(20),
    PRIMARY KEY(e_number));
CREATE TABLE CUSTOMERS(
    c_number varchar(10),
    c_name varchar(20),
    frequency int(5),
    PRIMARY KEY(c_number));
CREATE TABLE MENU(
    d_name varchar(20),
    d_description varchar(30),
    d_type varchar(15),
    d_price int(5),
    PRIMARY KEY(d_name));
CREATE TABLE ingredients(
    i_name varchar(20),
    i_quantity int(10),
    PRIMARY KEY(i_name));
CREATE TABLE transaction(
    t_id varchar(10),
    t_type varchar(10),
    t_description varchar(20),
    t_amount int(10),
    t_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(t_id));
CREATE TABLE requirements(
    d_name varchar(20),
    i_name varchar(20),
    r_quantity int(10),
    PRIMARY KEY(d_name,i_name),
    FOREIGN KEY(d_name) REFERENCES MENU(d_name)
    ON DELETE CASCADE,
    FOREIGN KEY(i_name) REFERENCES ingredients(i_name)
    ON DELETE CASCADE);
CREATE TABLE supplier_info(
    s_name varchar(20),
    s_number varchar(10),
    PRIMARY KEY(s_number));
CREATE TABLE ingredient_supplier(
    i_name varchar(20),
    s_number varchar(10),
    PRIMARY KEY(i_name,s_number),
    FOREIGN KEY(i_name) REFERENCES ingredients(i_name)
    ON DELETE CASCADE,
    FOREIGN KEY(s_number) REFERENCES supplier_info(s_number)
    ON DELETE CASCADE);
CREATE TABLE purchase(
    i_name varchar(20),
    p_quantity int(5),
    t_id varchar(10),
    p_amount int(10),
    p_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    s_number varchar(10),
    PRIMARY KEY(i_name,t_id),
    FOREIGN KEY(i_name) REFERENCES ingredients(i_name)
    ON DELETE CASCADE,
    FOREIGN KEY(t_id) REFERENCES transaction(t_id)
    ON DELETE CASCADE);
CREATE TABLE orders(
    d_name varchar(20),
    o_quantity int(5),
    t_id varchar(10),
    o_amount int(10),
    o_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    c_number varchar(10),
    PRIMARY KEY(d_name,t_id),
    FOREIGN KEY(d_name) REFERENCES menu(d_name)
    ON DELETE CASCADE,
    FOREIGN KEY(t_id) REFERENCES transaction(t_id)
    ON DELETE CASCADE);

