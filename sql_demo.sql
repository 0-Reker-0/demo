--
-- База данных: `demo_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `pass` text NOT NULL,
  `d1` varchar(255) NOT NULL,
  `d2` varchar(255) NOT NULL,
  `d3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `d1`, `d2`, `d3`) VALUES
(3, 'user', '$argon2id$v=19$m=65536,t=4,p=1$VmZqLzM0c08za3VXbVR6Wg$E4VavJB2ZzrXh6ySvdTIHh8Cmwm/9UBQDI2AnZXhgiM', '123', 'test232', 'pass: test'),
(5, 'user23', '$argon2id$v=19$m=65536,t=4,p=1$eXZIL3pNQjdyNkxqWC51dw$6WawB48Y3SDbUMrWbOxbTGuLNDXnx+ECF3Il2uzRZWU', 'test', 'test -> user3', 'pass: test'),
(6, 'user2', '$argon2id$v=19$m=65536,t=4,p=1$VmlYVXQvVmFRdllMTDZSbg$0E5WQWwm7L6ID+c5LfOMCyGe3mSInU4BukObCTS4RIA', 'test-> user2', 'test', 'pass: test');
COMMIT;
