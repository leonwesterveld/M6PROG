DELETE FROM imagetable WHERE uploadDateTime < CURRENT_DATE() - INTERVAL 7 DAY;