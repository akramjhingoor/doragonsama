/*  Table anime */

CREATE TABLE IF NOT EXISTS `anime` (
  `numanime` int(11) NOT NULL AUTO_INCREMENT,
  `nomanime` varchar(50) CHARACTER SET utf8 NOT NULL,
  `genre_anime` varchar(20) CHARACTER SET utf8 NOT NULL,
  `statut_anime` varchar(20) CHARACTER SET utf8 NOT NULL,
  `dateparution` date NOT NULL,
  `nbrepisodes` int(11) NOT NULL,
  `nbresaisons` int(11) NOT NULL,
  `synopsis` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`numanime`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1; 

/*  Table catégories */

CREATE TABLE IF NOT EXISTS `categories` (
  `numcat` int(11) NOT NULL,
  `nomcat` varchar(40) NOT NULL,
  `description` varchar(60) NOT NULL,
  PRIMARY KEY (`numcat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*  Table commentaires */

CREATE TABLE IF NOT EXISTS `commentaires` (
  `numcom` int(5) NOT NULL,
  `datecom` date NOT NULL,
  `auteur` varchar(25) NOT NULL,
  `contenu` text NOT NULL,
  `keyanime` int(11) NOT NULL,
  PRIMARY KEY (`numcom`),
  KEY `keyanime` (`keyanime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*  Table messages */

CREATE TABLE IF NOT EXISTS `messages` (
  `nummsg` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `datemsg` date NOT NULL,
  `keysujet` int(11) NOT NULL,
  `keyuser` int(11) NOT NULL,
  PRIMARY KEY (`nummsg`),
  KEY `keysujet` (`keysujet`,`keyuser`),
  KEY `keyuser` (`keyuser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*  Table sujet */

CREATE TABLE IF NOT EXISTS `sujet` (
  `numsujet` int(11) NOT NULL,
  `nomsujet` varchar(50) NOT NULL,
  `datesujet` date NOT NULL,
  `codecat` int(11) NOT NULL,
  `codeuser` int(11) NOT NULL,
  PRIMARY KEY (`numsujet`),
  KEY `codeuser` (`codeuser`),
  KEY `codecat` (`codecat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*  Table type_anime */

CREATE TABLE IF NOT EXISTS `type_anime` (
  `numtype` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `codeanime` int(11) NOT NULL,
  PRIMARY KEY (`numtype`,`codeanime`),
  KEY `codeanime` (`codeanime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*  Table utilisateurs */

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `numuser` int(5) NOT NULL,
  `pseudo` varchar(20) CHARACTER SET utf8 NOT NULL,
  `motdepasse` varchar(25) CHARACTER SET utf8 NOT NULL,
  `email` varchar(36) CHARACTER SET utf8 NOT NULL,
  `statut_humeur` varchar(60) CHARACTER SET utf8 NOT NULL,
  `dateinscription` date NOT NULL,
  `administration` tinyint(1) NOT NULL,
  PRIMARY KEY (`numuser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
