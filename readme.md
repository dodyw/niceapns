**REST**

Sample request:

Register new device token:
http://localhost/niceapns/index.php?r=api/create&model=tokens&app_id=be13f88376&secret_key=4ed89c97e4&token=12348591581x

Broadcast message:
http://localhost/niceapns/index.php?r=api/broadcast&model=tokens&app_id=be13f88376&secret_key=4ed89c97e4&message=tesmessageforbroadcast


**SQL**

CREATE TABLE `broadcast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `app_id` char(10) NOT NULL,
  `secret_key` char(10) NOT NULL,
  `cert_sandbox` varchar(255) NOT NULL,
  `cert_production` varchar(255) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `created_at` char(10) NOT NULL,
  `modified_at` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;