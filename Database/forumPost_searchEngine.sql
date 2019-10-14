use eendenvrienden

SELECT TOP 2 *
from ForumPost
except
SELECT TOP 1 *
from ForumPost