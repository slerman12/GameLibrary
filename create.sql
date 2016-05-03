CREATE TABLE games(
  name VARCHAR(40) PRIMARY KEY
);

CREATE TABLE players (
    name       varchar(40) PRIMARY KEY,
    password         varchar(40) ,
    friends_count  integer,
    game_hours integer
);


CREATE TABLE developers (
	name		varchar(40) PRIMARY KEY,
	country	varchar(40),
	year_founded	integer
);

CREATE TABLE runsOn(
  game_name VARCHAR(40),
  plat_name VARCHAR(40),
plat_version VARCHAR(40),
    PRIMARY KEY (game_name, plat_version, plat_name),
    FOREIGN KEY(game_name) REFERENCES games(name)  ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(plat_name, plat_version) REFERENCES platforms(name, version) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE developsFor(
  developer_name VARCHAR(40),
  plat_name VARCHAR(40),
plat_version VARCHAR(40),
    PRIMARY KEY (developer_name, plat_version, plat_name),
    FOREIGN KEY(developer_name) REFERENCES developers(name) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(plat_name, plat_version) REFERENCES platforms(name, version) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE usersPlatform(
    player_name INT NOT NULL,
    plat_name VARCHAR(40) NOT NULL,
    plat_version VARCHAR(40) NOT NULL,
    PRIMARY KEY (plat_name, plat_version, plat_name),
    FOREIGN KEY(plat_name, plat_version) REFERENCES platforms(name, version) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (player_name) REFERENCES players (name) ON DELETE CASCADE ON UPDATE CASCADE
);

-- INSERT INTO players VALUES(’Rob',’add1753’,’23’,’120’);
--
-- INSERT INTO players VALUES(’Spencer',’fyi3356’,’50,’44’);
--
-- INSERT INTO players VALUES(’Daisy',’th557df’,’21’,’320’);
--
-- INSERT INTO players VALUES(’Tony',’huh4578’,’77’,’820’);
--
-- INSERT INTO players VALUES(’Kelly’,’Ilove556’,’54’,’650’);
--
-- INSERT INTO players VALUES(’Emily’,’hunk6678’,’78’,’800’);
--
-- INSERT INTO players VALUES(’Sam’,’Klink4456’,’90’,’543’);
--
-- INSERT INTO players VALUES(’Sindy’,’deff67890’,’51’,’267’);
--
-- INSERT INTO players VALUES(’Daisy’,’mmk4578’,’34’,’550’);
--
-- INSERT INTO players VALUES('Dick’,’bvc4435’,’69’,’100’);
--
--
-- INSERT INTO developers VALUES('Steve,’USA’,1997);
--
-- INSERT INTO developers VALUES('Hobbins,’USA’,1999);
-- INSERT INTO developers VALUES('Lerman,’USA’,2008);
-- INSERT INTO developers VALUES('Nelson,’Australia’,2000);
-- INSERT INTO developers VALUES('Johnson,’Russia’,1997);
-- INSERT INTO developers VALUES('Dorner,’USA’,1995);
-- INSERT INTO developers VALUES('Fomenko,’Ukraine’,1995);
-- INSERT INTO developers VALUES('McDonald,’USA’,1996);
-- INSERT INTO developers VALUES('Lundy,’USA’,1996);
-- INSERT INTO developers VALUES('McGill,’USA’,2000);
-- INSERT INTO developers VALUES('Dooms,’USA’,2000);
--
--
-- INSERT INTO games VALUES('Call of Duty');
-- INSERT INTO games VALUES('World of WarCraft');
-- INSERT INTO games VALUES('Alan Wake');
-- INSERT INTO games VALUES('Mass Effect');
-- INSERT INTO games VALUES('Game of Thrones');
-- INSERT INTO games VALUES('Assassins Creed');
-- INSERT INTO games VALUES('Portal');
-- INSERT INTO games VALUES('Half Life');
-- INSERT INTO games VALUES('Skyrim');
-- INSERT INTO games VALUES('Super Mario Kart');
-- INSERT INTO games VALUES('Super Mario Galaxy');
-- INSERT INTO games VALUES('Angry Birds');
--
--
-- INSERT INTO runsOn VALUES ('Call of Duty', 'xbox', 'one');
-- INSERT INTO runsOn VALUES ('Call of Duty', 'xbox', '360');
-- INSERT INTO runsOn VALUES ('Call of Duty', 'windows', '10');
-- INSERT INTO runsOn VALUES ('World of WarCraft', 'windows', '10');
-- INSERT INTO runsOn VALUES ('Alan Wake', 'xbox', '360');
-- INSERT INTO runsOn VALUES ('Mass Effect', 'windows', '10');
-- INSERT INTO runsOn VALUES ('Mass Effect', 'xbox', 'one');
-- INSERT INTO runsOn VALUES ('Mass Effect', 'xbox', '360');
-- INSERT INTO runsOn VALUES ('Mass Effect', 'playstation', '4');
--
-- INSERT INTO runsOn VALUES ('Game of Thrones', 'playstation', '4');
-- INSERT INTO runsOn VALUES ('Game of Thrones', 'ios', '7.4');
--
-- INSERT INTO runsOn VALUES ('Assassins Creed', 'playstation', '4');
-- INSERT INTO runsOn VALUES ('Assassins Creed', 'playstation', '2');
-- INSERT INTO runsOn VALUES ('Assassins Creed', 'xbox', '360');
-- INSERT INTO runsOn VALUES ('Assassins Creed', 'xbox', 'one');
-- INSERT INTO runsOn VALUES ('Assassins Creed', 'nintendo', 'wii');
-- INSERT INTO runsOn VALUES ('Assassins Creed', 'nintendo', 'gamecube');
--
-- INSERT INTO runsOn VALUES ('Skyrim', 'playstation', '4');
-- INSERT INTO runsOn VALUES ('Skyrim', 'playstation', '2');
-- INSERT INTO runsOn VALUES ('Skyrim', 'xbox', '360');
-- INSERT INTO runsOn VALUES ('Skyrim', 'xbox', 'one');
--
-- INSERT INTO runsOn VALUES ('Super Mario Kart', 'nintendo', 'wii');
-- INSERT INTO runsOn VALUES ('Super Mario Kart', 'nintendo', 'gamecube');
--
-- INSERT INTO runsOn VALUES ('Super Mario Galaxy', 'nintendo', 'wii');
-- INSERT INTO runsOn VALUES ('Super Mario Galaxy', 'nintendo', 'gamecube');
--
-- INSERT INTO runsOn VALUES ('Portal', 'xbox', '360');
-- INSERT INTO runsOn VALUES ('Portal', 'playstation', '4');
-- INSERT INTO runsOn VALUES ('Portal', 'ios', '7.4');
--
-- INSERT INTO runsOn VALUES ('Half Life', 'playstation', '4');
-- INSERT INTO runsOn VALUES ('Half Life', 'xbox', '360');
-- INSERT INTO runsOn VALUES ('Half Life', 'ios', '7.4');
-- INSERT INTO runsOn VALUES ('Half Life', 'osx', 'mountain lion');
--
-- INSERT INTO runsOn VALUES ('Angry Birds', 'nintendo', 'wii');
-- INSERT INTO runsOn VALUES ('Angry Birds', 'xbox', '360');
-- INSERT INTO runsOn VALUES ('Angry Birds', 'playstation', '4');
-- INSERT INTO runsOn VALUES ('Angry Birds', 'ios', '7.4');
-- INSERT INTO runsOn VALUES ('Angry Birds', 'windows', '10');
-- INSERT INTO runsOn VALUES ('Angry Birds', 'osx', 'mountain lion');
--
--
--
--
-- INSERT INTO developsFor VALUES ('McGill', 'xbox', 'one')
-- INSERT INTO developsFor VALUES('Hobbins,’playstation’,'4');
-- INSERT INTO developsFor VALUES('Lerman,’xbox’,'360'););
-- INSERT INTO developsFor VALUES('Nelson,’windows’,'10');
-- INSERT INTO developsFor VALUES('Johnson,’nintendo’,'wii');
-- INSERT INTO developsFor VALUES('Dorner,’ios’,'7.4');
-- INSERT INTO developsFor VALUES('Fomenko,’nintendo’,'gamecube');
-- INSERT INTO developsFor VALUES('McDonald,’playstation’,'2');
-- INSERT INTO developsFor VALUES('Lundy,’osx’,'mountain lion');
-- INSERT INTO developsFor VALUES('Dooms,’xbox’,'one');
--
--
--
--
-- INSERT INTO usersPlatform VALUES ('Sindy', 'xbox', 'one');
--
-- INSERT INTO usersPlatform VALUESS(’Rob',’playstation’,’4’);
--
-- INSERT INTO usersPlatform VALUES(’Spencer',’ios’,’7.4');
--
-- INSERT INTO usersPlatform VALUES(’Daisy',’windows’,’10’);
--
-- INSERT INTO usersPlatform VALUES(’Tony',’nintendo’,’wii’);
--
-- INSERT INTO usersPlatform VALUES(’Kelly',’osx’,’mountain lion’);
--
-- INSERT INTO usersPlatform VALUES(’Emily',’xbox’,’360’);
--
-- INSERT INTO usersPlatform VALUES(’Sam',’nintendo’,’gamecube’);
--
-- INSERT INTO usersPlatform VALUES(’Sindy',’playstation’,’2’);
--
-- INSERT INTO usersPlatform VALUES(’Daisy',’playstation’,’4’);
--
-- INSERT INTO usersPlatform VALUES('Dick',’xbox’,’360’);
