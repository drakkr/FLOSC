--
-- Create schema flossc
--

CREATE DATABASE IF NOT EXISTS flossc;
USE flossc;

--
-- Temporary table structure for view `flossc`.`V_Projet`
--
DROP TABLE IF EXISTS `flossc`.`V_Projet`;
DROP VIEW IF EXISTS `flossc`.`V_Projet`;
CREATE TABLE `flossc`.`V_Projet` (
  `Project_Id` smallint(6),
  `Name` varchar(30),
  `Sloc` bigint(20),
  `Ratio` tinyint(4),
  `PFna` decimal(23,4)
);

--
-- Definition of table `flossc`.`Language`
--

DROP TABLE IF EXISTS `flossc`.`Language`;
CREATE TABLE  `flossc`.`Language` (
  `Name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Ratio` int(11) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Comment` tinytext,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flossc`.`Language`
--

/*!40000 ALTER TABLE `Language` DISABLE KEYS */;
LOCK TABLES `Language` WRITE;
INSERT INTO `flossc`.`Language` VALUES  ('ABAP',18,'abap','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('ActionScript',54,'as','Moyenne ASP, Javascript, Perl, PHP'),
 ('Ada',127,'ada, adb, ads, pad','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('ADSO/IDSM',18,'adso','Basé sur ABAP'),
 ('AMPLE',20,'ample, dofile, startup','4GL analyse morphologique : http://www.spr.com/programming-languages-table.html'),
 ('ASP',50,'asa, asp','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('ASP.Net',50,'asax, ascx, asmx, aspx, config, master, sitemap, w','Basé sur ASP'),
 ('Assembly',127,'asm, S, s','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('awk',20,'awk','4GL : langage spécialisé'),
 ('Bourne Again Shell',80,'bash','Gearing Factors.pdf (QSM, image P.7)'),
 ('Bourne Shell',80,'sh','Gearing Factors.pdf (QSM, image P.7)'),
 ('C',107,'c, ec, pgc','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('C Shell',80,'csh, tcsh','Gearing Factors.pdf (QSM, image P.7)'),
 ('C#',59,'cs','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('C++',53,'C, cc, cpp, cxx, pcc','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('C/C++ Header  ',53,'H, h, hh, hpp','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('CCS',20,'ccs','4GL : inconnu, valeur par défaut'),
 ('Cmake',20,'CMakeLists.txt','4GL : langage spécialisé'),
 ('COBOL',78,'cbl, CBL, cob, COB','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('ColdFusion',56,'cfm','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('CSS',20,'css','4GL : langage spécialisé'),
 ('Cython',56,'pyx','Basé sur Python'),
 ('D',53,'d','Basé sur C++'),
 ('DAL',20,'da','4GL : inconnu, valeur par défaut'),
 ('DOS Batch',80,'bat, BAT','Basé sur shell'),
 ('DTD',42,'dtd','Basé sur HTML'),
 ('Erlang',20,'erl, hrl','4GL : langage spécialisé'),
 ('Expect',20,'exp','4GL : langage spécialisé'),
 ('Focus',45,'focexec','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('Fortran 77',118,'F, f, f77, F77, pfo','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('Fortran 90',118,'F90, f90','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('Fortran 95',118,'F95, f95','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('Go',55,'go','Moyenne C++, C#, Java'),
 ('Groovy',54,'groovy','Moyenne ASP, Javascript, Perl, PHP'),
 ('Haskell',20,'hs, lhs','4GL fonctionnel : http://www.spr.com/programming-languages-table.html'),
 ('HTML',1000,'htm, html','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('IDL',107,'idl, pro','2GL : langage scientifique de bas niveau'),
 ('Java',53,'java','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('Javascript',55,'js','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('JCL',59,'jcl','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('JSP',59,'jsp','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('Kermit',20,'ksc','4GL : langage de script spécialisé'),
 ('Korn Shell',80,'ksh','Gearing Factors.pdf (QSM, image P.7)'),
 ('lex',20,'l','4GL : langage spécialisé'),
 ('Lisp',80,'cl, el, jl, lisp, lsp, sc, scm','3GL : http://www.spr.com/programming-languages-table.html'),
 ('LiveLink Oscript',54,'oscript','Moyenne ASP, Javascript, Perl, PHP'),
 ('Lua',54,'lua','Moyenne ASP, Javascript, Perl, PHP'),
 ('m4',20,'ac, m4','4GL : langage spécialisé'),
 ('make',20,'am, gnumakefile, Gnumakefile, Makefile, makefile','4GL : langage spécialisé'),
 ('MATLAB',20,'m','4GL : langage de script spécialisé'),
 ('Modula3',80,'i3, ig, m3, mg','3GL'),
 ('MSBuild scripts',20,'csproj, wdproj','4GL : langage spécialisé'),
 ('MUMPS',20,'mps, m','4GL : langage spécialisé'),
 ('MXML',42,'mxml','Basé sur HTML'),
 ('NAnt scripts',20,'build','4GL : langage spécialisé'),
 ('NASTRAN DMAP',35,'dmap','Basé sur SAS'),
 ('Objective C',107,'m','Basé sur C'),
 ('Objective C++ ',53,'mm','Basé sur C++'),
 ('Ocaml',55,'ml','Moyenne C++, C#, Java'),
 ('Oracle Forms',29,'fmt','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('Oracle Reports',29,'rex','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('Pascal',80,'dpr, p, pas, pp','3GL : http://www.spr.com/programming-languages-table.html'),
 ('Patran Command Language',55,'pcl, ses','Moyenne C++, C#, Java'),
 ('Perl',57,'perl, PL, pl, plh, plx, pm','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('PHP',53,'php, php3, php4, php5','Source : http://eljabiri1.tripod.com/sitebuildercontent/sitebuilderfiles/FP-COCOMO-1.pdf'),
 ('PHP/Pascal',53,'inc','Source : http://eljabiri1.tripod.com/sitebuildercontent/sitebuilderfiles/FP-COCOMO-1.pdf'),
 ('Python',56,'py','Compromis entre PHP et Perl'),
 ('Rexx',50,'rexx','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('Ruby',54,'rb','Moyenne ASP, Javascript, Perl, PHP'),
 ('Ruby HTML',54,'rhtml','Basé sur Ruby'),
 ('Scala',53,'scala','Basé sur Java'),
 ('sed',20,'sed','4GL : langage spécialisé'),
 ('SKILL',80,'il','Basé sur Lisp'),
 ('SKILL++',80,'ils','Basé sur Lisp'),
 ('Smarty',42,'smarty, tpl','Basé sur HTML'),
 ('Softbridge Basic',52,'sbl, SBL','QSM : basé sur Visual Basic'),
 ('SQL',30,'psql, SQL, sql','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('SQL Data',30,'data.sql','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('SQL Stored Procedure',30,'spc.sql, spoc.sql, sproc.sql, udf.sql','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('Tcl/Tk',54,'itk, tcl, tk','Moyenne ASP, Javascript, Perl, PHP'),
 ('Teamcenter def',20,'def','4GL : langage spécialisé'),
 ('Teamcenter met',20,'met','4GL : langage spécialisé'),
 ('Teamcenter mth',20,'mth','4GL : langage spécialisé'),
 ('VHDL',107,'vhd, VHD, VHDL, vhdl','2GL : langage bas niveau'),
 ('vim script',20,'vim','4GL : langage spécialisé'),
 ('Visual Basic',52,'bas, cls, frm, vb, VB, vba, VBA, vbs, VBS','QSM: http://www.qsm.com/resources/function-point-languages-table '),
 ('XAML',42,'xaml','Basé sur HTML'),
 ('XML',1000,'XML, xml','Basé sur HTML'),
 ('XSD',42,'xsd, XSD','Basé sur HTML'),
 ('XSLT',20,'xsl, XSL, xslt, XSLT','4GL : langage spécialisé'),
 ('yacc',20,'y','4GL : langage spécialisé'),
 ('YAML',42,'yaml, yml','Basé sur HTML');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Language` ENABLE KEYS */;


--
-- Definition of table `flossc`.`Project`
--

DROP TABLE IF EXISTS `flossc`.`Project`;
CREATE TABLE  `flossc`.`Project` (
  `Id` smallint(6) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Version` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `SiteUrl` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `CodeUrl` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `Indus` tinyint(4) DEFAULT NULL,
  `Archi` tinyint(4) DEFAULT NULL,
  `Dep` tinyint(4) DEFAULT NULL,
  `Complexity` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=353 DEFAULT CHARSET=latin1 COMMENT='Floss projects';


--
-- Definition of table `flossc`.`Sloc`
--

DROP TABLE IF EXISTS `flossc`.`Sloc`;
CREATE TABLE  `flossc`.`Sloc` (
  `Project_Id` smallint(6) NOT NULL,
  `Language_Name` varchar(30) NOT NULL,
  `Sloc` bigint(20) NOT NULL,
  `PFna` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`Project_Id`,`Language_Name`) USING BTREE,
  KEY `Ratio_fk_constraint` (`Language_Name`),
  CONSTRAINT `Project_fk_constraint` FOREIGN KEY (`Project_Id`) REFERENCES `Project` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Definition of view `flossc`.`V_Projet`
--

DROP TABLE IF EXISTS `flossc`.`V_Projet`;
DROP VIEW IF EXISTS `flossc`.`V_Projet`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `flossc`.`V_Projet` AS select `S`.`Project_Id` AS `Project_Id`,`L`.`Name` AS `Name`,`S`.`Sloc` AS `Sloc`,`L`.`Ratio` AS `Ratio`,(`S`.`Sloc` / `L`.`Ratio`) AS `PFna` from (`flossc`.`Sloc` `S` join `flossc`.`Language` `L`) where (convert(`S`.`Language_Name` using utf8) = `L`.`Name`);


