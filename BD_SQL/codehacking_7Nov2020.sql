-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2020 at 06:41 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codehacking`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PHP con Angular', '2020-11-03 13:06:17', '2020-11-03 13:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `is_active`, `author`, `photo`, `email`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Adrian', NULL, 'adrian@gmail.com', 'Comentario id 1', '2020-11-04 17:12:12', '2020-11-04 17:12:55'),
(2, 1, 1, 'admin2', NULL, 'admin2@admin.com', 'Hola soy un comentario', '2020-11-03 15:28:37', '2020-11-03 15:30:41'),
(3, 1, 1, 'admin2', NULL, 'admin2@admin.com', 'Post 3', '2020-11-03 15:42:25', '2020-11-03 15:42:48'),
(4, 1, 1, 'admin2', NULL, 'admin2@admin.com', 'POst 4', '2020-11-03 15:44:27', '2020-11-03 15:44:40'),
(5, 1, 1, 'admin2', NULL, 'admin2@admin.com', 'Post 5', '2020-11-03 15:46:46', '2020-11-04 17:12:55'),
(6, 1, 1, 'Adrian', NULL, 'adrian@gmail.com', 'Comentario 2', '2020-11-04 17:12:12', '2020-11-04 17:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(50, '2014_10_12_000000_create_users_table', 1),
(51, '2014_10_12_100000_create_password_resets_table', 1),
(52, '2020_10_26_145127_create_roles_table', 1),
(53, '2020_10_27_165940_add_photo_id_to_users', 1),
(54, '2020_10_27_190730_create_photos_table', 1),
(55, '2020_10_29_175808_create_posts_table', 1),
(56, '2020_10_29_221241_create_categories_table', 1),
(57, '2020_10_31_204724_create_comments_table', 1),
(58, '2020_10_31_205637_create_comment_replies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, '1604398058cover.jpg', '2020-11-03 13:07:38', '2020-11-03 13:07:38'),
(2, '1604404887cover.jpg', '2020-11-03 15:01:27', '2020-11-03 15:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `photo_id`, `title`, `body`, `created_at`, `updated_at`, `slug`) VALUES
(1, 1, 2, 1, 'Quia labore architecto ad reprehenderit delectus dicta.', 'Velit deserunt voluptas ea sunt omnis in sunt. Expedita adipisci fuga quae adipisci. Quaerat perspiciatis voluptatem eligendi et quam. Quia assumenda sed illum est repellat sit quia.\n\nEst recusandae sequi eos velit doloremque eligendi possimus. Iure quo consequatur quaerat aliquid. Aperiam ipsam et exercitationem hic qui. Autem eum quo magnam fuga repellendus ullam.\n\nAdipisci libero dignissimos maxime ex ipsum nemo id eligendi. Rerum ullam rem sunt sunt autem dolor. Vel nesciunt officiis deleniti.\n\nId sunt temporibus nemo iste reprehenderit sunt repellat sit. Rerum nemo sed reprehenderit omnis perferendis animi voluptatem suscipit. Omnis sint dicta qui distinctio exercitationem ipsa debitis id.\n\nEt quod id sequi aut. Fugit repudiandae vel eius quisquam et. Ratione qui soluta qui id recusandae incidunt doloremque. Et quidem maxime minima.\n\nUt rem et non cumque. Aut non sed eius inventore et voluptas praesentium est. Tempora fuga magni ducimus. Autem voluptatem quia vel magni et quaerat ratione. Repellat veritatis recusandae et labore dolor autem est.\n\nQuia ducimus minima laborum sint. Quae qui consequatur eum numquam eaque fuga quia. Voluptas qui ipsam nemo itaque delectus quibusdam et dolorem. Molestiae facere officiis tempora.\n\nSimilique ut natus deserunt at. Illum laboriosam est sed dignissimos. Qui nihil eos rerum a.\n\nSed rem occaecati suscipit consequatur distinctio mollitia. Inventore non nihil perferendis est. Cum unde reprehenderit consequatur iste.\n\nConsequuntur quam enim quas repellat earum eaque. Aut aperiam delectus quasi sed adipisci hic. Necessitatibus debitis qui quae.\n\nAut dolor et et dolor delectus ut laboriosam. Rem fuga sunt quibusdam ut sit. Repellendus eius nobis dolores excepturi. Ipsam adipisci quae explicabo impedit facilis dolor.\n\nMaiores repudiandae voluptas ratione eum similique reprehenderit magnam. Facilis id odio nulla numquam ut provident commodi eum. Nemo dolor aliquid pariatur amet. Autem ut soluta consectetur aut veniam dolorem.', '2020-11-07 20:36:57', '2020-11-07 20:36:57', 'ratione-harum-et-totam-praesentium-officiis'),
(2, 2, 2, 1, 'Excepturi temporibus omnis itaque aliquam nemo aut molestiae natus.', 'Quod sed temporibus voluptatem perspiciatis omnis deserunt. Ratione doloribus sint quia adipisci aut qui. Temporibus suscipit id quasi.\n\nVitae rerum qui voluptatem voluptates nisi qui iste autem. Eaque alias repudiandae rerum facere consequuntur est. Suscipit laborum totam voluptate animi omnis dignissimos. Eum fugiat nostrum nihil cumque inventore similique facere.\n\nEst quisquam totam at optio ipsa. Necessitatibus et tenetur aut.\n\nNulla quas expedita aut dolor quis. Officiis non ab minima deleniti. Sed error rerum debitis eos cupiditate est aperiam. Sunt aliquid tempora porro hic dolor natus asperiores.\n\nEos qui labore doloribus magni quod. Voluptatibus quo beatae sit et magnam. Dolor nobis veritatis quia corrupti unde atque. Ut non facilis architecto praesentium aliquid at. Qui consequuntur earum quasi autem tenetur.\n\nVoluptate quae dolores sunt labore in. Officia quod hic reiciendis explicabo sequi corporis consequatur. Voluptas autem autem fuga esse sed nesciunt.\n\nQui nostrum quis eius distinctio. Ut aut maxime aut rerum qui magni voluptatem consequatur. Sint sit quam corrupti voluptatibus quo cupiditate maiores veritatis.\n\nQuae qui iste tempore sed. Vitae ex nobis qui doloremque. Omnis quas unde quas qui.\n\nCupiditate voluptas non omnis et consequatur dolorem. Quaerat aut tenetur earum qui fuga quam. Enim omnis autem ad ea eaque possimus laudantium.\n\nVoluptatem omnis fugiat sunt. Ut et dolorum eaque et sequi recusandae. Quod deleniti reprehenderit est.\n\nVero error reprehenderit harum odit rem est voluptates. Voluptate fuga quos nulla consequatur. Nemo temporibus et laboriosam accusantium. Est enim in rerum. Quae dolore officiis ut dolores ut odio.\n\nBlanditiis voluptate asperiores fugit consequatur. Perspiciatis est magnam necessitatibus.', '2020-11-07 20:36:57', '2020-11-07 20:36:57', 'velit-quaerat-ex-ut-libero-vitae'),
(3, 3, 2, 1, 'Vel velit quae in similique odio.', 'Nihil assumenda voluptatibus blanditiis sit. Placeat qui omnis voluptatum sed. Maiores nemo libero saepe.\n\nError nostrum sit beatae consequatur. Minima aperiam modi facere beatae ex distinctio quae qui. Quisquam eum temporibus sed est.\n\nQuo a optio totam voluptate. Eius ex voluptas corporis ut in in. Itaque ut iste dolor quidem deserunt.\n\nNatus beatae autem nisi accusantium voluptatem enim sit. Dolorem sed velit assumenda et.\n\nRecusandae neque quasi architecto dolores. Quis impedit veritatis aut dolores saepe. Reprehenderit sunt ut minima ut omnis sapiente.\n\nSint esse deleniti reprehenderit. Repudiandae excepturi eum provident magni. Excepturi sapiente voluptatem sed ut voluptas perspiciatis. Quia quod facilis qui laborum voluptate totam.\n\nVoluptas rem aut pariatur qui hic et qui. Sed et voluptas non reiciendis perspiciatis aut in. Reiciendis est quae libero ut qui.\n\nFugiat voluptas soluta pariatur molestiae quos sit. Quibusdam et consequuntur tempore ut dolore. Omnis ut delectus aut.\n\nEt quidem quod labore sapiente aspernatur ut. Molestiae voluptas labore in ut labore est ullam illo. Omnis voluptatem nam officia similique quia ea. Et dolorum ut quia harum.\n\nIllo consequuntur culpa et est in inventore quidem animi. Adipisci qui necessitatibus voluptatem libero tenetur exercitationem. Maxime officiis eligendi similique est ea. Error non consequuntur consequatur tempora autem fugit qui. Voluptatem est quo est deleniti quaerat.\n\nAut placeat sapiente autem sint eveniet aliquam. Esse quam quam quis voluptates consequatur rerum sunt qui. Aut consequuntur nisi qui.\n\nSunt id dolores reprehenderit non aspernatur delectus. Ut consequuntur totam culpa aut nesciunt amet. Fugiat rerum debitis voluptatibus voluptatum.\n\nUt aspernatur consequuntur sed ducimus. Ratione optio deserunt fuga hic a veniam eum culpa. Quia iure quidem voluptas saepe quasi consectetur culpa.', '2020-11-07 20:36:57', '2020-11-07 20:36:57', 'aut-delectus-fuga-quasi-officia'),
(4, 4, 10, 1, 'Alias veritatis voluptas rerum error impedit eum amet.', 'Ut corrupti eum sequi quo cumque. Necessitatibus velit et commodi autem accusantium vero. Ducimus eum iure rerum sint amet voluptas blanditiis repellat. Unde totam non sequi autem praesentium.\n\nSequi officia non in in quasi cupiditate nulla. Error ad qui sed eum voluptas enim eos. Temporibus itaque harum dolor eos exercitationem. Animi facere cumque velit ratione non incidunt molestiae. Aut ratione et quos facilis quidem est dicta facere.\n\nHarum at id nesciunt sed odio quaerat delectus. Voluptatem sed ipsa illum dolor. Debitis nemo nihil tenetur velit ad. Eius et officiis qui odio quaerat et.\n\nLaborum praesentium architecto hic doloribus voluptatibus et incidunt. Labore ullam voluptas doloribus incidunt expedita illo natus officiis. Harum eos facere magni veniam ea sed reprehenderit.\n\nVoluptas delectus aspernatur expedita. Aspernatur vel dolorum officia minus provident autem repudiandae. Sapiente ratione odio illum.\n\nQuo recusandae enim est id reprehenderit. Explicabo rerum aperiam fugiat facere expedita dolore. Impedit inventore iure soluta perspiciatis vitae ullam quis neque. Ut sit aut aut vero iste id.\n\nRatione et et voluptatum suscipit ut nulla aut. Necessitatibus perferendis voluptatem voluptatem laudantium labore enim. Et eum aperiam nisi eum. Corporis qui delectus eum sint.\n\nOccaecati consectetur id impedit eum inventore veritatis. Dolorem hic provident neque veritatis dolor aliquid id. Rerum quo qui eum sint velit quibusdam consectetur. Quia dolorem velit optio non mollitia dicta.\n\nNon nisi quod non iure non ab. Aperiam et perspiciatis culpa animi incidunt aut ut sequi. Sunt maiores incidunt doloribus quia.\n\nNesciunt neque possimus animi et rerum ad. Labore inventore cum placeat. Non numquam rem in.', '2020-11-07 20:36:57', '2020-11-07 20:36:57', 'earum-aut-cupiditate-labore-sunt');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', NULL, NULL),
(2, 'posteador', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `is_active`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `photo_id`) VALUES
(1, NULL, 0, 'Heloise Herzog', 'nolan.sydnee@example.net', '$2y$10$wJOoRmHViFgIRAQSr/O9hepl3c6eXXV9r5Z2WRQV773c7usClI/C.', 'c5FejeAChV', '2020-11-07 20:36:57', '2020-11-07 20:36:57', NULL),
(2, NULL, 0, 'Mr. Omer Kreiger Sr.', 'xbotsford@example.com', '$2y$10$pqjt1nXmd/EKanCN4dx7QectmP9rVvPy9Uf6Si98X4WHS6Z/lHRQa', 'DTrZtpUDsY', '2020-11-07 20:36:57', '2020-11-07 20:36:57', NULL),
(3, NULL, 0, 'Prof. Abelardo Schmitt DDS', 'ladarius37@example.net', '$2y$10$N655D4rrgYL6dEvLiIQRHORs5o7lpA5ZHToOiKaz7SCOfdyLhMD.6', '0elF1IbfYA', '2020-11-07 20:36:57', '2020-11-07 20:36:57', NULL),
(4, NULL, 0, 'Roma Hauck III', 'anicolas@example.net', '$2y$10$DokujcgseVSRYtmAAnITRO3MNWo/LROIMwsm8aI3w.m6NPFdfjXW6', 'U7vkDrso4F', '2020-11-07 20:36:57', '2020-11-07 20:36:57', NULL),
(5, NULL, 0, 'Miss Elody Wuckert V', 'walter12@example.net', '$2y$10$lekHSs3acmdpIJy8bIgxk.Z9bRNVZsgrkh42P718g8qmgJC7NuMza', 'DgSMUSe3tD', '2020-11-07 20:36:57', '2020-11-07 20:36:57', NULL),
(6, NULL, 0, 'Prof. Constance Bernier II', 'hills.korbin@example.net', '$2y$10$8LLVltUYP3ssKrKnjGmTDOB1ZgHaEZWhWfoDnRYXj852Y1G8rxAj.', '6bT1Bxb2R2', '2020-11-07 20:36:57', '2020-11-07 20:36:57', NULL),
(7, NULL, 0, 'Erika Boehm', 'jledner@example.org', '$2y$10$FKeCcXQK2TBAcbSuJIUe8egEXV2gG1kIvJ9vszbi0GYK7UsnGT8f2', '4JLefEno7i', '2020-11-07 20:36:57', '2020-11-07 20:36:57', NULL),
(8, NULL, 0, 'Justice Krajcik', 'romaguera.stephanie@example.com', '$2y$10$LlI.tfep9n27jZs32oclt.VluK2oSS4RtUApdKlBEY52NRxCJ0PQG', 'Gk3INc2ouH', '2020-11-07 20:36:57', '2020-11-07 20:36:57', NULL),
(9, NULL, 0, 'Daniela Kirlin', 'general.becker@example.com', '$2y$10$gVqEFJSUkp82MId1TA0h/eGQWb/PV9TuoMzStEwXu2.1D6GJqGqRu', 'Xkxa7Zs0ic', '2020-11-07 20:36:57', '2020-11-07 20:36:57', NULL),
(10, NULL, 0, 'Gage Walter', 'earnest47@example.net', '$2y$10$GM/HI28v26IBof6SjMs3F.u9FQ40ieQBi9rU.LqJZOjrqW5jYrtwW', 'Xqg3Yj9FZo', '2020-11-07 20:36:57', '2020-11-07 20:36:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_index` (`post_id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_comment_id_index` (`comment_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_index` (`user_id`),
  ADD KEY `posts_category_id_index` (`category_id`),
  ADD KEY `posts_photo_id_index` (`photo_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
