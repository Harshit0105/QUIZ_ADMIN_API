-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2021 at 12:06 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE `mcq` (
  `mcq_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `option_1` varchar(1000) NOT NULL,
  `option_2` varchar(1000) NOT NULL,
  `option_3` varchar(1000) NOT NULL,
  `option_4` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `hint` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`mcq_id`, `unit_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `hint`) VALUES
(27, 17, 'The most widely accepted model regarding cell membrane was given br ', 'Robert Hook', 'Schwann', 'Singer and Nicholsan', 'Virchow', 'Singer and Nicholsan', 'Propose fluid mosaic model'),
(28, 19, 'According to modern concept cell membrane is ', 'fluid', 'solid', 'quasifluid', 'all', 'quasifluid', 'fluid mosaic model'),
(29, 19, 'Which of the following is an energy dependent process ?', 'facilitated diffusion', 'active transport', 'endosmosis', 'exosmosis', 'active transport', 'Active transport requires ATP'),
(30, 19, 'The latest model of cell membrane is ', 'unit membrane model', 'fluid mosaic model', 'Danieli and Davson\'s model', 'Robertson\'s model', 'fluid mosaic model', 'Given by singer and nicholson'),
(31, 19, 'The most abundant lipid in the cell membrane is ', 'cutin', 'glycolipid', 'steroid', 'phosphoglycerides', 'phosphoglycerides', 'It is phospholipid'),
(32, 19, 'The best material for the study of structure of cell membrane is ', 'RBC of human', 'lungs cell', 'liver cell', 'kidney cell', 'RBC of human', 'RBC'),
(33, 21, 'Q.1. Which one is a pentose sugar :           ', 'Glyceraldehyde', 'Ribose', 'Fructose     ', 'Glucose', 'Ribose', 'Ribose is a five carbon sugar so it is a pentose sugar.'),
(34, 21, 'Q.2. Two monosaccharide are held together by means of :', ' H – bond', 'Glycosidic bond    ', 'Peptide bond', 'Ester bond.', 'Glycosidic bond    ', 'Glycosidic bond i.e. C-O-C connects the two monosaccharides.'),
(35, 21, 'Q.3. The formula of glycosidic bond is : ', ' C- O- N', 'C – O – C', 'N  -O – C', 'N-O-N ', 'C – O – C', 'C-O-C is the glycosidic bond which connects two monosaccharides');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` varchar(50) NOT NULL,
  `standard_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `total_mcq` varchar(50) NOT NULL,
  `correct_mcq` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `user_id`, `group_id`, `standard_id`, `subject_id`, `unit_id`, `total_mcq`, `correct_mcq`) VALUES
(1, 2, '656354', 9, 4, 9, '4', '0'),
(2, 2, '107579', 7, 2, 5, '2', '0'),
(3, 3, '737507', 9, 5, 10, '3', '2'),
(4, 3, '195742', 10, 7, 11, '3', '1'),
(5, 10, '384281', 13, 12, 17, '1', '0'),
(6, 10, '384281', 13, 12, 17, '1', '0'),
(7, 11, '692587', 13, 12, 19, '5', '4');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `roomID` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `standard_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `timing` varchar(10) NOT NULL,
  `mcqids` varchar(100) NOT NULL,
  `upcomingdate` varchar(50) NOT NULL,
  `room_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `roomID`, `user_id`, `standard_id`, `subject_id`, `unit_id`, `timing`, `mcqids`, `upcomingdate`, `room_status`) VALUES
(81, '156447', 50, 6, 5, 4, '60', '', '', 'STARTED'),
(82, '929440', 50, 6, 5, 4, '15', '', '', 'STARTED'),
(83, '889014', 46, 6, 5, 4, '15', '', '', 'STARTED'),
(84, '107579', 1, 7, 2, 5, '0078', '[\"8\",\"9\"]', '2021-04-30T14:46', 'STARTED'),
(85, '535735', 1, 8, 3, 7, '75', '[\"11\",\"12\"]', '2021-06-09T13:50', 'STARTED'),
(86, '412834', 1, 9, 4, 9, '30', '[\"13\",\"15\"]', '2021-02-03T18:00', 'STARTED'),
(87, '656354', 2, 9, 4, 9, '15', '', '', 'STARTED'),
(88, '232826', 3, 9, 5, 10, '15', '', '', 'STARTED'),
(89, '737507', 3, 9, 5, 10, '15', '', '', 'STARTED'),
(90, '195742', 3, 10, 7, 11, '30', '', '', 'STARTED'),
(91, '424603', 4, 12, 10, 13, '15', '', '', 'STARTED'),
(92, '999942', 4, 12, 10, 13, '15', '', '', 'STARTED'),
(93, '690201', 4, 12, 11, 15, '15', '', '', 'STARTED'),
(94, '167895', 4, 12, 10, 13, '15', '', '', 'STARTED'),
(95, '563278', 5, 9, 5, 10, '15', '', '', 'STARTED'),
(96, '996371', 5, 9, 5, 10, '15', '', '', 'STARTED'),
(97, '603479', 7, 9, 5, 10, '15', '', '', 'STARTED'),
(98, '637119', 7, 9, 5, 10, '15', '', '', 'STARTED'),
(99, '775535', 7, 9, 5, 10, '15', '', '', 'STARTED'),
(100, '307011', 7, 10, 7, 11, '15', '', '', 'STARTED'),
(101, '709936', 7, 10, 7, 11, '15', '', '', 'STARTED'),
(102, '878595', 8, 12, 11, 15, '30', '', '', 'STARTED'),
(103, '424926', 8, 12, 11, 15, '30', '', '', 'STARTED'),
(104, '415679', 8, 12, 11, 15, '30', '', '', 'STARTED'),
(105, '814574', 8, 12, 11, 15, '15', '', '', 'STARTED'),
(106, '296930', 9, 12, 11, 15, '15', '', '', 'STARTED'),
(107, '384281', 1, 13, 12, 17, '01:08 PM', '[\"27\"]', '2021-05-07T13:08', 'STARTED'),
(108, '950565', 1, 13, 12, 19, '18:55', '[\"28\",\"29\",\"30\",\"31\",\"32\"]', '2021-05-07T18:42', 'STARTED'),
(109, '359359', 1, 13, 12, 19, '19:15', '[\"28\",\"29\",\"30\",\"31\",\"32\"]', '2021-05-07T19:10', 'STARTED'),
(110, '798273', 11, 13, 12, 19, '15', '', '', 'STARTED'),
(111, '692587', 11, 13, 12, 19, '15', '', '', 'STARTED');

-- --------------------------------------------------------

--
-- Table structure for table `roomjoin`
--

CREATE TABLE `roomjoin` (
  `join_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `standard`
--

CREATE TABLE `standard` (
  `standard_id` int(11) NOT NULL,
  `standard` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standard`
--

INSERT INTO `standard` (`standard_id`, `standard`) VALUES
(13, 'NEET '),
(19, '11th BIO'),
(20, '12th BIO');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `standard_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `standard_id`) VALUES
(4, 'bio', 9),
(5, 'che', 9),
(6, 'phy', 9),
(7, 'mth', 10),
(8, 'che', 10),
(9, 'phy', 10),
(10, 'Computer', 12),
(11, 'Phy', 12),
(12, 'BIOLOGY', 13),
(14, 'BIOLOGY', 19),
(15, 'BIOLOGY', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `tut_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `tutorial` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`tut_id`, `unit_id`, `tutorial`) VALUES
(3, 8, 'yes there'),
(2, 5, 'hi there'),
(4, 9, 'bcd'),
(9, 15, 'A protein hormone consisting of 190 amino acids, growth hormone is secreted by somatotrophs, the site of production being anterior pituitary. In its human form, it is also known as human growth hormone. This peptide hormone triggers cell reproduction, growth, cell regeneration in animals and humans and hence, is vital for development.\r\nA protein hormone consisting of 190 amino acids, growth hormone is secreted by somatotrophs, the site of production being anterior pituitary. In its human form, i'),
(5, 10, 'A protein hormone consisting of 190 amino acids, growth hormone is secreted by somatotrophs, the site of production being anterior pituitary. In its human form, it is also known as human growth hormone. This peptide hormone triggers cell reproduction, growth, cell regeneration in animals and humans and hence, is vital for development.'),
(11, 11, 'Cell was first discovered by Robert Hooke'),
(12, 17, 'It is absolutely wrong but feminism does not just benefit women. It strives for equality of the sexes, not the superiority of women. Feminism takes the gender roles which have been around for many years and tries to deconstruct them.\r\n\r\nThis allows people to live freely and empower lives without getting tied down by traditional restrictions. In other words, it benefits women as well as men. For instance, while it advocates that women must be free to earn it also advocates that why should men be '),
(13, 20, 'DIFFERENCES BETWEEN PROKARYOTIC AND EUKARYOTIC CELL \r\n\r\nCHARACTERS\r\nPROKARYOTIC CELL\r\nEUKARYOTIC CELL\r\n(1) Nuclear Membrane\r\n\r\n\r\n(2) Cell organelles\r\n\r\n\r\n\r\n(3) Ribosome\r\n\r\n\r\n(4) Resp. Enzyme\r\n\r\n(5) Flagella\r\n\r\n\r\n\r\n(6) Cyclosis\r\n(7) Chromosomes\r\n\r\n\r\n(8) Ploidy level\r\n\r\n(9) Vacuoles \r\n\r\n(10) Example\r\nNuclear membrane absent\r\nTerm Genophore/nucleoid used.\r\n\r\n\r\nMembrane cell organelles are absent (like Mitochondria, plastids E.R., Golgi body, microbody, etc.)\r\n\r\n70 S type\r\n\r\n\r\nPresents in Mesosome or in cell membrane\r\nFlagella are made up of Flagellin protein\r\n\r\n\r\n\r\nCytoplasmic streaming absent\r\nNaked or folded genome made by Mainly circular-ds DNA(G-C rich)\r\n(Histone protein absent)\r\nConsider as haploid\r\n\r\nSap vacuole absent but gas vacuole may present\r\nBacteria, Cyanobacteria(BGA) Mycoplasma(PPLO), Rickettsias, Actinomycetes. \r\nNuclear membrane present\r\nNucleus well organized.\r\n\r\nMembranous cell organelles present(Plastids only in plants).\r\n80 S type and \r\n70 S(Mitochondria and chloroplast)\r\nFound in cytoplasm and Mitochondria\r\nFlagella are eleven stranded, made up of tubulin protein (9+2 arrangement)\r\nAbsent\r\nTrue chromosomes\r\n(Histone associated with DNA)\r\nHaploid, Diploid, Polyploid\r\nPresent as sap vacuoles in plant cells.\r\nAll plants and animals cells, Protista and fungi\r\n\r\n'),
(7, 12, 'The lower limb has 30 bones some of which are tibia, femur, tarsal bones, fibula, metatarsal bones, etc. The femur is the single bone of the thigh while the tibia is the larger, weight-bearing bone situated on the medial side of the leg. The thigh-bone or the femur is the strongest and longest bone of the body accounting for close to 1/4th of the person’s total height. Solve these questions on the leg bone topic for NEET.'),
(14, 18, ' CELL : THE UNIT OF LIFE  \r\nAll organisms are composed of cells. A cell is a membrane bound structural and functional unit of life containing cytoplasm and organelles ( specialized tiny structure within a living cell that performs specific functions).Some organisms are composed of single cell called unicellular organisms ( ex. amoeba in animals and chlamydomonas in green alga/plant), while others are composed of many cells are called multicellular organisms ( ex.  large tree ,human being,etc.)    \r\nUnicellular organism-> i) Capable of independent existence \r\n                                        ii)  Performing essential function of life\r\n                                        iii)  Independent existence.\r\nHence, cell is the structural and functional unit of all living organisms.\r\n                                                                    \r\nFirst cell observed by Robert Hooke in  a cork. ( Actually it was cell walls enclosing spaces left by dead protoplast.\r\nFirst live cell was seen and described by Anton Van Leeuwenhoek.\r\nRobert Brown later discovered the nucleus.\r\n Cell Theory –   Given jointly by Schleiden ( a German botanist ) and Schwann ( a British Zoologist) in 1839.\r\n1)      All living organism are composed of cells + their products\r\n2)    All cells arise from pre existing cells-> It was explained by Rudolf Virchow, he proposed “Omnis cellula-e-cellula” and Not only modified + gave the final shape to cell theory.\r\nRudolf Virchow “Omnis cellula - e – cellula “ is called cell – lineage theory .\r\n         AN OVERVIEW OF CELL :\r\nThe onion cell which is a typical plant cell has a distinct cell wall as its outer boundary and just within it is the cell membrane.\r\nOn the basis of nuclear organization , cells can be classified into three types : a) Prokaryotic ( without true nucleus ) , b) Eukaryotic ( with true nucleus ) and c) Mesokaryotic cell.\r\n       •	Cells that have membrane bound nuclei are called eukaryotic whereas cells that lack a membrane bound nucleus are prokaryotic.\r\n     •	In both prokaryotic and eukaryotic cells, a semi-fluid matrix called cytoplasm occupies the volume of the cell.\r\n     •	The cytoplasm is the main arena (zone) of cellular activities in both the plant and animal cells. Various chemical reactions occurs in it to keep the cell in the ‘living state’.\r\n•	Besides the nucleus, the eukaryotic cells have other membrane bound distinct structures called organelles like the endoplasmic reticulum (ER) ,the golgi complex, lysosomes, mitochondria, microbodies etc. The prokaryotic cells lack such membrane bound organelles.\r\n•	Ribosomes are non-membrane bound organelles found in all cells-both eukaryotic as well as prokaryotic cells. Within the cell, ribosomes are found not only in the cytoplasm but also within the two organelles – chloroplasts (in plants) and mitochondria ( 70 S type) and on rough ER ( 80 S type).\r\n•	Animal cells contain another non-membrane bound organelles called centrioles which helps in cell division.\r\nSIZE AND SHAPE OF CELL :\r\n•	Cells differ greatly in size, shape and activities.\r\n•	Mycoplasma (smallest cell) – only 0.3 µm in length, (PPLO- Pleuropneumonia like organism) is an example of           Mycoplasma having the size about 0.1 µm).\r\n•	Bacteria = 3 to 5 µm\r\n•	Largest isolated single cell = egg of an ostrich\r\n•	Human red blood cell- 7.0 µm in diameter\r\n•	Nerve cell = longest cell\r\nSHAPE :\r\n•	The shape of the cell may vary with the function they perform.\r\n•	They may be disc-like, polygonal, columnar, cuboid, thread like or even irregular.\r\nCell  -> \r\n 1. Cytoplasm-> Main arena of cellular activities.\r\n 2. Nucleus->  i. Membrane bound-> Eukaryotic cell\r\n                          ii. Membrane less-> Prokaryotic cell\r\n3. Organelles ->  i. Membrane bound -> Present in Eukaryotes\r\n                             ii. Membrane less -> Present in Prokaryotes\r\n4. Ribosomes (non-membranous found in all cells -- prokaryotic and eukaryotic).\r\n\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `standard_id` int(100) NOT NULL,
  `subject_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`, `standard_id`, `subject_id`) VALUES
(2, 'Chapter 1', 3, 4),
(3, 'Chapter 2', 2, 1),
(4, 'Microbiology', 6, 5),
(5, 'unit 1', 7, 2),
(6, 'unit 2', 7, 2),
(7, 'unit 3', 8, 3),
(8, 'unit-1', 7, 3),
(10, '2', 9, 5),
(11, '1', 10, 7),
(13, 'Comp-1', 12, 10),
(15, 'Phy-1', 12, 11),
(16, 'CELL - THE UNIT OF L', 9, 4),
(17, 'CELL - THE UNIT OF L', 13, 12),
(18, 'Cell - Discovery', 13, 12),
(19, 'cell membrane', 13, 12),
(20, 'Cell - prokaryotic a', 13, 12),
(21, 'BIOMOLECULES', 13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `mobile`, `password`, `photo`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', ''),
(2, 'abc', '', '', '', 'http://netbio.in/QUIZ/images/users/b55d4545c8effc400559bee397f2171c.jpg'),
(3, 'Hiral J Ramoliya', '', '', '', 'http://netbio.in/QUIZ/images/users/eb9d7a98051c69bfa7755a55e43e20cc.jpg'),
(4, 'Ranjan', '', '', '', 'http://netbio.in/QUIZ/images/users/8c98d8f1b7d6731c35e58b13abc98ad6.jpg'),
(5, 'vh', '', '', '', 'http://netbio.in/QUIZ/images/users/4578896762cc8bec43cef611f8960ee1.jpg'),
(6, 'thi', '', '', '', 'http://netbio.in/QUIZ/images/users/b6a3ace47448c187e002cc08481c8b83.jpg'),
(7, 'gf', '', '', '', 'http://netbio.in/QUIZ/images/users/ad1102c41d4edc1ade2f9c528637e749.jpg'),
(8, 'ranjan', '', '', '', 'http://netbio.in/QUIZ/images/users/ca032dfede342ebefc67506a53d7e956.jpg'),
(9, 'ranjan', '', '', '', 'http://netbio.in/QUIZ/images/users/b9c3c9d9b1bf9248fb60b4e79274b367.jpg'),
(10, 'ranja', '', '', '', 'http://netbio.in/QUIZ/images/users/a96646aaaf714e6ca55faae62c9190d5.jpg'),
(11, 'Aayush', '', '', '', 'http://netbio.in/QUIZ/images/users/f98fe33335307bc6b6238737cb50d900.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq`
--
ALTER TABLE `mcq`
  ADD PRIMARY KEY (`mcq_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `roomjoin`
--
ALTER TABLE `roomjoin`
  ADD PRIMARY KEY (`join_id`);

--
-- Indexes for table `standard`
--
ALTER TABLE `standard`
  ADD PRIMARY KEY (`standard_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tut_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD KEY `standard_id` (`standard_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mcq`
--
ALTER TABLE `mcq`
  MODIFY `mcq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `roomjoin`
--
ALTER TABLE `roomjoin`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard`
--
ALTER TABLE `standard`
  MODIFY `standard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `tut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
