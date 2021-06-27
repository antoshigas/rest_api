CREATE TABLE `rest_api`.`devices` (
  `device_id` INT NOT NULL,
  `device_type` VARCHAR(255) NOT NULL,
  `damage_possible` TINYINT(1) NOT NULL,
  PRIMARY KEY (`device_id`));
INSERT INTO `rest_api`.`devices` (`device_id`, `device_type`, `damage_possible`) VALUES ('9025', 'Smartphone', '1');
INSERT INTO `rest_api`.`devices` (`device_id`, `device_type`, `damage_possible`) VALUES ('9026', 'Smartwatch', '1');
INSERT INTO `rest_api`.`devices` (`device_id`, `device_type`, `damage_possible`) VALUES ('97', 'Tablet', '1');
INSERT INTO `rest_api`.`devices` (`device_id`, `device_type`, `damage_possible`) VALUES ('30', 'Notebook', '1');
INSERT INTO `rest_api`.`devices` (`device_id`, `device_type`, `damage_possible`) VALUES ('123', 'Kaffeemaschine', '0');