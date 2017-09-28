CREATE TABLE `users` (
  `id`    INT         NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `categories` (
  `id`   INT         NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `news` (
  `id`          INT          NOT NULL AUTO_INCREMENT,
  `category_id` INT          NOT NULL,
  `body`        VARCHAR(243) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `news_id_fkey` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
);

CREATE TABLE `likes` (
  `user_id` INT NOT NULL,
  `news_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `news_id`),
  CONSTRAINT `likes_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `likes_news_id_fkey` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE
);