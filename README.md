# Devpla

## Overview
This app is a Platform where people can gather with web developers for their developments. It stands for Development Platform and will be the free platfom to find the teammates of your private application development.

This application has similar features as Slack. (Posting function for reporting progress, emoji function, photo posting function, direct replying to posts, noticeboard function divided into threads, etc.) The content you write can be shared with people all over the country (The scope of publication will be finely controllable.) The system also allows you to send direct messages to people you are interested in, gather development members, and create groups. It provides you the chances of getting advice from experts and help you develop.

## objectives & background
Some developer specially the beginners are struggling to keep learning and finding friends to learn with. It would be fun and motivating if you could output what you understood in detail, share it with people all over the country and have them comment on it in order to improve your development skills. You are always free to ask questions and answer someone's questions.
Therefore, this app will help you support learning and looking for friends to develop with. This is focusing more on finding other developers before they starts to use the another communication tools such as slack or google chat.



## approach
The template of tailwind CSS is mainly used in the frontend UI which is attrative for users. Also many functionalities such as "emoji", "like" are used to improve the user experince.


## results
10 users are using this app to send messages and post their information.


 

## tech stack
- PHP7
- Laravel7
- Tailwind CSS
- Mysql5.7
- docker

## How to

First, put all the variables you need to `.env`. please see `.env.example` as reference.

please use `docker-compose.yml` to build and up
```
docker-compose build
```
```
docker-compose up -d
```

Go inside the container
```
docker-compose exec container_name bash
```

start the server
```
php artisan serve --host 0.0.0.0 --port 8081
```


- [Demo](https://drive.google.com/file/d/1DfsYpXHsUe7FeqGO3jMaR6T-JN7IrCk_/view?usp=sharing)
