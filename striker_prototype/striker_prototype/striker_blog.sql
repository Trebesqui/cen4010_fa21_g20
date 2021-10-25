SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `date`) VALUES
(1, 'Admin', '$2y$10$FfhPYubR4sOXAFSd3NzyQ.C77L4.qIsCa/YlYZCn.2eK8rfWr6oiq', 'admin@striker.org', '2021-10-10 14:39:53');

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;



INSERT INTO `posts` (`id`, `title`, `content`, `posted_by`, `date`, `price`) VALUES
(1, 'Article Title', 'Small summary of the article about one to two sentences long', 'Admin', '2021-10-15', '25'),
(2, 'Article Title', 'Small summary of the article about one to two sentences long', 'Admin', '2021-10-15', '25'),
(3, 'Article Title', 'Small summary of the article about one to two sentences long', 'Admin', '2021-10-15', '25'),
(4, 'Article Title', 'Small summary of the article about one to two sentences long', 'Admin', '2021-10-15', '15'),
(5, 'Article Title', 'Small summary of the article about one to two sentences long', 'Admin', '2021-10-25', '25'),
(6, 'Article Title', 'Small summary of the article about one to two sentences long', 'Admin', '2021-10-25', '15'),
(7, 'Article Title', 'Small summary of the article about one to two sentences long', 'Admin', '2021-10-15', '15'),
(8, 'Article Title', 'Small summary of the article about one to two sentences long', 'Admin', '2021-10-15', '15'),
(9, 'Article Title', 'Small summary of the article about one to two sentences long', 'Admin', '2021-10-15', '15'),
(10, 'Article Title', 'Small summary of the article about one to two sentences long', 'Admin', '2021-10-15', '15');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
