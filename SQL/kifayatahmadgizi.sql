-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Hazırlanma Vaxtı: 25 Okt, 2021 saat 09:52
-- Server versiyası: 8.0.21
-- PHP Versiyası: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Verilənlər Bazası: `kifayatahmadgizi`
--

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `books` int DEFAULT '0',
  `courses` int DEFAULT '0',
  `experience` int DEFAULT '0',
  `instagram` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `about`
--

INSERT INTO `about` (`id`, `logo`, `address`, `start_day`, `start_time`, `end_day`, `end_time`, `mobile`, `phone`, `map`, `email`, `books`, `courses`, `experience`, `instagram`, `facebook`, `twitter`, `youtube`, `text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'logo.png', '44, J.Jabbarli Street, Caspian Plaza 1, 4th Floor Baku, Azerbaijan', 'Mon', '09:00', 'Sat', '21:00', '+994702260990', '+994552260990', NULL, 'info@mail.ru', 10, 94, 30, 'https://www.instagram.com/thelanguagehouse.az', 'https://www.facebook.com/tlh.az/', NULL, NULL, '<section class=\"elementor-section elementor-top-section elementor-element elementor-element-02ebb41 elementor-section-boxed elementor-section-height-default elementor-section-height-default\" data-id=\"02ebb41\" data-element_type=\"section\" style=\"margin: 0px; padding: 0px; position: relative; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><div class=\"elementor-container elementor-column-gap-default\" style=\"margin: 0px auto; padding: 0px; display: flex; position: relative; max-width: 1140px;\"><div class=\"elementor-row\" style=\"margin: 0px -10px; padding: 0px; width: calc(100% + 20px); display: flex;\"><div class=\"elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2365040\" data-id=\"2365040\" data-element_type=\"column\" style=\"margin: 0px; padding: 0px; min-height: 1px; position: relative; display: flex; width: 1160px;\"><div class=\"elementor-column-wrap elementor-element-populated\" style=\"margin: 0px; padding: 0px 0px 30px; position: relative; display: flex; width: 1160px;\"><div class=\"elementor-widget-wrap\" style=\"margin: 0px; padding: 0px; position: relative; width: 1160px; flex-wrap: wrap; align-content: flex-start; display: flex;\"><div class=\"elementor-element elementor-element-8f6f9dc elementor-widget elementor-widget-text-editor\" data-id=\"8f6f9dc\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\" style=\"margin: 0px; padding: 0px; position: relative; color: var( --e-global-color-text ); font-family: var( --e-global-typography-text-font-family ), Sans-serif; font-weight: var( --e-global-typography-text-font-weight ); width: 1160px;\"><div class=\"elementor-widget-container\" style=\"margin: 0px; padding: 0px; transition: background 0.3s ease 0s, border 0.3s ease 0s, border-radius 0.3s ease 0s, box-shadow 0.3s ease 0s, -webkit-border-radius 0.3s ease 0s, -webkit-box-shadow 0.3s ease 0s;\"><div class=\"elementor-text-editor elementor-clearfix\" style=\"margin: 0px; padding: 0px;\"><div class=\"thim-about-us-quote\" style=\"margin: 72px auto auto; padding: 0px; text-align: center; max-width: 715px;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(153, 153, 153); font-size: 30px; line-height: 48px;\">“Kifayat Ahmedgizi”</p></div></div></div></div></div></div></div></div></div></section><section class=\"elementor-section elementor-top-section elementor-element elementor-element-65100e7 elementor-section-boxed elementor-section-height-default elementor-section-height-default\" data-id=\"65100e7\" data-element_type=\"section\" style=\"margin: 0px; padding: 0px; position: relative; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><div class=\"elementor-container elementor-column-gap-default\" style=\"margin: 0px auto; padding: 0px; display: flex; position: relative; max-width: 1140px;\"><div class=\"elementor-row\" style=\"margin: 0px -10px; padding: 0px; width: calc(100% + 20px); display: flex;\"><div class=\"elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d346b0d\" data-id=\"d346b0d\" data-element_type=\"column\" style=\"margin: 0px; padding: 0px; min-height: 1px; position: relative; display: flex; width: 1160px;\"><div class=\"elementor-column-wrap elementor-element-populated\" style=\"margin: 0px; padding: 10px; position: relative; display: flex; width: 1160px;\"><div class=\"elementor-widget-wrap\" style=\"margin: 0px; padding: 0px; position: relative; width: 1140px; flex-wrap: wrap; align-content: flex-start; display: flex;\"><div class=\"elementor-element elementor-element-827d626 elementor-widget elementor-widget-text-editor\" data-id=\"827d626\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\" style=\"margin: 0px; padding: 0px; position: relative; color: var( --e-global-color-text ); font-family: var( --e-global-typography-text-font-family ), Sans-serif; font-weight: var( --e-global-typography-text-font-weight ); width: 1140px;\"><div class=\"elementor-widget-container\" style=\"margin: 0px; padding: 0px; transition: background 0.3s ease 0s, border 0.3s ease 0s, border-radius 0.3s ease 0s, box-shadow 0.3s ease 0s, -webkit-border-radius 0.3s ease 0s, -webkit-box-shadow 0.3s ease 0s;\"><div class=\"elementor-text-editor elementor-clearfix\" style=\"margin: 0px; padding: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">The language school “The Language House” is a training center where studies are conducted by professional teachers, a well as native speakers. In our school you can appreciate a variety of services, which include various training programs considered for children and adults, for groups or one person at any level of proficiency – zero and medium.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Students of our school advise their friends and relatives to study foreign languages in our training center. In this case, they refer to the following types of activities of our company:</p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">English language courses taught by the best teachers-translators. Teachers of “The Language House” have corresponding international certificates, diplomas certifying their professionalism. We guarantee that our professional and qualified teachers will work selflessly in the name of your getting the required knowledge!</li></ul><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">In the process of learning a foreign language in schools the greatest difficulty is speaking. Everyone can learn to read and write competently through a textbook on grammar and vocabulary, however, free foreign language without errors and hesitation is impossible without regular use of it in practice.</li></ul><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">One of the major areas of work of “The Language House” is the training of personnel from various companies. Well-known foreign and national companies have always placed great hopes on “The Language House”. We develop an individual training program for each company.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">If you want to be sure of the truth of the above information and verify the success of our educational activities you can visit the school “The Language House”. The staff of our school will provide you with comprehensive information on all your questions and according to your request will select an acceptable variant for you learning.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">&nbsp;Our privileges:</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">1. We employ only qualified school teachers with diplomas and certificates at international level, such as a Cambridge CELTA (the most widespread international certificate, which allows to teach English as a foreign language in any country in the world).</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">2. During training Foreign Language School “The Language House” apply the methodology of Kifayat Ahmed gizi. This method develops basic language skills: oral and written language, reading and the ability to perceive foreign speech at the hearing. Parallel studies of grammar are conducted, vocabulary is enriched. The essence of this technique lies in the fact that the classroom teachers do not communicate with students in Russian and Azerbaijani languages and from the very first lessons taught in the learned language. Applying the expressions, vocabulary and grammar examples familiar to the student, the teacher explains the rules and values of new words. During the exercises with the use of communicative methods are actively used role-playing, dialogue with a partner, search for errors, correlation and comparison, developing not only memory but also logical, analytical and creative thinking. All this creates a favorable language environment in which stay students while training, which contributes to the success of overcoming the language barrier.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">3. Most of the students get trained in an accelerated procedure of Kifayat Ahmed kizi, without doing home exercises.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">We regularly update our training manuals. In our school the students are trained on most modern and popular books. Currently, in our school are used such aids as “Cutting Edge” (Longman), “English File” (Oxford University Press) and others.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">In the process of learning in our school we try to use all the exciting new discoveries in methods of teaching foreign languages.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">4. In the school “The Language House” is used the international system of levels of learning (from Beginner to Advanced), there are groups for adults, teenagers and children aged from 5 years. The level of knowledge of students is under strict control during the entire course. After graduation the students are tested on the program of each sublevel and level. After successful completion of one level they are awarded with the special certificates.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">5. We have a large assortment of tools and materials designed for our students.</p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">Regularly updated video library and a library are offered for your use. Presenting books and CDs for home use is over subscription system.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Students with different levels of language will find a lot of interesting:</p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">For beginners we offer an adapted literature (the texts are accompanied by audiocassettes), as well as CDs for learning a foreign language by the method of Kifayat Ahmed gizi.</li></ul><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">In our video library we offer to the attention of students a great selection of movies of different genres in foreign languages that can be shared to watch and discuss. Many films are provided with the original subtitles.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Teachers:</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Professionalism is the main factor of teaching, and our teachers and interpreters demonstrate their professionalism in practice.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Professional standards of our teachers and their teaching abilities are confirmed by diplomas and certificates of foreign language teachers at international level, which is the most common evidence confirming the qualifications of teachers of English in “The Language House”.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">Control over the activities of teachers is implemented by senior teachers or Director of Studies, who not only possess the necessary educational qualifications, but also a wide experience in this position in foreign countries. Director of studies supervises the quality and professionalism of teachers, arrange trainings and seminars for them on improvement of qualification, participate in the development and improvement of curricula, as well as communicate with students, listening to their opinions about teachers, due to which provide correct guidance to teachers.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px;\">In the training:</p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">Do not hesitate to ask questions to teachers, if you do not understand something, because you come here for knowledge.</li></ul><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">You will achieve success if you carefully attend and observe the academic disciplines: don’t be late, to maintain a work environment in the classroom (turn off mobile phones).</li></ul><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">Parents may attend classes.</li></ul><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">“Progress report” is issued on a regular basis for parents, which states the achievements of the student. We request you to regularly have access to this report in order to know about the successes and challenges of your child.</li></ul><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit;\"><li style=\"margin: 0px; padding: 0px;\">“Progress report” is issued routinely for companies, which states the performance of employees to know about the successes and challenges of your employees.</li></ul></div></div></div></div></div></div></div></div></section>', '2021-04-20 19:59:32', '2021-10-18 08:01:07', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL,
  `is_manage` tinyint NOT NULL,
  `remember_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `is_active`, `is_manage`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kifayat', 'Ahmad Gizi', 'mqalayciyev@mail.ru', '+994706151010', '$2y$10$ZU9zp.grpRBEK.hkHa2Y2u8s7cCBhmDTjjCW8WJWvkPoIo1xLBbqq', 1, 1, '6ozChdMgJfMRpH4R6WaCGW3zTLWxCkpAKeUrhR1cv8wzkpy7qSTliTnf9S6s', '2021-04-09 05:15:56', '2021-05-09 14:38:41', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'cours.jpg',
  `price` int DEFAULT NULL,
  `term` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_count` int DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `courses`
--

INSERT INTO `courses` (`id`, `name`, `image`, `price`, `term`, `student_count`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 'English Courses', '1634303569.webp', NULL, NULL, NULL, '<p><span style=\"color: rgb(153, 153, 153); font-family: Roboto; font-size: 15px;\">English language courses are attended by a variety of populations: preschool children, schoolchildren, students, youth, businessmen, housewives ....</span><br></p>', '2021-10-15 09:05:42', '2021-10-15 09:12:49', NULL),
(15, 'Azerbaijani Courses', '1634303727.webp', NULL, NULL, NULL, '<p><span style=\"color: rgb(153, 153, 153); font-family: Roboto; font-size: 15px;\">The program of the full course of Azerbaijani language develops in the students the oral and written language, reading and listening comprehension ....</span><br></p>', '2021-10-15 09:15:13', '2021-10-15 09:15:28', NULL),
(16, 'Russian Courses', '1634303756.webp', NULL, NULL, NULL, '<p><span style=\"color: rgb(153, 153, 153); font-family: Roboto; font-size: 15px;\">The program of the full course of Russian language develops in the students the oral and written language, reading and listening comprehension ....</span><br></p>', '2021-10-15 09:15:45', '2021-10-15 09:15:56', NULL),
(17, 'German Courses', '1634303789.webp', NULL, NULL, NULL, '<p><span style=\"color: rgb(153, 153, 153); font-family: Roboto; font-size: 15px;\">The program of the full course of German language develops in the students the oral and written language, reading and listening comprehension, that is all the basic ....</span><a class=\"smicon-read sc-btn\" target=\"_blank\" href=\"http://www.tlh.az/courses-2/\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); text-decoration: none; color: rgb(44, 51, 57); transition: all 0.3s ease 0s; display: inline-block; border: 0px rgba(0, 0, 0, 0); border-radius: 5px; font-weight: 700; box-shadow: none; font-size: 13px; line-height: 20px; text-transform: uppercase; font-family: &quot;Roboto Slab&quot;; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\"></a></p>', '2021-10-15 09:16:15', '2021-10-15 09:16:30', NULL),
(18, 'Spanish Courses', '1634303815.webp', NULL, NULL, NULL, '<p><span style=\"color: rgb(153, 153, 153); font-family: Roboto; font-size: 15px;\">The program of the full course of Spanish language develops in the students the oral and written language, reading and listening comprehension, that is all the basic ....</span><a class=\"smicon-read sc-btn\" target=\"_blank\" href=\"http://www.tlh.az/courses-2/\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); text-decoration: none; color: rgb(44, 51, 57); transition: all 0.3s ease 0s; display: inline-block; border: 0px rgba(0, 0, 0, 0); border-radius: 5px; font-weight: 700; box-shadow: none; font-size: 13px; line-height: 20px; text-transform: uppercase; font-family: &quot;Roboto Slab&quot;; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\"></a></p>', '2021-10-15 09:16:45', '2021-10-15 09:16:56', NULL),
(19, 'French Courses', '1634303847.webp', NULL, NULL, NULL, '<p><span style=\"color: rgb(153, 153, 153); font-family: Roboto; font-size: 15px;\">The program of the full course of French language develops in the students the oral and written language, reading and listening comprehension, that is all the basic ....</span><a class=\"smicon-read sc-btn\" target=\"_blank\" href=\"http://www.tlh.az/courses-2/\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); text-decoration: none; color: rgb(44, 51, 57); transition: all 0.3s ease 0s; display: inline-block; border: 0px rgba(0, 0, 0, 0); border-radius: 5px; font-weight: 700; box-shadow: none; font-size: 13px; line-height: 20px; text-transform: uppercase; font-family: &quot;Roboto Slab&quot;; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\"></a></p>', '2021-10-15 09:17:12', '2021-10-15 09:17:28', NULL),
(20, 'Italian Courses', '1634303872.webp', NULL, NULL, NULL, '<p><span style=\"color: rgb(153, 153, 153); font-family: Roboto; font-size: 15px;\">The program of the full course of Italian language develops in the students the oral and written language, reading and listening comprehension, that is ....</span><a class=\"smicon-read sc-btn\" target=\"_blank\" href=\"http://www.tlh.az/courses-2/\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); text-decoration: none; color: rgb(44, 51, 57); transition: all 0.3s ease 0s; display: inline-block; border: 0px rgba(0, 0, 0, 0); border-radius: 5px; font-weight: 700; box-shadow: none; font-size: 13px; line-height: 20px; text-transform: uppercase; font-family: &quot;Roboto Slab&quot;; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\"></a></p>', '2021-10-15 09:17:42', '2021-10-15 09:17:53', NULL),
(21, 'TOEFL Courses', '1634303900.webp', NULL, NULL, NULL, '<p><span style=\"color: rgb(153, 153, 153); font-family: Roboto; font-size: 15px;\">In our courses you can individually or in groups prepare for exams of TOEFL and IELTS. Those, who enrolled in training courses can gain experience of ....</span><a class=\"smicon-read sc-btn\" target=\"_blank\" href=\"http://www.tlh.az/courses-2/\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); text-decoration: none; color: rgb(44, 51, 57); transition: all 0.3s ease 0s; display: inline-block; border: 0px rgba(0, 0, 0, 0); border-radius: 5px; font-weight: 700; box-shadow: none; font-size: 13px; line-height: 20px; text-transform: uppercase; font-family: &quot;Roboto Slab&quot;; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\"></a></p>', '2021-10-15 09:18:07', '2021-10-15 09:18:21', NULL),
(22, 'IELTS Courses', '1634303926.webp', NULL, NULL, NULL, '<p><span style=\"color: rgb(153, 153, 153); font-family: Roboto; font-size: 15px;\">In our courses you can individually or in groups prepare for exams of TOEFL and IELTS. Those, who enrolled in training courses can gain experience of ....</span><a class=\"smicon-read sc-btn\" target=\"_blank\" href=\"http://www.tlh.az/courses-2/\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); text-decoration: none; color: rgb(44, 51, 57); transition: all 0.3s ease 0s; display: inline-block; border: 0px rgba(0, 0, 0, 0); border-radius: 5px; font-weight: 700; box-shadow: none; font-size: 13px; line-height: 20px; text-transform: uppercase; font-family: &quot;Roboto Slab&quot;; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\"></a></p>', '2021-10-15 09:18:36', '2021-10-15 09:18:47', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `cours_images`
--

DROP TABLE IF EXISTS `cours_images`;
CREATE TABLE IF NOT EXISTS `cours_images` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `image` (`image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` int UNSIGNED DEFAULT '1',
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `events`
--

INSERT INTO `events` (`id`, `image`, `title`, `text`, `start`, `end`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Ingilis dili gorus', '<p>Her kes qatila biler</p>', '2021-04-15T14:35', '2021-04-15T15:00', 'Zoom', '2021-04-14 03:33:39', '2021-07-04 16:01:21', NULL),
(2, 3, 'Mental Arifmetika üzrə Təlim', '<p><br></p>', '2021-07-02T22:00', '2021-07-02T23:00', 'Zoom', '2021-07-04 16:08:58', '2021-07-04 16:08:58', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `event_images`
--

DROP TABLE IF EXISTS `event_images`;
CREATE TABLE IF NOT EXISTS `event_images` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `event_images`
--

INSERT INTO `event_images` (`id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'event.jpg', NULL, NULL, NULL),
(2, '1618477423.jpg', '2021-04-15 05:03:43', '2021-06-25 12:06:53', '2021-06-25 12:06:53'),
(3, '1624608383.webp', '2021-06-25 12:06:23', '2021-06-25 12:06:23', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'slider_1634279758.webp', 1, '2021-10-18 04:43:44', '2021-04-15 06:54:32', '2021-10-18 04:43:44'),
(2, '1618484105.jpg', 0, '2021-04-15 07:08:23', '2021-04-15 06:55:05', '2021-04-15 07:08:23'),
(3, '1618484110.jpg', 0, '2021-04-15 07:08:13', '2021-04-15 06:55:10', '2021-04-15 07:08:13'),
(4, '1618484110.jpg', 0, '2021-04-15 07:08:19', '2021-04-15 06:55:10', '2021-04-15 07:08:19'),
(5, 'gallery_1634553501.webp', 1, NULL, '2021-04-15 06:55:11', '2021-10-18 06:38:22'),
(6, '1618484111.jpg', 0, '2021-04-15 07:08:27', '2021-04-15 06:55:11', '2021-04-15 07:08:27'),
(7, '1618484111.jpg', 0, '2021-04-15 07:08:31', '2021-04-15 06:55:11', '2021-04-15 07:08:31'),
(8, '1618484112.jpg', 0, '2021-04-15 07:08:35', '2021-04-15 06:55:12', '2021-04-15 07:08:35'),
(9, '1618484112.jpg', 0, '2021-04-15 07:08:39', '2021-04-15 06:55:12', '2021-04-15 07:08:39'),
(10, '1618484112.jpg', 0, '2021-04-15 07:08:43', '2021-04-15 06:55:12', '2021-04-15 07:08:43'),
(11, '1618484530.jpg', 0, '2021-04-15 07:08:47', '2021-04-15 07:02:10', '2021-04-15 07:08:47'),
(12, '1618484705.jpg', 0, '2021-04-15 07:08:52', '2021-04-15 07:05:05', '2021-04-15 07:08:52'),
(13, 'gallery_1634553526.webp', 1, NULL, '2021-10-18 06:38:46', '2021-10-18 07:17:13'),
(14, 'gallery_1634553534.webp', 1, NULL, '2021-10-18 06:38:54', '2021-10-18 07:17:16'),
(15, 'gallery_1634561199.webp', 1, NULL, '2021-10-18 08:46:40', '2021-10-18 08:46:40'),
(16, 'gallery_1634561206.webp', 1, NULL, '2021-10-18 08:46:47', '2021-10-18 08:46:47'),
(17, 'gallery_1634561213.webp', 1, NULL, '2021-10-18 08:46:54', '2021-10-18 08:46:54');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `home_sliders`
--

DROP TABLE IF EXISTS `home_sliders`;
CREATE TABLE IF NOT EXISTS `home_sliders` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `image`, `title_1`, `title_2`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'slider_1634279758.webp', 'Təhsilin məqsədi Biliyin İnkişafıdır', 'Daha Yaxşı Təhsil Alın', 1, '2021-10-18 04:42:50', '2021-04-15 06:54:32', '2021-10-18 04:42:50'),
(2, '1618484105.jpg', 'title 1', 'title 2', 0, '2021-04-15 07:08:23', '2021-04-15 06:55:05', '2021-04-15 07:08:23'),
(3, '1618484110.jpg', 'title 1', 'title 2', 0, '2021-04-15 07:08:13', '2021-04-15 06:55:10', '2021-04-15 07:08:13'),
(4, '1618484110.jpg', 'title 1', 'title 2', 0, '2021-04-15 07:08:19', '2021-04-15 06:55:10', '2021-04-15 07:08:19'),
(5, 'slider_1634279772.webp', NULL, 'Learn languages and connect with the world', 1, NULL, '2021-04-15 06:55:11', '2021-10-18 04:51:37'),
(6, '1618484111.jpg', 'title 1', 'title 2', 0, '2021-04-15 07:08:27', '2021-04-15 06:55:11', '2021-04-15 07:08:27'),
(7, '1618484111.jpg', 'title 1', 'title 2', 0, '2021-04-15 07:08:31', '2021-04-15 06:55:11', '2021-04-15 07:08:31'),
(8, '1618484112.jpg', 'title 1', 'title 2', 0, '2021-04-15 07:08:35', '2021-04-15 06:55:12', '2021-04-15 07:08:35'),
(9, '1618484112.jpg', 'title 1', 'title 2', 0, '2021-04-15 07:08:39', '2021-04-15 06:55:12', '2021-04-15 07:08:39'),
(10, '1618484112.jpg', 'title 1', 'title 2', 0, '2021-04-15 07:08:43', '2021-04-15 06:55:12', '2021-04-15 07:08:43'),
(11, '1618484530.jpg', 'title 1', 'title 2', 0, '2021-04-15 07:08:47', '2021-04-15 07:02:10', '2021-04-15 07:08:47'),
(12, '1618484705.jpg', 'title 1', 'title 2', 0, '2021-04-15 07:08:52', '2021-04-15 07:05:05', '2021-04-15 07:08:52'),
(13, 'slider_1634547021.webp', NULL, 'Learn languages and connect with the world', 1, NULL, '2021-10-18 04:50:22', '2021-10-18 04:51:44');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `leads`
--

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `leads`
--

INSERT INTO `leads` (`id`, `first_name`, `last_name`, `email`, `mobile`, `created_at`, `updated_at`, `deleted_at`) VALUES
(51, 'Mehemmed', 'Qalayciyev', 'qalayciyev@gmail.com', '+994514598208', '2021-10-16 07:41:08', '2021-10-16 07:41:08', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `leads_notes`
--

DROP TABLE IF EXISTS `leads_notes`;
CREATE TABLE IF NOT EXISTS `leads_notes` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `leads` int UNSIGNED NOT NULL,
  `note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leads` (`leads`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `level` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `levels`
--

INSERT INTO `levels` (`id`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Level1', '2021-04-20 17:42:45', '2021-04-21 13:40:32', NULL),
(2, 'Level 2', '2021-04-21 13:42:34', '2021-04-21 13:42:34', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `messages`
--

INSERT INTO `messages` (`id`, `first_name`, `last_name`, `subject`, `email`, `mobile`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'KennethgerryLN', 'KennethgerryLN', 'The best advertising of your products and services!', 'no-replyoremoppy@gmail.com', '83589711958', 'Hi!  emgueducationcenter.com \r\n \r\nDid you know that it is possible to send business offer totally legally? \r\nWe offering a new method of sending appeal through feedback forms. Such forms are located on many sites. \r\nWhen such commercial offers are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nalso, messages sent through communication Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis letter is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\n \r\nWe only use chat.', '2021-05-07 06:30:10', '2021-05-07 06:30:10', NULL),
(3, 'KennethgerryLN', 'KennethgerryLN', 'The best advertising of your products and services!', 'no-replyoremoppy@gmail.com', '81393448318', 'Hi!  emgueducationcenter.com \r\n \r\nDid you know that it is possible to send proposal absolutely lawfully? \r\nWe propose a new method of sending proposal through feedback forms. Such forms are located on many sites. \r\nWhen such commercial offers are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nalso, messages sent through feedback Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis message is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\n \r\nWe only use chat.', '2021-05-09 03:08:25', '2021-05-09 03:08:25', NULL),
(4, 'Mike Gimson', 'Mike Gimson', 'whitehat monthly SEO plans', 'no-reply@google.com', '88998819262', 'Howdy \r\n \r\nI have just took an in depth look on your  emgueducationcenter.com for  the current search visibility and saw that your website could use a push. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart improving your sales and leads with us, today! \r\n \r\nregards \r\nMike Gimson\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-05-11 06:37:51', '2021-05-11 06:37:51', NULL),
(5, 'Mazlan Selvi', 'Mazlan Selvi', 'Please I need your urgent response', 'no-replyflelp@gmail.com', '81783188662', 'Dear Friend, \r\n \r\nMy names are Mr. Mezlan Selvi, a lawyer base in Kuala Lumpur - Malaysia. I have previously sent you an email regarding a transaction of US$13.5 Million left behind by my late client before his tragic death but no response from you. \r\n \r\nHowever, I am contacting you once again with strong believe that you will work /partner with me to execute this business transaction in good faith. Please if you are interested in proceeding with me, kindly respond to me via my private email mselvi@ponnusamylawassociates-my.com for more detailed information. \r\n \r\nAs a matter of fact, this transaction is 100% risk free and I look forward to your acknowledgement. \r\n \r\nRegards, \r\nMr. Mazlan Selvi \r\nEmail: mselvi@ponnusamylawassociates-my.com', '2021-05-13 21:22:24', '2021-05-13 21:22:24', NULL),
(6, 'Mike Oldridge\r\nNE', 'Mike Oldridge\r\nNE', 'Local SEO for more business', 'no-replySwere@gmail.com', '86437732649', 'Good Day \r\n \r\nI have just checked  emgueducationcenter.com for  the current Local search visibility and seen that your website could use a push. \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nStart enhancing your local visibility with us, today! \r\n \r\nregards \r\nMike Oldridge\r\n \r\nSpeed SEO Digital Agency \r\nsupport@speed-seo.net', '2021-05-15 00:51:42', '2021-05-15 00:51:42', NULL),
(7, 'Rajiv Michael', 'Rajiv Michael', 'Do you need funding?', 'rajiindian3@gmail.com', '85682858712', 'Hello Dear, \r\n \r\nI am working directly with a private family portfolio that can provide funding for credible clients with feasible projects. Currently, we have investment funds for viable projects. \r\n \r\nThey are interested in the following: Institution, Library, Hospitals, Green energy, \r\nPower projects, Agriculture and Real Estate. They can also partner with your company on other projects of value. The interest rate and tenure are fantastic. \r\n \r\nYour response is most anticipated if this is of interest to you. Reach me on email: financial@eurocleargroups.email or rajiindian3@gmail.com \r\n \r\n \r\nKind regards, \r\n \r\nRajiv Michael \r\nFinancial Consultant \r\nWhatsApp: +15183802182 \r\nTelegram@ +12092482370 \r\nEuroclear Groups \r\nfinancial@eurocleargroups.email \r\nUrl: http://euroclear.com', '2021-05-25 22:17:34', '2021-05-25 22:17:34', NULL),
(8, 'Beckett WimmerHF', 'Beckett WimmerHF', 'New Project Investment', 'bestvillaco@email-checker.us', '89497149355', 'Good day, \r\n \r\nWe\'re contacting you to have a good business relationship. We currently have a client that is interested in Investing in your Country and would like to engage you and your company on this project. \r\n \r\nKindly respond to this email becwimmer@bestvillaco.com for further details. \r\n \r\nRegards, \r\n \r\nBeckett Wimmer \r\nInvestment Manager \r\nBest Villa, Inc. USA \r\nE: becwimmer@bestvillaco.com', '2021-05-26 08:25:39', '2021-05-26 08:25:39', NULL),
(9, 'Samuel L', 'Samuel L', 'Cold Email Service', 'mail@usaddressgenerator.com', '83274298257', 'Good day, \r\n \r\nYou are receiving this message because our inbox delivery service works with 100% accuracy. \r\n \r\nYou need Cold Emailing to give your business a good Return on Investment in 2021. We can get your Business Proposals, Cover Letters and Messages to Millions of Professionals, CEOs, CFOs, CTOs, MDs, HRs DRs and Business Owners in any location and in various industries such as Real Estate, Construction, Tech, IT, Education, Travels and other sectors. Including Analytics to measure response rate and results. \r\n \r\nWe specialise in delivering cold email messages with 100% inbox delivery. Contact Us Via WhatsApp +971 55 528 4370. \r\n \r\nSamuel L. \r\nCold Email Marketing Expert \r\nCall/Text: +1 (302) 268-6791 \r\nWhatsApp: +971 55 528 4370', '2021-05-26 22:06:41', '2021-05-26 22:06:41', NULL),
(10, 'Yahoo', 'Yahoo', 'Most profitable cryptocurrency miners released', 'press@yahoo.com', '89639797826', 'Most profitable cryptocurrency miners has been released : \r\nDBT Miner: $7,500 (Bitcoin), $13,000 (Litecoin), $13,000 (Ethereum), and $15,000 (Monero) \r\n \r\nGBT Miner: $22,500 (Bitcoin), $39,000 (Litecoin), $37,000 (Ethereum), and $45,000 (Monero) \r\nRead more here : \r\nhttps://www.yahoo.com/now/bitwats-release-most-profitable-asic-195600764.html', '2021-05-27 15:22:12', '2021-05-27 15:22:12', NULL),
(11, 'Sigurdur Thor', 'Sigurdur Thor', 'Inquiry about offer for services - Websites - Ecommerce - Mobile applications', 'sales@techstateagency.com', '81351633776', 'Greetings \r\nMy name is Sigurdur Thor and I am a representant of the company TechState. We are specialists in the fields of web design, marketing services and printing based in Reykjavik, Iceland. We have worked with most important institutions and private sector companies in Iceland since our company was established. We would like to find out if you are interested in getting an offer for any of the services we offer: \r\n \r\n- Websites \r\n- Mobile apps \r\n- Web shops \r\n- Online marketing services \r\n- Graphic design \r\n- Promotion videos \r\n \r\nOur hopes are to build a long-term business connection based on professionalism, trust and confidence along with meeting all of your desires in the field of marketing services, web design and mobile apps development. We continually offer great service at a very competitive prices! \r\n \r\nWith best regards and a wish for a positive response, \r\nSigurdur Thor Fridthorsson, \r\n+354 846 63 14 \r\nPartner and representative, \r\nhttp://techstate.io/', '2021-06-10 18:23:53', '2021-06-10 18:23:53', NULL),
(12, 'Mike Blare\r\nNE', 'Mike Blare\r\nNE', 'Local SEO for more business', 'no-replySwere@gmail.com', '84321399643', 'Good Day \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Blare\r\n \r\nSpeed SEO Digital Agency', '2021-06-11 14:07:21', '2021-06-11 14:07:21', NULL),
(13, 'ThomasSoidaCI', 'ThomasSoidaCI', 'Bulk Supply to Cameroon', 'hrhmbambi@gmail.com', '83336519444', 'Dear Director, \r\nWe are interested in your products. If your company can handle a bulk supply of your products to Cameroon, please contact us. \r\nPlease forward copy of your reply to hrhbahmbi3@oepd.org    Regards HRM Bah Mbi', '2021-06-12 16:29:18', '2021-06-12 16:29:18', NULL),
(14, 'Mike Smith', 'Mike Smith', 'cheap monthly SEO plans', 'no-reply@google.com', '85679654621', 'Hi there \r\n \r\nI have just verified your SEO on  emgueducationcenter.com for its SEO metrics and saw that your website could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nMike Smith\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-06-18 05:21:48', '2021-06-18 05:21:48', NULL),
(15, 'Ashlay Hazalton', 'Ashlay Hazalton', 'How to win casino by free bonus', 'ashlayhazalton36145@gmail.com', '85755622496', 'Hi, this is Chris. \r\nWho win all online casinos by using FREE BONUS. \r\n \r\nWitch mean, I don’t really spend money in online casinos. \r\n \r\nBut I win every time, and actually, everybody can win by following my directions. \r\n \r\neven you can win! \r\n \r\nSo, if you’re the person, who can listen to someone really smart, you should just try!! \r\n \r\nThe best online casino, that I really recommend is, Vera&John. \r\nEstablished in 2010 and became best online casino in the world. \r\n \r\nThey give you free bonus when you charge more than $50. \r\nIf you charge $50, your bonus is going to be $50. \r\n \r\nIf you charge $500, you get $500 Free bonus. \r\nYou can bet up to $1000. \r\n \r\nJust try roulette, poker, black jack…any games with dealers. \r\nBecause dealers always have to make some to win and, only thing you need to do is to be chosen. \r\n \r\nDon’t ever spend your bonus at slot machines. \r\nYOU’RE GONNA LOSE YOUR MONEY!! \r\n \r\nNext time, I will let you know how to win in online casino against dealers!! \r\n \r\nDon’t forget to open your VERA&JOHN account, otherwise you’re gonna miss even more chances!! \r\n \r\n \r\n \r\nOpen Vera&John account (free) \r\nhttps://bit.ly/3wZkpco', '2021-06-22 13:25:58', '2021-06-22 13:25:58', NULL),
(16, 'Mike Mansfield', 'Mike Mansfield', 'Get DA50+ for emgueducationcenter.com', 'corinnecostin932@gmail.com', '89336896311', 'Hi there \r\n \r\nIncrease your emgueducationcenter.com Moz DA Score with us and get more visibility and exposure for your website. \r\nWe have tons of client`s feedbacks that this simple boost doubled their sales in a matter of weeks. \r\n \r\nMore info: \r\nhttps://www.monkeydigital.org/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.org/product/ahrefs-dr50-ur70-seo-plan/ \r\nhttps://www.monkeydigital.org/product/trust-flow-seo-package/ \r\n \r\n \r\nthank you \r\nMike Mansfield', '2021-07-01 21:45:01', '2021-07-01 21:45:01', NULL),
(17, 'Eric Nilsson', 'Eric Nilsson', 'Biggest Discount Ever, Don\'t miss this. Bundesdrugsonline.com', 'erythroxylum.coca.seeds11@gmail.com', '86179347814', 'We sell Research Chemicals, Cocaine, Coca Seeds, Coca Leaves, Coca Powder, Marijuana, Weed, Cannabis, Opioids, Ecstasy Pills, Pain Relief, HGH/HCG, Nembutal Pentobarbital, Blotters, Hashish, Heroin, we can be a solution to both Hard and Soft drugs, legal and illegal drugs. Guns for self protection and family protection as well with best prices. \r\n \r\nMinimum order 100€ \r\n \r\nFree shipping for order over 300€ \r\n \r\nDiscreet packaging. \r\n \r\nOvernight shipping with DHL, TNT, UPs or others tracking number \r\n \r\nWe ship worldwide. \r\n \r\nDelivery in EU 1-3 days and other countries out of EU 2-4 days. \r\n \r\nWe ship and e-mail you tracking number and shipping company name \r\n \r\nOur packaging being totally discrete and most secure, vacuum sealed and air tight, no custom problem as per shipment, totally safe purchase and MONEY BACK GUARANTEE if you are not satisfied with our quality or failure to get there. \r\n \r\n100% Customer Satisfaction Guaranteed. \r\n \r\n \r\nYour personal details are 1000% SECURE. \r\n \r\nYour orders are 1000% Secure and Anonymous. \r\n \r\n \r\nPayment: Western Union, MoneyGram, Bank Transfer, Bitcoin, Paypal Etc \r\n \r\nEmail: sales@bundesdrugsonline.com \r\nWhatsapp: +4915218246599 \r\nTele: +4915217748777 \r\nWebsite: https://bundesdrugsonline.com', '2021-07-02 09:44:40', '2021-07-02 09:44:40', NULL),
(18, 'SEO X Press Digital Agency', 'SEO X Press Digital Agency', 'Ultimate SEO Solutions for emgueducationcenter.com', 'denisesupe32@gmail.com', '83161928332', 'Hello \r\n \r\n \r\nI have just checked  emgueducationcenter.com for the  ranking keywords and saw that your website could use an upgrade. \r\n \r\n \r\nWe will enhance your Ranks organically and safely, using only whitehat methods, \r\n \r\n \r\nIf interested, please email us \r\n \r\nsupport@digital-x-press.com \r\n \r\n \r\nregards \r\nMike Goldman\r\n \r\nSEO X Press Digital Agency \r\nhttps://www.digital-x-press.com', '2021-07-03 18:01:40', '2021-07-03 18:01:40', NULL),
(19, 'Eric', 'Jones', 'Strike when the iron’s hot', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found emgueducationcenter.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=emgueducationcenter.com', '2021-07-06 08:51:19', '2021-07-06 08:51:19', NULL),
(20, 'Yasuhiro Yamada', 'Yasuhiro Yamada', 'Representative Request', 'info.rohtopharmaceutical@gmail.com', '89619477225', 'Hello, \r\n \r\n \r\nWith all due respect. If you are based in United States or Canada, I write to inform you that we need you to serve as our Spokesperson/Financial Coordinator for our company ROHTO PHARMACEUTICAL CO., LTD. and its clients in the United States and Canada. It\'s a part-time job and will only take few minutes of your time daily and it will not bring any conflict of interest in case you are working with another company. If interested reply me using this email address: admin@rohtopharmaceutical.jp \r\n \r\n \r\nYasuhiro Yamada \r\nSenior Executive Officer, \r\nROHTO Pharmaceutical Co.,Ltd. \r\n1-8-1 Tatsumi-nishi, \r\nIkuno-Ku, Osaka, 544-8666, \r\nJapan.', '2021-07-07 09:40:59', '2021-07-07 09:40:59', NULL),
(21, 'Mike Day\r\nNE', 'Mike Day\r\nNE', 'Local SEO for more business', 'waincharlette215@gmail.com', '82599947865', 'Hi \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Day\r\n \r\nSpeed SEO Digital Agency', '2021-07-09 08:45:43', '2021-07-09 08:45:43', NULL),
(22, 'Jules Moreau', 'Jules Moreau', 'Biggest Discount Ever, Don\'t miss this. Bundesdrugsonline.com', 'erythroxylum.coca.seeds11@gmail.com', '84442731641', 'We sell Research Chemicals, Cocaine, Coca Seeds, Coca Leaves, Coca Powder, Marijuana, Weed, Cannabis, Opioids, Ecstasy Pills, Pain Relief, HGH/HCG, Nembutal Pentobarbital, Blotters, Hashish, Heroin, we can be a solution to both Hard and Soft drugs, legal and illegal drugs. Guns for self protection and family protection as well with best prices. \r\n \r\nMinimum order 100€ \r\n \r\nFree shipping for order over 300€ \r\n \r\nDiscreet packaging. \r\n \r\nOvernight shipping with DHL, TNT, UPs or others tracking number \r\n \r\nWe ship worldwide. \r\n \r\nDelivery in EU 1-3 days and other countries out of EU 2-4 days. \r\n \r\nWe ship and e-mail you tracking number and shipping company name \r\n \r\nOur packaging being totally discrete and most secure, vacuum sealed and air tight, no custom problem as per shipment, totally safe purchase and MONEY BACK GUARANTEE if you are not satisfied with our quality or failure to get there. \r\n \r\n100% Customer Satisfaction Guaranteed. \r\n \r\n \r\nYour personal details are 1000% SECURE. \r\n \r\nYour orders are 1000% Secure and Anonymous. \r\n \r\n \r\nPayment: Western Union, MoneyGram, Bank Transfer, Bitcoin, Paypal Etc \r\n \r\nEmail: sales@bundesdrugsonline.com \r\nWhatsapp: +4915218246599 \r\nTele: +4915217748777 \r\nWebsite: https://bundesdrugsonline.com', '2021-07-09 15:47:11', '2021-07-09 15:47:11', NULL),
(23, 'Mike Longman', 'Mike Longman', 'cheap monthly SEO plans', 'orsborntori32@gmail.com', '88376857218', 'Hi \r\n \r\nI have just analyzed  emgueducationcenter.com for its SEO metrics and saw that your website could use a push. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nMike Longman\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-07-16 22:25:14', '2021-07-16 22:25:14', NULL),
(24, 'SEO X Press Digital Agency', 'SEO X Press Digital Agency', 'Ultimate SEO Solutions for emgueducationcenter.com', 'abelsolis7162@gmail.com', '84834818513', 'Good Day \r\n \r\n \r\nI have just took a look on your SEO for  emgueducationcenter.com for its SEO ranks and saw that your website could use a push. \r\n \r\n \r\nWe will increase your Ranks organically and safely, using only whitehat methods, \r\n \r\n \r\nIf interested, please email us \r\n \r\nsupport@digital-x-press.com \r\n \r\n \r\nregards \r\nMike Forman\r\n \r\nSEO X Press Digital Agency \r\nhttps://www.digital-x-press.com', '2021-07-29 09:00:16', '2021-07-29 09:00:16', NULL),
(25, 'Mike Jones\r\nNE', 'Mike Jones\r\nNE', 'Local SEO for more business', 'christinefloyd7162@gmail.com', '85115189661', 'Greetings \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Jones\r\n \r\nSpeed SEO Digital Agency', '2021-08-06 20:39:37', '2021-08-06 20:39:37', NULL),
(26, 'Alain De Vries', 'Alain De Vries', 'A new way of advertising.', 'no-replyoremoppy@gmail.com', '87466955364', 'Good day!  emgueducationcenter.com \r\n \r\nDo you know the simplest way to point out your products or services? Sending messages using contact forms will allow you to simply enter the markets of any country (full geographical coverage for all countries of the world).  The advantage of such a mailing  is that the emails that will be sent through it\'ll end up within the mailbox that\'s meant for such messages. Sending messages using Feedback forms isn\'t blocked by mail systems, which implies it is guaranteed to reach the recipient. You will be ready to send your offer to potential customers who were antecedently unobtainable thanks to email filters. \r\nWe offer you to test our service for free of charge. We are going to send up to fifty thousand message for you. \r\nThe cost of sending one million messages is us $ 49. \r\n \r\nThis message is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWe only use chat.', '2021-08-11 02:10:50', '2021-08-11 02:10:50', NULL),
(27, 'Mike Jones', 'Mike Jones', 'quality monthly SEO plans', 'trumanthomas7162@gmail.com', '82714737449', 'Hi there \r\n \r\nI have just took an in depth look on your  emgueducationcenter.com for  the current search visibility and saw that your website could use a boost. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\nregards \r\nMike Jones\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-08-12 02:04:46', '2021-08-12 02:04:46', NULL),
(28, 'Charlie Meyer', 'Charlie Meyer', 'Enquiry from Website', 'trymonday.com@gmail.com', '84531758133', 'Hey I just checked your social media page and saw that you hadn’t posted much recently. \r\n \r\nI’m guessing it’s because you’re too busy? \r\n \r\nI stumbled across an amazing new tool the other day, which allows you to create social media content in a few seconds. \r\n \r\nIt’s literally changed my life!!! \r\n \r\nIt’s called Content Xpress and is cheap as chips to use: \r\nhttps://Contentxpress.co \r\n \r\nIn less than 2 minutes a day, I can create content for Facebook, Instagram, LinkedIn posts and stories. \r\n \r\nIt allows me to connect regularly with my audience without the hassle. \r\n \r\n \r\nAnyway give it a try, I think you’ll love it! \r\n \r\nCharlie :) \r\n \r\nhttps://Contentxpress.co', '2021-08-18 06:07:19', '2021-08-18 06:07:19', NULL),
(29, 'Eric', 'Jones', 'There they go…', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at emgueducationcenter.com.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=emgueducationcenter.com', '2021-08-18 23:38:55', '2021-08-18 23:38:55', NULL),
(30, 'SEO X Press Digital Agency', 'SEO X Press Digital Agency', 'Get more dofollow backlinks for emgueducationcenter.com', 'no-replyoremoppy@gmail.com', '81217239113', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Jenkin\r\n \r\nsupport@digital-x-press.com', '2021-08-26 11:59:27', '2021-08-26 11:59:27', NULL),
(31, 'Gabriel Angelo', 'Gabriel Angelo', 'Project/Business financing', 'gafinanc.i.e.r@gmail.com', '88483449991', 'Dear Entrepreneur, \r\n \r\nI\'m Gabriel Angelo, My company can bridge funds for your new or ongoing business. do let me know when you receive this message for further procedure. \r\n \r\nWe also pay 1% commission to brokers and friends who introduce project owners for finance or other opportunities. \r\n \r\nYou can reach me directly using this email address: gabriel_angelo@nestalconsultants.com \r\n \r\nRegards, \r\nGabriel Angelo', '2021-08-29 17:50:21', '2021-08-29 17:50:21', NULL),
(32, 'Mike Cook\r\nNE', 'Mike Cook\r\nNE', 'Local SEO for more business', 'adrianagoodall3262@gmail.com', '82378319748', 'Hi there \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Cook\r\n \r\nSpeed SEO Digital Agency', '2021-08-30 13:32:39', '2021-08-30 13:32:39', NULL),
(33, 'Mike Williams', 'Mike Williams', 'cheap monthly SEO plans', 'no-replyflelp@gmail.com', '84366558541', 'Howdy \r\n \r\nI have just verified your SEO on  emgueducationcenter.com for the ranking keywords and saw that your website could use an upgrade. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\nregards \r\nMike Williams\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-09-08 20:42:32', '2021-09-08 20:42:32', NULL),
(34, 'Mike Adamson', 'Mike Adamson', 'Local SEO for more business', 'no-replyflelp@gmail.com', '81214926934', 'Good Day \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Adamson\r\n \r\nSpeed SEO Digital Agency', '2021-10-01 14:29:19', '2021-10-01 14:29:19', NULL),
(35, 'Mike Kelly', 'Mike Kelly', 'Get more dofollow backlinks for emgueducationcenter.com', 'no-replyflelp@gmail.com', '83894153295', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Kelly\r\n \r\nsupport@digital-x-press.com', '2021-10-04 19:05:13', '2021-10-04 19:05:13', NULL),
(36, 'Eric', 'Jones', 'There they go…', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at emgueducationcenter.com.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=emgueducationcenter.com', '2021-10-06 09:01:46', '2021-10-06 09:01:46', NULL),
(37, 'Mike Stephen', 'Mike Stephen', 'cheap monthly SEO plans', 'no-replyflelp@gmail.com', '85611421559', 'Good Day \r\n \r\nI have just verified your SEO on  emgueducationcenter.com for the ranking keywords and saw that your website could use an upgrade. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our plans here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart improving your sales and leads with us, today! \r\n \r\nregards \r\nMike Stephen\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2021-10-06 20:44:35', '2021-10-06 20:44:35', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `method`
--

DROP TABLE IF EXISTS `method`;
CREATE TABLE IF NOT EXISTS `method` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `method`
--

INSERT INTO `method` (`id`, `text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<h2 style=\"margin: 20px 0px 10px; padding: 0px; font-family: &quot;Roboto Slab&quot;; font-weight: 700; line-height: 1.6em; color: rgb(51, 51, 51); font-size: 28px;\">Our Methodology:</h2><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">Intensive method of Kifayat Ahmed gizi.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">At first, learn to speak, understand and then write.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">Anyone wishing to learn a foreign language set for themselves a goal. Someone seeking to obtain the fundamental knowledge to read and translate with the help of dictionary the business correspondence at work and someone wants to give a lecture at a prestigious foreign university, to leave for permanent residence abroad, get a job in a foreign company, to correspond with friends and etc.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">Different objectives are achieved by different means. Continuous training is considered as a rule for those who really want to master a foreign language and knows that good results can be achieved only with hard works. Only such purposeful persons and those, who seek perfection in all come to the course “The Language House”, wishing to communicate in a foreign language.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">In accordance with the methods of teaching English language classes are taught in groups of 8 persons. Maximum number of students in our group is 6 people. Since the main purpose of education is the ability to freely express their thoughts in a foreign language, then this number of students considered to be the best. In this case, the teacher can divide students into sub-groups or pairs, giving them a collective task. Joint training of students adds to their vocabulary through constant perception of vocabulary and expressions in communicating as a teacher and with fellow students.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">Teacher also organizes collective debate, conducts role-playing games. In doing so he/she chooses topic of conversation, asks leading questions, controls to ensure that every student can express their opinions.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">To enhance the learning experience and make more effective consolidation of memory in new verbal forms, teacher supplements the oral and written exercises with video and audio materials on computers. Students watching the modern movies, read newspapers and magazines, listen to news and songs on the radio, which greatly accelerates the process of overcoming the language barrier. Students also have the opportunity to use other sources, including diverse literature in the target language and self-study at home.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">The versatility of methods of teaching English and other foreign languages used by the teachers of “The Language House” combines all links necessary for a successful education: the development of speaking, the study of theory and writing practice, familiarity with modern linguistic and cultural foundations of geography, use of the obtained knowledge in real life. Because of this, the effect of training of foreign language courses in “The Language House” is visible already after the first class.</p>', '2021-04-20 19:59:32', '2021-10-15 10:33:58', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2021_04_09_082743_create_admins_table', 1),
(18, '2021_04_12_102328_create_leads_table', 2),
(32, '2014_10_12_100000_create_password_resets_table', 3),
(33, '2021_04_12_102556_create_courses_table', 3),
(34, '2021_04_12_102616_create_tests_table', 3),
(35, '2021_04_12_102648_create_test_scores_table', 3),
(36, '2021_04_12_102702_create_news_table', 3),
(37, '2021_04_12_102717_create_events_table', 3),
(38, '2021_04_12_102741_create_teachers_table', 3),
(39, '2021_04_12_102801_create_vacancies_table', 3),
(40, '2021_04_12_102854_create_messages_table', 3),
(41, '2021_04_12_102910_create_about_table', 3),
(42, '2021_04_12_103313_create_leads_notes_table', 3),
(43, '2021_04_12_104025_create_questions_table', 3),
(44, '2021_04_12_105350_create_news_images_table', 3),
(45, '2021_04_12_105409_create_event_images_table', 3),
(47, '2021_04_14_100017_create_test_users_table', 5),
(48, '2021_04_14_100459_create_levels_table', 5),
(49, '2021_04_15_092219_create_home_sliders_table', 6),
(50, '2021_04_19_055730_create_cours_images_table', 7),
(51, '2021_04_19_060024_create_test_images_table', 7),
(52, '2021_04_19_101938_create_test_results_table', 8);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` int UNSIGNED DEFAULT '1',
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_image_foreign` (`image`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `news`
--

INSERT INTO `news` (`id`, `image`, `title`, `text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 25, 'Kifayat Ahmad Gizi', '<h5 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-top: 10px; margin-bottom: 10px; font-size: 14px;\"><b>Kifayat Ahmad Gizi Web Saytimiz yeni gorkemine qovusdu.</b></h5><h5 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-top: 10px; margin-bottom: 10px; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><b><br></b></h5>', '2021-04-14 03:41:37', '2021-10-16 02:44:58', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `news_images`
--

DROP TABLE IF EXISTS `news_images`;
CREATE TABLE IF NOT EXISTS `news_images` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `news_images`
--

INSERT INTO `news_images` (`id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'news.webp', NULL, '2021-04-15 04:41:35', NULL),
(21, '1618483287.jpg', '2021-04-15 06:41:27', '2021-04-15 06:41:27', NULL),
(22, '1624608277.webp', '2021-06-25 12:04:37', '2021-06-25 12:05:50', '2021-06-25 12:05:50'),
(23, '1624608342.webp', '2021-06-25 12:05:42', '2021-06-25 12:05:42', NULL),
(24, '1624608451.webp', '2021-06-25 12:07:31', '2021-06-25 12:07:31', NULL),
(25, '1634306798.webp', '2021-10-15 10:06:38', '2021-10-15 10:06:38', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `deleted_at`) VALUES
(1, 'admin@educationcenter.az', 'qqIx0x0tZF8bwq7dJpIv1eJbkkW3b6SQ0UN4HlrL1sumyP5lIZ0WvGL2mDrR', '2021-04-20 13:16:57', NULL),
(2, 'admin@educationcenter.az', 'X0WjaKNSG0gnG3tF06afpaTpmuCon1tbP1BKsYCGr35hv41lkRYmRia5wj4C', '2021-04-20 13:44:38', NULL),
(3, 'admin@educationcenter.az', 'UlNuiiRIbYpazT9HFET9N6klWl0JnyJRCvzAMKEchCM71DqvDUlSmdmMnuT7', '2021-04-20 13:45:20', NULL),
(4, 'education.center.m.e@gmail.com', '2kCPyqpWtJCsE9d6AMrSZhhV4wYw6hjn1HSP094mmplMOxdfl0nobO0vwqmt', '2021-04-20 13:50:29', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `test` int UNSIGNED NOT NULL,
  `question` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_true` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_4` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_5` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test` (`test`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `studies`
--

DROP TABLE IF EXISTS `studies`;
CREATE TABLE IF NOT EXISTS `studies` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student` int DEFAULT '0',
  `teacher` int DEFAULT '0',
  `graduated` int DEFAULT '0',
  `instagram` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `studies`
--

INSERT INTO `studies` (`id`, `logo`, `address`, `mobile`, `phone`, `map`, `email`, `student`, `teacher`, `graduated`, `instagram`, `facebook`, `twitter`, `youtube`, `text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'logo.png', 'Cefer Cabbarli 44 Caspian Plaza', '+994 ** *** ** **', '+994 ** *** ** **', NULL, 'info@mail.ru', 0, 0, 0, 'https://instagram.com/', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://youtube.com/', '<h2 style=\"margin: 20px 0px 10px; padding: 0px; font-family: &quot;Roboto Slab&quot;; font-weight: 700; line-height: 1.6em; color: rgb(51, 51, 51); font-size: 28px;\">Group lessons (General):</h2><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">The most popular among those wishing to study</p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><li style=\"margin: 0px; padding: 0px;\">Azerbaijan</li><li style=\"margin: 0px; padding: 0px;\">English</li><li style=\"margin: 0px; padding: 0px;\">Russian Language</li><li style=\"margin: 0px; padding: 0px;\">German</li><li style=\"margin: 0px; padding: 0px;\">French</li><li style=\"margin: 0px; padding: 0px;\">Italian</li><li style=\"margin: 0px; padding: 0px;\">Spanish</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">are usually courses of General English, General Azerbaijani, General Russian, General Deutsch, General French, General Italiano, General Spanish (common foreign language courses) considered for 3-6-12 months, which are the most effective way of learning foreign languages.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">General course of foreign languages at the school of “The Language House” consists of several stages of learning, designed for students with different levels of proficiency.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">The process of learning in the classroom on “the Common Foreign language courses” aimed at the same linguistic development of students: speaking, reading, writing and listening. It should be noted that the basis for teaching is the communicative teaching method, that is, when the lessons are conducted in a foreign language. However, a significant place is given also to the study of grammar and vocabulary of English.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">In the classroom is conducted oral collective and individual and written inquiry of students: writing summaries, essays, tests and testing. Learning a foreign language is also carried out using video and audio materials, teaching aids of popular foreign publishers and personal method of Kifayat Ahmed gizi.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Individual classes:</span></p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">Foreign language teaching is conducted both in group and in individual form. Private lessons with a qualified teacher are more convenient for students and meet all their requirements in all respects.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">Individual lessons in foreign languages are more demanded due to the following benefits:</p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><li style=\"margin: 0px; padding: 0px;\">Teacher issues the curriculum in accordance with the personal wishes of the student and taking into account its individual characteristics. In this form of training a teacher can devote more time to any particular grammar or vocabulary questions, as well as to change the subject of the lesson.</li></ul><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><li style=\"margin: 0px; padding: 0px;\">The student has the right to determine the required number of lessons for him and to influence the exercise intensity.</li></ul><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><li style=\"margin: 0px; padding: 0px;\">During an individual form of training in order to achieve the required learning outcomes it is required fewer academic hours than in group form. This demonstrates the increased efficiency of the so-called one-to-one lessons.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">English language courses in school of “The Language House” take place without the home exercise on the method of Kifayat Ahmed gizi.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Corporate Training:</span></p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">English language courses for corporate clients (in company offices).</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">“The Language House” is engaged in corporate learning of foreign languages. We specialize in teaching by visit to the office, terminals to the employees of oil and gas companies. We have extensive experience (program of “English for Seamen”).</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Our advantages:</span></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><li style=\"margin: 0px; padding: 0px;\">&nbsp;Prestigious clients.</li><li style=\"margin: 0px; padding: 0px;\">&nbsp;Consideration of the features of business firms and adapting programs to the learning objectives.</li><li style=\"margin: 0px; padding: 0px;\">&nbsp;Our instructors are internationally recognized certificates.</li><li style=\"margin: 0px; padding: 0px;\">&nbsp;The work of teachers is controlled by the Director of courses that ensures the quality of teaching.</li><li style=\"margin: 0px; padding: 0px;\">&nbsp;Convenient terms of training. Students can choose courses of varying duration and intensity.</li><li style=\"margin: 0px; padding: 0px;\">&nbsp;Provide an individual approach, that is, for each company secured a manager, who coordinates all the work.</li><li style=\"margin: 0px; padding: 0px;\">&nbsp;Method of learning of a foreign language by the method of Kifayat Ahmed gizi without home exercise is very beneficial for companies.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Types of programs:</span></p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">General course of foreign languages:</span></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 25px; padding: 0px; list-style: inherit; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><li style=\"margin: 0px; padding: 0px;\">English</li><li style=\"margin: 0px; padding: 0px;\">German</li><li style=\"margin: 0px; padding: 0px;\">French</li><li style=\"margin: 0px; padding: 0px;\">Italian</li><li style=\"margin: 0px; padding: 0px;\">Spanish, etc.</li><li style=\"margin: 0px; padding: 0px;\">Russian and Azeri as a Foreign Language</li><li style=\"margin: 0px; padding: 0px;\">General Business English Course</li><li style=\"margin: 0px; padding: 0px;\">speaking course</li><li style=\"margin: 0px; padding: 0px;\">courses that are created by the order (legal English, correspondence, presentations, negotiations and etc.)</li><li style=\"margin: 0px; padding: 0px;\">exam classes.</li><li style=\"margin: 0px; padding: 0px;\">visiting programs on request.</li></ul><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Conversation Club:</span></p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Conversational English</span></p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">For those who own grammar, but has difficulty in communicating, suitable conversational English courses. This English course is designed to overcome the language barrier and vocabulary, the practical application of existing knowledge of grammar.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">General English</span></p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">This English course is designed to overcome the language barrier, increase vocabulary, and enhance existing knowledge of grammar. The course is designed for groups with a level from Pre-Intermediate to Advanced.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">After learning of spoken English language course you will freely and intelligently express your thoughts. For each group are selected individual tutorials. Teachers also use the artistic and journalistic literature, audio and video materials, multimedia resources and the Internet.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Test in foreign languages:</span></p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">Before you start improving you knowledge of foreign language you need to determine at what level you know the language. In order to verify your language level, you should pass a written and oral test in the chosen foreign language. Our school offers you to take a free test.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">By oral and written tests on the computer, which will is conducted by a teacher in our school you must register in advance. After passing the written and oral interview your level of proficiency will be determined that allows you to select a suitable group and begin to improve the language.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">You will be offered tests consisting of 50 questions. From four options of answers you should select the one which you think is correct. Time testing is designed for 60 minutes.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">The result of your test and the corresponding level of proficiency will be known after the oral and written test.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Roboto; font-size: 15px;\">Try to reasonably distribute the time available to perform tests and be careful when choosing the right answer!</p>', '2021-04-20 19:59:32', '2021-10-18 02:56:54', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'teacher.jpg',
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `teachers`
--

INSERT INTO `teachers` (`id`, `image`, `first_name`, `last_name`, `department`, `language`, `skills`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'teacher.jpg', 'Ramil', 'Məmmədov', 'Full Stack Developer', 'Aze', '<ul><li>HTML5</li><li>CSS3</li><li>Bootstrap</li><li>JavaScript</li><li>JQuery</li><li>React</li></ul>', '2021-04-13 08:09:45', '2021-04-21 12:50:24', '2021-04-21 12:50:24'),
(2, 'teacher.jpg', 'Nigar', 'Vəliyeva', 'Xarici dil', 'English', '<p>General English</p><p>Only Speaking</p><p>Pre-İELTS</p><p>İELTS</p>', '2021-04-20 17:36:32', '2021-04-20 20:31:06', NULL),
(3, 'teacher.jpg', 'Elvina', 'İbrahimova', 'Graphic Design', 'Azərbaycan', '<p>Photoshop</p><p>İllustrator</p><p>İndesign</p><p>CorelDRAW</p>', '2021-04-20 17:39:39', '2021-04-20 20:31:19', NULL),
(4, 'teacher.jpg', 'Maya', 'İbrahimova', 'Office Programs', 'Azərbaycan', '<p>Windows</p><p>Ms Word</p><p>Ms PowerPoint</p><p>Ms Excel</p><p>OneNote</p><p>Outlook</p>', '2021-04-20 17:42:10', '2021-04-20 20:31:30', NULL),
(5, 'teacher.jpg', 'Aytən', 'Quliyeva', 'Xarici dil', 'Fransız dili', '<p>Fransız dili</p>', '2021-04-22 00:14:49', '2021-04-26 19:00:26', '2021-04-26 19:00:26'),
(6, 'teacher.jpg', 'Vəfa', 'İbrahimova', 'Xarici dil', 'Alman dili', '<p>Alman dili</p>', '2021-04-22 00:15:32', '2021-04-22 00:15:32', NULL),
(7, 'teacher.jpg', 'Günəş', 'Hüseynli', 'Abituriyent hazırlığı', 'Azərbaycan', '<p>Kimya</p>', '2021-04-22 00:17:44', '2021-04-22 00:19:20', NULL),
(8, 'teacher.jpg', 'Səbinə', 'Məmmədova', 'Abituriyent hazırlığı', 'Azərbaycan', '<p>Riyaziyyat</p>', '2021-04-22 00:18:55', '2021-04-22 00:18:55', NULL),
(9, 'teacher.jpg', 'Nərmin', 'Qasımova', 'Xarici dil', 'Fransız dili', '<p>Fransız dili</p>', '2021-04-25 13:53:42', '2021-04-25 13:53:42', NULL),
(10, 'teacher.jpg', 'Nəzrin', 'Rəsulzadə', 'Xarici dil', 'Ərəb dili', '<p>Ərəb dili</p>', '2021-05-09 14:40:07', '2021-05-09 14:40:07', NULL),
(11, 'teacher.jpg', 'Cəmilə', 'Əzizova', 'Mental Arifmetika', 'Azərbaycan', '<p>Sürətli hesablama</p>', '2021-05-14 11:16:28', '2021-05-14 11:16:28', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'test.jpg',
  `term` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_count` int NOT NULL DEFAULT '0',
  `level` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tests_ibfk_1` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `tests`
--

INSERT INTO `tests` (`id`, `name`, `image`, `term`, `question_count`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'General English', 'test.jpg', '5', 6, 1, '2021-05-09 15:27:40', '2021-05-14 11:35:15', NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `test_images`
--

DROP TABLE IF EXISTS `test_images`;
CREATE TABLE IF NOT EXISTS `test_images` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `test_results`
--

DROP TABLE IF EXISTS `test_results`;
CREATE TABLE IF NOT EXISTS `test_results` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `test` int UNSIGNED NOT NULL,
  `question` int UNSIGNED NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int UNSIGNED NOT NULL,
  `true` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `current` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question`) USING BTREE,
  KEY `test` (`test`),
  KEY `score` (`score`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `test_scores`
--

DROP TABLE IF EXISTS `test_scores`;
CREATE TABLE IF NOT EXISTS `test_scores` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `test` int UNSIGNED NOT NULL,
  `result` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_scores_test_foreign` (`test`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `vacancies`
--

DROP TABLE IF EXISTS `vacancies`;
CREATE TABLE IF NOT EXISTS `vacancies` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sxemi çıxarılan cedvel `vacancies`
--

INSERT INTO `vacancies` (`id`, `name`, `job_address`, `requirements`, `information`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mühasibat müəllimi', 'Online', 'Təcrübəli', '<p><br></p>', 1, '2021-04-13 10:09:26', '2021-04-22 00:21:46', NULL),
(2, 'Rus dili müəllimi', 'Online', '<p>Təcrübəli</p>', '<p>.</p>', 0, '2021-04-22 00:13:16', '2021-04-22 00:13:16', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`image`) REFERENCES `event_images` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `leads_notes`
--
ALTER TABLE `leads_notes`
  ADD CONSTRAINT `leads_notes_ibfk_1` FOREIGN KEY (`leads`) REFERENCES `leads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`image`) REFERENCES `news_images` (`id`);

--
-- Constraints for table `test_results`
--
ALTER TABLE `test_results`
  ADD CONSTRAINT `test_results_ibfk_2` FOREIGN KEY (`test`) REFERENCES `tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_results_ibfk_3` FOREIGN KEY (`score`) REFERENCES `test_scores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_results_ibfk_4` FOREIGN KEY (`question`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_scores`
--
ALTER TABLE `test_scores`
  ADD CONSTRAINT `test_scores_ibfk_1` FOREIGN KEY (`test`) REFERENCES `tests` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
