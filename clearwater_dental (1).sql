-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2026 at 04:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearwater_dental`
--
CREATE DATABASE IF NOT EXISTS `clearwater_dental` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `clearwater_dental`;

-- --------------------------------------------------------

--
-- Table structure for table `patienthistory`
--

CREATE TABLE `patienthistory` (
  `Patient_ID` int(3) DEFAULT NULL,
  `Procedure_ID` varchar(5) DEFAULT NULL,
  `Date` varchar(10) DEFAULT NULL,
  `Amount Billed` varchar(5) DEFAULT NULL,
  `Amount Owed` varchar(5) DEFAULT NULL,
  `Notes` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patienthistory`
--

INSERT INTO `patienthistory` (`Patient_ID`, `Procedure_ID`, `Date`, `Amount Billed`, `Amount Owed`, `Notes`) VALUES
(1, 'D0274', '2025-12-08', '$330', '$177', 'Patient improving'),
(1, 'D4910', '2026-05-05', '$402', '$179', 'Routine follow-up'),
(2, 'D1120', '2026-06-12', '$337', '$304', 'Patient improving'),
(3, 'D0220', '2025-01-21', '$127', '$122', 'Medication adjusted'),
(4, 'D3220', '2025-04-19', '$447', '$107', 'Patient improving'),
(5, 'D0220', '2026-01-16', '$257', '$148', 'No complications'),
(6, 'D3330', '2024-03-29', '$1346', '$126', 'No complications'),
(7, 'D1206', '2025-09-01', '$269', '$177', 'Lab results reviewed'),
(8, 'D7210', '2023-12-20', '$532', '$167', 'Routine follow-up'),
(9, 'D2950', '2023-11-10', '$311', '$102', 'Medication adjusted'),
(10, 'D5110', '2025-08-24', '$1794', '$140', 'Medication adjusted'),
(11, 'D5110', '2023-12-26', '$1767', '$1251', 'Lab results reviewed'),
(12, 'D2140', '2023-08-16', '$352', '$187', 'Patient improving'),
(13, 'D2950', '2024-11-27', '$419', '$386', 'Medication adjusted'),
(13, 'D5120', '2026-06-24', '$1702', '$998', 'Lab results reviewed'),
(14, 'D0150', '2024-12-23', '$318', '$282', 'Medication adjusted'),
(15, 'D1206', '2025-12-26', '$114', '$24', 'Patient improving'),
(16, 'D1120', '2026-04-16', '$283', '$216', 'Routine follow-up'),
(17, 'D1206', '2024-08-23', '$250', '$108', 'Routine follow-up'),
(17, 'D4910', '2024-09-14', '$335', '$210', 'Patient improving'),
(18, 'D2330', '2025-11-26', '$371', '$188', 'Medication adjusted'),
(19, 'D1510', '2024-01-27', '$427', '$98', 'No complications'),
(20, 'D0120', '2023-03-25', '$176', '$122', 'Lab results reviewed'),
(21, 'D1510', '2025-02-01', '$513', '$259', 'Routine follow-up'),
(22, 'D6010', '2025-01-22', '$2610', '$1256', 'Routine follow-up'),
(22, 'D2150', '2025-04-04', '$382', '$44', 'Patient improving'),
(23, 'D7140', '2025-09-22', '$265', '$123', 'Medication adjusted'),
(24, 'D3330', '2023-12-16', '$1408', '$1281', 'No complications'),
(25, 'D2950', '2025-05-22', '$521', '$54', 'Routine follow-up'),
(26, 'D7140', '2024-08-31', '$251', '$33', 'Lab results reviewed'),
(27, 'D7140', '2026-06-11', '$329', '$228', 'Patient improving'),
(28, 'D0274', '2023-05-02', '$284', '$239', 'Routine follow-up'),
(29, 'D0330', '2024-05-16', '$285', '$195', 'Patient improving'),
(29, 'D1120', '2026-03-26', '$160', '$140', 'Patient improving'),
(30, 'D7220', '2025-05-04', '$476', '$447', 'Lab results reviewed'),
(31, 'D0150', '2026-03-26', '$199', '$99', 'No complications'),
(32, 'D1206', '2025-01-05', '$123', '$114', 'Patient improving'),
(33, 'D4910', '2024-03-06', '$350', '$341', 'Routine follow-up'),
(34, 'D2140', '2023-06-02', '$371', '$237', 'Lab results reviewed'),
(34, 'D0150', '2026-02-09', '$171', '$17', 'Medication adjusted'),
(35, 'D5110', '2023-08-18', '$1871', '$1128', 'Patient improving'),
(35, 'D0274', '2025-03-17', '$149', '$83', 'Lab results reviewed'),
(36, 'D0274', '2025-10-25', '$293', '$7', 'Patient improving'),
(37, 'D6010', '2023-04-24', '$2593', '$123', 'Patient improving'),
(38, 'D2150', '2023-12-04', '$313', '$90', 'Lab results reviewed'),
(38, 'D5120', '2025-12-23', '$1825', '$1094', 'Routine follow-up'),
(39, 'D3220', '2024-09-19', '$376', '$374', 'Lab results reviewed'),
(40, 'D2330', '2023-01-09', '$339', '$250', 'Patient improving'),
(40, 'D0150', '2026-07-24', '$381', '$92', 'No complications'),
(41, 'D3220', '2023-10-28', '$464', '$449', 'Lab results reviewed'),
(41, 'D4910', '2023-12-05', '$402', '$88', 'Lab results reviewed'),
(42, 'D0220', '2023-10-10', '$192', '$164', 'Lab results reviewed'),
(42, 'D9944', '2024-05-02', '$546', '$277', 'Routine follow-up'),
(43, 'D0330', '2025-09-04', '$225', '$23', 'Patient improving'),
(44, 'D9310', '2024-06-19', '$226', '$102', 'Medication adjusted'),
(44, 'D2331', '2024-06-23', '$324', '$43', 'Medication adjusted'),
(45, 'D5120', '2023-06-20', '$1800', '$1481', 'No complications'),
(46, 'D1510', '2023-11-01', '$393', '$275', 'Routine follow-up'),
(47, 'D9223', '2025-03-18', '$249', '$238', 'Routine follow-up'),
(48, 'D0274', '2025-04-29', '$257', '$143', 'Lab results reviewed'),
(49, 'D7140', '2024-05-04', '$418', '$390', 'Routine follow-up'),
(49, 'D7220', '2026-04-06', '$468', '$41', 'Medication adjusted'),
(50, 'D1206', '2026-04-16', '$307', '$231', 'Medication adjusted'),
(51, 'D1120', '2025-08-16', '$279', '$136', 'Lab results reviewed'),
(52, 'D7220', '2024-09-24', '$627', '$177', 'Lab results reviewed'),
(53, 'D3330', '2023-07-21', '$1497', '$144', 'Routine follow-up'),
(53, 'D1110', '2026-01-27', '$328', '$117', 'Patient improving'),
(54, 'D7140', '2023-02-05', '$489', '$259', 'No complications'),
(55, 'D1510', '2025-03-12', '$512', '$260', 'Patient improving'),
(56, 'D7220', '2023-11-13', '$475', '$85', 'Medication adjusted'),
(57, 'D0150', '2024-12-30', '$354', '$79', 'No complications'),
(58, 'D2750', '2025-03-13', '$1142', '$610', 'Lab results reviewed'),
(59, 'D1206', '2023-03-09', '$248', '$75', 'Routine follow-up'),
(60, 'D2740', '2025-03-28', '$1204', '$1184', 'Lab results reviewed'),
(61, 'D2330', '2023-12-20', '$397', '$99', 'No complications'),
(62, 'D2950', '2025-12-07', '$421', '$160', 'Medication adjusted'),
(63, 'D0210', '2023-03-01', '$413', '$141', 'Patient improving'),
(63, 'D2750', '2024-04-05', '$1244', '$608', 'Lab results reviewed'),
(64, 'D3310', '2025-04-06', '$1123', '$870', 'Medication adjusted'),
(65, 'D4910', '2024-10-28', '$192', '$104', 'Patient improving'),
(66, 'D4341', '2024-12-23', '$390', '$280', 'Patient improving'),
(67, 'D1510', '2026-04-06', '$355', '$98', 'No complications'),
(68, 'D1510', '2026-08-08', '$545', '$74', 'Lab results reviewed'),
(69, 'D0150', '2023-03-22', '$389', '$279', 'Routine follow-up'),
(70, 'D3310', '2024-12-09', '$1066', '$787', 'Medication adjusted'),
(70, 'D7140', '2025-06-15', '$400', '$189', 'Patient improving'),
(71, 'D9110', '2024-05-12', '$345', '$118', 'Lab results reviewed'),
(71, 'D2750', '2024-06-10', '$1337', '$1217', 'Medication adjusted'),
(72, 'D3330', '2024-07-22', '$1308', '$1291', 'Lab results reviewed'),
(73, 'D9310', '2023-06-08', '$139', '$103', 'Routine follow-up'),
(73, 'D3320', '2023-12-19', '$1349', '$378', 'Lab results reviewed'),
(74, 'D0274', '2023-11-08', '$355', '$237', 'Routine follow-up'),
(75, 'D0220', '2025-03-27', '$264', '$146', 'Routine follow-up'),
(76, 'D2331', '2025-03-07', '$367', '$349', 'No complications'),
(76, 'D7220', '2025-06-05', '$608', '$30', 'Lab results reviewed'),
(77, 'D0120', '2023-11-01', '$230', '$157', 'Lab results reviewed'),
(78, 'D5110', '2023-03-17', '$1809', '$250', 'Patient improving'),
(78, 'D1206', '2026-04-11', '$160', '$10', 'No complications'),
(79, 'D2331', '2026-07-30', '$350', '$27', 'Patient improving'),
(80, 'D0120', '2023-02-17', '$203', '$199', 'No complications'),
(81, 'D2750', '2025-06-27', '$1113', '$308', 'Lab results reviewed'),
(82, 'D9310', '2024-03-05', '$344', '$263', 'Routine follow-up'),
(83, 'D9944', '2023-09-29', '$702', '$27', 'Medication adjusted'),
(84, 'D7140', '2023-12-22', '$328', '$19', 'Patient improving'),
(85, 'D3310', '2024-03-30', '$990', '$819', 'Lab results reviewed'),
(86, 'D0210', '2023-03-25', '$199', '$10', 'Patient improving'),
(86, 'D2950', '2025-05-23', '$516', '$488', 'No complications'),
(87, 'D9310', '2023-02-05', '$213', '$30', 'No complications'),
(88, 'D9110', '2023-04-25', '$353', '$247', 'Medication adjusted'),
(89, 'D2950', '2024-03-01', '$431', '$348', 'Medication adjusted'),
(90, 'D1120', '2024-05-07', '$323', '$307', 'Routine follow-up'),
(90, 'D2150', '2024-12-18', '$398', '$356', 'No complications'),
(91, 'D9110', '2026-01-06', '$326', '$214', 'Lab results reviewed'),
(92, 'D9944', '2026-04-22', '$712', '$672', 'No complications'),
(93, 'D2140', '2025-03-14', '$269', '$267', 'No complications'),
(94, 'D2140', '2025-09-05', '$422', '$257', 'Lab results reviewed'),
(95, 'D0274', '2023-12-01', '$352', '$195', 'No complications'),
(96, 'D7140', '2024-04-12', '$402', '$139', 'Routine follow-up'),
(97, 'D7220', '2023-09-23', '$616', '$261', 'Routine follow-up'),
(98, 'D5120', '2025-03-02', '$1772', '$1460', 'Medication adjusted'),
(99, 'D0220', '2024-05-11', '$187', '$91', 'Patient improving'),
(100, 'D6010', '2025-12-28', '$2524', '$2343', 'Patient improving'),
(100, 'D4910', '2026-06-22', '$255', '$110', 'Patient improving'),
(101, 'D0210', '2025-09-23', '$223', '$101', 'Routine follow-up'),
(102, 'D6010', '2024-02-29', '$2543', '$41', 'Patient improving'),
(103, 'D3330', '2023-03-20', '$1321', '$874', 'Medication adjusted'),
(103, 'D2750', '2025-12-08', '$1259', '$560', 'No complications'),
(104, 'D3320', '2024-02-26', '$1236', '$782', 'Patient improving'),
(105, 'D2950', '2024-07-19', '$361', '$274', 'Medication adjusted'),
(106, 'D2140', '2025-09-12', '$416', '$242', 'Routine follow-up'),
(107, 'D0220', '2024-02-28', '$255', '$111', 'Medication adjusted'),
(107, 'D9944', '2026-05-22', '$527', '$325', 'Routine follow-up'),
(108, 'D3320', '2025-03-13', '$1233', '$389', 'No complications'),
(109, 'D6010', '2023-10-09', '$2614', '$1639', 'No complications'),
(110, 'D2331', '2026-01-28', '$270', '$81', 'Lab results reviewed'),
(111, 'D5120', '2023-06-17', '$1929', '$358', 'No complications'),
(112, 'D2140', '2026-02-20', '$297', '$159', 'Medication adjusted'),
(113, 'D4910', '2024-10-18', '$285', '$149', 'Routine follow-up'),
(114, 'D2750', '2025-06-17', '$1161', '$506', 'Routine follow-up'),
(115, 'D3220', '2024-07-15', '$384', '$200', 'Medication adjusted'),
(116, 'D4341', '2024-11-21', '$471', '$290', 'Medication adjusted'),
(117, 'D0330', '2023-07-08', '$196', '$130', 'Patient improving'),
(117, 'D9944', '2023-11-24', '$579', '$237', 'Lab results reviewed'),
(118, 'D2140', '2025-12-17', '$431', '$261', 'Medication adjusted'),
(119, 'D0274', '2024-04-25', '$342', '$30', 'Patient improving'),
(120, 'D3320', '2023-08-09', '$1183', '$642', 'Patient improving');

-- --------------------------------------------------------

--
-- Table structure for table `patientlist_1`
--

CREATE TABLE `patientlist_1` (
  `Name` varchar(19) DEFAULT NULL,
  `Age` varchar(12) DEFAULT NULL,
  `Email` varchar(29) DEFAULT NULL,
  `D.O.B` varchar(18) DEFAULT NULL,
  `Phone` varchar(14) DEFAULT NULL,
  `Insurance` varchar(12) DEFAULT NULL,
  `Address` varchar(38) DEFAULT NULL,
  `Patient_ID` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientlist_1`
--

INSERT INTO `patientlist_1` (`Name`, `Age`, `Email`, `D.O.B`, `Phone`, `Insurance`, `Address`, `Patient_ID`) VALUES
('Elizabeth Thomas', '44 years old', 'ethomas@gmail.com', 'April 12, 1982', '(918) 555-1770', 'Guardian', '1077 Harvest Ct. Tulsa, OK', 1),
('Sophia Johnson', '55 years old', 'sjohnson@hotmail.com', 'October 10, 1970', '(619) 564-1746', 'Guardian', '934 Maple St. San Diego, CA', 2),
('Elizabeth Garcia', '34 years old', 'egarcia@gmail.com', 'March 20, 1992', '(415) 249-5316', 'Delta Dental', '1262 Memorial Blvd. San Francisco, CA', 3),
('Joseph Wilson', '45 years old', 'josephwilson@icloud.com', 'December 21, 1980', '(615) 111-8097', 'Humana', '1727 Union Ave. Nashville, TN', 4),
('Michael Hernandez', '30 years old', 'mhernandez@icloud.com', 'May 12, 1996', '(313) 694-8485', 'Delta Dental', '1965 Stone Ct. Detroit, MI', 5),
('William Lee', '20 years old', 'wlee@gmail.com', 'April 22, 2006', '(615) 890-0947', 'Delta Dental', '1281 Gateway Blvd. Nashville, TN', 6),
('Robert Jackson', '27 years old', 'rjackson@icloud.com', 'May 5, 1999', '(615) 621-3380', 'Cigna', '1816 Sunset Dr. Nashville, TN', 7),
('Sarah Miller', '34 years old', 'sarahmiller@hotmail.com', 'November 27, 1991', '(213) 383-5778', 'Cigna', '943 Independence Blvd. Los Angeles, CA', 8),
('Ella Lewis', '59 years old', 'ellalewis@icloud.com', 'July 27, 1967', '(808) 732-3475', 'Cigna', '1452 Lake St. Honolulu, HI', 9),
('Patricia Harris', '55 years old', 'pharris@hotmail.com', 'June 20, 1971', '(904) 255-0930', 'Guardian', '1068 Acorn Ct. Jacksonville, FL', 10),
('Sarah Harris', '23 years old', 'sarahh@hotmail.com', 'January 20, 2003', '(702) 181-6517', 'Ameritas', '71 Pebble Ct. Las Vegas, NV', 11),
('Oliver Johnson', '46 years old', 'oliverj@outlook.com', 'February 5, 1980', '(904) 494-4039', 'Delta Dental', '1798 Prospect Ave. Jacksonville, FL', 12),
('Evelyn Lee', '50 years old', 'evelynl@gmail.com', 'March 24, 1976', '(202) 848-6819', 'Ameritas', '1268 Whispering Ct. Washington, DC', 13),
('Harper Gonzalez', '28 years old', 'hgonzalez@hotmail.com', 'February 28, 1998', '(804) 553-9625', 'Ameritas', '926 Commerce Blvd. Richmond, VA', 14),
('Sarah Taylor', '48 years old', 'sarahtaylor@yahoo.com', 'July 8, 1978', '(702) 942-9431', 'Ameritas', '745 Laurel Cir. Las Vegas, NV', 15),
('Patricia Thompson', '50 years old', 'patriciathompson@yahoo.com', 'September 3, 1975', '(213) 788-3192', 'Cigna', '1684 Jackson St. Los Angeles, CA', 16),
('Isabella Taylor', '34 years old', 'isabellataylor@icloud.com', 'July 31, 1992', '(918) 387-4149', 'Guardian', '1489 Central Ave. Tulsa, OK', 17),
('Karen Williams', '58 years old', 'karenw@hotmail.com', 'July 27, 1968', '(808) 417-6119', 'Guardian', '949 Walnut St. Honolulu, HI', 18),
('Logan Gonzalez', '53 years old', 'lgonzalez@hotmail.com', 'July 1, 1973', '(303) 985-3282', 'Ameritas', '408 Victoria Ave. Denver, CO', 19),
('James Rodriguez', '18 years old', 'jamesr@gmail.com', 'July 5, 2008', '(415) 077-7818', 'Guardian', '1296 Fox Ct. San Francisco, CA', 20),
('Barbara Thomas', '31 years old', 'bthomas@icloud.com', 'June 8, 1995', '(602) 416-4811', 'Guardian', '1126 Hawthorn Ct. Phoenix, AZ', 21),
('Scarlett Lee', '24 years old', 'scarlettl@icloud.com', 'September 29, 2001', '(212) 118-0789', 'Guardian', '416 Kingfisher Ct. New York, NY', 22),
('Charles Perez', '21 years old', 'charlesp@outlook.com', 'November 29, 2004', '(402) 626-4370', 'Cigna', '56 Independence Blvd. Omaha, NE', 23),
('Layla Miller', '32 years old', 'laylamiller@hotmail.com', 'August 1, 1994', '(213) 138-1841', 'Guardian', '256 Dogwood Cir. Los Angeles, CA', 24),
('Benjamin Lewis', '29 years old', 'benjaminlewis@outlook.com', 'February 8, 1997', '(210) 828-6472', 'Cigna', '927 Sycamore Cir. San Antonio, TX', 25),
('Lina Martinez', '53 years old', 'lmartinez@outlook.com', 'January 14, 1973', '(206) 937-2431', 'Delta Dental', '761 Pebble Ct. Seattle, WA', 26),
('Benjamin Clark', '35 years old', 'benjaminc@outlook.com', 'July 17, 1991', '(202) 925-8324', 'Ameritas', '1984 Heritage Blvd. Washington, DC', 27),
('Penelope Thompson', '28 years old', 'penelopethompson@gmail.com', 'December 29, 1997', '(704) 129-2211', 'Guardian', '1839 Maple St. Charlotte, NC', 28),
('Lina Ramirez', '30 years old', 'lramirez@hotmail.com', 'August 2, 1996', '(804) 810-6947', 'Cigna', '1181 Magnolia Dr. Richmond, VA', 29),
('Alexander Taylor', '49 years old', 'alexandert@outlook.com', 'August 19, 1976', '(414) 335-4025', 'Ameritas', '1534 Lakeside Blvd. Milwaukee, WI', 30),
('Lina White', '58 years old', 'lwhite@icloud.com', 'September 19, 1967', '(313) 640-5309', 'Guardian', '751 Veterans Blvd. Detroit, MI', 31),
('Linda Moore', '45 years old', 'lindamoore@hotmail.com', 'October 15, 1980', '(702) 939-4903', 'Guardian', '1504 Elm St. Las Vegas, NV', 32),
('Charlotte Anderson', '50 years old', 'charlotteanderson@outlook.com', 'January 31, 1976', '(215) 611-9801', 'Guardian', '969 Kingfisher Ct. Philadelphia, PA', 33),
('Elizabeth Johnson', '27 years old', 'elizabethjohnson@icloud.com', 'August 19, 1998', '(617) 836-9940', 'Delta Dental', '1700 Liberty Ave. Boston, MA', 34),
('Olivia Thomas', '43 years old', 'othomas@hotmail.com', 'March 28, 1983', '(615) 743-2280', 'Guardian', '1671 Elm St. Nashville, TN', 35),
('Harper Gonzalez', '46 years old', 'hgonzalez@gmail.com', 'December 12, 1979', '(804) 163-1850', 'Guardian', '368 Union Ave. Richmond, VA', 36),
('James Jackson', '51 years old', 'jamesj@gmail.com', 'June 18, 1975', '(313) 215-2875', 'Cigna', '550 Walnut St. Detroit, MI', 37),
('Elijah Perez', '57 years old', 'eperez@outlook.com', 'March 11, 1969', '(210) 884-4222', 'Delta Dental', '1583 Gateway Blvd. San Antonio, TX', 38),
('James Lewis', '43 years old', 'jameslewis@gmail.com', 'August 15, 1982', '(804) 323-1696', 'Cigna', '758 Orchard Cir. Richmond, VA', 39),
('Susan Jones', '39 years old', 'susanjones@icloud.com', 'February 1, 1987', '(619) 891-1380', 'Humana', '1627 Park St. San Diego, CA', 40),
('Jessica Thompson', '41 years old', 'jthompson@icloud.com', 'February 13, 1985', '(702) 007-2348', 'Ameritas', '220 Evergreen Cir. Las Vegas, NV', 41),
('Liam Ramirez', '30 years old', 'liamramirez@outlook.com', 'May 17, 1996', '(704) 165-9268', 'Guardian', '1586 Ridge Dr. Charlotte, NC', 42),
('James Ramirez', '26 years old', 'jramirez@gmail.com', 'July 18, 2000', '(317) 541-8269', 'Guardian', '264 Whispering Ct. Indianapolis, IN', 43),
('Mason Moore', '29 years old', 'mmoore@outlook.com', 'December 4, 1996', '(808) 117-7214', 'Humana', '1688 Main St. Honolulu, HI', 44),
('Richard Williams', '52 years old', 'richardw@hotmail.com', 'May 22, 1974', '(202) 032-5090', 'Ameritas', '805 Sunset Dr. Washington, DC', 45),
('Noah Lopez', '46 years old', 'noahlopez@icloud.com', 'April 14, 1980', '(918) 976-6816', 'Guardian', '1101 Park Ave. Tulsa, OK', 46),
('James Hernandez', '38 years old', 'jamesh@yahoo.com', 'September 21, 1987', '(817) 342-4317', 'Ameritas', '1660 Washington St. Fort Worth, TX', 47),
('Isabella Johnson', '19 years old', 'isabellajohnson@outlook.com', 'January 26, 2007', '(313) 249-6556', 'Guardian', '1265 Park St. Detroit, MI', 48),
('Henry Clark', '34 years old', 'henryc@yahoo.com', 'July 11, 1992', '(614) 887-3814', 'Delta Dental', '642 Lake St. Columbus, OH', 49),
('Chloe Garcia', '51 years old', 'cgarcia@outlook.com', 'May 8, 1975', '(602) 353-0663', 'Ameritas', '1949 River St. Phoenix, AZ', 50),
('Oliver Rodriguez', '44 years old', 'orodriguez@yahoo.com', 'November 8, 1981', '(713) 563-0951', 'Delta Dental', '1141 Presidential Blvd. Houston, TX', 51),
('David Hernandez', '29 years old', 'davidhernandez@outlook.com', 'September 22, 1996', '(415) 610-2627', 'Guardian', '389 Fox Ct. San Francisco, CA', 52),
('Jessica Martin', '39 years old', 'jmartin@outlook.com', 'March 22, 1987', '(210) 852-9369', 'Humana', '353 Jackson St. San Antonio, TX', 53),
('James Miller', '35 years old', 'jamesm@yahoo.com', 'February 11, 1991', '(615) 053-2058', 'Ameritas', '1309 Heritage Blvd. Nashville, TN', 54),
('Sarah Clark', '37 years old', 'sarahclark@hotmail.com', 'September 18, 1988', '(702) 181-5604', 'Cigna', '250 Magnolia Dr. Las Vegas, NV', 55),
('Elijah Martinez', '26 years old', 'elijahm@outlook.com', 'January 5, 2000', '(312) 205-9622', 'Ameritas', '442 Willow Dr. Chicago, IL', 56),
('Amelia Hernandez', '48 years old', 'ameliah@outlook.com', 'October 9, 1977', '(512) 639-0389', 'Guardian', '230 Juniper Cir. Austin, TX', 57),
('Amelia Wilson', '23 years old', 'ameliaw@yahoo.com', 'September 16, 2002', '(615) 501-8903', 'Delta Dental', '837 Acorn Ct. Nashville, TN', 58),
('Harper Johnson', '43 years old', 'harperj@hotmail.com', 'February 2, 1983', '(713) 700-7701', 'Delta Dental', '581 Evergreen Cir. Houston, TX', 59),
('Elizabeth Martinez', '21 years old', 'emartinez@outlook.com', 'June 26, 2005', '(303) 700-9562', 'Guardian', '701 Creek Dr. Denver, CO', 60),
('David Williams', '35 years old', 'davidwilliams@icloud.com', 'October 19, 1990', '(602) 416-5347', 'Humana', '32 Birch Cir. Phoenix, AZ', 61),
('William Martin', '36 years old', 'williamm@gmail.com', 'August 7, 1990', '(312) 406-5300', 'Delta Dental', '1158 Hawthorn Ct. Chicago, IL', 62),
('Thomas Taylor', '18 years old', 'thomast@hotmail.com', 'August 16, 2007', '(808) 751-9740', 'Humana', '1788 Franklin St. Honolulu, HI', 63),
('Karen White', '42 years old', 'karenwhite@icloud.com', 'August 19, 1983', '(817) 839-1741', 'Delta Dental', '136 Oak St. Fort Worth, TX', 64),
('Harper Jones', '36 years old', 'hjones@gmail.com', 'May 19, 1990', '(619) 865-3441', 'Cigna', '1997 Whispering Ct. San Diego, CA', 65),
('Sarah Thomas', '53 years old', 'sarahthomas@gmail.com', 'January 19, 1973', '(619) 605-7300', 'Guardian', '1255 Orchard Cir. San Diego, CA', 66),
('Thomas Wilson', '59 years old', 'thomasw@yahoo.com', 'May 14, 1967', '(808) 070-0847', 'Guardian', '1664 Lakeside Blvd. Honolulu, HI', 67),
('Jennifer Lopez', '29 years old', 'jlopez@outlook.com', 'September 1, 1996', '(303) 334-1162', 'Ameritas', '1691 College Ave. Denver, CO', 68),
('Avery Gonzalez', '37 years old', 'agonzalez@yahoo.com', 'January 5, 1989', '(614) 539-8106', 'Delta Dental', '74 Whispering Ct. Columbus, OH', 69),
('Chloe Clark', '45 years old', 'chloec@gmail.com', 'December 17, 1980', '(702) 611-3244', 'Guardian', '645 Market St. Las Vegas, NV', 70),
('Ella Anderson', '25 years old', 'ellaa@outlook.com', 'August 10, 2001', '(619) 387-3358', 'Humana', '779 Stone Ct. San Diego, CA', 71),
('Lucas Rodriguez', '39 years old', 'lucasr@gmail.com', 'April 14, 1987', '(619) 995-3604', 'Humana', '1167 Stone Ct. San Diego, CA', 72),
('Ryan Jackson', '45 years old', 'rjackson@gmail.com', 'April 11, 1981', '(617) 666-9100', 'Humana', '1604 Victoria Ave. Boston, MA', 73),
('Thomas Sanchez', '41 years old', 'tsanchez@gmail.com', 'August 29, 1984', '(619) 804-1536', 'Ameritas', '943 Willow Dr. San Diego, CA', 74),
('Benjamin Martin', '52 years old', 'benjaminm@hotmail.com', 'April 30, 1974', '(804) 745-1935', 'Ameritas', '1717 Hidden Ct. Richmond, VA', 75),
('Richard Martinez', '55 years old', 'richardm@outlook.com', 'March 19, 1971', '(804) 703-6680', 'Humana', '160 Gateway Blvd. Richmond, VA', 76),
('Joseph Garcia', '27 years old', 'jgarcia@outlook.com', 'September 2, 1998', '(512) 376-8063', 'Ameritas', '1260 Prospect Ave. Austin, TX', 77),
('Olivia Jones', '37 years old', 'oliviajones@gmail.com', 'February 8, 1989', '(817) 863-6278', 'Ameritas', '1009 Birch Cir. Fort Worth, TX', 78),
('Thomas Miller', '18 years old', 'thomasmiller@outlook.com', 'January 17, 2008', '(414) 225-9318', 'Delta Dental', '610 Sycamore Cir. Milwaukee, WI', 79),
('Sarah Rodriguez', '50 years old', 'sarahrodriguez@yahoo.com', 'September 21, 1975', '(415) 984-5995', 'Humana', '570 Fox Ct. San Francisco, CA', 80),
('Oliver Rodriguez', '33 years old', 'oliverrodriguez@icloud.com', 'October 27, 1992', '(402) 426-2776', 'Ameritas', '1742 Holly Cir. Omaha, NE', 81),
('Lucas Jones', '19 years old', 'lucasjones@yahoo.com', 'August 14, 2006', '(704) 559-7774', 'Humana', '975 Oak St. Charlotte, NC', 82),
('Barbara Gonzalez', '23 years old', 'barbarag@hotmail.com', 'October 27, 2002', '(212) 431-5385', 'Guardian', '614 Prospect Ave. New York, NY', 83),
('Elijah Thomas', '49 years old', 'elijaht@gmail.com', 'December 3, 1976', '(317) 356-3424', 'Delta Dental', '687 Magnolia Dr. Indianapolis, IN', 84),
('Ethan Harris', '54 years old', 'eharris@icloud.com', 'October 15, 1971', '(215) 545-5140', 'Delta Dental', '1025 Oak St. Philadelphia, PA', 85),
('Robert Davis', '48 years old', 'robertdavis@yahoo.com', 'September 3, 1977', '(804) 598-0378', 'Cigna', '1769 Whispering Ct. Richmond, VA', 86),
('Richard Miller', '45 years old', 'richardm@outlook.com', 'April 7, 1981', '(303) 984-1371', 'Delta Dental', '1233 Ridge Dr. Denver, CO', 87),
('Noah Martin', '36 years old', 'noahmartin@yahoo.com', 'May 25, 1990', '(504) 601-6113', 'Delta Dental', '962 Presidential Blvd. New Orleans, LA', 88),
('James Garcia', '25 years old', 'jamesgarcia@hotmail.com', 'May 27, 2001', '(213) 749-2202', 'Guardian', '1240 Veterans Blvd. Los Angeles, CA', 89),
('Jennifer Rodriguez', '26 years old', 'jrodriguez@yahoo.com', 'December 2, 1999', '(210) 778-7943', 'Humana', '272 Park St. San Antonio, TX', 90),
('Logan Hernandez', '28 years old', 'loganhernandez@yahoo.com', 'December 30, 1997', '(408) 326-6890', 'Ameritas', '392 Memorial Blvd. San Jose, CA', 91),
('Charlotte Hernandez', '59 years old', 'charlotteh@gmail.com', 'May 19, 1967', '(214) 396-9921', 'Delta Dental', '1451 Fox Ct. Dallas, TX', 92),
('Harper Garcia', '18 years old', 'hgarcia@outlook.com', 'February 23, 2008', '(614) 521-4935', 'Guardian', '1336 Ash Cir. Columbus, OH', 93),
('Henry Harris', '37 years old', 'hharris@yahoo.com', 'October 9, 1988', '(904) 154-3966', 'Humana', '1912 Jackson St. Jacksonville, FL', 94),
('Thomas Thomas', '26 years old', 'tthomas@yahoo.com', 'August 27, 1999', '(808) 320-0285', 'Ameritas', '30 Orchard Cir. Honolulu, HI', 95),
('Sarah Robinson', '57 years old', 'sarahr@icloud.com', 'May 18, 1969', '(313) 717-8041', 'Ameritas', '1305 Oak St. Detroit, MI', 96),
('Ethan Williams', '21 years old', 'ethanw@gmail.com', 'May 19, 2005', '(317) 379-4146', 'Delta Dental', '1185 Fox Ct. Indianapolis, IN', 97),
('Isabella Brown', '47 years old', 'isabellabrown@icloud.com', 'July 2, 1979', '(402) 712-1804', 'Cigna', '1329 Memorial Blvd. Omaha, NE', 98),
('John Ramirez', '33 years old', 'jramirez@gmail.com', 'October 9, 1992', '(804) 076-9018', 'Humana', '1258 Chestnut St. Richmond, VA', 99),
('James Harris', '41 years old', 'jamesh@gmail.com', 'December 31, 1984', '(212) 069-1902', 'Ameritas', '1884 Evergreen Cir. New York, NY', 100),
('Michael Robinson', '26 years old', 'michaelr@outlook.com', 'October 30, 1999', '(615) 047-2626', 'Guardian', '272 Franklin St. Nashville, TN', 101),
('Jessica Clark', '38 years old', 'jessicac@yahoo.com', 'July 24, 1988', '(215) 290-4930', 'Ameritas', '1093 Evergreen Cir. Philadelphia, PA', 102),
('Isabella Lewis', '55 years old', 'isabellalewis@yahoo.com', 'March 13, 1971', '(804) 632-9063', 'Humana', '521 Gateway Blvd. Richmond, VA', 103),
('Harper Smith', '51 years old', 'harpers@outlook.com', 'May 21, 1975', '(313) 057-1962', 'Guardian', '4 Sycamore Cir. Detroit, MI', 104),
('William Harris', '41 years old', 'williamh@gmail.com', 'November 26, 1984', '(704) 708-9105', 'Guardian', '703 Willow Dr. Charlotte, NC', 105),
('Penelope Garcia', '43 years old', 'penelopegarcia@gmail.com', 'June 8, 1983', '(904) 974-0571', 'Humana', '231 Maple St. Jacksonville, FL', 106),
('Ava Rodriguez', '46 years old', 'avarodriguez@hotmail.com', 'January 29, 1980', '(619) 476-5933', 'Ameritas', '1232 Oak St. San Diego, CA', 107),
('Mary Jackson', '34 years old', 'maryjackson@hotmail.com', 'January 26, 1992', '(202) 018-9583', 'Cigna', '1276 Holly Cir. Washington, DC', 108),
('James Clark', '49 years old', 'jamesc@outlook.com', 'July 23, 1977', '(602) 688-4572', 'Delta Dental', '813 Willow Dr. Phoenix, AZ', 109),
('Olivia Smith', '56 years old', 'osmith@yahoo.com', 'December 5, 1969', '(312) 646-3410', 'Cigna', '1010 Forest Dr. Chicago, IL', 110),
('Jack Brown', '22 years old', 'jackbrown@hotmail.com', 'April 26, 2004', '(206) 971-9823', 'Delta Dental', '600 Hill St. Seattle, WA', 111),
('Jennifer Smith', '48 years old', 'jsmith@yahoo.com', 'June 19, 1978', '(402) 562-1595', 'Cigna', '1769 Park St. Omaha, NE', 112),
('Charles Taylor', '34 years old', 'charlest@outlook.com', 'May 31, 1992', '(615) 814-3111', 'Humana', '1075 Acorn Ct. Nashville, TN', 113),
('Amelia Lewis', '34 years old', 'alewis@icloud.com', 'October 30, 1991', '(817) 612-2855', 'Guardian', '668 Cypress Ct. Fort Worth, TX', 114),
('Jack Taylor', '42 years old', 'jackt@gmail.com', 'November 20, 1983', '(614) 811-7423', 'Humana', '266 Kingfisher Ct. Columbus, OH', 115),
('Lucas White', '49 years old', 'lwhite@gmail.com', 'April 24, 1977', '(214) 508-2224', 'Humana', '532 River St. Dallas, TX', 116),
('Olivia Smith', '18 years old', 'olivias@icloud.com', 'August 11, 2007', '(713) 641-6145', 'Cigna', '1232 Oak St. Houston, TX', 117),
('Ava Lee', '58 years old', 'avalee@yahoo.com', 'November 1, 1967', '(317) 064-1710', 'Cigna', '1078 Laurel Cir. Indianapolis, IN', 118),
('Michael Moore', '39 years old', 'mmoore@gmail.com', 'February 21, 1987', '(312) 701-0380', 'Humana', '1277 Washington St. Chicago, IL', 119),
('Amelia Ramirez', '43 years old', 'ameliar@hotmail.com', 'November 6, 1982', '(212) 963-2632', 'Delta Dental', '116 Pebble Ct. New York, NY', 120);

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE `procedures` (
  `ProcedureCode` varchar(5) DEFAULT NULL,
  `ProcedureName` varchar(49) DEFAULT NULL,
  `Category` varchar(14) DEFAULT NULL,
  `Cost` decimal(6,2) DEFAULT NULL,
  `PerformingDoctors` varchar(47) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`ProcedureCode`, `ProcedureName`, `Category`, `Cost`, `PerformingDoctors`) VALUES
('D0120', 'Periodic Oral Evaluation', 'Diagnostic', 55.00, 'Dr. Alvarez, Dr. Chen, Dr. Whitfield, Dr. Patel'),
('D0150', 'Comprehensive Oral Evaluation (New Patient)', 'Diagnostic', 95.00, 'Dr. Alvarez, Dr. Chen, Dr. Whitfield, Dr. Patel'),
('D0210', 'Full Mouth X-Rays', 'Diagnostic', 130.00, 'Dr. Chen, Dr. Patel'),
('D0220', 'Single X-Ray Image', 'Diagnostic', 35.00, 'Dr. Chen, Dr. Patel'),
('D0274', 'Bitewing X-Rays (4 films)', 'Diagnostic', 65.00, 'Dr. Chen, Dr. Patel'),
('D0330', 'Panoramic X-Ray', 'Diagnostic', 140.00, 'Dr. Chen, Dr. Patel'),
('D1110', 'Adult Prophylaxis (Cleaning)', 'Preventive', 110.00, 'Dr. Alvarez, Dr. Whitfield'),
('D1120', 'Child Prophylaxis (Cleaning)', 'Preventive', 85.00, 'Dr. Alvarez, Dr. Whitfield'),
('D1206', 'Fluoride Varnish Application', 'Preventive', 45.00, 'Dr. Alvarez, Dr. Whitfield'),
('D1351', 'Sealant (per tooth)', 'Preventive', 60.00, 'Dr. Alvarez, Dr. Whitfield'),
('D1510', 'Space Maintainer, Fixed', 'Preventive', 275.00, 'Dr. Alvarez'),
('D2140', 'Amalgam Filling, One Surface', 'Restorative', 150.00, 'Dr. Chen, Dr. Whitfield'),
('D2150', 'Amalgam Filling, Two Surfaces', 'Restorative', 195.00, 'Dr. Chen, Dr. Whitfield'),
('D2330', 'Composite (Tooth-Colored) Filling, One Surface', 'Restorative', 175.00, 'Dr. Chen, Dr. Whitfield'),
('D2331', 'Composite Filling, Two Surfaces', 'Restorative', 220.00, 'Dr. Chen, Dr. Whitfield'),
('D2740', 'Porcelain Crown', 'Restorative', 1150.00, 'Dr. Chen, Dr. Patel'),
('D2750', 'Porcelain Fused to Metal Crown', 'Restorative', 1050.00, 'Dr. Chen, Dr. Patel'),
('D2950', 'Core Buildup (under crown)', 'Restorative', 260.00, 'Dr. Chen, Dr. Patel'),
('D3220', 'Pulpotomy', 'Endodontic', 210.00, 'Dr. Patel'),
('D3310', 'Root Canal, Anterior Tooth', 'Endodontic', 900.00, 'Dr. Patel'),
('D3320', 'Root Canal, Premolar', 'Endodontic', 1050.00, 'Dr. Patel'),
('D3330', 'Root Canal, Molar', 'Endodontic', 1250.00, 'Dr. Patel'),
('D4341', 'Periodontal Scaling & Root Planing (per quadrant)', 'Periodontics', 240.00, 'Dr. Whitfield'),
('D4910', 'Periodontal Maintenance', 'Periodontics', 130.00, 'Dr. Whitfield'),
('D5110', 'Complete Upper Denture', 'Prosthodontics', 1650.00, 'Dr. Alvarez, Dr. Patel'),
('D5120', 'Complete Lower Denture', 'Prosthodontics', 1650.00, 'Dr. Alvarez, Dr. Patel'),
('D6010', 'Dental Implant Placement', 'Prosthodontics', 2400.00, 'Dr. Patel'),
('D7140', 'Simple Tooth Extraction', 'Oral Surgery', 190.00, 'Dr. Patel, Dr. Chen'),
('D7210', 'Surgical Tooth Extraction', 'Oral Surgery', 320.00, 'Dr. Patel'),
('D7220', 'Impacted Wisdom Tooth Extraction, Soft Tissue', 'Oral Surgery', 385.00, 'Dr. Patel'),
('D9110', 'Palliative (Emergency) Treatment', 'Adjunctive', 100.00, 'Dr. Alvarez, Dr. Chen, Dr. Whitfield, Dr. Patel'),
('D9223', 'Deep Sedation/IV Sedation (per 15 min)', 'Adjunctive', 150.00, 'Dr. Patel'),
('D9310', 'Consultation with Specialist', 'Adjunctive', 75.00, 'Dr. Patel'),
('D9944', 'Occlusal (Night) Guard', 'Adjunctive', 450.00, 'Dr. Whitfield');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
