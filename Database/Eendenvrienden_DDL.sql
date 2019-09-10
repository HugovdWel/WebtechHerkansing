use master
drop database eendenvrienden
create database eendenvrienden
use eendenvrienden

create table Users(
username	varchar(50)		unique not null,
[password]	varchar(50)		not null,
email		varchar(50)		not null,
[user_id]	numeric(12)		not null identity(1,1)
constraint PK_USERS primary key ([user_id])
)

create table Picture(
username		varchar(50)		not null,
[name]			varchar(50)		not null,
[file_name]		varchar(50)		not null,
picture_id		numeric(12)		not null identity(1,1)
constraint PK_PICTURE primary key (picture_id)
constraint FK_PICTURE_USERNAME FOREIGN KEY (username) REFERENCES Users (username)
		on delete cascade
		on update cascade
)

create table Video(
username		varchar(50)		not null,
[name]			varchar(50)		not null,
link			varchar(255)	not null,
[description]	varchar(255)	not null,
video_id		numeric(12)		not null identity(1,1)
constraint PK_VIDEO primary key (username, link)
constraint FK_VIDEO_USERNAME FOREIGN KEY (username) REFERENCES Users (username)
		on delete cascade
		on update cascade
)

create table Recipes(
username		varchar(50)		not null,
[name]			varchar(50)		not null,
picture_id		varchar(255)	not null,
[description]	varchar(255)	not null,
constraint PK_RECIPES primary key ([name], username),
constraint FK_RECIPES_USERNAME FOREIGN KEY (username) REFERENCES Users (username)
		on delete cascade
		on update cascade
)

create table ForumPost(
username	varchar(50)		not null,
postname	varchar(50)		not null,
post		varchar(255)	not null,
[date]		date			not null,
post_id		numeric(12)		not null identity(1,1),
constraint PK_FORUMPOST primary key (post_id),
constraint FK_FORUMPOST_USERNAME FOREIGN KEY (username) REFERENCES Users (username)
		on delete cascade
		on update cascade
)

create table Comments(
username	varchar(50)		not null,
comment		varchar(255)	not null,
post_id		numeric(12)		not null,
comment_id  numeric(12)		not null identity(1,1),
[date]		date			not null,
constraint PK_COMMENTS primary key (comment_id),
constraint FK_COMMENTS_USERNAME FOREIGN KEY (username) REFERENCES Users (username),
constraint FK_COMMENTS_POST_ID FOREIGN KEY (post_id) REFERENCES ForumPost (post_id)
		on delete cascade
		on update cascade
)


-----------------------------------------------------------------------------------------
insert into Users(username, [password], email)
values  ('hugo','qwerty123', 'nvt'),
		('daniël','qwerty1234', 'nvt')
insert into Picture(username, [name], [file_name])
values	('hugo', 'cute', 'lol.jpg'),
		('daniël', 'fun', 'jk.jpg')

insert into Video(username, [name], link, [description])
values  ('hugo', 'Schattig eenden', 'www.koekje.nl', 'moet je kijken'),
		('daniël', 'Beste eend', 'www.biscuit.nl', 'moet je kijken!')

insert into Recipes
values  ('hugo', 'gefrituurde eend', '123.jpg', 'pakt een eend uit de vijver en stop hem in de frituur'),
		('daniël', 'eenden souflé', '123.jpg', 'pakt een eend uit de vijver en gooit hem in de pan')

insert into ForumPost(username, postname,post,[date])
values	('hugo', 'eenden zijn lekker', 'If you know what i mean', '2019-8-4'),
		('daniël', 'vote kick hugo', 'beetje ongepast', '2019-8-4')

insert into Comments(username, comment, post_id, [date])
values  ('hugo', 'true', 1, '2019-8-4'),
		('daniël', 'gast', 1, '2019-8-4')