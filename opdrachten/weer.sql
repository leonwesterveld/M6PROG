CREATE SCHEMA 'weer';
USE 'weer';

CREATE TABLE 'weersomstandighedenPerDag'
(
    'idweersomstandighedenPerDag' INT UNSIGNED NOT NULL AUTO_INCREMENT,
    'datum' DATE NOT NULL,
    'aantalGraden' DECIMAL NOT NULL,
    'windKracht' INT UNSIGNED NULL,
    'regenInMilimeters' INT NOT NULL,
    'plaats' INT NOT NULL,
    PRIMARY KEY ('idweersomstandighedenPerDag'),
    UNIQUE INDEX 'idweersomstandighedenPerDag_UNIQUE' ('idweersomstandighedenperoag' ASC) VISIBLE
)