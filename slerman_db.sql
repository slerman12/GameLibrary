--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.2
-- Dumped by pg_dump version 9.5.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: platforms; Type: TABLE; Schema: public; Owner: slerman
--

CREATE TABLE platforms (
    name character varying(40) NOT NULL,
    version character varying(40) NOT NULL,
    type character varying(40),
    speed integer,
    popularity integer
);


ALTER TABLE platforms OWNER TO slerman;

--
-- Data for Name: platforms; Type: TABLE DATA; Schema: public; Owner: slerman
--

COPY platforms (name, version, type, speed, popularity) FROM stdin;
Windows	10.2	PC	8	10
iOS	7.4	mobile	4	10
Linux Debian	10	PC	7	2
xbox	one	console	8	10
PlayStation	2	console	3	5
osx	mountain lion	PC	5	7
\.


--
-- Name: name_version; Type: CONSTRAINT; Schema: public; Owner: slerman
--

ALTER TABLE ONLY platforms
    ADD CONSTRAINT name_version PRIMARY KEY (name, version);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

