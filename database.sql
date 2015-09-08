CREATE TABLE IF NOT EXISTS `job` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `company` varchar(200) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_description` varchar(500) NOT NULL,
  `location` varchar(200) NOT NULL,
  `skill` varchar(200) NOT NULL,
  `industry` varchar(200) NOT NULL,
  `interview_date` datetime NOT NULL,
  `salary_from` varchar(200) NOT NULL,
  `salary_to` varchar(200) NOT NULL,
  `finders_fee_from` varchar(200) NOT NULL,
  `finders_fee_to` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
