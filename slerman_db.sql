--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

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
-- Name: developers; Type: TABLE; Schema: public; Owner: slerman; Tablespace: 
--

CREATE TABLE developers (
    name character varying(40) NOT NULL,
    country character varying(40),
    year_founded integer
);


ALTER TABLE developers OWNER TO slerman;

--
-- Name: developsfor; Type: TABLE; Schema: public; Owner: slerman; Tablespace: 
--

CREATE TABLE developsfor (
    developer_name character varying(40) NOT NULL,
    plat_name character varying(40) NOT NULL,
    plat_version character varying(40) NOT NULL
);


ALTER TABLE developsfor OWNER TO slerman;

--
-- Name: games; Type: TABLE; Schema: public; Owner: slerman; Tablespace: 
--

CREATE TABLE games (
    name character varying(40) NOT NULL
);


ALTER TABLE games OWNER TO slerman;

--
-- Name: items; Type: TABLE; Schema: public; Owner: slerman; Tablespace: 
--

CREATE TABLE items (
    name character varying(10) NOT NULL
);


ALTER TABLE items OWNER TO slerman;

--
-- Name: platforms; Type: TABLE; Schema: public; Owner: slerman; Tablespace: 
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
-- Name: players; Type: TABLE; Schema: public; Owner: slerman; Tablespace: 
--

CREATE TABLE players (
    name character varying(40) NOT NULL,
    password character varying(40),
    friends_count integer,
    game_hours integer
);


ALTER TABLE players OWNER TO slerman;

--
-- Name: runson; Type: TABLE; Schema: public; Owner: slerman; Tablespace: 
--

CREATE TABLE runson (
    game_name character varying(40) NOT NULL,
    plat_name character varying(40) NOT NULL,
    plat_version character varying(40) NOT NULL
);


ALTER TABLE runson OWNER TO slerman;

--
-- Name: usersplatform; Type: TABLE; Schema: public; Owner: slerman; Tablespace: 
--

CREATE TABLE usersplatform (
    player_name character varying(40) NOT NULL,
    plat_name character varying(40) NOT NULL,
    plat_version character varying(40) NOT NULL
);


ALTER TABLE usersplatform OWNER TO slerman;

--
-- Data for Name: developers; Type: TABLE DATA; Schema: public; Owner: slerman
--

COPY developers (name, country, year_founded) FROM stdin;
Steve	USA	1997
Hobbins	USA	1999
Lerman	USA	2008
Nelson	Australia	2000
Johnson	Russia	1997
Dorner	USA	1995
Fomenko	Ukraine	1995
McDonald	USA	1996
Lundy	USA	1996
McGill	USA	2000
Dooms	USA	2000
\.


--
-- Data for Name: developsfor; Type: TABLE DATA; Schema: public; Owner: slerman
--

COPY developsfor (developer_name, plat_name, plat_version) FROM stdin;
Lerman	xbox	360
Nelson	windows	10
Johnson	nintendo	wii
Dorner	ios	7.4
Fomenko	nintendo	gamecube
McDonald	playstation	2
Lundy	osx	mountain lion
Dooms	xbox	one
\.


--
-- Data for Name: games; Type: TABLE DATA; Schema: public; Owner: slerman
--

COPY games (name) FROM stdin;
Call of Duty
World of WarCraft
Alan Wake
Mass Effect
Game of Thrones
Assassins Creed
Portal
Half Life
Skyrim
Super Mario Kart
Super Mario Galaxy
Angry Birds
\.


--
-- Data for Name: items; Type: TABLE DATA; Schema: public; Owner: slerman
--

COPY items (name) FROM stdin;
one
two
three
\.


--
-- Data for Name: platforms; Type: TABLE DATA; Schema: public; Owner: slerman
--

COPY platforms (name, version, type, speed, popularity) FROM stdin;
playstation	4	console	9	10
nintendo	wii	console	3	9
osx	mountain lion	pc	6	8
ios	7.4	mobile	4	10
xbox	360	console	7	6
playstation	2	console	3	3
windows	10	PC	8	10
xbox	one	console	8	10
nintendo	gamecube	console	1	4
\.


--
-- Data for Name: players; Type: TABLE DATA; Schema: public; Owner: slerman
--

COPY players (name, password, friends_count, game_hours) FROM stdin;
Rob	add1753	23	120
Spencer	fyi3356	50	44
Daisy	th557df	21	320
Tony	huh4578	77	820
Kelly	Ilove556	54	650
Emily	hunk6678	78	800
Sam	Klink4456	90	543
Sindy	deff67890	51	267
Dick	bvc4435	69	100
\.


--
-- Data for Name: runson; Type: TABLE DATA; Schema: public; Owner: slerman
--

COPY runson (game_name, plat_name, plat_version) FROM stdin;
Call of Duty	xbox	360
Call of Duty	windows	10
World of WarCraft	windows	10
Alan Wake	xbox	360
Mass Effect	windows	10
Mass Effect	xbox	360
Mass Effect	playstation	4
Game of Thrones	playstation	4
Game of Thrones	ios	7.4
Assassins Creed	playstation	4
Assassins Creed	playstation	2
Assassins Creed	xbox	360
Assassins Creed	nintendo	wii
Assassins Creed	nintendo	gamecube
Skyrim	playstation	4
Skyrim	playstation	2
Skyrim	xbox	360
Super Mario Kart	nintendo	wii
Super Mario Kart	nintendo	gamecube
Super Mario Galaxy	nintendo	wii
Super Mario Galaxy	nintendo	gamecube
Portal	xbox	360
Portal	playstation	4
Portal	ios	7.4
Half Life	playstation	4
Half Life	xbox	360
Half Life	ios	7.4
Half Life	osx	mountain lion
Angry Birds	nintendo	wii
Angry Birds	xbox	360
Angry Birds	playstation	4
Angry Birds	ios	7.4
Angry Birds	windows	10
Angry Birds	osx	mountain lion
Call of Duty	xbox	one
Mass Effect	xbox	one
Assassins Creed	xbox	one
Skyrim	xbox	one
\.


--
-- Data for Name: usersplatform; Type: TABLE DATA; Schema: public; Owner: slerman
--

COPY usersplatform (player_name, plat_name, plat_version) FROM stdin;
Rob	playstation	4
Spencer	ios	7.4
Daisy	windows	10
Tony	nintendo	wii
Kelly	osx	mountain lion
Emily	xbox	360
Sam	nintendo	gamecube
Sindy	playstation	2
Daisy	playstation	4
Dick	xbox	360
Sindy	xbox	one
\.


--
-- Name: developers_pkey; Type: CONSTRAINT; Schema: public; Owner: slerman; Tablespace: 
--

ALTER TABLE ONLY developers
    ADD CONSTRAINT developers_pkey PRIMARY KEY (name);


--
-- Name: developsfor_pkey; Type: CONSTRAINT; Schema: public; Owner: slerman; Tablespace: 
--

ALTER TABLE ONLY developsfor
    ADD CONSTRAINT developsfor_pkey PRIMARY KEY (developer_name, plat_version, plat_name);


--
-- Name: games_pkey; Type: CONSTRAINT; Schema: public; Owner: slerman; Tablespace: 
--

ALTER TABLE ONLY games
    ADD CONSTRAINT games_pkey PRIMARY KEY (name);


--
-- Name: items_pkey; Type: CONSTRAINT; Schema: public; Owner: slerman; Tablespace: 
--

ALTER TABLE ONLY items
    ADD CONSTRAINT items_pkey PRIMARY KEY (name);


--
-- Name: name_version; Type: CONSTRAINT; Schema: public; Owner: slerman; Tablespace: 
--

ALTER TABLE ONLY platforms
    ADD CONSTRAINT name_version PRIMARY KEY (name, version);


--
-- Name: players_pkey; Type: CONSTRAINT; Schema: public; Owner: slerman; Tablespace: 
--

ALTER TABLE ONLY players
    ADD CONSTRAINT players_pkey PRIMARY KEY (name);


--
-- Name: runson_pkey; Type: CONSTRAINT; Schema: public; Owner: slerman; Tablespace: 
--

ALTER TABLE ONLY runson
    ADD CONSTRAINT runson_pkey PRIMARY KEY (game_name, plat_version, plat_name);


--
-- Name: usersplatform_pkey; Type: CONSTRAINT; Schema: public; Owner: slerman; Tablespace: 
--

ALTER TABLE ONLY usersplatform
    ADD CONSTRAINT usersplatform_pkey PRIMARY KEY (plat_name, plat_version, player_name);


--
-- Name: developsfor_developer_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: slerman
--

ALTER TABLE ONLY developsfor
    ADD CONSTRAINT developsfor_developer_name_fkey FOREIGN KEY (developer_name) REFERENCES developers(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: developsfor_plat_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: slerman
--

ALTER TABLE ONLY developsfor
    ADD CONSTRAINT developsfor_plat_name_fkey FOREIGN KEY (plat_name, plat_version) REFERENCES platforms(name, version) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: runson_game_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: slerman
--

ALTER TABLE ONLY runson
    ADD CONSTRAINT runson_game_name_fkey FOREIGN KEY (game_name) REFERENCES games(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: runson_plat_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: slerman
--

ALTER TABLE ONLY runson
    ADD CONSTRAINT runson_plat_name_fkey FOREIGN KEY (plat_name, plat_version) REFERENCES platforms(name, version) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: usersplatform_plat_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: slerman
--

ALTER TABLE ONLY usersplatform
    ADD CONSTRAINT usersplatform_plat_name_fkey FOREIGN KEY (plat_name, plat_version) REFERENCES platforms(name, version) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: usersplatform_player_name_fkey; Type: FK CONSTRAINT; Schema: public; Owner: slerman
--

ALTER TABLE ONLY usersplatform
    ADD CONSTRAINT usersplatform_player_name_fkey FOREIGN KEY (player_name) REFERENCES players(name) ON UPDATE CASCADE ON DELETE CASCADE;


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

