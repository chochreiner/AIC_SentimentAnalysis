-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 20. November 2012 um 00:50
-- Server Version: 5.5.9
-- PHP-Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `uni_aic_sentiments`
--

--
-- Daten für Tabelle `tblbrands`
--

INSERT INTO `tblbrands` VALUES(1, 1, 'Apple MacBook', 'macbook,mac,os x,macboock,macbooc,makbook,maacbook,macbok,macbooook,macbookk,maccbook,macbbook,mmacbook,nacbook,acbook,macboo', 18, 95);
INSERT INTO `tblbrands` VALUES(2, 1, 'Apple iPhone', 'iphone,apple smartphone', 15, 50);
INSERT INTO `tblbrands` VALUES(3, 2, 'XBox Gaming Console', 'xbox,x-box,x box', 10, 45);
INSERT INTO `tblbrands` VALUES(4, 2, 'Microsoft Windows', 'windows,vista', 15, 100);

--
-- Daten für Tabelle `tblcompanies`
--

INSERT INTO `tblcompanies` VALUES(1, 'Apple');
INSERT INTO `tblcompanies` VALUES(2, 'Microsoft');
