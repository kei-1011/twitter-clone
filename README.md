# twitter-clone

## table

### users

| Name | Type | Extra |
----|---- | ---- 
| user_id | int(11) | AUTO_INCREMENT |
| username | varchar(40) |  |
| email | varchar(255) |  |
| password | varchar(32) |  |
| screenName | varchar(40) |  |
| profileImage | varchar(255) |  |
| profileCover | varchar(255) |  |
| following | int(11) |  |
| followers | int(11) |  |
| bio | varchar(140) |  |
| country | varchar(255) |  |
| website | varchar(255) |  |


### tweets

| Name | Type | Extra |
----|---- | ---- 
| tweetsID | int(11) | AUTO_INCREMENT |
| status | varchar(140) |  |
| tweetsBy | int(11) |  |
| retweetID | int(11) |  |
| retweetBy | int(11) |  |
| tweetImage | varchar(255) |  |
| likesCount | int(11) |  |
| retweetCount | int(11) |  |
| postedOn | datetime |  |
| retweetMsg | varchar(140) |  |
