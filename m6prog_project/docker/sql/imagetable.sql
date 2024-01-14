CREATE TABLE imagetable
(
    idImage INT UNSIGNED NOT NULL AUTO_INCREMENT,
    fileNaam VARCHAR(255) NOT NULL,
    fileType VARCHAR(50) NOT NULL,
    uploadDateTime DateTime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (idImage),
    UNIQUE INDEX idImage_UNIQUE (idImage ASC) VISIBLE
)