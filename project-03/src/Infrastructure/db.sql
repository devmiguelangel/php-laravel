create table users(
  id int(11) not null primary key auto_increment,
  email varchar(140) not null unique key,
  password varchar(140) not null,
  first_name varchar(140) default null,
  last_name varchar(140) default null
);

insert into users values
  (1, 'djmiguelarango@gmail.com', 'secret', 'Miguel', 'MGM');

create table posts(
  id int(11) not null primary key auto_increment,
  author_id int(11) not null,
  title varchar(140) not null,
  body text not null,

  foreign key (author_id) references users(id)
);

insert into posts values
  (1, 1, 'Post #1', 'This is first post'),
  (2, 1, 'Post #2', 'This is second post'),
  (3, 1, 'Post #3', 'This is third post'),
  (4, 1, 'Post #4', 'This is fourth post'),
  (5, 1, 'Post #5', 'This is fifth post'),
  (6, 1, 'Post #6', 'This is sixth post');