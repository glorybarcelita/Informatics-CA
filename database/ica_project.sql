-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 04:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ica_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `status`, `course_name`, `overview`, `created_at`, `updated_at`) VALUES
(1, 'true', 'BSIT', 'Couse ng mga baliw pero gwapo', '2017-10-09 03:10:58', '2017-10-09 03:10:58'),
(2, 'true', 'BSCS', 'agagga', '2017-10-09 06:20:16', '2017-10-09 06:20:16'),
(3, 'true', 'BSVS', 'BS in VS', '2017-10-12 01:15:04', '2017-10-12 01:15:04'),
(4, 'false', 'BSBS', 'success', '2017-10-12 01:16:49', '2017-10-12 01:43:41'),
(5, 'true', 'aaaa', 'aaaa', '2017-10-12 01:20:26', '2017-10-12 01:20:26'),
(6, 'false', 'sample', 'sample', '2017-10-12 01:23:11', '2017-10-12 01:43:51'),
(7, 'false', 'trueasdasd', 'sample description', '2017-10-12 01:23:34', '2017-10-12 01:47:52'),
(8, 'true', 'asdasd', 'asdasda', '2017-10-12 01:24:55', '2017-10-12 01:24:55'),
(9, 'false', 'asdasda', 'sdasdasda', '2017-10-12 01:25:41', '2017-10-12 01:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `ica_subjects`
--

CREATE TABLE `ica_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `icasubj_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `overview` longtext COLLATE utf8mb4_unicode_ci,
  `lecturer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ica_subjects`
--

INSERT INTO `ica_subjects` (`id`, `status`, `icasubj_name`, `course_id`, `overview`, `lecturer_id`, `created_at`, `updated_at`) VALUES
(3, 'pending', 'Math Subjects', 1, 'Sample overview of this ica subject.\n\nthank you. 1', 7, '2017-11-02 06:35:53', '2017-11-13 02:48:15'),
(4, 'active', 'English Subject', 1, 'Sample overview of English ICA Subject for the whole first semester for first year students.', 7, '2017-11-02 06:42:56', '2017-11-13 03:44:28'),
(5, 'pending', 'Another Sample of ICA Subject', 3, 'Sample overview for this sample ICA Subject.', 6, '2017-11-02 07:19:29', '2017-11-02 07:19:29'),
(6, 'pending', 'Sample ICA Subject', 1, 'Sample ICA subject overview.', 6, '2017-11-02 07:23:35', '2017-11-08 04:12:05'),
(7, 'pending', 'JAVA Introduction', 2, 'Overview Sample', 5, '2017-11-07 21:28:07', '2017-11-07 21:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `ica_subjects_topics`
--

CREATE TABLE `ica_subjects_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `ica_subj_id` int(11) NOT NULL,
  `topic_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ica_subjects_topics`
--

INSERT INTO `ica_subjects_topics` (`id`, `ica_subj_id`, `topic_title`, `note`, `created_at`, `updated_at`) VALUES
(12, 4, 'Another Sample', '&lt;table class=\"w3-table-all notranslate k-table\" style=\"box-sizing:inherit;border-spacing:0px;border-collapse:collapse;background-color:#ffffff;width:1050.4px;border:1px solid rgb(204, 204, 204);margin:20px 0px;font-family:Verdana, sans-serif;font-size:15px;\"&gt;&lt;tbody style=\"box-sizing:inherit;\"&gt;&lt;tr style=\"box-sizing:inherit;border-bottom:1px solid rgb(221, 221, 221);\"&gt;&lt;th style=\"box-sizing:inherit;padding:8px 8px 8px 16px;text-align:left;vertical-align:top;\"&gt;Event&lt;/th&gt;&lt;th style=\"box-sizing:inherit;padding:8px;text-align:left;vertical-align:top;width:629.6px;\"&gt;Description&lt;/th&gt;&lt;th style=\"box-sizing:inherit;padding:8px;text-align:left;vertical-align:top;width:74.4px;\"&gt;Try it&lt;/th&gt;&lt;/tr&gt;&lt;tr style=\"box-sizing:inherit;border-bottom:1px solid rgb(221, 221, 221);background-color:#f1f1f1;\"&gt;&lt;td style=\"box-sizing:inherit;padding:8px 8px 8px 16px;vertical-align:top;\"&gt;show.bs.collapse&lt;/td&gt;&lt;td style=\"box-sizing:inherit;padding:8px;vertical-align:top;\"&gt;Occurs when the collapsible element is about to be shown&lt;/td&gt;&lt;td style=\"box-sizing:inherit;padding:8px;vertical-align:top;\"&gt;&lt;a class=\"w3-btn btnsmall\" href=\"https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_collapse_events&amp;amp;stacked=h\" style=\"box-sizing:inherit;background-color:#4caf50;color:#ffffff;border:none;display:inline-block;outline:0px;padding:1px 10px 2px;vertical-align:middle;overflow:hidden;text-align:center;cursor:pointer;white-space:nowrap;user-select:none;float:right;line-height:normal;text-decoration-line:none !important;\" target=\"_blank\"&gt;Try it&lt;/a&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr style=\"box-sizing:inherit;border-bottom:1px solid rgb(221, 221, 221);\"&gt;&lt;td style=\"box-sizing:inherit;padding:8px 8px 8px 16px;vertical-align:top;\"&gt;shown.bs.collapse&lt;/td&gt;&lt;td style=\"box-sizing:inherit;padding:8px;vertical-align:top;\"&gt;Occurs when the collapsible element is fully shown (after CSS transitions have completed)&lt;/td&gt;&lt;td style=\"box-sizing:inherit;padding:8px;vertical-align:top;\"&gt;&lt;a class=\"w3-btn btnsmall\" href=\"https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_collapse_events&amp;amp;stacked=h\" style=\"box-sizing:inherit;background-color:#4caf50;color:#ffffff;border:none;display:inline-block;outline:0px;padding:1px 10px 2px;vertical-align:middle;overflow:hidden;text-align:center;cursor:pointer;white-space:nowrap;user-select:none;float:right;line-height:normal;text-decoration-line:none !important;\" target=\"_blank\"&gt;Try it&lt;/a&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr style=\"box-sizing:inherit;border-bottom:1px solid rgb(221, 221, 221);background-color:#f1f1f1;\"&gt;&lt;td style=\"box-sizing:inherit;padding:8px 8px 8px 16px;vertical-align:top;\"&gt;hide.bs.collapse&lt;/td&gt;&lt;td style=\"box-sizing:inherit;padding:8px;vertical-align:top;\"&gt;Occurs when the collapsible element is about to be hidden&lt;/td&gt;&lt;td style=\"box-sizing:inherit;padding:8px;vertical-align:top;\"&gt;&lt;a class=\"w3-btn btnsmall\" href=\"https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_collapse_events&amp;amp;stacked=h\" style=\"box-sizing:inherit;background-color:#4caf50;color:#ffffff;border:none;display:inline-block;outline:0px;padding:1px 10px 2px;vertical-align:middle;overflow:hidden;text-align:center;cursor:pointer;white-space:nowrap;user-select:none;float:right;line-height:normal;text-decoration-line:none !important;\" target=\"_blank\"&gt;Try it&lt;/a&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr style=\"box-sizing:inherit;border-bottom:1px solid rgb(221, 221, 221);\"&gt;&lt;td style=\"box-sizing:inherit;padding:8px 8px 8px 16px;vertical-align:top;\"&gt;hidden.bs.collapse&lt;/td&gt;&lt;td style=\"box-sizing:inherit;padding:8px;vertical-align:top;\"&gt;Occurs when the collapsible element is fully hidden (after CSS transitions have completed)&lt;/td&gt;&lt;td style=\"box-sizing:inherit;padding:8px;vertical-align:top;\"&gt;&lt;a class=\"w3-btn btnsmall\" href=\"https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_collapse_events&amp;amp;stacked=h\" style=\"box-sizing:inherit;background-color:#4caf50;color:#ffffff;border:none;display:inline-block;outline:0px;padding:1px 10px 2px;vertical-align:middle;overflow:hidden;text-align:center;cursor:pointer;white-space:nowrap;user-select:none;float:right;line-height:normal;text-decoration-line:none !important;\" target=\"_blank\"&gt;Try it&lt;/a&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', NULL, NULL),
(13, 4, 'Sample Topic', '&lt;p style=\"padding:0px;border:0px;font-variant-numeric:inherit;font-size:15px;line-height:inherit;font-family:Arial, \'Helvetica Neue\', Helvetica, sans-serif;vertical-align:baseline;clear:both;color:#242729;background-color:#ffffff;\"&gt;&lt;strong style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;\"&gt;jQuery + Ajax&lt;/strong&gt;&lt;/p&gt;&lt;pre class=\"default prettyprint prettyprinted\" style=\"margin-top:0px;margin-bottom:1em;padding:5px;border:0px;font-variant-numeric:inherit;font-size:13px;line-height:inherit;font-family:Consolas, Menlo, Monaco, \'Lucida Console\', \'Liberation Mono\', \'DejaVu Sans Mono\', \'Bitstream Vera Sans Mono\', \'Courier New\', monospace, sans-serif;vertical-align:baseline;width:auto;max-height:600px;overflow:auto;background-color:#eff0f1;color:#393318;word-wrap:normal;\"&gt;&lt;code style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:13px;line-height:inherit;font-family:Consolas, Menlo, Monaco, \'Lucida Console\', \'Liberation Mono\', \'DejaVu Sans Mono\', \'Bitstream Vera Sans Mono\', \'Courier New\', monospace, sans-serif;vertical-align:baseline;white-space:inherit;\"&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;$&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;(&lt;/span&gt;&lt;span class=\"str\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#7d2727;\"&gt;\"form#data\"&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;).&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;submit&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;(&lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;function&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;(){&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n\r\n    &lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;var&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; formData &lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;=&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;new&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"typ\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#2b91af;\"&gt;FormData&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;(&lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;this&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;);&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n\r\n    $&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;.&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;ajax&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;({&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n        url&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;:&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; window&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;.&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;location&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;.&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;pathname&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;,&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n        type&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;:&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"str\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#7d2727;\"&gt;\'POST\'&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;,&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n        data&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;:&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; formData&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;,&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n        &lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;async&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;:&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;false&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;,&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n        success&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;:&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;function&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;(&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;data&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;)&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;{&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n            alert&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;(&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;data&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;)&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n        &lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;},&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n        cache&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;:&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;false&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;,&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n        contentType&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;:&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;false&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;,&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n        processData&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;:&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;false&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n    &lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;});&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n\r\n    &lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;return&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt; &lt;/span&gt;&lt;span class=\"kwd\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#101094;\"&gt;false&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;;&lt;/span&gt;&lt;span class=\"pln\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;\r\n&lt;/span&gt;&lt;span class=\"pun\" style=\"margin:0px;padding:0px;border:0px;font-style:inherit;font-variant:inherit;font-weight:inherit;font-size:inherit;line-height:inherit;font-family:inherit;vertical-align:baseline;color:#303336;\"&gt;});&lt;/span&gt;&lt;/code&gt;&lt;/pre&gt;', NULL, NULL),
(14, 3, 'Topic No. 3', '&lt;div style=\"margin:0px 14.4px 0px 28.8px;padding:0px;width:436.8px;float:left;font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;background-color:#ffffff;\"&gt;&lt;p style=\"margin-bottom:15px;padding:0px;text-align:justify;\"&gt;&lt;strong style=\"margin:0px;padding:0px;\"&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;div style=\"margin:0px 28.8px 0px 14.4px;padding:0px;width:436.8px;float:right;font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;background-color:#ffffff;\"&gt;&lt;/div&gt;', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ica_subjects_topics_syllabi`
--

CREATE TABLE `ica_subjects_topics_syllabi` (
  `id` int(10) UNSIGNED NOT NULL,
  `ica_subjects_topics` int(11) NOT NULL,
  `syllabus_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ica_subjects_topics_syllabi`
--

INSERT INTO `ica_subjects_topics_syllabi` (`id`, `ica_subjects_topics`, `syllabus_id`, `created_at`, `updated_at`) VALUES
(1, 12, 57, NULL, NULL),
(2, 12, 58, NULL, NULL),
(3, 12, 59, NULL, NULL),
(4, 12, 60, NULL, NULL),
(5, 12, 61, NULL, NULL),
(6, 12, 62, NULL, NULL),
(7, 13, 61, NULL, NULL),
(8, 13, 63, NULL, NULL),
(9, 14, 5, NULL, NULL),
(10, 14, 6, NULL, NULL),
(11, 14, 7, NULL, NULL),
(12, 14, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ica_subject_subjs`
--

CREATE TABLE `ica_subject_subjs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ica_subject_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ica_subject_subjs`
--

INSERT INTO `ica_subject_subjs` (`id`, `ica_subject_id`, `subj_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL),
(2, 3, 2, NULL, NULL),
(3, 4, 7, NULL, NULL),
(4, 4, 15, NULL, NULL),
(5, 5, 6, NULL, NULL),
(6, 5, 13, NULL, NULL),
(7, 6, 3, NULL, NULL),
(8, 6, 8, NULL, NULL),
(9, 6, 9, NULL, NULL),
(10, 6, 10, NULL, NULL),
(11, 7, 20, NULL, NULL),
(12, 3, 3, NULL, NULL),
(13, 3, 4, NULL, NULL),
(14, 3, 5, NULL, NULL),
(15, 3, 6, NULL, NULL),
(16, 3, 8, NULL, NULL),
(17, 4, 5, NULL, NULL),
(18, 4, 10, NULL, NULL),
(19, 4, 12, NULL, NULL),
(20, 5, 8, NULL, NULL),
(21, 5, 9, NULL, NULL),
(22, 8, 1, NULL, NULL),
(23, 8, 2, NULL, NULL),
(24, 8, 5, NULL, NULL),
(25, 8, 6, NULL, NULL),
(26, 3, 7, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_07_091212_create_roles_table', 2),
(4, '2017_10_09_103443_create_courses_table', 3),
(5, '2017_10_13_044330_create_curricula_table', 4),
(6, '2017_10_13_053820_term', 5),
(7, '2017_10_13_055203_create_users_table', 6),
(8, '2017_10_13_055505_create_terms_table', 7),
(9, '2017_10_17_112414_create_terms_table', 8),
(10, '2017_10_17_115413_create_subjects_table', 8),
(11, '2017_10_17_115612_create_syllabi_table', 8),
(13, '2017_10_23_102701_create_ica_subjects_table', 9),
(14, '2017_11_02_142557_create_table_ica_subject_subjs', 10),
(15, '2017_11_03_191155_create_ica_subjects_topics', 11),
(16, '2017_11_03_191733_create_ica_subjects_topics_syllabi', 11);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Registrar', 'Registrar', NULL, NULL),
(2, 'Lecturer', 'Lecturer', NULL, NULL),
(3, 'Student', 'Student', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `subj_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `syllabus_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Subject lecturer. All users with lecturer role.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `course_id`, `year_level`, `term_id`, `subj_code`, `subj_name`, `syllabus_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'MA112', 'Algebra', NULL, 0, '2017-10-17 04:46:31', '2017-10-17 04:46:31'),
(2, 1, 1, 2, 'MA122', 'Trigonometry', NULL, 0, '2017-10-17 04:56:57', '2017-10-17 04:56:57'),
(3, 1, 1, 2, 'SA1', 'Sample Subject', NULL, 0, '2017-10-17 04:57:31', '2017-10-17 04:57:31'),
(4, 2, 2, 3, 'AA', 'AAAAA AAAA', NULL, 0, '2017-10-17 05:00:59', '2017-10-17 05:00:59'),
(5, 3, 3, 3, 'BB', 'BB BB BB', NULL, 0, '2017-10-17 05:04:01', '2017-10-17 05:04:01'),
(6, 2, 1, 2, 'PHY112', 'Physics 2', NULL, 0, '2017-10-17 19:05:05', '2017-10-28 22:21:16'),
(7, 1, 1, 1, 'ENG111', 'Technical Writting', NULL, 0, '2017-10-17 20:09:10', '2017-10-28 22:20:30'),
(8, 3, 1, 1, 'SA123', 'Sample Subject', NULL, 0, '2017-10-18 06:39:07', '2017-10-18 06:39:07'),
(9, 1, 1, 1, 'sample', 'sample', NULL, 0, '2017-10-18 06:46:44', '2017-10-18 06:46:44'),
(10, 1, 1, 1, 'smple1234', 'smple subjet', NULL, 0, '2017-10-21 03:14:27', '2017-10-21 03:14:27'),
(11, 1, 1, 1, '123', 'asldalsdkalsdka', NULL, 0, NULL, NULL),
(12, 2, 2, 1, '12311', 'smple', NULL, 0, NULL, NULL),
(13, 2, 1, 1, 'IT112', 'Introduction to JAVAX', NULL, 0, NULL, '2017-11-07 21:21:34'),
(14, 2, 1, 3, '8787', 'yes fm', NULL, 0, NULL, NULL),
(15, 2, 1, 1, 'ENG101', 'English 1', NULL, 0, NULL, '2017-10-28 22:18:53'),
(16, 2, 1, 2, 'CS113', 'PC Troubleshooting', NULL, 0, NULL, '2017-10-28 22:21:41'),
(17, 3, 1, 1, '912912', 'Home Boy', NULL, 0, NULL, NULL),
(18, 1, 1, 1, 'PHY101', 'Physics', NULL, 0, NULL, '2017-10-28 22:20:50'),
(19, 1, 1, 1, 'ENG101', 'english', NULL, 0, NULL, NULL),
(20, 2, 2, 2, 'IT115', 'sample subject', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `syllabi`
--

CREATE TABLE `syllabi` (
  `id` int(10) UNSIGNED NOT NULL,
  `topics` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj_code` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syllabi`
--

INSERT INTO `syllabi` (`id`, `topics`, `subj_code`, `created_at`, `updated_at`) VALUES
(2, 'sample 1', 'BB', NULL, NULL),
(3, 'sample 2', 'BB', NULL, NULL),
(4, 'sample 3', 'BB', NULL, NULL),
(5, 'Addition', 'MA112', NULL, NULL),
(6, 'Subtraction', 'MA112', NULL, NULL),
(7, 'Multiplication', 'MA112', NULL, NULL),
(8, 'Division', 'MA112', NULL, NULL),
(9, 'addition', 'smple1234', NULL, NULL),
(10, 'subtraction', 'smple1234', NULL, NULL),
(11, 'multipliication', 'smple1234', NULL, NULL),
(12, 'Addition', 'smple1234', NULL, NULL),
(13, 'Subtraction', 'smple1234', NULL, NULL),
(14, 'Multipliication', 'smple1234', NULL, NULL),
(15, 'Topic No. 1', '8981', NULL, NULL),
(16, 'Topic No. 2', '8981', NULL, NULL),
(17, 'Topic No. 3', '8981', NULL, NULL),
(18, 'Topic No. 4', '8981', NULL, NULL),
(20, 'Bbbbb', '12311', NULL, NULL),
(22, 'Aaaaa', '8981', NULL, NULL),
(23, 'Bbbbb', '8981', NULL, NULL),
(24, 'Ccccc', '8981', NULL, NULL),
(25, 'Ddddd', '8981', NULL, NULL),
(27, 'Sample Topic 2', '123', NULL, NULL),
(28, 'Sample Topic 3', '123', NULL, NULL),
(29, '123456', '8787', NULL, NULL),
(30, '1234567', '8787', NULL, NULL),
(31, 'Kjfkalsjfakjs', '912912', NULL, NULL),
(32, 'Aklsjdalksjdalksfj', '912912', NULL, NULL),
(33, 'Rerweoriwor', '912912', NULL, NULL),
(34, 'Asldalskda', '912912', NULL, NULL),
(35, 'Kkkk', 'SA1', NULL, NULL),
(36, 'Ppp', 'SA1', NULL, NULL),
(37, 'Ooo', 'SA1', NULL, NULL),
(38, 'Dddd', 'y', NULL, NULL),
(39, 'Ssss', 'y', NULL, NULL),
(40, 'Aaaa', 'y', NULL, NULL),
(41, 'Wwww', 'y', NULL, NULL),
(42, 'Rrrr', 'MA122', NULL, NULL),
(46, 'Hhhh', 'sample', NULL, NULL),
(47, 'Jjjj', 'sample', NULL, NULL),
(48, 'Ffff', 'sample', NULL, NULL),
(50, 'Aaaa', 'qqq', NULL, NULL),
(51, 'Ssss', 'qqq', NULL, NULL),
(52, 'Fasfafsa', '8981', NULL, NULL),
(54, 'Yehey', '3234', NULL, NULL),
(55, 'Its Perfectly', '3234', NULL, NULL),
(56, 'Working Now!', '3234', NULL, '2017-10-28 18:45:14'),
(57, 'Topic 1', 'ENG111', NULL, NULL),
(58, 'Topic 2', 'ENG111', NULL, NULL),
(59, 'Topic 3', 'ENG111', NULL, NULL),
(60, 'Topic 4', 'ENG111', NULL, NULL),
(61, 'Sample 1', 'ENG101', NULL, NULL),
(62, 'Sample 2', 'ENG101', NULL, NULL),
(63, 'Sample 3', 'ENG101', NULL, NULL),
(64, 'Sampleeee', 'MA122', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `term_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `term_name`, `created_at`, `updated_at`) VALUES
(1, '1st Term', NULL, NULL),
(2, '2nd Term', NULL, NULL),
(3, '3rd Term', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_index` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `activated`, `first_name`, `middle_name`, `last_name`, `school_index`, `birthday`, `contact_no`, `address`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, '1', 'true', 'Jerome', 'R', 'Adriano', '12311333', '1992-07-07', '031157954956', 'marikina, rizal', 'jrmadriano@gmail.com', '$2y$10$J7HveFTdw9O.blPEzQRmQOJiaIA6gq3UKEn7MkUhWfsK27Nil.z/q', 'gEYIjX2mrtRIYBnIx2OBShsgcTMy1G1ddoyLpC8skmuNdfufIUuLDzM9MUls', '2017-10-07 06:22:35', '2017-10-08 05:38:44'),
(4, '1', 'true', 'Glory', 'M', 'Barcelita', '2324234', '1992-08-13', '25461321', 'asasa city', 'ediwaw@gmail.com', '$2y$10$8VzfmbCoD2hwGTuI79ja7.eURcVa1WfdhLUPi7XPOUpMMEeKq0yM2', 'swOBTGwOlK7zmFJSMO43JvSvhORCdFCmFBNRtmO31e9PoKjbEfx9qYlTyUqQ', '2017-10-08 03:04:13', '2017-10-23 01:04:46'),
(5, '2', 'true', 'Juan', 'S', 'Dela Cruz', '41241241', '1992-07-08', '2', 'san roque marikina city', 'jrmadriano@gmail.com16', '$2y$10$.j3PF2MDAqo.UOIcioFQaO9kheXZLm8uQZkrpw/a.CBp9zLO9BCne', 'XstGF6b3sP9FSI18plRb9m6SQnKg5LGJT4xGukmmiOHFhRndOr2uf2deCwiI', '2017-10-08 03:05:19', '2017-10-28 22:08:22'),
(6, '2', 'true', 'Sample', 'S', 'Sample', '12345678', '1992-07-07', '2', 'san roque marikina city', 'jrmadriano1@gmail.com16', '$2y$10$dKSNj4m.zwEaPyJrIsREQeniEPB/4tE6BQZP3G4Vkund9i7RruCIK', NULL, '2017-10-08 03:07:34', '2017-10-12 05:22:06'),
(7, '2', 'true', 'Aldin', 'M', 'Bautista Jr.', '123', '1990-02-15', '2', 'pasig city', 'aldin@aldin.com', '$2y$10$zEvGBSXUGEE8VDDIDMjRxO2nXKToEyhcpiFbAYtrJ3BwtgVsGnwLe', 'dWmiW93AyfC4L6JowO8vICoKBTFWJx8k6sfX3BUKg7tZWfVX655eT5lErhcG', '2017-10-08 03:12:53', '2017-10-28 22:08:41'),
(8, '1', 'true', 'Ediwaws', 'W', 'Waw', '6160002232', '2012-03-07', '12354318', 'kahdkasdasd', 'ediwww@email.com', '$2y$10$sx.1siFyU7RYtQJ0DXIgXeMT3d8zH/iZZJp2DbN2MMw1cYorxZPDq', NULL, '2017-10-08 05:07:10', '2017-11-07 21:25:03'),
(9, '1', 'false', 'Jonathan', 'M', 'Cunanan', '1235486548', '2017-10-25', '165612558665', 'marikina, rizal', 'jonathan@email.com', '$2y$10$w0CitYWpjwW5wVt3cagI4eH5TEOrh/mAfUIoj0W1RCan2Jh8K2Bm6', 'ELsnqMdi6p2iunjJSIxYhn41xMBHQm47Kc0PthsfUiF1GZS9iY1PuD0HJKY0', '2017-10-09 00:07:07', '2017-10-12 19:31:56'),
(10, '1', 'true', 'Asaaaa', 'A', 'Ddd', '12121', '1995-04-07', '1222221', 'eeeeee', 'a@a.com', '$2y$10$cJPgqkKyVbmxpvsSU7sYzOAf4eJkHWhveputt4A3BWplw0tE7hA1W', NULL, '2017-10-17 19:36:42', '2017-10-17 19:36:42'),
(11, '2', 'true', 'John Carlo', 'X', 'Salaveria', '1111111111111111', '1998-06-08', '0999999999', 'Binangonan, Rizal', 'jc@ediwaw.com', '$2y$10$PsIvAaZprNWAI5jx534yqOEd8ml01p93.79FnvC6WbMoeP2NF4t16', NULL, '2017-11-10 04:59:18', '2017-11-10 04:59:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ica_subjects`
--
ALTER TABLE `ica_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ica_subjects_topics`
--
ALTER TABLE `ica_subjects_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ica_subjects_topics_syllabi`
--
ALTER TABLE `ica_subjects_topics_syllabi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ica_subject_subjs`
--
ALTER TABLE `ica_subject_subjs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabi`
--
ALTER TABLE `syllabi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ica_subjects`
--
ALTER TABLE `ica_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ica_subjects_topics`
--
ALTER TABLE `ica_subjects_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ica_subjects_topics_syllabi`
--
ALTER TABLE `ica_subjects_topics_syllabi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ica_subject_subjs`
--
ALTER TABLE `ica_subject_subjs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `syllabi`
--
ALTER TABLE `syllabi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
