-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 27, 2020 alle 14:09
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoices`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoiceDate` date NOT NULL,
  `invoiceNumber` int(11) NOT NULL,
  `clientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `invoice`
--

INSERT INTO `invoice` (`id`, `invoiceDate`, `invoiceNumber`, `clientId`) VALUES
(94, '2020-09-27', 1, 44),
(96, '2020-09-27', 3, 55);

-- --------------------------------------------------------

--
-- Struttura della tabella `invoice_rows`
--

CREATE TABLE `invoice_rows` (
  `id` int(11) NOT NULL,
  `InvoiceId` int(11) NOT NULL,
  `Description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `VAT` decimal(4,2) NOT NULL,
  `TotalWithVAT` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `invoice_rows`
--

INSERT INTO `invoice_rows` (`id`, `InvoiceId`, `Description`, `Quantity`, `Amount`, `VAT`, `TotalWithVAT`) VALUES
(21, 94, 'Try', 4, '30.99', '8.00', '38.99'),
(22, 96, 'New try', 5, '36.99', '9.00', '46.99');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `invoice_rows`
--
ALTER TABLE `invoice_rows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_84E96C4BF8A5EF2` (`InvoiceId`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT per la tabella `invoice_rows`
--
ALTER TABLE `invoice_rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `invoice_rows`
--
ALTER TABLE `invoice_rows`
  ADD CONSTRAINT `invoice_rows_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `invoice` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
