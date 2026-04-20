<?php 

// Affiche un message d'erreur "stylisé" dans la vue
function displayError ($message) {
    ?>
    <div class="error">
        <p><?=  htmlspecialchars($message) ?></p>
    </div>
    
    <?php
}

function displayInfos ($message) {
    ?>
    <div class="info">
        <p><?=  htmlspecialchars($message) ?></p>
    </div>
    
    <?php
}

?>