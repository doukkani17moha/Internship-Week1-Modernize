-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 16 juil. 2023 à 13:31
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clinic`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_lastname` varchar(255) DEFAULT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_phone` varchar(255) DEFAULT NULL,
  `admin_adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_Image` varchar(255),
  `blog_description` longtext CHARACTER SET utf8 DEFAULT NULL,
  `datecreation` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


--
-- Structure de la table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_lastname` varchar(255) NOT NULL,
  `doctor_Image` varchar(255) DEFAULT NULL,
  `doctor_email` varchar(255) DEFAULT NULL,
  `doctor_phone` int(20) NOT NULL,
  `doctor_specialite` varchar(255) DEFAULT NULL,
  `dateajoutation` timestamp NULL DEFAULT current_timestamp(),
  `is_active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
  `patient_name` varchar(255) NOT NULL,
  `patient_lastname` varchar(255) DEFAULT NULL,
  `patient_email` varchar(255) DEFAULT NULL,
  `patient_adress` varchar(255) DEFAULT NULL,
  `patient_phone` int(20) NOT NULL,
  `patient_probleme` varchar(255) DEFAULT NULL,
  `doctor_id` int(4) DEFAULT NULL,
  `appointement_id` int(4) DEFAULT NULL,
  `dateajoutation` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

CREATE TABLE `appointment` (
  `appointement_id` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `patient_name` varchar(255) NOT NULL,
  `patient_email` varchar(255) default NULL,
  `doctor_name`  varchar(255) NOT NULL,
  `date_appointement` date NOT NULL,
  `time_appointement` varchar(10)NOT NULL,
  `probleme` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER table `patient` ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);
ALTER table `patient` ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`appointement_id`) REFERENCES `appointment` (`appointement_id`);

--
-- Adding Values to table 'admin'
--

INSERT INTO `admin` (
    `admin_id`,
    `admin_name`,
    `admin_lastname`,
    `admin_username`,
    `admin_email`,
    `admin_password`,
    `admin_phone`,
    `admin_adresse`
  )
VALUES (
    1,
    'Mohamed',
    'Elbaik',
    'admin',
    'admin@admin.com',
    'admin123',
    0696807732,
    'Que Miftah Elkhair Safi'
  );

--
-- Adding Values to table 'blog'
--
INSERT INTO `blog` (
    `blog_id`,
    `blog_title`,
    `blog_Image`,
    `blog_description`,
    `datecreation`
  )
VALUES
(1, 
'Maladaptive Daydreaming: What Is It and Why Do We Do It?', 
'nature.jpg', 
'Some who have struggled with childhood trauma might develop maladaptive daydreaming as a coping mechanism.  For example, when I was only four, I endured child-on-child sexual assault and emotional abuse that made me feel isolated from the rest of the world. It felt too terrifying and heavy to be in the real, present moment. Any time I was still or not distracted, I felt extreme anxiety, panic, and sadness. This led to my development of maladaptive daydreaming — a habit I am still actively trying to break as an adult today.', 
'2023-07-17 19:16:22'),
(2, 
'Saying Goodbye to Trauma', 
'person.jpg', 
'I have battled grief in relation to my posttraumatic stress disorder (PTSD). I have spent years mourning the life I had before my trauma, as well as the life I feel I could have had if that traumatic event had never happened in the first place. Posttraumatic stress disorder has amplified my experience of grief.', 
'2023-07-05 21:00:45'),
(3, 
'PTSD and Grief Coping with Loss', 
'Goodbye.jpg', 
'I joined HealthyPlace a year ago as a way to better understand my posttraumatic stress disorder (PTSD) diagnosis. Writing about the impact PTSD has had on my life has been therapeutic, and I have learned a lot about myself in the process. I have also found great comfort in the online mental health community HealthyPlace has provided. However, it is time for me to move onto new adventures and say goodbye to HealthyPlace.', 
'2023-06-14 12:16:50'),
(4, 
'Trauma Can Induce Negative Coping Strategies', 
'negativestrategies.jpg', 
'My name is Adam M., and this is my story about using negative coping strategies after experiencing a trauma.', 
'2023-06-31 04:16:24'),
(5, 
'Self-Forgiveness and PTSD: Healing Shame', 
'forgiveness.jpg', 
'Self-forgiveness in posttraumatic stress disorder (PTSD) recovery is a valuable, yet often ignored, aspect of trauma healing. While we hear a lot about the importance of forgiving people that have hurt us, learning how to forgive ourselves is something that is not regularly discussed. However, self-forgiveness is crucial to our wellbeing, especially for people with PTSD.', 
'2023-06-28 11:52:50'),
(6, 
'How to Treat PTSD Nightmares', 
'dreams.jpg', 
'Nightmares are one of the most common symptoms of posttraumatic stress disorder (PTSD). While most people experience a nightmare or two in their lifetime, up to 72% of people suffering from PTSD develop recurring nightmares as a result of the disorder. I am one of those people. I started experiencing nightmares as a result of PTSD when I was sixteen. Almost eight years later, I still get them every time I close my eyes to sleep. Coping with daily nightmares (and the poor sleep quality that can result) has been difficult, but I have found ways to manage them over time.', 
'2023-07-19 15:24:50');


--
-- Adding Values to table 'doctor'
--
INSERT INTO `doctor` (
  `doctor_id`, 
  `doctor_name`, 
  `doctor_lastname`, 
  `doctor_email`, 
  `doctor_Image`,
  `doctor_phone`, 
  `doctor_specialite`, 
  `dateajoutation`, 
  `is_active`) 
VALUES
(1, 'Mohamed', 'Doukkani', 'mdk8@gmail.com','d1.jpg', 696807732, 'Endocrinologie', '2023-07-17 17:32:29', 1),
(2, 'Hamza', 'Elbaik', 'azt@gmail.com','d2.jpg', 61234856, 'Gynécologie', '2023-07-17 17:32:29', 1),
(3, 'Khadija', 'Nizar', 'df145@gmail.com','d3.jpg', 69587425, 'Hématologie', '2023-07-17 21:51:22', 0),
(4, 'Habiba', 'Nghimi', 'jhf@gmail.com','d4.jpg', 69245485, 'Infectiologie', '2023-07-17 22:02:09', 1),
(5, 'Nizar', 'Esail', 'vdft@gmail.com', 'd5.jpg',6952844, 'Oncologie', '2023-07-17 22:02:09', 0),
(6, 'Adil', 'Namouh', 'adsr@gmail.com', 'd6.jpg',6956884, 'Ophtalmologie', '2023-07-17 22:02:09', 1),
(7, 'Redouane', 'Ngiri', 'logfh@gmail.com', 'd7.jpg',6325147, 'Orthopédie', '2023-07-17 22:02:09', 0),
(8, 'Naima', 'Meqchach', 'gdt45@gmail.com', 'd8.jpg',6347852, 'Pneumologie', '2023-07-17 22:02:09', 1),
(9, 'Hajar', 'Robai', 'hdt47@gmail.com', 'd9.jpg',6471289, 'Rhumatologie', '2023-07-17 22:02:09', 1),
(10, 'Khalid', 'Narsil', 'jfh5@gmail.com','d10.jpg', 6584792, 'Urologie', '2023-07-17 22:02:09', 0);


--
-- Adding Values to table 'appointement'
--
INSERT INTO `appointment` (
  `appointement_id`, 
  `patient_name`, 
  `patient_email`, 
  `doctor_name`, 
  `date_appointement`, 
  `time_appointement`, 
  `probleme`) 
VALUES
(1, 'Ahmed Ghandir', 'hfh@gmail.com', 'Khadija Nizar', '2022-07-16', '14:50', 'Maux de tête'),
(2, 'Ayoub Naime', 'csfd45@gmail.com', 'Redouane Ngiri', '2022-07-22', '13:25', 'Fièvre'),
(3, 'Hind Malki', 'lo98@gmail.com', 'Khalid Narsil', '2022-07-13', '20:36', 'Toux'),
(4, 'Fatiha Naris', 'nch14@gmail.com', 'Adil Namouh', '2022-07-14', '16:45', 'Mal de gorge'),
(5, 'Nouame Robai', 'ju9@gmail.com', 'Hamza Elbaik', '2022-06-04', '14:50', 'Maux d estomac'),
(6, 'Bouchra Doukkani', 'as4@gmail.com', 'Adil Namouh', '2022-08-14', '17:50', 'Mal de dos'),
(7, 'Mehdi Zwin', 'qwer78@gmail.com', 'Khalid Narsil', '2022-07-21', '18:25', 'Grippe'),
(8, 'Adil Chebah', 'jui@gmail.com', 'Hamza Elbaik', '2022-09-04', '14:50', 'Allergies'),
(9, 'Soumya Natika', 'hdgt47@gmail.com', 'Adil Namouh', '2022-07-04', '12:40', 'Migraine'),
(10, 'Aymane Chouiki', 'jfj45@gmail.com', 'Khalid Narsil', '2022-11-12', '21:50', 'Douleurs articulaires');


--
-- Adding Values to table 'patient'
--
INSERT INTO `patient` (
  `patient_id`, 
  `patient_name`, 
  `patient_lastname`, 
  `patient_email`, 
  `patient_adress`, 
  `patient_phone`, 
  `patient_probleme`,
  `doctor_id`, 
  `dateajoutation`) 
VALUES
(1, 'Ahmed', 'GhandBandirir', 'ahmed@gmail.com', 'Rue des Fleurs', '123456789', 'Maux de tête', 1, '2023-07-01 10:00:00'),
(2, 'Fatima', 'Zahra', 'fatima@gmail.com', 'Avenue des Oliviers', '987654321', 'Fièvre', 2,  '2023-07-02 11:30:00'),
(3, 'Karim', 'Benzema', 'karim@gmail.com', 'Boulevard des Roses', '456123789', 'Toux', 3, '2023-07-03 12:15:00'),
(4, 'Lina', 'Maarouf', 'lina@gmail.com', 'Rue des Lys', '789456123', 'Mal de gorge', 4,  '2023-07-04 09:45:00'),
(5, 'Sofia', 'Belkhir', 'sofia@gmail.com', 'Avenue des Violettes', '321654987', 'Maux d estomac', 5,  '2023-07-05 14:20:00'),
(6, 'Youssef', 'Haddad', 'youssef@gmail.com', 'Rue des Tulipes', '852369741', 'Mal de dos', 1, '2023-07-06 16:30:00'),
(7, 'Nadia', 'El Fassi', 'nadia@gmail.com', 'Avenue des Orchidées', '159753486', 'Grippe', 2, '2023-07-07 17:50:00'),
(8, 'Hassan', 'Ouazzani', 'hassan@gmail.com', 'Boulevard des Iris', '654987321', 'Allergies', 3, '2023-07-08 08:45:00'),
(9, 'Samira', 'Rami', 'samira@gmail.com', 'Rue des Narcisses', '321789654', 'Migraine', 4, '2023-07-09 19:10:00'),
(10, 'Ali', 'Tahiri', 'ali@gmail.com', 'Avenue des Roses', '987123654', 'Douleurs articulaires', 5, '2023-07-10 15:25:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
