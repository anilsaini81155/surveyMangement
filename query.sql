--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `no_of_questions` int(5) NOT NULL,
  `audience_type` tinyint(5) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL,
  `created_by_id` int(10) NOT NULL,
  `created_datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `survey_answers_user`
--

CREATE TABLE `survey_answers_user` (
  `id` int(20) NOT NULL,
  `survey_id` int(20) NOT NULL,
  `question_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `answer_text` text NOT NULL,
  `created_datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `survey_questions` (
  `id` int(20) NOT NULL,
  `survey_id` int(20) NOT NULL,
  `question_text` varchar(500) NOT NULL,
  `created_by_id` int(20) NOT NULL,
  `created_datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `age` tinyint(3) NOT NULL,
  `user_type` tinyint(2) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `created_datetime` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

-- Table structure for table `user_surver_mapping`
--

CREATE TABLE `user_surver_mapping` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `survey_id` int(20) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_answers_user`
--
ALTER TABLE `survey_answers_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_surver_mapping`
--
ALTER TABLE `user_surver_mapping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_answers_user`
--
ALTER TABLE `survey_answers_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_surver_mapping`
--
ALTER TABLE `user_surver_mapping`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
