<?php require "partials/head.php"; ?>

<h2 class="centered">Syötä arvostelu</h2>

<div class="inputarea">
<form  action="/update_review" method="post" >
    
    <label for="nimi">Nimi:</label>
    <input id="nimi" type="text" name="reviewName" maxlength=30 value="<?=$name?>">
    
    <label for="arvostelu">Arvostelu:</label>
    <textarea id="arvostelu" name="reviewText" rows="5" cols="30"><?=$text?></textarea>     
    
    <label for="paiva">Valitse artikkelin päivämäärä</label>
    <input id="paiva" type="datetime-local"  name="reviewDate" value=<?=$date?>> 
    
    <label for="arvosana">Poistopäivä:</label>
    <input id="arvosana" type="text" name="reviewGrade" value=<?=$grade?>>
    
    <input type="hidden" id="reviewid" name="id" value=<?=$id?>>
    
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