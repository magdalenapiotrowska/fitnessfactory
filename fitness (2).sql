-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Kwi 2018, 22:26
-- Wersja serwera: 10.1.29-MariaDB
-- Wersja PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `fitness`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id` int(11) NOT NULL,
  `produkt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produkt_nazwa` varchar(255) NOT NULL,
  `produkt_image` mediumtext NOT NULL,
  `ilosc` int(11) NOT NULL,
  `cena` float NOT NULL,
  `suma_zamowienia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`id`, `produkt_id`, `user_id`, `produkt_nazwa`, `produkt_image`, `ilosc`, `cena`, `suma_zamowienia`) VALUES
(10, 2, 11, 'Wejsciowka 10-ciodniowa', 'wejsciowka10wejsc.jpg', 1, 150, 150),
(12, 1, 12, 'Wejsciowka jednorazowa', 'one.png', 1, 19, 19),
(13, 2, 12, 'Wejsciowka 10-ciodniowa', 'wejsciowka10wejsc.jpg', 1, 150, 150),
(14, 3, 12, 'Karnet miesieczny', 'calendar.png', 1, 200, 200),
(23, 3, 11, 'Karnet miesieczny', 'calendar.png', 1, 200, 200),
(24, 1, 11, 'Wejsciowka jednorazowa', 'one.png', 1, 19, 19),
(25, 1, 15, 'Wejsciowka jednorazowa', 'one.png', 1, 19, 19),
(28, 3, 15, 'Karnet miesieczny', 'calendar.png', 1, 200, 200);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `produkt_id` int(10) NOT NULL,
  `produkt_nazwa` text NOT NULL,
  `produkt_cena` float NOT NULL,
  `produkt_image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`produkt_id`, `produkt_nazwa`, `produkt_cena`, `produkt_image`) VALUES
(1, 'Wejsciowka jednorazowa', 19, 'roczny.png'),
(2, 'Wejsciowka 10-ciodniowa', 150, 'wejsciowka10wejsc.jpg'),
(3, 'Karnet miesieczny', 200, 'roczny.png'),
(4, 'Karnet roczny', 800, 'roczny.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `drewno` int(11) NOT NULL,
  `kamien` int(11) NOT NULL,
  `zboze` int(11) NOT NULL,
  `dnipremium` int(11) NOT NULL,
  `uprawnienia` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `drewno`, `kamien`, `zboze`, `dnipremium`, `uprawnienia`) VALUES
(11, 'magda123', '$2y$10$HlQP7FbC1FVKn7/JIq41eeIkphjzkhm7TjTb9G123auytGh76n6Zi', 'magdalenapiotrowska07@gmail.com', 100, 100, 100, 14, 0),
(27, 'admin', '$2y$10$6xhgwPeEUQXWDKqrEciSEuPO/WEJEx2hqIyoXRyFq2u1V.yCx75ry', 'admin1@gmail.com', 100, 100, 100, 14, 1),
(29, 'emil', '$2y$10$JBqjbepww3wbgvadcNxZneRxLWtxvVsBWECLnf77RO2lf3Q9Gwje.', 'emil@gmail.com', 100, 100, 100, 14, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia`
--

CREATE TABLE `zajecia` (
  `zajecia_id` int(11) NOT NULL,
  `zajecia_nazwa` text NOT NULL,
  `zajecia_czas` date NOT NULL,
  `zajecia_godzina` varchar(255) NOT NULL,
  `czas_trwania` varchar(255) NOT NULL,
  `trener_nazwa` text NOT NULL,
  `NrSali` int(11) NOT NULL,
  `wolneMiejsca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zajecia`
--

INSERT INTO `zajecia` (`zajecia_id`, `zajecia_nazwa`, `zajecia_czas`, `zajecia_godzina`, `czas_trwania`, `trener_nazwa`, `NrSali`, `wolneMiejsca`) VALUES
(3, 'Zdrowy kręgosłup', '2018-02-13', '9:00 - 9:45', '45min', 'Adam Kowalski', 1, 0),
(4, 'samba', '2018-02-21', '', '60', 'Zosia Kowalska', 2, 0),
(5, 'Fit body workout', '2018-02-13', '10:00 - 11:30', '1,5h', 'Kamil Kowalski', 3, 0),
(7, 'Zumba', '2018-02-13', '17:30 - 18:30', '1h', 'Magdalena Zubwa', 4, 0),
(8, 'Yoga', '2018-02-13', '19:30 - 20:30', '1h', 'Oliwia Szałek', 3, 0),
(9, 'Płaski brzuch', '2018-02-13', '17:30 - 19:00', '1,5h', 'Grzegorz Kowalski', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia_zapisy`
--

CREATE TABLE `zajecia_zapisy` (
  `zajecia_zapisy_id` int(11) NOT NULL,
  `zajecia_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `imie` mediumtext NOT NULL,
  `nazwisko` mediumtext NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `email` mediumtext NOT NULL,
  `numerKarnetu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zajecia_zapisy`
--

INSERT INTO `zajecia_zapisy` (`zajecia_zapisy_id`, `zajecia_id`, `user_id`, `imie`, `nazwisko`, `telefon`, `email`, `numerKarnetu`) VALUES
(1, 0, 0, '', '', '', '', 0),
(2, 0, 0, '', '', '', '', 0),
(3, 0, 0, '', 'werfwe', '', 'rwerwe', 0),
(4, 0, 0, '', '', '', '', 0),
(5, 0, 0, 'adfds', 'fwrfe', '234235', 'magdalenapiotrowska07@gmail.com', 345),
(6, 0, 0, 'magdalena', 'Piotrowska', '505504089', 'magdalenapiotrowska07@gmail.com', 231),
(7, 0, 0, 'ELO', 'MELO', '123423', 'magdalenapiotrowska07@gmail.com', 12342),
(8, 0, 0, 'asaaa', 'wwe', '245435', 'elo2@gmail.com', 356546),
(9, 0, 0, 'eloszka', 'meloszka', '29920', 'maadziaaa.17@gmail.com', 76),
(10, 0, 0, 'waefncmsdm', 'askldmsa', '34242', 'elo2@gmail.com', 213),
(11, 0, 0, '<script>alert(â€˜HA!â€™);</script>', '<script>alert(â€˜HA!â€™);</script>', '501431376', 'magdalenapiotrowska07@gmail.com', 343),
(12, 0, 0, 'asdas', '234', '23423', 'nhgfhf@gmail.com', 32),
(13, 0, 0, 'adas', 'sad', '2343', 'magdalenapiotrowska07@gmail.com', 123),
(14, 0, 0, 'sgfrg', 'sfgdgdf', '12312', 'magdalenapiotrowska07@gmail.com', 123);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `zamowienie_id` int(11) NOT NULL,
  `data_zamowienia` date NOT NULL,
  `status_zamowienia` varchar(50) NOT NULL,
  `uzytkownik_id` int(100) NOT NULL,
  `platnosc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`zamowienie_id`, `data_zamowienia`, `status_zamowienia`, `uzytkownik_id`, `platnosc`) VALUES
(52, '2018-02-08', 'pending', 11, ''),
(53, '2018-02-08', 'pending', 11, ''),
(54, '2018-02-08', 'pending', 11, ''),
(55, '2018-02-08', 'pending', 11, ''),
(56, '2018-02-08', 'pending', 11, ''),
(57, '2018-02-08', 'pending', 11, ''),
(58, '2018-02-08', 'pending', 11, ''),
(59, '2018-02-08', 'pending', 11, ''),
(60, '2018-02-08', 'pending', 11, ''),
(61, '2018-02-08', 'pending', 11, ''),
(62, '2018-02-08', 'pending', 11, ''),
(63, '2018-02-08', 'pending', 11, ''),
(64, '2018-02-08', 'pending', 11, ''),
(65, '2018-02-08', 'pending', 11, ''),
(66, '2018-02-08', 'pending', 11, ''),
(67, '2018-02-08', 'pending', 11, ''),
(68, '2018-02-08', 'pending', 11, ''),
(69, '2018-02-08', 'pending', 11, ''),
(70, '2018-02-08', 'pending', 11, ''),
(71, '2018-02-08', 'pending', 11, 'no'),
(72, '2018-02-08', 'pending', 11, 'yes'),
(73, '2018-02-08', 'pending', 11, 'yes'),
(74, '2018-02-08', 'pending', 11, 'no'),
(75, '2018-02-08', 'pending', 11, 'Przelew bankowy'),
(76, '2018-02-08', 'pending', 11, 'Gotówka - płatność przy odbiorze'),
(77, '2018-02-08', 'pending', 11, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(78, '2018-02-09', 'pending', 11, 'Przelew bankowy'),
(79, '2018-02-09', 'pending', 11, 'Przelew bankowy'),
(80, '2018-02-09', 'pending', 11, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(81, '2018-02-09', 'pending', 11, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(82, '2018-02-09', 'pending', 11, ''),
(83, '2018-02-09', 'pending', 11, 'Przelew bankowy'),
(84, '2018-02-09', 'pending', 11, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(85, '2018-02-09', 'pending', 11, 'Przelew bankowy'),
(86, '2018-02-12', 'pending', 11, 'Przelew bankowy'),
(87, '2018-02-16', 'pending', 11, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(88, '2018-02-21', 'pending', 11, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(89, '2018-02-21', 'pending', 11, 'Przelew bankowy'),
(90, '2018-02-26', 'pending', 11, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(91, '2018-02-26', 'pending', 11, 'Przelew bankowy'),
(92, '2018-02-27', 'pending', 11, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(93, '2018-02-27', 'pending', 11, 'Przelew bankowy'),
(94, '2018-02-27', 'pending', 11, 'Przelew bankowy'),
(95, '2018-02-27', 'w toku', 0, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(96, '2018-02-27', 'w toku', 17, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(97, '2018-03-30', 'w toku', 11, 'Przelew bankowy'),
(98, '2018-04-10', 'w toku', 11, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(99, '2018-04-11', 'w toku', 19, 'Przelew bankowy'),
(100, '2018-04-11', 'w toku', 19, 'Przelew bankowy'),
(101, '2018-04-11', 'w toku', 19, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(102, '2018-04-14', 'w toku', 19, 'Przelew bankowy'),
(103, '2018-04-16', 'w toku', 19, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(104, '2018-04-16', 'w toku', 19, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(105, '2018-04-19', 'w toku', 0, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(106, '2018-04-19', 'w toku', 0, ''),
(107, '2018-04-19', 'w toku', 0, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(108, '2018-04-19', 'w toku', 0, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(109, '2018-04-19', 'w toku', 0, 'Przelew bankowy'),
(110, '2018-04-19', 'w toku', 0, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(111, '2018-04-19', 'w toku', 0, 'Przelew bankowy'),
(112, '2018-04-19', 'w toku', 0, 'GotÃ³wka - pÅ‚atnoÅ›Ä‡ przy odbiorze'),
(113, '2018-04-22', 'w toku', 0, 'Przelew bankowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia_szczegoly`
--

CREATE TABLE `zamowienia_szczegoly` (
  `id` int(11) NOT NULL,
  `zamowienie_id` int(11) NOT NULL,
  `produkt_nazwa` varchar(255) NOT NULL,
  `produkt_cena` double NOT NULL,
  `produkt_ilosc` int(11) NOT NULL,
  `suma_zamowienia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zamowienia_szczegoly`
--

INSERT INTO `zamowienia_szczegoly` (`id`, `zamowienie_id`, `produkt_nazwa`, `produkt_cena`, `produkt_ilosc`, `suma_zamowienia`) VALUES
(1, 9, 'Wejsciowka 10-ciodniowa', 150, 2, ''),
(2, 9, 'Wejsciowka jednorazowa', 19, 1, ''),
(3, 9, 'Karnet miesieczny', 200, 1, ''),
(4, 10, 'Wejsciowka jednorazowa', 19, 1, ''),
(5, 10, 'Karnet miesieczny', 200, 1, ''),
(6, 10, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(7, 11, 'Wejsciowka jednorazowa', 19, 1, ''),
(8, 11, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(9, 12, 'Wejsciowka jednorazowa', 19, 1, ''),
(10, 13, 'Wejsciowka jednorazowa', 19, 1, ''),
(11, 13, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(12, 13, 'Karnet miesieczny', 200, 1, ''),
(13, 14, 'Wejsciowka jednorazowa', 19, 4, ''),
(14, 14, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(15, 14, 'Karnet miesieczny', 200, 1, ''),
(16, 15, 'Wejsciowka jednorazowa', 19, 1, ''),
(17, 15, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(18, 16, 'Wejsciowka jednorazowa', 19, 1, ''),
(19, 17, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(20, 17, 'Karnet miesieczny', 200, 1, ''),
(21, 17, 'Wejsciowka jednorazowa', 19, 1, ''),
(22, 18, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(23, 18, 'Karnet miesieczny', 200, 1, ''),
(24, 18, 'Wejsciowka jednorazowa', 19, 1, ''),
(25, 19, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(26, 19, 'Wejsciowka jednorazowa', 19, 1, ''),
(27, 19, 'Karnet roczny', 400, 1, ''),
(28, 20, 'Karnet miesieczny', 200, 1, ''),
(29, 20, 'Karnet roczny', 400, 1, ''),
(30, 21, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(31, 21, 'Karnet miesieczny', 200, 1, ''),
(32, 22, 'Wejsciowka jednorazowa', 19, 1, ''),
(33, 22, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(34, 22, 'Karnet miesieczny', 200, 1, ''),
(35, 23, 'Wejsciowka jednorazowa', 19, 1, ''),
(36, 23, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(37, 23, 'Karnet miesieczny', 200, 1, ''),
(38, 24, 'Wejsciowka jednorazowa', 19, 1, ''),
(39, 24, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(40, 24, 'Karnet miesieczny', 200, 1, ''),
(41, 25, 'Karnet roczny', 400, 2, ''),
(42, 25, 'Karnet miesieczny', 200, 1, ''),
(43, 25, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(44, 26, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(45, 26, 'Karnet miesieczny', 200, 1, ''),
(46, 27, 'Karnet roczny', 800, 1, ''),
(47, 27, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(48, 27, 'Wejsciowka jednorazowa', 19, 1, ''),
(49, 28, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(50, 28, 'Karnet miesieczny', 200, 2, ''),
(51, 29, 'Wejsciowka jednorazowa', 19, 1, ''),
(52, 29, 'Wejsciowka 10-ciodniowa', 150, 2, ''),
(53, 30, 'Karnet miesieczny', 200, 2, ''),
(54, 30, 'Karnet roczny', 800, 1, ''),
(55, 30, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(56, 30, 'Wejsciowka jednorazowa', 19, 1, ''),
(57, 31, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(58, 31, 'Karnet miesieczny', 200, 1, ''),
(59, 32, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(60, 33, 'Wejsciowka jednorazowa', 19, 1, ''),
(61, 33, 'Karnet miesieczny', 200, 1, ''),
(62, 34, 'Karnet miesieczny', 200, 1, ''),
(63, 35, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(64, 36, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(65, 36, 'Karnet miesieczny', 200, 1, ''),
(66, 37, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(67, 37, 'Karnet miesieczny', 200, 1, ''),
(68, 38, 'Karnet miesieczny', 200, 1, ''),
(69, 39, 'Karnet miesieczny', 200, 1, ''),
(70, 40, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(71, 40, 'Karnet miesieczny', 200, 1, ''),
(72, 41, 'Karnet miesieczny', 200, 1, ''),
(73, 42, 'Wejsciowka jednorazowa', 19, 1, ''),
(74, 43, 'Karnet miesieczny', 200, 1, ''),
(75, 43, 'Karnet roczny', 800, 1, ''),
(76, 44, 'Wejsciowka 10-ciodniowa', 150, 2, ''),
(77, 44, 'Karnet miesieczny', 200, 1, ''),
(78, 45, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(79, 45, 'Karnet miesieczny', 200, 1, ''),
(80, 46, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(81, 46, 'Karnet miesieczny', 200, 1, ''),
(82, 47, 'Karnet miesieczny', 200, 1, ''),
(83, 47, 'Karnet roczny', 800, 1, ''),
(84, 48, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(85, 48, 'Karnet miesieczny', 200, 1, ''),
(86, 49, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(87, 49, 'Karnet miesieczny', 200, 1, ''),
(88, 50, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(89, 50, 'Karnet miesieczny', 200, 1, ''),
(90, 51, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(91, 52, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(92, 52, 'Karnet miesieczny', 200, 1, ''),
(93, 53, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(94, 53, 'Karnet miesieczny', 200, 1, ''),
(95, 54, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(96, 55, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(97, 56, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(98, 57, 'Karnet miesieczny', 200, 2, ''),
(99, 58, 'Karnet miesieczny', 200, 1, ''),
(100, 59, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(101, 60, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(102, 61, 'Karnet miesieczny', 200, 1, ''),
(103, 62, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(104, 63, 'Karnet miesieczny', 200, 1, ''),
(105, 63, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(106, 64, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(107, 64, 'Karnet miesieczny', 200, 1, ''),
(108, 65, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(109, 66, 'Karnet miesieczny', 200, 1, ''),
(110, 67, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(111, 67, 'Karnet miesieczny', 200, 1, ''),
(112, 68, 'Karnet miesieczny', 200, 1, ''),
(113, 69, 'Karnet roczny', 800, 1, ''),
(114, 70, 'Karnet miesieczny', 200, 1, ''),
(115, 70, 'Karnet roczny', 800, 1, ''),
(116, 71, 'Karnet miesieczny', 200, 1, ''),
(117, 72, 'Karnet miesieczny', 200, 1, ''),
(118, 0, 'Karnet miesieczny', 200, 1, ''),
(119, 0, 'Karnet roczny', 800, 1, ''),
(120, 73, 'Karnet miesieczny', 200, 1, ''),
(121, 74, 'Karnet miesieczny', 200, 1, ''),
(122, 75, 'Karnet miesieczny', 200, 1, ''),
(123, 76, 'Karnet roczny', 800, 1, ''),
(124, 77, 'Karnet roczny', 800, 2, ''),
(125, 77, 'Karnet miesieczny', 200, 1, ''),
(126, 78, 'Karnet miesieczny', 200, 3, ''),
(127, 78, 'Karnet roczny', 800, 1, ''),
(128, 78, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(129, 78, 'Wejsciowka jednorazowa', 19, 1, ''),
(130, 79, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(131, 79, 'Karnet miesieczny', 200, 1, ''),
(132, 79, 'Karnet roczny', 800, 1, ''),
(133, 79, 'Wejsciowka jednorazowa', 19, 1, ''),
(134, 80, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(135, 80, 'Karnet miesieczny', 200, 1, ''),
(136, 80, 'Karnet roczny', 800, 1, ''),
(137, 81, 'Wejsciowka jednorazowa', 19, 1, ''),
(138, 81, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(139, 81, 'Karnet miesieczny', 200, 1, ''),
(140, 81, 'Karnet roczny', 800, 1, ''),
(141, 82, 'Karnet miesieczny', 200, 1, ''),
(142, 82, 'Karnet roczny', 800, 1, ''),
(143, 83, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(144, 83, 'Karnet miesieczny', 200, 1, ''),
(145, 84, 'Karnet miesieczny', 200, 1, ''),
(146, 84, 'Karnet roczny', 800, 1, ''),
(147, 85, 'Karnet miesieczny', 200, 1, ''),
(148, 85, 'Karnet roczny', 800, 1, ''),
(149, 85, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(150, 86, 'Karnet miesieczny', 200, 1, ''),
(151, 86, 'Karnet roczny', 800, 1, ''),
(152, 86, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(153, 87, 'Karnet miesieczny', 200, 1, ''),
(154, 87, 'Karnet roczny', 800, 1, ''),
(155, 88, 'Karnet miesieczny', 200, 1, ''),
(156, 88, 'Karnet roczny', 800, 1, ''),
(157, 89, 'Wejsciowka jednorazowa', 19, 3, ''),
(158, 89, 'Karnet miesieczny', 200, 2, ''),
(159, 89, 'Karnet roczny', 800, 1, ''),
(160, 89, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(161, 90, 'Karnet miesieczny', 200, 1, ''),
(162, 90, 'Karnet roczny', 800, 1, ''),
(163, 90, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(164, 90, 'Wejsciowka jednorazowa', 19, 1, ''),
(165, 91, 'Karnet miesieczny', 200, 1, ''),
(166, 91, 'Karnet roczny', 800, 1, ''),
(167, 92, 'Karnet miesieczny', 200, 2, ''),
(168, 92, 'Karnet roczny', 800, 1, ''),
(169, 92, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(170, 92, 'Wejsciowka jednorazowa', 19, 1, ''),
(171, 93, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(172, 93, 'Karnet miesieczny', 200, 1, ''),
(173, 94, 'Wejsciowka jednorazowa', 19, 1, ''),
(174, 94, 'Karnet miesieczny', 200, 1, ''),
(175, 95, 'Wejsciowka jednorazowa', 19, 1, ''),
(176, 95, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(177, 95, 'Karnet miesieczny', 200, 1, ''),
(178, 95, 'Karnet roczny', 800, 1, ''),
(179, 0, 'Wejsciowka jednorazowa', 19, 1, ''),
(180, 0, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(181, 0, 'Karnet miesieczny', 200, 1, ''),
(182, 0, 'Karnet roczny', 800, 1, ''),
(183, 0, 'Karnet miesieczny', 200, 1, ''),
(184, 0, 'Karnet roczny', 800, 1, ''),
(185, 0, 'Karnet miesieczny', 200, 1, ''),
(186, 96, 'Karnet miesieczny', 200, 1, ''),
(187, 96, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(188, 97, 'Karnet miesieczny', 200, 1, ''),
(189, 97, 'Karnet roczny', 800, 1, ''),
(190, 98, 'Karnet miesieczny', 200, 1, ''),
(191, 98, 'Karnet roczny', 800, 1, ''),
(192, 98, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(193, 99, 'Karnet miesieczny', 200, 1, ''),
(194, 99, 'Karnet roczny', 800, 1, ''),
(195, 99, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(196, 100, 'Karnet roczny', 800, 1, ''),
(197, 100, 'Karnet miesieczny', 200, 1, ''),
(198, 101, 'Karnet miesieczny', 200, 1, ''),
(199, 101, 'Karnet roczny', 800, 2, ''),
(200, 102, 'Karnet miesieczny', 200, 1, ''),
(201, 102, 'Karnet roczny', 800, 1, ''),
(202, 102, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(203, 103, 'Karnet miesieczny', 200, 1, ''),
(204, 103, 'Karnet roczny', 800, 1, ''),
(205, 104, 'Karnet miesieczny', 200, 1, ''),
(206, 104, 'Karnet roczny', 800, 1, ''),
(207, 105, 'Karnet miesieczny', 200, 1, ''),
(208, 106, 'Karnet roczny', 800, 1, ''),
(209, 106, 'Karnet miesieczny', 200, 1, ''),
(210, 107, 'Karnet roczny', 800, 1, ''),
(211, 107, 'Karnet miesieczny', 200, 1, ''),
(212, 108, 'Wejsciowka 10-ciodniowa', 150, 1, ''),
(213, 109, 'Wejsciowka jednorazowa', 19, 1, ''),
(214, 110, 'Karnet miesieczny', 200, 1, '0'),
(215, 110, 'Karnet roczny', 800, 1, '0'),
(216, 111, 'Karnet miesieczny', 200, 1, ''),
(217, 112, 'Karnet miesieczny', 200, 1, ''),
(218, 112, 'Karnet roczny', 800, 1, ''),
(219, 113, 'Karnet miesieczny', 200, 1, '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`produkt_id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `zajecia`
--
ALTER TABLE `zajecia`
  ADD PRIMARY KEY (`zajecia_id`);

--
-- Indexes for table `zajecia_zapisy`
--
ALTER TABLE `zajecia_zapisy`
  ADD PRIMARY KEY (`zajecia_zapisy_id`);

--
-- Indexes for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`zamowienie_id`);

--
-- Indexes for table `zamowienia_szczegoly`
--
ALTER TABLE `zamowienia_szczegoly`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  MODIFY `zajecia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `zajecia_zapisy`
--
ALTER TABLE `zajecia_zapisy`
  MODIFY `zajecia_zapisy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `zamowienie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT dla tabeli `zamowienia_szczegoly`
--
ALTER TABLE `zamowienia_szczegoly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
