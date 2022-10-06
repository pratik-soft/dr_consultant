-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: larademo
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog_tag`
--

DROP TABLE IF EXISTS `blog_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_tag` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int unsigned NOT NULL,
  `tag_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_tag`
--

LOCK TABLES `blog_tag` WRITE;
/*!40000 ALTER TABLE `blog_tag` DISABLE KEYS */;
INSERT INTO `blog_tag` VALUES (1,2,1),(2,2,2),(3,2,3),(4,1,2),(5,1,4),(6,3,2),(7,3,4),(9,4,2),(10,4,4),(11,4,5),(12,4,7),(13,5,1),(14,5,4),(15,9,1),(16,9,4),(17,9,5),(18,14,1),(19,19,2),(20,19,4),(21,18,6),(22,18,7);
/*!40000 ALTER TABLE `blog_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_at` timestamp NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (4,'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia','dolorum-optio-tempore-voluptas-dignissimos-cumque-fuga-qui-quibusdam-quia','2020-12-01 14:19:55','<p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p><blockquote style=\"margin: 20px 0px; overflow: hidden; background-color: rgb(250, 250, 250); padding: 60px; position: relative; text-align: center; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><p style=\"line-height: 1.6; font-style: italic; font-size: 22px;\">Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p></blockquote><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Et quae iure vel ut odit alias.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src=\"https://bootstrapmade.com/demo/templates/Company/assets/img/blog/blog-inside-post.jpg\" class=\"img-fluid\" alt=\"\" style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"></span></p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>','1614435680.jpeg','PUBLISHED',7,1,'2021-02-01 08:51:20','2021-02-28 00:42:17'),(5,'Nisi magni odit consequatur autem nulla dolorem','nisi-magni-odit-consequatur-autem-nulla-dolorem','2021-03-02 14:21:47','<p><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.</span><br></p>','1614435740.jpeg','PUBLISHED',5,0,'2021-02-27 08:52:20','2021-02-27 08:52:20'),(6,'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia','dolorum-optio-tempore-voluptas-dignissimos-cumque-fuga-qui-quibusdam-quia','2020-12-01 14:19:55','<p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p><blockquote style=\"margin: 20px 0px; overflow: hidden; background-color: rgb(250, 250, 250); padding: 60px; position: relative; text-align: center; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><p style=\"line-height: 1.6; font-style: italic; font-size: 22px;\">Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p></blockquote><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Et quae iure vel ut odit alias.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src=\"https://bootstrapmade.com/demo/templates/Company/assets/img/blog/blog-inside-post.jpg\" class=\"img-fluid\" alt=\"\" style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"></span></p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>','1614435680.jpeg','PUBLISHED',4,1,'2021-02-01 08:51:20','2021-02-27 08:51:20'),(7,'Nisi magni odit consequatur autem nulla dolorem','nisi-magni-odit-consequatur-autem-nulla-dolorem','2021-03-09 14:21:47','<p><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.</span><br></p>','1614435740.jpeg','PUBLISHED',7,0,'2021-02-27 08:52:20','2021-02-28 00:41:52'),(8,'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia','dolorum-optio-tempore-voluptas-dignissimos-cumque-fuga-qui-quibusdam-quia','2020-12-01 14:19:55','<p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p><blockquote style=\"margin: 20px 0px; overflow: hidden; background-color: rgb(250, 250, 250); padding: 60px; position: relative; text-align: center; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><p style=\"line-height: 1.6; font-style: italic; font-size: 22px;\">Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p></blockquote><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Et quae iure vel ut odit alias.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src=\"https://bootstrapmade.com/demo/templates/Company/assets/img/blog/blog-inside-post.jpg\" class=\"img-fluid\" alt=\"\" style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"></span></p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>','1614435680.jpeg','PUBLISHED',4,1,'2021-02-01 08:51:20','2021-02-27 08:51:20'),(9,'Nisi magni odit consequatur autem nulla dolorem','nisi-magni-odit-consequatur-autem-nulla-dolorem','2021-03-30 14:21:47','<p><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.</span><br></p>','1614435740.jpeg','PUBLISHED',5,0,'2021-02-27 08:52:20','2021-02-27 08:52:20'),(10,'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia','dolorum-optio-tempore-voluptas-dignissimos-cumque-fuga-qui-quibusdam-quia','2020-12-02 14:52:07','<p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p><blockquote style=\"margin: 20px 0px; overflow: hidden; background-color: rgb(250, 250, 250); padding: 60px; position: relative; text-align: center; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><p style=\"line-height: 1.6; font-style: italic; font-size: 22px;\">Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p></blockquote><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Et quae iure vel ut odit alias.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src=\"https://bootstrapmade.com/demo/templates/Company/assets/img/blog/blog-inside-post.jpg\" class=\"img-fluid\" alt=\"\" style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"></span></p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>','1614435680.jpeg','PUBLISHED',4,1,'2021-02-01 08:51:20','2021-02-27 08:51:20'),(11,'Nisi magni odit consequatur autem nulla dolorem','nisi-magni-odit-consequatur-autem-nulla-dolorem','2021-03-19 14:21:47','<p><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.</span><br></p>','1614435740.jpeg','PUBLISHED',5,0,'2021-02-27 08:52:20','2021-02-27 08:52:20'),(12,'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia','dolorum-optio-tempore-voluptas-dignissimos-cumque-fuga-qui-quibusdam-quia','2020-12-01 14:19:55','<p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p><blockquote style=\"margin: 20px 0px; overflow: hidden; background-color: rgb(250, 250, 250); padding: 60px; position: relative; text-align: center; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><p style=\"line-height: 1.6; font-style: italic; font-size: 22px;\">Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p></blockquote><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Et quae iure vel ut odit alias.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src=\"https://bootstrapmade.com/demo/templates/Company/assets/img/blog/blog-inside-post.jpg\" class=\"img-fluid\" alt=\"\" style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"></span></p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>','1614435680.jpeg','PUBLISHED',4,1,'2021-02-01 08:51:20','2021-02-27 08:51:20'),(13,'Nisi magni odit consequatur autem nulla dolorem','nisi-magni-odit-consequatur-autem-nulla-dolorem','2021-03-05 14:21:47','<p><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.</span><br></p>','1614435740.jpeg','PUBLISHED',5,0,'2021-02-27 08:52:20','2021-02-27 08:52:20'),(14,'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia','dolorum-optio-tempore-voluptas-dignissimos-cumque-fuga-qui-quibusdam-quia','2020-12-01 14:19:55','<p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p><blockquote style=\"margin: 20px 0px; overflow: hidden; background-color: rgb(250, 250, 250); padding: 60px; position: relative; text-align: center; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><p style=\"line-height: 1.6; font-style: italic; font-size: 22px;\">Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p></blockquote><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Et quae iure vel ut odit alias.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src=\"https://bootstrapmade.com/demo/templates/Company/assets/img/blog/blog-inside-post.jpg\" class=\"img-fluid\" alt=\"\" style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"></span></p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>','1614435680.jpeg','PUBLISHED',4,1,'2021-02-01 08:51:20','2021-02-27 08:51:20'),(15,'Nisi magni odit consequatur autem nulla dolorem','nisi-magni-odit-consequatur-autem-nulla-dolorem','2021-03-19 14:21:47','<p><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.</span><br></p>','1614435740.jpeg','PUBLISHED',8,0,'2021-02-27 08:52:20','2021-02-28 00:41:32'),(16,'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia','dolorum-optio-tempore-voluptas-dignissimos-cumque-fuga-qui-quibusdam-quia','2020-12-01 14:19:55','<p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p><blockquote style=\"margin: 20px 0px; overflow: hidden; background-color: rgb(250, 250, 250); padding: 60px; position: relative; text-align: center; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><p style=\"line-height: 1.6; font-style: italic; font-size: 22px;\">Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p></blockquote><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Et quae iure vel ut odit alias.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src=\"https://bootstrapmade.com/demo/templates/Company/assets/img/blog/blog-inside-post.jpg\" class=\"img-fluid\" alt=\"\" style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"></span></p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>','1614435680.jpeg','PUBLISHED',7,1,'2021-02-01 08:51:20','2021-02-28 00:41:21'),(17,'Nisi magni odit consequatur autem nulla dolorem','nisi-magni-odit-consequatur-autem-nulla-dolorem','2021-04-16 14:21:47','<p><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.</span><br></p>','1614435740.jpeg','PUBLISHED',5,0,'2021-02-27 08:52:20','2021-02-27 08:52:20'),(18,'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia','dolorum-optio-tempore-voluptas-dignissimos-cumque-fuga-qui-quibusdam-quia','2020-12-03 14:19:55','<p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p><blockquote style=\"margin: 20px 0px; overflow: hidden; background-color: rgb(250, 250, 250); padding: 60px; position: relative; text-align: center; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><p style=\"line-height: 1.6; font-style: italic; font-size: 22px;\">Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p></blockquote><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Et quae iure vel ut odit alias.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p><p><img src=\"https://bootstrapmade.com/demo/templates/Company/assets/img/blog/blog-inside-post.jpg\" class=\"img-fluid\" alt=\"\" style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\"></span></p><h3 style=\"margin-top: 30px; font-weight: bold; font-size: 22px; font-family: Roboto, sans-serif; color: rgb(77, 70, 67);\">Ut repellat blanditiis est dolore sunt dolorum quae.</h3><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p><p style=\"line-height: 24px; color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>','1614435680.jpeg','PUBLISHED',6,1,'2021-02-01 08:51:20','2021-02-28 00:38:23'),(19,'Nisi magni odit consequatur autem nulla dolorem','nisi-magni-odit-consequatur-autem-nulla-dolorem','2021-03-30 14:21:47','<p><span style=\"color: rgb(77, 70, 67); font-family: &quot;Open Sans&quot;, sans-serif;\">Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.</span><br></p>','1614860540.jpeg','PUBLISHED',4,0,'2021-02-27 08:52:20','2021-03-04 06:52:21');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint DEFAULT NULL,
  `type` tinyint DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Web','web',NULL,2,1,'2021-02-23 08:11:05','2021-02-23 08:33:43'),(2,'App','app',NULL,2,1,'2021-02-23 08:12:26','2021-02-23 08:30:03'),(3,'Card','card',NULL,2,1,'2021-02-23 08:12:26','2021-02-23 08:30:03'),(4,'General','general',NULL,1,1,'2021-02-27 08:46:09','2021-02-27 08:46:09'),(5,'Lifestyle','lifestyle',NULL,1,1,'2021-02-27 08:46:20','2021-02-27 08:46:20'),(6,'Travel','travel',NULL,1,1,'2021-02-27 08:46:31','2021-02-27 08:46:31'),(7,'Design','design',NULL,1,1,'2021-02-27 08:46:43','2021-02-27 08:46:43'),(8,'Creative','creative',NULL,1,1,'2021-02-27 08:46:54','2021-02-27 08:46:54'),(9,'Education','education',NULL,1,1,'2021-02-27 08:47:05','2021-02-27 08:47:05'),(10,'Mobile','mobile',NULL,3,1,'2021-02-28 06:02:11','2021-02-28 06:02:11'),(11,'Web','web',NULL,3,1,'2021-02-28 06:02:23','2021-02-28 06:02:23'),(12,'Hosting & Domain','hosting-domain',NULL,3,1,'2021-02-28 06:02:48','2021-02-28 06:02:48'),(13,'Promotion','promotion',NULL,3,1,'2021-02-28 06:03:16','2021-02-28 06:03:16'),(14,'Design','design',NULL,3,1,'2021-02-28 06:03:42','2021-03-09 07:29:27');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'1614859357.jpeg',1,'2021-02-01 12:42:35','2021-03-04 06:32:37'),(3,'1614859345.jpeg',0,'2021-02-18 07:33:11','2021-03-04 06:32:25'),(4,'1614859334.jpeg',1,'2021-02-01 12:42:35','2021-03-04 06:32:14'),(5,'1614859374.png',1,'2021-02-01 12:42:35','2021-03-04 06:32:54'),(6,'1614859316.jpeg',1,'2021-02-18 07:33:11','2021-03-04 06:31:56');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'question 1','asd sad asd asd asdasdasd',0,'2021-02-17 16:19:29','2021-02-17 11:01:39'),(2,'question 2','this isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asd',1,'2021-02-17 10:58:09','2021-02-17 10:58:09'),(3,'question 3','this isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asd',1,'2021-02-17 10:58:09','2021-02-17 10:58:09'),(4,'question 4','this isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asd',0,'2021-02-17 16:19:29','2021-02-17 11:01:39'),(5,'question 5','this isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asd',1,'2021-02-17 10:58:09','2021-02-17 10:58:09'),(6,'question 6','this isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asdthis isd asd asd this isd asd asdthis isd asd asd this isd asd asd this isd asd asd',1,'2021-02-17 10:58:09','2021-02-17 10:58:09');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_status` tinyint NOT NULL COMMENT '0 => Not Read\r\n1 => Read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inquiries`
--

LOCK TABLES `inquiries` WRITE;
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;
INSERT INTO `inquiries` VALUES (1,'Peter Parker','peterparket@gmail.com','+1 923 234 2342','this is test subject','this is test subject\r\nthis is test subject\r\nthis is test subject\r\nthis is test subject\r\nthis is test subject',1,'2021-01-26 17:19:11','2021-01-27 08:19:50'),(2,'James Tesla','peterparket@gmail.com','+1 923 234 2342','Hello from tesla','this is test subject\r\nthis is test subject\r\nthis is test subject\r\nthis is test subject\r\nthis is test subject',1,'2021-01-26 17:19:11','2021-01-27 08:19:53'),(3,'Eon Musk','peterparket@gmail.com','+1 923 234 2342','I want web development services','this is test subject\r\nthis is test subject\r\nthis is test subject\r\nthis is test subject\r\nthis is test subject',1,'2021-01-26 17:19:11','2021-01-29 09:04:30'),(4,'Frodo Beggins','frodo@admin.com','1234567892','this is subj','aksjhd asdh ladsjkh lakdj',0,'2021-02-09 00:02:29','2021-02-09 00:02:29'),(5,'Frodo Beggins','frodo@admin.com','1234567892','this is subj','aksjhd asdh ladsjkh lakdj',0,'2021-02-09 00:02:29','2021-02-09 00:02:29'),(6,'Adam Gill','adam@gill.com','9876543210','asdk as','akdsjh asd',0,'2021-02-09 00:08:58','2021-02-09 00:08:58'),(7,'Adam Gill','adam@gill.com','9876543210','asdk as','akdsjh asd',0,'2021-02-09 00:08:58','2021-02-09 00:08:58'),(8,'Manager','Test2710@yopmail.com','1234567892','asdasdas','asd ada',0,'2021-02-09 00:09:21','2021-02-09 00:09:21'),(9,'Manager','Test2710@yopmail.com','1234567892','asdasdas','asd ada',0,'2021-02-09 00:09:21','2021-02-09 00:09:21'),(10,'Frodo Beggins','Test2710@yopmail.com','1234567892','this is subj','testing',0,'2021-02-09 00:14:08','2021-02-09 00:14:08'),(11,'Frodo Beggins','Test2710@yopmail.com','1234567892','this is subj','testing',1,'2021-02-09 00:14:08','2021-02-25 08:40:40'),(12,'Frodo Beggins','frodo@admin.com','1234567892','this is subj','asd asd',0,'2021-02-09 00:16:22','2021-02-09 00:16:22'),(13,'Frodo Beggins','frodo@admin.com','1234567892','this is subj','asd asd',0,'2021-02-09 00:16:27','2021-02-09 00:16:27'),(14,'Frodo Beggins','frodo@admin.com','1234567892','this is subj','sad asdas',0,'2021-02-09 00:32:59','2021-02-09 00:32:59'),(15,'Frodo Beggins','frodo@beggins.com','9876543210','This is test subject','This is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subject',0,'2021-02-09 01:04:52','2021-02-09 01:04:52'),(16,'Frodo Beggins','frodo@beggins.com','9876543210','This is test subject','This is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subject',1,'2021-02-09 01:05:07','2021-02-25 08:40:51'),(17,'Frodo Beggins','frodo@beggins.com','9876543210','This is test subject','This is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subjectThis is test subject',1,'2021-02-09 01:06:28','2021-03-09 06:18:14'),(18,'Frodo Beggins','frodo@mailinator.com','1234567892','this is subj','sa asd asd',0,'2021-02-09 01:09:39','2021-02-09 01:09:39'),(19,'Frodo Beggins','frodo@mailinator.com','1234567892','this is subj','as dasd asd',1,'2021-02-09 01:10:00','2021-02-25 08:40:46'),(20,'Testing','Test2710@yopmail.com','1234567892','asd asd','asd asdas',1,'2021-02-10 11:02:58','2021-02-17 08:17:08'),(21,'James Parker','james@gmail.com','9876543210','I want to buy a gold plan','I want to buy a gold plan\nI want to buy a gold plan\nI want to buy a gold plan\nI want to buy a gold plan',1,'2021-03-05 07:50:26','2021-03-15 08:07:54'),(22,'Peter Parket','peter@mailinator.com','9876543210','I want to buy diamond plan','I want to buy diamond plan\nI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond plan\nI want to buy diamond plan\nI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond planI want to buy diamond plan',1,'2021-03-05 07:53:58','2021-03-09 06:18:12');
/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (27,'2014_10_12_000000_create_users_table',1),(28,'2014_10_12_100000_create_password_resets_table',1),(29,'2019_08_19_000000_create_failed_jobs_table',1),(30,'2020_11_21_155900_create_products_table',1),(31,'2020_12_07_123445_create_permission_tables',1),(32,'2020_12_24_063748_create_sessions_table',2),(36,'2021_01_08_141720_create_blogs_table',5),(37,'2021_01_26_155302_create_inquiries_table',6),(41,'2021_02_10_140359_create_subscribers_table',8),(42,'2021_02_17_160111_create_faqs_table',9),(43,'2021_02_18_122403_create_clients_table',10),(44,'2021_02_19_125634_create_positions_table',11),(45,'2021_02_19_132914_create_teams_table',12),(46,'2021_02_20_123735_create_testimonials_table',13),(47,'2021_02_23_132006_create_categories_table',14),(48,'2021_02_23_142315_create_tags_table',15),(49,'2021_02_24_120750_create_services_table',16),(50,'2021_02_24_133556_create_portfolios_table',17),(51,'2016_06_01_000001_create_oauth_auth_codes_table',18),(52,'2016_06_01_000002_create_oauth_access_tokens_table',18),(53,'2016_06_01_000003_create_oauth_refresh_tokens_table',18),(54,'2016_06_01_000004_create_oauth_clients_table',18),(55,'2016_06_01_000005_create_oauth_personal_access_clients_table',18);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` VALUES (2,'App\\Models\\User',2),(6,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(3,'App\\Models\\User',2),(3,'App\\Models\\User',100),(3,'App\\Models\\User',101),(4,'App\\Models\\User',101),(1,'App\\Models\\User',102),(3,'App\\Models\\User',102),(4,'App\\Models\\User',102),(3,'App\\Models\\User',103),(4,'App\\Models\\User',103),(1,'App\\Models\\User',104),(3,'App\\Models\\User',104),(3,'App\\Models\\User',107);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Larademo Personal Access Client','OIKSDKQryYEyiGj6Nwbiw6rvjPs7kJh4Qn8109tp',NULL,'http://localhost',1,0,0,'2021-05-16 07:10:43','2021-05-16 07:10:43'),(2,NULL,'Larademo Password Grant Client','6VRAzGMzT2Wlhl8uYNYa0Oe4WJP4ApjtfWhKz0ZH','users','http://localhost',0,1,0,'2021-05-16 07:10:44','2021-05-16 07:10:44');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2021-05-16 07:10:44','2021-05-16 07:10:44');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'role-list','web','2020-12-07 08:20:08','2020-12-07 08:20:08'),(2,'role-create','web','2020-12-07 08:20:08','2020-12-07 08:20:08'),(3,'role-edit','web','2020-12-07 08:20:08','2020-12-07 08:20:08'),(4,'role-delete','web','2020-12-07 08:20:08','2020-12-07 08:20:08'),(5,'product-list','web','2020-12-07 08:20:08','2020-12-07 08:20:08'),(6,'product-create','web','2020-12-07 08:20:09','2020-12-07 08:20:09'),(7,'product-edit','web','2020-12-07 08:20:09','2020-12-07 08:20:09'),(8,'product-delete','web','2020-12-07 08:20:09','2020-12-07 08:20:09'),(11,'role-view','web','2021-01-18 07:31:55','2021-01-18 07:31:55'),(12,'product-view','web','2021-01-18 07:32:08','2021-01-18 07:32:08'),(13,'user-list','web','2021-01-18 07:32:33','2021-01-18 07:32:33'),(14,'user-create','web','2021-01-18 07:32:42','2021-01-18 07:32:42'),(15,'user-edit','web','2021-01-18 07:32:49','2021-01-18 07:32:49'),(16,'user-delete','web','2021-01-18 07:32:57','2021-01-18 07:32:57'),(17,'user-view','web','2021-01-18 07:33:53','2021-01-18 07:33:53'),(18,'permission-list','web','2021-01-18 07:34:25','2021-01-18 07:34:25'),(22,'permission-delete','web','2021-01-18 07:35:12','2021-01-18 07:35:12'),(23,'blog-list','web','2021-01-18 07:40:43','2021-02-26 07:39:51'),(24,'blog-create','web','2021-01-18 07:40:54','2021-02-26 07:39:38'),(25,'blog-edit','web','2021-01-18 07:41:03','2021-02-26 07:39:25'),(26,'blog-delete','web','2021-01-18 07:41:10','2021-02-26 07:39:13'),(27,'blog-view','web','2021-01-18 07:41:16','2021-02-26 07:39:00'),(38,'inquiry-list','web','2021-01-26 11:15:41','2021-01-26 11:15:41'),(41,'inquiry-delete','web','2021-01-26 11:16:16','2021-01-26 11:16:16'),(43,'permission-create','web','2021-01-30 07:19:49','2021-01-30 07:19:49'),(44,'permission-edit','web','2021-01-30 07:19:55','2021-01-30 07:19:55'),(45,'permission-view','web','2021-01-30 07:20:02','2021-01-30 07:20:02'),(46,'settings','web','2021-02-09 08:31:05','2021-02-09 08:31:05'),(47,'subscriber-list','web','2021-02-10 08:39:24','2021-02-10 08:39:24'),(48,'subscriber-delete','web','2021-02-10 08:39:31','2021-02-10 08:39:31'),(49,'subscriber-edit','web','2021-02-10 08:40:03','2021-02-10 08:40:03'),(50,'subscriber-create','web','2021-02-10 08:40:08','2021-02-10 08:40:08'),(51,'faq-view','web','2021-02-17 10:33:51','2021-02-17 10:33:51'),(52,'faq-delete','web','2021-02-17 10:34:03','2021-02-17 10:34:03'),(53,'faq-edit','web','2021-02-17 10:34:11','2021-02-17 10:34:11'),(54,'faq-create','web','2021-02-17 10:34:21','2021-02-17 10:34:21'),(55,'faq-list','web','2021-02-17 10:34:28','2021-02-17 10:34:28'),(56,'client-list','web','2021-02-18 07:00:24','2021-02-18 07:00:24'),(57,'client-create','web','2021-02-18 07:00:33','2021-02-18 07:00:33'),(58,'client-edit','web','2021-02-18 07:03:40','2021-02-18 07:03:40'),(59,'client-delete','web','2021-02-18 07:04:39','2021-02-18 07:04:39'),(60,'client-view','web','2021-02-18 07:04:48','2021-02-18 07:04:48'),(61,'position-list','web','2021-02-19 07:32:50','2021-02-19 07:32:50'),(62,'position-create','web','2021-02-19 07:32:58','2021-02-19 07:32:58'),(63,'position-edit','web','2021-02-19 07:33:05','2021-02-19 07:33:05'),(64,'position-delete','web','2021-02-19 07:33:15','2021-02-19 07:33:15'),(65,'position-view','web','2021-02-19 07:33:23','2021-02-19 07:33:23'),(66,'team-list','web','2021-02-19 08:11:08','2021-02-19 08:11:08'),(67,'team-create','web','2021-02-19 08:11:15','2021-02-19 08:11:15'),(68,'team-edit','web','2021-02-19 08:11:21','2021-02-19 08:11:21'),(69,'team-delete','web','2021-02-19 08:11:27','2021-02-19 08:11:27'),(70,'team-view','web','2021-02-19 08:11:33','2021-02-19 08:11:33'),(71,'testimonial-list','web','2021-02-20 07:13:48','2021-02-20 07:13:48'),(72,'testimonial-create','web','2021-02-20 07:13:56','2021-02-20 07:13:56'),(73,'testimonial-edit','web','2021-02-20 07:14:02','2021-02-20 07:14:02'),(74,'testimonial-view','web','2021-02-20 07:14:18','2021-02-20 07:14:18'),(75,'testimonial-delete','web','2021-02-20 07:14:25','2021-02-20 07:14:25'),(76,'categories-list','web','2021-02-23 07:58:04','2021-02-23 07:58:04'),(77,'categories-create','web','2021-02-23 07:58:12','2021-02-23 07:58:12'),(78,'categories-edit','web','2021-02-23 07:58:22','2021-02-23 07:58:22'),(79,'categories-delete','web','2021-02-23 07:58:30','2021-02-23 07:58:30'),(80,'categories-view','web','2021-02-23 07:58:38','2021-02-23 07:58:38'),(81,'tags-list','web','2021-02-23 08:48:12','2021-02-23 08:48:12'),(82,'tags-create','web','2021-02-23 08:48:19','2021-02-23 08:48:19'),(83,'tags-edit','web','2021-02-23 08:48:24','2021-02-23 08:48:24'),(84,'tags-delete','web','2021-02-23 08:48:29','2021-02-23 08:48:29'),(85,'tags-view','web','2021-02-23 08:48:35','2021-02-23 08:48:35'),(86,'services-list','web','2021-02-24 06:53:04','2021-02-24 06:53:04'),(87,'services-create','web','2021-02-24 06:53:11','2021-02-24 06:53:11'),(88,'services-edit','web','2021-02-24 06:53:17','2021-02-24 06:53:17'),(89,'services-delete','web','2021-02-24 06:53:22','2021-02-24 06:53:22'),(90,'services-view','web','2021-02-24 06:53:28','2021-02-24 06:53:28'),(91,'portfolio-list','web','2021-02-24 08:09:54','2021-02-24 08:09:54'),(92,'portfolio-create','web','2021-02-24 08:10:01','2021-02-24 08:10:01'),(93,'portfolio-edit','web','2021-02-24 08:10:06','2021-02-24 08:10:06'),(94,'portfolio-delete','web','2021-02-24 08:10:12','2021-02-24 08:10:12'),(95,'portfolio-view','web','2021-02-24 08:10:17','2021-02-24 08:10:17');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio_tag`
--

DROP TABLE IF EXISTS `portfolio_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio_tag` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` int unsigned NOT NULL,
  `tag_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio_tag`
--

LOCK TABLES `portfolio_tag` WRITE;
/*!40000 ALTER TABLE `portfolio_tag` DISABLE KEYS */;
INSERT INTO `portfolio_tag` VALUES (3,2,3),(4,2,2),(5,2,4),(6,2,1),(8,1,2);
/*!40000 ALTER TABLE `portfolio_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (1,'Xena','xena','<p>asd asd lkasjd asd</p><p><br></p><p>as dasdasd</p><p>as dasd asd</p>','1614174359.jpeg',2,1,1,'2021-02-24 08:15:59','2021-02-24 08:15:59'),(2,'Test','test','<p>teasd</p>','1614260677.jpeg',1,1,1,'2021-02-25 08:14:37','2021-02-25 08:14:37'),(3,'Company','company','<p><br></p>','1614860446.jpeg',1,1,1,'2021-02-25 08:22:22','2021-03-04 06:50:46');
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `positions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,'Full Stack Developer',1,'2021-02-19 07:44:32','2021-02-19 07:44:32'),(2,'Java Developer',1,'2021-02-19 07:46:46','2021-02-19 07:46:46'),(3,'Test',0,'2021-02-19 07:46:54','2021-02-19 07:50:42'),(4,'HR',1,'2021-02-19 07:47:04','2021-02-19 07:47:04'),(5,'CEO',1,'2021-02-19 07:47:11','2021-02-19 07:47:11');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Dr. Ora Rempel','Et est non quis autem impedit quo tenetur cum. Aut voluptatem laboriosam voluptates facere quia quas earum. Omnis sit veritatis perferendis qui fugiat.','2020-12-07 08:20:40','2020-12-07 08:20:40'),(2,'Marisa D\'Amore','Laboriosam laborum dolores qui et possimus. In voluptatem quisquam quia quibusdam sint alias. Sit numquam pariatur ut suscipit. Occaecati animi et aut harum. Est accusantium et illo id adipisci ea.','2020-12-07 08:20:40','2020-12-07 08:20:40'),(3,'Kaitlyn Jast','Harum quo reiciendis dolorem dolores. Est dicta repellat corporis placeat. In quis consequatur aliquam consequatur modi.','2020-12-07 08:20:40','2020-12-07 08:20:40'),(4,'Prof. Eden Mante DVM','Aut aut suscipit et adipisci porro pariatur. Nam voluptatem eum et sint illo. Officiis sit qui voluptas tempore et. Qui nisi quae repellat eveniet voluptatibus.','2020-12-07 08:20:40','2020-12-07 08:20:40'),(5,'Davion Hettinger','Vel a ea assumenda at. Consectetur et suscipit ea ullam dolor sapiente. Laudantium quia sunt dolor atque voluptatibus illo. Dolorum est voluptatem unde odio repellat facilis quia.','2020-12-07 08:20:40','2020-12-07 08:20:40'),(6,'Thea Weimann','Quis sapiente dignissimos ut et sed perferendis. Non est alias consequatur ut ut numquam maiores sunt. Doloremque porro occaecati hic deleniti suscipit.','2020-12-07 08:20:40','2020-12-07 08:20:40'),(7,'Janick Wuckert DVM','Sint totam cupiditate voluptate. Omnis molestias quia adipisci eum molestiae neque. Veniam dolorem sapiente laboriosam architecto rerum distinctio. Ullam aut maxime atque quas.','2020-12-07 08:20:40','2020-12-07 08:20:40'),(8,'Mrs. Rosalyn Purdy','Hic eligendi at ducimus tenetur alias sed. Aut molestias sed molestiae nulla sed dolore. Neque dolores praesentium rerum aperiam molestiae.','2020-12-07 08:20:40','2020-12-07 08:20:40'),(9,'Eva Hartmann','Sint molestias ab ipsam ipsum aut molestias. Aut numquam delectus rerum adipisci laudantium ad. Et et voluptatem blanditiis soluta. Et sed nobis sed quaerat doloribus.','2020-12-07 08:20:40','2020-12-07 08:20:40'),(10,'Juliet Considine PhD','Esse ab repellat iusto libero numquam eos odit placeat. Numquam natus non quis eum et impedit. Odio rerum dolorum excepturi quam nobis quia. Sequi animi ut et sit facere.','2020-12-07 08:20:40','2020-12-07 08:20:40'),(11,'Prof. Flavio Keebler I','Et iste beatae quo facilis. Sed dicta culpa officiis quae ad consequatur. Voluptatem et placeat consectetur ducimus qui animi sit blanditiis. Explicabo adipisci dolores ut et maxime qui saepe.','2020-12-07 08:20:59','2020-12-07 08:20:59'),(12,'Mr. Jasper Kub DDS','Consequuntur fugiat doloribus vel et. Blanditiis nesciunt est sequi ut aut quas eum id. Error ut aut quisquam cupiditate dolores et cupiditate.','2020-12-07 08:20:59','2020-12-07 08:20:59'),(13,'Orpha Considine DVM','Fugiat voluptatibus eaque voluptatem eveniet quos. Quisquam molestiae facilis est. Illo repellat porro consequuntur commodi.','2020-12-07 08:20:59','2020-12-07 08:20:59'),(14,'Dexter Senger','Vel pariatur porro hic laboriosam perspiciatis. Sapiente fugit ratione officiis ducimus impedit repellat. Laboriosam earum molestias non impedit non.','2020-12-07 08:20:59','2020-12-07 08:20:59'),(15,'Prof. Rahul Lockman','Et consequatur tempora ea possimus ipsa assumenda. Minima ut nihil aut vel nulla aliquid voluptatem ut. Velit voluptatibus eum possimus.','2020-12-07 08:20:59','2020-12-07 08:20:59'),(16,'Prof. Cayla Lesch I','Eaque velit minima et sit consequatur. Possimus unde ad ad et eligendi sit sint. Aspernatur molestias voluptas reprehenderit odit illo sit nesciunt.','2020-12-07 08:20:59','2020-12-07 08:20:59'),(17,'Emmie Rutherford','Eius quis placeat vel dolores. Rerum tempore consequatur optio molestiae. Perferendis reprehenderit aliquid eos delectus quia sed.','2020-12-07 08:20:59','2020-12-07 08:20:59'),(18,'Alta Beahan','Nisi repellat nulla et autem illum tenetur. Pariatur veniam cupiditate iusto maiores quo. Voluptates sit vero odio velit.','2020-12-07 08:20:59','2020-12-07 08:20:59'),(19,'Mr. Hailey Streich Jr.','Eum molestiae modi dolor culpa. Dolorem eos occaecati odio sit est. Dolor nam dolores fuga accusantium rerum neque maxime. Impedit pariatur eum facilis voluptates aut sunt.','2020-12-07 08:20:59','2020-12-07 08:20:59'),(20,'Kiley McClure','Dolores voluptates deleniti fugiat modi. Quod exercitationem reprehenderit fugit et. Et sunt voluptas rerum architecto et. Quos similique voluptatum vel perferendis hic omnis ad.','2020-12-07 08:20:59','2020-12-07 08:20:59'),(21,'Dr. Eulalia Boehm PhD','Et autem culpa consequatur qui nulla facilis. Quis corrupti sed tempora quam architecto. Est debitis saepe qui repellendus veniam. Hic eos ut voluptas quis. Dolores quibusdam nam cum.','2020-12-07 08:21:01','2020-12-07 08:21:01'),(22,'Kacie Pacocha DDS','Neque nisi qui quia. Perspiciatis dolores consequatur nulla. Autem nemo ad voluptas et ut qui.','2020-12-07 08:21:01','2020-12-07 08:21:01'),(23,'Miss Elenor Streich','Quia id veritatis doloremque in repellendus asperiores voluptas quis. Velit quod doloribus excepturi. A maxime esse nihil porro et ullam quia.','2020-12-07 08:21:01','2020-12-07 08:21:01'),(24,'Maud Corwin','Soluta velit quam quia dicta magni quis voluptates ad. Quibusdam repellendus eius corporis hic itaque fugit illum. Eligendi quibusdam et a. Doloremque tempora aspernatur quidem.','2020-12-07 08:21:01','2020-12-07 08:21:01'),(25,'Prof. Hadley Stoltenberg DDS','Ex et eum tempora consectetur. Illum quibusdam doloribus sapiente laboriosam ipsam ipsam delectus soluta. Cupiditate omnis aut ratione nostrum velit. Corrupti nam voluptas iusto molestias.','2020-12-07 08:21:01','2020-12-07 08:21:01'),(26,'Leanna Schmitt','Doloremque non sunt iusto odio ut minima. Et a et qui cum. Sit qui ut quo. Corporis iure error ipsam. Et sapiente assumenda omnis nisi quaerat accusantium.','2020-12-07 08:21:01','2020-12-07 08:21:01'),(27,'Frieda Gorczany','Neque ab officia inventore totam. Deleniti et ab cumque deleniti optio vel. In aut odit dolorum. Provident et expedita laboriosam ut sed sit sequi mollitia. Quaerat aut et aperiam odio dolores.','2020-12-07 08:21:01','2020-12-07 08:21:01'),(28,'Adaline Ankunding III','Est nostrum fuga fuga unde eveniet eius. Eius veritatis qui reprehenderit enim. Quae id ducimus et. Ipsa recusandae beatae quia aut.','2020-12-07 08:21:01','2020-12-07 08:21:01'),(29,'Meta Hudson','Error nostrum occaecati officiis molestiae illum. Nesciunt eum eos mollitia mollitia qui esse officia. Et mollitia enim beatae deleniti saepe. Est eveniet officia maxime non voluptatum sunt possimus.','2020-12-07 08:21:01','2020-12-07 08:21:01'),(30,'Royal Heidenreich','Quibusdam esse eius sint ipsa repudiandae iusto. Et sed iure necessitatibus unde atque sunt maxime assumenda. Vel et veniam iure et optio odio corrupti.','2020-12-07 08:21:01','2020-12-07 08:21:01'),(31,'Jordan Koch','Vel molestiae facilis optio eos illum. Ut accusantium et laborum tempora et deserunt provident sit.','2020-12-07 08:21:03','2020-12-07 08:21:03'),(32,'Alena Rau II','Labore perferendis nisi suscipit nemo sed minus fugit. Sapiente et laborum dolores et.','2020-12-07 08:21:03','2020-12-07 08:21:03'),(33,'Keshawn Crooks DDS','Placeat non excepturi nobis ea ea similique. Optio est ratione adipisci eius. Beatae sed aliquid soluta quam nemo recusandae ut. Excepturi possimus voluptate at veritatis.','2020-12-07 08:21:03','2020-12-07 08:21:03'),(34,'Dixie Kling','Ex voluptates dolores quidem aliquid ea reiciendis. Minima fuga omnis consequatur amet quo placeat. Sint fugiat et dignissimos perferendis labore aut at.','2020-12-07 08:21:03','2020-12-07 08:21:03'),(35,'Shea Tremblay','Non adipisci delectus modi quaerat. Repellendus sit amet fugiat recusandae. Consequatur dolorem culpa corporis maxime molestiae quisquam est est.','2020-12-07 08:21:03','2020-12-07 08:21:03'),(36,'Willie Bruen','Voluptatum animi repudiandae fugit sed quo debitis soluta veniam. Fugit fugiat optio ullam illo corporis. Maiores rerum consequatur minima vero.','2020-12-07 08:21:03','2020-12-07 08:21:03'),(37,'Augustus Turcotte','Voluptatem qui sed id quia quia fugiat. Sunt et vel qui sint sed consequatur.','2020-12-07 08:21:03','2020-12-07 08:21:03'),(38,'Estrella Schuster','Natus nobis qui sit accusamus sit odio voluptate. Consequuntur maxime est ut rem. Molestiae voluptatibus et similique. Minima minima assumenda ut nihil sit.','2020-12-07 08:21:03','2020-12-07 08:21:03'),(39,'Colby Douglas','Quis non voluptas consequatur sit illo. Nisi optio consequatur repellendus iure qui perspiciatis. Aspernatur est id explicabo maxime quibusdam.','2020-12-07 08:21:03','2020-12-07 08:21:03'),(40,'Mrs. Aurelia Stamm III','Voluptatum error non autem impedit eos occaecati. Eaque explicabo omnis hic eligendi eligendi error. Commodi consequatur facere in nisi vel. Nemo tenetur quos molestias id quo cum consequatur.','2020-12-07 08:21:03','2020-12-07 08:21:03'),(41,'Dr. Marc Gusikowski V','Voluptatum beatae at inventore eaque ea voluptatem quo. Ut pariatur eum qui et. Et illum accusantium tempora aliquid sunt laborum. Magni eos consectetur beatae aut sed velit.','2020-12-07 08:21:05','2020-12-07 08:21:05'),(42,'Dayna Gutmann DDS','Eaque mollitia unde nesciunt magni. Sed perferendis sequi ut sint odit dolore dicta alias. Illum delectus asperiores dolorem accusantium explicabo.','2020-12-07 08:21:05','2020-12-07 08:21:05'),(43,'Ms. Catharine White','Et et magni ipsum repellat hic consequuntur. Earum minima aut vel voluptate dolorem illum. Unde dolorem veniam ea libero. Sint deserunt earum pariatur commodi vel voluptas illum.','2020-12-07 08:21:05','2020-12-07 08:21:05'),(44,'Eriberto Conn','Adipisci consequatur nostrum est fuga ad sint. Esse animi ut eum voluptas eius est aut. Ipsum quasi vero atque aut quia et. Voluptatum ut expedita velit doloremque ad consequatur autem.','2020-12-07 08:21:05','2020-12-07 08:21:05'),(45,'Mr. Roman Gaylord','Ea qui rerum aut praesentium rerum repellat temporibus amet. In quam quis quasi temporibus. Quia nulla sed qui qui quas et officiis. Voluptatem temporibus commodi quidem in.','2020-12-07 08:21:05','2020-12-07 08:21:05'),(46,'Retha McLaughlin','Molestiae ut mollitia aut quia sit dolorum. Eveniet aperiam sed minus ipsa. Soluta suscipit mollitia fuga. Delectus ut officia sed hic provident aliquam aut. Quo illum ut soluta architecto omnis et.','2020-12-07 08:21:05','2020-12-07 08:21:05'),(47,'Mae Wehner','Sed omnis ipsam est et magnam. Distinctio quod debitis nemo quasi maxime.','2020-12-07 08:21:05','2020-12-07 08:21:05'),(48,'Prof. Estella Schulist','Repellendus et illo eos voluptate alias enim. Sunt consequatur reprehenderit maxime omnis ex dicta pariatur.','2020-12-07 08:21:05','2020-12-07 08:21:05'),(49,'Mr. Jensen Blick Sr.','Exercitationem culpa eligendi vel est. Aliquam modi eum debitis voluptatibus qui a est commodi. Laborum ipsum error quo libero rerum.','2020-12-07 08:21:05','2020-12-07 08:21:05'),(50,'Prof. Damien Roberts III','Similique culpa ea hic optio. Officia dolore cumque optio nostrum architecto facilis. Magnam saepe voluptates laborum odio at est. Magnam rem saepe et repudiandae.','2020-12-07 08:21:05','2020-12-07 08:21:05'),(51,'Gilberto Haag','Tempore perspiciatis non eum nulla doloribus saepe atque. Mollitia nisi quia suscipit laborum unde ut nulla. Fuga rerum molestiae sit officiis nobis et dolores velit.','2020-12-07 08:21:07','2020-12-07 08:21:07'),(52,'Amelia Eichmann','Cumque facere voluptatum eum provident illum. Sit autem nobis aspernatur esse asperiores deleniti eius. Voluptatem tempore atque ratione iusto officiis corrupti.','2020-12-07 08:21:07','2020-12-07 08:21:07'),(53,'Keyshawn Parker','Quidem magni quidem illo aut. Mollitia id a sit minus. Repudiandae tempore et ut quisquam repudiandae et. Ipsa ut nisi magni eius illum quis architecto.','2020-12-07 08:21:07','2020-12-07 08:21:07'),(54,'Marc Dicki','Commodi facere dolorem blanditiis et. Qui consectetur sapiente sit est in esse. Eos voluptatem rerum optio. Aut ex iusto doloribus in. Facilis ea et labore ea pariatur.','2020-12-07 08:21:07','2020-12-07 08:21:07'),(55,'Polly Lehner','Laboriosam amet aliquid tenetur recusandae incidunt et vitae et. Enim voluptatem perspiciatis aut. Quisquam non impedit rerum.','2020-12-07 08:21:07','2020-12-07 08:21:07'),(56,'Dimitri Ortiz','Molestias ratione ullam modi ut quam qui ea. Iusto maxime numquam omnis iusto at architecto. Ea corrupti sint consequuntur laboriosam. Eum eius ut dolorem.','2020-12-07 08:21:07','2020-12-07 08:21:07'),(57,'Prof. Jarrod Morar Sr.','Officiis rerum dolor reprehenderit eius in nam aut vitae. Ipsum quo aspernatur non ipsam alias pariatur. Doloribus hic illo laudantium alias et ea. Quo suscipit ut consequatur repellendus.','2020-12-07 08:21:07','2020-12-07 08:21:07'),(58,'Brett Shields','Corrupti qui rerum id atque. Ut amet inventore quidem placeat nostrum quia. Qui quas ducimus numquam. Sit id necessitatibus quia reiciendis natus.','2020-12-07 08:21:07','2020-12-07 08:21:07'),(59,'Dr. Deon Lesch','Et quia sint molestiae fuga dolorem nobis corporis quia. Dolorum ipsa quam tempora qui laborum fugiat. Illo sed totam qui praesentium. Quod veritatis nobis tempora.','2020-12-07 08:21:07','2020-12-07 08:21:07'),(60,'Mr. Dee Rohan II','Voluptas quia a sequi autem quas. Nobis ut iusto et. Qui architecto explicabo et inventore quod dolores.','2020-12-07 08:21:07','2020-12-07 08:21:07'),(61,'Mckenna Block','Est veniam cum dolor ullam perspiciatis aut aut. Culpa ipsa officia commodi pariatur. Molestiae amet illum in est et.','2020-12-07 08:21:09','2020-12-07 08:21:09'),(62,'Arthur Langosh','Accusamus occaecati autem qui et iusto reiciendis. Omnis quod cum est est nihil exercitationem nobis. Error sed qui quos sint. Qui pariatur porro et quae velit.','2020-12-07 08:21:09','2020-12-07 08:21:09'),(63,'Mr. Mauricio Borer I','Suscipit aspernatur aliquam excepturi quod et. Assumenda exercitationem est aut odio blanditiis dolore quis commodi. Laudantium nihil sint distinctio vitae. Dolorem omnis quos sunt hic.','2020-12-07 08:21:09','2020-12-07 08:21:09'),(64,'Mr. Mitchell Kessler DDS','Dolore quia officiis est ut. Non voluptatem facere quis. Numquam repellat sit libero autem et.','2020-12-07 08:21:09','2020-12-07 08:21:09'),(65,'Prof. Kendall Koepp Jr.','Repellat temporibus iusto qui qui. Eum eos placeat iste quisquam esse culpa. Est aperiam nobis occaecati asperiores necessitatibus deleniti.','2020-12-07 08:21:09','2020-12-07 08:21:09'),(66,'Kelly Raynor','Delectus id facilis ad natus. Facere qui veniam illo ipsam asperiores esse officia officia. Voluptatem sequi placeat est aut debitis et.','2020-12-07 08:21:10','2020-12-07 08:21:10'),(67,'Mikel Bashirian','Et officia alias vitae vitae. Provident sed tenetur asperiores aut architecto in rerum ut. Sequi qui dolores maiores architecto omnis dolor placeat. In tempore iure veniam nobis inventore aliquam.','2020-12-07 08:21:10','2020-12-07 08:21:10'),(68,'Selmer Johnson IV','Omnis sequi qui libero sunt. Et similique quia veniam tempora sapiente totam. Soluta cum non distinctio. Ea reprehenderit placeat vitae velit ea. Fuga molestiae consectetur dicta assumenda mollitia.','2020-12-07 08:21:10','2020-12-07 08:21:10'),(69,'Milan Cronin','Saepe rerum esse rerum non rem. Nesciunt iure consequatur dolorum tenetur. Reiciendis aut natus eaque. Nulla et et placeat atque quidem.','2020-12-07 08:21:10','2020-12-07 08:21:10'),(70,'Layne Cremin Jr.','Vitae iure quod et nihil. Dolor ipsum quaerat repellat. Cumque quis reiciendis rerum eveniet rerum vitae voluptatum. Fugiat praesentium hic eos laboriosam sint eos quam.','2020-12-07 08:21:10','2020-12-07 08:21:10'),(71,'Sid Jacobs','Ut distinctio et sit officiis qui amet. Enim dolores voluptatem eum autem dolor nostrum. Quisquam magnam porro repellat aut voluptas voluptatibus velit.','2020-12-07 08:21:12','2020-12-07 08:21:12'),(72,'Jena Fay III','Atque incidunt dolor unde est. In vitae deserunt quo. Iure eveniet voluptatibus corrupti autem animi.','2020-12-07 08:21:12','2020-12-07 08:21:12'),(73,'Malinda Kunde','Ut nobis vitae aut in id soluta quidem. Quis et velit qui debitis. In dolores nisi suscipit quo et ut at. Maxime molestias quia autem voluptatem ut ut. Voluptatibus consequuntur quia et quos magni.','2020-12-07 08:21:12','2020-12-07 08:21:12'),(74,'Houston Bahringer','Optio et non voluptatem illum repudiandae. Adipisci facere velit vitae repellendus. Vitae voluptas perferendis quisquam ut pariatur. Fuga porro velit dolores eius odio et vel.','2020-12-07 08:21:12','2020-12-07 08:21:12'),(75,'Izaiah D\'Amore','Deserunt aspernatur voluptatem incidunt ex est. Voluptatem voluptatem repellat atque dolorem iste earum. Nobis non qui quibusdam ex. Non velit architecto vero.','2020-12-07 08:21:12','2020-12-07 08:21:12'),(76,'Miss Eula Erdman','Consequuntur pariatur qui aliquam enim consequatur odit. Id repellat facilis quia omnis. Tempora molestias et fuga at. Eaque dignissimos in illo distinctio blanditiis modi.','2020-12-07 08:21:12','2020-12-07 08:21:12'),(77,'Reva Harris','Magnam cupiditate consequatur non qui adipisci fugiat corrupti. Omnis earum alias cumque reprehenderit. Recusandae recusandae repellendus autem adipisci esse.','2020-12-07 08:21:12','2020-12-07 08:21:12'),(78,'Prof. Tyshawn Ebert','Modi omnis recusandae perspiciatis. Ullam rerum eum beatae incidunt. Quas molestias distinctio consequatur quod. Qui tenetur eius voluptatibus est eos perspiciatis maxime.','2020-12-07 08:21:12','2020-12-07 08:21:12'),(79,'Gladys Skiles','Velit voluptatem porro cumque fuga vel. Quisquam sint aspernatur vel voluptatum quia labore beatae. Deleniti aut error deleniti dolor. Est qui in dolor ex eum quia.','2020-12-07 08:21:12','2020-12-07 08:21:12'),(80,'Susan Cormier','Nihil esse blanditiis accusamus. Enim voluptates modi quis voluptas eum. Deleniti eligendi quia dolore repudiandae rerum. Quo ex omnis repellat et delectus commodi rem qui.','2020-12-07 08:21:12','2020-12-07 08:21:12'),(81,'Cleo Will','Adipisci est sint quam molestias et ex. Ex eos quibusdam consectetur consequatur. Sint labore eos esse dolorem sapiente. Adipisci cupiditate sapiente sit.','2020-12-07 08:21:14','2020-12-07 08:21:14'),(82,'Axel Simonis','Hic consequatur animi veritatis repellendus maiores fugiat omnis. Doloribus ut hic aut rerum fuga et. Error iusto reiciendis asperiores sit. Voluptas qui veniam veritatis doloremque fugit.','2020-12-07 08:21:14','2020-12-07 08:21:14'),(83,'Jammie Kassulke','Cumque officiis consequatur rerum porro libero culpa. At vitae natus repellendus et ut temporibus sed. Ipsam et quo consequuntur velit. Natus et eum dolorum ullam.','2020-12-07 08:21:14','2020-12-07 08:21:14'),(84,'Dr. Florencio Kreiger','Et est reiciendis sit. Quia aut maiores ut dolores. Libero doloremque quaerat eum nulla quos.','2020-12-07 08:21:14','2020-12-07 08:21:14'),(85,'Jett Gerlach','Iste optio autem praesentium sunt. Ipsa ipsa est culpa aut dolorum non tempore. Officia ratione labore rerum sed. Similique non facere necessitatibus culpa rerum quis expedita nulla.','2020-12-07 08:21:14','2020-12-07 08:21:14'),(86,'Jaquan Rohan','Et et quidem officia sunt adipisci ducimus. Est maiores praesentium sed atque quia architecto aspernatur in. Temporibus ratione est nihil et id excepturi. Cupiditate sit et rerum laboriosam.','2020-12-07 08:21:14','2020-12-07 08:21:14'),(87,'Ms. Kari Littel III','Rem omnis dicta sunt nihil quas ut. Occaecati sapiente odit temporibus facere architecto. Maiores et tempore fugiat. Iste eos esse expedita in non ex quis.','2020-12-07 08:21:14','2020-12-07 08:21:14'),(88,'Whitney Berge','Neque quia doloribus aut voluptatem labore doloremque beatae. Asperiores sequi et et dignissimos. Minima voluptatem aut a omnis laboriosam. Illum aliquam nostrum sit id iusto.','2020-12-07 08:21:14','2020-12-07 08:21:14'),(89,'Urban Dare','Velit ratione labore quis nemo est. Aut ullam labore aut eum necessitatibus. Quisquam labore explicabo sed eaque aut qui. Asperiores laborum qui facilis quasi quas veniam.','2020-12-07 08:21:14','2020-12-07 08:21:14'),(90,'Alexanne Botsford','Et id quidem laboriosam nobis iure tempore. Eum voluptatem dolorum et numquam cum occaecati quibusdam. Eos debitis quibusdam aut est non doloremque rem.','2020-12-07 08:21:14','2020-12-07 08:21:14'),(92,'Mr. Cleo Sawayn','Odit est magni ratione fugiat magni et. Et iusto quidem inventore veritatis quod. Dolor temporibus dolorum laudantium neque ipsum ipsam natus.','2020-12-07 08:21:16','2020-12-07 08:21:16'),(93,'Dr. Dayton Greenholt','Inventore nisi ipsa recusandae voluptatem fuga delectus voluptatem. Non adipisci vel eum ad ad fuga cupiditate. Consequuntur nihil consectetur officiis.','2020-12-07 08:21:16','2020-12-07 08:21:16'),(94,'Alivia Larson','Magnam nam error voluptatem. Est ut a in ea. Illo aspernatur eius unde corporis laborum. A quia veniam sint dolorem tempora unde suscipit.','2020-12-07 08:21:16','2020-12-07 08:21:16'),(95,'Zelma Schmitt','Voluptas vel iste maxime architecto in omnis. Facilis ut quia omnis necessitatibus blanditiis fugit. Nihil quidem et quisquam nihil qui rerum.','2020-12-07 08:21:16','2020-12-07 08:21:16'),(96,'Prof. Arianna Kris III','Qui quam nihil cum cupiditate excepturi suscipit. Ut odio nihil perspiciatis. Repellat libero sunt dolorem repudiandae. Ut laboriosam et maxime ratione repellat.','2020-12-07 08:21:16','2020-12-07 08:21:16'),(97,'Jalen Heller','Aperiam voluptatibus adipisci sapiente maiores. Autem et fugiat nihil repellendus neque eius. Ea nobis voluptates ut eveniet sed.','2020-12-07 08:21:16','2020-12-07 08:21:16');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(38,1),(41,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(1,3),(2,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(23,3),(24,3),(25,3),(26,3),(27,3),(23,5),(24,5),(25,5),(26,5),(27,5);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','web','2020-12-07 08:19:51','2020-12-07 08:19:51'),(3,'Manager','web','2020-12-08 06:47:27','2020-12-08 06:47:27'),(4,'Customer','web','2020-12-08 06:47:40','2020-12-08 06:47:40'),(5,'Blogger','web','2021-01-18 07:30:00','2021-01-18 07:30:00');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_tag`
--

DROP TABLE IF EXISTS `service_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_tag` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int unsigned NOT NULL,
  `tag_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_tag`
--

LOCK TABLES `service_tag` WRITE;
/*!40000 ALTER TABLE `service_tag` DISABLE KEYS */;
INSERT INTO `service_tag` VALUES (6,1,11),(7,1,8),(8,1,9),(9,2,10);
/*!40000 ALTER TABLE `service_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'PHP Development','php-development','<p><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"></div></p><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\"><br style=\"margin: 0px; padding: 0px; clear: both; text-align: center;\"></p><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Where can I get some?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p></div></div>','1614171380.jpeg',14,1,1,'2021-02-24 07:26:20','2021-02-28 06:59:26'),(2,'ios Development','ios-development','<p>ios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Devel<font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">opmentios Developmentios Developmentios Deve</font>lopmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developme<span style=\"background-color: rgb(255, 0, 255);\">ntios Developmentios Developme</span>ntios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Development</p>','1614171496.jpeg',11,1,1,'2021-02-24 07:28:16','2021-02-28 06:59:17'),(3,'Card','card','<p>ios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Devel<font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">opmentios Developmentios Developmentios Deve</font>lopmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developme<span style=\"background-color: rgb(255, 0, 255);\">ntios Developmentios Developme</span>ntios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Developmentios Development</p>','1614860216.jpeg',11,1,1,'2021-02-28 07:00:18','2021-03-04 06:46:56');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('C9bLLdpQv2fCJmuS4KcJp9Az0yBsa0HRUz1HO5pD',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWlGVHoza1RlSHVRd0Jqd21lbURqMU9qVUFvUXprOW9uMm9VaWR2eSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3J0Zm9saW8iO319',1621170592),('QQsNFfqZlBWbr3gGJ0psb29SZ0UABiflK9nJ75TI',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS0J4SEhhM1dXeHJoMUQ1UmVWaEk2dHNQT2hEYktkR0lxTmtwbmVjYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrZW5kL3VzZXJzL2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1621080979),('qSliSqu0r8fAqsPE1f4xRG7gJpdkd0mYDBZ2XVwQ',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRWZ6dHphOGNJbE5YQTVLcnIwMnpWOXVDbVNQNFpVeVFzYlRzZFJDaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrZW5kL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fX0=',1620454912),('VBYZHAUM7LCLcjFW4ouBsWmAnwcsAekNembI2iOs',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzJ6R2tWRWo1aXFsazBvcXVWN3B2bm0xRG9VTmpFSlRkSGt2bVVGUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrZW5kL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1620916800);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
INSERT INTO `subscribers` VALUES (1,'testing@gmail.com','flgtC0e5pr',NULL,'2021-02-16 08:11:58','2021-02-16 08:11:58'),(2,'frodo@admin.com','92XNSilaHo',NULL,'2021-02-16 08:45:13','2021-02-16 08:45:13'),(3,'frodo1@admin.com','rLC9RFWwBf',NULL,'2021-02-16 08:45:55','2021-02-16 08:45:55'),(4,'test@yopmail.com','sYHXT5bn01',1,'2021-02-16 08:46:38','2021-02-16 09:00:35'),(5,'Test2710@yopmail.com','5dWJc7pP1h',NULL,'2021-02-16 09:13:07','2021-02-16 09:13:07');
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Business','business',1,1,'2021-02-23 08:56:08','2021-02-27 08:48:22'),(2,'ios','ios',1,1,'2021-02-25 07:24:17','2021-02-25 07:24:17'),(3,'App','app',1,1,'2021-02-25 07:24:31','2021-02-25 07:24:31'),(4,'IT','it',1,1,'2021-02-25 07:24:45','2021-02-25 07:24:45'),(5,'Marketing','marketing',1,1,'2021-02-27 08:48:42','2021-02-27 08:48:42'),(6,'Smart','smart',1,1,'2021-02-27 08:48:54','2021-02-27 08:48:54'),(7,'Tips','tips',1,1,'2021-02-27 08:49:11','2021-02-27 08:49:11'),(8,'Laravel','laravel',3,1,'2021-02-28 08:00:01','2021-02-28 08:00:01'),(9,'WordPress','wordpress',3,1,'2021-02-28 08:00:13','2021-02-28 08:00:13'),(10,'Swift','swift',3,1,'2021-02-28 08:00:21','2021-02-28 08:00:21'),(11,'Codeigniter','codeigniter',3,1,'2021-02-28 08:00:44','2021-02-28 08:00:44');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` bigint NOT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Jignesh Makwana','1614859081.png',5,1,'2021-02-20 06:42:47','2021-03-04 06:28:01'),(2,'Test','1613823305.jpeg',1,0,'2021-02-20 06:45:05','2021-02-20 06:45:05'),(3,'Frodo','1613823550.png',2,1,'2021-02-20 06:45:17','2021-02-20 06:49:10');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `position_id` bigint NOT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Frodo Beggins','1614859236.jpeg','Best services thanks team Best services thanks teamBest services thanks team Best services thanks team Best services thanks team Best services thanks team',5,1,'2021-03-04 06:29:34','2021-03-04 06:30:36');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL COMMENT '1 => Active\r\n2 => Inactive\r\n3 => Deleted\r\n4 => Blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Admin','admin@admin.com','9876543210','1614858500.png','2020-12-07 08:19:51','$2y$10$GCPc9H2kPMGibnwsvWixmOTBVhwXHyg6xPY4htkU345.ARcAokZAm','MNHl5ErrCstJmWEou9Ro532J6G8Pu2HOCbK0rRvQRsfeiM7N2uxwEqrQdOY7',1,'2020-12-07 08:19:51','2021-03-04 06:18:20'),(2,'Nannie','Renner','hstark@example.net',NULL,NULL,'2020-12-07 08:20:39','$2y$10$ykfmoegT0G5NhrY6bzxRheJL3l4MNpgVhuCqm/KQ.6ZfpMhSbUoSe','L5pxbUf9ml',NULL,'2020-12-07 08:20:39','2020-12-07 08:20:39'),(3,'Elissa','Hills','emily.mann@example.org',NULL,NULL,'2020-12-07 08:20:39','$2y$10$0IYlO5mxtPTgz1XvJP7IXOEaWLySP2M/4E7378q5M1xyb8PtjfDa2','P3GPTCYM4j',NULL,'2020-12-07 08:20:39','2020-12-07 08:20:39'),(4,'Maeve','Wilderman','hlittle@example.net',NULL,NULL,'2020-12-07 08:20:39','$2y$10$Or36jw4b1cJX2NdZQk2d2OLf7z66Jg1SHR5vtkZmgRAF/T6Q/dtC.','HcKb8C2zdp',NULL,'2020-12-07 08:20:40','2020-12-07 08:20:40'),(5,'Gilbert','Stehr','pfeffer.unique@example.org',NULL,NULL,'2020-12-07 08:20:39','$2y$10$/gX2wAjYj/haQT57yqNllOuWwHlEtQnUefVdfPdC460eEGvfi/qqS','iiLM9GqQl0',NULL,'2020-12-07 08:20:40','2020-12-07 08:20:40'),(6,'Kassandra','Kulas','luciano.schiller@example.com',NULL,NULL,'2020-12-07 08:20:39','$2y$10$fXgvGtaksk5s.hcNuDSNeuiZQiFAufaBbG9j4bMABBrKbN0aIk/vO','1R4wDxiCY5',NULL,'2020-12-07 08:20:40','2020-12-07 08:20:40'),(7,'Abby','Volkman','arnaldo.heaney@example.org',NULL,NULL,'2020-12-07 08:20:39','$2y$10$K6W1grgofvzPFP5VsKBWGekMdrSELNxpT1efMYAyNCHgXelFhW9ca','vXykH5MOrX',NULL,'2020-12-07 08:20:40','2020-12-07 08:20:40'),(8,'Tyson','VonRueden','wcole@example.com',NULL,NULL,'2020-12-07 08:20:39','$2y$10$tgLlnT8NVlzQF.ANEJli1OkeV.Csby5szGk9LzMZ82MbWGSPkz8AS','d7a8GuYVPU',NULL,'2020-12-07 08:20:40','2020-12-07 08:20:40'),(9,'Jayson','Schneider','vhowe@example.com',NULL,NULL,'2020-12-07 08:20:39','$2y$10$UZJl6MrI5iNQQB6x/9P2geyI1UzAlCMQzCIzFLNiVzR7gkfehKQli','ONiU1Ye76d',NULL,'2020-12-07 08:20:40','2020-12-07 08:20:40'),(10,'Juliana','Feil','lweimann@example.net',NULL,NULL,'2020-12-07 08:20:39','$2y$10$kiX/Y4txctWXSzX4GQPO7OalD7rNw9w3TUJtXWogrc/aIXLNf4xFq','kYg0HNqPF5',NULL,'2020-12-07 08:20:40','2020-12-07 08:20:40'),(11,'Frederick','Graham','otho34@example.org',NULL,NULL,'2020-12-07 08:20:39','$2y$10$l4uoE.mmS9kpdxL6GFTlLuYYWEEvWJlqMSdzCfg070O5FYSycFZt.','qvDE3Kc5Wp',NULL,'2020-12-07 08:20:40','2020-12-07 08:20:40'),(12,'Uriah','Blanda','jaskolski.jazlyn@example.net',NULL,NULL,'2020-12-07 08:20:58','$2y$10$3qhLDUXqh40DKFtTSd51keRX2pRjR68tufenaiqpXQB.Ej.7HOkrq','UdckLSSoVO',NULL,'2020-12-07 08:20:58','2020-12-07 08:20:58'),(13,'Henriette','Donnelly','heidi25@example.org',NULL,NULL,'2020-12-07 08:20:58','$2y$10$h1iI9DAsMZugyEutflC9SeUVx8flpoJnh934EGjWGq2vbEmvy517C','5p8AQm3apk',NULL,'2020-12-07 08:20:58','2020-12-07 08:20:58'),(14,'Larue','Osinski','demarco81@example.org',NULL,NULL,'2020-12-07 08:20:58','$2y$10$YZySAnDIYHWtVXwuTewsSeRLFCMDUHF8X7XhCkQ1Nbez8YsHDxqd.','7MveCtbAiv',NULL,'2020-12-07 08:20:59','2020-12-07 08:20:59'),(15,'Anjali','Swaniawski','smitham.mikayla@example.com',NULL,NULL,'2020-12-07 08:20:58','$2y$10$prHIoUQ.viKF.FHaobXVlORqNrPAoLg2axxfOLhGCf59V920qBblO','JjqgziIaPU',NULL,'2020-12-07 08:20:59','2020-12-07 08:20:59'),(16,'Shannon','Larson','wcremin@example.com',NULL,NULL,'2020-12-07 08:20:58','$2y$10$EYDzwIvZS03zwrEmFS.EvuogEObV5A3vOXMZzNwrfFotGiEWHzay2','02zEj4T3bC',NULL,'2020-12-07 08:20:59','2020-12-07 08:20:59'),(17,'Sydnee','Flatley','fstreich@example.net',NULL,NULL,'2020-12-07 08:20:58','$2y$10$XiN/EP9HONvMNpSd6D9VWusXhpV4UxSvIgwP2zl97u.bHNblGJBYS','0cflSkrucH',NULL,'2020-12-07 08:20:59','2020-12-07 08:20:59'),(18,'Benjamin','Johnston','tad.predovic@example.com',NULL,NULL,'2020-12-07 08:20:58','$2y$10$AYNKF0EK0HV3zi9aPIrqyu5Pg.SDnEVMopnDZikvKe0dOxGJe0fiC','OJaWP8A9lA',NULL,'2020-12-07 08:20:59','2020-12-07 08:20:59'),(19,'Ethelyn','Reinger','bertha.kozey@example.com',NULL,NULL,'2020-12-07 08:20:58','$2y$10$u8HZiWzc1p2iXmJi2C81T.6cCW.mI7praidNEojEU71a3tDeMV4n6','nMlbZtetCY',NULL,'2020-12-07 08:20:59','2020-12-07 08:20:59'),(20,'Adrianna','Predovic','cooper65@example.net',NULL,NULL,'2020-12-07 08:20:58','$2y$10$v3gYtxzE0jjY9mCuCIH6GewHkA1cHF27dOhfDgAPiD2rCQS01TLw6','87i5NBzzJp',NULL,'2020-12-07 08:20:59','2020-12-07 08:20:59'),(21,'Clarissa','Hand','adouglas@example.com',NULL,NULL,'2020-12-07 08:20:58','$2y$10$lFr7ZCjd03aa3O.EDzUeXeerGtW.2tB8xXHCRYc5GeKdfj8DVlL8S','NstaSZ5S7x',NULL,'2020-12-07 08:20:59','2020-12-07 08:20:59'),(22,'Annette','Gerhold','ffeil@example.com',NULL,NULL,'2020-12-07 08:21:00','$2y$10$aUhKoTvNZ4Gz9Fgl.Wvx3.23hJJ/wyblcYnJlqqFQ3.aAQ/DGLigm','KM2OHsfb7g',NULL,'2020-12-07 08:21:01','2020-12-07 08:21:01'),(23,'Blanca','Ferry','evangeline.ortiz@example.org',NULL,NULL,'2020-12-07 08:21:00','$2y$10$dB76IF8EO05u04IB3xjtOeRQa5uV8VQwqEKxtdDmZ9JJuD8oT0zdC','qKZuy2ZqHb',NULL,'2020-12-07 08:21:01','2020-12-07 08:21:01'),(24,'Genevieve','Nicolas','pbraun@example.net',NULL,NULL,'2020-12-07 08:21:00','$2y$10$vDDoeQKPLjc8VmELAzDUeu0VRut7JjT33XmOQw7GdqYm2DCFBcUJy','JXCzwktMPX',NULL,'2020-12-07 08:21:01','2020-12-07 08:21:01'),(25,'Consuelo','Jakubowski','boyd.aufderhar@example.com',NULL,NULL,'2020-12-07 08:21:00','$2y$10$UqCk5MtLRr5ap9bXinsqnOTcNyrothFJryKdjsuM.FK6MCXg00AI2','T3PqN4Obiw',NULL,'2020-12-07 08:21:01','2020-12-07 08:21:01'),(26,'Brown','Mante','tanya84@example.net',NULL,NULL,'2020-12-07 08:21:00','$2y$10$vUqxeIi3wv49sClMXN7KIu.E6iStdLYTt9edqPZwqYxEHCEyV3eXu','J0KOfVIow7',NULL,'2020-12-07 08:21:01','2020-12-07 08:21:01'),(27,'Alex','Jacobi','moore.orville@example.com',NULL,NULL,'2020-12-07 08:21:01','$2y$10$YleYXJzukBOK1a6/Ill5te7F2YaAMgkqloY7qWKWxMN3yzdzLG48C','L08PSzNwyH',NULL,'2020-12-07 08:21:01','2020-12-07 08:21:01'),(28,'Danyka','Beier','olaf.bauch@example.net',NULL,NULL,'2020-12-07 08:21:01','$2y$10$sBRVL/h6V3fTCWNRKsMVvur3xcQanjY6Lmy93e1Yxat5sRygHdVdm','tj0JlLp3Gv',NULL,'2020-12-07 08:21:01','2020-12-07 08:21:01'),(29,'Jean','Nienow','wwyman@example.org',NULL,NULL,'2020-12-07 08:21:01','$2y$10$VG1og9bzh5RovOZRQOd/bOZRXg3fVBLx7a1BRiZTE6xu89MrZdGNe','WWo95vHsA7',NULL,'2020-12-07 08:21:01','2020-12-07 08:21:01'),(30,'Lorna','Dickens','cleuschke@example.com',NULL,NULL,'2020-12-07 08:21:01','$2y$10$BtpCf228Ctqw/vqigJhJSu4CUlESgQREn1Dyv/f9sWoLpj/2HCjzC','kXcQfTRxj4',NULL,'2020-12-07 08:21:01','2020-12-07 08:21:01'),(31,'Quinten','Pagac','bradly96@example.net',NULL,NULL,'2020-12-07 08:21:01','$2y$10$StxpHAs0QzGgW48sncsdAeSazYgme0UoZJ89eD39HGAIYv6FGUura','TO35WdGjzr',NULL,'2020-12-07 08:21:01','2020-12-07 08:21:01'),(32,'Jacinthe','Stoltenberg','dahlia02@example.com',NULL,NULL,'2020-12-07 08:21:02','$2y$10$5ApAI8nuoM9ahMSpfeBHxuuayMiU7pg7AKG8CysMimzme4zEYc5t6','rQjRe3DAb9',NULL,'2020-12-07 08:21:03','2020-12-07 08:21:03'),(33,'Elnora','Douglas','rhiannon.erdman@example.com',NULL,NULL,'2020-12-07 08:21:02','$2y$10$qJJwXRdf3WU1N3yDPvfTuO.Q95yv.sVMAjcOStD4amDE9p259zS7W','SqJF2ewwVb',NULL,'2020-12-07 08:21:03','2020-12-07 08:21:03'),(34,'Korbin','Cassin','wiza.jillian@example.net',NULL,NULL,'2020-12-07 08:21:02','$2y$10$q50B6r5TXwzdeHxBVOZc.eEO/RN5TBNIx7wTXLPts4brCTvZcN2hG','0p8KGImNh7',NULL,'2020-12-07 08:21:03','2020-12-07 08:21:03'),(35,'Darwin','Robel','evonrueden@example.com',NULL,NULL,'2020-12-07 08:21:02','$2y$10$WrOyDJya6CsCey2DQCI0t.0kuiXHD1bD58TOPH.OfwZ9hUNucJYRm','2IW1VtFmO1',NULL,'2020-12-07 08:21:03','2020-12-07 08:21:03'),(36,'Justus','Casper','hayes.christop@example.com',NULL,NULL,'2020-12-07 08:21:02','$2y$10$fgg/Wd.BCZ6nlyRQSGxm1OWhd.cKr4z0qSkP1nHsIV6eFpiXwDlf2','kpd0sQZvVu',NULL,'2020-12-07 08:21:03','2020-12-07 08:21:03'),(37,'Yesenia','Corkery','royal31@example.com',NULL,NULL,'2020-12-07 08:21:03','$2y$10$NTRDIlGJO7FTUy6my6xiyeU97RbGJqPWCpfZDcurcUzk4n1v.q.Hm','LGmIzBMU79',NULL,'2020-12-07 08:21:03','2020-12-07 08:21:03'),(38,'Retha','Romaguera','hkuhic@example.org',NULL,NULL,'2020-12-07 08:21:03','$2y$10$iOM1pfi.rD.aRMTIbqtZBuqwZbNjt8VvnFPK9TKqXdoMUkXvSJ49a','Rg2mNR8ESs',NULL,'2020-12-07 08:21:03','2020-12-07 08:21:03'),(39,'Amani','Mayert','fschulist@example.net',NULL,NULL,'2020-12-07 08:21:03','$2y$10$9LZK/gDibQs9vKdxroWL..zOnk3dTYjfHA2oUIFWN6pqLg1oiscE2','WmjmIAdl1d',NULL,'2020-12-07 08:21:03','2020-12-07 08:21:03'),(40,'Katarina','Bahringer','katarina17@example.net',NULL,NULL,'2020-12-07 08:21:03','$2y$10$N7xaR63kwH2hMbEda7y97OLNkNwVAqcdvNOWrLPboEImLbci1O7jq','tPDNNIHZdp',NULL,'2020-12-07 08:21:03','2020-12-07 08:21:03'),(41,'Dante','Reynolds','ztowne@example.net',NULL,NULL,'2020-12-07 08:21:03','$2y$10$U6ZDHJl9SRAgDC7CPo9i.O2A9MjOTrLErTfgOVdpSDNVj47xHqRw6','OqVtV7CqbX',NULL,'2020-12-07 08:21:03','2020-12-07 08:21:03'),(42,'Henry','Labadie','ashton.ruecker@example.com',NULL,NULL,'2020-12-07 08:21:04','$2y$10$XaHHSigWj83PyjC3Cb0ZR.Tv.SEJUJMawX/a/0.wKvU8uNIz7l8ta','qIxrZRdvj8',NULL,'2020-12-07 08:21:05','2020-12-07 08:21:05'),(43,'Montana','Hauck','verda95@example.org',NULL,NULL,'2020-12-07 08:21:04','$2y$10$Ihi1GJ31jwXKTz1uWt.ESuSNMBCJuBJ4MJHVNhsGM3YBXeg9QoFLO','mi7t1Jb8cT',NULL,'2020-12-07 08:21:05','2020-12-07 08:21:05'),(44,'Jerry','Pouros','candace.quitzon@example.org',NULL,NULL,'2020-12-07 08:21:04','$2y$10$TbSbWnmZT4ckkgz/G7KChuKzvhPed0laMncnBQiEAlbXKOqqv9kQy','gUklfMOOFR',NULL,'2020-12-07 08:21:05','2020-12-07 08:21:05'),(45,'Floyd','Mann','adela.abshire@example.com',NULL,NULL,'2020-12-07 08:21:04','$2y$10$QhBQan6RlfGrYrFI5R5KHu1WQMXki0DRyH/wr.ww71so8CdvUMkSu','gvhu9edm2k',NULL,'2020-12-07 08:21:05','2020-12-07 08:21:05'),(46,'Earl','Hauck','vhegmann@example.org',NULL,NULL,'2020-12-07 08:21:04','$2y$10$1Z4MCspPfKaumbNnBDW5meqDzq30Wqo6kOjFo9VDmaFDTESvqCaDe','VBo22IeUPM',NULL,'2020-12-07 08:21:05','2020-12-07 08:21:05'),(47,'Chase','Turner','toy.ian@example.org',NULL,NULL,'2020-12-07 08:21:04','$2y$10$OGFfY6BK26FklcKLTlFdK.a0hBTFcSdUcL2kow1J80sVkD01Fx89W','96HjOAndil',NULL,'2020-12-07 08:21:05','2020-12-07 08:21:05'),(48,'Annabelle','Carter','nona.conroy@example.net',NULL,NULL,'2020-12-07 08:21:05','$2y$10$RKu4BtohZ0zcIu.oIEvI3uQ6Ix7hgSajr.jBs.j1YDX5G07lP7dsK','q9SHhZVWzP',NULL,'2020-12-07 08:21:05','2020-12-07 08:21:05'),(49,'Jada','Halvorson','brandt72@example.com',NULL,NULL,'2020-12-07 08:21:05','$2y$10$ZJt2oU6GKMglY5pHqMobnup.serlf1Qd/bhi7wlq9Vysl1btqaRlK','3kjC6oJdU1',NULL,'2020-12-07 08:21:05','2020-12-07 08:21:05'),(50,'Adan','Bashirian','bert45@example.net',NULL,NULL,'2020-12-07 08:21:05','$2y$10$sdukTEepMv7ZhsbqifyZVOjY0yeIypOD7ZmLLCk.VlXHK/mjsGFrO','FbFOtY6dwL',NULL,'2020-12-07 08:21:05','2020-12-07 08:21:05'),(51,'Kenyatta','Kemmer','connelly.brent@example.org',NULL,NULL,'2020-12-07 08:21:05','$2y$10$6kvxboOgvpFD.5xdqb4MBerVbMm45IK0B7CCeRyu0gdtWgH2QiL1q','B0dB3P27hj',NULL,'2020-12-07 08:21:05','2020-12-07 08:21:05'),(52,'Laura','Hansen','lemke.magnolia@example.org',NULL,NULL,'2020-12-07 08:21:06','$2y$10$z5vboIE7oa3ZGewtwLshU.AlRhfJ80IIFDqnwiETZuRIWGLRgdELa','049HV5qSG2',NULL,'2020-12-07 08:21:07','2020-12-07 08:21:07'),(53,'Bert','Dickinson','etreutel@example.org',NULL,NULL,'2020-12-07 08:21:06','$2y$10$WiZpGYGTM6Idkv3TMCJKWOP8qeyHXWNOffvM9CB.QyCClo0Qy5KJy','1k8dKLhFUW',NULL,'2020-12-07 08:21:07','2020-12-07 08:21:07'),(54,'Sage','Kub','nora48@example.com',NULL,NULL,'2020-12-07 08:21:06','$2y$10$goxaxsDGe9s9nSmujhy9Ke7KPcrd.VOtr/hiFGs1Kh182s0udUOr6','OG5zb4OGQy',NULL,'2020-12-07 08:21:07','2020-12-07 08:21:07'),(55,'Toney','Beer','uschroeder@example.com',NULL,NULL,'2020-12-07 08:21:06','$2y$10$9X1B7RJ3m9MNjX1ddKlKvetfAXTq2pG3lsHeNdBP6nF4SgCW4R7h6','WblvggBL0t',NULL,'2020-12-07 08:21:07','2020-12-07 08:21:07'),(56,'Hermann','Lueilwitz','isai.rodriguez@example.net',NULL,NULL,'2020-12-07 08:21:07','$2y$10$O7UN55.7ecTYAFnJqVG3XeVqdxbAzzuFGZRlVQWM2Sj/86RqL7jly','F6BAIvNK2c',NULL,'2020-12-07 08:21:07','2020-12-07 08:21:07'),(57,'Greta','Mitchell','frederique.hoppe@example.org',NULL,NULL,'2020-12-07 08:21:07','$2y$10$R9Q/ngFLbdqcTqSgHJ7PwO4qr5bO.JmqXZe6pXSvGrC2mGr2om3SW','ycSCbXP11A',NULL,'2020-12-07 08:21:07','2020-12-07 08:21:07'),(58,'Tiana','Jaskolski','imani.schuster@example.com',NULL,NULL,'2020-12-07 08:21:07','$2y$10$vaKNf/32Rr3EkyKMYbMJ4.l33tvhLehtZFOWPTJBF.0h2Uc/58Z52','NmvtfmPUgv',NULL,'2020-12-07 08:21:07','2020-12-07 08:21:07'),(59,'Hosea','Toy','iharvey@example.com',NULL,NULL,'2020-12-07 08:21:07','$2y$10$./0GhJ3CyZGRsCJQKkYVZuU5CeRbz/amiN./pJ5W/.tWd0AkRrst6','XALLhAomQf',NULL,'2020-12-07 08:21:07','2020-12-07 08:21:07'),(60,'Bonnie','Orn','sterling.ferry@example.org',NULL,NULL,'2020-12-07 08:21:07','$2y$10$3bPBewQgIYGysUQ5nBI3QuJR.9rRI3vZc35Awn/rHNuJAy4JDI.nq','6wWYzKtaPF',NULL,'2020-12-07 08:21:07','2020-12-07 08:21:07'),(61,'Mike','Bechtelar','rippin.roberta@example.com',NULL,NULL,'2020-12-07 08:21:07','$2y$10$X7rltWjTgwHelHHgQBVWpegG5vUfshIHdpR/n9n5vuvE47VRoqjGu','nGH0uR1LAF',NULL,'2020-12-07 08:21:07','2020-12-07 08:21:07'),(62,'Jazmyn','Donnelly','nicola.fay@example.org',NULL,NULL,'2020-12-07 08:21:08','$2y$10$6v3Vl5vyaesXm/Z65FcUGObLFfpYk9aEL7LXGLq/zxBPxXiKYjH2y','9gfsL1xGGI',NULL,'2020-12-07 08:21:09','2020-12-07 08:21:09'),(63,'Kayla','Jerde','emayer@example.net',NULL,NULL,'2020-12-07 08:21:08','$2y$10$c1EXK0kobzB0XwsQkHAo0etKl4kW9EJOS1wdFSf4msyRcQip1QNGG','Bfk9VIAmpO',NULL,'2020-12-07 08:21:09','2020-12-07 08:21:09'),(64,'Imogene','Reinger','sadie58@example.org',NULL,NULL,'2020-12-07 08:21:08','$2y$10$/8gDUBGnAsCl/CK9A43PgO0jYUq4SunsWbRCYl//R9zT8qHu5gs36','mVqL5ifc7z',NULL,'2020-12-07 08:21:09','2020-12-07 08:21:09'),(65,'Rylan','Gerlach','kaylin.lubowitz@example.org',NULL,NULL,'2020-12-07 08:21:08','$2y$10$xAJZ/4Gqpikov9wKuF0dW.kQtJ8CtYxNSjujURRoJ0.sWjuQ6ppUS','UkeISC9Q8i',NULL,'2020-12-07 08:21:09','2020-12-07 08:21:09'),(66,'Janice','Satterfield','iweimann@example.net',NULL,NULL,'2020-12-07 08:21:08','$2y$10$t5CcFr12I2K3DO/uqAGt7u1OaM.bBV/DOKZmrvqK1Gvbh2lPnuPeG','dsbSUFPLVT',NULL,'2020-12-07 08:21:09','2020-12-07 08:21:09'),(67,'Beth','Wisozk','gayle05@example.com',NULL,NULL,'2020-12-07 08:21:08','$2y$10$ODvYRgx8iEmMG9gZIvu5Pebckv.Dl1QlAdpfsIacSUbCRDEXeuY0W','0FYPQDaXGW',NULL,'2020-12-07 08:21:09','2020-12-07 08:21:09'),(68,'Makenna','Hintz','xlowe@example.com',NULL,NULL,'2020-12-07 08:21:08','$2y$10$/DO9jtPVAdhJSWsftfLrNexYA43dgIFsfy/nlDQBdRBkuHuJhBkiK','BTRdVJ8mIr',NULL,'2020-12-07 08:21:09','2020-12-07 08:21:09'),(69,'Gail','Kling','ivah84@example.com',NULL,NULL,'2020-12-07 08:21:09','$2y$10$4aWjqbZLIyHb7PdvRHh3bOiOlSS/GY1ujHF/HISt82/.IriTnNiXe','Yx2p4kA3HT',NULL,'2020-12-07 08:21:09','2020-12-07 08:21:09'),(70,'Manley','Bauch','ova.blanda@example.org',NULL,NULL,'2020-12-07 08:21:09','$2y$10$MTDATb9HJifp.SRXwE3bru7rpfSTVN.iBwOHmjfC2ZZ.mmaz1iBK2','bWNxekZsUO',NULL,'2020-12-07 08:21:09','2020-12-07 08:21:09'),(71,'Mafalda','Stark','crona.joana@example.net',NULL,NULL,'2020-12-07 08:21:09','$2y$10$uAG8t95BTP/yDm/jC935k.MO74R/NWP25xA5nvUJOEWK1Q362V1d6','yba9fjnoh7',NULL,'2020-12-07 08:21:09','2020-12-07 08:21:09'),(72,'Gia','Weissnat','ziemann.euna@example.com',NULL,NULL,'2020-12-07 08:21:11','$2y$10$/jB./E79slolI4N1nmZYI.rhu3iykh01ASFOfNtjmI6oFrsBfc57G','cCHU5YWUVG',NULL,'2020-12-07 08:21:11','2020-12-07 08:21:11'),(73,'Claude','Weissnat','heaven51@example.net',NULL,NULL,'2020-12-07 08:21:11','$2y$10$.ONdjs/0kl/6Zg3BUwstqOp.MDdKY6Kn70MVlrAhovyp6gFo9u9Bu','1SsV11N0vR',NULL,'2020-12-07 08:21:11','2020-12-07 08:21:11'),(74,'Katelin','Doyle','zdaniel@example.net',NULL,NULL,'2020-12-07 08:21:11','$2y$10$4/oasGcsBDPdVsykV9abL.jHLGiiNXMWOlrNSSXWdoXAQsYkENEYS','WrlZBLvhIr',NULL,'2020-12-07 08:21:11','2020-12-07 08:21:11'),(75,'Camila','Weissnat','lkoch@example.net',NULL,NULL,'2020-12-07 08:21:11','$2y$10$K3A3Mu55Bgv0n6nRMyFW9u6eETA0mGuUKr/VE3GJ3gLBdcblk9lRK','3EOdDn66p3',NULL,'2020-12-07 08:21:11','2020-12-07 08:21:11'),(76,'Jerad','Lind','isaac25@example.net',NULL,NULL,'2020-12-07 08:21:11','$2y$10$T2m8GW.Ou2V9ixkRzLsR9erHo2e7nxWzYOPIFP9Hg5k3mutolqJFK','GveU2PjnjI',NULL,'2020-12-07 08:21:12','2020-12-07 08:21:12'),(77,'Virginie','Lang','tratke@example.net',NULL,NULL,'2020-12-07 08:21:11','$2y$10$H1aZ/NyLCZ/VIlaq67DYJ.fp90tjnFVcPx1do9nRKzdeQKByVL54K','Ep2VvKXhWx',NULL,'2020-12-07 08:21:12','2020-12-07 08:21:12'),(78,'Charity','Kohler','zemlak.gladys@example.net',NULL,NULL,'2020-12-07 08:21:11','$2y$10$2iftjuoWFy6wG27aDiavAuX9hYmOLCcbdDDuu8p.b7lJVL3gT.u9m','o8maIx47Lj',NULL,'2020-12-07 08:21:12','2020-12-07 08:21:12'),(79,'Stan','Kutch','rosalinda14@example.com',NULL,NULL,'2020-12-07 08:21:11','$2y$10$xF1366BdXeOVoiPVkj7VqO/2r50lYuaJPRblXoR1jkAPPRfTTM.le','IhpHvg0OFt',NULL,'2020-12-07 08:21:12','2020-12-07 08:21:12'),(80,'Lessie','Nitzsche','denesik.roberta@example.com',NULL,NULL,'2020-12-07 08:21:11','$2y$10$UgX0GTDR5Ame/bSUiSn.H.GT7Ux8zBIjdy0bgHCTLtcTL3R41CLNC','bhCfcPtm0q',NULL,'2020-12-07 08:21:12','2020-12-07 08:21:12'),(81,'Randall','Schneider','wilmer41@example.com',NULL,NULL,'2020-12-07 08:21:11','$2y$10$kHVyhTQdp7mEk2DtI6/PzuBtOF/Fi5CIpy3dBzfFw4T4SLasICM8.','ttY3kCtRok',2,'2020-12-07 08:21:12','2021-03-10 07:18:38'),(82,'Kareem','Turner','spencer.bonnie@example.org',NULL,NULL,'2020-12-07 08:21:13','$2y$10$JkMJ6oxXrIVmQrGaFUa6CeuWS.Z3eYQKB9DQsUDg0EYGulP1VpDRu','RegU6D0Bb0',2,'2020-12-07 08:21:13','2021-03-10 07:18:38'),(83,'Damian','Graham','myrl.paucek@example.com',NULL,NULL,'2020-12-07 08:21:13','$2y$10$UxA/NKjosxiklSWSiGcUcOg3hcCXhkXZo7OkJJapMuaxr/L8svmg2','oFe6Dw0UHp',NULL,'2020-12-07 08:21:13','2020-12-07 08:21:13'),(84,'Kaia','Borer','erich.gorczany@example.net',NULL,NULL,'2020-12-07 08:21:13','$2y$10$1gfLF5R4qKUWCgKjeSi.EuNQNQVeQb0LB5ceyDIJoV91XeucXlbBW','0PndnE7qYV',NULL,'2020-12-07 08:21:13','2020-12-07 08:21:13'),(85,'Ebba','Carroll','adella95@example.org',NULL,NULL,'2020-12-07 08:21:13','$2y$10$gd4bH0Pdfev7Lnl9sv.9Leshd9xl7QRe1ujJxtzY1rYUmNAXAYPHG','6bN4bc5ZW0',4,'2020-12-07 08:21:13','2021-03-10 07:19:39'),(86,'Muriel','Marquardt','lonzo.bahringer@example.net',NULL,NULL,'2020-12-07 08:21:13','$2y$10$.93jD.Q.cPTA9wYj/pXASOt5/hoknovB6d2PqJTl7E0tHE1W70iKe','ON44Oq8G3O',4,'2020-12-07 08:21:13','2021-03-10 07:19:39'),(87,'Arno','Doyle','kasey.jakubowski@example.com',NULL,NULL,'2020-12-07 08:21:13','$2y$10$5Ss1yudM7KMLC27Gt6nwQurOKMX6GgnDClllbgIGujJHMnP5BmFCa','Yuify47z0Y',NULL,'2020-12-07 08:21:13','2020-12-07 08:21:13'),(88,'Sophie','Williamson','aniyah.stehr@example.com',NULL,NULL,'2020-12-07 08:21:13','$2y$10$juq6ml/F9QIOqf9yy6zK5OD6.xykvJ0Z2iK5SfAdY6oNSxNEqdbwu','tr453PmO9J',NULL,'2020-12-07 08:21:13','2020-12-07 08:21:13'),(89,'Marcos','Keebler','sboyer@example.com',NULL,NULL,'2020-12-07 08:21:13','$2y$10$OVq7irBi0sR.5j3imAnwFuLpCxKPnRrI4GpAKLoUnNKBGtXrkE2yK','I4mNoSizvY',NULL,'2020-12-07 08:21:13','2020-12-07 08:21:13'),(90,'Lavada','Mosciski','zpfannerstill@example.org',NULL,NULL,'2020-12-07 08:21:13','$2y$10$RqpM4MVKcEiuDwOrkKePkuTQ13k5TO8eX2y2ioaoKwh9VqHK/mnJq','fhPlztx3Pu',1,'2020-12-07 08:21:13','2021-03-10 07:59:46'),(91,'Kari','Johnston','glenna05@example.net',NULL,NULL,'2020-12-07 08:21:13','$2y$10$apdJHe6sqNWqRbzqYtLzhu8HdBmddmAAXNEbnNERRZmLpVE7MhkQ2','0tTo8AuIWr',1,'2020-12-07 08:21:14','2021-03-10 07:59:46'),(94,'Jaylen','Kirlin','esteuber@example.com',NULL,NULL,'2020-12-07 08:21:15','$2y$10$63.t.V3xI2C.PZcYnjFbS.ZhccuLwtUjYKJBA7Z4cGfubDv5oEZ0u','MXag2Wb1Jm',1,'2020-12-07 08:21:15','2021-03-10 07:59:46'),(98,'Juwan','Russel','cloyd.little@example.com',NULL,NULL,'2020-12-07 08:21:15','$2y$10$gYrmT3g.o6TZhSFN7514i.mF1GQXnkOuyuprfU8vb2NbGFzwY56eC','W7e9TfjC11',1,'2020-12-07 08:21:15','2021-03-10 07:59:46'),(100,'Hailie','Dare','owatsica@example.com',NULL,NULL,'2020-12-07 08:21:15','$2y$10$HidQPxVRkyMBsb6DGpsGm.0zAGPAUxthonaoZ3JGA.dEFKoLuyA4S','U2VTnlgxXEP6fJI03WZ5Mwbl7aE9SPLtgvPBUV3enwE78fuQbkYqMEoMqIgJ',1,'2020-12-07 08:21:16','2021-03-10 07:59:46'),(101,'Estel','Quigley','sharon13@example.org',NULL,NULL,'2020-12-07 08:21:15','$2y$10$Z9rTe.2ZIOUDGMtoIGvXk.mp88LlWzUFN2e36Uu4TLfYweeB3qrlm','wdcsMAhLo4',1,'2020-12-07 08:21:16','2021-03-10 07:59:46'),(102,'test','admin','test@admin.com',NULL,NULL,NULL,'$2y$10$BJo/kEiHUlsysBr/QpJRCeKyzxBGZulQvSCKAy1GvoschYSiGd98K',NULL,1,'2020-12-20 07:22:45','2021-03-10 07:59:46'),(103,'test 1','admin 1','test1@admin1.com',NULL,NULL,NULL,'$2y$10$OBZHbNA2td0DTxgq4frlfuPzwdyYDMyTE5Ajz6KmYy74U0R8C1wyy',NULL,1,'2020-12-20 07:30:47','2021-03-10 07:59:46'),(104,'Peter','Parker','peter@parker.com',NULL,NULL,NULL,'$2y$10$vDUWoKjhEBQYQZsEOpHgg.hKxT5umiXt/A9MjSpaJ6caT./av1wwa',NULL,1,'2021-01-30 08:58:12','2021-03-10 07:59:46'),(107,'test','test','admin123@admin.com','9876543210',NULL,NULL,'$2y$10$n3bFOaPR8os1Zx8iTUm.NO6nSj/oRzUALpjEiuTzeFFAHmprOsqDy',NULL,1,'2021-02-03 07:08:01','2021-03-10 07:59:46'),(108,'use','api','user@api.com',NULL,NULL,NULL,'$2y$10$I0nIi9HVOS7XQZ7ez8VYQOB7ojk8cLAizjqLGuef69T7x4TXjTVs.',NULL,NULL,'2021-05-16 07:28:57','2021-05-16 07:28:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-17 21:44:59
