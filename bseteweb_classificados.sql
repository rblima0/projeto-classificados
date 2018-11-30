-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2018 às 17:47
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bseteweb_classificados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `descricao` text CHARACTER SET utf8,
  `valor` float DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuario`, `id_categoria`, `titulo`, `descricao`, `valor`, `estado`) VALUES
(1, 1, 1, 'Samsung Galaxy S7 Edge', 'O Samsung Galaxy S7 Edge Ã© um smartphone Android avanÃ§ado e abrangente em todos os pontos de vista com algumas caracterÃ­sticas excelentes. Tem uma grande tela de 5.1 polegadas com uma resoluÃ§Ã£o de 2560x1440 pixels.', 1899, 0),
(2, 1, 1, 'Azus Zenfone Z5', 'Nova linha de modelos da Asus trouxe o modelo Z5 com muitas mudanÃ§as, melhor escolha intermediÃ¡ria.', 600, 1),
(4, 1, 4, 'Camiseta Element', 'Camiseta vÃ¡rias cores da marca Element.', 70, 0),
(5, 1, 4, 'Camiseta Hering', 'Camiseta da nova linha Outono / Inverno da Hering.', 120, 0),
(9, 2, 2, 'Maquiagem Luis Ylton', 'Com seis tons de sombra com acabamento mattes e cintilantes, a Pallete Mix de Una traz combinaÃ§Ãµes exclusivas que se adequam a todos os tons de pele e a qualquer ocasiÃ£o. SÃ£o diferentes opÃ§Ãµes para que toda mulher possa encontrar as combinaÃ§Ãµes que melhor realÃ§am seu olhar.', 69, 0),
(10, 2, 2, 'Shampo Douve', 'Shampo Dove para cabelos masculinos anti caspa.', 14, 0),
(12, 1, 3, 'adasdas', 'adsadasdasda', 50, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios_imagens`
--

CREATE TABLE `anuncios_imagens` (
  `id` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anuncios_imagens`
--

INSERT INTO `anuncios_imagens` (`id`, `id_anuncio`, `url`) VALUES
(10, 1, '14cd584dccaaeaeab1a08f38772b8378jpg'),
(11, 1, 'f981986ac2f053e98cac5ab5877ae576jpg'),
(6, 4, 'b0d0fa6e321272e41826e16f34b8dc44jpg'),
(7, 5, '3aa3159ac2e809229521d757853207c1jpg'),
(8, 2, '36e16e5e1e0de5508bf5ec8e31493da4jpg'),
(12, 1, 'a56bbcdff9f07a3dd103f1df496f5b6ejpg'),
(13, 9, 'c62b13d8faeb75e5ecd1c85d529fcc3djpg'),
(14, 9, 'afb9fdea11be5ce210880c6342669d28jpg'),
(15, 10, 'f08fa48d37803302a6aae8815c0d1941jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Tecnologia'),
(2, 'Beleza'),
(3, 'Livros'),
(4, 'Roupas'),
(5, 'Veículos'),
(6, 'Imóveis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(32) CHARACTER SET utf8 NOT NULL,
  `telefone` varchar(30) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Rodrigo', 'rblima0@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '11998855886'),
(2, 'Kathy', 'kathy@gmail.com', '5583413443164b56500def9a533c7c70', '11998979694'),
(3, 'Ana', 'ana@gmail.com', 'c33367701511b4f6020ec61ded352059', '11995969695'),
(4, 'aninha', 'aninha@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0', '11996929192');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
