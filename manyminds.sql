
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Banco de dados: `manyminds`
--
CREATE DATABASE IF NOT EXISTS `manyminds` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `manyminds`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `city`
--

CREATE TABLE `city` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_state` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `city`:
--   `id_state`
--       `state` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `groups`:
--

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `process` varchar(100) NOT NULL,
  `old_data` text DEFAULT NULL,
  `new_data` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `log`:
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `login_attempts`:
--

--
-- Extraindo dados da tabela `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(10, '::1', 'cynthia@tete.com', 1726572771),
(11, '::1', 'cynthia@tete.com', 1726572776),
(12, '::1', 'cynthia@tete.com', 1726572781);

-- --------------------------------------------------------

--
-- Estrutura da tabela `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_status_order` int(10) UNSIGNED NOT NULL,
  `obs` text DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `order`:
--   `created_by`
--       `users` -> `id`
--   `id_status_order`
--       `order_status` -> `id`
--   `id_user`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_item`
--

CREATE TABLE `order_item` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `order_item`:
--   `id_product`
--       `product` -> `id`
--   `id_order`
--       `order` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_status`
--

CREATE TABLE `order_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `order_status`:
--

--
-- Extraindo dados da tabela `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'ATIVO'),
(2, 'FINALIZADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `product`:
--   `created_by`
--       `users` -> `id`
--

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `name`, `active`, `price`, `stock`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Teste1', 0, 10, 1, 1, '2024-09-17 16:17:31', '2024-09-17 16:24:26', NULL),
(2, 'Notebook', 1, 1000, 2, 1, '2024-09-17 16:33:26', '2024-09-17 16:46:48', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `state`
--

CREATE TABLE `state` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `abbr` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `state`:
--

--
-- Extraindo dados da tabela `state`
--

INSERT INTO `state` (`id`, `name`, `abbr`) VALUES
(1, 'Acre', 'AC'),
(2, 'Alagoas', 'AL'),
(3, 'Amapá', 'AP'),
(4, 'Amazonas', 'AM'),
(5, 'Bahia', 'BA'),
(6, 'Ceará', 'CE'),
(7, 'Distrito Federal', 'DF'),
(8, 'Espírito Santo', 'ES'),
(9, 'Goiás', 'GO'),
(10, 'Maranhão', 'MA'),
(11, 'Mato Grosso', 'MT'),
(12, 'Mato Grosso do Sul', 'MS'),
(13, 'Minas Gerais', 'MG'),
(14, 'Pará', 'PA'),
(15, 'Paraíba', 'PB'),
(16, 'Paraná', 'PR'),
(17, 'Pernambuco', 'PE'),
(18, 'Piauí', 'PI'),
(19, 'Rio de Janeiro', 'RJ'),
(20, 'Rio Grande do Norte', 'RN'),
(21, 'Rio Grande do Sul', 'RS'),
(22, 'Rondônia', 'RO'),
(23, 'Roraima', 'RR'),
(24, 'Santa Catarina', 'SC'),
(25, 'São Paulo', 'SP'),
(26, 'Sergipe', 'SE'),
(27, 'Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `users`:
--

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `last_updated`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$32a80/UvUd7qVWFeTKtC8O0dTLstW4NqIJjHgN1pciAjijxF9dCF2', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1726593902, 1, 'Admin', 'Admin', 'ADMIN', '0', '2024-09-17 17:25:02'),
(2, '::1', 'augusto', '$2y$10$/9paiifguoWUPX1X/v9OuO.U1oIOTG0S7b46irqfKtWhuuTE7qMpW', 'augustoksantana@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1726532556, NULL, 1, 'Augusto Kleber Torres', 'Santana', NULL, NULL, '2024-09-17 00:45:18'),
(3, '::1', 'Teste', '$2y$10$1vsSbvtZVL.762kvaAgNL.gipAGQmt2tR8yc65STFMPsHBhL4WCHK', 'teste@teste.com.br', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1726532811, NULL, 0, 'Teste', 'Teste', NULL, NULL, '2024-09-17 14:01:07'),
(4, '::1', 'teste3', '$2y$10$VuS1qnedD3.peqXB2yySWeMpz5cc6jJHVLlAIpZUffIO0ErM2TV9u', 'teste3@teste.com.br', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1726533239, NULL, 1, 'teste3', 'teste3', NULL, NULL, '2024-09-17 00:34:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `users_groups`:
--   `group_id`
--       `groups` -> `id`
--   `user_id`
--       `users` -> `id`
--

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(13, 1, 1),
(12, 1, 2),
(17, 2, 1),
(18, 3, 2),
(19, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_address`
--

CREATE TABLE `user_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `is_default` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `zipcode` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `complement` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `user_address`:
--   `id_user`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `zipcode`
--

CREATE TABLE `zipcode` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_city` int(11) UNSIGNED NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `street` varchar(200) DEFAULT NULL,
  `complement` varchar(200) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `zipcode`:
--   `id_city`
--       `city` -> `id`
--

--
-- Índices para tabelas
--

--
-- Índices para tabela `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_city_name` (`name`,`id_state`) USING BTREE,
  ADD KEY `idx_id_state` (`id_state`),
  ADD KEY `idx_name` (`name`),
  ADD KEY `idx_code` (`code`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_process` (`process`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_id_user` (`id_user`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_id_user` (`id_user`),
  ADD KEY `idx_created_by` (`created_by`),
  ADD KEY `idx_id_status` (`id_status_order`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_deleted_at` (`deleted_at`);

--
-- Índices para tabela `order_item`
--
ALTER TABLE `order_item`
  ADD UNIQUE KEY `uq_order_irem` (`id_order`,`id_product`),
  ADD KEY `idx_orderitem_product` (`id_product`);

--
-- Índices para tabela `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name` (`name`);

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name` (`name`),
  ADD KEY `idx_active` (`active`),
  ADD KEY `idx_price` (`price`),
  ADD KEY `idx_stock` (`stock`),
  ADD KEY `idx_created_by` (`created_by`),
  ADD KEY `idx_deleted_at` (`deleted_at`);

--
-- Índices para tabela `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name` (`name`),
  ADD KEY `idx_abbr` (`abbr`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Índices para tabela `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_id_user` (`id_user`),
  ADD KEY `idx_zipcode` (`zipcode`),
  ADD KEY `idx_deleted_at` (`deleted_at`);

--
-- Índices para tabela `zipcode`
--
ALTER TABLE `zipcode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_zipcode` (`zipcode`),
  ADD KEY `idx_street` (`street`),
  ADD KEY `idx_district` (`district`),
  ADD KEY `idx_id_city` (`id_city`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `zipcode`
--
ALTER TABLE `zipcode`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;


--
-- Limitadores para a tabela `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_id_city_state` FOREIGN KEY (`id_state`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_status` FOREIGN KEY (`id_status_order`) REFERENCES `order_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_orderitem_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orderitem_user` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `fk_user_address_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `zipcode`
--
ALTER TABLE `zipcode`
  ADD CONSTRAINT `fk_zipcode_id_city` FOREIGN KEY (`id_city`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;


