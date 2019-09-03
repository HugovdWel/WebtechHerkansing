use master
drop database eendenvrienden
create database eendenvrienden
use eendenvrienden

create table Users(
userId			numeric(6)		not null,
username		varchar(50)		not null,
[password]		varchar(50)		not null,
email			varchar(50)		not null,
constraint PK_USERID primary key (userId),
)

create table Video(
videoId			numeric(6)		not null,
userId			numeric(6)		not null,
[name]			varchar(50)		not null,
link			varchar(255)	not null,
[description]	varchar(255)	not null,
constraint PK_VIDEO primary key (videoId),
constraint FK_VIDEO_GEBRUIKERSID FOREIGN KEY (userId) REFERENCES Users (userId)
)

create table Recipes(
recipeId		numeric(6)		not null,
userId			numeric(6)		not null,
[name]			varchar(50)		not null,
picture			varchar(255)	not null,
[description]	varchar(255)	not null,
constraint PK_RECIPES primary key (recipeId),
constraint FK_RECIPES_GEBRUIKERSID FOREIGN KEY (userId) REFERENCES Users (userId)
)

create table ForumPost(
post_id			numeric(12)		not null	identity(1,1),
userId			numeric(6)		not null,
postname		varchar(50)		not null,
post			varchar(255)	not null,
[date]			date			not null,
constraint PK_FORUMPOST primary key (post_id),
constraint FK_FORUMPOST_GEBRUIKERSNAAM FOREIGN KEY (userId) REFERENCES Users (userId)
)


create table Comments(
post_id			numeric(12)		not null,
comment_id		numeric(12)		not null	identity(1,1),
userId			numeric(6)		not null,
comment			varchar(255)	not null,
[date]			date			not null,
constraint PK_COMMENTS primary key (comment_id),
constraint FK_COMMENTS_GEBRUIKERSNAAM FOREIGN KEY (userId) REFERENCES Users (userId),
constraint FK_COMMENTS_POST_ID FOREIGN KEY (post_id) REFERENCES ForumPost (post_id)
)
-----------------------------------------------------------------------------------------
insert into Users
values ('000001','hugo','qwerty123', 'nvt')

insert into Video
values ('000001','000001', 'Schattig eenden', 'www.koekje.nl', 'moet je kijken')

insert into Recipes
values ('000001','000001', 'gefrituurde eend', '123.jpg', 'pakt een eend uit de vijver en stop hem in de frituur')

insert into ForumPost(post_id, userId, postname, post, [date])
values ('000001','000001', 'eenden zijn lekker', 'If you know what i mean', '2019-8-4')

insert into Comments(username, comment, post_id, [date])
values ('000001','000001', 'true', 1, '2019-8-4')

