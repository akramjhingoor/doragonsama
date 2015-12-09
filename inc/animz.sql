-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 05 Octobre 2015 à 19:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `animz`
--

-- --------------------------------------------------------

--
-- Structure de la table `anime`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `anime`
--

INSERT INTO `anime` (`numanime`, `nomanime`, `genre_anime`, `statut_anime`, `dateparution`, `nbrepisodes`, `nbresaisons`, `synopsis`) VALUES
(1, 'Nanatsu no taizai', 'Shonen', 'Terminé', '2014-10-05', 24, 1, 'Les Seven Deadly Sins, un groupe de chevaliers maléfiques qui ont conspiré pour renverser le Royaume de Britannia, auraient été par les Holy Knights. Mais des rumeurs prétendent qu''ils auraient survécu...\r\n10 plus tard, les Holy Knights ont organisé un coup d''Etat et l''assassinat du roi, devenant les nouveaux dirigeants du Royaume. Elizabeth s''échappe de justesse et réussit à se réfugier dans une taverne tenu par le jeune Méliodas. Derrière son air enfantin, Méliodas s''avère être un redoutable guerrier. Ainsi, Méliodas et Elizabeth décident de trouver les Seven Deadly Sins et d''obtenir leur aide pour reprendre le Royaume. '),
(2, 'Tokyo Ghoul', 'Seinen', 'Terminé', '2014-07-04', 24, 2, 'Dans la ville de Tokyo, des créatures nommées goules sont apparus et se nourrissent de chair humaine pour survivre. Pour être discrètes, celles-ci prennent l''apparence des humains. Un jour, Ken Kaniki, jeune étudiant, se fait attaquer par une créature et subit une grave blessure. Pour rester en vie, il reçoit la greffe de la goule qui l''a attaqué et devient alors un hybride, mi-humain mi-goule. Rapidement, il se rend compte qu''il ne peut plus se nourrir comme avant...'),
(3, 'Guilty Crown', 'Shonen', 'Terminé', '2012-10-13', 22, 1, 'Ayant profondément souffert de l''épidémie du virus Apocalypse, qui a fragilisé les bases de sa puissance dix ans auparavant, le Japon ne tient plus à présent que par le soutien extérieur de plusieurs pays, maintenu par le régime militaire du GHQ où la valeur de chaque vie est devenue insignifiante. C''est dans ce contexte que Shû Ôma, jeune étudiant mal dans sa peau, trouve dans son repaire Inori, chanteuse du groupe Egoist : la jeune femme, blessée, vient de dérober à Sephirah Genomics un précieux cylindre destiné à Gai, chef du groupe terroriste Croque-morts. Débusquée par les Anticorps, groupe d''intervention sous la direction du GHQ, Inori est enlevée et Shû, impuissant, décide néanmoins de terminer sa mission. Interrompu par une explosion alors qu''il rencontre Gai, Shû part à la recherche d''Inori, qu''il découvre ciblée par deux Endlaves (armures mobiles) alors qu''elle tentait de s''enfuir. En s''interposant pour la protéger de leurs tirs, le cylindre contenant le Void Genome se brise alors et confère à Shû un étrange pouvoir… \r\n'),
(4, 'Trinity Seven', 'Shonen', 'Terminé', '2014-10-07', 12, 1, 'Kasuga Arata est un adolescent à l''esprit particulièrement mal tourné qui vit seul avec sa cousine et amie d''enfance, Hijiri. En découvrant que cette vie n''est en réalité que la création d''un mystérieux grimoire, que le monde dans lequel il vivait a été détruit et que Hijiri a disparu, Kasuga décide de rejoindre l''académie Magus afin de devenir lui-même mage et sauver sa cousine. Ainsi les Trinity Seven, les plus puissantes mages de l''école, voient-elles le pire pervers qu''elles auront connu intégrer l''académie et sont contraintes de lui enseigner la magie, pour le meilleur ou pour le pire.'),
(5, 'One piece', 'Shonen', 'En cours', '1999-10-20', 688, 17, 'Gold Roger est le seigneur des pirates. À sa mort, une grande vague de piraterie s’abat sur le monde. Ces pirates partent à la recherche duOne Piece, le fabuleux trésor amassé par Gold Roger durant tout sa vie. Notre histoire commence dans un petit village dans lequel une bande de pirates réside depuis un an. Monkey D. Luffy, notre héros, est un petit garçon qui rêve de devenir pirate et demande inlassablement à Shanks le Roux, le chef des pirates, de le prendre dans son équipage. Celui-ci refuse évidemment à chaque fois en le tournant en ridicule. Un jour, Luffy mange par erreur le trésor des pirates qui n’est autre que l’un des fruits du démon, qui ont la réputation de donner des pouvoirs spéciaux. C’est ainsi que Luffy devient un homme élastique. Toutefois, le mangeur d’un fruit du démon se retrouve dans l’incapacité de nager… Dix ans plus tard, nous retrouvons Luffy qui décide de prendre la mer à la recherche d’un équipage à lui et avec pour objectif de devenir le seigneur des pirates !'),
(6, 'Mirai Nikki', 'Seinen', 'Terminé', '2011-10-10', 26, 1, 'Ayant toujours préféré rester à l’écart de ses camarades, Yukiteru Amano (Yuki), est un collégien qui se décrit comme étant un observateur. Il a même pris l’habitude de consigner tout ce qu’il voit dans son téléphone portable, en quelque sorte son journal intime. Il s’est également inventé un monde bien à lui, et c’est dans cet univers imaginaire qu’il a ses seuls amis : Deux Ex Machina, le dieu du Temps et de l’Espace, et Murmur, sa facétieuse servante. Mais un jour, Deus lui annonce qu’il prépare un « jeu » intéressant… Et voilà Yuki entraîné dans une cauchemardesque « survival game » où chacun des participants peut voir écrit l’avenir dans son portable et doit éliminer les autres pour obtenir la place de Deus…'),
(7, 'Code Geass', 'Shonen', 'Terminé', '2006-10-05', 50, 2, 'Nous sommes en 2017. Sept ans se sont écoulés depuis que le Nouvel Empire de Britannia a déclaré la guerre au Japon. Ce dernier, n’ayant pu résister aux robots de combat de l’Empire (appelés Nightmares), est devenu un territoire de l’Empire connu sous le nom de Zone 11. Lelouch, jeune étudiant qui se joue des nobles, se retrouve un jour impliqué dans le vol d’une arme chimique, qui s’avère être en réalité une fille. Malheureusement pour lui, les soldats de l’Armée Impériale le retrouvent, le prennent pour un terroriste et s’apprêtent à le tuer. C’est alors que la fille s’interpose. Avant de mourir, elle parvient à accorder à Lelouch un pouvoir le mettant dans un état second, à partir duquel il a la possibilité de donner un ordre à quiconque. Un pouvoir qui force l’obéissance absolue. Que se passera-t-il ? D’où vient cette fille ? Qu’adviendra-t-il de Lelouch ?'),
(8, 'Death Note', 'Shonen', 'Terminé', '2006-10-03', 37, 1, ' Light Yagami est un lycéen japonais de 17 ans extrêmement doué, malheureusement victime d''une vie ennuyante et monotone dans ce monde qu''il décrit comme perverti par le pouvoir et l''argent. En l''an 2006, il trouve un carnet de note titré Death Note par terre. Le Death Note est une création des Shinigami (Dieu de la Mort) et a le pouvoir d''annihiler quiconque voit son nom écrit dedans. Light décide de prendre le Death Note et en devient le propriétaire dans le but d''éradiquer toute forme de mal de ce monde. Mais après la mort inexpliquée de plusieurs criminels, il devient lui-même un criminel poursuivi par la police japonaise et par un mystérieux détective nommé L. Celui-ci découvre le secret de Light et s''en suit alors un enchainement de péripéties dans l''intérêt de la justice'),
(9, 'Akame Ga Kill', 'Shonen', 'Terminé', '2014-07-07', 24, 1, 'Tatsumi, jeune combattant, se rendait à la capitale dans l''optique de sauver son village. Mais, naïf, il se fait dérober tout ce qu''il possède par une mystérieuse jeune fille et se retrouve sans un sou. Heureusement, une autre jeune fille, une noble, propose de l''accueillir chez elle pendant quelque temps.\r\nCependant, la poisse semble coller à la peau de Tatsumi quand un groupe d''assassins débarque pour s''en prendre à sa protectrice... qui n''est pas aussi innocente qu''elle en a l''air.'),
(10, 'Black Bullet', 'Seinen', 'Terminé', '2014-04-08', 13, 1, 'Dans un futur proche, les humains ont été forcés à l’exil par un parasite appelé Gastrea. Leur quotidien n’est désormais fait que de désespoir et de terreur… Nous suivons l’histoire de Rentaro, un habitant de Tokyo. Membre d’une organisation destinée à lutter contre le ​Gastrea, il se retrouve chargé des missions les plus dangereuses. Il travaille avec une partenaire, Enju. Se battants à l’aide de leurs pouvoirs, ils se retrouvent chargés par le gouvernement d’une mission classée secrète. Leur objectif ? Sauver Tokyo d’une imminente destruction.'),
(11, 'JoJo''s Bizarre Adventure', 'Seinen', 'En cours', '2012-10-05', 71, 3, 'Aux environs des années 1880, Jonathan, fils d’une famille riche, rencontre Dio Brando qui est rendu à vivre chez lui à cause de la mort du père de ce dernier. Cette rencontre changera leur vie puisqu’ils deviendront par la suite ennemis. On assiste ensuite aux changements dans la vie des Joestar au fil des générations, ceux ci se défendant et attaquant leurs ennemis respectifs.'),
(12, 'Pandora Hearts', 'Shonen', 'Terminé', '2009-04-03', 25, 1, 'Oz Vessalius est un jeune homme de 15 ans, fils d’un Duc. Il vit entouré de Ada, sa petite-sœur, et Gilbert, un serviteur qu’il considère comme son meilleur ami. Oz est un enfant très joueur, mais alors que la cérémonie de la maturité arrive, il trouve dans un endroit isolé une montre à gousset accrochée à une pierre tombale. Là, il fait donc la connaissance d’une jeune fille assez particulière qui lui affirme qu’un jour, elle le tuera de ses propres mains. Le soir de la cérémonie, Oz est “jugé” par de mystérieuses personnes habillées de rouge.'),
(13, 'Shingeki no Kyojin', 'Seinen', 'En cours', '2013-04-07', 25, 1, 'Il y a une centaine d’années les titans ont quasiment exterminé la race humaine. Ces titans sont des géants mystérieux qui dévorent les humains par plaisir. Les humains ayant survécu à cette attaque ont alors bâti une ville entourée par d’immenses murs, bien plus grand que les titans. Après cent ans de paix, Eren, Armin et Mikasa assistent à l’attaque de leur ville par un titan gigantesque…'),
(14, 'Sword Art Online', 'Seinen', 'En cours', '2012-07-07', 50, 2, 'En 2022, l’univers du jeu vidéo écrit une nouvelle page de son histoire avec la sortie d’un MMO révolutionnaire intitulé Sword Art Online, dans lequel le joueur voit son esprit être entièrement intégré à un monde virtuel. Ancien testeur bêta, Kirito se replonge lors de la sortie officielle du jeu dans ce lieu fantastique où des milliers de personnes l’ont rejoint. Cependant, ce dernier va rapidement se rendre compte que certaines règles ont changé lorsque le créateur du jeu leur apprend qu’ils ne pourront plus reprendre conscience à moins de terminer le jeu et qu’une quelconque mort lors de leur partie leur sera également fatale dans la réalité. Pris au piège, Kirito commence alors son ascension de la tour contenant les différents boss du jeu afin de regagner sa liberté.'),
(15, 'Soul Eater', 'Shonen', 'Terminé', '2008-04-07', 51, 1, 'Dans un monde parsemé d’horribles démons se délectant des âmes de leurs innocentes victimes, l’école Shibusen forme des chasseurs de démons, les meisters. Chaque meister doit faire équipe avec une arme démoniaque (arme pouvant prendre forme humaine, aussi appelée Soul Eater) afin de chasser les âmes de démons (œufs de Kishin) et d’éviter la renaissance du Grand Dévoreur (le Kishin). Une fois qu’une arme démoniaque a mangé 99 âmes de démons, elle doit avaler une âme de sorcière afin de se transformer en Death Scythe… C’est le but que poursuivent la jeune fille modèle Maka et sa faux démoniaque, Soul, aux apparences de gamin rebelle ; Black★Star, le ninja égocentrique armé de la timide Tsubaki, grappin-faucille démoniaque ; et le maniaque de la symétrie, Death the Kid, qui manie les sœurs Liz et Patthy Thompson, pistolets démoniaques.'),
(16, 'Blue Exorcist', 'Shonen', 'Terminé', '2011-04-17', 25, 1, 'Le monde de Blue Exorcist se compose de deux dimensions qui s''opposent comme deux faces de miroirs. Le premier est le monde dans lequel les êtres humains vivent, Assiah. L’autre est le monde des démons, la Géhenne. Normalement, le voyage et même toute forme de contact entre les deux est impossible. Toutefois, les démons peuvent passer dans ce monde en possédant tout ce qui existe en son sein. Satan est le dieu des démons, mais il y a une chose qu’il n’a pas : un conteneur dans le monde humain assez puissant pour le contenir. À cette fin, il a engendré Okumura Rin et Okumura Yukio (mais seul Rin a hérité des pouvoirs de Satan), ses fils, d’une femme humaine, mais ces derniers sont-ils en accord avec ses plans, ou doivent-ils devenir autre chose ? Après avoir tué le père gardien Fujimoto, lors d’une tentative qui aurait dû permettre à Rin de retourner dans le monde des démons, il lui donne un rêve : devenir un exorciste pour vaincre le dieu des démons.'),
(17, 'Blade and Soul', 'Shonen', 'Terminé', '2014-04-03', 13, 1, 'Alka est une épéiste qui possède une lame lui permettant de venir à bout de ses adversaires avec une seule attaque. Afin de venger la mort de son maître, elle est à la recherche de sa meurtrière, Jin Vavel. Elles font cependant toutes les deux parties du même clan d’assassin, Blade… Dans sa quête de vengeance, Alka fera la rencontre de trois autres femmes, Hazuki, Karen et Roana qui sont respectivement mercenaire, chanteuse et chef d’une bande de voleurs.'),
(18, 'Log Horizon', 'Shonen', 'Terminé', '2013-10-05', 50, 2, 'L’histoire nous entraîne dans un jeu online qui se voit offrir une nouvelle extension. Cependant, les 30 000 joueurs se retrouvent emprisonnés dans le monde virtuel de Elder Tail. Très vite des équipes de guerriers se créent pour faire face aux menaces. Nous suivons les aventures de Shiroe, le magicien/alchimiste, et ses amis, Naotsugu le guerrier et Akatsuki de la classe assassin, dans leur quête pour changer le monde !'),
(19, 'Noragami', 'Shonen', 'En cours', '2014-01-05', 12, 1, 'Yato est une divinité mineure qui cherche à gagner en notoriété, à devenir un Dieu respecté par tout le pays et avoir son propre temple, pour cela il exauce tous les vœux pour seulement 5 yens. Un jour lors d’une de ses missions, Hiyori Iki, jeune étudiante l’aperçoit manquant de se faire renverser par un camion et lui vient en aide, cette dernière n’ayant pu esquiver le camion, elle devient un Ayakashi (une sorte d’esprit empli de mauvaise pensée et de malédiction), c’est alors qu’elle demande de l’aide à Yato afin de l’aider à retrouver son état originel.'),
(20, 'Reborn', 'Shonen', 'Terminé', '2006-10-07', 203, 8, 'Tsunayoshi "Tsuna" Sawada est un jeune lycéen particulièrement incapable, que ce soit en études, en sport, ou en relations sociales. Un jour, un tuteur lui est envoyé d''Italie, il s''agit de Reborn, un bébé tueur à gages, homme de main de la famille mafieuse Vongola, venu pour le rendre apte à devenir le prochain parrain de la famille dont il s''avère qu''il est l''héritier lointain. \r\n\r\nLe principal instrument de Reborn pour faire de Tsuna un homme accompli est une balle spéciale qui permet à celui qui la reçoit d''avoir l''énergie suffisante pour accomplir sa dernière volonté. Reborn fera aussi en sorte d''introduire diverses personnes dans la famille Vongola afin d''accompagner Tsuna dans son destin et de le protéger en tant que bons "Lieutenants du Parrain" comme Gokudera, l''expert en dynamite; sa sœur Bianchi, as du "Poison Cooking"; Yamamoto, champion de baseball au grand cœur, ou bien encore Lambo, bébé tueur de la famille Bovino pouvant se transformer en lui-même 10 ans plus tard...'),
(21, 'Dragon Ball Z', 'Shonen', 'En cours', '1989-04-26', 450, 9, 'Dragon Ball Z se déroule cinq ans après le mariage de Son Goku et de Chichi. Raditz, un mystérieux guerrier de l''espace, frère de Son Goku, arrive sur Terre pour retrouver Goku. Ce dernier apprend qu''il vient d''une planète de guerriers redoutables dont il ne reste plus que quatre survivants. La paix est revenue sur la Terre depuis la victoire de Son Goku au dernier championnat du monde des arts martiaux. Alors qu’il présente son fils, Son Gohan à ses amis, un mystérieux « guerrier de l’espace » surgit et révèle ses origines extraterrestres.'),
(22, 'Plastic Memories', 'Shonen', 'Terminé', '2015-04-04', 13, 1, 'Après avoir échoué ses examens d’entrée à l’université, Tsukasa Mizugaki, 18 ans, reçoit une offre pour travailler au “SAI Corporation” grâce aux connaissances de son père. Cette compagnie est reconnue pour sa production et son entretien d’androïdes à émotions surnommés “Giftia”. La position de Tsukasa est dans le département du “Terminal Service”, leur travail étant de récupérer les Giftias ayant presque atteint leur date d’expiration - comme s’ils s’occupaient d’un cimetière. Un Giftia vit pendant exactement 81 920 heures, ce qui fait, à peu près, 9 ans et 4 mois. Après cette période de temps, leurs mémoires et personnalités disparaissent et ils deviennent incontrôlables. C’est là que le département du “Terminal Service” entre en jeu : ils doivent récupérer ces androïdes, indiscernables du commun des mortels, afin de “mettre fin à leur existence” avant qu’ils ne causent des problèmes. Ce travail se fait par groupe de deux personnes : un Giftia négociant avec la famille afin de récupérer l’androïde expiré et un humain le supervisant pour être sûr qu’il fasse bien son travail. Malheureusement, Tsukasa doit travailler avec Isla, une Giftia qui n’avait qu’une seule responsabilité : celle de servir du thé à ses collègues. Il devra donc s’intégrer, de force, dans le rôle de négociateur.'),
(23, 'Dungeon ni Deai ', 'Shonen', 'Terminé', '2015-04-04', 13, 1, 'Dans la ville d''Orario, nombres aventuriers intrépides partent à la conquête du sombre labyrinthe sous-terrain nommé Dungeon à la recherche de gloire et de fortune. Mais alors que la richesse et la renommée promise est suffisante pour insister à l''exploration du Dungeon, Bell Cranel, qui pourrait devenir un héros extraordinaire, a des plans bien plus important : Il veut draguer des filles ! Est-ce mal de faire face aux périls du Dungeon seul, dans une guilde d''un seul membre béni par une déesse oubliée ? Peut-être. Est ce mal de rêver de jouer au héros sauvant de malheureuses princesses sans défense dans le Dungeon ? Peut-être pas. Après une aventure malencontreuse, Bell découvre rapidement que tout peut arriver dans les labyrinthes même des rencontres fortuites avec de belles jeunes femmes. Le seul problème ? Il est celui qui finit par devenir la demoiselle en détresse !'),
(24, 'Hataraku Maou sama', 'Shonen', 'Terminé', '2013-04-04', 13, 1, 'Dans un monde fantastique, le roi démoniaque Sadao était à deux doigts de conquérir tous les royaumes quand il fut battu par la guerrière Emilia. Envoyé dans notre monde, Sadao se retrouve àTokyo. Maintenant, il doit vivre de petits boulots à petits boulots. Et il finit par décrocher un job à temps partiel dans un fast-food. Pendant ce temps, Emilia est arrivée au Japon pour terminer sa mission : Éliminer le sombre roi.'),
(25, 'Campione', 'Seinen', 'Terminé', '2012-07-06', 13, 1, 'Campione  est le chef suprême. Il a le pouvoir de tuer un être céleste à l’aide de pouvoirs divins. Campione est le seigneur. Il a le pouvoir de tuer un dieu de ses mains et peut dominer les mortels sur terre. Campione  est le diable parmi les mortels, personne ne peut se mesurer à lui. Godô Kusanagi est un lycéen de seize ans, ancien joueur de base-ball, qui dû arrêter une carrière prometteuse à cause d’une blessure. Au cours des vacances du printemps, il se retrouve impliqué dans une drôle d’histoire et finit par tuer une divinité, Verethragna. Ainsi, il devint le plus jeune et septième Campione. Maintenant qu’il est un Campione, un Godslayer, Godô doit réparer et vaincre les troubles causés par les dieux.'),
(26, 'Noucome', 'Shonen', 'Terminé', '2013-10-09', 10, 1, 'Kanade Amakusa est un garçon maudit par le pouvoir du « choix multiples absolu », un questionnaire à choix multiples qui apparaît dans son esprit et dont sa réponse devient réalité. Un jour à l’école, deux choix apparaissent dans son esprit, le premier fera qu’une magnifique jeune fille tombera devant lui, quant au second il le fera tomber du toit de l’école vêtu de vêtements féminins. Il choisit la première option, et soudainement une jeune fille blonde nommée Chocolat tombe devant lui.'),
(27, 'Another', 'Seinen', 'Terminé', '2012-01-10', 12, 1, 'En 1972, un certain lycéen, Misaki, de l’établissement Yomoyama Junior est soudainement retrouvée mort. Par chagrin, ses camarades de classe de la 3-3, ont décidé d’agir comme si il était encore en vie jusqu’à la remise des diplômes. Cette illusion n’a pas été sans dommage pour cette classe… 1998, Sakakibara Koichi est transféré dans la classe 3-3 et décèle un étrange comportement auprès de ses camarades de classe. Il y rencontre même une mystérieuse élève du nom de Misaki Mei qui porte un cache-oeil et qui passe son temps à dessiner.'),
(28, 'Baka to Test to Shoukanjuu', 'Shonen', 'Terminé', '2010-01-07', 27, 2, 'L’établissement Fumizuki est une école très particulière qui répartit ses élèves en six classes en fonction de leur score lors d’un examen. Les lycéens ayant les meilleurs résultats iront dans la classe A où un confort maximal pour étudier est assuré tandis que ceux minimisant l’examen seront envoyés dans la classe F, la plus insalubre.Akihisa Yoshii bien qu’étant l’un des plus mauvais étudiants, espère réussir le devoir afin d’atteindre la plus haute classe possible. Cependant, lors de ce dernier, il perd du temps pour venir en aide à une de ses camarades de classe, nommée Himeji, qui finit par s’évanouir. De ce fait, Yoshii et elle se retrouvent ensemble dans la classe F. Devant l’état déplorable des conditions de travail, la classe F décide de former une rébellion à l’aide de l’ESB. Ce système propre à l’établissement permet aux élèves d’invoquer une miniaturisation d’eux-mêmes et d’affronter les classes supérieures pour échanger leur place. La force de leur invocation dépendant uniquement de leur dernier résultat aux examens, la classe F part avec un sérieux handicap dans cette bataille où tous les coups sont permis.'),
(29, 'Nisekoi', 'Shonen', 'Terminé', '2014-01-11', 35, 2, 'Lorsqu’il était enfant, Raku Ichijô a promis à celle qu’il aimait alors de conserver précieusement un cadenas dont elle seule possède la clef jusqu’à ce qu’ils se retrouvent tous deux, une fois adultes, pour se marier. Dix années se sont écoulées, Raku, bien que fils d’un chef de clan yakuza, tente d’être un lycéen comme les autres. Son quotidien est bouleversé par sa rencontre avec Chitoge Kirisaki, une nouvelle élève très querelleuse, qui va rapidement devenir sa pire ennemie. La situation tourne au cauchemar quand Raku apprend qu’il s’agit en réalité de la fille d’une famille de gangsters et qu’il va devoir simuler de sortir avec elle… pour éviter une guerre des gangs ! Leurs familles vont-elles s’apercevoir qu’ils ne font que jouer la comédie ? Mais surtout, retrouvera-t-il son amour d’enfance ?'),
(30, 'Kekkai Sensen', 'Shonen', 'En cours', '2015-04-04', 13, 1, 'Il y a trois ans, une brèche séparant la planète Terre du monde des morts s''est ouverte en plein milieu de la ville de New York, piégeant ainsi ses habitants et par la même occasion des créatures venant d''autres dimensions dans une bulle impénétrable. Après avoir été détruite et reconstruit la ville de New York est rebaptisée Jerusalem’s Lot, où l''ordinaire côtoie l''extraordinaire, et où certains humains peu scrupuleux exploite ces nouvelles capacités pour leur profit. Alors que les humains et démons cohabitent depuis des années dans un monde en proie au chaos et à la folie, un groupe menace de percer la bulle et déverser le chaos du nouveau Jérusalem sur la terre entière. Pour empêcher un tel désastre de se produire, un groupe de surhommes, les mystérieux supers agents de Libra (Klaus Rineberts, la femme loup-garou Frau Jane et le majordome momie Gilbert), sera envoyé pour arrêter cette menace.');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `numcat` int(11) NOT NULL,
  `nomcat` varchar(40) NOT NULL,
  `description` varchar(60) NOT NULL,
  PRIMARY KEY (`numcat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`numcat`, `nomcat`, `description`) VALUES
(1, 'Présentation', 'Lieu de présentation des membres et de l''équipe'),
(2, 'Discussions générales', 'Suivez l''actualité du site, discutez avec la communauté...\n\n');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `numcom` int(5) NOT NULL,
  `datecom` date NOT NULL,
  `auteur` varchar(25) NOT NULL,
  `contenu` text NOT NULL,
  `keyanime` int(11) NOT NULL,
  PRIMARY KEY (`numcom`),
  KEY `keyanime` (`keyanime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`numcom`, `datecom`, `auteur`, `contenu`, `keyanime`) VALUES
(1, '2015-07-10', 'Akram', 'Akame Ga Kill ou aussi comme les méchants deviennent des gentils. Cette anime est fait pour les fans d''aventure et de combats. Des combats à un haut niveau, une histoire plein de rebondissements, des graphismes agréables, Akame Ga Kill est tout bonnement un anime à voir. Un anime avec un soupçon de sang, de fantaisie et de drame, il s''aura séduire ce qui dégustera cette anime.', 9),
(2, '2015-07-27', 'Riku', 'Personnellement, le premier &eacute;pisode m''a laiss&eacute; sans voix. Un peu de psychologie dans cette anime dans un certain point de vue', 9),
(3, '2015-07-27', 'Akram', 'La psychologie dans cette anime, on le voit de temps en temps mais c''est pas pr&eacute;sent partout ! SI tu cherches un anime psychologique, regarde Death Note. Il est vachement bien avec tous les rebondissements et le suspense. Dans celui-ci, il y a l''omnipr&eacute;sence de la psychologie. ', 9),
(4, '2015-08-22', 'Akram', 'Cette anime m''a fait beaucoup rire ! Yoshi est le pire personnage principal que j''ai vu depuis longtemps et c''est justement &ccedil;a qui me fait bien marr&eacute;. Un anime avec un bon sc&eacute;nario, utilisez les notes pour faire des classes. A la fin, ce ne sont que des r&eacute;sultats puisqu''ils ne refl&egrave;tent pas le caract&egrave;re du personnage (Himeji par exemple...)', 28),
(5, '2015-08-25', 'Akatsuki', 'Franchement Akram toujours aussi philosophe, tu peux pas &ecirc;tre plus simple dans tes propos :) ', 28),
(6, '2015-08-25', 'Akram', 'Pour moi, &ccedil;a a &eacute;t&eacute; l''anime de mes vacances ! Emotion, com&eacute;die, agr&eacute;able, Plastic Memories a surtout r&eacute;ussi &agrave; me faire ressentir quelque chose moi qui est un coeur de pierre !!', 22),
(7, '2015-08-29', 'Akram', 'Akatsuki, tu me connais j''aime la pr&eacute;cision ;) ', 28),
(8, '2015-08-31', 'Akram', 'C''est de loin mon anime pr&eacute;f&eacute;r&eacute; ! Seul anime auquel j''ai accroch&eacute; d&egrave;s le d&eacute;but et qui m''a pouss&eacute; &agrave; le suivre. Beaucoup de r&eacute;f&eacute;rences au MMO, RPG dans cette anime. On peut facilement se reconna&icirc;tre au personnage principal. Aspect graphique impressionnant, &eacute;motions omni-pr&eacute;sent, et le sc&eacute;nario est novateur.  Anime que je conseille fortement !!! LINK START', 14),
(9, '2015-09-01', 'Riku', 'Je suis bien d''accord ! J''ai trop h&acirc;te de voir la saison 3 de cette anime qui sortira courant 2016 selon ADN. Une autre alternative &agrave; ce manga serait Log Horizon. C''est aussi bien un anime sur le m&ecirc;me th&egrave;me qui est tout aussi bien que SAO.  ', 14),
(10, '2015-08-15', 'Riku', 'Un anime que j''ai ador&eacute;. Akatsuki, je comprends enfin d''o&ugrave; ton nom et elle est super kawaiii. Cherche un anime du m&ecirc;me genre, des avis ?', 18),
(11, '2015-08-21', 'Akatsuki', 'Hahaha oui, je sais je suis trop formidable ! Cette anime est surtout le personnage que j''ai aim&eacute; !!! Tu peux essayer SAO c''est un des animes pr&eacute;f&eacute;r&eacute;s de l''admin Akram. ', 18),
(12, '2015-08-25', 'Onodera', 'Mon spring anime c''est celui-ci j''ai bien aim&eacute; l''histoire et c''est vraiment triste ce qui se passe pour les copines d''Enju. Je ne fais pas de spoil je n''en dis pas plus', 10),
(13, '2015-09-01', 'Akram', 'Aka-chan, t''es oblig&eacute; de faire ta pub. Je reste d''accord avec toi pour Akatsuki et Shiroe dans cette anime. RIku tu peux essayer Dungeon ni Deai (DanMachi autre nom) qui est vraiment pas mal par contre, pas beaucoup d''&eacute;pisodes', 18),
(14, '2015-09-01', 'Riku', 'D''accord Merci du conseil ! Je vais regarder de suite', 18),
(15, '2015-09-01', 'Akram', 'Je te l''avais dit que cet anime allait te plaire !! Un tr&egrave;s bon anime un des mes favourites animes ', 10);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

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

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`nummsg`, `contenu`, `datemsg`, `keysujet`, `keyuser`) VALUES
(1, 'L''accès et la participation aux forums Doragon-sama est un privilège réservé aux utilisateurs. Il y a cependant des règles de conduite importantes et indissociables de la bonne tenue de ces forums. Vous devez par conséquent être conscient qu''en cas de non-respect de ces règles, vous vous exposez à des sanctions. Cela peut aller du blocage temporaire ou définitif de votre accès au forum, à la fermeture définitive de votre compte.\r\n\r\nSi le droit d''écriture sur le forum est réservé aux seuls abonnés à Doragon-sama, sa lecture est en revanche accessible à tous. Par conséquent, Les admin mettent un point d''honneur à exclure tout contenu illégal, menaçant, harcelant, diffamatoire, vulgaire, obscène, haineux, racial ou répréhensible, quel qu''il soit.\r\n\r\nPour cela, les admin se réserve le droit de supprimer, déplacer ou modifier n''importe quel contenu publié sur les forums, ainsi que de bloquer ou de limiter votre accès à celui-ci sans avertissement ni explication.\r\n', '2015-08-28', 1, 2),
(2, 'Ci-après, une liste non-exhaustive des règles de bonne conduite sur les forums à respecter impérativement.\n\nIl est obligatoire :\n\n*De respecter les autres utilisateurs, les admin\n*D''écrire ses messages dans un français correct, compréhensible, et exempt d''abréviations de type " *langage SMS ".\n*De lire toutes les participations d''un sujet avant d''y répondre à son tour. Le respect des autres utilisateurs passe avant tout par la lecture de leurs interventions et la prise en compte de celles-ci avant la rédaction d''un message.\n*De prendre la peine d''effectuer une recherche avant de créer un nouveau sujet. Si un sujet est déjà ouvert sur le même thème, il est préférable de répondre sur ce dernier plutôt que d''en créer un nouveau.\n*De lire l''ensemble des sujets  d''une section du forum avant d''y créer un sujet ou de répondre à un sujet existant.\n\nIl est interdit :\n\n*De " spammer ", publier des messages sans intérêt, trop fréquents ou indésirables.\n*D''utiliser les abréviations de type " langage SMS ".\n*De publier ou faire la promotion d''un contenu illégal, menaçant, harcelant, diffamatoire, vulgaire, obscène, haineux, racial ou répréhensible.\n*De tenter d''une manière ou d''une autre de nuire à l''intégrité du forum.\n*D''insulter quelqu''un, peu importe la personne, la raison et le contexte\n*D''utiliser un vocabulaire grossier, choquant ou sexuel.\n*De publier ou renvoyer vers des images à caractère pornographique.\n', '2015-08-28', 1, 2),
(3, 'Merci d''&ecirc;tre aussi pr&eacute;cis !! C''est vrai que c''est logique mais essentiel &agrave; rappeler', '2015-09-07', 1, 1),
(4, 'Je trouve &ccedil;a aussi logique ! Merci, &ccedil;a fait plaisir quand on reconnait le travail d''admin de l''équipe Doragonsama x)', '2015-09-08', 1, 2),
(5, 'Ici vous pouvez exprimer vos pr&eacute;f&eacute;rences et partagez votre opinion. Pour ma part, mon Top 5 des Animes est le suivante : \r\n* Sword Art Online (le sc&eacute;nario, graphique et les personnages tout m''a plu...);\r\n* Plastic Memories(trop de sentiments et cette anime m''a fait beaucoup d''effet tant dans l''&eacute;motion, avec les aspects futuristes);\r\n* Code Geass (Selon moi le meilleur anime de tous les temps )\r\n*Black Bullet (Un anime post-apocalyptique avec une bonne histoire et de mes pr&eacute;f&eacute;r&eacute;s)\r\n*Shingeki no Kyojin (J''ai ador&eacute; cette anime et je ne m''en lasse pas)\r\n\r\nJe ne reste pas insensible puisqu''il y a en d''autres (Nanatsu no taizai, akame ga kill, DanMachi, Naruto...) pour ne pas tous les citer.   ', '2015-09-08', 3, 2),
(6, 'C''est trop dur de choisir parmi des animes. Ils sont tous aussi bien les uns que les autres. Par contre, &ccedil;a d&eacute;pend de ce que tu veux. Un anime plut&ocirc;t school tu peux choisir Nisekoi, ou Assassination Classroom. Un c&ocirc;t&eacute; plut&ocirc;t combat, on peut parler de Reborn ou Dragon Ball. Pour les animes avec de tr&egrave;s bons sc&eacute;narios, il y a Guilty Crown ou Kekkai Sensen, Log Horizon', '2015-09-09', 3, 1),
(7, 'Log Horizon, Onodera tu connais les bons animes d''ailleurs Akram &ccedil;a m''&eacute;tonne que tu n''es pas mis Guilty Crown dans ton top. Toi qui aime en faire la pub...', '2015-09-09', 3, 4),
(8, 'Ouiiii Guilty Crown j''ai oubli&eacute; c''est vrai que c''est dur de choisir !!', '2015-09-09', 3, 2),
(9, 'C''est la v&eacute;rit&eacute;, moi j''aurais parl&eacute; aussi de Death Note un vrai chef d&rsquo;&oelig;uvre ou Mirai Nikki ', '2015-09-09', 3, 4),
(10, 'Mirai Nikki, c''est vrai ! C''est un peu comme Akatsuki et Akram dans la communaut&eacute; Doragonsama une vraie passion entre eux ! ', '2015-09-09', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

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

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`numsujet`, `nomsujet`, `datesujet`, `codecat`, `codeuser`) VALUES
(1, 'Règles du Forum', '2015-08-20', 1, 2),
(2, 'Le groupe Doragon-sama', '2015-09-01', 1, 3),
(3, 'Top Animes', '2015-09-03', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_anime`
--

CREATE TABLE IF NOT EXISTS `type_anime` (
  `numtype` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `codeanime` int(11) NOT NULL,
  PRIMARY KEY (`numtype`,`codeanime`),
  KEY `codeanime` (`codeanime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_anime`
--

INSERT INTO `type_anime` (`numtype`, `libelle`, `codeanime`) VALUES
(1, 'Horreur ', 2),
(2, 'Action', 2),
(3, 'Fantastique', 1),
(4, 'Comédie', 1),
(5, 'Drame', 3),
(6, 'Romance', 3),
(7, 'Comédie', 4),
(8, 'Combats et Arts Martiaux', 5),
(9, 'Fantastique', 4),
(10, 'Aventure', 5),
(11, 'Action', 3),
(12, 'Fantastique', 3),
(13, 'Aventure', 1),
(14, 'Action', 1),
(15, 'Amour et Amitié', 1),
(16, 'Drame', 2),
(17, 'Fantastique', 2),
(18, 'Comédie', 5),
(19, 'Action', 4),
(20, 'Action ', 5),
(21, 'Fantastique', 5),
(22, 'Action', 6),
(23, 'Drame', 6),
(24, 'Horreur', 6),
(25, 'Romance', 6),
(26, 'Combats et Arts Martiaux', 6),
(27, 'Action', 7),
(28, 'Mecha', 7),
(29, 'Drame', 7),
(30, 'Fantastique', 7),
(31, 'Fantastique', 8),
(32, 'Drame', 8),
(33, 'Policier', 8),
(34, 'Horreur', 8),
(35, 'Action', 9),
(36, 'Drame', 9),
(37, 'Fantastique', 9),
(38, 'Aventure', 9),
(39, 'Combats et Arts Martiaux', 9),
(40, 'Action', 10),
(41, 'Science-Fiction', 10),
(42, 'Fantastique', 10),
(43, 'Fantastique', 11),
(44, 'Aventure', 11),
(45, 'Drame', 11),
(46, 'Horreur', 11),
(47, 'Action', 12),
(48, 'Drame', 12),
(49, 'Fantastique', 12),
(50, 'Amour et Amitié', 12),
(51, 'Action', 13),
(52, 'Drame', 13),
(53, 'Horreur', 13),
(54, 'Fantastique', 13),
(55, 'Action', 14),
(56, 'Fantastique', 14),
(57, 'Aventure', 14),
(58, 'Drame', 14),
(59, 'Amour et Amitié', 14),
(60, 'Action', 15),
(61, 'Fantastique', 15),
(62, 'Comédie', 15),
(63, 'Aventure', 15),
(64, 'Action', 16),
(65, 'Fantastique', 16),
(66, 'Drame', 16),
(67, 'Combats et Arts Martiaux', 16),
(68, 'Action', 17),
(69, 'Fantastique', 17),
(70, 'Combats et Arts Martiaux', 17),
(71, 'Aventure', 17),
(72, 'Action', 18),
(73, 'Aventure', 18),
(74, 'Fantastique', 18),
(75, 'Amour et Amitié', 18),
(76, 'Comédie', 18),
(77, 'Action', 19),
(78, 'Fantastique', 19),
(79, 'Combats et Arts Martiaux', 19),
(80, 'Aventure', 19),
(81, 'Amour et Amitié', 10),
(82, 'Action', 20),
(83, 'Aventure', 20),
(84, 'Combats et Arts Martiaux', 20),
(85, 'Comédie', 20),
(86, 'Action', 21),
(87, 'Aventure', 21),
(88, 'Combats et Arts Martiaux', 21),
(89, 'Fantastique', 21),
(90, 'Science-Fiction', 21),
(91, 'Amour et Amitié', 22),
(92, 'Comédie', 22),
(93, 'Drame', 22),
(94, 'Romance', 22),
(95, 'Science-Fiction', 22),
(96, 'Action', 24),
(97, 'Amour et Amitié', 24),
(98, 'Comédie', 24),
(99, 'Fantastique', 24),
(100, 'Action', 25),
(101, 'Comédie', 25),
(102, 'Fantastique', 25),
(103, 'Romance', 25),
(104, 'Amour et Amitié', 26),
(105, 'Comédie', 26),
(106, 'Fantastique', 26),
(107, 'Drame', 27),
(108, 'Horreur ', 27),
(109, 'Policier', 27),
(110, 'Action', 28),
(111, 'Amour et Amitié', 28),
(112, 'Comédie', 28),
(113, 'Fantastique', 28),
(114, 'Amour et Amitié', 29),
(115, 'Comédie', 29),
(116, 'Romance', 29),
(117, 'Action ', 23),
(118, 'Comédie', 23),
(119, 'Fantastique', 23),
(120, 'Romance', 23),
(121, 'Aventure', 23),
(122, 'Action', 30),
(123, 'Aventure', 30),
(124, 'Combats et Arts Martiaux', 30),
(125, 'Fantastique', 30);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

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

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`numuser`, `pseudo`, `motdepasse`, `email`, `statut_humeur`, `dateinscription`, `administration`) VALUES
(1, 'Onodera', 'azerty123', 'onoderakosaki@doragonsama.com', 'I''m shy but nice 2 meet U', '2015-08-29', 0),
(2, 'Akram', 'motdepasse', 'akram@doragonsama.com', 'Je suis le maître du monde', '2015-07-10', 1),
(3, 'Riku', 'uchiwariku', 'riku-uchiwa@doragonsama.com', 'Games, Girls and Manga that''s all !!', '2015-07-15', 0),
(4, 'Akatsuki', 'password', 'akatsuki@doragonsama.com', 'Aussi vive que le vent !!', '2015-08-29', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`keyanime`) REFERENCES `anime` (`numanime`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`keysujet`) REFERENCES `sujet` (`numsujet`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`keyuser`) REFERENCES `utilisateurs` (`numuser`);

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`codecat`) REFERENCES `categories` (`numcat`),
  ADD CONSTRAINT `sujet_ibfk_2` FOREIGN KEY (`codeuser`) REFERENCES `utilisateurs` (`numuser`);

--
-- Contraintes pour la table `type_anime`
--
ALTER TABLE `type_anime`
  ADD CONSTRAINT `type_anime_ibfk_1` FOREIGN KEY (`codeanime`) REFERENCES `anime` (`numanime`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
