use: m6prog;

CREATE TABLE naw
(
    idnaw INT UNSIGNED NOT NULL AUTO_INCREMENT,
    naam, een varchar(100), NOT NULL,
    straat, een varchar(100), NOT NULL,
    huisnummer, een varchar(6), NOT NULL,
    postcode, een varchar(6), NOT NULL,
    email, een varchar(120), NOT NULL,
    PRIMARY KEY (idnaw),
    UNIQUE INDEX idnaw_UNIQUE (idnaw ASC) VISIBLE
)