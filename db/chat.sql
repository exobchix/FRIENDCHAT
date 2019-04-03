CREATE TABLE IF NOT EXISTS `users`(
	`id` serial  primary key,
	`nickname` text NOT NULL,
	`email` text NOT NULL,
	`password` text NOT NULL
);
CREATE TABLE IF NOT EXISTS `messages`(
	`id` serial  primary key,
	`description` text,
	`nickname` text NOT NULL,
	`created_at` timestamp NOT NULL,
	`user_id` int NOT NULL,
	`sala` text NOT NULL
);

