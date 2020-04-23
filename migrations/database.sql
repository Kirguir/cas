CREATE TABLE IF NOT EXISTS `subscribers`
(
    `id`      bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name`    varchar(255)        NOT NULL,
    `address` varchar(255)        NOT NULL
) CHARACTER SET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `subscribers`
VALUES (1, 'Иванов Иван Ивановия', 'с.Поповка'),
       (2, 'Петров Петр Иванович', 'пгт.Красное'),
       (3, 'Сидоров Иван Петрович', 'г.Канев');

CREATE TABLE IF NOT EXISTS `magazines`
(
    `id`   bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255)        NOT NULL
) CHARACTER SET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `magazines`
VALUES (1, 'Nature'),
       (2, 'CHIP');

CREATE TABLE IF NOT EXISTS `magazine_release`
(
    `id`          bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `magazine_id` bigint(20) unsigned NOT NULL,
    `number`      int unsigned        NOT NULL,
    `date`        date                NOT NULL,
    UNIQUE KEY (`magazine_id`, `number`),
    FOREIGN KEY (magazine_id)
        REFERENCES magazines (id)
        ON DELETE CASCADE
) CHARACTER SET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `magazine_release`
VALUES (1, 1, 1, '2020-01-02'),
       (2, 1, 2, '2020-02-02'),
       (3, 1, 3, '2020-03-01'),
       (4, 1, 4, '2020-04-01'),
       (5, 1, 5, '2020-05-01'),
       (6, 2, 1, '2020-01-02'),
       (7, 2, 2, '2020-02-02'),
       (8, 2, 3, '2020-03-02'),
       (9, 2, 4, '2020-04-02'),
       (10, 2, 5, '2020-05-02');

CREATE TABLE IF NOT EXISTS `subscriptions`
(
    `subscriber_id` bigint(20) unsigned NOT NULL,
    `magazine_id`   bigint(20) unsigned NOT NULL,
    `start`         date                NOT NULL,
    `period`        int unsigned        NOT NULL,

    FOREIGN KEY (subscriber_id)
        REFERENCES subscribers (id)
        ON DELETE CASCADE,

    FOREIGN KEY (magazine_id)
        REFERENCES magazines (id)
        ON DELETE CASCADE
) CHARACTER SET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `subscriptions`
VALUES (1, 1, '2020-04-01', 1),
       (1, 2, '2020-04-01', 2),
       (2, 1, '2020-03-01', 1),
       (2, 2, '2020-03-01', 4),
       (3, 1, '2020-01-01', 4);

CREATE TABLE IF NOT EXISTS `checks`
(
    `id`              bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `filename`        varchar(255)        NOT NULL,
    `delivery_date`   date                NOT NULL,
    `operator_id`     bigint(20) unsigned NOT NULL,
    `number`          int unsigned,
    `tracking`        int unsigned,
    `subscriber_id`   bigint(20) unsigned,
    `magazine_rel_id` bigint(20) unsigned,
    `status`          ENUM ('new', 'processed', 'wrong'),
    `processed_at`    date,

    FOREIGN KEY (subscriber_id)
        REFERENCES subscribers (id)
        ON DELETE CASCADE,
    FOREIGN KEY (magazine_rel_id)
        REFERENCES magazine_release (id)
        ON DELETE CASCADE
) CHARACTER SET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `users`
(
    `id`       bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `login`    varchar(255)        NOT NULL,
    `password` varchar(255)        NOT NULL
) CHARACTER SET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO `users`
VALUES (1, 'Operator1', 'qwerty');
