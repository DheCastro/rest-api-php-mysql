USE `dbapirest`;
 
/*Estrutura da tabela pessoa */
 
DROP TABLE IF EXISTS `pessoa`;
 
CREATE TABLE `pessoa` (
  `pessoa_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pessoa_nome` varchar(50) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`pessoa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Inserção de dados de teste da tabela pessoa */

INSERT  INTO `pessoa`(`pessoa_id`,`pessoa_nome`) VALUES 
(1,'Maria'),
(2,'Carlos'),
(3,'Ana'),
(4,'Pedro');