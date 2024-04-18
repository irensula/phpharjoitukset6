<?php require "partials/header.php"; ?>

<h2 class="centered">Syötä arvostelu</h2>

<div class="inputarea">
<form  action="/update_review" method="post" >
    
    <label for="nimi">Nimi:</label>
    <input id="nimi" type="text" name="reviewName" maxlength=30 value="<?=$rName?>">
    
    <label for="arvostelu">Arvostelu:</label>
    <textarea id="arvostelu" name="reviewText" rows="5" cols="30"><?=$rText?></textarea>     
    
    <label for="paiva">Valitse arvostelun päivämäärä</label>
    <input id="paiva" type="datetime-local"  name="reviewDate" value=<?=$rDate?>> 
    
    <label for="arvosana">Poistopäivä:</label>
    <input id="arvosana" type="text" name="reviewGrade" value=<?=$rGrade?>>
    
    <input type="hidden" id="reviewid" name="id" value=<?=$rID?>>
    
    <label for="tyyppi">Valitse osasto:</label>
    <select id="tyyppi" name="type">
        <option value="Kirjat">Kirja</option>
        <option value="Elokuvat">Elokuva</option>
        <option value="Pelit">Peli</option>
        <option value="Sarjat">Sarja</option>
    </select>
    
    <input id="sendbutton" type="submit" value="Lähetä">

</form>
</div>