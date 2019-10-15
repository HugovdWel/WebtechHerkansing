use master
GO
drop database eendenvrienden
GO
create database eendenvrienden
GO
use eendenvrienden
GO

create table Users(
username	varchar(50)		unique not null,
[password]	varchar(100)		not null,
email		varchar(50)		not null,
[user_id]	numeric(12)		not null identity(1,1)
constraint PK_USERS primary key ([user_id])
)

create table Picture(
[user_id]		numeric(12)		not null,
[name]			varchar(50)		not null,
[file_name]		varchar(50)		not null,
picture_id		numeric(12)		not null identity(1,1)
constraint PK_PICTURE primary key (picture_id)
constraint FK_PICTURE_USER_ID FOREIGN KEY ([user_id]) REFERENCES Users ([user_id])
		on delete cascade
		on update cascade
)

create table Video(
[user_id]		numeric(12)		not null,
[name]			varchar(50)		not null,
link			varchar(255)	not null,
[description]	varchar(255)	not null,
video_id		numeric(12)		not null identity(1,1)
constraint PK_VIDEO primary key (video_id)
constraint FK_VIDEO_USER_ID FOREIGN KEY ([user_id]) REFERENCES Users ([user_id])
		on delete cascade
		on update cascade
)

create table Recipes(
[user_id]		numeric(12)		not null,
[name]			varchar(50)		not null,
picture_id		varchar(255)	not null,
[description]	varchar(255)	not null,
recipes_id		numeric(12)		not null identity(1,1)
constraint PK_RECIPES primary key (recipes_id),
constraint FK_RECIPES_USER_ID FOREIGN KEY ([user_id]) REFERENCES Users ([user_id])
		on delete cascade
		on update cascade
)

create table ForumPost(
[user_id]	numeric(12)		not null,
postname	varchar(50)		not null,
post		varchar(255)	not null,
[date]		date			not null,
post_id		numeric(12)		not null identity(1,1),
constraint PK_FORUMPOST primary key (post_id),
constraint FK_FORUMPOST_USER_ID FOREIGN KEY ([user_id]) REFERENCES Users ([user_id])
		on delete cascade
		on update cascade
)

create table Comments(
[user_id]	numeric(12)		not null,
comment		varchar(255)	not null,
post_id		numeric(12)		not null,
comment_id  numeric(12)		not null identity(1,1),
[date]		date			not null,
constraint PK_COMMENTS primary key (comment_id),
constraint FK_COMMENTS_USER_ID FOREIGN KEY ([user_id]) REFERENCES Users ([user_id]),
constraint FK_COMMENTS_POST_ID FOREIGN KEY (post_id) REFERENCES ForumPost (post_id)
		on delete cascade
		on update cascade
)
GO

-----------------------------------------------------------------------------------------
insert into Users(username, [password], email)
values  ('hugo','$2y$10$AChoygtdi.Esgck8KDxFnOjy5YqcsdIXQm03BrG6QP9.okhng9YsW', 'hugo00.nogwat@gmail.com'), /*qwerty123*/
		('daniël','$2y$10$MnwEtE/YbW.tTVft3AkQFellltTfhbQhXErmnDEtI9P/1CNBDwlo2', 'dj.vervloed@gmail.com') /*qwerty1234*/
insert into Picture([user_id], [name], [file_name])
values	(1, 'cute', 'lol.jpg'),
		(2, 'fun', 'jk.jpg')

insert into Video([user_id], [name], link, [description])
values  (1, 'Schattig eenden', 'www.koekje.nl', 'moet je kijken'),
		(2, 'Beste eend', 'www.biscuit.nl', 'moet je kijken!')
		/*
insert into Recipes([user_id], [name], picture_id, [description])
values  (1, 'gefrituurde eend', '123.jpg', 'pakt een eend uit de vijver en stop hem in de frituur'),
		(2, 'eenden souflé', '123.jpg', 'pakt een eend uit de vijver en gooit hem in de pan')
		*/
insert into ForumPost([user_id], postname, post,[date])
values	(1, 'eenden zijn lekker', 'If you know what i mean', '2019-8-4'),
		(2, 'vote kick hugo', 'beetje ongepast', '2019-8-4')

insert into Comments([user_id], comment, post_id, [date])
values  (1, 'true', 1, '2019-8-4'),
		(2, 'gast', 1, '2019-8-4')
