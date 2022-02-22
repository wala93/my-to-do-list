
CREATE TABLE if not exists users (
    id int  ,
   first_name varchar (255),
    last_name varchar (255),
    email varchar (255),
    username varchar (255),
   password varchar (255),
   register_date timestamp
)
;
CREATE TABLE if not exists lists(
    id int  ,
   list_name varchar (255),
   list_body text ,
    list_user varchar (255),
   register_date timestamp
)
;
CREATE TABLE if not exists tasks(
    id int  ,
   task_name varchar (255),
   task_body text ,
    list_id int,
  due_date date,
  create_date timestamp,
  is_complete tinyint(1)
)