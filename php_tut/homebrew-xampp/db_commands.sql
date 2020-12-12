--- Use contents of /var/www/html/sql/create_tables.sql
GRANT 
SELECT
( Host, User, Select_priv, Insert_priv, Update_priv, Delete_priv, Create_priv, Drop_priv, Reload_priv, Shutdown_priv, Process_priv, File_priv, Grant_priv, References_priv, Index_priv, Alter_priv, Show_db_priv, Super_priv, Create_tmp_table_priv, Lock_tables_priv, Execute_priv, Repl_slave_priv, Repl_client_priv ) 
   ON mysql.user TO 'pma'@'localhost';
GRANT 
SELECT
   ON mysql.db TO 'pma'@'localhost';
GRANT 
SELECT
(Host, Db, User, Table_name, Table_priv, Column_priv) 
   ON mysql.tables_priv TO 'pma'@'localhost';
GRANT 
SELECT
,
   INSERT,
   UPDATE
,
      DELETE
         ON phpmyadmin.* TO 'pma'@'localhost';

---
create table employees (id varchar(1000) primary key, name varchar(1000) not null, pos varchar(1000) not null);
---
INSERT INTO `employees` (`id`, `name`, `pos`) VALUES
('1234', 'test_employee', 'QA'),
('1456', 'sleep-deprived sally', 'NOC engineer'),
('1764', 'localhost', 'SRE');