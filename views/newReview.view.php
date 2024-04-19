<?php require "../partials/header.php"; ?>

<div class="reviews-container">
    <h2 class="centered">Syötä arvostelu</h2>

    <div class="inputarea">
    <form  action="/add_review" method="post" >
        
        <label for="nimi">Nimi:</label>
        <input id="nimi" type="text" name="reviewName" maxlength="30">
        
        <label for="arvostelu">Arvostelu:</label>
        <textarea id="arvostelu" name="reviewText" rows="5" cols="30"></textarea>     
        
        <!-- <label for="paiva">Valitse artikkelin päivämäärä</label>
        <input id="paiva" type="datetime-local"  name="reviewDate">  -->
        
        <label for="arvosana">Arvosana: </label>
        <input id="arvosana" type="text" name="reviewGrade">
        
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
</div>
<?php require "../partials/footer.php"; ?>