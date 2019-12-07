SELECT TOP (5) * FROM ForumPost f INNER JOIN Users u ON f.user_id = u.user_id EXCEPT (SELECT TOP (0) * FROM ForumPost f INNER JOIN Users u ON f.user_id = u.user_id)
SELECT * FROM Users

delete from Forumpost

insert into ForumPost(user_id, postname, post, date) values(1, 'post1', 'test', '2019-8-4')
insert into ForumPost(user_id, postname, post, date) values(1, 'post2', 'test', '2019-8-4')
insert into ForumPost(user_id, postname, post, date) values(1, 'post3', 'test', '2019-8-4')
insert into ForumPost(user_id, postname, post, date) values(1, 'post4', 'test', '2019-8-4')
insert into ForumPost(user_id, postname, post, date) values(1, 'post5', 'test', '2019-8-4')
insert into ForumPost(user_id, postname, post, date) values(1, 'post6', 'test', '2019-8-4')
insert into ForumPost(user_id, postname, post, date) values(1, 'post7', 'test', '2019-8-4')
insert into ForumPost(user_id, postname, post, date) values(1, 'post8', 'test', '2019-8-4')
insert into ForumPost(user_id, postname, post, date) values(1, 'post9', 'test', '2019-8-4')
insert into ForumPost(user_id, postname, post, date) values(1, 'post10', 'test', '2019-8-4')
insert into ForumPost(user_id, postname, post, date) values(1, 'post11', 'test', '2019-8-4')
