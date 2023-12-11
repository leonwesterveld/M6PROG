<?php
    echo '<pre>';
    var_dump( $_POST );
    echo '</pre>';

    $naam = '';
    echo '<b>naam: </b>';
    if ( empty( $_POST['naam']) ) {
        echo '<b style="color:#f00;">Je moet wel je naam invullen</b>';
    } else {
        $naam = $_POST['naam'];
    }
    echo $naam;
    echo '<br>';

    $straat = '';
    echo '<b>straat: </b>';
    if ( empty( $_POST['straat']) ) {
        echo '<b style="color:#f00;">Je moet wel je straat invullen</b>';
    } else {
        $straat = $_POST['straat'];
    }
    echo $straat;
    echo '<br>';

    $huisnummer = '';
    echo '<b>huisnummer: </b>';
    if ( empty( $_POST['huisnummer']) ) {
        echo '<b style="color:#f00;">Je moet wel je huisnummer invullen</b>';
    } else {
        $huisnummer = $_POST['huisnummer'];
    }
    echo $huisnummer;
    echo '<br>';

    $postcode = '';
    echo '<b>postcode: </b>';
    if ( empty( $_POST['postcode']) ) {
        echo '<b style="color:#f00;">Je moet wel je postcode invullen</b>';
    } else {
        $postcode = $_POST['postcode'];
    }
    echo $postcode;
    echo '<br>';

    $email = '';
    echo '<b>email: </b>';
    if ( empty( $_POST['email']) ) {
        echo '<b style="color:#f00;">Je moet wel je email invullen</b>';
    } else {
        $email = $_POST['email'];
    }
    echo $email;
    echo '<br>';