--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.1.13.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 21.05.2016 14:19:36
-- Версия сервера: 5.6.29-log
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE rasp;

--
-- Описание для таблицы camps
--
DROP TABLE IF EXISTS camps;
CREATE TABLE camps (
  id_camp INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код корпуса',
  adress VARCHAR(40) NOT NULL COMMENT 'адрес',
  PRIMARY KEY (id_camp)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 5461
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Корпуса';

--
-- Описание для таблицы disc
--
DROP TABLE IF EXISTS disc;
CREATE TABLE disc (
  id_disc INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код дисциплины',
  nd VARCHAR(25) NOT NULL COMMENT 'название дисциплины',
  PRIMARY KEY (id_disc),
  UNIQUE INDEX nd (nd)
)
ENGINE = INNODB
AUTO_INCREMENT = 9
AVG_ROW_LENGTH = 5461
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Дисциплины';

--
-- Описание для таблицы dolzhnosti
--
DROP TABLE IF EXISTS dolzhnosti;
CREATE TABLE dolzhnosti (
  id_d INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код должности',
  d VARCHAR(25) NOT NULL COMMENT 'должность',
  PRIMARY KEY (id_d),
  UNIQUE INDEX d (d)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 8192
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'должности';

--
-- Описание для таблицы form_study
--
DROP TABLE IF EXISTS form_study;
CREATE TABLE form_study (
  id_fo INT(1) NOT NULL AUTO_INCREMENT COMMENT 'код формы обучения',
  fo VARCHAR(25) NOT NULL COMMENT 'форма обучения',
  PRIMARY KEY (id_fo),
  UNIQUE INDEX fo (fo)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Формы обучения';

--
-- Описание для таблицы specs
--
DROP TABLE IF EXISTS specs;
CREATE TABLE specs (
  id_spec INT(2) NOT NULL AUTO_INCREMENT COMMENT 'код специальности',
  spec VARCHAR(35) NOT NULL COMMENT 'специальность',
  PRIMARY KEY (id_spec),
  UNIQUE INDEX spec (spec)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 3276
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Специальности';

--
-- Описание для таблицы vid_zanyatii
--
DROP TABLE IF EXISTS vid_zanyatii;
CREATE TABLE vid_zanyatii (
  id_vz INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код вида занятий',
  vz VARCHAR(25) NOT NULL COMMENT 'вид занятий',
  PRIMARY KEY (id_vz),
  UNIQUE INDEX vz (vz)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Виды занятий';

--
-- Описание для таблицы lecture_rooms
--
DROP TABLE IF EXISTS lecture_rooms;
CREATE TABLE lecture_rooms (
  id_lr INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код аудитории',
  num_lr INT(11) NOT NULL COMMENT 'номер аудитории',
  id_camp INT(11) NOT NULL COMMENT 'код корпуса',
  seats INT(11) NOT NULL COMMENT 'количество мест',
  PRIMARY KEY (id_lr),
  INDEX id_camp (id_camp),
  CONSTRAINT lecture_rooms_ibfk_1 FOREIGN KEY (id_camp)
    REFERENCES camps(id_camp) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 2730
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Аудитории';

--
-- Описание для таблицы teachers
--
DROP TABLE IF EXISTS teachers;
CREATE TABLE teachers (
  id_t INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код преподавателя',
  surname VARCHAR(25) NOT NULL COMMENT 'Фамилия',
  name VARCHAR(25) NOT NULL COMMENT 'Имя',
  middlename VARCHAR(25) DEFAULT NULL COMMENT 'Отчество',
  id_d INT(11) NOT NULL COMMENT 'код должности',
  PRIMARY KEY (id_t),
  INDEX id_d (id_d),
  CONSTRAINT teachers_ibfk_1 FOREIGN KEY (id_d)
    REFERENCES dolzhnosti(id_d) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 8192
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'преподаватели';

--
-- Описание для таблицы ucheb_pl
--
DROP TABLE IF EXISTS ucheb_pl;
CREATE TABLE ucheb_pl (
  id_plan INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код плана',
  id_spec INT(11) NOT NULL COMMENT 'код специальности',
  id_fo INT(11) NOT NULL COMMENT 'код формы обучения',
  gn YEAR(4) DEFAULT NULL COMMENT 'год набора',
  PRIMARY KEY (id_plan),
  INDEX id_fo (id_fo),
  INDEX id_spec (id_spec),
  CONSTRAINT ucheb_pl_ibfk_1 FOREIGN KEY (id_spec)
    REFERENCES specs(id_spec) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT ucheb_pl_ibfk_2 FOREIGN KEY (id_fo)
    REFERENCES form_study(id_fo) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 2730
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Учебный план';

--
-- Описание для таблицы disc_spec
--
DROP TABLE IF EXISTS disc_spec;
CREATE TABLE disc_spec (
  id_ds INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код дисциплины специальности',
  id_disc INT(11) NOT NULL COMMENT 'код дисциплины',
  id_plan INT(11) NOT NULL COMMENT 'код плана',
  PRIMARY KEY (id_ds),
  INDEX id_disc (id_disc),
  INDEX id_plan (id_plan),
  CONSTRAINT disc_spec_ibfk_1 FOREIGN KEY (id_disc)
    REFERENCES disc(id_disc) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT disc_spec_ibfk_2 FOREIGN KEY (id_plan)
    REFERENCES ucheb_pl(id_plan) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 10
AVG_ROW_LENGTH = 1820
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'дисциплины специальности';

--
-- Описание для таблицы groups
--
DROP TABLE IF EXISTS groups;
CREATE TABLE groups (
  id_gr INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код группы',
  id_plan INT(11) NOT NULL COMMENT 'код плана',
  ng VARCHAR(25) NOT NULL COMMENT 'номер группы',
  ks INT(11) NOT NULL COMMENT 'количество студентов',
  PRIMARY KEY (id_gr),
  INDEX id_plan (id_plan),
  UNIQUE INDEX ng (ng),
  CONSTRAINT groups_ibfk_1 FOREIGN KEY (id_plan)
    REFERENCES ucheb_pl(id_plan) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 2730
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Группы';

--
-- Описание для таблицы chasi_disc
--
DROP TABLE IF EXISTS chasi_disc;
CREATE TABLE chasi_disc (
  id_cd INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код часов дисциплин',
  id_ds INT(11) NOT NULL COMMENT 'код дисциплины специальности',
  id_vz INT(11) NOT NULL COMMENT 'код вида занятий',
  chasi INT(11) NOT NULL COMMENT 'часы',
  PRIMARY KEY (id_cd),
  INDEX id_ds (id_ds),
  INDEX id_vz (id_vz),
  CONSTRAINT chasi_disc_ibfk_1 FOREIGN KEY (id_ds)
    REFERENCES disc_spec(id_ds) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT chasi_disc_ibfk_2 FOREIGN KEY (id_vz)
    REFERENCES vid_zanyatii(id_vz) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 12
AVG_ROW_LENGTH = 2730
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Часы дисциплин';

--
-- Описание для таблицы teacher_gr
--
DROP TABLE IF EXISTS teacher_gr;
CREATE TABLE teacher_gr (
  id_tg INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код преподавателя группы',
  id_gr INT(11) NOT NULL COMMENT 'код группы',
  id_cd INT(11) NOT NULL COMMENT 'код часов дисциплин',
  id_t INT(11) NOT NULL COMMENT 'код преподавателя',
  PRIMARY KEY (id_tg),
  INDEX id_cd (id_cd),
  INDEX id_gr (id_gr),
  INDEX id_t (id_t),
  CONSTRAINT teacher_gr_ibfk_1 FOREIGN KEY (id_gr)
    REFERENCES groups(id_gr) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT teacher_gr_ibfk_2 FOREIGN KEY (id_cd)
    REFERENCES chasi_disc(id_cd) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT teacher_gr_ibfk_3 FOREIGN KEY (id_t)
    REFERENCES teachers(id_t) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 12
AVG_ROW_LENGTH = 2730
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Преподаватель группы';

--
-- Описание для таблицы raspisanie
--
DROP TABLE IF EXISTS raspisanie;
CREATE TABLE raspisanie (
  id_zan INT(11) NOT NULL AUTO_INCREMENT COMMENT 'код занятия',
  id_tg INT(11) NOT NULL COMMENT 'код преподавателя группы',
  id_lr INT(11) NOT NULL COMMENT 'код аудитории',
  date_zan DATE DEFAULT NULL,
  time_start TIME DEFAULT NULL COMMENT 'время начала',
  count_hours INT(11) NOT NULL COMMENT 'количество часов',
  PRIMARY KEY (id_zan),
  INDEX id_lr (id_lr),
  INDEX id_tg (id_tg),
  CONSTRAINT raspisanie_ibfk_1 FOREIGN KEY (id_tg)
    REFERENCES teacher_gr(id_tg) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT raspisanie_ibfk_2 FOREIGN KEY (id_lr)
    REFERENCES lecture_rooms(id_lr) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 33
AVG_ROW_LENGTH = 2730
CHARACTER SET cp1251
COLLATE cp1251_general_ci
COMMENT = 'Рассписание';

-- 
-- Вывод данных для таблицы camps
--
INSERT INTO camps VALUES
(1, 'ул. Скрыганова 14');

-- 
-- Вывод данных для таблицы disc
--
INSERT INTO disc VALUES
(1, 'ASP.NET'),
(8, 'C++'),
(6, 'HTML'),
(2, 'Java'),
(7, 'Javascript'),
(5, 'MySQL'),
(3, 'PHP');

-- 
-- Вывод данных для таблицы dolzhnosti
--
INSERT INTO dolzhnosti VALUES
(2, 'Доцент'),
(4, 'Преподаватель'),
(1, 'Профессор');

-- 
-- Вывод данных для таблицы form_study
--
INSERT INTO form_study VALUES
(3, 'вечернее'),
(2, 'заочное'),
(1, 'очное');

-- 
-- Вывод данных для таблицы specs
--
INSERT INTO specs VALUES
(1, '.NET Developer'),
(5, 'C++ developer'),
(2, 'java developer'),
(3, 'php developer'),
(4, 'web developer');

-- 
-- Вывод данных для таблицы vid_zanyatii
--
INSERT INTO vid_zanyatii VALUES
(3, 'вебинар'),
(2, 'лекция'),
(1, 'семинар');

-- 
-- Вывод данных для таблицы lecture_rooms
--
INSERT INTO lecture_rooms VALUES
(1, 52, 1, 40),
(2, 53, 1, 55),
(3, 54, 1, 50),
(4, 55, 1, 40),
(5, 56, 1, 35),
(6, 57, 1, 30);

-- 
-- Вывод данных для таблицы teachers
--
INSERT INTO teachers VALUES
(1, 'Пушкин', 'Александр', 'Сергеевич', 1),
(2, 'Васечкин', 'Василий', 'Викторович', 2),
(3, 'Иванов', 'Иван', 'Иванович', 1);

-- 
-- Вывод данных для таблицы ucheb_pl
--
INSERT INTO ucheb_pl VALUES
(1, 1, 1, 2016),
(2, 2, 1, 2016),
(3, 3, 1, 2016),
(4, 4, 2, 2016),
(5, 5, 3, 2016),
(6, 1, 3, 2016);

-- 
-- Вывод данных для таблицы disc_spec
--
INSERT INTO disc_spec VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 6, 4),
(5, 5, 1),
(6, 5, 2),
(7, 5, 3),
(8, 7, 4),
(9, 8, 5);

-- 
-- Вывод данных для таблицы groups
--
INSERT INTO groups VALUES
(1, 1, 'N1', 12),
(2, 2, 'J1', 16),
(3, 3, 'P1', 15),
(4, 4, 'web1', 16),
(5, 5, 'C1', 13),
(6, 6, 'N2', 17);

-- 
-- Вывод данных для таблицы chasi_disc
--
INSERT INTO chasi_disc VALUES
(1, 1, 2, 32),
(2, 2, 1, 44),
(3, 3, 3, 30),
(4, 4, 1, 46),
(5, 5, 2, 30),
(6, 6, 3, 26),
(7, 7, 2, 20),
(8, 8, 2, 20),
(9, 9, 1, 30),
(10, 3, 2, 24),
(11, 7, 1, 20);

-- 
-- Вывод данных для таблицы teacher_gr
--
INSERT INTO teacher_gr VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 3, 2),
(4, 4, 4, 3),
(5, 1, 5, 2),
(6, 2, 6, 2),
(7, 3, 7, 2),
(8, 4, 8, 3),
(9, 5, 9, 1),
(10, 3, 10, 2),
(11, 3, 11, 2);

-- 
-- Вывод данных для таблицы raspisanie
--
INSERT INTO raspisanie VALUES
(1, 10, 6, '2016-05-11', '9:30:0', 3),
(2, 7, 6, '2016-05-11', '12:30:0', 3),
(3, 2, 4, '2016-05-11', '9:30:0', 3),
(4, 1, 3, '2016-05-11', '15:30:0', 3),
(5, 5, 3, '2016-05-11', '9:30:0', 3),
(6, 4, 2, '2016-05-11', '15:30:0', 3),
(7, 8, 2, '2016-05-11', '18:30:0', 3),
(8, 9, 5, '2016-05-11', '18:30:0', 3),
(9, 10, 6, '2016-05-12', '9:30:0', 3),
(10, 7, 6, '2016-05-12', '12:30:0', 3),
(11, 2, 4, '2016-05-12', '9:30:0', 3),
(12, 1, 3, '2016-05-12', '15:30:0', 3),
(13, 5, 3, '2016-05-12', '9:30:0', 3),
(14, 4, 2, '2016-05-12', '15:30:0', 3),
(15, 8, 2, '2016-05-12', '18:30:0', 3),
(16, 9, 5, '2016-05-12', '18:30:0', 3),
(17, 10, 6, '2016-05-13', '9:30:0', 3),
(18, 7, 6, '2016-05-13', '12:30:0', 3),
(19, 2, 4, '2016-05-13', '9:30:0', 3),
(20, 1, 3, '2016-05-13', '15:30:0', 3),
(21, 5, 3, '2016-05-13', '9:30:0', 3),
(22, 4, 2, '2016-05-13', '15:30:0', 3),
(23, 8, 2, '2016-05-13', '18:30:0', 3),
(24, 9, 5, '2016-05-13', '18:30:0', 3),
(25, 10, 6, '2016-05-14', '9:30:0', 3),
(26, 7, 6, '2016-05-14', '12:30:0', 3),
(27, 2, 4, '2016-05-14', '9:30:0', 3),
(28, 1, 3, '2016-05-14', '15:30:0', 3),
(29, 5, 3, '2016-05-14', '9:30:0', 3),
(30, 4, 2, '2016-05-14', '15:30:0', 3),
(31, 8, 2, '2016-05-14', '18:30:0', 3),
(32, 9, 5, '2016-05-14', '18:30:0', 3);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;