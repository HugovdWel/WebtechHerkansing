use master
drop database Eendenvrienden
create database Eendenvrienden
use Eendenvrienden

create table Users(
username	varchar(50)	not null,
[password]	varchar(50) not null,
email		varchar(50) not null,
constraint PK_USERS primary key (username)
)

create table Video(
username		varchar(50)		not null,
[name]			varchar(50)		not null,
link			varchar(255)	not null,
[description]	varchar(255)	not null,
constraint PK_VIDEO primary key (username, link),
constraint FK_VIDEO_GEBRUIKERSNAAM FOREIGN KEY (username) REFERENCES Users (username)
)

create table Recipes(
username		varchar(50)		not null,
[name]			varchar(50)		not null,
picture			varchar(255)	not null,
[description]	varchar(255)	not null,
constraint PK_RECIPES primary key ([name], username),
constraint FK_RECIPES_GEBRUIKERSNAAM FOREIGN KEY (username) REFERENCES Users (username)
)

create table ForumPost(
username	varchar(50)		not null,
postname	varchar(50)		not null,
post		varchar(255)	not null,
[date]		date			not null,
post_id		numeric(12)		not null identity(1,1),
constraint PK_FORUMPOST primary key (post_id),
constraint FK_FORUMPOST_GEBRUIKERSNAAM FOREIGN KEY (username) REFERENCES Users (username)
)

create table Comments(
username	varchar(50)		not null,
comment		varchar(255)	not null,
post_id		numeric(12)		not null,
comment_id  numeric(12)		not null identity(1,1),
[date]		date			not null,
constraint PK_COMMENTS primary key (comment_id),
constraint FK_COMMENTS_GEBRUIKERSNAAM FOREIGN KEY (username) REFERENCES Users (username),
constraint FK_COMMENTS_POST_ID FOREIGN KEY (post_id) REFERENCES ForumPost (post_id)
)