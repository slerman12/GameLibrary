CREATE TABLE games(
  name VARCHAR(40)
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
    PRIMARY KEY (game_name, plat_version, player_name),
    FOREIGN KEY(game_name) REFERENCES games(name)  ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(plat_name, play_version) REFERENCES platforms(name, version) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE developsFor(
  developer_name VARCHAR(40),
  plat_name VARCHAR(40),
plat_version VARCHAR(40),
    PRIMARY KEY (developer_name, plat_version, player_name),
    FOREIGN KEY(developer_name) REFERENCES developers(name) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(plat_name, play_version) REFERENCES platforms(name, version) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE usersPlatform(
    player_name INT NOT NULL,
    plat_name VARCHAR(40) NOT NULL,
    plat_version VARCHAR(40) NOT NULL,
    PRIMARY KEY (plat_name, plat_version, player_name),
    FOREIGN KEY(plat_name, play_version) REFERENCES platforms(name, version) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY player_name references players (name) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO players VALUES(’Rob Thompson’,’add1753’,’23’,’120’);

INSERT INTO players VALUES(’Spencer Crittenden’,’fyi3356’,’50,’44’);

INSERT INTO players VALUES(’Daisy Duke’,’th557df’,’21’,’320’);

INSERT INTO players VALUES(’Tony Robinson’,’huh4578’,’77’,’820’);

INSERT INTO players VALUES(’Kelly Hart’,’Ilove556’,’54’,’650’);

INSERT INTO players VALUES(’Emily Dickinson’,’hunk6678’,’78’,’800’);

INSERT INTO players VALUES(’Sam Leone’,’Klink4456’,’90’,’543’);

INSERT INTO players VALUES(’Sindy Doon’,’deff67890’,’51’,’267’);

INSERT INTO players VALUES(’Daisy Ridley’,’mmk4578’,’34’,’550’);

INSERT INTO players VALUES('Dick Van Sycke’,’bvc4435’,’69’,’100’);

INSERT INTO developers VALUES('Steve Bushlemi,’USA’,1997);

INSERT INTO developers VALUES('Steve Hobbins,’USA’,1999);
INSERT INTO developers VALUES('Sam Lerman,’USA’,2008);
INSERT INTO developers VALUES('Natalie Nelson,’Australia’,2000);
INSERT INTO developers VALUES('Ivett Johnson,’Russia’,1997);
INSERT INTO developers VALUES('Michael Dorner,’USA’,1995);
INSERT INTO developers VALUES('Michele Fomenko,’Ukraine’,1995);
INSERT INTO developers VALUES('Martha McDonald,’USA’,1996);
INSERT INTO developers VALUES('Patricia Lundy,’USA’,1996);
INSERT INTO developers VALUES('James McGill,’USA’,2000);
INSERT INTO developers VALUES('Syndy Dooms,’USA’,2000);


INSERT INTO games VALUES('Call of Duty');
INSERT INTO games VALUES('World of WarCraft');
INSERT INTO games VALUES('Alan Wake');
INSERT INTO games VALUES('Mass Effect');
INSERT INTO games VALUES('Game of Thrones');
INSERT INTO games VALUES('Assassins Creed');
INSERT INTO games VALUES('Portal');
INSERT INTO games VALUES('Half Life');
INSERT INTO games VALUES('Skyrim');
INSERT INTO games VALUES('Super Mario Kart');
INSERT INTO games VALUES('Super Mario Galaxy');
INSERT INTO games VALUES('Angry Birds');


INSERT INTO runsOn VALUES ('Call of Duty', 'xbox', 'one');
INSERT INTO runsOn VALUES ('Call of Duty', 'xbox', '360');
INSERT INTO runsOn VALUES ('Call of Duty', 'windows', '10');
INSERT INTO runsOn VALUES ('World of WarCraft', 'windows', '10');
INSERT INTO runsOn VALUES ('Alan Wake', 'xbox', '360');
INSERT INTO runsOn VALUES ('Mass Effect', 'windows', '10');
INSERT INTO runsOn VALUES ('Mass Effect', 'xbox', 'one');
INSERT INTO runsOn VALUES ('Mass Effect', 'xbox', '360');
INSERT INTO runsOn VALUES ('Mass Effect', 'playstation', '4');

INSERT INTO runsOn VALUES ('Game of Thrones', 'playstation', '4');
INSERT INTO runsOn VALUES ('Game of Thrones', 'ios', '7.4');

INSERT INTO runsOn VALUES ('Assassins Creed', 'playstation', '4');
INSERT INTO runsOn VALUES ('Assassins Creed', 'playstation', '2');
INSERT INTO runsOn VALUES ('Assassins Creed', 'xbox', '360');
INSERT INTO runsOn VALUES ('Assassins Creed', 'xbox', 'one');
INSERT INTO runsOn VALUES ('Assassins Creed', 'nintendo', 'wii');
INSERT INTO runsOn VALUES ('Assassins Creed', 'nintendo', 'gamecube');

INSERT INTO runsOn VALUES ('Skyrim', 'playstation', '4');
INSERT INTO runsOn VALUES ('Skyrim', 'playstation', '2');
INSERT INTO runsOn VALUES ('Skyrim', 'xbox', '360');
INSERT INTO runsOn VALUES ('Skyrim', 'xbox', 'one');

INSERT INTO runsOn VALUES ('Super Mario Kart', 'nintendo', 'wii');
INSERT INTO runsOn VALUES ('Super Mario Kart', 'nintendo', 'gamecube');

INSERT INTO runsOn VALUES ('Super Mario Galaxy', 'nintendo', 'wii');
INSERT INTO runsOn VALUES ('Super Mario Galaxy', 'nintendo', 'gamecube');

INSERT INTO runsOn VALUES ('Portal', 'xbox', '360');
INSERT INTO runsOn VALUES ('Portal', 'playstation', '4');
INSERT INTO runsOn VALUES ('Portal', 'ios', '7.4');

INSERT INTO runsOn VALUES ('Half Life', 'playstation', '4');
INSERT INTO runsOn VALUES ('Half Life', 'xbox', '360');
INSERT INTO runsOn VALUES ('Half Life', 'ios', '7.4');
INSERT INTO runsOn VALUES ('Half Life', 'osx', 'mountain lion');

INSERT INTO runsOn VALUES ('Angry Birds', 'nintendo', 'wii');
INSERT INTO runsOn VALUES ('Angry Birds', 'xbox', '360');
INSERT INTO runsOn VALUES ('Angry Birds', 'playstation', '4');
INSERT INTO runsOn VALUES ('Angry Birds', 'ios', '7.4');
INSERT INTO runsOn VALUES ('Angry Birds', 'windows', '10');
INSERT INTO runsOn VALUES ('Angry Birds', 'osx', 'mountain lion');




INSERT INTO developsFor VALUES ('James McGill', 'xbox', 'one')
INSERT INTO developsFor VALUES('Steve Hobbins,’playstation’,'4');
INSERT INTO developsFor VALUES('Sam Lerman,’xbox’,'360'););
INSERT INTO developsFor VALUES('Natalie Nelson,’windows’,'10');
INSERT INTO developsFor VALUES('Ivett Johnson,’nintendo’,'wii');
INSERT INTO developsFor VALUES('Michael Dorner,’ios’,'7.4');
INSERT INTO developsFor VALUES('Michele Fomenko,’nintendo’,'gamecube');
INSERT INTO developsFor VALUES('Martha McDonald,’playstation’,'2');
INSERT INTO developsFor VALUES('Patricia Lundy,’osx’,'mountain lion');
INSERT INTO developsFor VALUES('Syndy Dooms,’xbox’,'one');




INSERT INTO usersPlatform VALUES ('Sindy Doon', 'xbox', 'one');

INSERT INTO usersPlatform VALUESS(’Rob Thompson’,’playstation’,’4’);

INSERT INTO usersPlatform VALUES(’Spencer Crittenden’,’ios’,’7.4');

INSERT INTO usersPlatform VALUES(’Daisy Duke’,’windows’,’10’);

INSERT INTO usersPlatform VALUES(’Tony Robinson’,’nintendo’,’wii’);

INSERT INTO usersPlatform VALUES(’Kelly Hart’,’osx’,’mountain lion’);

INSERT INTO usersPlatform VALUES(’Emily Dickinson’,’xbox’,’360’);

INSERT INTO usersPlatform VALUES(’Sam Leone’,’nintendo’,’gamecube’);

INSERT INTO usersPlatform VALUES(’Sindy Doon’,’playstation’,’2’);

INSERT INTO usersPlatform VALUES(’Daisy Ridley’,’playstation’,’4’);

INSERT INTO usersPlatform VALUES('Dick Van Sycke’,’xbox’,’360’);
