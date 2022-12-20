CREATE TABLE states
(
    id    int(11) PRIMARY KEY NOT NULL,
    uf char(2),
    name  varchar(155)
);

CREATE TABLE cities
(
    id        integer PRIMARY KEY NOT NULL,
    name      varchar(155),
    id_state INT REFERENCES states (id)
);
CREATE TABLE people
(
    id       int(11) PRIMARY KEY NOT NULL,
    name     varchar(155),
    address  varchar(155),
    district varchar(155),
    phone    varchar(15),
    mail     varchar(155),
    id_city  int references cities (id)
);
