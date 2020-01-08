use master
GO
drop database if exists eendenvrienden
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
[user_id]		numeric(12)		not null default(1),
[name]			varchar(50)		not null,
link			varchar(1000)	not null,
[description]	varchar(255)	not null,
category		varchar(255)	not null,
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
post		varchar(255)	not null default ' ',
[date]		date			null default GETDATE(),
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
[date]		date			null default GETDATE(),
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

insert into Video([user_id], [name], link, [description], category)
values  (1, 'Schattig eenden', 'https://www.youtube.com/embed/ylV2Qsf9npw', 'een familie eenden.', 'eendenObserveren'),
		(2, 'Deze video is niet geschikt voor deze website.', 'https://www.youtube.com/embed/w4ZK6rB4TEo', '*CENSUUR*', 'voortplantingsgedrag'),/*https://www.youtube.com/embed/ip94gSqZDi8 */
		(1, 'Mensen en eenden', 'https://www.youtube.com/embed/hckQEUS0ZxM', 'Deze mensen hebben een eend gered die vast kwam te zitten door de mensen!', 'mensenEnEenden'),
		(1, 'Eend in nood!', 'https://www.youtube.com/embed/4oIhiTWexW0', 'gwn een trap maken toch', 'mensenEnEenden'),
		(1, 'laat niemand ooit beweren dat eenden slim zijn', 'https://www.youtube.com/embed/1DYrUtSXkaM', 'want ze komen om de haverklap vast te zitten', 'cute'),
		(1, 'de helft van de eenden videos is of eenden die', 'https://www.youtube.com/embed/w4ZK6rB4TEo', ' vast zitten, of eendenverkrachting', 'voortplantingsgedrag'),/*https://www.youtube.com/embed/pF3XOj4oolg */
		(1, 'Alle Eendjes Zwemmen In Het Water', 'https://www.youtube.com/embed/07vkZe_Ew2M', 'Alle Eendjes Zwemmen In Het Water	', 'mensenEnEenden'),
		(1, 'Eendenmishandeling', 'https://www.youtube.com/embed/aYqvHDhorGw', 'mijn zoekgeschiedenis is helemaal vol met eenden zo', 'mensenEnEenden'),
		(1, 'Eendenjacht', 'https://www.youtube.com/embed/sDdpTRdrxoM', 'stelletje beulen dit!', 'mensenEnEenden'),
		(1, 'eenducatief', 'https://www.youtube.com/embed/HVWW_mWutvY', 'hahhahaha snap je hem?', 'educatief'),
		(1, 'ITS SO FLUFFY I WANT TO DIE', 'https://www.youtube.com/embed/fZEHhLloF0w', 'rolf', 'cute'),
		(1, 'Eerste bad voor eenden', 'https://www.youtube.com/embed/gGW3yRbYKDM', 'eerste bad voor eenden', 'eductatief'),
		(1, 'Eenden voeren', 'https://www.youtube.com/embed/dO12Se1skEU', 'lieve diertjes toch?!??!!', 'mensenEnEenden')

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
