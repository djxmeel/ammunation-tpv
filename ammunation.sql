-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 05 juin 2022 à 23:52
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ammunation`
--
CREATE DATABASE IF NOT EXISTS `ammunation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ammunation`;

-- --------------------------------------------------------

--
-- Structure de la table `categorias`
--

CREATE TABLE `categorias` (
  `id` tinyint(4) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `img`) VALUES
(1, 'Assault Rifle', 'Military firearm that is chambered for ammunition of reduced size or propellant charge and that has the capacity to switch between semiauto and fully automatic fire.', 'assaultrifle.png'),
(2, 'Submachine Gun', 'A submachine gun, abbreviated SMG, is a magazine-fed, automatic carbine designed to fire handgun cartridges.', 'submachinegun.png'),
(3, 'Shotgun', 'A shotgun (also known as a scattergun, or historically as a fowling piece) is a long-barreled firearm designed to shoot a straight-walled cartridge known as a shotshell.', 'shotgun.png'),
(4, 'Light Machine Gun', 'A light machine gun (LMG) is a light-weight machine gun designed to be operated by a single infantryman, with or without an assistant, as an infantry support weapon.', 'lmg.png'),
(5, 'Sniper Rifle', 'A sniper rifle is a high-precision, long-range rifle. Requirements include accuracy, reliability, mobility, concealment and optics for anti-personnel, anti-materiel and surveillance uses of the military sniper.', 'sniperrifle.png'),
(6, 'Handgun', 'A firearm that is easily concealable, can be fired one-handed, and usually has an effective range of no greater than 100 meters.', 'handgun.png'),
(7, 'Melee Weapon', 'A melee weapon, hand weapon or close combat weapon is any handheld weapon used in hand-to-hand combat', 'meleeweapon.png'),
(8, 'Explosive', 'An explosive (or explosive material) is a reactive substance that contains a great amount of potential energy that can produce an explosion if released suddenly.', 'explosive.png'),
(9, 'Ammunition', 'The material fired, scattered, dropped or detonated from any weapon or weapon system.', 'ammo.png');

-- --------------------------------------------------------

--
-- Structure de la table `clientes`
--

CREATE TABLE `clientes` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido1` varchar(32) NOT NULL,
  `apellido2` varchar(32) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `contacto` varchar(13) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clientes`
--

INSERT INTO `clientes` (`dni`, `nombre`, `apellido1`, `apellido2`, `direccion`, `contacto`, `fecha_alta`) VALUES
('GENERIC', '', '', NULL, NULL, NULL, '0000-00-00'),
('Y52068954', 'John ', 'Doe', NULL, '18 Calle Benijofar', '602254750', '2022-01-31'),
('Y78054891', 'Mike', 'McConnagan', '', '35 Calle Your Mama', '632487501', '2021-02-01'),
('Y98798538', 'Karim', 'Abou Al Azaim', '', 'Alger 16', '2135572688', '2011-09-13');

-- --------------------------------------------------------

--
-- Structure de la table `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `dni_cliente` varchar(9) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `importe` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 0,
  `aparcada` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compras`
--

INSERT INTO `compras` (`id`, `id_empleado`, `dni_cliente`, `fecha`, `importe`, `estado`, `aparcada`) VALUES
(0, 3, 'Y52068954', '2022-03-10', 2926, 1, 0),
(1, 2, 'Y78054891', '2022-02-02', 3000, 1, 0),
(2, 2, 'Y98798538', '2022-03-15', 6095, 1, 0),
(25, 1, 'GENERIC', '2022-06-01', 1100, 1, 0),
(28, 1, 'GENERIC', '2022-06-04', 9250, 1, 0),
(29, 1, 'GENERIC', '2022-06-04', 5000, 1, 0),
(30, 1, 'GENERIC', '2022-06-04', 8600, 0, 1),
(31, 1, 'Y78054891', '2022-06-05', 29750, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `detalles_compra`
--

CREATE TABLE `detalles_compra` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` smallint(6) DEFAULT NULL,
  `precio_venta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `detalles_compra`
--

INSERT INTO `detalles_compra` (`id_compra`, `id_producto`, `cantidad`, `precio_venta`) VALUES
(0, 21, 1, 1900),
(0, 26, 1, 870),
(0, 41, 5, 20),
(0, 48, 1, 56),
(1, 1, 1, 1900),
(1, 4, 1, 1100),
(2, 3, 1, 2800),
(2, 24, 1, 1950),
(2, 33, 1, 320),
(2, 38, 1, 500),
(2, 42, 5, 35),
(2, 47, 5, 70),
(25, 4, 1, 1100),
(28, 2, 1, 3600),
(28, 3, 1, 2800),
(28, 4, 1, 1100),
(28, 5, 1, 1750),
(29, 3, 1, 2800),
(29, 4, 2, 1100),
(30, 2, 1, 3600),
(30, 3, 1, 2800),
(30, 4, 2, 1100),
(31, 1, 1, 1900),
(31, 2, 3, 3600),
(31, 3, 3, 2800),
(31, 5, 3, 1750),
(31, 10, 2, 1700);

-- --------------------------------------------------------

--
-- Structure de la table `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `usuario` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `isadmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `empleados`
--

INSERT INTO `empleados` (`id`, `usuario`, `pass`, `isadmin`) VALUES
(1, 'djamel', 'password', 1),
(2, 'kabz', 'password', 0),
(3, 'nisoo', 'password', 0),
(4, 'zakybenos', 'password', 0),
(14, 'Maxtige', 'password', 1);

-- --------------------------------------------------------

--
-- Structure de la table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` tinyint(4) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `stock` smallint(6) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `nombre` varchar(32) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `ammo` varchar(16) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `descripcion`, `stock`, `precio`, `nombre`, `img`, `ammo`, `code`) VALUES
(1, 1, 'Fully automatic, all-purpose battle rifle. Control your shots and this weapon can be very effective at range.', 124, 1900, 'M4A1', 'm4a1.png', '5.56 NATO', '7567680777'),
(2, 1, 'Large caliber, fully automatic assault rifle that provides high damage over long ranges.', 82, 3600, 'FN Scar 17', 'scarh.png', '7.62 NATO', '4151498572'),
(3, 1, 'Very reliable automatic assault rifle chambered in 7.62mm Soviet. Large caliber ammunition requires skill to control recoil.', 96, 2800, 'AK-47', 'ak47.png', '7.62 Soviet', '7674998851'),
(4, 1, 'Fully automatic. Increased damage with an improved design for less recoil.', 47, 1100, 'AK-12', 'ak12.png', '5.45', '1970551628'),
(5, 1, 'This modular 5.56 weapon platform is lightweight and maneuverable, with exceptional range. Precision engineering and world class aftermarket barrels give this weapon extreme potential.', 160, 1750, 'Grau 5.56', 'grau.png', '5.56 NATO', '8671233837'),
(6, 2, 'A modular fully automatic weapon configured for mobility and close range combat.', 78, 2200, 'AUG', 'aug.png', '9mm Parabellum', '8875872139'),
(7, 2, 'Automatic bullpup submachine gun. A unique top mounted magazine hold carries ample high velocity 5.7 x 28mm ammunition.', 46, 1800, 'P90', 'p90.png', 'FN 5.7x28mm', '6870011092'),
(8, 2, 'Fully automatic 9mm submachine gun. A perfect balance of stability, mobility, and lethality.', 46, 1870, 'MP5', 'mp5.png', '9mm Parabellum', '2674818500'),
(9, 2, 'Fully automatic open bolt submachine gun. Simple, steady, effective.', 236, 1100, 'Uzi', 'uzi.png', '9mm Parabellum', '3678252596'),
(10, 2, 'Compact by design, this fully automatic weapon has a high rate of fire and low recoil.', 207, 1700, 'MP7', 'mp7.png', '4.6x30mm', '1062190455'),
(11, 3, 'Break action shotgun with 2 round capacity. A long back-bored barrel and cylindrical choke keeps spread tight and lethal over extended ranges.', 145, 1500, '725', '725.png', '12 Gauge', '4071218124'),
(12, 3, 'Double barrels provide two rapid shots before each re-chamber.', 95, 2650, 'R9', 'r9.png', '12 Gauge', '4429313010'),
(13, 3, 'Reliable, well-rounded 12 gauge pump-action shotgun.', 47, 1360, 'Model 680', 'model680.png', '12 Gauge', '9251838745'),
(14, 3, 'Semi-automatic shotgun with large ammo capacity allows for continuous firing. Effective at close range.', 56, 1980, 'Origin 12', 'origin12.png', '12 Gauge', '7338560963'),
(15, 3, 'Fully automatic open bolt shotgun with a recoil reducing gas blowback system. This combat shotgun unloads high volumes of lead down range at a steady rate.', 78, 1750, 'JAK-12', 'jak12.png', '12 Gauge', '3974512428'),
(16, 4, 'Fully automatic light machine gun firing 7.62mm ammunition for high damage at a moderate fire rate.', 21, 5000, 'PKM', 'pkm.png', '7.62 NATO', '6974838193'),
(17, 4, 'Robust light machine gun sacrifices mobility for stability. High caliber sustained fire will neutralize targets at long ranges.', 34, 3500, 'M91', 'm91.png', '7.62 NATO', '8664586338'),
(18, 4, 'Fully automatic weapon with a high rate of fire and punishing 7.92 Mauser ammunition. Salvaged WW2 machine guns are still reliable and deadly on the battlefield.', 25, 4200, 'MG34', 'mg34.png', '7.92 Mauser', '8730814121'),
(19, 4, 'This air-cooled open bolt 5.56 light machine gun features a competitive rate of fire and excellent stability that will dominate the mid to long range battlefield.', 42, 4550, 'Bruen MK9', 'bruen.png', '5.56 NATO', '2703357732'),
(20, 4, 'Fully automatic bullpup light machine gun. Lower rate of fire and 5.56mm ammunition keeps this rifle stable and effective at long ranges.', 65, 2140, 'SA87', 'sa87.png', '5.56 NATO', '1128284268'),
(21, 5, 'Bolt action rifle chambered in 7.92 Mauser. A WW2 relic that is still extremely lethal in the hands of a rebel marksman.', 120, 1900, 'Kar98k', 'kar98k.png', '7.92 Mauser', '6196254967'),
(22, 5, 'Anti-material bolt action sniper rifle chambered in 12.7x108mm ammunition. 745 gr bullets have a lower muzzle velocity, but are devastating at very long ranges.', 102, 3000, 'HDR', 'hdr.png', '.338 Lapua', '3512596059'),
(23, 5, 'Hard hitting, bolt action sniper rifle with .50 cal BMG ammunition. Its tungsten sabot tipped bullets are fast and powerful, but require precise shots over long distances.', 84, 2500, 'AX-50', 'ax50.png', '.50 BMG', '6890166859'),
(24, 5, 'A soviet workhorse chambered in 7.62mm x 54mmR. This gas-operated semi-automatic sniper rifle allows for rapid followup shots.', 48, 1950, 'Dragunov', 'dragunov.png', '7.62 NATO', '3623588104'),
(25, 5, 'This semi-automatic Anti-Material Rifle is chambered in .50 BMG for dominant long range assaults', 24, 4500, 'Rytec AMR', 'rytec.png', '.50 BMG', '4208652704'),
(26, 6, 'Semi-automatic pistol chambered in 9mm ammunition. A reliable fall back when you find yourself in close quarters.', 163, 870, 'Glock 17', 'glock17.png', '9mm Parabellum', '4623372611'),
(27, 6, 'A well-rounded semi-automatic side arm with a moderate rate of fire. Slightly more range than your average .45 ACP pistol.', 96, 980, '1911', '1911.png', '.45 ACP', '8678796078'),
(28, 6, 'Semi-automatic 9mm pistol, excellent stability with a rapid cycle rate.', 87, 990, 'M19', 'm19.png', '9mm Parabellum', '3223860548'),
(29, 6, 'The most powerful semi-automatic handgun available, deals heavy damage up to intermediate ranges.', 49, 1500, 'Desert Eagle', 'deagle.png', '.50 Pistol', '4568459319'),
(30, 6, 'Double action revolver firing .357 Magnum ammunition for powerful damage over extended ranges.', 63, 1800, '.357', '357.png', '.357 Magnum', '3253913040'),
(31, 7, 'CQC tactical knife. Standard military issue, employed for fast, quiet, and deadly wetwork.', 154, 210, 'Combat Knife', 'knife.png', NULL, '7290061389'),
(32, 7, 'Hand forged carbon steel blades provide the sharpest edge possible for silently slicing through your enemies.', 19, 500, 'Sword', 'sword.png', NULL, '9189930473'),
(33, 7, 'America\'s West African arms trade isn\'t just about giving. Rediscover the simple life with this rusty cleaver.', 69, 320, 'Machete', 'machete.png', NULL, '5312120398'),
(34, 7, 'Make kindling... of your pals with this easy to wield, easy to hide hatchet.', 45, 150, 'Hatchet', 'hatchet.png', NULL, '6580920334'),
(35, 7, 'Aluminum baseball bat with leather grip. Lightweight yet powerful for all you big hitters out there.', 156, 230, 'Baseball Bat', 'baseball.png', NULL, '7176424919'),
(36, 8, 'Directional anti-personnel mine that triggers a proximity-based explosion', 325, 300, 'Claymore', 'claymore.png', NULL, '9376667165'),
(37, 8, 'Produces lethal radius damage upon detonation.', 750, 350, 'Frag grenade', 'frag.png', '', '4256093709'),
(38, 8, 'High explosive charge that sticks to any surface. Deadly when stuck to vehicles.', 367, 500, 'C4', 'c4.png', NULL, '9729137805'),
(39, 8, 'A grenade that blinds and deafens its victims for several seconds', 632, 250, 'Flashbang', 'flash.png', NULL, '2394818699'),
(40, 9, 'The 5.56×45mm NATO  is a rimless bottlenecked intermediate cartridge family developed in the late 1970s in Belgium.', 1560, 25, '5.56 NATO', 'ammo.png', NULL, '7629433821'),
(41, 9, 'The 9×19mm Parabellum (also known as 9mm Parabellum or 9mm Luger) is a rimless, tapered firearms cartridge. ', 3651, 20, '9mm Parabellum', 'ammo.png', NULL, '1962187738'),
(42, 9, 'The 7.62×39mm (aka 7.62 Soviet formerly .30 Russian Short)[5] round is a rimless bottlenecked intermediate cartridge of Soviet origin.', 2540, 35, '7.62 Soviet', 'ammo.png', NULL, '9077124863'),
(43, 9, 'The 5.45×39mm cartridge is a rimless bottlenecked intermediate cartridge. It was introduced into service in 1974 by the Soviet Union for use with the new AK-74.', 2470, 25, '5.45', 'ammo.png', NULL, '9253127221'),
(44, 9, 'The .50 Action Express (AE, 12.7×33mmRB) is a large-caliber handgun cartridge, best known for its usage in the Desert Eagle.', 1450, 65, '.50 Pistol', 'ammo.png', NULL, '7476165514'),
(45, 9, 'The .45 ACP (Automatic Colt Pistol) or .45 Auto (11.43×23mm)[1] is a rimless straight-walled handgun cartridge designed by John Moses Browning in 1904, for use in his prototype Colt semi-automatic pistol.', 2365, 40, '.45 ACP', 'ammo.png', NULL, '1715993743'),
(46, 9, 'The .338 Lapua Magnum (8.6×70mm or 8.58×70mm) is a rimless, bottlenecked, centerfire rifle cartridge.', 965, 90, '.338 Lapua', 'ammo.png', NULL, '9255112533'),
(47, 9, 'The 7.62×51mm NATO (official NATO nomenclature 7.62 NATO) is a rimless, bottlenecked rifle cartridge. It is a standard for small arms among NATO countries. ', 3210, 70, '7.62 NATO', 'ammo.png', NULL, '1934624453'),
(48, 9, 'The 7.92×57mm Mauser (designated as the 8mm Mauser or 8×57mm by the SAAMI[2] and 8 × 57 IS by the C.I.P.[3]) is a rimless bottlenecked rifle cartridge. ', 2056, 56, '7.92 Mauser', 'ammo.png', NULL, '7144578581'),
(49, 9, 'The .50 Browning Machine Gun is a .50 caliber cartridge developed for the M2 Browning machine gun in the late 1910s.', 325, 80, '.50 BMG', 'ammo.png', NULL, '3109495361'),
(50, 9, 'The FN 5.7×28mm is a small-caliber, high-velocity, smokeless powder, rebated rim, bottlenecked centerfire cartridge designed for handgun and personal defense weapon.', 1250, 45, 'FN 5.7x28mm', 'ammo.png', NULL, '4172818536'),
(51, 9, 'The 4.6×30mm cartridge is a small-caliber, high-velocity, smokeless powder, rebated rim, bottlenecked centerfire cartridge designed for personal defense weapons.', 2410, 35, '4.6x30mm', 'ammo.png', NULL, '7609869885'),
(52, 9, 'The .357 Smith & Wesson Magnum, .357 S&W Magnum, .357 Magnum, or 9×33mmR as it is known in unofficial metric designation, is a smokeless powder cartridge with a .357-inch (9.07 mm) bullet diameter.', 1245, 55, '.357 Magnum', 'ammo.png', NULL, '6044643143'),
(53, 9, 'The 12 Gauge is the most popular shotgun shell.', 3654, 30, '12 Gauge', 'ammo.png', '', '1524094646');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dni`);

--
-- Index pour la table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `dni_cliente` (`dni_cliente`);

--
-- Index pour la table `detalles_compra`
--
ALTER TABLE `detalles_compra`
  ADD PRIMARY KEY (`id_compra`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Index pour la table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`dni_cliente`) REFERENCES `clientes` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detalles_compra`
--
ALTER TABLE `detalles_compra`
  ADD CONSTRAINT `detalles_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_compra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
