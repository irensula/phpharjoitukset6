<?php require "../partials/header.php"; ?>

<h2 class="centered">Syötä arvostelu</h2>

<div class="inputarea">
<form  action="/update_review" method="post" >
    
    <label for="nimi">Nimi:</label>
    <input id="nimi" type="text" name="reviewName" maxlength=30 value="<?=$rName?>">
    
    <label for="arvostelu">Arvostelu:</label>
    <textarea id="arvostelu" name="reviewText" rows="5" cols="30"><?=$rText?></textarea>     
    
    <label for="arvosana">Arvosana:</label>
    <input id="arvosana" type="text" name="reviewGrade" value=<?=$rGrade?>>
    
    <input id="reviewid" name="reviewId" value=<?=$rId?>>
    
    
    <label for="tyyppi">Valitse osasto:</label>
    <select id="tyyppi" name="type">
        <option value="kirja">Kirja</option>
        <option value="elokuva">Elokuva</option>
        <option value="peli">Peli</option>
        <option value="sarja">Sarja</option>
    </select>
    
    <input id="sendbutton" type="submit" value="Lähetä">

</form>
</div>

<?php require "../partials/footer.php"; ?>