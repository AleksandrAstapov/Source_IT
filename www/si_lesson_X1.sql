CREATE DATABASE eshop CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `eshop`;
CREATE TABLE  categories (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(32) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
CREATE TABLE  products (
  id int NOT NULL AUTO_INCREMENT,
  category_id int NOT NULL,
  price decimal(10,2) NOT NULL,
  name varchar(128) NOT NULL,
  description varchar(1024) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO categories(name) VALUES('Холодильники'),('Телевизоры'),('Мобильные телефоны');
INSERT INTO products(category_id, price, name, description) VALUES
  (1, 2910, 'Indesit NBS-20 AA', 'Полезный объем: 341 л; Полезный объем морозилки: 108 л; К-во компрессоров:
1 шт.; Размеры (ВхШхГ): 200 x 60 x 66 см'),
  (1, 2223, 'Liebherr T 1404', 'Полезный объем: 122 л; Полезный объем морозилки: 14 л
К-во компрессоров: 1 шт.; Размеры (ВхШхГ): 85 x 50.1 x 62 см; Цвет: белый'),
  (1, 3490, 'Whirlpool WBE 3114 TS', 'Полезный объем: 307 л; Полезный объем морозилки: 113 л; К-во
компрессоров: 1 шт.; Размеры (ВхШхГ): 175 x 59.5 x 64 см; Цвет: нержавеющая сталь');
INSERT INTO products(category_id, price, name, description) VALUES
  (2, 4520, 'Samsung UE-40EH5007', 'Дисплей: 40 ", 1920×1080; Тюнер: аналоговый, цифровой DVB-T, цифровой
DVB-C, цифровой DVB-T2; Звук: 20 Вт'),
  (2, 2355, 'Philips 22PFL4008T/12', 'Дисплей: 22 ", 1920×1080; Тюнер: аналоговый, цифровой DVB-T, цифровой
DVB-C, цифровой DVB-T2; Звук: 8 Вт'),
  (2, 3500,'Sony KDL-24W605A Black', 'Дисплей: 24 ", 1366×768; Тюнер: аналоговый, цифровой DVB-T, цифровой
DVB-C, цифровой DVB-T2, цифровой DVB-S, цифровой DVB-S2; Звук: 10 Вт'),
  (2, 1959, 'Toshiba 22L1333G', 'Дисплей: 22 ", 1920×1080; Тюнер: аналоговый, цифровой DVB-T, цифровой
DVB-C; Звук: 5 Вт');
INSERT INTO products(category_id, price, name, description) VALUES
  (3, 541, 'Nokia Asha 206 Black', 'Дисплей: 2.4 '', 240x320, TFT; Камера: 1.2 МП; Память: ПЗУ 64 Mб;
Аккумулятор: Li-Ion, 1110 мAч; Корпус: пластик'),
  (3, 5165, 'Samsung I9500 Galaxy S 4 Black', 'Дисплей: 5 '', 1920x1080, Super AMOLED; Процессор: Samsung,
ядер 8, 1600 МГц; Камера: 13 МП, вспышка, автофокус; Память: ПЗУ 16384 Mб, ОЗУ 2048 Мб; Аккумулятор:
Li-Ion, 2600 мAч; Корпус: пластик');