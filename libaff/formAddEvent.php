<?php
if (!isset($data)) {
    $data = new Data();
}
?>
<form enctype="multipart/form-data" action="action/addEvent.php" method="POST">
    <label for="title">Titre de l'event</label>
    <input type="text" name="title">
    <label for="date">Date</label>
    <input type="date" name="date">
    <input type="time" name="time">
    <label for="place">Adresse</label>
    <input type="text" name="place">
    <label for="type">Type of repas :</label>
    <ul>
        <li><input type="radio" name="type" value="home">Home</li>
        <li><input type="radio" name="type" value="resto">Restaurant</li>
    </ul>
    <label for="eventimg">Image for event (optionnal)</label>
    <label for="tags[]">Tags :</label>
    <ul>
        <?php foreach ($data->getTags() as $tag) : ?>
        <li><input type="checkbox" name="tags[]" value="<?php echo $tag; ?>"/><?php echo $tag; ?></li>
        <?php endforeach; ?>
    </ul>
    <label for="newTags">New tags (separate by ',') :</label>
    <input type="text" name="newTags">
    <input type="file" name="eventimg">
    <input type="submit" value="Adding Event">
</form>