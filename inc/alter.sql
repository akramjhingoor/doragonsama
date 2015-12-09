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
